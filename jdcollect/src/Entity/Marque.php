<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarqueRepository::class)]
class Marque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'marques')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Console $idConsole = null;

    #[ORM\ManyToOne(inversedBy: 'marques')]
    private ?Jeux $idJx = null;

    #[ORM\ManyToOne(inversedBy: 'marques')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Amiibos $idAmii = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIdConsole(): ?Console
    {
        return $this->idConsole;
    }

    public function setIdConsole(?Console $idConsole): static
    {
        $this->idConsole = $idConsole;

        return $this;
    }

    public function getIdJx(): ?Jeux
    {
        return $this->idJx;
    }

    public function setIdJx(?Jeux $idJx): static
    {
        $this->idJx = $idJx;

        return $this;
    }

    public function getIdAmii(): ?Amiibos
    {
        return $this->idAmii;
    }

    public function setIdAmii(?Amiibos $idAmii): static
    {
        $this->idAmii = $idAmii;

        return $this;
    }
}
