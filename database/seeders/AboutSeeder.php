<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        About::create([
            'title' => "Car Charger Company",
            'body' => "Our company is one of the best company in charging your car any time any where",
            'image' => "Abouts/about.jpg",

        ]);
    }
}
