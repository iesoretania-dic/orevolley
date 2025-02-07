<?php

namespace App\Entity;

use App\Repository\ArbitroRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: ArbitroRepository::class)]
#[ORM\Table]
class Arbitro implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $nombre;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $apellidos;

    #[ORM\Column(type: 'integer', unique: true)]
    private ?int $numColegiado;

    #[ORM\OneToMany(targetEntity: Partido::class, mappedBy: 'arbitro')]
    private Collection $partidos;

    #[ORM\Column(length: 255)]
    private ?string $clave = null;

    #[ORM\Column]
    private ?bool $esAdministrador = null;

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

    public function getRoles()
    {
        $roles = ['ROLE_USER'];
        if ($this->esAdministrador) {
            $roles[] = 'ROLE_ADMIN';
        }
        return $roles;
    }

    public function getPassword(): ?string
    {
        return $this->getClave();
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
    }

    public function getUsername()
    {
        return $this->getNumColegiado();
    }

    public function getUserIdentifier()
    {
        return $this->getNumColegiado();
    }

    public function getClave(): ?string
    {
        return $this->clave;
    }

    public function setClave(string $clave): static
    {
        $this->clave = $clave;

        return $this;
    }

    public function isEsAdministrador(): ?bool
    {
        return $this->esAdministrador;
    }

    public function setEsAdministrador(bool $esAdministrador): static
    {
        $this->esAdministrador = $esAdministrador;

        return $this;
    }
}