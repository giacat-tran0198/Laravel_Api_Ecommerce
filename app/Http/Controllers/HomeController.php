<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @return Renderable
     */
    public function getTokens()
    {
        return view('home.personal-tokens');
    }

    /**
     * @return Renderable
     */
    public function getAuthorizedClients()
    {
        return view('home.authorized-clients');
    }

    /**
     * @return Renderable
     */
    public function getClients()
    {
        return view('home.personal-clients');
    }
}
