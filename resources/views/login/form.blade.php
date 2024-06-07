@extends('layouts.main')

@section('title', 'Login')

@section('content')
    <form action="{{ route('login.auth') }}" method="POST" class="mt-5">
    @csrf
        <div class="form-container">      
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                @if($errors->has('email'))
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div> 
                @endif
            </div> 
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                @if($errors->has('password'))
                    <div class="alert alert-danger">{{ $errors->first('password') }}</div> 
                @endif
            </div> 
            <div class="form-group">
                <label for="password">Lembrar-me</label>
                <input type="checkbox" name="remember">
            </div>
            <div class="mt-3 d-flex justify-content-evenly">  
                <button id="btnSubmit" type="submit" class="btn btn-primary">Entrar</button>
                <a id="btnSubmit" href="/" class="btn btn-danger">Voltar</a>
            </div>  
        </div>       
    </form> 
@endsection    