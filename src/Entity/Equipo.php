<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
class Equipo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(length: 255)]
    private ?string $nombre;

    #[ORM\OneToMany(targetEntity: Jugador::class, mappedBy: 'equipo')]
    private Collection $plantilla;

    #[ORM\OneToOne(targetEntity: Logotipo::class, mappedBy: 'equipo')]
    private ?Logotipo $logotipo;

    public function __construct()
    {
        $this->plantilla = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): Equipo
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return Collection<int, Persona>
     */
    public function getPlantilla(): Collection
    {
        return $this->plantilla;
    }

    public function getLogotipo(): ?Logotipo
    {
        return $this->logotipo;
    }
}