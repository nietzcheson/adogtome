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

        $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $pets,
            $request->query->getInt('page', 1),
            9
        );

        return array(
            'title' => 'AdogToMe',
            'pets' => $pagination,
            'pagination' => $pagination
        );
    }
}
