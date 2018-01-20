<?php

namespace App\Policies;

use App\models\Bunch;
use App\models\Subscriber;
use App\models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class SubscriberPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Subscriber $subscriber)
    {
        if (Auth::user()->id === $subscriber->created_by){
            return true;
        }else{
            return false;
        }
    }

    public function delete(User $user, Subscriber $subscriber)
    {
        if (Auth::user()->id === $subscriber->created_by){
            return true;
        }else{
            return false;
        }
    }
}
