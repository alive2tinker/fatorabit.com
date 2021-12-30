<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => "Abdulmalik Alsufayran",
            'phone' => "0548226392",
            'vatRegistration' => "101010542100",
            'expiryDate' => Carbon::now()->addMonths(3),
            'email' => "sufayran@gmail.com",
            'password' => bcrypt('alive2tinker')
        ]);
    }
}
