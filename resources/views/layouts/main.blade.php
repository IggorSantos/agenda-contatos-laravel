<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="/css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        
        <!-- Styles -->
    </head>
    <header class="header mt-3">
            <a href="/" class="link-home"><h1 class="title">Agenda de Contatos</h1></a>
            @auth
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if(auth()->user()->photo)    
                    <img class="image-preview" src="/imgs/users/{{ auth()->user()->photo }}" />
                 @else
                    <img class="image-preview" src="/imgs/users/user.png" />
                 @endif
                </button>
                <ul class="dropdown-menu">
                    <p class="text-center">Olá, {{auth()->user()->name}}</p>
                    <li><a class="dropdown-item" href="{{ route('admin.dashboard')}}">Meus Contatos</a></li>
                    <li><a class="dropdown-item" href="{{ route('login.logout')}}">Sair</a></li>
                </ul>
            </div>
            @endauth
            <!--<a href="/contatos/create" class="btn btn-success"><i class="bi bi-plus-circle-fill"></i>Novo Contato</a>-->
    </header>   
    <main>
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                    @endif
                    @if(session('sucesso'))
                        <p class="msg">{{ session('sucesso') }}</p>
                    @endif
                    @if(session('erro'))
                        <p class="erro">{{ session('erro') }}</p>
                    @endif
                    @yield('content')  
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
    <script>
        $(document).ready(function () {
            $('.delete-company').click(function () {
                var id = $(this).attr('data-id');
                var url = $(this).attr('data-url');
    
                $("#deleteForm", 'input').val(id);
                $("#deleteForm").attr("action", url);
            });
        });  
    </script>   
</body>
</html>
