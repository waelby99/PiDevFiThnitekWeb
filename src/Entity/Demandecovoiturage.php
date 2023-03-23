<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use App\Repository\DemandecovoiturageRepository;

#[ORM\Entity(repositoryClass: DemandecovoiturageRepository::class)]
class Demandecovoiturage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id= null;

    
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datereservation=null;

    #[ORM\Column]
    private ?int $nbplace=null;

    #[ORM\ManyToOne(inversedBy:'demandecovoituragess')]
    private ?Offrecovoiturage $idOffre=null;

    #[ORM\ManyToOne(inversedBy:'demandecovoiturages')]
    private ?User $idUser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatereservation(): ?\DateTimeInterface
    {
        return $this->datereservation;
    }

    public function setDatereservation(\DateTimeInterface $datereservation): self
    {
        $this->datereservation = $datereservation;

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

    public function getIdOffre(): ?Offrecovoiturage
    {
        return $this->idOffre;
    }

    public function setIdOffre(?Offrecovoiturage $idOffre): self
    {
        $this->idOffre = $idOffre;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }


}
