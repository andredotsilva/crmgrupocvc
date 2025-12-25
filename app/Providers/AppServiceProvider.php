<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['layouts.navigation', 'layouts.header'], function ($view) {
            $user = auth()->user();

            if (! $user) {
                $view->with('navbarNotifications', collect())
                    ->with('navbarUnreadNotificationsCount', 0);

                return;
            }

            $notifications = $user->notifications()
                ->latest()
                ->limit(10)
                ->get();

            $unreadCount = $user->unreadNotifications()->count();

            $view->with('navbarNotifications', $notifications)
                ->with('navbarUnreadNotificationsCount', $unreadCount);
        });
    }
}
