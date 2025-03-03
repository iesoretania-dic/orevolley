<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'path' => '/jugadores',
        ]
    ],
    itemOperations: [
        'get' => [
            'path' => '/jugadores/{id}',
        ],
        'delete' => [
            'path' => '/jugadores/{id}',
            'security' => "is_granted('ROLE_ADMIN')",
        ]]
)]
class Jugador
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 255)]
    private ?string $nombre;

    #[ORM\Column(length: 255)]
    private ?string $apellidos;

    #[ORM\Column(type: 'date_immutable')]
    private ?\DateTimeInterface $fechaNacimiento;

    #[ORM\Column(nullable: true)]
    private ?int $dorsal;

    #[ORM\ManyToOne(targetEntity: Equipo::class, inversedBy: 'plantilla')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipo $equipo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): Jugador
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(?string $apellidos): Jugador
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(?\DateTimeInterface $fechaNacimiento): Jugador
    {
        $this->fechaNacimiento = $fechaNacimiento;
        return $this;
    }

    public function getDorsal(): ?int
    {
        return $this->dorsal;
    }

    public function setDorsal(?int $dorsal): Jugador
    {
        $this->dorsal = $dorsal;
        return $this;
    }

    public function getEquipo(): ?Equipo
    {
        return $this->equipo;
    }

    public function setEquipo(?Equipo $equipo): Jugador
    {
        $this->equipo = $equipo;
        return $this;
    }
}
