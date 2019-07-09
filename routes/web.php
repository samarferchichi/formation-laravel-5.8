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


/*Route::get('/',function(){
    $user = factory(\App\User::class)->create();
    $phone = new \App\Phone();
    $phone->phone = '123-123-1234';
    $user->phone()->save($phone);
});*/

/*Route::get('/',function(){
    $user = factory(\App\User::class)->create();

    $post = new \App\Post([
        'titre' => 'Titre here',
        'body' => 'body here',
        'user_id' => $user->id,
    ]);
    $post->save();

   //dd($post);
});*/

/*Route::get('/',function(){
    $user = \App\User::first();
    $roles = \App\Role::all();
    $user->roles()->attach($roles);
    dd($roles);
});
*/

/*Route::get('/',function(){
    $user = \App\User::first();
    $roles = \App\Role::first();
    $user->roles()->detach($roles);
    dd($roles);
});
*/

/*Route::get('/',function(){
   // $user = \App\User::first();
   // $user->roles()->syncWithoutDetaching([3]);

   $role = \App\Role::find(4);
   $role->users()->sync([1]);

});*/


/*Route::get('/',function(){

     $user = \App\User::first();
    //  $user->roles()->sync([
    //   1 => [
    //        'name' => 'victore'
    //    ]
    //   ]);
 
    //dd($user->roles->first()->pivot);
 });*/


Route::get('contact', 'ContactFormController@create')->name('contact.create');
Route::post('contact','ContactFormController@store')->name('contact.store');;

//Route::view('contact','contact');

Route::view('about','about');

/*
Route::get('customers','CustomersController@index');

Route::get('customers/create','CustomersController@create');

Route::post('customers','CustomersController@store');

Route::get('customers/{customer}','CustomersController@show');

Route::get('customers/{customer}/edit','CustomersController@edit');

Route::patch('customers/{customer}','CustomersController@update');

Route::delete('customers/{customer}','CustomersController@destroy');
*/

Route::resource('customers', 'CustomersController');
Auth::routes();

Route::get('/', 'HomeController@index');
