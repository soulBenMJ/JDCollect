<?php

namespace App\Entity;

use App\Repository\JeuxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JeuxRepository::class)]
class Jeux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix_achat = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_achat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_sortie = null;

    #[ORM\Column]
    private ?float $prix_revente = null;

    #[ORM\ManyToOne(inversedBy: 'jeux')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $idCateg = null;

    /**
     * @var Collection<int, Console>
     */
    #[ORM\OneToMany(targetEntity: Console::class, mappedBy: 'idJx')]
    private Collection $consoles;

    /**
     * @var Collection<int, Marque>
     */
    #[ORM\OneToMany(targetEntity: Marque::class, mappedBy: 'idJx')]
    private Collection $marques;

    public function __construct()
    {
        $this->consoles = new ArrayCollection();
        $this->marques = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->date_achat;
    }

    public function setDateAchat(\DateTimeInterface $date_achat): static
    {
        $this->date_achat = $date_achat;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->date_sortie;
    }

    public function setDateSortie(\DateTimeInterface $date_sortie): static
    {
        $this->date_sortie = $date_sortie;

        return $this;
    }

    public function getPrixRevente(): ?float
    {
        return $this->prix_revente;
    }

    public function setPrixRevente(float $prix_revente): static
    {
        $this->prix_revente = $prix_revente;

        return $this;
    }

    public function getIdCateg(): ?Categorie
    {
        return $this->idCateg;
    }

    public function setIdCateg(?Categorie $idCateg): static
    {
        $this->idCateg = $idCateg;

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
            $console->setIdJx($this);
        }

        return $this;
    }

    public function removeConsole(Console $console): static
    {
        if ($this->consoles->removeElement($console)) {
            // set the owning side to null (unless already changed)
            if ($console->getIdJx() === $this) {
                $console->setIdJx(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Marque>
     */
    public function getMarques(): Collection
    {
        return $this->marques;
    }

    public function addMarque(Marque $marque): static
    {
        if (!$this->marques->contains($marque)) {
            $this->marques->add($marque);
            $marque->setIdJx($this);
        }

        return $this;
    }

    public function removeMarque(Marque $marque): static
    {
        if ($this->marques->removeElement($marque)) {
            // set the owning side to null (unless already changed)
            if ($marque->getIdJx() === $this) {
                $marque->setIdJx(null);
            }
        }

        return $this;
    }
}
