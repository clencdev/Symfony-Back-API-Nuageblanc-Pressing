<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
#[ApiResource]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $total = null;

    #[ORM\ManyToOne(inversedBy: 'OrdersId')]
    private ?orderdetail $OrderDetailId = null;

    #[ORM\ManyToOne(inversedBy: 'orderId')]
    private ?Client $ClientId = null;

    public function __construct()
    {
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

        

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): static
    {
        $this->total = $total;

        return $this;
    }

    public function getOrderDetailId(): ?orderdetail
    {
        return $this->OrderDetailId;
    }

    public function setOrderDetailId(?orderdetail $OrderDetailId): static
    {
        $this->OrderDetailId = $OrderDetailId;

        return $this;
    }

    public function getClientId(): ?Client
    {
        return $this->ClientId;
    }

    public function setClientId(?Client $ClientId): static
    {
        $this->ClientId = $ClientId;

        return $this;
    }

    
}
