<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Users;
use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AppFixtures extends DataFixtureLoader implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function setContainer(ContainerInterface $container = NULL)
    {
        $this->container = $container;
    }

    public function getFixtures()
    {
        return [
            __DIR__.'/app.yml'
        ];
    }

    public function breeds()
    {
        $breeds = array(
            'Afgano',
            'Airedale Terrier',
            'Akita',
            'American Staffordshire Terrier',
            'Antiguo Pastor Inglés',
            'Basenji',
            'Basset Hound',
            'Beagle',
            'Boxer'
        );

        return $breeds[array_rand($breeds)];
    }

    public function encoder($plain, $user)
    {
        $encoder = $this->container->get('security.encoder_factory');

        return $encoder->getEncoder($user)->encodePassword($plain,$user->getSalt());
    }
}
