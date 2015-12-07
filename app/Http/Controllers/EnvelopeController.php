<?php namespace App\Http\Controllers;

use App\Envelope;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Illuminate\Http\Request;

class EnvelopeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('envelopes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\StoreEnvelopeRequest $request
     * @return Envelope
     */
    public function store(Requests\StoreEnvelopeRequest $request)
    {
        $envelope = new Envelope([
            'name' => $request->input('name'),
            'amount' => 0,
            'colour' => 'blue'
        ]);

        $envelope->user()->associate(Auth::id());

        $envelope->save();

        return $envelope;
    }

    /**
     * Display the specified resource.
     *
     * @param  Envelope $envelope
     * @return Response
     */
    public function show(Envelope $envelope)
    {
        return view('envelopes.show', compact('envelope'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Envelope $envelope
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Envelope $envelope)
    {
        $envelope->colour = $request->input('colour');

        $envelope->save();

        return ($request->isJson()) ? $envelope : redirect()->route('envelope.show', $envelope);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
