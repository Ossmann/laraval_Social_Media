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
//Home Page
Route::get('/', function(){
    $sql = "select * from Post";
    $posts = DB::select($sql);
    $posts = count_comments($posts);
    return view('pages.post_list')->with([
        'posts' => $posts,
        'success', 'Test the toast',
    ]);
});

// go to the detail view of a Post
Route::get('post_detail/{post_id}', function($post_id){
    $post = get_post($post_id);
    $comments = get_comments($post_id);
    $post = count_likes($post, $post_id);
    $like_toggle = false;
    return view('pages.post_detail')->with([
        'post' => $post,
        'comments' => $comments,
        'like_toggle' => $like_toggle,
    ]);  
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

//Route action to add comment and redirect to Detail Page
Route::post('create_comment_action', function(){
    $author = request('author');
    $comment_message = request('comment_message');
    $post_id = request('post_id');
    create_user($author);
    $id = create_comment($author, $comment_message, $post_id); // need to add DATE
    if ($id) {
        return redirect("/post_detail/{$post_id}");
    } else {
        die("Error while adding comment.");
    }
});

//Post Detail Page when Like button is pressed to change the toggle
Route::get('like_input/{post_id}', function($post_id){
    $post = get_post($post_id);
    $comments = get_comments($post_id);
    $post = count_likes($post, $post_id);
    $like_toggle = true;
    return view('pages.post_detail')->with([
        'post' => $post,
        'comments' => $comments,
        'like_toggle' => $like_toggle,
    ]);
});

//Route action to add like and redirect to Detail Page
Route::post('create_like_action/{post_id}', function($post_id){
    $author = request('author');
    create_user($author);
    $post = get_post($post_id);
    $comments = get_comments($post_id);
    $post = count_likes($post, $post_id);
    $like_toggle = false;
    $id = create_like($author, $post_id);
    if ($id) {
        return view('pages.post_detail')->with([
            'post' => $post,
            'comments' => $comments,
            'like_toggle' => $like_toggle,
        ]);
    } else {
        die("Error while adding like.");
    }
});

//add the route to delete post
Route::get('delete_post/{post_id}', function($post_id){
    delete_comments($post_id);
    delete_post($post_id);
    return redirect("/");
});

//delete user, with all its posts, comments and comment answers and Likes
Route::get('delete_user/{user_name}', function($user_name){
    delete_likes($user_name);
    delete_user_comments($user_name);
    delete_post($user_name);
    delete_user($user_name);
    return redirect("users");
});

//route to users list
Route::get('users', function(){
    $sql = "select * from User";
    $users = DB::select($sql);
    return view('pages.users')->with('users', $users);
});

//Route action to edit Post
Route::post('edit_post_action/{post_id}', function($post_id){
    $post_title = request('post_title');
    $message = request('message');
    update_post($post_title, $message, $post_id);
    return redirect("/");
});


///////// FUNCTIONS
///// CREATE Functions
//Create a new user and inlcude validation to check for numbers and if its unique
function create_user($author){
    $sql = "SELECT * FROM User WHERE user_name =?";
    $unique_author = DB::select($sql, [$author]);

    if (empty($unique_author)) {
        $sql2 = "insert into User (user_name) values (?)";
        DB::insert($sql2, array($author));
    } 
    else {
        $error_message = "Error: User already taken.";
        return $error_message;
    }

}

// function to create a new post and add to the DB
function create_post($post_title, $author, $message){
    $sql = "insert into Post (post_title, user_name, message, date) values (?, ?, ?, ?)";
    $current_date = date('Y-m-d');
    DB::insert($sql, array($post_title, $author, $message, $current_date));
    $id = DB::getPdo()->lastInsertId();
    return($id);
}

// function to create a new comment and add to the DB
function create_comment($author, $comment_message, $post_id){ 
    $sql = "insert into Comment (user_name, comment_message, post_id, date) values (?, ?, ?, ?)";
    $current_date = date('Y-m-d');
    DB::insert($sql, array($author, $comment_message, $post_id, $current_date));
    $id = DB::getPdo()->lastInsertId();
    return($id);
}
    

// function to create a new like and add to the DB
function create_like($author, $post_id){ 
    $sql = "insert into Like (user_name, post_id) values (?, ?)";
    DB::insert($sql, array($author, $post_id));
    $id = DB::getPdo()->lastInsertId();
    return($id);
}

///// GET Functions
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

//function to get comments and replies for a detail post
function get_comments($post_id) {
    $sql = "select * from Comment where post_id=?";
    $comments = DB::select($sql, array($post_id));
    // foreach ($comments as $comment) {
    //     $comment->replies = get_replies($comment);
    // }
    return $comments;
}

//// Delete functions
//function to delete likes
function delete_likes($user_name) {
    $sql = "delete from Like where user_name = ?";
    DB::delete($sql, array($user_name));
    }

//function to delete comments when deleting a post
function delete_comments($post_id) {
    $sql = "delete from Comment where post_id = ?";
    DB::delete($sql, array($post_id));
    }

//function to delete comments when deleting a user
function delete_user_comments($user_name) {
    $sql = "delete from Comment where user_name = ?";
    DB::delete($sql, array($user_name));
    }

//function to delete a post
function delete_post($post_id) {
    $sql = "delete from Post where post_id = ?";
    DB::delete($sql, array($post_id));
    }

//function to delete a user
function delete_user($user_name) {
    $sql = "delete from User where user_name = ?";
    DB::delete($sql, array($user_name));
    }

/// SPECIAL functions
//function to count number of comments for a post
function update_post($post_title, $message, $post_id) {
    $sql = "update Post set post_title = ?, message = ? where post_id = ?"; 
    DB::update($sql, array($post_title, $message, $post_id));
    }


function count_comments($posts) {
    foreach ($posts as $post) {
        $sql = "SELECT COUNT(*) as comment_count FROM Comment WHERE post_id=?";
        $comment_counter = DB::select($sql, [$post->post_id]);
        $post->comment_counter = $comment_counter[0]->comment_count; // Access the count value
    }
    return $posts;
}

// //function to count number of comments for a post
// function count_likes($post, $post_id) {
//     $sql = "SELECT COUNT(*) FROM Like WHERE post_id=?";
//     $like_count = DB::select($sql, [$post_id]);
//     $post->like_count = $like_count;
//     return $post;
// }



// // Function to count the number of likes for a post
function count_likes($post, $post_id) {
    $sql = "SELECT COUNT(*) as like_count FROM Like WHERE post_id=?";
    
    // Assuming DB::select() returns an array of objects
    $like_count_result = DB::select($sql, [$post_id]);
    
    if (!empty($like_count_result)) {
        $post->like_count = $like_count_result[0]->like_count;
    } else {
        // Handle case where no likes found
        $post->like_count = 0;
    }
    
    return $post;
}