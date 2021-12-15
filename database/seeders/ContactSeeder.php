<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Contact::create([

            'email' => 'car@gmail.com',
            'phone' => '0100200',
            'address' => 'Cariro,Metro Dokki,12345',

        ]);
    }
}
