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
    public function handle($request, Closure $next) {
        
        $allowed_routes = [];
        $user = Auth::user();
        $roles = $user->roles ? $user->roles->first()->name : 'No role';
        $roles = $user->roles->toArray();

        foreach ($roles as $role) 
        {      
            $role_id = $role['pivot']['role_id'];
            $role = Role::with('permissions')->where('id', $role_id)->get();
            foreach ($role as $value) 
            {
                foreach ($value->permissions as $permission) 
                {
                    array_push($allowed_routes, $permission->allowed_routes);                
                }
            }
        }

        $fr =[];
        foreach ($allowed_routes as $key => $value) 
        {
            $rs = json_decode($value);
            $fr[] = $rs;
        }

        foreach ($fr as $key => $routes) {
            foreach ($routes as $key => $routname) {
                $final_accessable_routes[] = $routname;
            }
        }

        $user_wants_to_access = \Request::route()->uri();
        echo "<pre>";
        print_r($final_accessable_routes);
        echo "</pre>";
        if (in_array($user_wants_to_access, $final_accessable_routes)) {

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