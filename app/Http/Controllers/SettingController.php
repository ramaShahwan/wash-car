<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function getSetting()
    {
        $getShowSettings = Setting::first();
        // dd($getShowSettings);

        return view('admin.settings.show', compact('getShowSettings'));
    }

    // public function getSettingFooter()
    // {
    //     $getShowSettings = Setting::first();
    //     // dd($getShowSettings);

    //     return view('admin.settings.footer', compact('settings'));
    // }

    public function getSettingFooter()
    {
        $getShowSettings = Setting::first();
        return view('site.layouts.master', compact('getShowSettings'));
    }


    public function setSettings(Request $request)
    {
        $validation = $request->validate([
            'nameWebsite' => "max:30",
           'Description' => "max:256"
        ]);

        $get_id = Setting::select('id','icon')->first();
        if (Setting::select('id')->exists()) {
            
      // store image
       if($request->hasFile('icon')){
        $pathImg = str_replace('\\', '/', public_path('icon/')) . $get_id->icon;
        if (File::exists($pathImg)) {
            File::delete($pathImg);
        }
        $newImage = $request->file('icon');
        //for change image name
      //  $name = hexdec(uniqid());
      //  $newImageName = 'icon' .$name.  '.'  . '.webp';
      $newImageName = 'icon' . '.webp';

        $newImage->move(public_path('site/img/icon/'), $newImageName);

        DB::table('settings')->where('id' , $get_id->id)->update([
            'icon' => $newImageName 
        ]);
           }
            
            
            $insertTODatabase = DB::table('settings')->update([
                'nameWebsite' => $request->nameWebsite,
                'linkWebsite' => $request->linkWebsite,
                'Description' => $request->Description,
                'socialMidiaFacebook' => $request->socialMidiaFacebook,
                'socialMidiaTelegram' => $request->socialMidiaTelegram,
                'socialMidiaInstagram' => $request->socialMidiaInstagram,
                'socialMidiaYoutube' => $request->socialMidiaYoutube,
                'Keywords' => $request->Keywords,
                //'icon' => $newImageName,

             //   'insertQuick' => $request->insertCheck ? true : false ,
                // 'Is_hide' => $request->btnhide ? true : false,
                
            ]);
            session()->flash('Add', 'تم إضافة الإعدادات بنجاح');
            return back();
        } else {
            

            if($request->hasFile('icon')){
                $newImage = $request->file('icon');
                //for change image name
             //   $name = hexdec(uniqid());
              //  $newImageName = 'icon' .$name.  '.'  . '.webp';
              $newImageName = 'icon' . '.webp';

                $newImage->move(public_path('site/img/icon/'), $newImageName);
            }

            $insertTODatabase =Setting:: create([
                'nameWebsite' => $request->nameWebsite,
                'linkWebsite' => $request->linkWebsite,
                'Description' => $request->Description,
                'socialMidiaFacebook' => $request->socialMidiaFacebook,
                'socialMidiaTelegram' => $request->socialMidiaTelegram,
                'socialMidiaInstagram' => $request->socialMidiaInstagram,
                'socialMidiaYoutube' => $request->socialMidiaYoutube,
                'Keywords' => $request->Keywords,
                // 'insertQuick' => $request->insertCheck,
                // 'Is_hide' => $request->btnhide,
                'icon' =>$newImageName 
            ]);
            session()->flash('Edit', 'تم تعديل الإعدادات بنجاح');
            return back();
        }
    }

}