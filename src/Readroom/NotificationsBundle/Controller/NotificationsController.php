<?php

namespace ReadRoom\NotificationsBundle\Controller;

use Readroom\DBBundle\Entity\Reader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotificationsController extends Controller
{
    public function showNotificationsAction(Request $request)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {

            $em = $this->getDoctrine()->getManager();

            $user = $em->getRepository('ReadroomDBBundle:Reader')->find($request->query->get("idUser"));

            // primer recupero las solicitudes y las paso a array
            $solicitudes = $user->getSolicitudeWithMe();

            $notificationsArray = array();

            foreach ($solicitudes as $solicitude) {
                array_push($notificationsArray, $this->notificationsToArray($solicitude, 0));
            }

            $return = json_encode($notificationsArray);
            return new Response($return,200, array('Content-Type' => 'application/json'));
        } else {
            return new Response("",404);
        }
    }
}
