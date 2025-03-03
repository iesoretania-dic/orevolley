<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
#ApiResource]
class Partido
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'datetime_immutable')]
    private ?\DateTimeImmutable $fechaHora;

    #[ORM\ManyToOne(targetEntity: Equipo::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipo $local;

    #[ORM\ManyToOne(targetEntity: Equipo::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipo $visitante;

    #[ORM\ManyToMany(targetEntity: Patrocinador::class, inversedBy: 'partidos')]
    private Collection $patrocinadores;

    #[ORM\ManyToOne(targetEntity: Arbitro::class, inversedBy: 'partidos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Arbitro $arbitro;

    #[ORM\ManyToOne(targetEntity: Sede::class, inversedBy: 'partidos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sede $sede;

    #[ORM\Column]
    private ?int $resultadoLocal = null;

    #[ORM\Column]
    private ?int $resultadoVisitante = null;

    public function __construct()
    {
        $this->patrocinadores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaHora(): ?\DateTimeImmutable
    {
        return $this->fechaHora;
    }

    public function setFechaHora(\DateTimeImmutable $fechaHora): Partido
    {
        $this->fechaHora = $fechaHora;
        return $this;
    }

    public function getLocal(): ?Equipo
    {
        return $this->local;
    }

    public function setLocal(Equipo $local): Partido
    {
        $this->local = $local;
        return $this;
    }

    public function getVisitante(): ?Equipo
    {
        return $this->visitante;
    }

    public function setVisitante(Equipo $visitante): Partido
    {
        $this->visitante = $visitante;
        return $this;
    }

    /**
     * @return Collection<int, Patrocinador>
     */
    public function getPatrocinadores(): Collection
    {
        return $this->patrocinadores;
    }

    public function addPatrocinador(Patrocinador $patrocinador): Partido
    {
        if (!$this->patrocinadores->contains($patrocinador)) {
            $this->patrocinadores->add($patrocinador);
        }
        return $this;
    }

    public function removePatrocinador(Patrocinador $patrocinador): Partido
    {
        $this->patrocinadores->removeElement($patrocinador);
        return $this;
    }

    public function getArbitro(): ?Arbitro
    {
        return $this->arbitro;
    }

    public function setArbitro(Arbitro $arbitro): Partido
    {
        $this->arbitro = $arbitro;
        return $this;
    }

    public function getSede(): ?Sede
    {
        return $this->sede;
    }

    public function setSede(?Sede $sede): Partido
    {
        $this->sede = $sede;
        return $this;
    }

    public function getResultadoLocal(): ?int
    {
        return $this->resultadoLocal;
    }

    public function setResultadoLocal(int $resultadoLocal): static
    {
        $this->resultadoLocal = $resultadoLocal;

        return $this;
    }

    public function getResultadoVisitante(): ?int
    {
        return $this->resultadoVisitante;
    }

    public function setResultadoVisitante(int $resultadoVisitante): static
    {
        $this->resultadoVisitante = $resultadoVisitante;

        return $this;
    }
}
