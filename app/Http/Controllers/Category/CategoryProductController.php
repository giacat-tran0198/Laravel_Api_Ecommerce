<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryProductController extends ApiController
{
    /**
     * CategoryProductController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function index(Category $category)
    {
        $products = $category->products;
        return $this->showAll($products);
    }
}
