<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
class Patrocinador
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $nombre;

    #[ORM\ManyToMany(targetEntity: Partido::class, mappedBy: 'patrocinadores')]
    private Collection $partidos;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url = null;

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

    public function setNombre(?string $nombre): Patrocinador
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return Collection<int, Partido>
     */
    public function getPartidos(): Collection
    {
        return $this->partidos;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): static
    {
        $this->url = $url;

        return $this;
    }
}