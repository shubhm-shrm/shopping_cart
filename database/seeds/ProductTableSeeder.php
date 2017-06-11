<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
        	'imagePath' => 'http://prodimage.images-bn.com/pimages/9781338099133_p0_v5_s1200x630.jpg',
        	'title' => 'Harry Potter',
        	'description' => 'Super Cool ',
        	'price' => 10
        	]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'https://cdn.waterstones.com/bookjackets/large/9780/0074/9780007448036.jpg',
        	'title' => 'Game Of Thrones',
        	'description' => 'Must Read ',
        	'price' => 15
        	]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'https://upload.wikimedia.org/wikipedia/en/a/a4/The_Jungle_Book_%282016%29.jpg',
        	'title' => 'Jungle Book',
        	'description' => 'Super Cool - atleast as a Child..!',
        	'price' => 20
        	]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/516GyHY9p6L.jpg',
        	'title' => 'Lord Of the Rings',
        	'description' => 'A very nice Book indeed ',
        	'price' => 16
        	]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51l5tTO47qL._SY344_BO1,204,203,200_.jpg',
        	'title' => 'The Good Son',
        	'description' => 'Good book',
        	'price' => 24
        	]);
        $product->save();                                
    }
}
