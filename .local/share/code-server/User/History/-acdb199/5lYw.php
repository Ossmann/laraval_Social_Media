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


Route::get('/', function(){
    $sql = "select * from Post";
    $posts = DB::select($sql);
    return view('pages.post_list')->with('posts', $posts);
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

Route::post('create_post_action', function(){
    $post_title = request('post_title');
    $author = request('author');
    $message = request('message');
    $id = create_post($summary, $details);
    if ($id) {
        return redirect("item_detail/$id");
    } else {
        die("Error while adding item.");
    }
});



//add the route to delete item
Route::get('delete_item/{id}', function($id){
    delete_item($id);
    return redirect("/");
});


function get_item($id) {
    $sql = "select * from item where id=?";
    $items = DB::select($sql, array($id));
    if (count($items) != 1) {
        die("something has gone wrong, invalid query or result: $sql");
    }
    $item = $items[0];
    return $item;
}

function create_post($post_title, $author, $message){
    $sql = "insert into item (summary, details) values (?, ?)";
    DB::insert($sql, array($summary, $details));
    $id = DB::getPdo()->lastInsertId();
    return($id);
}

function delete_item($id) {
    $sql = "delete from item where id = ?";
    DB::delete($sql, array($id));
    }