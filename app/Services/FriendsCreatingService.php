<?php

namespace App\Services;

use App\Models\Friend;
use App\Models\User;

class FriendsCreatingService extends PlatformServices
{
    public function addFriend($userRequestedForFriend)
    {   
        $relationship = Friend::create([
            'asking_id' => $this->userId,
            'asked_id' => $userRequestedForFriend,
            'created_at' => $this->datetime,
            'updated_at' => $this->datetime,
        ]);

        return $relationship;
    }

    public function removeFriend($friendId)
    {

        $user = auth()->user();
        $friendArray = $user->getFriends();

        // Get friend index in array
        $friend = array_search($friendId, array_map(function($item){ return $item['friend_id'];}, $friendArray));

        $friend = Friend::find($friendArray[$friend]['id'])->delete();

        return true;
    }

    public function acceptFriend($userAskingToFriend)
    {
        try 
        {
            $relationship = Friend::where('asking_id', $userAskingToFriend)->where('asked_id', $this->userId)->first();
        } 
        catch (\Throwable $th) 
        {
            return false;
        }

        if ($relationship == null) 
        {
            return false;
        }

        $relationship->accepted = 1;
        $relationship->save();

        return true;
    }

    public function declineFriend($userAskingToFriend)
    {
        try 
        {
            $relationship = Friend::where('asking_id', $userAskingToFriend)->where('asked_id', $this->userId)->first();
        } 
        catch (\Throwable $th) 
        {
            return false;
        }

        if ($relationship == null) 
        {
            return false;
        }

        $relationship->delete();

        return true;
    }

    public function findFriend($friendId)
    {
        $friend = new Friend();

        return $friend->specificFriend($this->userId, $friendId);
    }

    public function filterFriendsFromEvent($event)
    {
        $friend = ($event->creator_id == $this->userId) ? $event->invited_id : $event->creator_id;

        return $friend;
    }

}