<?php

namespace Readroom\CategoriesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Readroom\DBBundle\Entity\Book;
use Readroom\DBBundle\Entity\Category;
use Readroom\DBBundle\Entity\CategoriesDescription;

class CategoriesController extends Controller
{
    public function showCategoryAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $return = json_encode(array("message" => "showCategoryAction"));
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
    public function addCategoryAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $return = json_encode(array("message" => "addCategoryAction"));
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
    public function updateCategoryAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $return = json_encode(array("message" => "updateCategoryAction"));
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
    public function deleteCategoryAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $return = json_encode(array("message" => "deleteCategoryAction"));
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
    public function showCategoriesAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            
            $em = $this->getDoctrine()->getManager();
            
            $books = array();
            $parent = $request->query->get("parent");
            
            if($parent == "true") {
                $categories = $em->getRepository('ReadroomDBBundle:Category')->findBy(array("parent_id" => $request->query->get("id")));
                foreach ($categories as $category) {
                    foreach($category->getBooks() as $book){
                        $bookArray = $this->setBookArray($book);
                        array_push($books, $bookArray);
                    }
                    
                }
            } else {
                $category = $em->getRepository('ReadroomDBBundle:Category')->find($request->query->get("id"));
                foreach ($category->getBooks() as $book) {
                    $bookArray = $this->setBookArray($book);
                    array_push($books, $bookArray);
                }
            }
            
            
            
            $return = json_encode($books);
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }      
    }
    
    public function searchBooksInCategory($category) {
        //$category = new Category();
        
        return $category;
    }
    
}
