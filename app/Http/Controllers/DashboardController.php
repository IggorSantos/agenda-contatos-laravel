<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class DashboardController extends Controller
{
    public function index(){
        $user = auth()->user();

        $search = request('search');
        if($search){
            $contatos = Contato::where([
                ['nome', 'like', '%'.$search.'%']
            ])->where('user_id', $user->id)
            ->get();


        } else{
            $contatos = Contato::where('user_id', $user->id)->get();
        }       
           

        return view('admin.dashboard', ['contatos' => $contatos]);
    }

    public function list(){
        $user = auth()->user();
        $contatos = $user->contatos;
    }
}
