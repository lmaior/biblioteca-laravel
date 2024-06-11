<?php

namespace App\Repositories\Users;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Users\UsersRepositoryInterface;

class UsersRepository implements UsersRepositoryInterface
{

    public function store($userData){
        $user = User::create($userData);
        return $user->save();
    }
}
