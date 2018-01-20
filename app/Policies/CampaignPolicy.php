<?php

namespace App\Policies;

use App\models\Campaign;
use App\models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CampaignPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Campaign $campaign)
    {
        if (Auth::user()->id === $campaign->created_by){
            return true;
        }else{
            return false;
        }
    }

    public function delete(User $user, Campaign $campaign)
    {
        if (Auth::user()->id === $campaign->created_by){
            return true;
        }else{
            return false;
        }
    }
}
