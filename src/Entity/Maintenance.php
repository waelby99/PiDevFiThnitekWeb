<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
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
    

    #[ORM\Column(length:20)]
    private ?\DateTime $datedassurance=null;

    #[ORM\Column(length:20)]
    private ?\DateTime $datepassurance=null;

    #[ORM\Column(length:20)]
    private ?\DateTime $datedvidange=null;

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

    public function getDatedassurance(): ?\DateTime
    {
        return $this->datedassurance;
    }

    public function setDatedassurance(\DateTime $datedassurance): self
    {
        $this->datedassurance = $datedassurance;

        return $this;
    }

    public function getDatepassurance(): ?\DateTime
    {
        return $this->datepassurance;
    }

    public function setDatepassurance(\DateTime $datepassurance): self
    {
        $this->datepassurance = $datepassurance;

        return $this;
    }

    public function getDatedvidange(): ?\DateTime
    {
        return $this->datedvidange;
    }

    public function setDatedvidange(\DateTime $datedvidange): self
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
