<?php

use Illuminate\Support\Facades\Route;

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

//ROUTES

Route::get('/', function(){
    $sql = "select * from Post";
    $posts = DB::select($sql);
    return view('pages.post_list')->with('posts', $posts);
});

//Route action to add post and redirect to Home Page
Route::post('create_post_action', function(){
    $post_title = request('post_title');
    $author = request('author');
    $message = request('message');
    create_user($author);
    $id = create_post($post_title, $author, $message);
    if ($id) {
        return redirect("/");
    } else {
        die("Error while adding post.");
    }
});

//add the route to delete post
Route::get('delete_post/{post_id}', function($post_id){
    delete_post($post_id);
    return redirect("/");
});

//edit post 
Route::get('edit_post/', function(){
    $edditToggle = true;
    return redirect("/");   
});


Route::get('item_detail/{id}', function($id){
    $item = get_item($id);
    return view('items.item_detail')->with('item', $item);   
});

Route::get('update_item/{id}', function($id){
    $item = get_item($id);
    return view('items.update_item')->with('item', $item);   
});

Route::get('add_item', function(){
    return view("items.add_item");
});


//FUNCTIONS
//Create a new user
function create_user($author){
    $sql = "insert into User (user_name) values (?)";
    DB::insert($sql, array($author));
}

// function to create a new post and add to the DB
function create_post($post_title, $author, $message){
    $sql = "insert into Post (post_title, user_name, message) values (?, ?, ?)";
    DB::insert($sql, array($post_title, $author, $message));
    $id = DB::getPdo()->lastInsertId();
    return($id);
}

//function to delete a post
function delete_post($post_id) {
    $sql = "delete from Post where post_id = ?";
    DB::delete($sql, array($post_id));
    }


function get_item($id) {
    $sql = "select * from item where id=?";
    $items = DB::select($sql, array($id));
    if (count($items) != 1) {
        die("something has gone wrong, invalid query or result: $sql");
    }
    $item = $items[0];
    return $item;
}


