<?php

namespace App\Http\Controllers\Admin;

use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminScraperController extends Controller
{
    private $results = [];

    public function index()
    {
        $client = new Client();
        $url = 'https://www.worldometers.info/coronavirus/';
        $page = $client->request('GET',$url);

//        echo $page->filter('.maincounter-number')->text();

        $page->filter('#maincounter-wrap')->each(function ($item) {
            $this->results[$item->filter('h1')->text()] = $item->filter('.maincounter-number')->text();
        });

        $data = $this->results;

        return view('admin.scraper.index')->with('data', $data);
    }
}
