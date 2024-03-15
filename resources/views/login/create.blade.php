@extends('layouts.main')

@section('title', 'Cadastro')

@section('content')
    <form action="{{ route('users.store') }}" method="POST" class="mt-5" onsubmit="disabledButton()" enctype="multipart/form-data">
    @csrf
        <div class="form-container"> 

        <div class="form-group">
            <label for="photo">Selecione uma foto:</label>
            <input class="form-control-file" type="file" id="photo" name="photo" accept="image/png, image/jpeg" />
        </div>       

        <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                @if($errors->has('name'))
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div> 
                @endif
            </div>         
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
            <div class="mt-3 d-flex justify-content-center">  
                <button id="btnSubmit" type="submit" class="btn btn-primary">Cadastrar</button>
            </div>  
        </div>       
    </form> 
    <script>
    const disabledButton = () => {
           document.getElementById("btnSubmit").disabled = true;
            setTimeout(() => {
                document.getElementById("btnSubmit").disabled = false;
            }, 3000)

            return; 
        }
    </script>
@endsection    