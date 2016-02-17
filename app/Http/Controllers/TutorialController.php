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
        $tutorial = new StateMachine($user);
        $tutorial->apply($request->get('tutorial_transition'));

        $user->tutorial_state = $tutorial->getState();
        $user->save();

        $event = ($user->tutorial_state == State::COMPLETE) ? TutorialWasCompleted::class : TutorialWasStarted::class;
        Event::fire(new $event($user, $user->toArray()));

        return redirect()->back();
    }
}
