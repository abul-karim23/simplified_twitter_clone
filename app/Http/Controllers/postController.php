<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Auth;
use Log;

class postController extends Controller
{
    //
    function insert_posts(Request $request){
        $user_status = $request->input('user_status');

        // $user = Auth::user();
        // $uid = $user->id;
        $uid=auth()->user()->id;
        // var_dump($user_status);

        $post=DB::insert('INSERT INTO `posts` (`description`,`user_id`) VALUES (?, ?)',[$user_status,$uid]);

        if($post){
            Log::debug(__CLASS__."::".__FUNCTION__." inserted status by user ".auth()->user()->id);
            return redirect()->back();
        }
        else{
            Log::debug(__CLASS__."::".__FUNCTION__." Error inserting status by ".auth()->user()->id);
        }
    }

    function get_posts(){
        $uid=auth()->user()->id;

        $posts = DB::select('SELECT followers.follower_name, followers.follower_email, posts.created_at, posts.description, posts.user_id FROM followers LEFT JOIN posts ON followers.follower_id=posts.user_id WHERE followers.user_id=? ORDER BY posts.created_at DESC',[$uid]);
   
        
        if($posts){
            return response()->json([                      
                'results' => $posts
            ]);
        }
        else{
            return redirect()->back()->with('Failed', 'Failed to retrieve data');
        }
    }

    function get_users(){
        $uid=auth()->user()->id;

        $users = DB::select('SELECT users.id, users.name, users.email FROM users WHERE users.id!=?',[$uid]);
        if($users){
            return response()->json([                      
                'results' => $users
            ]);
        }
        else{
            Log::debug(__CLASS__."::".__FUNCTION__." Error retrieving users by ".auth()->user()->id);
            return redirect()->back()->with('Failed', 'Failed to retrieve users');
        }
    }
}
