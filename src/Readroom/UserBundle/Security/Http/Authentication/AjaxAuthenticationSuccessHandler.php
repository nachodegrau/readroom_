<?php

namespace Readroom\UserBundle\Security\Http\Authentication;

use JMS\Serializer\SerializerInterface;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxAuthenticationSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    protected $serializer;
    
    public function setSerializer(SerializerInterface $serializer = null)
    {
        $this->serializer = $serializer;
    }
    
    /**
     * {@inheritDoc}
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        // We grab the entity associated with the logged in user or null if user not logged in
        $user = $token->getUser();
        
        
        
        // We serialize it to JSON
        //$json = $this->serializer->serialize($user, 'json');

        // And return the response
        $response = new Response(json_encode($this->setUserArray($user)));
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
    }
    
    public function setUserArray($currentUser) {
        $user = array(
            "id" => $currentUser->getId(),
            "username" => $currentUser->getUsername(),
            "reader_name" => $currentUser->getReaderName(),
            "reader_second_name" => $currentUser->getReaderSecondName(),
            "email" => $currentUser->getEmail(),
            "reader_image" => $currentUser->getReaderImage(),
            "isFacebook" => $currentUser->getIsFacebook(),
            "password" => null,
            "error" => 0,
            "my_solicitudes" => array(),
            "solicitudes_with_me" => array(),
        );


        foreach ($currentUser->getmySolicitudes() as $solicitude) {

            array_push($user["my_solicitudes"], array(
                "id" => $solicitude->getId(),
                "username" => $solicitude->getReaderName(),
                "reader_image" => $solicitude->getReaderImage()
            ));
        }


        foreach ($currentUser->getSolicitudeWithMe() as $solicitude) {
            array_push($user["solicitudes_with_me"], array(
                "id" => $solicitude->getId(),
                "username" => $solicitude->getReaderName(),
                "reader_image" => $solicitude->getReaderImage()
            ));
        }

        return $user;
    }
}