<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Seller;
use Illuminate\Http\JsonResponse;

class SellerCategoryController extends ApiController
{
    /**
     * SellerCategoryController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('scope:read-general')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Seller $seller
     * @return JsonResponse
     */
    public function index(Seller $seller)
    {
        $categories = $seller->products()
            ->whereHas('categories')
            ->with('categories')
            ->get()
            ->pluck('categories')
            ->collapse()
            ->unique('id')
            ->values();

        return $this->showAll($categories);
    }

}
