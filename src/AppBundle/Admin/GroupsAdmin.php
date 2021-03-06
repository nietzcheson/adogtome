<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class GroupsAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General information', array('class' => 'col-lg-6'))
                ->add('pet')
                ->add('description')
                ->add('gender','choice', array(
                    'choices' => array(1 => 'Female', 2 => 'Male'),
                    'expanded' => true
                ))
                ->add('size','choice', array(
                    'choices' => array(1 => 'Small', 2 => 'Medium', 3 => 'Large'),
                    'expanded' => true
                ))
            ->end()
            ->with('Breed', array('class' => 'col-lg-6'))
                ->add('breeds', 'sonata_type_model', array(
                    'class' => 'AppBundle:Breeds',
                    'property' => 'breed',
                    'empty_value' => '---Choose---'
                ))
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('pet');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('pet');
    }
}
