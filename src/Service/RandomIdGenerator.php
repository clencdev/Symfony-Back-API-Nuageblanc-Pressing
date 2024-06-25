<?php

namespace App\Service;

class RandomIdGenerator
{
    public function generateClientId(): string
    {
        return '1' . str_pad(mt_rand(0, 999999999), 9, '0', STR_PAD_LEFT);
    }

    public function generateEmpId(): string
    {
        return '2' . str_pad(mt_rand(0, 999999999), 9, '0', STR_PAD_LEFT);
    }
}