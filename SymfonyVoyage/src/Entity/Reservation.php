<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('api_reservation_show')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'api_reservation_index'
    ])]
    private ?string $message_reservation = null;

    #[ORM\ManyToOne(inversedBy: 'Reservation')]
    #[Groups([
        'api_reservation_index'
    ])]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Statut $Statut = null;

    #[ORM\ManyToOne(inversedBy: 'Reservation')]
    #[Groups([
        'api_reservation_index'
    ])]
    private ?Voyage $voyage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessageReservation(): ?string
    {
        return $this->message_reservation;
    }

    public function setMessageReservation(string $message_reservation): static
    {
        $this->message_reservation = $message_reservation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getStatut(): ?Statut
    {
        return $this->Statut;
    }

    public function setStatut(?Statut $Statut): static
    {
        $this->Statut = $Statut;

        return $this;
    }

    public function getVoyage(): ?Voyage
    {
        return $this->voyage;
    }

    public function setVoyage(?Voyage $voyage): static
    {
        $this->voyage = $voyage;

        return $this;
    }
}
