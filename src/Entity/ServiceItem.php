<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ServiceItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceItemRepository::class)]
#[ApiResource]
class ServiceItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $price = null;

    #[ORM\ManyToOne(inversedBy: 'serviceItemId')]
    private ?service $serviceId = null;

    #[ORM\ManyToOne(inversedBy: 'serviceItemId')]
    private ?item $ItemId = null;

    /**
     * @var Collection<int, Orderdetail>
     */
    #[ORM\OneToMany(targetEntity: Orderdetail::class, mappedBy: 'ServiceItemId')]
    private Collection $orderDetailId;

    #[ORM\ManyToOne(inversedBy: 'serviceItemId')]
    private ?category $categoryId = null;

    #[ORM\ManyToOne(inversedBy: 'serviceItemId')]
    private ?souscategorie $sousCategorieId = null;

   

    public function __construct()
    {
        $this->orderDetailId = new ArrayCollection();
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

    

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getServiceId(): ?service
    {
        return $this->serviceId;
    }

    public function setServiceId(?service $serviceId): static
    {
        $this->serviceId = $serviceId;

        return $this;
    }

    public function getItemId(): ?item
    {
        return $this->ItemId;
    }

    public function setItemId(?item $ItemId): static
    {
        $this->ItemId = $ItemId;

        return $this;
    }

    /**
     * @return Collection<int, Orderdetail>
     */
    public function getOrderDetailId(): Collection
    {
        return $this->orderDetailId;
    }

    public function addOrderDetailId(Orderdetail $orderDetailId): static
    {
        if (!$this->orderDetailId->contains($orderDetailId)) {
            $this->orderDetailId->add($orderDetailId);
            $orderDetailId->setServiceItemId($this);
        }

        return $this;
    }

    public function removeOrderDetailId(Orderdetail $orderDetailId): static
    {
        if ($this->orderDetailId->removeElement($orderDetailId)) {
            // set the owning side to null (unless already changed)
            if ($orderDetailId->getServiceItemId() === $this) {
                $orderDetailId->setServiceItemId(null);
            }
        }

        return $this;
    }

    public function getCategoryId(): ?category
    {
        return $this->categoryId;
    }

    public function setCategoryId(?category $categoryId): static
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getSousCategorieId(): ?souscategorie
    {
        return $this->sousCategorieId;
    }

    public function setSousCategorieId(?souscategorie $sousCategorieId): static
    {
        $this->sousCategorieId = $sousCategorieId;

        return $this;
    }

    
}
