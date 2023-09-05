<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsFeed extends Model
{
    use HasFactory;

    protected $table = 'news_feed';

    protected $fillable = [
        'title',
        'content',
        'date',
        // Tambahkan kolom lain yang dapat diisi secara massal
    ];    
}
