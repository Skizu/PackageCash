<?php

namespace App\Http\Controllers;

use App\Domain\Tutorial\State;
use App\Domain\Tutorial\StateMachine;
use App\Events\TutorialWasCompleted;
use App\Events\TutorialWasStarted;
use App\User;
use Event;
use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class TutorialController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $tutorial_transaction = $request->get('tutorial_transition');
        if ($tutorial_transaction == 'Start') {
            Event::fire(new TutorialWasStarted($user, $user->toArray()));
        } elseif ($tutorial_transaction == 'Skip') {
            Event::fire(new TutorialWasCompleted($user, $user->toArray()));
        }

        return redirect()->back();
    }
}
