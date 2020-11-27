<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class BuyerController extends ApiController
{
    /**
     * BuyerController constructor.
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
    public function index()
    {
        $buyers = Buyer::all();
        return $this->showAll($buyers);
    }


    /**
     * Display the specified resource.
     *
     * @param Buyer $buyer
     * @return JsonResponse
     */
    public function show(Buyer $buyer)
    {
        return $this->showOne($buyer);
    }

}
