@extends('layouts.main')

@section('title', 'Agenda')

@section('content')                                                            
     
    <div class="container contatos-dados d-flex mt-3 row">
    <p>Bem-vindo {{ auth()->user()->name }}</p>
    <div class="novo-contato">
        <a href="/contatos/create" class="btn btn-outline-primary"><i class="bi bi-plus-circle-fill"></i>Novo contato</a>
    </div>   
    <div class="busca">
        <form action="/admin/dashboard" method="get" class="form-search">
            <input type="text" id="search" name="search" class="form-control mt-3" placeholder="Procurar ...">
        </form>
    </div>
    @if(count($contatos) > 0)
        @foreach($contatos as $contato)  
                <div class="card col-md-3 mt-3" style="width: 18rem;background-color: #FDFD9B">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="icon-pin mt-1">
                            <i class="bi bi-pin-fill"></i>
                        </div>  
                        <div class="icons">
                            <a class="link-edit mt-1" href="/contatos/{{ Crypt::encrypt($contato->id) }}">
                                <i class="bi bi-pencil-square"></i>   
                            </a>                     
                            <button type="submit" class="button-icon"><i class="bi bi-trash-fill" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$contato->id}}"></i></button>

                        </div>
                        
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $contato->nome}}</h5>                     
                        <p class="card-text">{{ $contato->telefone }}</p>
                        <p class="card-text">{{ $contato->email }}</p>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal_{{$contato->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tem certeza que deseja deletar o seguinte contato?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ $contato->nome }}</p>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <form class="form-delete" action="/contatos/{{ $contato->id}}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="button-modal-delete btn btn-danger" data-bs-dismiss="modal">Deletar</button>
                                </form>                                            
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Voltar</button>
                            </div>
                        </div>
                    </div>
                </div> 
        @endforeach 
    @else
        <p>Não existem contatos cadastrados</p>
    @endif     



        <!-- Modal -->  

    </div>
@endsection