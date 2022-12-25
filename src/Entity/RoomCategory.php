<?php

namespace App\Entity;

use App\Repository\RoomCategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomCategoryRepository::class)]
class RoomCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $size = null;

    #[ORM\Column]
    private ?bool $petFriendly = null;

    #[ORM\Column]
    private ?bool $smoking = null;

    #[ORM\Column]
    private ?bool $laundry = null;

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

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function isPetFriendly(): ?bool
    {
        return $this->petFriendly;
    }

    public function setPetFriendly(bool $petFriendly): self
    {
        $this->petFriendly = $petFriendly;

        return $this;
    }

    public function isSmoking(): ?bool
    {
        return $this->smoking;
    }

    public function setSmoking(bool $smoking): self
    {
        $this->smoking = $smoking;

        return $this;
    }

    public function isLaundry(): ?bool
    {
        return $this->laundry;
    }

    public function setLaundry(bool $laundry): self
    {
        $this->laundry = $laundry;

        return $this;
    }
}
