<?php namespace App\Http\Controllers;

use App\Envelope;
use App\Events\TransactionWasCreated;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Transaction;
use Auth;
use Event;
use Illuminate\Http\Request;

class TransactionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($envelopeId)
	{
        //
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param Envelope $envelope
	 * @return Response
	 */
	public function create(Envelope $envelope)
	{
		return view('transactions.create', $envelope->toArray());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @param Envelope $envelope
	 * @return Response
	 */
	public function store(Request $request, Envelope $envelope)
	{
		$description = $request->input('description');
		$amount = $request->input('amount') * 100;

		// TODO: Move to event
		$transaction = new Transaction(['amount' => $amount, 'description' => $description]);
		$transaction->envelope()->associate($envelope);
		Auth::user()->transactions()->save($transaction);

		// TODO: Make updating part of the transaction event
		$envelope->amount = $envelope->amount - $amount;

		$envelope->save();

		$TransactionWasCreated = new TransactionWasCreated($transaction, $transaction);
		$TransactionWasCreated->addAuditable($envelope->auditable_id);
		Event::fire($TransactionWasCreated);

		return redirect()->route('envelope.show', [$envelope->id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
