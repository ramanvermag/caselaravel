<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Auth;
use Session;

class DashboardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth', 'clearance']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        $routes = \Request::session()->get('allowed_routes');

        // print_r($routes);
        // die;


        return view('dashboard.main',compact('routes'));
    }

}
