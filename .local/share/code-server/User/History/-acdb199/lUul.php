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

//route to users list
Route::get('users', function(){
    $sql = "select * from User";
    $users = DB::select($sql);
    return view('pages.users')->with('users', $users);
});

// go to the detail view of a Post
Route::get('post_detail/{post_id}', function($post_id){
    $post = get_post($post_id);
    return view('pages.post_detail')->with('post', $post);   
});


//Route action to add comment and redirect to Home Page
Route::post('create_comment_action', function(){
    $author = request('author');
    $comment_message = request('comment_message');
    create_user($author);
    $id = create_comment($author, $comment_message); // need to add DATE
    if ($id) {
        return redirect("/post_detail/{post_id}");
    } else {
        die("Error while adding post.");
    }
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

// function to create a new comment and add to the DB
function create_comment($author, $comment_message){ //add DATE
    $sql = "insert into Post (user_name, comment_message) values (?, ?, ?)"; //add DATE
    DB::insert($sql, array($author, $comment_message)); //add DATE
    $id = DB::getPdo()->lastInsertId();
    return($id);
}

//function to delete a post
function delete_post($post_id) {
    $sql = "delete from Post where post_id = ?";
    DB::delete($sql, array($post_id));
    }

//function to get posts
function get_post($post_id) {
    $sql = "select * from Post where post_id=?";
    $posts = DB::select($sql, array($post_id));
    if (count($posts) != 1) {
        die("something has gone wrong, invalid query or result: $sql");
    }
    $post = $posts[0];
    return $post;
}


