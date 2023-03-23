<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use App\Repository\MaintenanceRepository;

#[ORM\Entity(repositoryClass: MaintenanceRepository::class)]
class Maintenance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idMaintenance= null;
    
    #[ORM\Column(length: 50)]
    private ?string $matricule=null;
    

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datedassurance=null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datepassurance=null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datedvidange=null;

    #[ORM\Column]
    private ?int $restekilometre=null;

    public function getIdMaintenance(): ?int
    {
        return $this->idMaintenance;
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

    public function getDatedassurance(): ?\DateTimeInterface
    {
        return $this->datedassurance;
    }

    public function setDatedassurance(\DateTimeInterface $datedassurance): self
    {
        $this->datedassurance = $datedassurance;

        return $this;
    }

    public function getDatepassurance(): ?\DateTimeInterface
    {
        return $this->datepassurance;
    }

    public function setDatepassurance(\DateTimeInterface $datepassurance): self
    {
        $this->datepassurance = $datepassurance;

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

    public function getRestekilometre(): ?int
    {
        return $this->restekilometre;
    }

    public function setRestekilometre(int $restekilometre): self
    {
        $this->restekilometre = $restekilometre;

        return $this;
    }


}
