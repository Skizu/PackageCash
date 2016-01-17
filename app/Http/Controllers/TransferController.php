<?php

namespace App\Http\Controllers;

use App\Envelope;
use App\Events\TransferWasCreated;
use App\Transfer;
use Auth;
use Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param Envelope $envelope
     * @return Response
     */
    public function create(Request $request, Envelope $envelope)
    {
        $envelopes = Auth::user()->envelopes;
        return view('transfers.create', compact('envelope', 'envelopes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param Envelope $source
     * @return Response
     */
    public function store(Request $request, Envelope $source)
    {
        $description = $request->input('description');
        $amount = $request->input('amount') * 100;
        $envelope = Auth::user()->envelopes()->findOrFail($request->input('envelope'));

        // TODO: Move to event
        $transfer = new Transfer(['amount' => $amount, 'description' => $description]);
        $transfer->source()->associate($source);
        $transfer->destination()->associate($envelope);
        Auth::user()->transfers()->save($transfer);

        // TODO: Make updating part of the transfer event
        $source->amount = $source->amount - $amount;
        $envelope->amount = $envelope->amount + $amount;

        $envelope->save();
        $source->save();

        $TransferWasCreated = new TransferWasCreated($transfer, $transfer);
        $TransferWasCreated->addAuditable($source->auditable_id);
        $TransferWasCreated->addAuditable($envelope->auditable_id);
        Event::fire($TransferWasCreated);

        return redirect()->route('envelope.show', [$source]);
    }

    /**
     * Display the specified resource.
     *
     * @param Transfer $transfer
     * @return \Illuminate\Http\Response
     */
    public function show(Transfer $transfer)
    {
        $data = $transfer->toArray();
        $data['source'] = $transfer->source;
        $data['description'] = $transfer->destination;

        return view('transfers.show', [
            'transfer' => $transfer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
