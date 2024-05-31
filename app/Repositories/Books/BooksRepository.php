<?php

namespace App\Repositories\Books;
use App\Repositories\Books\BooksRepositoryInterface;
use App\Models\Book;

class BooksRepository implements BooksRepositoryInterface
{
    public function index($search)
    {
        if($search != '') {
           return $books = Book::where('title', 'LIKE', "%{$search}%")->get();
        }
        else{
            return $books = Book::all();
        }
    }

}


