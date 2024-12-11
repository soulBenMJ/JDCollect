<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Amiibos>
     */
    #[ORM\OneToMany(targetEntity: Amiibos::class, mappedBy: 'marque')]
    private Collection $amiibo;

    /**
     * @var Collection<int, Console>
     */
    #[ORM\OneToMany(targetEntity: Console::class, mappedBy: 'Marque')]
    private Collection $consoles;

    public function __construct()
    {
        $this->amiibo = new ArrayCollection();
        $this->consoles = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Amiibos>
     */
    public function getAmiibo(): Collection
    {
        return $this->amiibo;
    }

    public function addAmiibo(Amiibos $amiibo): static
    {
        if (!$this->amiibo->contains($amiibo)) {
            $this->amiibo->add($amiibo);
            $amiibo->setMarque($this);
        }

        return $this;
    }

    public function removeAmiibo(Amiibos $amiibo): static
    {
        if ($this->amiibo->removeElement($amiibo)) {
            // set the owning side to null (unless already changed)
            if ($amiibo->getMarque() === $this) {
                $amiibo->setMarque(null);
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
            $console->setMarque($this);
        }

        return $this;
    }

    public function removeConsole(Console $console): static
    {
        if ($this->consoles->removeElement($console)) {
            // set the owning side to null (unless already changed)
            if ($console->getMarque() === $this) {
                $console->setMarque(null);
            }
        }

        return $this;
    }
}
