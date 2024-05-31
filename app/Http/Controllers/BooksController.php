<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Carbon\Carbon;
use App\Repositories\Books\BooksRepositoryInterface;

class BooksController extends Controller
{

    protected $booksRepository;

    public function __construct(BooksRepositoryInterface $booksRepository)
    {
        $this->booksRepository = $booksRepository;
    }

    public function index()
    {
        $search = request('search');
        $books = $this->booksRepository->index($search);
        $currentpage = 'main';

        return view('books.index', ['currentpage' => $currentpage, 'livros' => $books, 'search' => $search]);
        // return view('teste');
    }

    public function create()
    {
        $currentpage = '';
        return view('books.create', ['currentpage' => $currentpage]);
    }

    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->pages = $request->pages;
        $book->description = $request->description;
        $book->release_date = $request->release_date;
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
        $book->save();
        return redirect()->route('main')->with('msg', 'Criado com sucesso!');;
    }

    public function edit($id)
    {
        $book = Book::find($id);
        // $book->release_date = Carbon::parse($book->release_date)->toDateString();
        $release_date = substr($book->release_date, 0, 10);
        
        $currentpage = "";
        return view('books.edit', compact('book', 'currentpage', 'release_date'));
    }

    public function update(Request $request)
    {
        // $unupdatedBook = Book::findOrFail($request->id);
        // $unupdatedBook->title = $request->title;
        // $unupdatedBook->author = $request->author;
        // $unupdatedBook->description = $request->description;
        // $unupdatedBook->save();

    //dd($request->all());
    $data = $request->all();
    if($request->hasFile('image') && $request->file('image')->isValid()){

        $requestImage = $request->image;

        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        $requestImage->move(public_path('img/books'), $imageName);

        $data['image'] = $imageName;
    }
        Book::findOrFail($request->id)->update($data);
        return redirect()->route('main')->with('msg', 'Alterado com sucesso!');
    }

    public function delete($id)
    {
        Book::findOrFail($id)->delete();
        return redirect()->route('main')->with('msg', 'Deletado com sucesso!');
    }

    public function teste()
    {
        $currentpage = 'teste';

        return view('teste', ['currentpage' => $currentpage]);
        // return view('teste');
    }

    public function show($id)
    {
        $book = Book::find($id);
        // $book->release_date = Carbon::parse($book->release_date)->toDateString();
        $release_date = substr($book->release_date, 0, 10);
        $book->release_date = $release_date;
        $currentpage = "";
        return view('books.show', compact('book', 'currentpage', 'release_date'));
    }
}
