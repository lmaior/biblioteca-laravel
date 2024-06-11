<?php

namespace App\Repositories\Address;

use App\Models\Address;

class AddressRepository implements AddressRepositoryInterface
{
    public function findOrCreate(array $addressData)
    {
        $address = Address::where('zipcode', $addressData['zipcode'])
                          ->where('number', $addressData['number'])
                          ->first();

        // Se o endereço não for encontrado, criar um novo
        if (!$address) {
            $address = Address::create($addressData);
        }

        return $address;
    }
}
