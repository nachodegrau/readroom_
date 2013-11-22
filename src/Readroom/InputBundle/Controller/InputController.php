<?php

namespace Readroom\InputBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Readroom\DBBundle\Entity\Input;
use Readroom\DBBundle\Entity\Reader;
use Readroom\DBBundle\Entity\Book;

class InputController extends Controller
{
    public function showInputAction()
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $return = json_encode(array("message" => "addInputAction"));
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        } 
    }
    
    public function addInputAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            // Rescato lo datos que vienen de la vista
            $user_array = array();
            //$user_array = json_decode($request->request->get("model"));
            $session = $this->getRequest()->getSession();
            
            
            // busco el libro y el lector de este input
            $em = $this->getDoctrine()->getManager();
            $reader = $em->getRepository('ReadroomDBBundle:Reader')->find($this->getUser()->getId());
            $book = $currentBook = $em->getRepository('ReadroomDBBundle:Book')->find($session->get("currentBook"));
            
            // lleno la instancia con los datos
            $input = new Input();
            $input->setBook($book);
            $input->setReader($reader);
            $input->setInputQuote($request->request->get("input_quote"));
            $input->setComment($request->request->get("comment"));
            $input->setBookSpine($request->request->get("book_spine"));
            $input->setInputDate(new \DateTime('now'));
            
            if(sizeof($_FILES) == 0) {
                $input->setType(0);
            } else {
                $ruta="inputs/files/";
                
                $image_ext = array("jpeg", "jpg", "png", "gif");
                $video_ext = array("mp4", "ogg","webm");
                // bucle donde trato la imagen y la guardo en el servidor
                foreach ($_FILES as $key) {
                    if ($key['error'] == UPLOAD_ERR_OK) {//Verificamos si se subio correctamente
                        $nombre = $key['name']; //Obtenemos el nombre del archivo
                        $temporal = $key['tmp_name']; //Obtenemos el nombre del archivo temporal
                        $tamano = ($key['size'] / 1000) . "Kb"; //Obtenemos el tamaño en KB
                        move_uploaded_file($temporal, $ruta . $nombre); //Movemos el archivo temporal a la ruta especificada
                        //El echo es para que lo reciba jquery y lo ponga en el div "cargados"
                        $input->setSource($nombre);
                        if (in_array(pathinfo($nombre, PATHINFO_EXTENSION), $image_ext)) {
                            $input->setType(1);
                        } else if (in_array(pathinfo($nombre, PATHINFO_EXTENSION), $video_ext)) {
                            $input->setType(2);
                        }
                        
                    } else {
                        $return = json_encode(array("error" => 1));
                        return new Response($return,200, array('Content-Type' => 'application/json'));
                    }
                }
            }
            
            // Guardo en la BBDD 
            $em->persist($input);
            $em->flush();
            
            $returnInput = $this->inputToArray($input);
            
            $return = json_encode($returnInput);
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
    public function updateInputAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $return = json_encode(array("message" => "addInputAction"));
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        } 
    }
    
    public function deleteInputAction()
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $return = json_encode(array("message" => "addInputAction"));
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        } 
    }
    
    public function showInputsAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            //$user_array = array();
            $session = $this->getRequest()->getSession();
            
            $em = $this->getDoctrine()->getManager();
            //$inputs = $em->getRepository('ReadroomDBBundle:Input')
            //        ->findAllByBookAndSpineInArray($request->query->get("idBook"), $request->query->get("spine"));
            
            $inputs = $em->getRepository('ReadroomDBBundle:Input')->findBy(array('book' => $request->query->get("idBook") , "book_spine" => $request->query->get("spine") ));
            
            $inputsArray = array();
            for($i=0; $i<sizeof($inputs); $i++) {
                $inputsArray[$i] = $this->inputToArray($inputs[$i]);
            }
            
            $return = json_encode($inputsArray);
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        } 
    } 
}
