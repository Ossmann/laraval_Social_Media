<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;


class Validation extends Controller
{
    public function validatePost(Request $request)
    {
        // Define custom validation rules
        $rules = [
            'post_title' => ['required', 'min:3'],
            'author' => ['required', 'regex:/^[^\d]+$/'],
            'message' => [
                'required',
                function ($attribute, $value, $fail) {
                    // Count the words in the message
                    $wordCount = str_word_count($value);

                    // Check if there are at least 5 words
                    if ($wordCount < 5) {
                        $fail('The message must have at least 5 words.');
                    }
                },
            ],
        ];

        $messages = [
            'author.regex' => 'Author name must should not have numeric characters.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }
        

        // If validation passes, redirect to the 'create_post_action' route
        $post_title = request('post_title');
        $author = request('author');
        $message = request('message');
        create_user($author);
        $id = create_post($post_title, $author, $message);
        if ($id) {
            app(UserAuth::class)->userSession($author);
            return redirect("/");
        } else {
            die("Error while adding post.");
        }
    }
}


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