<?php

namespace AppBundle\Controller;

 use AppBundle\Form\PetsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
      * @Template
     */
    public function homeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $pets = $em->getRepository('AppBundle:Pets')->findAll();

        $petsForm = $this->petForm();

        return array(
            'title' => 'AdogToMe',
            'pets' => $pets,
            'pets_form' => $petsForm->createView()
        );
    }

    /**
     * @Route("/pet/{id}", name="pet")
      * @Template
     */
    public function petAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $pet = $em->getRepository('AppBundle:Pets')->findOneBy(array('id' => $id));

        $petsForm = $this->petForm();

        return array(
            'pet' => $pet,
            'pets_form' => $petsForm->createView()
        );
    }

    public function petForm()
    {
        return $this->createForm(new PetsType());
    }
}
