<?php

namespace App\Entity;

use App\Repository\BuildingServiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BuildingServiceRepository::class)]
class BuildingService
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $startHour = null;

    #[ORM\Column(length: 255)]
    private ?string $finishHour = null;

    #[ORM\Column]
    private ?int $fee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStartHour(): ?string
    {
        return $this->startHour;
    }

    public function setStartHour(string $startHour): self
    {
        $this->startHour = $startHour;

        return $this;
    }

    public function getFinishHour(): ?string
    {
        return $this->finishHour;
    }

    public function setFinishHour(string $finishHour): self
    {
        $this->finishHour = $finishHour;

        return $this;
    }

    public function getFee(): ?int
    {
        return $this->fee;
    }

    public function setFee(int $fee): self
    {
        $this->fee = $fee;

        return $this;
    }
}
