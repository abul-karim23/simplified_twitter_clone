<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Auth;
use Log;

class followerController extends Controller
{
    //
    function add_follower(Request $request){
        // var_dump("Following");
        $follower_id = $request->input('follower_id');
        $follower_name = $request->input('follower_name');
        $follower_email = $request->input('follower_email');
        $uid=auth()->user()->id;

        $follow = DB::insert('INSERT INTO `followers` (`user_id`, `follower_id`,`follower_name`,`follower_email`) VALUES (?, ?, ?, ?)',[$uid,$follower_id,$follower_name,$follower_email]);

        if($follow){
            Log::debug(__CLASS__."::".__FUNCTION__." inserted follower by user ".auth()->user()->id);
            return redirect()->back();
        }
        else{
            Log::debug(__CLASS__."::".__FUNCTION__." Error inserting follower by ".auth()->user()->id);
        }

    }
}
