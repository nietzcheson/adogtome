<?php

namespace AppBundle\Controller;

 use AppBundle\Form\PetsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PetController extends Controller
{
    /**
     * @Route("/pet/{id}", name="pet")
      * @Template
     */
    public function petAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $pet = $em->getRepository('AppBundle:Pets')->findOneBy(array('id' => $id));

        $petsForm = $this->createForm(new PetsType());

        return array(
            'pet' => $pet,
            'pets_form' => $petsForm->createView()
        );
    }
}
