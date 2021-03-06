<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use ApiResponser;


    /**
     * ApiController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }
}
