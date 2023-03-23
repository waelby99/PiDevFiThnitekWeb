<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AvisRepository;

#[ORM\Entity(repositoryClass:AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id=null;

    #[ORM\Column(length: 255)]
    private ?string $commenraire = null;

    #[ORM\ManyToOne(inversedBy:'aviss')]
    private ?User $idUser = null;

    #[ORM\ManyToOne(inversedBy: 'avisss')]
    private ?Offrecovoiturage $idOffrecov=null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommenraire(): ?string
    {
        return $this->commenraire;
    }

    public function setCommenraire(string $commenraire): self
    {
        $this->commenraire = $commenraire;

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

    public function getIdOffrecov(): ?Offrecovoiturage
    {
        return $this->idOffrecov;
    }

    public function setIdOffrecov(?Offrecovoiturage $idOffrecov): self
    {
        $this->idOffrecov = $idOffrecov;

        return $this;
    }


}
