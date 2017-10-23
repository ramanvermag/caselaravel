<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;

use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;

class PermissionController extends Controller
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
        $permissions = Permission::all();

        return view('permissions.index')->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $routeCollection = Route::getRoutes();

        $route_list = [];

        foreach ($routeCollection as $value) 
        {
            $method = [];

            foreach ($value->methods() as $method_name) 
            {
               $method[] = $method_name;
            }
                   
            $route_list[] = [ 'uri' => $value->uri(), 'method' =>$method ];
            
        }

   
            array_multisort ( $route_list , SORT_ASC , SORT_REGULAR  );
            return view('permissions.create',  compact('route_list'))->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name'=>'required|max:40|unique:permissions',
            
        ]);
        
        $allowed_routes = [];
        $name = $request['name'];
        $Permission_data = input::All();



        unset($Permission_data['name']);
        unset($Permission_data['_token']);

        $allowed_routes   = json_encode($Permission_data);
        $permission       = new Permission();
        $permission->name = $name;
        $permission->allowed_routes = $allowed_routes;

        $roles = $request['roles'];

        $permission->save();

        // if (!empty($request['roles'])) 
        // {
        //     foreach ($roles as $role) 
        //     {
        //         $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

        //         $permission = Permission::where('name', '=', $name)->first();   
        //         $r->givePermissionTo($permission);
        //     }
        // }
        return redirect()->route('permissions.index')->with('flash_message','Permission Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('permissions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$roles = Role::get();
        $routeCollection = Route::getRoutes();
        $route_list = [];

        // foreach ($routeCollection as $value) 
        // {
        //     $method_array = $value->methods();

            
        //     $method = [];

        //     foreach ($method_array as $method_name) 
        //     {
        //        $method[] = $method_name;
        //     }
                   
        //     $route_list[] = ['uri' => $value->uri(), 'method' =>$method ];
                   
        //     array_push($route_list, ['uri' => $value->uri(), 'method' =>$method ]);
            
        // }

        foreach ($routeCollection as $value) 
        {
            $method = [];

            foreach ($value->methods() as $method_name) 
            {
               $method[] = $method_name;
            }
                   
            $route_list[] = ['uri' => $value->uri(), 'method' =>$method ];
            
        }

   
        array_multisort ( $route_list , SORT_ASC , SORT_REGULAR  );

        $permission = Permission::find($id);



        $allowed_routes = json_decode($permission->allowed_routes,true);
       // print_r($allowed_routes);
        //die;

        return view('permissions.edit', compact('permission', 'route_list', 'allowed_routes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $this->validate($request, [
            'name'=>'required|max:40',
        ]);


    
        
        $allowed_routes = [];

        $name = $request['name'];
        $Permission_data = input::All();

        // print_r($Permission_data);
        // die;
        unset($Permission_data['name']);
        unset($Permission_data['_token']);
        unset($Permission_data['_method']);

        $allowed_routes = json_encode($Permission_data);


        // print_r($allowed_routes);
        // die;



        $permission->name = $name;
        $permission->allowed_routes = $allowed_routes;

        // $roles = $request['roles'];
        
        $permission->save();

        return redirect()->route('permissions.index')
                         ->with('flash_message','Permission "'. $permission->name .'" Updated successfully!');



















        
        // $input = $request->all();
        // //print_r($input);


        // foreach ($input as $key => $value) 
        // {
        //     if (condition) {
        //         # code...
        //     }
        //    echo $key;
        //    echo "<br>";
        // }
        // die("here");
        // $permission->fill($input)->save();

        // return redirect()->route('permissions.index')
        //     ->with('flash_message',
        //      'Permission'. $permission->name.' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        
        if ($permission->name == "Administer roles & permissions") {
            return redirect()->route('permissions.index')
            ->with('flash_message',
             'Cannot delete this Permission!');
        }
        
        $permission->delete();

        return redirect()->route('permissions.index')
            ->with('flash_message',
             'Permission deleted!');
    }
}
