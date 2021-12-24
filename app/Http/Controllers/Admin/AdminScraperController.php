<?php

namespace App\Http\Controllers\Admin;

use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client as GuzzleClient;

class AdminScraperController extends Controller
{
    private $results = [];

    public function coronaVirus()
    {
        $client = new Client();
        $url = 'https://www.worldometers.info/coronavirus/';
        $crawler = $client->request('GET', $url);

//        echo $crawler->filter('.maincounter-number')->text();

        $crawler->filter('#maincounter-wrap')->each(function ($item) {
            $this->results[$item->filter('h1')->text()] = $item->filter('.maincounter-number')->text();
        });

        $data = $this->results;

        return view('admin.scraper.corona-virus')->with('data', $data);
    }
}
