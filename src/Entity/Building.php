<?php

namespace App\Entity;

use App\Repository\BuildingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BuildingRepository::class)]
class Building
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $phoneNumber1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $phoneNumber2 = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

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

    public function getPhoneNumber1(): ?int
    {
        return $this->phoneNumber1;
    }

    public function setPhoneNumber1(int $phoneNumber1): self
    {
        $this->phoneNumber1 = $phoneNumber1;

        return $this;
    }

    public function getPhoneNumber2(): ?int
    {
        return $this->phoneNumber2;
    }

    public function setPhoneNumber2(?int $phoneNumber2): self
    {
        $this->phoneNumber2 = $phoneNumber2;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
