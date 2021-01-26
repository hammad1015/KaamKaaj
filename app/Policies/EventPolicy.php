<?php

namespace App\Policies;

use App\User;
use App\Event;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Event $event){
        return 0 === $user->events()->where('event_id', $event->id)->first()->pivot->authorization_level;
    }

    public function leave(User $user, Event $event){
        return $user->events->contains($event);
    }

    public function addParticipant(User $user, Event $event){
        return $user->events->contains($event);
    }

    public function removeParticipant(User $user, Event $event, User $userb){

        if (!EventPolicy::leave($userb, $event)){ return FALSE; }
        
        $a1 = $user ->events()->where('event_id', $event->id)->first()->pivot->authorization_level;
        $a2 = $userb->events()->where('event_id', $event->id)->first()->pivot->authorization_level;

        return $a1 < $a2;
    }
}
