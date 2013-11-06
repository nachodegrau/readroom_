<?php

namespace Readroom\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Readroom\DBBundle\Entity\Reader;

class UserController extends Controller
{   
    public function showUserAction(Request $request)
    {
        // Login Usuario
        if ($this->getRequest()->isXmlHttpRequest()) {
            
            // Creo un nuevo usuario con los datos que vienen de la vista
            $user = new Reader();
            $user->setReaderEmail($request->query->get("mail"));
            $user->setIsFacebook(false);
            $user->setPassword($request->query->get("password"));
            
            // Busco en la BBDD si existe un usuario con ese email
            $em = $this->getDoctrine()->getManager();
            $userResults = new Reader();
            $userResults = $em->getRepository('ReadroomDBBundle:Reader')->findBy(array('reader_email' => $user->getReaderEmail()));
            
                // Si existe...
                if(count($userResults) == 1) { 
                    // Comprobamos que la contraseña es correnta
                    if($userResults[0]->getPassword() == hash('sha512', $user->getPassword())) {
                        //$session = new Session();
                        $session = $this->getRequest()->getSession();
                        $session->set("user", $userResults[0]);

                        //Guardo al usuario en sesión
                        $this->storeUserInSession($userResults[0]);
                        
                        $return = json_encode($this->setUserArray($userResults[0]));
                   } 
                   // Si no existe lanzamos error
                   else {
                       $return = json_encode(array("error" => 1));
                   }
                } 
                // Si no existe lanzamos error
                else {
                    $return = json_encode(array("error" => 1));
                }
            
            return new Response($return,200, array('Content-Type' => 'application/json'));
        }    
    }
    
    public function loginFacebookAction (Request $request) {
        if ($this->getRequest()->isXmlHttpRequest()) {
            
            $userArray = array();
            $userArray = json_decode($request->request->get("model"));
            
            // Creo un nuevo usuario con los datos que vienen de la vista
            $user = new Reader();
            $user->setReaderEmail($userArray->{"mail"});
            $user->setIsFacebook(true);
            $user->setReaderImage($userArray->{"image"});
            $user->setReaderName($userArray->{"name"});
            
            // Busco en la BBDD si existe un usuario con ese email
            $em = $this->getDoctrine()->getManager();
            $userResults = new Reader();
            $userResults = $em->getRepository('ReadroomDBBundle:Reader')->findBy(array('reader_email' => $user->getReaderEmail()));
            
            if (count($userResults) == 1) {
                //Guardo al usuario en sesión
                $this->storeUserInSession($userResults[0]);
                $return = json_encode($this->setUserArray($userResults[0]));
            } else {
                $em->persist($user);
                $em->flush();
                $this->storeUserInSession($user);
                $return = json_encode($this->setUserArray($user));
            }
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404, array('Content-Type' => 'application/json'));
        }
    }
    
    public function addUserAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            
            // rescato las variables que he enviado por AJAX
            $user_array = array();
            $user_array = json_decode($request->request->get("model"));
            
            // Creo un nuevo usuario con los datos que vienen de la vista
            $user = new Reader();
            $user->setReaderEmail($user_array->{"mail"});
            $user->setPassword(hash('sha512',$user_array->{"password"}));
            
            // Busco si existe algún registro con el mismo nombre o e-mail
            $em = $this->getDoctrine()->getManager();
            $userResults = $em->getRepository('ReadroomDBBundle:Reader')->findUserByEmail($user->getReaderEmail());
            
            // Si no existe lo meto en la BBDD
            if (sizeof($userResults) == 0) {
                $em->persist($user);
                $em->flush();
                
                // Guardo al usuario en sesión
                $this->storeUserInSession($user);
                
                $return = json_encode(array("id" => $user->getId(), "error" => 0));//jscon encode the array
                return new Response($return,200, array('Content-Type' => 'application/json'));
                
            } 
            // Si existe devuelvo un mensaje de error
            else {
                $return = json_encode(array("id" => $user->getId(), "error" => 1));//jscon encode the array
                return new Response($return,200, array('Content-Type' => 'application/json'));
            }
            
            $response->headers->set('Content-Type', 'application/json');
            
        } else {
            return new Response($return,404);
        } 
    }
    
    public function updateUserAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            
            $user_array = array();
            $user_array = json_decode($request->request->get("model"));
            
            $session = $this->getRequest()->getSession();

            $em = $this->getDoctrine()->getManager();
            $reader = $em->getRepository('ReadroomDBBundle:Reader')->find($session->get("userId"));
            
            if ($user_array->{"typeUpdate"} == "datos_personales") {
                $reader->setReaderName( $user_array->{"name"} );
                $reader->setReaderEmail( $user_array->{"mail"} );
                                
            } else if($user_array->{"typeUpdate"} == "contrasena") {
                if($reader->getPassword() == hash('sha512',$user_array->{"reader_password"} )) {
                    $reader->setPassword(hash('sha512',$user_array->{"reader_new_password"} ));
                }
            }
            
            $em->flush();
            $readerArray = $this->setUserArray($reader);
            
            $return = json_encode($readerArray);
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
    public function chageUserImageAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            
            $session = $this->getRequest()->getSession();
            
            $em = $this->getDoctrine()->getManager();
            $reader = $em->getRepository('ReadroomDBBundle:Reader')->find($session->get("userId"));
            
            $ruta="readers/images/";
                
                // bucle donde trato la imagen y la guardo en el servidor
                foreach ($_FILES as $key) {
                    if ($key['error'] == UPLOAD_ERR_OK) {//Verificamos si se subio correctamente
                        $nombre = $key['name']; //Obtenemos el nombre del archivo
                        $temporal = $key['tmp_name']; //Obtenemos el nombre del archivo temporal
                        $tamano = ($key['size'] / 1000) . "Kb"; //Obtenemos el tamaño en KB
                        move_uploaded_file($temporal, $ruta . $nombre); //Movemos el archivo temporal a la ruta especificada
                        //El echo es para que lo reciba jquery y lo ponga en el div "cargados"
                        $reader->setReaderImage($nombre);
                        
                    } else {
                        $return = json_encode(array("error" => 1));
                        return new Response($return,200, array('Content-Type' => 'application/json'));
                    }
                }
            
            $em->flush();
            $readerArray = $this->setUserArray($reader);
            $return = json_encode($readerArray);
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
    public function deleteUserAction()
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $return = json_encode(array("message" => "deleteUserAction"));
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
    public function showBooksAction()
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $return = json_encode(array("message" => "showBooksAction"));
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
    /*
     * Función que guarda los datos principales del usuario en sesión
     */
    public function storeUserInSession(Reader $user) {
        $session = $this->getRequest()->getSession();
        $session->set("userId", $user->getId());
    }
    
    public function destroySessionAction(Request $request) {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $session = $this->getRequest()->getSession();
            $session->invalidate();
            $return = json_encode(array("message" => "destroySession"));
            return new Response($return,200);
        } else {
            return new Response("",404);
        }
    }
    
}
