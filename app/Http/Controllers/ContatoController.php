<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatoRequest;
use Illuminate\Http\Request;
use App\Models\Contato;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;

class ContatoController extends Controller
{
    public function index(){
        /*$contatos = Contato::all();*/

        return view('welcome');
    }

    public function create(){
        return view('contatos.create');
    }

    public function store(ContatoRequest $request){  

       if($request->validated()){
            $contato = new Contato();

            $contato->nome = $request->nome;
            $contato->telefone = $request->telefone;
            $contato->email = $request->email;


            $user = auth()->user();
            $contato->user_id = $user->id;
    
            $contato->save();
            return redirect('/admin/dashboard')->with('msg', 'Contato criado com sucesso!');


          
       }

       

    }

     public function destroy($id){
        Contato::findOrFail($id)->delete();
        return redirect('/admin/dashboard')->with('msg', 'Contato excluído com sucesso!');
    }

    public function show($key){
        $id = Crypt::decrypt($key);
        $contato = Contato::findOrFail($id);
        Gate::authorize('ver-contato', $contato);
        return view('contatos.show', ['contato' => $contato]);
    }

    public function update(ContatoRequest $request){
        if($request->validated()){
            Contato::findOrFail($request->id)->update($request->all());  
            return redirect('/admin/dashboard')->with('msg', 'Contato atualizado com sucesso!');
        }       

    }
}
