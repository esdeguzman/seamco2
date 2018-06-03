<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowProfile extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke()
    {
        // Return the profiole page for the user type.
        if (auth()->user()->isAdmin()) {
            return view('admin.profile');
        } else {
            return view('member.profile');
        }
    }
}
