<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowDashboard extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke()
    {
        // Return the dashboard page for the user type.
        if (auth()->user()->isAdmin()) {
            return view('admin.dashboard');
        } else {
            return view('member.dashboard');
        }
    }
}
