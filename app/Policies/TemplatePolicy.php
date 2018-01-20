<?php

namespace App\Policies;

use App\models\Template;
use App\models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class TemplatePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Template $template)
    {
        if (Auth::user()->id === $template->created_by){
            return true;
        }else{
            return false;
        }
    }

    public function delete(User $user, Template $template)
    {
        if (Auth::user()->id === $template->created_by){
            return true;
        }else{
            return false;
        }
    }
}
