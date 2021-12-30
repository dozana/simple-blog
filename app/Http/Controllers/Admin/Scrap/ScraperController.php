<?php

namespace App\Http\Controllers\Admin\Scrap;

use Goutte\Client;
use App\Http\Controllers\Admin\IndexController;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;

class ScraperController extends IndexController
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

        return view('admin.scrap.worldometers.index')->with('data', $data);
    }
}
