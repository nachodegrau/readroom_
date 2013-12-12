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
        if ($this->getRequest()->isXmlHttpRequest()) {
            
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('ReadroomDBBundle:Reader')->find($request->query->get("id"));
            
            if(sizeof($user) == 1) {
                //$serializer = $this->container->get('jms_serializer');
                //$return = $serializer->serialize($user, 'json');
                $userArray = $this->setUserArray($user);
                $return = json_encode($userArray);
            } else if(sizeof($user) == 0) {
                $return = json_encode(array("error" => "userNotFound"));
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
            
            // Creo un nuevo usuario con los datos que vienen de la vista
            $user = new Reader();
            $user->setUsername($request->request->get("userUsername"));
            $user->setEmail($request->request->get("userMail"));
            $user->setPlainPassword($request->request->get("userPassword"));
            $user->isEnabled(true);
            
            
            // Busco si existe algún registro con el mismo nombre o e-mail
            $em = $this->getDoctrine()->getManager();
            $userResults = $em->getRepository('ReadroomDBBundle:Reader')->findBy(array('email' => $user->getEmail() , "username" => $user->getUsername()));
            
            // Si no existe lo meto en la BBDD
            if (sizeof($userResults) == 0) {
                $em->persist($user);
                $em->flush();

                $session = $this->getRequest()->getSession();
                $session->start();
                $session->set('User', $user);

                $return = json_encode(array("id" => $user->getId(), "error" => 0));//jscon encode the array
                return new Response($return,200, array('Content-Type' => 'application/json'));
                
            } 
            // Si existe devuelvo un mensaje de error
            else {
                $return = json_encode(array("id" => $user->getId(), "error" => 1));//jscon encode the array
                return new Response($return,200, array('Content-Type' => 'application/json'));
            }
            
            //$response->headers->set('Content-Type', 'application/json');
            
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
            $reader = $em->getRepository('ReadroomDBBundle:Reader')->find($this->getUser()->getId());
            
            if ($user_array->{"typeUpdate"} == "datos_personales") {
                $reader->setUsername( $user_array->{"username"} );
                $reader->setEmail( $user_array->{"mail"} );
                $reader->setReaderName( $user_array->{"name"} );
                $reader->setReaderSecondName( $user_array->{"surname"} );
                                
            } else if($user_array->{"typeUpdate"} == "contrasena") {
                if($reader->getPlainPassword() == $user_array->{"reader_password"} ) {
                    $reader->setPlainPassword(hash('sha512',$user_array->{"reader_new_password"} ));
                }
            }
            
            $em->flush();
            //$readerArray = $this->setUserArray($reader);
            $serializer = $this->container->get('jms_serializer');
            $return = $serializer->serialize($reader, 'json');
            
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
            $reader = $em->getRepository('ReadroomDBBundle:Reader')->find($this->getUser()->getId());
            
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
