<?php

namespace AppBundle\Extension;

use AppBundle\Form\PetsType;
use Symfony\Component\Form\FormFactory;

class SearchPets extends \Twig_Extension
{
    private $form;

    public function setFormFactory(FormFactory $form)
    {
        $this->form = $form;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('SearchPets',
                array($this, 'SearchPets'),
                array(
                    'is_safe' => array('html'),
                    'needs_environment' => true
                )),
        );
    }

    public function SearchPets(\Twig_Environment $twig = null)
    {
        $petsForm = $this->form->create(new PetsType());

        return $twig->render('AppBundle::Extension/search-pets.html.twig', array(
            'pets_form' => $petsForm->createView()
        ));
    }

    public function getName()
    {
        return 'search_pets';
    }

}
