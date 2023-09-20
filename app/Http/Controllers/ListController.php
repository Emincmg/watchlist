<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    /**
     * Method user() returns a User object while method guest() returns boolean, therefore it is either an object or "false".
     *
     * @var Authenticatable
     */
    private Authenticatable $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user() ?? Auth::guest();
            return $next($request);
        });

    }


    public function index() {

        $movies = $this->user->movies();

        return view('list',compact('movies'));
    }
}
