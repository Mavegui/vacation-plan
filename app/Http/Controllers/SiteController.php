<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Show the home page of the site.
     *
     * This method handles the request to the home page of the site
     * and returns the view for the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        // Return the view for the site home page
        return view('site.home');
    }

}
