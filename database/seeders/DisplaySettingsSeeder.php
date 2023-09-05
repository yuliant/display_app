<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisplaySettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('display_settings')->insert([
            [
                'key' => 'display_title',
                'value' => 'DISPLAY INFORMASI SMPN 2 BANDAR LAMPUNG',
                'label' => 'Judul Display',
                'description' => 'Judul utama yang ditampilkan.',
                'type' => 'text',
            ],
            [
                'key' => 'display_subtitle',
                'value' => 'Jl. Pramuka No. 108 Rajabasa Nunyai, Bandar Lampung, Telp. 0721 8011455',
                'label' => 'Sub Judul Display',
                'description' => 'Sub judul yang menambahkan keterangan.',
                'type' => 'text',
            ],
            [
                'key' => 'logo',
                'value' => 'path/to/default_logo.png', // Path ke logo default
                'label' => 'Logo',
                'description' => 'Logo yang ditampilkan di tampilan informasi.',
                'type' => 'file',
            ],
            [
                'key' => 'bg_image',
                'value' => 'path/to/default_bg_image.jpg', // Path ke gambar latar belakang default
                'label' => 'Gambar Latar Belakang',
                'description' => 'Gambar latar belakang judul display.',
                'type' => 'file',
            ],
            [
                'key' => 'video_source',
                'value' => 'playlist',
                'label' => 'Sumber Video',
                'description' => 'Sumber video (playlist, local, streaming).',
                'type' => 'select',
            ],
            [
                'key' => 'video_playlist_id',
                'value' => '',
                'label' => 'ID Playlist Video',
                'description' => 'ID playlist video YouTube.',
                'type' => 'text',
            ],
            [
                'key' => 'video_streaming_url',
                'value' => '',
                'label' => 'URL Streaming Video',
                'description' => 'URL streaming video eksternal.',
                'type' => 'url',
            ],
            [
                'key' => 'display_orientation',
                'value' => 'landscape',
                'label' => 'Orientasi Display',
                'description' => 'Orientasi tampilan (landscape/portrait).',
                'type' => 'radio',
            ],
            [
                'key' => 'mode_event',
                'value' => 'text',
                'label' => 'Tipe Mode Event',
                'description' => 'Tipe mode event bisa text / image',
                'type' => 'radio',
            ],
        ]);
    }
}
