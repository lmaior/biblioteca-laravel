<?php

namespace App\Repositories\Users;

use Illuminate\Http\Request;

interface UsersRepositoryInterface
{
    public function store($userData);
}
