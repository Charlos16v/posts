<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        Gate::define('create', function (User $user) {
            if($user->user_role !== 'viewer') {
                return true;
            }
        });
        Gate::define('show', function (User $user, Post $post) {
            if($user->id === $post->user_id || $user->user_role === 'admin') {
                return true;
            }
        });
        Gate::define('edit', function (User $user, Post $post) {
            if($user->user_role !== 'viewer') {
                return true;
            }
        });
        Gate::define('update', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });
        Gate::define('delete', function (User $user, Post $post) {
            if($user->id === $post->user_id || $user->user_role === 'admin') {
                return true;
            }
        });
    }
}
