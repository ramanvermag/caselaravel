<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;

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
        //$routes = \Request::session()->get('allowed_routes');

        // print_r($routes);
        $users = User::all();

        $total_users=  count($users);
        // die;

        return view('dashboard.main',compact('routes','total_users'));
    }

}
