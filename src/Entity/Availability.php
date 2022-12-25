<?php

namespace App\Entity;

use App\Repository\AvailabilityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvailabilityRepository::class)]
class Availability
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $broken = null;

    #[ORM\Column]
    private ?bool $stolen = null;

    #[ORM\Column]
    private ?bool $makeover = null;

    #[ORM\Column]
    private ?bool $occupation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $endDate = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function isBroken(): ?bool
    {
        return $this->broken;
    }

    public function setBroken(bool $broken): self
    {
        $this->broken = $broken;

        return $this;
    }

    public function isStolen(): ?bool
    {
        return $this->stolen;
    }

    public function setStolen(bool $stolen): self
    {
        $this->stolen = $stolen;

        return $this;
    }

    public function isMakeover(): ?bool
    {
        return $this->makeover;
    }

    public function setMakeover(bool $makeover): self
    {
        $this->makeover = $makeover;

        return $this;
    }

    public function isOccupation(): ?bool
    {
        return $this->occupation;
    }

    public function setOccupation(bool $occupation): self
    {
        $this->occupation = $occupation;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }
}
