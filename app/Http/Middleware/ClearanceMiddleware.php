<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;


class ClearanceMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) 
    {
        
        $allowed_routes_data = [];

        $user  = Auth::user();
        $roles = $user->roles ? $user->roles->first()->name : 'No role';
        $roles = $user->roles->toArray();
        

        // $uri = \Request::path(); 

       // print_r($roles);

        foreach ($roles as $role) 
        {
           
           $roleIds[] = $role['pivot']['role_id'];
        }


        foreach ($roleIds as $role_id) 
        {      
            $role_data = Role::with('permissions')->where('id', $role_id)->get();
            
            foreach ($role_data as $properties) 
            {
                foreach ($properties->permissions as $permission) 
                {
                    array_push($allowed_routes_data, json_decode($permission->allowed_routes, true));                
                }
            }
             
        }



        $d =[];

        foreach ($allowed_routes_data as $key => $value) 
        {
          $d =  array_merge($d,$value);
        }



        $allowed_routes = array_keys($d);

        //print_r($allowed_routes);

         $user_route_name   = \Request::route()->uri();
         $user_route_method = $request->method();

        $user_wants_to_access = $user_route_name."@".$user_route_method;
        //die;

         // /die();
        if (in_array($user_wants_to_access, $allowed_routes)) 
        {

            return $next($request);
        }
        else
        {
             abort('401');
        }

        return $next($request);
        
        /*

        if (Auth::user()->hasPermissionTo('Administer roles & permissions')) {
            return $next($request);
        }
        if ($request->is('0')) {
            if (!Auth::user()->hasPermissionTo('Create Post')) {
                abort('401');
            } else {
                return $next($request);
            }
        }
        
         if ($request->is('roles/create')) {
            if (!Auth::user()->hasPermissionTo('Create Roles')) {
                abort('401');
            } else {
                return $next($request);
            }
        }  
        */        
        // if ($request->is('posts/*/edit')) {
        //     if (!Auth::user()->hasPermissionTo('Edit Post')) {
        //         abort('401');
        //     } else {
        //         return $next($request);
        //     }
        // }
        // if ($request->isMethod('Delete')) {
        //     if (!Auth::user()->hasPermissionTo('Delete Post')) {
        //         abort('401');
        //     } else {
        //         return $next($request);
        //     }
        // }

        // if ($request->is('profile')) {
        //     if (!Auth::user()->hasPermissionTo('View Profile')) {
        //         abort('401');
        //     } else {
        //         return $next($request);
        //     }
        // }
        // if ($request->is('profile/*/edit')) {
        //     if (!Auth::user()->hasPermissionTo('Edit profile')) {
        //         abort('401');
        //     } else {
        //         return $next($request);
        //     }
        // }

        

        return $next($request);
    }
}