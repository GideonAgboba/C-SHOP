<?php
use App\Post;
use Carbon\Carbon;
use App\User;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return redirect('/home');
});

// Route::get('/pr', function($id){
//     $users_posts = User::find($id)->posts;
//     return $users_posts->title;
// });


Route::group(['middleware' => ['web']], function () {

    Route::resource('/home', 'PostController');
    Route::resource('/king', 'PostController@users_posts');
    Route::resource('/profile', 'UpdateProfile');
    Route::resource('/search', 'PostController@search');
    Route::get('/time', function(){
        $post = Post::whereId(14)->get();
        foreach ($post as $value) {
            // return $value->title;
            echo Carbon::now($value->created_at)->diffForHumans();
        }
    });
    Route::get('/users/{id}', function($id){
        return view('posts.profile');
    });



});

Route::auth();

// Route::get('/home', 'HomeController@index');
Route::get('/index', function(){
    return redirect('/home');
});

// Route::get('/profile', function(){
//         $this->validate($request, [
//             'file'=>'required',
//             'bio'=> 'min:10'
//         ]);
//         global $name;
//         $input = $request->all();
//         if($file = $request->file('file')){
//             $name = $file->getClientOriginalName();
//             $file->move('uploads', $name);
//             $input['path'] = $name;
//         }
//         $user = User::where('id', $request->id)->get();
//         $user->update($request->all);
//         return 'it worked!';
// });

Route::get('/userstore/{id}', 'UserStore@index');
Route::resource('/like', 'SocialController@like');
Route::resource('/meet', 'SocialController@meet');
Route::resource('/fav', 'SocialController@fav');
Route::resource('/usermeets', 'MeetController');
