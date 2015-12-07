<?php

namespace App\Http\Controllers;

use App\Cheque;
use Auth;
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
        $amount = $request->input('amount') * 100;
        $envelope = Auth::user()->envelopes()->findOrFail($request->input('envelope'));

        $cheque->amount = $cheque->amount - $amount;
        $envelope->amount = $envelope->amount + $amount;

        $envelope->save();
        $cheque->save();

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
