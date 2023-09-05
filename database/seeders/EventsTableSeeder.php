<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            'event_name' => 'Lomba 17 Agustusan',
            'event_description' => 'Kegiatan lomba memperingati HUT RI Ke-78 di SMPN 2 Bandar Lampung',
            'event_date' => '2023-08-18',
            'event_time' => '07:00',
            'type' => 'text',
            'image' => '/public/image.png',
        ]);
    }
}
