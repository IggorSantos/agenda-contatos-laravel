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
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
        ], [
            'name.required' => 'O campo de Nome é obrigatório',
            'email.required' => 'O campo de email é obrigatório',
            'email.email' => 'O email não é válido',
            'email.unique' => 'Email já cadastrado',
            'password.required' => 'O campo de senha é obrigatório'
        ]
        );

        /*$user = $request->all();
        $user['password'] = bcrypt($request->password);*/        

        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $requestImage = $request->photo;
            $image = $request->file('photo')->getClientOriginalName();
        	$request->file('photo')->storeAs('avatars', $image, 'public');
            $requestImage->move(public_path('imgs/users'), $image);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if($request->hasFile('photo')){
            $user->photo = $image;
        }       
        

        //$user = User::create($user); 
        $user->save();
        Auth::login($user);
        return redirect()->route('admin.dashboard')->with('msg', 'Usuário criado com sucesso!');

      
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
