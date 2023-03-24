<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use App\Repository\SponsoringRepository;

#[ORM\Entity(repositoryClass: SponsoringRepository::class)]
class Sponsoring
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id=null;

    #[ORM\Column(length: 50)]
    private ?string $sponsor=null;

    #[ORM\Column] 
    private ?float $montant=null;

    #[ORM\Column(length: 255)]
    private ?string $adresse=null;

    #[ORM\Column(length:20)]
    private ?\DateTime $datesignature=null;

    #[ORM\Column(length: 255)]
    private ?string $email=null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSponsor(): ?string
    {
        return $this->sponsor;
    }

    public function setSponsor(string $sponsor): self
    {
        $this->sponsor = $sponsor;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDatesignature(): ?\DateTime
    {
        return $this->datesignature;
    }

    public function setDatesignature(\DateTime $datesignature): self
    {
        $this->datesignature = $datesignature;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }


}
