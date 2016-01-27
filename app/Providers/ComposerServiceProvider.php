<?php namespace App\Providers;

use App\Envelope;
use App\Helpers\Money;
use App\Helpers\AuditLogDateHandler;
use App\User;
use Cache;
use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('envelopes.template', function ($view) {
            $view->with('colours', Envelope::$colours);
        });

        View::composer('*', function ($view) {
            $view->with('users', Cache::get('users', function () {
                $users = User::all();
                Cache::rememberForever('users', function () use ($users) {
                    return $users;
                });

                return $users;
            }));
            $view->with('Money', Money::class);
        });

        View::composer('audit-log.logs', function($view) {
            $view->with('AuditLogDateHandler', new AuditLogDateHandler);
        });
    }

    /**
     * Register
     *
     * @return void
     */
    public function register()
    {
        //
    }
}