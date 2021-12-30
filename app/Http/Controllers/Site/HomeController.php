<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

class HomeController extends IndexController
{
    public function index()
    {
        return view('site.home.index');
    }
}
