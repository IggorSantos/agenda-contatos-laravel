@extends('layouts.main')

@section('title', 'Agenda')

@section('content') 


         
    <div class="jumbotron div-back">
        <div class="text-home col-md-6 col-sm-12">
            <p class="text-welcome mt-5">Bem vindo a sua nova agenda de contatos !!!</p>
            <p class="text-welcome mt-5">Salve o contato de quem você quiser !!!</p>
        </div>
        @if(Auth::check())
        <div class="col-md-6 col-sm-12"></div>        
       @else
        <div class="col-md-6 col-sm-12 buttons-home d-flex flex-column mt-5">
            <a href="/login" class="btn btn-success button-home mt-3"><i class="bi bi-plus-circle-fill"></i>Login</a>
            <a href="/register" class="btn btn-outline-success button-home mt-3"><i class="bi bi-plus-circle-fill"></i>Cadastro</a>
        </div>
        @endif

        
        <!--<img class="img-background" src="../img/background.png" alt="">-->
    </div>
@endsection