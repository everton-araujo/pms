<?php

namespace App\Entity;

use App\Repository\RoomHistoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomHistoryRepository::class)]
class RoomHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $rental = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $outOfService = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $outOfServiceReason = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRental(): ?\DateTimeInterface
    {
        return $this->rental;
    }

    public function setRental(\DateTimeInterface $rental): self
    {
        $this->rental = $rental;

        return $this;
    }

    public function getOutOfService(): ?\DateTimeInterface
    {
        return $this->outOfService;
    }

    public function setOutOfService(?\DateTimeInterface $outOfService): self
    {
        $this->outOfService = $outOfService;

        return $this;
    }

    public function getOutOfServiceReason(): ?string
    {
        return $this->outOfServiceReason;
    }

    public function setOutOfServiceReason(?string $outOfServiceReason): self
    {
        $this->outOfServiceReason = $outOfServiceReason;

        return $this;
    }
}
