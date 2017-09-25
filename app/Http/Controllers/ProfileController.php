<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Post;
use Auth;
use Session;
use App\User;


class ProfileController extends Controller
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
        $user = Auth::user();

        $user_properties = [];
        $user_roles      = [];

        $user_data = User::where('id','=', Auth::id())->with('roles') -> first();

        $created_at = (array)$user_data->created_at;

        $user_properties['id']     = $user_data->id;
        $user_properties['name']   = $user_data->name;
        $user_properties['email']  = $user_data->email;
        $user_properties['phone']  = $user_data->phone;
        $user_properties['gender'] = $user_data->gender;
        $user_properties['status'] = $user_data->status;
        $user_properties['address'] = $user_data->residential_address;
        $user_properties['pincode'] = $user_data->pincode;
        $user_properties['gender'] = $user_data->gender;

        $user_properties['created_at']      = $created_at['date'];
        $user_properties['profile_picture'] = $user_data->profile_picture;

        $roles = $user_data->roles;

        foreach ($roles as $role) 
        {
            $user_roles[] = $role->name;
        }

        $user_properties['roles'] = $user_roles;

        return view('profile.index', ['properties' => $user_properties]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view ('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('profile.edit', compact('user'));
    }

     public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'phone'=>'required|unique:users,phone,'.$id,
            'residential_address' => 'required',
            'pincode'             => 'required|numeric|digits_between:0,6',
            'dob'                 => 'required|date',
            'profile_picture'     => 'image',
            
        ]);

        if ($request->profile_picture) 
        { 
            $profile_picture_directory = public_path('user_profile_pics/'.$user->id);
            $folder_name = $user->id;   
            $folder_path = public_path( 'user_profile_pics/'.$folder_name);    
            $profile_picture_name = md5(uniqid().time()).'.'.$request->profile_picture->getClientOriginalExtension();
            $files = glob($folder_path.'/profile/*');
            
            foreach ($files as $file) 
            {
                unlink($file); // delete old profile picture         
            }        
            
            Image::make($request->profile_picture)->fit(120, 150 )->save($profile_picture_directory.'/profile/'.$profile_picture_name);
            $input = ["profile_picture" => $profile_picture_name];
            $user->fill($input)->save();
        }

        $input = $request->only(['name', 'email', 'gender', 'phone', 'pincode', 'residential_address', 'dob']);
        
        $roles = $request['roles'];
        
        $user->fill($input)->save();

        if (isset($roles)) {        
            $user->roles()->sync($roles);            
        }        
        elseif($id != Auth::id()) 
        {
            $user->roles()->detach();
        }

        if (empty($roles) && $id != Auth::id()) {
            $roles = [2];
            $user->roles()->sync($roles);            


            
        }
        return redirect()->route('profile.index')
            ->with('flash_message', 'Your Profile is updated Successfully.');
    }






}
