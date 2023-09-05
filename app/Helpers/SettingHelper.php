<?php 
// app/Helpers/SettingHelper.php
if(!function_exists('desLayout')){
    function desLayout($idlayout){
        switch($idlayout){
            case 'layout_1':
                $str = '(Sekolah 1)';
                break;
            case 'layout_2':
                $str = '(Sekolah 2)';
                break;
            case 'layout_3':
                $str = '(Masjid 2)';
                break;
            default:
                $str = '';
        }
        return $str;
    }
}
if (!function_exists('getAllSettings')) {
    /**
     * Memuat semua pengaturan dari database dan menyimpan dalam cache.
     *
     * @return array
     */
    function getAllSettings()
    {

        return \App\Models\Setting::pluck('value', 'key')->all();
    }
}

if (!function_exists('getSetting')) {
    /**
     * Mengambil nilai pengaturan berdasarkan kunci.
     *
     * @param string $key
     * @return mixed
     */
    function getSetting($key)
    {
        //$settings = getAllSettings();
        //return $settings[$key] ?? null;
        return \App\Models\Setting::where('key', $key)->value('value');
    }
}

// app/Helpers/SettingHelper.php

if (!function_exists('updateSetting')) {
    /**
     * Memperbarui nilai pengaturan berdasarkan kunci.
     *
     * @param string $key
     * @param mixed $value
     * @return bool
     */
    function updateSetting($key, $value)
    {
        //return \App\Models\Setting::where('key', $key)->update(['value' => $value]);
        $setting = \App\Models\Setting::where('key', $key)->first();

        if ($setting) {
            if (!in_array($setting->key, $setting->getProtectedValues())) {
                $setting->update(['value' => $value]);
            } else {
                // Tindakan yang sesuai ketika nilai dilindungi coba diperbarui.
            }
        }        
    }
}

if (!function_exists('getSettingDisplay')) {
    /**
     * Mengambil nilai pengaturan berdasarkan kunci.
     *
     * @param string $key
     * @return mixed
     */
    function getSettingDisplay($key)
    {
        //$settings = getAllSettings();
        //return $settings[$key] ?? null;
        return \App\Models\DisplaySetting::where('key', $key)->value('value');
    }
}

