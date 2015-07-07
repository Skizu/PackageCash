<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    /**
     * Display the landing page
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('guest.welcome');
    }

    /**
     * Display the about us page
     *
     * @return Response
     */
    public function getAbout()
    {
        return view('guest.about');
    }

    /**
     * Display the product page
     *
     * @return Response
     */
    public function getPromise()
    {
        return view('guest.promise');
    }
}
