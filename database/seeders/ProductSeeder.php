<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name'=>'Samsung TV',
                'price'=>'20000',                
                'category'=>'TV',
                'description'=>'A Smart TV with Awsome Features',
                'gallery'=>"https://vision.com.bd/images/detailed/8/0267370_vision-32-led-tv-h-02-smart.jpeg",
            ],
            [
                'name'=>'Samsung Smart Vision TV',
                'price'=>'20000',                
                'category'=>'TV',
                'description'=>'A Smart TV with Awsome Features',
                'gallery'=>"https://image.shutterstock.com/image-illustration/4k-monitor-isolated-on-white-260nw-1029025798.jpg",
            ],
            [
                'name'=>'Samsung A7 Classic Phone',
                'price'=>'25000',
                'category'=>'Mobile',
                'description'=>'A Smart Phone with 4GB RAM and 7 inch Display',                
                'gallery'=>"https://images.unsplash.com/photo-1567581935884-3349723552ca?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8bW9iaWxlfGVufDB8fDB8fA%3D%3D&w=1000&q=80",
            ],
            [
                'name'=>'Samsung J Prime Phone',
                'price'=>'22000',
                'category'=>'Fridge',
                'description'=>'A Smart Fridge For Home Applience. ',                
                'gallery'=>"https://allpoo.com/wp-content/uploads/2020/09/Refrigerator-238-Ltr-Singer-Red-SINGER-G-BCD-238-1-600x733.jpg"
            ],
            [
                'name'=>'Shaomi Primo X Phone',
                'price'=>'200',
                'category'=>'Mobile',
                'description'=>'A Smart Phone with 4GB RAM and 7 inch Display',                
                'gallery'=>"https://www.gizmochina.com/wp-content/uploads/2020/01/Xiaomi-MI-10-render.png"
            ]

        ]);
    }
}
