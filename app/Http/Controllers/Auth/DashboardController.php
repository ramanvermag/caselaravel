<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;

use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        
        // $routes = $request->session()->get('allowed_routes');

        //print_r($routes);
        //die;
        
        return view('dashboard.index');
    }


}
