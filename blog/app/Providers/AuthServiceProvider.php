<?php

namespace App\Providers;

use App\Policies\PostPolicy;
use App\Posts;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Posts::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::before(function ($user, $ability) {
//            if ($user->membership == MEMBER_PRO) {
//                return true;
//            }
//        });

        Gate::define('user', function ($user) {
           return $user->membership == MEMBER_PRO;
        });

        Gate::define('edit-user', function ($user) {
            return $user->membership == MEMBER_PRO
                ? Response::allow()
                : Response::deny('You must be a super administrator.');
        });

//        Gate::define('update-post', function ($user, $post) {
//            return $user->id === $post->user_id;
//        });

        Gate::define('update-post', 'App\Policies\PostPolicy@update');

//        Gate::guessPolicyNamesUsing(function ($modelClass) {
//            dd($modelClass);
//        });


//        Auth::extend('jwt', function ($app, $name, array $config) {
//            // Return an instance of Illuminate\Contracts\Auth\Guard...
//
//            return new JwtGuard(Auth::createUserProvider($config['provider']));
//        });
    }
}
