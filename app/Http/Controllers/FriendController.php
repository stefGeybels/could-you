<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use App\Services\Facades\FriendSettings;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $friendsId = $user->getfriends();
        
        $friendArray = [];
        
        foreach ($friendsId as $friend) 
        {
            array_push($friendArray, User::find($friend['friend_id']));
        }

        return view('platform.friends.main')->with('friends', $friendArray)->with('requests', $user->getRequests());
    }

    public function destroyfriendship($id)
    {
        FriendSettings::removeFriend($id);

        return redirect()->back();
    }

    public function askForFriendship(Request $request)
    {
        
    }

    public function acceptingFriendship(Request $request, $id)
    {
        $friendship = Friend::find($id);
        $friendship->accepted = 1;
        $friendship->save();

        return redirect()->back();
    }

    public function rejectFriendship($id)
    {
        Friend::find($id)->delete();

        return redirect()->back();
    }
}
