<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\ApiController;
use App\Transaction;
use Illuminate\Http\JsonResponse;

class TransactionController extends ApiController
{
    /**
     * TransactionController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('scope:read-general')->only(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $transactions = Transaction::all();

        return $this->showAll($transactions);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Transaction $transaction
     * @return JsonResponse
     */
    public function show(Transaction $transaction)
    {
        return $this->showOne($transaction);
    }
}
