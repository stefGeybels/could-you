<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Event;
use App\Models\Friend;
use App\Models\User;
use App\Services\Facades\FriendSettings;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('can_edit_event', function(User $user, Event $event, $task) 
        {
            if ($user->id === $event->creator_id || $user->id === $event->invited_id) 
            {
                return true;
            }

            if ($task == 'view') 
            {
                abort(404);
            }

            Response::deny('You don\'t have authority to edit this activity');
        });

        Gate::define('are_friends', function(Friend $friend)
        {
            if(FriendSettings::findFriend($friend->id)->isEmpty())
            {
                abort(403);
            }

            return true;
        });

        // Fillin in a later time
        // better integration with information gotten form form
        Gate::define('only_accepted_if_invited', function(User $user){ return true; });
    }
}
