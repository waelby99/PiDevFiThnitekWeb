<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

use App\Repository\OffrecovoiturageRepository;

#[ORM\Entity(repositoryClass: OffrecovoiturageRepository::class)]
class Offrecovoiturage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id= null;

    #[ORM\Column(length: 50)]
    private ?string $matricule=null;

    #[ORM\Column(length: 50)]
    private ?string $marque=null;

    #[ORM\Column(length:20)]
    private ?\DateTime $dated=null;

    #[ORM\Column(length: 50)]
    private ?string $lieud=null;

    #[ORM\Column(length: 50)]
    private ?string $lieua=null;

    #[ORM\Column(length: 20)]
    private ?string $dispo=null;

    #[ORM\Column]
    private ?int $nbplace=null;

    #[ORM\Column]
    private ?int $numtel=null;

    #[ORM\Column]
    private ?float $distance=null;

    #[ORM\ManyToOne(inversedBy:'demandecovoiturages')]
    private ?User $iduser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getDated(): ?\DateTime
    {
        return $this->dated;
    }

    public function setDated(\DateTime $dated): self
    {
        $this->dated = $dated;

        return $this;
    }

    public function getLieud(): ?string
    {
        return $this->lieud;
    }

    public function setLieud(string $lieud): self
    {
        $this->lieud = $lieud;

        return $this;
    }

    public function getLieua(): ?string
    {
        return $this->lieua;
    }

    public function setLieua(string $lieua): self
    {
        $this->lieua = $lieua;

        return $this;
    }

    public function getDispo(): ?string
    {
        return $this->dispo;
    }

    public function setDispo(string $dispo): self
    {
        $this->dispo = $dispo;

        return $this;
    }

    public function getNbplace(): ?int
    {
        return $this->nbplace;
    }

    public function setNbplace(int $nbplace): self
    {
        $this->nbplace = $nbplace;

        return $this;
    }

    public function getNumtel(): ?int
    {
        return $this->numtel;
    }

    public function setNumtel(int $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }

    public function getDistance(): ?float
    {
        return $this->distance;
    }

    public function setDistance(float $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getIduser(): ?User
    {
        return $this->iduser;
    }

    public function setIduser(?User $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }


}
