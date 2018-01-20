<?php

namespace App\Providers;

use App\models\Bunch;
use App\models\Campaign;
use App\Policies\BunchPolicy;
use App\Policies\CampaignPolicy;
use App\Policies\SubscriberPolicy;
use App\Policies\TemplatePolicy;
use App\models\Subscriber;
use App\models\Template;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Template::class => TemplatePolicy::class,
        Bunch::class => BunchPolicy::class,
        Subscriber::class => SubscriberPolicy::class,
        Campaign::class => CampaignPolicy::class,
    ];


    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
