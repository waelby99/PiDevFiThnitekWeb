<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SondageRepository;

#[ORM\Entity(repositoryClass: SondageRepository::class)]
class Sondage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $sondageId=null;

    #[ORM\Column(length: 20)]
    private ?string $sujet=null;

    #[ORM\Column(length: 20)]
    private ?string $catégorie=null;


}
