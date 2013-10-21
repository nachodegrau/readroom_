<?php

namespace Readroom\BooksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class BooksController extends Controller
{
    public function showBookAction()
    {
        $return = json_encode(array("message" => "showBookAction"));
        return new Response($return,200, array('Content-Type' => 'application/json'));
    }
    
    public function addBookAction()
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $return = json_encode(array("message" => "addBookAction"));
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
    public function updateBookAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $user_array = array();
            $user_array = json_decode($request->request->get("model"));
            $session = $this->getRequest()->getSession();
            $session->set("currentBook", $user_array->{"id"});
            $return = json_encode(array("error" => 0));
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }     
    }
    
    public function deleteBookAction()
    {
        $return = json_encode(array("message" => "deleteBookAction"));
        return new Response($return,200, array('Content-Type' => 'application/json'));
    }
    
    public function showBooksAction()
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $books = $em->getRepository('ReadroomDBBundle:Book')->findAllInArray();
            $return = json_encode($books);
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
}
