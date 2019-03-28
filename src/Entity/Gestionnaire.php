<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GestionnaireRepository")
 */
class Gestionnaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mot_de_passe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vol", mappedBy="gestionnaire")
     */
    private $vols;

    public function __construct()
    {
        $this->vols = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->mot_de_passe;
    }

    public function setMotDePasse(string $mot_de_passe): self
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

    /**
     * @return Collection|Vol[]
     */
    public function getVols(): Collection
    {
        return $this->vols;
    }

    public function addVol(Vol $vol): self
    {
        if (!$this->vols->contains($vol)) {
            $this->vols[] = $vol;
            $vol->setGestionnaire($this);
        }

        return $this;
    }

    public function removeVol(Vol $vol): self
    {
        if ($this->vols->contains($vol)) {
            $this->vols->removeElement($vol);
            // set the owning side to null (unless already changed)
            if ($vol->getGestionnaire() === $this) {
                $vol->setGestionnaire(null);
            }
        }

        return $this;
    }
}
