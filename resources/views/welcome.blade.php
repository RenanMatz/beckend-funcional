<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
    </head>
    <body>
        <form action="{{route('login.store')}}" method="POST">
            @csrf
            @error('error')
            <p>erro</p>
            @enderror
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="password" placeholder="senha" required>
            <button>Entrar</button>
        </form>
        <a href="{{route('signUp')}}">Não possui uma conta?</a>
    </body>
</html>
