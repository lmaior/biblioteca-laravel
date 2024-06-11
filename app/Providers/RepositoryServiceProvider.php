<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserService;
use App\Repositories\Books\BooksRepository;
use App\Repositories\Users\UsersRepository;
use App\Repositories\Address\AddressRepository;
use App\Repositories\Books\BooksRepositoryInterface;
use App\Repositories\Users\UsersRepositoryInterface;
use App\Repositories\Address\AddressRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{

    public array $bindings = [
        BooksRepositoryInterface::class => BooksRepository::class,
        UsersRepositoryInterface::class => UsersRepository::class,
        AddressRepositoryInterface::class => AddressRepository::class,

    ];

    public function register()
    {
        $this->app->bind(UserService::class, function ($app) {
            return new UserService(
                $app->make(UsersRepositoryInterface::class),
                $app->make(AddressRepositoryInterface::class)
            );
        });
    }
    // public function register()
    // {
    //     $repositories = [
    //         'App\Repositories\BooksRepositoryInterface' => 'App\Repositories\BooksRepository',
    //     ];
    // }


}
