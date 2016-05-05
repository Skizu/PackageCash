<?php namespace App\Http\Controllers;

use App\Domain\Tutorial\State;
use App\Money\MoneyTrait;
use View;

class DashboardController extends Controller
{
    use MoneyTrait;

    /*
    |--------------------------------------------------------------------------
    | Dashboard Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = request()->user();
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return View
     */
    public function index()
    {
        $envelopes = $this->user->envelopes;
        $UnsortedCheques = $this->user->cheques()->unsorted();
        $UnsortedEnvelopes = $this->user->envelopes()->unsorted();
        $Total = $this->money($envelopes->sum('amount') + $UnsortedCheques->sum('amount'));
        $packages = $this->user->packages;

        $Steps = [
            State::CREATE_CHEQUE => ['step' => 1, 'name' => 'Create Cheque', 'in_menu' => true],
            State::CREATE_ENVELOPE => ['step' => 2, 'name' => 'Create Envelope', 'in_menu' => true],
            State::DISTRIBUTE_CHEQUE => ['step' => 3, 'name' => 'Distribute Cheque', 'in_menu' => false],
            State::CREATE_PACKAGE => ['step' => 4, 'name' => 'Create Package', 'in_menu' => true],
            State::ASSIGN_PACKAGE => ['step' => 5, 'name' => 'Assign Package', 'in_menu' => false],
        ];

        return view('dashboard', compact('Steps', 'Total', 'UnsortedCheques', 'UnsortedEnvelopes', 'envelopes', 'packages'));
    }

}
