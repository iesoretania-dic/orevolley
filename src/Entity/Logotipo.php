<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
class Logotipo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $nombreFichero;

    #[ORM\OneToOne(targetEntity: Equipo::class, inversedBy: 'logotipo')]
    #[ORM\JoinColumn(unique: true, nullable: false)]
    private ?Equipo $equipo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreFichero(): ?string
    {
        return $this->nombreFichero;
    }

    public function setNombreFichero(?string $nombreFichero): Logotipo
    {
        $this->nombreFichero = $nombreFichero;
        return $this;
    }

    public function getEquipo(): ?Equipo
    {
        return $this->equipo;
    }

    public function setEquipo(?Equipo $equipo): Logotipo
    {
        $this->equipo = $equipo;
        return $this;
    }
}