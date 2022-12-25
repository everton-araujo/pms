<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToOne(inversedBy: 'rooms')]
    private ?RoomCategory $category = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?RoomHistory $history = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Availability $availability = null;

    #[ORM\OneToMany(mappedBy: 'room', targetEntity: Reservation::class)]
    private Collection $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

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

    public function getCategory(): ?RoomCategory
    {
        return $this->category;
    }

    public function setCategory(?RoomCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getHistory(): ?RoomHistory
    {
        return $this->history;
    }

    public function setHistory(?RoomHistory $history): self
    {
        $this->history = $history;

        return $this;
    }

    public function getAvailability(): ?Availability
    {
        return $this->availability;
    }

    public function setAvailability(?Availability $availability): self
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setRoom($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getRoom() === $this) {
                $reservation->setRoom(null);
            }
        }

        return $this;
    }
}
