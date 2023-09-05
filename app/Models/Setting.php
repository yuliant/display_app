<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['key', 'value'];
    protected static $protectedValues = ['short_name', 'app_name', 'app_logo','app_description','contact_info'];
    
    public static function getValueByKey($key)
    {
        return self::where('key', $key)->value('value');
    } 

    public function getProtectedValues()
    {
        return self::$protectedValues;
    }
    
}
