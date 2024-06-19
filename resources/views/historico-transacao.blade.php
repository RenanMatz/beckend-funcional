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
    <title>Histórico de transacao</title>
</head>
<body>

<h1>Read transações</h1>
        <table class="transaction-table">
                    <tr>
                        <th>id</th>
                        <th>valor</th>
                        <th>condição</th>
                        <th>categoria</th>
                        <th>data de transação</th>
                        <th>descrição</th>
                        <th>ações</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>RS <span>200</span>,00</td>
                        <td>gasto</td>
                        <td>contas de serviços</td>
                        <td>13/06/2024</td>
                        <td class="transaction-table-description">conta de luz</td>
                        <td class="transaction-last-item">
                            <form action="" method="POST">
                                @csrf
                                @method('delete')
                                <button class="delete-transaction-btn">apagar</button>
                            </form>
                            <a href="src/html/update-transaction.html"><i class="fa-regular fa-pen-to-square"></i></a>
                        </td>
                        <!-- Aqui é um foreach com os dados do select -->
                    </tr>
                </table>
        <br><br><a href="{{route('home.index')}}">Voltar</a>
</body>
</html>