<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credenciais = $request->validate([
            'name'=>['required','string'],
            'email' =>['required', 'email', 'unique:users,email'],
            'password'=>['required'],
        ],
        [
            'name.required'=> 'O campo Nome é obrigatorio!',
            'email.required'=>'O campo de Email é obrigatorio!',
            'email.email'=>'O email não é válido!',
            'email.unique'=>'Email já cadastrado insira outro!',
            'password.required'=>'O campo senha é obrigatorio!',
        ]   
        );

            $user = $request->all();

            if($request->file('photo')){
                $file = $request->file('photo');
                $fileName = date('dmYH').'_'.$file->getClientOriginalName(). '.' .$file->getClientOriginalExtension();
                $file->move(public_path('img/profiles'), $fileName);
                $user['photo'] = $fileName;
            }




            $user[ 'password']= bcrypt($request->password);
            $user = User::create($user);

            Auth::login($user);
        
            return redirect()->route('admin.dashboard');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
