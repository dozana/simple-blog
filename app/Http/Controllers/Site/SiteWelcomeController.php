<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class SiteWelcomeController extends Controller
{
    public function index()
    {
        return view('site.welcome');
    }
}
