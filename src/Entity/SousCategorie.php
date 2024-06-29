<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SousCategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousCategorieRepository::class)]
#[ApiResource]
class SousCategorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, ServiceItem>
     */
    #[ORM\OneToMany(targetEntity: ServiceItem::class, mappedBy: 'sousCategorieId')]
    private Collection $serviceItemId;

    public function __construct()
    {
        $this->serviceItemId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, ServiceItem>
     */
    public function getServiceItemId(): Collection
    {
        return $this->serviceItemId;
    }

    public function addServiceItemId(ServiceItem $serviceItemId): static
    {
        if (!$this->serviceItemId->contains($serviceItemId)) {
            $this->serviceItemId->add($serviceItemId);
            $serviceItemId->setSousCategorieId($this);
        }

        return $this;
    }

    public function removeServiceItemId(ServiceItem $serviceItemId): static
    {
        if ($this->serviceItemId->removeElement($serviceItemId)) {
            // set the owning side to null (unless already changed)
            if ($serviceItemId->getSousCategorieId() === $this) {
                $serviceItemId->setSousCategorieId(null);
            }
        }

        return $this;
    }
}
