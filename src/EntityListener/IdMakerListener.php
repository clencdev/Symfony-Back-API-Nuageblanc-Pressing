<?php

namespace App\EntityListener;

use App\Entity\Client;
use App\Entity\Employ;
use App\Service\RandomIdGenerator;


class IdMakerListener
{
    private RandomIdGenerator $randomId;

    public function __construct(RandomIdGenerator $randomId)
    {
        $this->randomId = $randomId;
    }

    public function prePersist(Client $client): void
    {
        $this->makeClientId($client);
    }

    public function preUpdate(Client $client): void
    {
        $this->makeClientId($client);
    }

    public function prePersistEmploy(Employ $employ): void
    {
        $this->makeEmpId($employ);
    }

    public function preUpdateEmploy(Employ $employ): void
    {
        $this->makeEmpId($employ);
    }

    public function makeClientId(Client $client)
    {
        if($client->getClientId() === null) {
            $client->setClientId(
                $this->randomId->generateClientId()
                ); 
        }  
    }
    public function makeEmpId(Employ $employ)
    {
        if($employ->getEmpId() === null) {
            $employ->setEmpId(
                $this->randomId->generateEmpId()
                ); 
        }
        
        
    }
}
