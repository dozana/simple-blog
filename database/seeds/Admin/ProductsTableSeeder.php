<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Product::class, 5)->create();


//        $product1 = [
//            'title' => 'product 1',
//            'image' => 'files/products/cake.png',
//            'price' => 5000,
//            'description' => 'lorem ipsum text',
//        ];
//
//        $product2 = [
//            'title' => 'product 2',
//            'image' => 'files/products/cake.png',
//            'price' => 5000,
//            'description' => 'lorem ipsum text',
//        ];
//
//        $product3 = [
//            'title' => 'product 3',
//            'image' => 'files/products/cake.png',
//            'price' => 5000,
//            'description' => 'lorem ipsum text',
//        ];
//
//        $product4 = [
//            'title' => 'product 4',
//            'image' => 'files/products/cake.png',
//            'price' => 5000,
//            'description' => 'lorem ipsum text',
//        ];
//
//        \App\Product::created($product1);
//        \App\Product::created($product2);
//        \App\Product::created($product3);
//        \App\Product::created($product4);
    }
}
