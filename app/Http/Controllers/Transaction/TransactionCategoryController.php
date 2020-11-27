<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\ApiController;
use App\Transaction;
use Illuminate\Http\JsonResponse;

class TransactionCategoryController extends ApiController
{
    /**
     * TransactionCategoryController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Transaction $transaction
     * @return JsonResponse
     */
    public function index(Transaction $transaction)
    {
        $categories = $transaction->product->categories;

        return $this->showAll($categories);
    }
}
