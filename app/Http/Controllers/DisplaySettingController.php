<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisplaySetting;
use Illuminate\Support\Facades\Session;
use App\Events\PodcastProcessed;

class DisplaySettingController extends Controller
{
    public function index(){
        $title = "Pengaturan Display";
        $display_settings = DisplaySetting::all();
        return view('display_settings.index', compact('display_settings', 'title'));
    }

    public function edit(){
        $title = "Edit Pengaturan Display";
        $display_setting = DisplaySetting::findOrFail($id);
        return view('display_settings.edit', compact('display_setting','title'));
    }
    public function update_all(Request $request)
    {
        if ($request->hasFile('bg_image')){
            $filesData = $request->file('bg_image');         
            foreach($filesData as $settingId => $file){
                $allowedMimes = ['image/jpeg', 'image/png', 'image/gif'];
                if (in_array($file->getMimeType(), $allowedMimes)) {
                    $fileSetting = DisplaySetting::find($settingId);  
                    $fileName = time().rand(1,99).'.'.$file->extension();
                    $bgImagePath = $file->storeAs('bg_images',$fileName,'public');
                    $fileSetting->update(['value' => $bgImagePath]); 
                }            
            }
        }
        $settingsData = $request->input('settings', []);
        foreach ($settingsData as $settingId => $settingValue) {
            $setting = DisplaySetting::find($settingId);          
            if ($setting) {    
                $setting->update(['value' => $settingValue['value']]);                 
            }
        }
        event(new PodcastProcessed('success'));
        return redirect()->route('display-settings.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }  

    public function update(Request $request, $id){
        $display_setting = DisplaySetting::findOrFail($id);
        $request->validate([
            'value' => 'required',
        ]);
        $display_setting->update(['value' => $request->input('value')]);
        event(new PodcastProcessed('success'));
        return redirect()->route('display-settings.index')->with('success', 'Pengaturan berhasil di perbaharui.');
    }
}
