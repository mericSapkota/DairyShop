<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('admins')->insert(
            [
                'name' => 'admin',
                'email' => 'admin@123.com',
                'password' => bcrypt('admin@123.com')
            ]
        );

        DB::table('farmer_details')->insert(
            [
                'price' => 123,
                'qty' => 2,
                'category' => 'icecream',
                'product_name' => 'Pecorini Macorini',
                'photo' => 'images/product-1.jpg'
            ],
            [
                'product_name' => 'Evaporated Milk',
                'price' => 4,
                'qty' => 5,
                'photo' => 'images/product-2.jpg',
            ],

            [
                'qty' => 12,
                'produt_name' => 'Farm Sour Cream',
                'price' => 22,
                'photo' => 'images/product-3.jpg'
            ],

            [
                'qty' => 12,
                'product_name' => 'Farm Sour Cream',
                'price' => '$22 - $50',
                'photo' => 'images/product-4.jpg'
            ],

            [
                'qty' => 12,
                'product_name' => 'Farm Sour Cream',
                'price' => '$22 - $50',
                'photo' => 'images/product-5.jpg'
            ],

            [
                'qty' => 12,
                'product_name' => 'Farm Sour Cream',
                'price' => '$22 - $50',
                'photo' => 'images/product-6.jpg'
            ],

            [
                'qty' => 12,
                'product_name' => 'Farm Sour Cream',
                'price' => '$22 - $50',
                'photo' => 'images/product-8.jpg'
            ],
        );


        DB::table('users')->insert(
            [
                'name' => 'user1',
                'email' => 'user@123.com',
                'password' => bcrypt('password')
            ]
        );

        DB::table('users')->insert(
            [
                'name' => 'admin',
                'email' => 'admin@123.com',
                'password' => bcrypt('admin@123.com')
            ]
        );

        DB::table('farmer_details')->insert(
            [
                'product_name' => 'Pecorino Romano',
                'price' => 140,
                'qty' => 10,
                'category' => 'milk',
                'photo' => 'images/product-8.jpg'
            ]
        );
    }
}
