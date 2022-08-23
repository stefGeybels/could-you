<?php 


namespace App\Services;

use App\Mail\InviteFriend;
use Illuminate\Support\Facades\Mail;

class NotificationSendingService extends PlatformServices
{

    public function sendInvite($email)
    {
        Mail::to($email)->send(new InviteFriend());
    }
    
}