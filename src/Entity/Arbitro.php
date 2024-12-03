<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
class Arbitro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $nombre;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $apellidos;

    #[ORM\Column(type: 'integer', unique: true)]
    private ?int $numColegiado;

    #[ORM\OneToMany(targetEntity: Partido::class, mappedBy: 'arbitro')]
    private Collection $partidos;

    public function __construct()
    {
        $this->partidos = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Arbitro
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): Arbitro
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    public function getNumColegiado(): ?int
    {
        return $this->numColegiado;
    }

    public function setNumColegiado(int $numColegiado): Arbitro
    {
        $this->numColegiado = $numColegiado;
        return $this;
    }

    /**
     * @return Collection<int, Partido>
     */
    public function getPartidos(): Collection
    {
        return $this->partidos;
    }
}