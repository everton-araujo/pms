<?php

namespace App\Entity;

use App\Repository\RoomHistoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'roomHistory', targetEntity: Guest::class)]
    private Collection $guest;

    public function __construct()
    {
        $this->guest = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Guest>
     */
    public function getGuest(): Collection
    {
        return $this->guest;
    }

    public function addGuest(Guest $guest): self
    {
        if (!$this->guest->contains($guest)) {
            $this->guest->add($guest);
            $guest->setRoomHistory($this);
        }

        return $this;
    }

    public function removeGuest(Guest $guest): self
    {
        if ($this->guest->removeElement($guest)) {
            // set the owning side to null (unless already changed)
            if ($guest->getRoomHistory() === $this) {
                $guest->setRoomHistory(null);
            }
        }

        return $this;
    }
}
