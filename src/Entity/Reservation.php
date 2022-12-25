<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $reservationDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $checkin = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $checkout = null;

    #[ORM\Column]
    private ?bool $isPaid = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Room $room = null;

    #[ORM\ManyToMany(targetEntity: Guest::class, inversedBy: 'reservations')]
    private Collection $guest;

    #[ORM\OneToMany(mappedBy: 'reservation', targetEntity: BlackList::class)]
    private Collection $blackLists;

    public function __construct()
    {
        $this->guest = new ArrayCollection();
        $this->blackLists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getReservationDate(): ?\DateTimeInterface
    {
        return $this->reservationDate;
    }

    public function setReservationDate(\DateTimeInterface $reservationDate): self
    {
        $this->reservationDate = $reservationDate;

        return $this;
    }

    public function getCheckin(): ?\DateTimeInterface
    {
        return $this->checkin;
    }

    public function setCheckin(\DateTimeInterface $checkin): self
    {
        $this->checkin = $checkin;

        return $this;
    }

    public function getCheckout(): ?\DateTimeInterface
    {
        return $this->checkout;
    }

    public function setCheckout(\DateTimeInterface $checkout): self
    {
        $this->checkout = $checkout;

        return $this;
    }

    public function isIsPaid(): ?bool
    {
        return $this->isPaid;
    }

    public function setIsPaid(bool $isPaid): self
    {
        $this->isPaid = $isPaid;

        return $this;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(?Room $room): self
    {
        $this->room = $room;

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
        }

        return $this;
    }

    public function removeGuest(Guest $guest): self
    {
        $this->guest->removeElement($guest);

        return $this;
    }

    /**
     * @return Collection<int, BlackList>
     */
    public function getBlackLists(): Collection
    {
        return $this->blackLists;
    }

    public function addBlackList(BlackList $blackList): self
    {
        if (!$this->blackLists->contains($blackList)) {
            $this->blackLists->add($blackList);
            $blackList->setReservation($this);
        }

        return $this;
    }

    public function removeBlackList(BlackList $blackList): self
    {
        if ($this->blackLists->removeElement($blackList)) {
            // set the owning side to null (unless already changed)
            if ($blackList->getReservation() === $this) {
                $blackList->setReservation(null);
            }
        }

        return $this;
    }
}
