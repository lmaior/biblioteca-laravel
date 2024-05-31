<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        if($this->booksRepository->store($request)){
            return redirect()->route('main')->with('msg', 'Criado com sucesso!');;
        } else{
            return redirect()->route('main')->with('msg-error', 'Erro ao salvar!');;
        }
    }

    public function edit($id)
    {
        $book = $this->booksRepository->edit($id);
        $release_date = substr($book->release_date, 0, 10);
        $currentpage = "";
        return view('books.edit', compact('book', 'currentpage', 'release_date'));
    }

    public function update(Request $request)
    {
        if($this->booksRepository->update($request)){
            return redirect()->route('main')->with('msg', 'Atualizado com sucesso!');;
        } else{
            return redirect()->route('main')->with('msg-error', 'Erro ao atualizar!');;
        }
    }

    public function delete($id)
    {
        if($this->booksRepository->delete($id)){
            return redirect()->route('main')->with('msg', 'Excluído com sucesso!');;
        } else{
            return redirect()->route('main')->with('msg-error', 'Erro ao excluir!');;
        }
    }

    public function teste()
    {
        $currentpage = 'teste';
        return view('teste', ['currentpage' => $currentpage]);
    }

    public function show($id)
    {
        $book = $this->booksRepository->show($id);
        // $book->release_date = Carbon::parse($book->release_date)->toDateString();
        $release_date = substr($book->release_date, 0, 10);
        //$book->release_date = $release_date; nao funciona
        $currentpage = "";
        return view('books.show', compact('book', 'currentpage', 'release_date'));
    }
}
