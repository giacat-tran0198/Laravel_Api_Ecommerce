<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class BuyerProductController extends ApiController
{
    /**
     * BuyerProductController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('scope:read-general')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     * @param Buyer $buyer
     * @return JsonResponse
     */
    public function index(Buyer $buyer)
    {
        $products = $buyer
            ->transactions()
            ->with('product')
            ->get()
            ->pluck('product');
        return $this->showAll($products);
    }
}
