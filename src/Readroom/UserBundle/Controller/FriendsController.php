<?php

namespace Readroom\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use \Readroom\DBBundle\Entity\Reader;

class FriendsController extends Controller{
    
    public function addRelationAction(Request $request) {
        if ($this->getRequest()->isXmlHttpRequest()) {

            $model = array();
            $model = json_decode($request->request->get('model'));

            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('ReadroomDBBundle:Reader')->find($model->{"currentUserId"});
            $friend = $em->getRepository('ReadroomDBBundle:Reader')->find($model->{"friendId"});
            if(sizeof($user) == 1 && sizeof($friend) == 1) {
                $user->addMyFriends($friend);
                $friend->addMyFriends($user);
                $em->flush();
                $return = json_encode(array("error" => 0));
            } else if(sizeof($user) == 0) {
                $return = json_encode(array("error" => "userNotFound"));
            }
            return new Response($return,200, array('Content-Type' => 'application/json'));
        }    
    }
    
}

?>
