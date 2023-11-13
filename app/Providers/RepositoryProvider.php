<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Repositories\Post\Elqouent\ElqouentPostRepository;
use App\Repositories\Post\PostRepository;
use App\Repositories\User\Elqouent\ElqouentUserRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepository::class,function(){
            return new ElqouentPostRepository(new Post());
        });

        $this->app->bind(UserRepository::class,function(){
            return new ElqouentUserRepository(new User());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
