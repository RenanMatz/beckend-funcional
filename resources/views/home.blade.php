<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <section>
        <h1>Dashboard</h1>
        <div>
            Ganho mensal
            <span></span>
        </div>
        <div>
            Gasto mensal
            <span></span>
        </div>
        <div>
            Ganho e gasto total
            <span></span>
        </div>
        <div>
            Orçamento
            <span></span>
        </div>
        <div>
            Saldo atual
            <span></span>
        </div>
        <div>
            Lucro liquido mensal
            <span></span>
        </div>
        <div>
            Lucro liquido Anual
            <span></span>
        </div>
    </section>

    <section>
        <h1 id="transactions">Transações</h1>
        <form action="{{route('transaction.store')}}" method="POST">
            @csrf
            @if(session('sucess'))
            <p style="color:blue">{{ session('sucess') }}</p>
            @endif
            <input type="number" name="category-id" placeholder="Id categoria" required>
            <input type="number" name="transaction-value" placeholder="Valor" required>
            <select name="transaction-condition">
                <option value="gasto">Gasto</option>
                <option value="ganho">Ganho</option>
            </select>
            <input type="date" name="transaction-date" placeholder="Data da transação" required>
            <input type="text" name="transaction-description" placeholder="descrição">
            <button>Salvar</button>
        </form>

        
    </section>


    <section>
        <h1>Gastos e ganho</h1>
        <form action="" method="POST">
            <input type="text" name="ie-name" placeholder="nome" required>
            <input type="number" name="value" placeholder="Valor" required>
            <select name="ie-condition" id="">
                <option value="ganho">ganho</option>
                <option value="gasto">gasto</option>
            </select>
            <select name="ie-category" id="">
                <option value=""></option>
            </select>
            <select name="regularity">
                <option value="anual">Anual</option>
                <option value="mensal">Mensal</option>
                <option value="semanal">Semanal</option>
                <option value="diário">Diário</option>
            </select>
            <input type="date" name="start-date" placeholder="data inicial" required>
            <input type="date" name="due-date" placeholder="data de pagamento">
        </form>
    </section>


    <section>
        <div>
            <h1>Orçamento</h1>
            <div>
                nome
                <span></span>
            </div>
            <div>
                status
                <span></span>
            </div>
            <div>
                valor planejado
                <span></span>
            </div>
            <div>
                Valor investido
                <span></span>
            </div>
            <div>
                Progresso
                <span></span>
            </div>
            <div>
                Formato de pagamento
                <span></span>
            </div>
            <div>
                Qnt de parcelas
                <span></span>
            </div>
            <div>
                Juros
                <span></span>
            </div>
            <div>
                descrição
                <span></span>
            </div>
            <form action="" method="POSt">
                <input type="number" maxlength="3" name="transaction-id" placeholder="id transação" required>
                <button>Salvar</button>
            </form>
            <form action="" method="POST">
                @csrf
                @method('delete')
                <button>apagar</button>
            </form>
        </div>
    </section>


    <section>
        <h1>Categoria</h1>
        <form action="{{route('category.store')}}" method="POST">
            @csrf
            @if(session('sucess'))
            <p style="color:blue">{{ session('sucess') }}</p>
            @endif
            <input type="text" name="category-name">
            @error('category-name')
            <p style="color: red">{{$message}}</p>
            @enderror
            <button>Cadastrar</button>
        </form><br>
        <form action="{{route('category.index')}}" method="POST">
            @csrf
            <button>Ver categorias</button>
        </form>
        
        
        
        
    </section>



    <section>
        <h1>perfil</h1>
        <form action="" method="POST">
            <input type="text" name="user-name" value="" request>
            <button>Salvar alterações</button>
        </form>
        <form action="" method="POST">
            @csrf
            @method('delete')
            <button>apagar conta</button>
        </form>
        <a href="">Alterar senha</a>
    </section>

    <!-- @if(auth()->check())
    <p>voce está logado</p>
    @endif -->

    <form action="{{route('login.destroy')}}" method="POST">
        @csrf
        @method('delete')
        <button>Sair</button>
    </form>
</body>
</html>