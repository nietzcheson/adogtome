<?php

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends DataFixtureLoader
{
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
}
