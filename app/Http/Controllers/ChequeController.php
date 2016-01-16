<?php

namespace App\Http\Controllers;

use App\Cheque;
use App\Events\ChequeWasCreated;
use App\Events\TransferWasCreated;
use App\Transfer;
use Auth;
use Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChequeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cheques.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $amount = $request->input('amount') * 100;

        $cheque = new Cheque(compact('name', 'amount'));

        $cheque->user()->associate(Auth::id());

        $cheque->save();

        Event::fire(new ChequeWasCreated($cheque, $cheque));

        return redirect()->route('cheque.show', $cheque);
    }

    /**
     * Display the specified resource.
     *
     * @param  Cheque  $cheque
     * @return Response
     */
    public function show(Cheque $cheque)
    {
        return view('cheques.show', compact('cheque'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Cheque $cheque
     * @return Response
     */
    public function edit(Cheque $cheque)
    {
        $envelopes = Auth::user()->envelopes;
        return view('cheques.edit', compact('cheque', 'envelopes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  Cheque $cheque
     * @return Response
     */
    public function update(Request $request, Cheque $cheque)
    {
        $description = $request->input('description');
        $amount = $request->input('amount') * 100;
        $envelope = Auth::user()->envelopes()->findOrFail($request->input('envelope'));

        // TODO: Move to event
        $transfer = new Transfer(['amount' => $amount, 'description' => $description]);
        $transfer->source()->associate($cheque);
        $transfer->destination()->associate($envelope);
        Auth::user()->transfers()->save($transfer);

        // TODO: Make updating part of the transfer event
        $cheque->amount = $cheque->amount - $amount;
        $envelope->amount = $envelope->amount + $amount;

        $envelope->save();
        $cheque->save();

        $TransferWasCreated = new TransferWasCreated($transfer, $transfer);
        $TransferWasCreated->addAuditable($cheque->auditable_id);
        $TransferWasCreated->addAuditable($envelope->auditable_id);
        Event::fire($TransferWasCreated);

        return redirect()->route('cheque.show', [$cheque->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
