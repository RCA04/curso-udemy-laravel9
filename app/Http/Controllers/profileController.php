<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index(Request $request){
        $user = auth()->user();

        if(!$user){
            
            return redirect()->route('login.form');
        };

        return view('admin.profile');        
    }

    public function edit(Request $request){
        $user = auth()->user();
        if(!$user){
            
            return redirect()->route('login.form');
        };

        return view('admin.profileEditor', ['user' => $user]);        
    }

    public function update(Request $request){
        
 

        $name = $request->input('name'); 
        $email = $request->input('email');
        $file = null;

        if ($request->hasFile('photo')) {
               
            $file = $request->file('photo');
            $fileName = date('dmYH') . '_' . $file->getClientOriginalName();
            $file = $file->move(public_path('img/profiles'), $fileName);
        
        //    
        // 
        // $user['photo'] = 'photo';
        }
        else {
            $fileName = auth()->user()->photo;
        }


        if(auth()->user()->name != $name){
        
        $validate = $request->validate([
        'name'=>['required','string'],
        ],
        [
            'name.required'=> 'O campo Nome é obrigatorio!',
        ]
    );}


    if(auth()->user()->email != $email){
        
        $validate = $request->validate([
        'email' =>['required', 'email', 'unique:users,email'],
        ],
        [
            'email.required'=>'O campo de Email é obrigatorio!',
            'email.email'=>'O email não é válido!',
            'email.unique'=>'Email já cadastrado insira outro!',
        ]
    );}


        $user = auth()->user();
        $user->name = $name;
        $user->email = $email;
        $user->photo = $fileName;
        $user->save();

 
         return redirect("/perfil");
    

    
}
}