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
    $sql = "select * from item";
    $items = DB::select($sql);
    //$items = array();
    return view('items.item_list')->with('items', $items);
});

Route::get('add_item', function(){
    return view("items.add_item");
});

Route::post('add_item_action', function(){
    $summary = request('summary');
    $details = request('details');
    dd($summary);
});

Route::get('item_detail/{id}', function($id){
    $item = get_item($id);
    return view('items.item_detail')->with('item', $item);   
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