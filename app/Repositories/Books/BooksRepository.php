<?php

namespace App\Repositories\Books;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Repositories\Books\BooksRepositoryInterface;

class BooksRepository implements BooksRepositoryInterface
{
    public function index($search)
    {
        if($search != '') {
           return Book::where('title', 'LIKE', "%{$search}%")->get();
        }
        else {
            return Book::all();
        }
    }

    public function show($id)
    {
        return Book::findOrFail($id);
    }

    public function store($request)
    {
        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->pages = $request->pages;
        $book->description = $request->description;
        $book->release_date = $request->release_date;
        //TODO criar função para salvar imagem em outro método ou classe
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/books'), $imageName);

            $book->image = $imageName;
        }
        //Carbon::parse($date)->format('Ymd H:i:s');
        // $book->created_at = Carbon::parse(Carbon::now())->format('d-m-Y\TH:i:s.v');
        //$book->created_at = null;
        //dd('data: ' . $book->created_at);
        //$book->updated_at = null;
        return $book->save();
    }

    public function edit($id)
    {
        return Book::find($id);
        // $book->release_date = Carbon::parse($book->release_date)->toDateString();
    }

    public function update(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/books'), $imageName);

            $data['image'] = $imageName;
        }

        return Book::findOrFail($request->id)->update($data);
    }

    public function delete($id)
    {
        return Book::findOrFail($id)->delete();
    }
}


