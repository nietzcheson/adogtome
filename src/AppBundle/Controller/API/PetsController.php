<?php

namespace AppBundle\Controller\API;

 use AppBundle\Form\PetsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PetsController extends Controller
{
    /**
     * @Route("/api/pets/{breed}/{gender}", name="api_pets", options={"expose"=true})
     */
    public function petsAction($breed, $gender, Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $pets = $em->getRepository('AppBundle:Pets')->findBreedAndGender($breed, $gender);

        $response = 0;

        if($pets){
            $response = $this->renderView('AppBundle:Partials:pets.html.twig', array('pets' => $pets));
            //$response = 1;
        }

        return new Response(json_encode(array('quantity' => count($response),'pets' => $response)));
    }
}
