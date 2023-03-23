<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SondageRepository;

#[ORM\Entity(repositoryClass: SondageRepository::class)]
class Sondage
{
    /**
     * @var int
     *
     * @ORM\Column(name="sondage_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sondageId;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=20, nullable=false)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="catégorie", type="string", length=20, nullable=false)
     */
    private $catégorie;


}
