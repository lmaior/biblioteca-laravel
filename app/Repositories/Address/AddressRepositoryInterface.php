<?php

namespace App\Repositories\Address;

interface AddressRepositoryInterface
{
    public function findOrCreate(array $addressData);
}

