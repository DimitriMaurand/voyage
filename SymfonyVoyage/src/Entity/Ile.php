<?php

namespace App\Entity;

use App\Repository\IleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: IleRepository::class)]
class Ile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 70)]
    #[Groups([
        'api_voyage_index', 'api_reservation_index'
    ])]

    private ?string $nom_ile = null;

    /**
     * @var Collection<int, Voyage>
     */
    #[ORM\ManyToMany(targetEntity: Voyage::class, mappedBy: 'ile')]
    private Collection $voyages;

    public function __construct()
    {
        $this->voyages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomIle(): ?string
    {
        return $this->nom_ile;
    }

    public function setNomIle(string $nom_ile): static
    {
        $this->nom_ile = $nom_ile;

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
            $voyage->addIle($this);
        }

        return $this;
    }

    public function removeVoyage(Voyage $voyage): static
    {
        if ($this->voyages->removeElement($voyage)) {
            $voyage->removeIle($this);
        }

        return $this;
    }
}
