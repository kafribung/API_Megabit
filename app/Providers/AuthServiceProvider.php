<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Post'     => 'App\Policies\PostPolicy'
    ];

    public function boot()
    {
        $this->registerPolicies();
        Gate::define('author', function(User $user){
            return $user->king ? true : null;
        });
    }
}
