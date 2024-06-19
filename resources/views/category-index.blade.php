<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .table{
            border: 1px solid #ccc;
        }
    </style>
    <title>Lista das categorias</title>
</head>
<body>
@forelse ($categories as $category)
            <div class="table">
                id:
                <span>{{$category->id}}</span>
            </div>
            <div class="table">
            nome:
            <span>{{$category->name}}</span>
            </div>
            <div class="table">
            ação:
            <span>
            @if(session('sucess'))
            <p style="color:blue">{{ session('sucess') }}</p>
            @endif
                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button>apagar categoria</button>
                </form>
                <a href="{{route('category.edit', ['category' => $category->id] )}}">Editar</a>
            </span>
        </div><br><br>
        @empty
        <p style="color:red">Nenhuma categoria encontrada</p>
        @endforelse
        <a href="{{route('home.index')}}">Voltar</a>
</body>
</html>