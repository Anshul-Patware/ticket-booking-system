<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('events')->insert([
            ['name' => 'Music Fest', 'date' => '2025-05-15', 'venue' => 'City Arena', 'available_seats' => 100],
            ['name' => 'Tech Talk', 'date' => '2025-06-01', 'venue' => 'Tech Park', 'available_seats' => 50],
            ['name' => 'Food Carnival', 'date' => '2025-06-10', 'venue' => 'Town Hall', 'available_seats' => 200],
        ]);
    }
}
