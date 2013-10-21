<?php

namespace Readroom\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Readroom\DBBundle\Entity\Reader;

class UserHasBooksController extends Controller{
    
    public function showUserHasBooksAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository("ReadroomDBBundle:Reader")->find($request->query->get("id"));
            
            $books = array();
            
            foreach ($user->getBooks() as $book) {
                $bookArray = $this->setBookArray($book);
                array_push($books, $bookArray);
            }
            
            $return = json_encode(array("books" => $books));
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
    public function saveUserHasBooksAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $request_array = array();
            $request_array = json_decode($request->request->get("model"));
            
            $bookId = $request_array->{"book_id"};
            $userId = $request_array->{"user_id"};
            
            //echo $request_array->{"user_id"} . " " . $userId;
            
            $em = $this->getDoctrine()->getManager();
            $book = $em->getRepository("ReadroomDBBundle:Book")->find($bookId);
            
            foreach ($book->getReaders() as $reader) {
                if ($reader->getId() == $userId) {
                    
                return new Response(json_encode(array("exist" => true)),200);
                }
            }
            
            $user = $em->getRepository("ReadroomDBBundle:Reader")->find($userId);
            
            $book->addReader($user);
            $em->flush();
            
            $bookArray = $this->setBookArray($book);
            
            $return = json_encode($bookArray);
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
    public function updateUserHasBooksAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $return = json_encode(array("message" => "updateUserHasBooksAction"));
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
    public function deleteUserHasBooksAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $return = json_encode(array("message" => "deleteUserHasBooksAction"));
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
}

?>
