<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\User;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;

use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
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
    	
        $users = User::where('id','!=', Auth::id())->where('delete_status','!=', 1)->with('roles')->paginate(5); 
        $roles = Role::get();   
        return view('users.index', compact('users', 'roles'));
    }

    public function profile()
    {
        $user = Auth::user();

        $user_properties = [];
        $user_roles      = [];

        $user_data = User::where('id','=', Auth::id())->with('roles') -> first();

        $created_at = (array)$user_data->created_at;

        $user_properties['id']      = $user_data->id;
        $user_properties['name']    = $user_data->name;
        $user_properties['email']   = $user_data->email;
        $user_properties['phone']   = $user_data->phone;
        $user_properties['gender']  = $user_data->gender;
        $user_properties['status']  = $user_data->status;
        $user_properties['address'] = $user_data->residential_address;
        $user_properties['pincode'] = $user_data->pincode;
        $user_properties['gender']  = $user_data->gender;

        $user_properties['created_at']      = $created_at['date'];
        $user_properties['profile_picture'] = $user_data->profile_picture;

        $roles = $user_data->roles;

        foreach ($roles as $role) 
        {
            $user_roles[] = $role->name;
        }

        $user_properties['roles'] = $user_roles;

        // print_r($user_properties);
        // die;

        return view('users.profile', ['properties' => $user_properties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        
        return view('users.create', ['roles'=>$roles]);
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
            'name'                => 'required',
            'email'               => 'required|email|unique:users',
            'phone'               => 'required|regex:/[0-9]/|size:10',
            'residential_address' => 'required',
            'pincode'             => 'required|numeric|digits_between:0,6',
            'dob'                 => 'required|date',
            'password'            => 'required|confirmed|min:6',
            'profile_picture'     => 'image',
            
        ]);

        $user = User::create($request->only('name', 'email', 'phone', 'residential_address', 'pincode', 'dob', 'password', 'gender'));

        $roles = $request['roles'];

        if (!empty($roles)) 
        {
            foreach ($roles as $role) 
            {
                $role_r = Role::where('id', '=', $role)->first();            
                $user->assignRole($role_r);
            }
        }
        else
        {

            $default_role = "user";

            $role_r = Role::where('name', '=', $default_role)->first();  
            // print_r($role_r);
            // die;          
            $user->assignRole($role_r);

        } 

        $user = User::where('email', $request->email) -> first();


        

        

        if ($request->profile_picture) 
        { 

          // die('hgfdhgfdjghg');
            $profile_picture_directory = public_path('user_profile_pics/'.$user->id);
            // echo $profile_picture_directory = public_path('user_profile_pics/5');
            $profile_picture_name = md5(uniqid().time()).'.'.$request->profile_picture->getClientOriginalExtension();


            //$directoryName = 'images';

            //Check if the directory already exists.
            if(!is_dir($profile_picture_directory))
            {
                //Directory does not exist, so lets create it.
                mkdir($profile_picture_directory);
                chmod($profile_picture_directory, 0777); 
                mkdir($profile_picture_directory.'/profile');
                chmod($profile_picture_directory."/profile", 0777); 
            }          
            
            Image::make($request->profile_picture)->fit(120, 150 )->save($profile_picture_directory.'/profile/'.$profile_picture_name);
            // die;

            
            $input = ["profile_picture" => $profile_picture_name];

            $user->fill($input)->save();
            // return redirect()->route('users.index')
            //              ->with('flash_message', 'User successfully added.');
        }


        return redirect()->route('users.index')
                         ->with('flash_message', 'User successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('users');
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
        $roles = Role::get();

        return view('users.edit', compact('user', 'roles'));
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
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            // 'phone'=>'required|unique:users,phone,'.$id,

            // 'name'                => 'required',
            // 'email'               => 'required|email|unique:users',
            'phone'               => 'required',
            'residential_address' => 'required',
            'pincode'             => 'required|numeric|digits_between:0,6',
            'dob'                 => 'required|date',
            // 'password'            => 'required|confirmed|min:6',
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

        // if ($request->profile_picture) 
        // {     

        //     $folder_name = $user->id;   
        //     $folder_path = public_path( 'user_profile_pics/'.$folder_name);      

        //     $profile_picture_name = md5(uniqid().time()).'.'.$request->profile_picture->getClientOriginalExtension();     

        //     $files = glob($folder_path.'/profile/*');
            
        //     foreach ($files as $file) 
        //     {
        //         unlink($file); // delete old profile picture         
        //     }
            

        //     $request->profile_picture->move(public_path( 'user_profile_pics/'.$folder_name. '/profile/' ), $profile_picture_name);  

        //     $input = ["profile_picture" => $profile_picture_name];
            
        //     $user->fill($input)->save();
        //     chmod($folder_path, 0777);
        // }
        


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
        return redirect()->back()
            ->with('message',
             'User successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('flash_message',
             'User(s) successfully deleted.');
    }

    public function delete($id)
    {
        // die('deg');
       $user = User::find($id);

       if (empty($user)) 
       {
           return redirect()->route('users.index')
            ->with('flash_message',
             'User(s) not found.');
       }
       else
       {
          // $user->delete();       
            DB::table('users')->where('id',$id)->update(array('delete_status'=>1,'status'=>"inactive",));

          return redirect()->route('users.index')
            ->with('flash_message',
             'User(s) successfully deleted.');
       }
              
    } 

    public function activateUser($id)
    {
      
      DB::table('users')->where('id',$id)->update(array('status'=>"active",));
      return redirect()->route('users.index')->with('flash_message', 'User account successfully Activated.');
    }

    public function deactivateUser($id)
    {

      DB::table('users')->where('id',$id)->update(array('status'=>"unactive",));
      return redirect()->route('users.index')->with('flash_message', 'User account successfully Deactivated.');
    }

    public function searchUsers()
    {
        $data  = Input::all();
        $searchBy = $data['searchBy'];
        $q = $data['search'];
        $users = User::where([ ['id','!=', Auth::id()],
                               ["$searchBy" ,'like', "%$q%"],])->with('roles')->paginate(50);
        
        return view('users.index', compact('users'));
     }

  	public function BulkAction()
  	{
  		$data  = Input::all();
  		$user_ids   = $data['user_ids'];
  		$BulkAction = $data['BulkAction'];
  		$total = 0;

  		if ($BulkAction == "delete") 
  		{
  			foreach ($user_ids as $id) 
  			{
  				$total++;
  			}
  			DB::table('users')->whereIn('id', $user_ids)->delete();
  			return redirect()->route('users.index')->with('flash_message', $total.' User(s) successfully deleted.');
  		}

  		if ($BulkAction == "activate") 
  		{
  			foreach ($user_ids as $id) 
  			{
  				$total++;
  			}
  			DB::table('users')->whereIn('id',$user_ids)->update(array('status'=>"active",));
  			return redirect()->route('users.index')->with('flash_message', $total.' User(s) account successfully Activated.');
  		}
  		if ($BulkAction == "deactivate") 
  		{
  			foreach ($user_ids as $id) 
  			{
  				$total++;
  			}
  			DB::table('users')->whereIn('id',$user_ids)->update(array('status'=>"inactive",));
  			return redirect()->route('users.index')->with('flash_message', $total.' User(s) account successfully deactivated.');
  		}
  	}
}
