<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blog')->truncate();
/*************  ✨ Windsurf Command 🌟  *************/
        \DB::table('blog')->insert([
            [
                'title' => 'First Blog Post',
                'content' => 'This is the content of the first blog post.',
                'image' => 'image1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Second Blog Post',
                'content' => 'This is the content of the second blog post.',
                'image' => 'image2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more dummy data as needed
        ]);
        //  
/*******  7ba39e69-08cc-423a-a1aa-7db139a85f1a  *******/    

    }
}
