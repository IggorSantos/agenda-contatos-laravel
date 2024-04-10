@extends('layouts.main')

@section('title', 'Cadastrar Contato')

@section('content')
    <form action="/contatos" method="POST" class="mt-5" onsubmit="disabledButton()">
    @csrf
        <div class="form-container">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{old('nome')}}">
                @if($errors->has('nome'))
                    <div class="alert alert-danger">{{ $errors->first('nome') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" onkeyup="handlePhone(event)" maxlength="15" value="{{old('telefone')}}">
                @if($errors->has('telefone'))
                    <div class="alert alert-danger">{{ $errors->first('telefone') }}</div> 
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                @if($errors->has('email'))
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div> 
                @endif
            </div> 
            <div class="mt-3 d-flex justify-content-evenly">  
                <button id="btnSubmit" type="submit" class="btn btn-primary">Cadastrar</button>
                <a id="btnSubmit" href="/admin/dashboard" class="btn btn-danger">Cancelar</a>
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

        const handlePhone = (event) => {
        let input = event.target;
        input.value = phoneMask(input.value);
        };

      const phoneMask = (value) => {
        if (!value) return "";
        value = value.replace(/\D/g,'');
        value = value.replace(/(\d{2})(\d)/,"($1) $2");
        value = value.replace(/(\d)(\d{4})$/,"$1-$2");
        return value;
        };    
    </script> 
@endsection     
