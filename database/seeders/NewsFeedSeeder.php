<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsFeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data contoh untuk tabel news_feed
        $newsFeedData = [
            [
                'title' => 'Berita Pertama',
                'content' => 'Ini adalah berita pertama dalam news feed.',
                'date' => now()->subDays(5)->toDateString(),
            ],
            [
                'title' => 'Berita Kedua',
                'content' => 'Ini adalah berita kedua dalam news feed.',
                'date' => now()->subDays(3)->toDateString(),
            ],
            // Tambahkan data berita lainnya sesuai kebutuhan Anda
        ];

        // Masukkan data ke dalam tabel news_feed menggunakan perintah DB
        DB::table('news_feed')->insert($newsFeedData);
    }
}
