<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VolRepository")
 */
class Vol
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateDepart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateArrivee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $VilleDepart;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $VilleArrivee;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\gestionnaire", inversedBy="vols")
     */
    private $gestionnaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Avion", inversedBy="vols")
     */
    private $avion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pilote", inversedBy="vols")
     */
    private $pilote;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Passager", inversedBy="vols")
     */
    private $passager;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Passager", mappedBy="vols")
     */
    private $passagers;

    public function __construct()
    {
        $this->passagers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->DateDepart;
    }

    public function setDateDepart(\DateTimeInterface $DateDepart): self
    {
        $this->DateDepart = $DateDepart;

        return $this;
    }

    public function getDateArrivee(): ?\DateTimeInterface
    {
        return $this->DateArrivee;
    }

    public function setDateArrivee(\DateTimeInterface $DateArrivee): self
    {
        $this->DateArrivee = $DateArrivee;

        return $this;
    }

    public function getVilleDepart(): ?string
    {
        return $this->VilleDepart;
    }

    public function setVilleDepart(string $VilleDepart): self
    {
        $this->VilleDepart = $VilleDepart;

        return $this;
    }

    public function getVilleArrivee(): ?string
    {
        return $this->VilleArrivee;
    }

    public function setVilleArrivee(string $VilleArrivee): self
    {
        $this->VilleArrivee = $VilleArrivee;

        return $this;
    }

    public function getGestionnaire(): ?gestionnaire
    {
        return $this->gestionnaire;
    }

    public function setGestionnaire(?gestionnaire $gestionnaire): self
    {
        $this->gestionnaire = $gestionnaire;

        return $this;
    }

    public function getAvion(): ?Avion
    {
        return $this->avion;
    }

    public function setAvion(?Avion $avion): self
    {
        $this->avion = $avion;

        return $this;
    }

    public function getPilote(): ?Pilote
    {
        return $this->pilote;
    }

    public function setPilote(?Pilote $pilote): self
    {
        $this->pilote = $pilote;

        return $this;
    }

    public function getPassager(): ?Passager
    {
        return $this->passager;
    }

    public function setPassager(?Passager $passager): self
    {
        $this->passager = $passager;

        return $this;
    }

    /**
     * @return Collection|Passager[]
     */
    public function getPassagers(): Collection
    {
        return $this->passagers;
    }

    public function addPassager(Passager $passager): self
    {
        if (!$this->passagers->contains($passager)) {
            $this->passagers[] = $passager;
            $passager->addVol($this);
        }

        return $this;
    }

    public function removePassager(Passager $passager): self
    {
        if ($this->passagers->contains($passager)) {
            $this->passagers->removeElement($passager);
            $passager->removeVol($this);
        }

        return $this;
    }
}
