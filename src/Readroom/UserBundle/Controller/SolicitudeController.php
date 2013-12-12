<?php

namespace Readroom\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use \Readroom\DBBundle\Entity\Reader;

class SolicitudeController extends Controller{
    
    public function addSolicitudeAction(Request $request) {
        if ($this->getRequest()->isXmlHttpRequest()) {
            
            $model = array();
            $model = json_decode($request->request->get("model"));
            
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('ReadroomDBBundle:Reader')->find($model->{"currentUserId"});
            $friend = $em->getRepository('ReadroomDBBundle:Reader')->find($model->{"friendId"});
            if(sizeof($user) == 1 && sizeof($friend) == 1) {
                $user->addMySolicitudes($friend);
                $em->flush();
                
                $userArray = $this->setUserArray($user);
                $return = json_encode($userArray);
            } else if(sizeof($user) == 0 || sizeof($friend) == 0) {
                $return = json_encode(array("error" => "userNotFound"));
            }
            return new Response($return,200, array('Content-Type' => 'application/json'));
        }    
    }
    
}

?>
