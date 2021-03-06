<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\ApiController;
use App\Transaction;
use Illuminate\Http\JsonResponse;

class TransactionSellerController extends ApiController
{
    /**
     * TransactionSellerController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('scope:read-general')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Transaction $transaction
     * @return JsonResponse
     */
    public function index(Transaction $transaction)
    {
        $seller = $transaction->product->seller;

        return $this->showOne($seller);
    }
}
