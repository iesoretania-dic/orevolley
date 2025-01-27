<?php

namespace App\Repository;

use App\Entity\Arbitro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArbitroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Arbitro::class);
    }

    public function findOrdenadosPorApellidoYNombre(): array
    {
        return $this->findBy([], ['apellidos' => 'ASC', 'nombre' => 'ASC']);
    }

    public function findByNombreOrdenados(string $nombre): array
    {
        return $this->findBy(['nombre' => $nombre], ['apellidos' => 'ASC', 'nombre' => 'ASC']);
    }

    public function save(): void
    {
        $this->getEntityManager()->flush();
    }
}