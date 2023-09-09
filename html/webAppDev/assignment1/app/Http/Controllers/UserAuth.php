<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// class UserAuth extends Controller
// {
//     function userSession(Request $req)
//     {
//         // Retrieve only the 'user_name' input from the request
//         $user_name = $req->input('author');

//         // If 'user_name' is not in the session, store it
//         session()->put('user_name', $user_name);
//         return redirect("/");
//     }
// }

class UserAuth extends Controller
{
    function userSession($user_name)
    {
        // store username in the session
        session()->put('user_name', $user_name);
    }


function likeBlocked($value)
    {
        // set variable that this user allready liked to deactivate Like button
        session()->put('liked_blocked', $value);
    }
}