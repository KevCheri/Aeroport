<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvionRepository")
 */
class Avion
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
    private $modele;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $compagnie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\vol", mappedBy="avion")
     */
    private $vols;

    public function __construct()
    {
        $this->vols = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->modele;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): self
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getCompagnie(): ?string
    {
        return $this->compagnie;
    }

    public function setCompagnie(string $compagnie): self
    {
        $this->compagnie = $compagnie;

        return $this;
    }

    /**
     * @return Collection|vol[]
     */
    public function getVols(): Collection
    {
        return $this->vols;
    }

    public function addVol(vol $vol): self
    {
        if (!$this->vols->contains($vol)) {
            $this->vols[] = $vol;
            $vol->setAvion($this);
        }

        return $this;
    }

    public function removeVol(vol $vol): self
    {
        if ($this->vols->contains($vol)) {
            $this->vols->removeElement($vol);
            // set the owning side to null (unless already changed)
            if ($vol->getAvion() === $this) {
                $vol->setAvion(null);
            }
        }

        return $this;
    }
}
