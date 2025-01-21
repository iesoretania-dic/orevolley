<?php

namespace App\DataFixtures;

use App\Entity\Equipo;
use App\Factory\EquipoFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        EquipoFactory::createMany(500);

        $manager->flush();
    }
}
