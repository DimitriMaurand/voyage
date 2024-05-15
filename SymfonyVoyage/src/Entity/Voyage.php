<?php

namespace App\Entity;

use App\Repository\VoyageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: VoyageRepository::class)]
class Voyage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('api_voyage_index')]
    private ?int $id = null;

    #[ORM\Column(length: 75)]
    #[Groups([
        'api_reservation_index', 'api_voyage_index'
    ])]

    private ?string $titre_voyage = null;

    #[ORM\Column(length: 1000)]
    #[Groups([
        'api_reservation_index', 'api_voyage_index'
    ])]

    private ?string $Description_voyage = null;

    #[ORM\Column]
    #[Groups([
        'api_voyage_index', 'api_reservation_index'
    ])]

    private ?int $duree_voyage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $debut_voyage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fin_voyage = null;

    #[ORM\Column]
    #[Groups([
        'api_reservation_index', 'api_voyage_index'
    ])]


    private ?int $prix_voyage = null;

    #[ORM\ManyToOne(inversedBy: 'Voyage')]
    #[Groups([
        'api_reservation_index'
    ])]
    private ?User $user = null;

    /**
     * @var Collection<int, Image>
     */
    #[ORM\ManyToMany(targetEntity: Image::class, inversedBy: 'voyages')]
    #[Groups([
        'api_voyage_index', 'api_reservation_index'
    ])]


    private Collection $Image;

    /**
     * @var Collection<int, Categorie>
     */
    #[ORM\ManyToMany(targetEntity: Categorie::class, inversedBy: 'voyages')]
    #[Groups([
        'api_voyage_index', 'api_reservation_index'
    ])]

    private Collection $Categorie;

    /**
     * @var Collection<int, Pays>
     */
    #[ORM\ManyToMany(targetEntity: Pays::class, inversedBy: 'voyages')]
    #[Groups([
        'api_voyage_index', 'api_reservation_index'
    ])]

    private Collection $Pays;

    /**
     * @var Collection<int, Ile>
     */
    #[ORM\ManyToMany(targetEntity: Ile::class, inversedBy: 'voyages')]
    #[Groups([
        'api_voyage_index', 'api_reservation_index'
    ])]

    private Collection $ile;

    /**
     * @var Collection<int, Reservation>
     */
    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'voyage')]
    private Collection $Reservation;

    public function __construct()
    {
        $this->Image = new ArrayCollection();
        $this->Categorie = new ArrayCollection();
        $this->Pays = new ArrayCollection();
        $this->ile = new ArrayCollection();
        $this->Reservation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreVoyage(): ?string
    {
        return $this->titre_voyage;
    }

    public function setTitreVoyage(string $titre_voyage): static
    {
        $this->titre_voyage = $titre_voyage;

        return $this;
    }

    public function getDescriptionVoyage(): ?string
    {
        return $this->Description_voyage;
    }

    public function setDescriptionVoyage(string $Description_voyage): static
    {
        $this->Description_voyage = $Description_voyage;

        return $this;
    }

    public function getDureeVoyage(): ?int
    {
        return $this->duree_voyage;
    }

    public function setdureeVoyage(int $duree_voyage): static
    {
        $this->duree_voyage = $duree_voyage;

        return $this;
    }

    public function getDebutVoyage(): ?\DateTimeInterface
    {
        return $this->debut_voyage;
    }

    public function setDebutVoyage(\DateTimeInterface $debut_voyage): static
    {
        $this->debut_voyage = $debut_voyage;

        return $this;
    }

    public function getFinVoyage(): ?\DateTimeInterface
    {
        return $this->fin_voyage;
    }

    public function setFinVoyage(\DateTimeInterface $fin_voyage): static
    {
        $this->fin_voyage = $fin_voyage;

        return $this;
    }

    public function getPrixVoyage(): ?int
    {
        return $this->prix_voyage;
    }

    public function setPrixVoyage(int $prix_voyage): static
    {
        $this->prix_voyage = $prix_voyage;

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

    /**
     * @return Collection<int, Image>
     */
    public function getImage(): Collection
    {
        return $this->Image;
    }

    public function addImage(Image $image): static
    {
        if (!$this->Image->contains($image)) {
            $this->Image->add($image);
        }

        return $this;
    }

    public function removeImage(Image $image): static
    {
        $this->Image->removeElement($image);

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategorie(): Collection
    {
        return $this->Categorie;
    }

    public function addCategorie(Categorie $categorie): static
    {
        if (!$this->Categorie->contains($categorie)) {
            $this->Categorie->add($categorie);
        }

        return $this;
    }

    public function removeCategorie(Categorie $categorie): static
    {
        $this->Categorie->removeElement($categorie);

        return $this;
    }

    /**
     * @return Collection<int, Pays>
     */
    public function getPays(): Collection
    {
        return $this->Pays;
    }

    public function addPay(Pays $pay): static
    {
        if (!$this->Pays->contains($pay)) {
            $this->Pays->add($pay);
        }

        return $this;
    }

    public function removePay(Pays $pay): static
    {
        $this->Pays->removeElement($pay);

        return $this;
    }

    /**
     * @return Collection<int, Ile>
     */
    public function getIle(): Collection
    {
        return $this->ile;
    }

    public function addIle(Ile $ile): static
    {
        if (!$this->ile->contains($ile)) {
            $this->ile->add($ile);
        }

        return $this;
    }

    public function removeIle(Ile $ile): static
    {
        $this->ile->removeElement($ile);

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservation(): Collection
    {
        return $this->Reservation;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->Reservation->contains($reservation)) {
            $this->Reservation->add($reservation);
            $reservation->setVoyage($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->Reservation->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getVoyage() === $this) {
                $reservation->setVoyage(null);
            }
        }

        return $this;
    }
}
