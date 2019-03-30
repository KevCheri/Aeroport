<?php
// src/Entity/User.php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Passager", mappedBy="user", cascade={"persist", "remove"})
     */
    private $passager;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Pilote", inversedBy="user", cascade={"persist", "remove"})
     */
    private $pilote;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Gestionnaire", inversedBy="user", cascade={"persist", "remove"})
     */
    private $gestionnaire;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Responsable", inversedBy="user", cascade={"persist", "remove"})
     */
    private $responsable;

    public function __construct()
    {
        parent::__construct();
        $this->addRole('ROLE_PASSAGER');
    }

    public function getPassager(): ?Passager
    {
        return $this->passager;
    }

    public function setPassager(?Passager $passager): self
    {
        $this->passager = $passager;

        // set (or unset) the owning side of the relation if necessary
        $newUser = $passager === null ? null : $this;
        if ($newUser !== $passager->getUser()) {
            $passager->setUser($newUser);
        }

        return $this;
    }

    public function getPilote(): ?pilote
    {
        return $this->pilote;
    }

    public function setPilote(?pilote $pilote): self
    {
        $this->pilote = $pilote;

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

    public function getResponsable(): ?responsable
    {
        return $this->responsable;
    }

    public function setResponsable(?responsable $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }
}