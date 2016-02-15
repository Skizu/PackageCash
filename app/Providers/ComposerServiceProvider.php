<?php namespace App\Providers;

use App\Domain\Tutorial\StateMachine as Tutorial;
use App\Domain\Tutorial\State;
use App\Envelope;
use App\Helpers\Money;
use App\Helpers\AuditLogDateHandler;
use App\User;
use Auth;
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
            $view->with('users', Cache::rememberForever('users', function () {
                return User::all();
            }));
            $view->with('Money', Money::class);
            $view->with('TutorialState', State::class);
        });

        View::composer('audit-log.logs', function ($view) {
            $view->with('AuditLogDateHandler', new AuditLogDateHandler);
        });

        View::composer('dashboard', function ($view) {
            $Tutorial = new Tutorial(Auth::user());
            $TutorialComplete = $Tutorial->getState() == State::COMPLETE;

            $view->with(compact('TutorialComplete', 'Tutorial'));
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