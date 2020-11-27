<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class BuyerCategoryController extends ApiController
{
    /**
     * BuyerCategoryController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('scope:read-general')->only(['index']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Buyer $buyer)
    {
        $sellers = $buyer->transactions()->with('product.categories')
            ->get()
            ->pluck('product.categories')
            ->collapse()
            ->unique('id')
            ->values();

        return $this->showAll($sellers);
    }
}
