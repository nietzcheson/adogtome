<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PetsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('breeds','entity', array(
                'class' => 'AppBundle:Breeds',
                'property'  => 'breed',
                'empty_value' => '---Choose---'
            ))
            ->add('gender','choice', array(
                'choices' => array(1 => 'Female', 2 => 'Male'),
                'expanded' => true
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Pets'
        ));
    }
}
