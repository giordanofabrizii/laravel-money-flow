<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();

        return view('transactions.index',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('transactions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;

        $newTransaction = new Transaction($data);
        $newTransaction->save();
        return redirect()->Route('transactions.show',$newTransaction);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show',compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $categories = Category::all();
        return view('transactions.edit',compact('transaction','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $data = $request->validated();

        $transaction->update($data);
        return redirect()->route('transactions.show', $transaction);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index');
    }

    /**
     * Return the transactions within the given year
     *
     * @param [type] $type
     * @param [type] $value
     * @param [type] $year
     * @return void
     */
    public function getTransactions($type, $value, $year)
{
    $user = Auth::user();

    if ($type === 'month') { // if a month is requested
        $month = Carbon::parse("01 $value $year")->month;
        $income = $user->transactions()->where('type', 1)
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->sum('amount');
        $outcome = $user->transactions()->where('type', 0)
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->sum('amount');
    } else { // if its all the year requested
        $income = $user->transactions()->where('type', 1)
            ->whereYear('date', $value)
            ->sum('amount');
        $outcome = $user->transactions()->where('type', 0)
            ->whereYear('date', $value)
            ->sum('amount');
    }

    $balance = $income - $outcome;

    // return the data in a json file
    return response()->json([
        'incoming' => $income,
        'outcoming' => $outcome,
        'balance' => $balance
    ]);
}
}
