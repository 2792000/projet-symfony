<?php

namespace App\Entity;

use App\Repository\GroupesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupesRepository::class)]
class Groupes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $temps = null;

    #[ORM\Column]
    private ?int $nb_max = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemps(): ?string
    {
        return $this->temps;
    }

    public function setTemps(string $temps): static
    {
        $this->temps = $temps;

        return $this;
    }

    public function getNbMax(): ?int
    {
        return $this->nb_max;
    }

    public function setNbMax(int $nb_max): static
    {
        $this->nb_max = $nb_max;

        return $this;
    }
}
