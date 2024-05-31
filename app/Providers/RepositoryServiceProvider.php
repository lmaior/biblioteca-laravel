<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Books\BooksRepositoryInterface;
use App\Repositories\Books\BooksRepository;

class RepositoryServiceProvider extends ServiceProvider
{
  
    public array $bindings = [
        BooksRepositoryInterface::class => BooksRepository::class,
    ];
    // public function register()
    // {
    //     $repositories = [
    //         'App\Repositories\BooksRepositoryInterface' => 'App\Repositories\BooksRepository',
    //     ];
    // }

  
}
