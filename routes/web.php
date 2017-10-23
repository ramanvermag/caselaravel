<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Input;
use App\User;
use Spatie\Permission\Models\Role;


// Route::get('/', function () {
//     return view('welcome');
// });




	Auth::routes();

    // Route::get('/','PostController@index')->name('home');
    
    Route::get('/','DashboardController@index');



    Route::get('delete/{id}','UserController@delete');
    Route::get('deactivateUser/{id}','UserController@deactivateUser');
    Route::get('activateUser/{id}','UserController@activateUser');
    Route::get('delete','UserController@index'); // pervent direct access
    Route::get('profile','ProfileController@index'); // pervent direct access


    Route::post('searchUsers','UserController@searchUsers');
    Route::post('deleteusers','UserController@deleteusers');
    Route::post('bulkaction','UserController@BulkAction');
    Route::post('profile', 'UserController@update_avatar');


    Route::resource('users','UserController');
    Route::resource('roles','RoleController');
    Route::resource('permissions','PermissionController');
    Route::resource('posts','PostController');
    Route::resource('profile','ProfileController');


	Route::any('/search',function(){
		$roles	 = Role::get();   
		$role    = Input::get ( 'search_by_role' );
		$keyword = Input::get ( 'keyword' );
		
		if ($role){
			$users = User::whereHas('roles', function ($q) {
				$role  = Input::get ( 'search_by_role' );
				$q->where('roles.name', '=', $role);
			})->get();
		}else{
				$users = User::Where('name','LIKE','%'.$keyword.'%')
				->orWhere('id','LIKE','%'.$keyword.'%')
				->orWhere('email','LIKE','%'.$keyword.'%')
				->orWhere('status','LIKE','%'.$keyword.'%')
				->with('roles')
				->get();
		}
		if(count($users) > 0){
			return view('users.index',compact('users','roles','role'));
		}else{
				return view('users.index', compact('users','roles'))->withQuery ( $keyword );
		} 
	});


