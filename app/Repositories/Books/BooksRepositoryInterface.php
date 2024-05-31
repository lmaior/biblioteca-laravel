<?php

namespace App\Repositories\Books;

use Illuminate\Http\Request;
interface BooksRepositoryInterface
{
    public function index($search);
    public function store(Request $request);
    public function edit($id);
    public function update(Request $request);
    public function delete($id);
    public function show($id);
}


