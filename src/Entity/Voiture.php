<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use App\Repository\VoitureRepository;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idVoiture=null;

    #[ORM\Column(length: 50)]
    private ?string $matricule=null;

    #[ORM\Column]
    private ?int $puissance=null;

    #[ORM\Column]
    private ?int $kilometrage=null;

    #[ORM\Column]
    private ?int $nbplaces=null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateassurance=null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datedvidange=null;

    #[ORM\Column(length: 255)]
    private ?string $color=null;

    #[ORM\Column(length: 50)]
    private ?string $marque=null;

    #[ORM\ManyToOne(inversedBy:'voitures')]
    private ?User $idUser = null;

    public function getIdVoiture(): ?int
    {
        return $this->idVoiture;
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

    public function getPuissance(): ?int
    {
        return $this->puissance;
    }

    public function setPuissance(int $puissance): self
    {
        $this->puissance = $puissance;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getNbplaces(): ?int
    {
        return $this->nbplaces;
    }

    public function setNbplaces(int $nbplaces): self
    {
        $this->nbplaces = $nbplaces;

        return $this;
    }

    public function getDateassurance(): ?\DateTimeInterface
    {
        return $this->dateassurance;
    }

    public function setDateassurance(\DateTimeInterface $dateassurance): self
    {
        $this->dateassurance = $dateassurance;

        return $this;
    }

    public function getDatedvidange(): ?\DateTimeInterface
    {
        return $this->datedvidange;
    }

    public function setDatedvidange(\DateTimeInterface $datedvidange): self
    {
        $this->datedvidange = $datedvidange;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

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
