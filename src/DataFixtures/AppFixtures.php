<?php

namespace App\DataFixtures;

use App\Entity\Equipo;
use App\Factory\EquipoFactory;
use App\Factory\JugadorFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        EquipoFactory::createMany(500);
        JugadorFactory::createOne([
            'nombre' => 'Chuck',
            'apellidos' => 'Norris'
        ]);
        JugadorFactory::createMany(10);

        $manager->flush();
    }
}
