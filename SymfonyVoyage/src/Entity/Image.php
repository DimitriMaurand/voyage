<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 70)]
    private ?string $nom_image = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'api_voyage_index', 'api_reservation_index'
    ])]

    private ?string $url_image = null;

    /**
     * @var Collection<int, Voyage>
     */
    #[ORM\ManyToMany(targetEntity: Voyage::class, mappedBy: 'Image')]
    private Collection $voyages;

    public function __construct()
    {
        $this->voyages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomImage(): ?string
    {
        return $this->nom_image;
    }

    public function setNomImage(string $nom_image): static
    {
        $this->nom_image = $nom_image;

        return $this;
    }

    public function getUrlImage(): ?string
    {
        return $this->url_image;
    }

    public function setUrlImage(string $url_image): static
    {
        $this->url_image = $url_image;

        return $this;
    }

    /**
     * @return Collection<int, Voyage>
     */
    public function getVoyages(): Collection
    {
        return $this->voyages;
    }

    public function addVoyage(Voyage $voyage): static
    {
        if (!$this->voyages->contains($voyage)) {
            $this->voyages->add($voyage);
            $voyage->addImage($this);
        }

        return $this;
    }

    public function removeVoyage(Voyage $voyage): static
    {
        if ($this->voyages->removeElement($voyage)) {
            $voyage->removeImage($this);
        }

        return $this;
    }
}
