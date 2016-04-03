<?php namespace App\Http\Controllers;

use App\Envelope;
use App\Events\EnvelopePackageWasAssigned;
use App\Events\EnvelopePackageWasUnassigned;
use App\Events\EnvelopeWasCreated;
use App\Events\EnvelopeWasRenamed;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Event;
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

        Event::fire(new EnvelopeWasCreated($request->user(), $envelope, $envelope));

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
     *
     * @param Envelope $envelope
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Envelope $envelope)
    {
        $packages = $envelope->user->packages;

        return view('envelopes.edit', compact('envelope', 'packages'));
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
        $envelope->name = $request->input('name', $envelope->name);
        $package = $request->input('package');
        $envelope->package()->associate(empty($package) ? null : $package);

        if ($envelope->isDirty('name')) {
            $EnvelopeWasRenamed = new EnvelopeWasRenamed($envelope, $envelope->toArray());
            $EnvelopeWasRenamed->addData('Original', $envelope->getOriginal());
            Event::fire($EnvelopeWasRenamed);
        }

        if ($envelope->isDirty('package_id')) {
            $event = ($envelope->package) ? EnvelopePackageWasAssigned::class : EnvelopePackageWasUnassigned::class;
            $EnvelopeWasAssignedPackage = new $event($envelope, $envelope->toArray());
            $EnvelopeWasAssignedPackage->addData('Original', $envelope->getOriginal());
            Event::fire($EnvelopeWasAssignedPackage);
        }

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
