<?php

namespace Readroom\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Readroom\DBBundle\Entity\Book;
use Readroom\DBBundle\Entity\Category;
use Readroom\DBBundle\Entity\CategoriesDescription;

class DefaultController extends Controller {

    public function indexAction() {
        // inicio sesión nada más entrar en la aplicación
        $session = new Session();
        $session->start();

        $em = $this->getDoctrine()->getManager();
        $book = null;
        $user = null;
        // Compruebo si hay un usuario registrado
        if ($session->get("currentBook") != null) {
            // Busco al currentUser

            $currentBook = $em->getRepository('ReadroomDBBundle:Book')->find($session->get("currentBook"));
            $book = $this->setBookArray($currentBook);
        }

        if ($session->get("userId") != null) {
            // Busco al currentUser

            $currentUser = $em->getRepository('ReadroomDBBundle:Reader')->find($session->get("userId"));
            $user = $this->setUserArray($currentUser);
        }

        $categories = $em->getRepository('ReadroomDBBundle:Category')->findBy(array("category_status" => true), array('parent_id' => 'ASC'));
        $categoriesArray = $this->setCategoriesArray($categories, 1);

        return $this->render('ReadroomHomeBundle:Default:index.html.twig', array('categories' => $categoriesArray, 'currentBook' => ($book == null) ? null : $book,
                    'currentUser' => ($user == null) ? null : $user));
    }

    
    public function setCategoriesArray($categories, $language_id) {
        $language_id--;
        $categoriesArray = array();
        
        // Recorro todas las categorias
        for ($i = 0; $i < sizeof($categories); $i++) {
            $children = array();
            
            // Si es una categoría padre
            if ($categories[$i]->getParentId() == 0) {
                
                // Vuelvo a recorrer todas las categorías para buscar los hijos
                for ($z = 0; $z < sizeof($categories); $z++) {
                    // si encuentro un hijo lo guardo en el array
                    if ($categories[$z]->getParentId() == $categories[$i]->getId()) {
                        // Creo un nuevo array con los datos del hijo
                        $item = array(
                            "id" => $categories[$z]->getId(), 
                            "category_name" => $categories[$z]->getCategoriesDescriptions()[$language_id]->getCategoryName(),
                            "category_description" => $categories[$z]->getCategoriesDescriptions()[$language_id]->getCategoryDescription(),
                            "sort_order" => $categories[$i]->getSortOrder() 
                        );
                        
                        // lo incluyo dentro
                        array_push($children, $item) ; 
                    }
                }
                // Guardo todos los datos de la categoría
                $categoriesArray[$i] = array(
                    "id" => $categories[$i]->getId(),
                    "category_name" => $categories[$i]->getCategoriesDescriptions()[$language_id]->getCategoryName(),
                    "category_description" => $categories[$i]->getCategoriesDescriptions()[$language_id]->getCategoryDescription(),
                    "sort_order" => $categories[$i]->getSortOrder(),
                    "parent_id" => $categories[$i]->getParentId(),
                    "children" => $children
                );
            } 
            // si es una subcategoría ya lo he guardado dentro del array
            else {
                break;
            }

            
        }

        return $categoriesArray;
    }

}
