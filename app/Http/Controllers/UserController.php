<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;


class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create()
    {
        return view('public.users.create');
    }

    public function store(Request $request)
    {

        // $validatedData = $request->validate([
        //     'zipcode' => 'required|digits:8',
        // ]);

        if( $request->input('zipcode.length') != 8){

            if($this->userService->createUserWithAddress($request->all())){
                return redirect()->route('main')->with('msg', 'Cadastrado com sucesso!');
            }
            else{
                return redirect()->route('main')->with('msg-error', 'Erro ao cadastrar!');
            }
         }
        else
        {
            return redirect()->route('main')->with('msg-error', 'Erro ao cadastrar! CEP deve conter OITO digítos');
        }
    }
}
