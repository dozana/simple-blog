<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [
            [
                'title' => 'Google',
                'url' => "https://www.google.com/",
                'description' => 'USA search engine'
            ],
            [
                'title' => 'Yahoo',
                'url' => "https://www.yahoo.com/",
                'description' => 'USA search engine'
            ],
            [
                'title' => 'Yandex',
                'url' => "https://yandex.ru/",
                'description' => 'Russian search engine'
            ]
        ];

        DB::table('links')->insert($links);

    }
}
