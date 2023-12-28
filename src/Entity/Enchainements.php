<?php

namespace App\Entity;

use App\Repository\EnchainementsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnchainementsRepository::class)]
class Enchainements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $exercice = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Diet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExercice(): ?string
    {
        return $this->exercice;
    }

    public function setExercice(?string $exercice): static
    {
        $this->exercice = $exercice;

        return $this;
    }

    public function getDiet(): ?string
    {
        return $this->Diet;
    }

    public function setDiet(?string $Diet): static
    {
        $this->Diet = $Diet;

        return $this;
    }
}
