<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar categoria</title>
</head>
<body>
    <form action="{{ route('category.update', ['category' => $category->id]) }}" method="post">
        @csrf
        @method('put')
        <input type="number" value="{{$category->id}}" disabled>
        @if(session('sucess'))
            <p style="color:blue">{{ session('sucess') }}</p>
        @endif
        <input type="text" name="name" value="{{$category->name}}"  placeholder="nome" required>
        @error('name')
        <p>{{$message}}</p>
        @enderror
        <button>Salvar</button>
    </form>
</body>
</html>