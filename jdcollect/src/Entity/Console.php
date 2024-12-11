<?php

namespace App\Entity;

use App\Repository\ConsoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsoleRepository::class)]
class Console
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix_achat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_achat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_sortie = null;

    #[ORM\Column]
    private ?float $prix_revente = null;

    #[ORM\Column]
    private ?bool $boite = null;

    #[ORM\Column(length: 255)]
    private ?string $couleur = null;

    /**
     * @var Collection<int, Jeux>
     */
    #[ORM\OneToMany(targetEntity: Jeux::class, mappedBy: 'console')]
    private Collection $jeux;

    #[ORM\ManyToOne(inversedBy: 'consoles')]
    private ?Categorie $categorie = null;

    #[ORM\ManyToOne(inversedBy: 'consoles')]
    private ?Marque $Marque = null;

    public function __construct()
    {
        $this->marques = new ArrayCollection();
        $this->jeux = new ArrayCollection();
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

    public function getPrixAchat(): ?float
    {
        return $this->prix_achat;
    }

    public function setPrixAchat(float $prix_achat): static
    {
        $this->prix_achat = $prix_achat;

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

    public function isBoite(): ?bool
    {
        return $this->boite;
    }

    public function setBoite(bool $boite): static
    {
        $this->boite = $boite;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): static
    {
        $this->couleur = $couleur;

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

    public function getIdJx(): ?Jeux
    {
        return $this->idJx;
    }

    public function setIdJx(?Jeux $idJx): static
    {
        $this->idJx = $idJx;

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
            $marque->setIdConsole($this);
        }

        return $this;
    }

    public function removeMarque(Marque $marque): static
    {
        if ($this->marques->removeElement($marque)) {
            // set the owning side to null (unless already changed)
            if ($marque->getIdConsole() === $this) {
                $marque->setIdConsole(null);
            }
        }

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
            $jeux->setConsole($this);
        }

        return $this;
    }

    public function removeJeux(Jeux $jeux): static
    {
        if ($this->jeux->removeElement($jeux)) {
            // set the owning side to null (unless already changed)
            if ($jeux->getConsole() === $this) {
                $jeux->setConsole(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->Marque;
    }

    public function setMarque(?Marque $Marque): static
    {
        $this->Marque = $Marque;

        return $this;
    }
}
