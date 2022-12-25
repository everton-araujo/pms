<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomRepository::class)]
class Room
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column]
    private ?int $number = null;

    #[ORM\Column]
    private ?int $floor = null;

    #[ORM\Column(length: 255)]
    private ?string $wifiPassword = null;

    #[ORM\Column(length: 255)]
    private ?string $doorPassword = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getFloor(): ?int
    {
        return $this->floor;
    }

    public function setFloor(int $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    public function getWifiPassword(): ?string
    {
        return $this->wifiPassword;
    }

    public function setWifiPassword(string $wifiPassword): self
    {
        $this->wifiPassword = $wifiPassword;

        return $this;
    }

    public function getDoorPassword(): ?string
    {
        return $this->doorPassword;
    }

    public function setDoorPassword(string $doorPassword): self
    {
        $this->doorPassword = $doorPassword;

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
}
