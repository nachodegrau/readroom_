<?php 
namespace Readroom\InputBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Readroom\DBBundle\Entity\Input;
use Readroom\DBBundle\Entity\Reader;
use Readroom\DBBundle\Entity\Reply;

class ReplyController extends Controller
{
    public function addReplyAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            // Rescato lo datos que vienen de la vista
            $request_array = array();
            $request_array = json_decode($request->request->get("model"));
            $session = $this->getRequest()->getSession();
            
            
            // busco el libro y el lector de este input
            $em = $this->getDoctrine()->getManager();
            $reader = $em->getRepository('ReadroomDBBundle:Reader')->find($session->get("userId"));
            $input = $em->getRepository('ReadroomDBBundle:Input')->find($request_array->{"input_id"});
            
            // lleno la instancia con los datos
            $reply = new Reply();
            $reply->setInput($input);
            $reply->setReader($reader);
            $reply->setComent($request_array->{"comment"});
          
            // Guardo en la BBDD 
            $em->persist($reply);
            $em->flush();
            
            //$returnInput = $this->inputToArray($input);
            
            $return = json_encode(array("id" => $reply->getId(), "reader_image" => $reply->getReader()->getReaderImage(), "reader_name" => $reply->getReader()->getReaderName()));
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
    public function showRepliesAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            
            $em = $this->getDoctrine()->getManager();
            
            $replies = $em->getRepository('ReadroomDBBundle:Reply')->findBy(array('input' => $request->query->get("idinput")));
            
            $repliesArray = array();
            for($i=0; $i<sizeof($replies); $i++) {
                $repliesArray[$i] = $this->setRepliesArray($replies[$i]);
            }
            
            $return = json_encode($repliesArray);
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        } 
    }
    
}

?>
