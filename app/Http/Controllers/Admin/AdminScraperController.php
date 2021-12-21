<?php

namespace App\Http\Controllers\Admin;

use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client as GuzzleClient;

class AdminScraperController extends Controller
{
    private $results = [];

    public function index()
    {
        $client = new Client();
        $url = 'https://www.worldometers.info/coronavirus/';
        $crawler = $client->request('GET', $url);

//        echo $crawler->filter('.maincounter-number')->text();

        $crawler->filter('#maincounter-wrap')->each(function ($item) {
            $this->results[$item->filter('h1')->text()] = $item->filter('.maincounter-number')->text();
        });

        $data = $this->results;

        return view('admin.scraper.index')->with('data', $data);
    }

    public function bbcNews() {
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.worldometers.info/coronavirus/');
        $crawler->filter('.block-link__overlay-link')->each(function ($node) {
            print $node->text()."\n";
        });
    }
}
