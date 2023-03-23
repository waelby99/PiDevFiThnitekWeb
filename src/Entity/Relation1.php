<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\Relation1Repository;

#[ORM\Entity(repositoryClass: Relation1Repository::class)]
class Relation1
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idRelation= null;

    #[ORM\ManyToOne(inversedBy: 'sponsors')]
    private ?Sponsoring $idSponsor=null;

    #[ORM\ManyToOne(inversedBy: 'evenements')]
    private ?Evenement $idEvenement=null;

    public function getIdRelation(): ?int
    {
        return $this->idRelation;
    }

    public function getIdSponsor(): ?Sponsoring
    {
        return $this->idSponsor;
    }

    public function setIdSponsor(?Sponsoring $idSponsor): self
    {
        $this->idSponsor = $idSponsor;

        return $this;
    }

    public function getIdEvenement(): ?Evenement
    {
        return $this->idEvenement;
    }

    public function setIdEvenement(?Evenement $idEvenement): self
    {
        $this->idEvenement = $idEvenement;

        return $this;
    }


}
