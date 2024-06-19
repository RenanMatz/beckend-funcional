<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\User;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Transaction::all('cat');

        return view('category-index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        $transactionValidated = $request->validated();

        $transaction = new Transaction();
        $transaction->user_id = auth()->id();
        $transaction->category_id = $transactionValidated['category-id'];
        $transaction->value = $transactionValidated['transaction-value'];
        $transaction->condition = $transactionValidated['transaction-condition'];
        $transaction->transaction_date = $transactionValidated['transaction-date'];
        $transaction->description = $transactionValidated['transaction-description'];
        $transaction->save();

        $user = User::findOrFail(auth()->id());
            if ($transaction->condition === 'ganho') {
                $user->current_balance += $transaction->value;
            } elseif ($transaction->condition === 'gasto') {
                $user->current_balance -= $transaction->value;
            }
            $user->save();


        return redirect()->route('home.index')->with('sucess', 'Transação cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
