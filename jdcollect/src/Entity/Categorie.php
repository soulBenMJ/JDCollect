<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $niveau = null;

    /**
     * @var Collection<int, Jeux>
     */
    #[ORM\OneToMany(targetEntity: Jeux::class, mappedBy: 'idCateg')]
    private Collection $jeux;

    /**
     * @var Collection<int, Console>
     */
    #[ORM\OneToMany(targetEntity: Console::class, mappedBy: 'idCateg')]
    private Collection $consoles;

    public function __construct()
    {
        $this->jeux = new ArrayCollection();
        $this->consoles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * @return Collection<int, Jeux>
     */
    public function getJeux(): Collection
    {
        return $this->jeux;
    }

    public function addJeux(Jeux $jeux): static
    {
        if (!$this->jeux->contains($jeux)) {
            $this->jeux->add($jeux);
            $jeux->setIdCateg($this);
        }

        return $this;
    }

    public function removeJeux(Jeux $jeux): static
    {
        if ($this->jeux->removeElement($jeux)) {
            // set the owning side to null (unless already changed)
            if ($jeux->getIdCateg() === $this) {
                $jeux->setIdCateg(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Console>
     */
    public function getConsoles(): Collection
    {
        return $this->consoles;
    }

    public function addConsole(Console $console): static
    {
        if (!$this->consoles->contains($console)) {
            $this->consoles->add($console);
            $console->setIdCateg($this);
        }

        return $this;
    }

    public function removeConsole(Console $console): static
    {
        if ($this->consoles->removeElement($console)) {
            // set the owning side to null (unless already changed)
            if ($console->getIdCateg() === $this) {
                $console->setIdCateg(null);
            }
        }

        return $this;
    }
}
