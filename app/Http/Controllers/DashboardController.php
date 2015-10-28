<?php namespace App\Http\Controllers;

use App\Money\MoneyTrait;
use Auth;

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
     * @return Response
     */
    public function getIndex()
    {
        $envelopes = $this->user->envelopes;
        $total = $this->money($envelopes->sum('amount'));
        return view('dashboard', ['total' => $total]);
    }

}
