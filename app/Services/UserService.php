<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use App\Repositories\Users\UsersRepositoryInterface;
use App\Repositories\Address\AddressRepositoryInterface;

class UserService
{
    protected $userRepository;
    protected $addressRepository;

    public function __construct(UsersRepositoryInterface $userRepository, AddressRepositoryInterface $addressRepository)
    {
        $this->userRepository = $userRepository;
        $this->addressRepository = $addressRepository;
    }

    public function createUserWithAddress($request)
    {
        return DB::transaction(function () use ($request){
            $address = $this->getAddressData($request);
            $user = $this->getUserData($request, $address->id);
            return $this->userRepository->store($user);
        });
    }

    public function getUserData($request, $address_id){
        $userData =
        [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'address_id' => $address_id
        ];
        return $userData;
        }

    public function getAddressData($request){
        $addressData =
        [
        'zipcode' => $request['zipcode'],
        'city' => $request['city'],
        'state' => $request['state'],
        'address' => $request['address'],
        'neighborhood' => $request['neighborhood'],
        'number' => $request['number']
        ];
        return $this->addressRepository->findOrCreate($addressData);
    }
}
