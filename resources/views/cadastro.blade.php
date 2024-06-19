<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form action="{{route('signUp.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nome" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="password" placeholder="Senha" require>
        <input type="number" name="initial-balance" placeholder="Saldo inicial" required>
        <button>Cadastrar</button>
    </form>
    <a href="{{route('login')}}">Já possui uma conta?</a>
</body>
</html>