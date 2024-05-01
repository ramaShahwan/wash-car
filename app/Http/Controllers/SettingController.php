<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function getSetting()
    {
        $getShowSettings = Setting::first();
        // dd($getShowSettings);

        return view('admin.sittings.show', compact('getShowSettings'));
    }

    public function getSettingForFooter()
    {
        $getShowSettings = Setting::first();
        return view('site.layouts.footer', compact('getShowSettings'));
    }


    public function setSettings(Request $request)
    {
        
        $validation = $request->validate([
            'nameWebsite' => "max:30",
           // 'Description' => "max:256"
        ]);
        $get_id = Setting::select('id','icon')->first();
        $pathImg = str_replace('\\', '/', public_path('uploading/')) . $get_id->icon;
        if (Setting::select('id')->exists()) {
            
            
            if($request->hasFile('icon')){
                $get_id = Setting::select('id', 'icon')->first();
                $pathImg = str_replace('\\', '/', public_path('uploading/')) . $get_id->icon;
                if (File::exists($pathImg)) {
                    File::delete($pathImg);
                }
                $image = $request->file('icon');
                $name = hexdec(uniqid());
                $real_path = './public/uploading/';
              //  Image::make($image->getRealPath())->encode('webp', 100)->resize(150, 150)->save(public_path('uploading/'  .  $name . '.webp'));
                DB::table('sittings')->where('id' , $get_id->id)->update([
                    'icon' => $name . '.' . 'webp'
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
             //   'insertQuick' => $request->insertCheck ? true : false ,
                'Is_hide' => $request->btnhide ? true : false,
                
            ]);

            return redirect()->back()->with('msg', 'تم الحفظ بنجاح');
        } else {
            
            if ($request->hasFile('icon')) {
                $myimage = $request->input('icon');
                $time = time();
              //  Image::make($request->file('icon')->getRealPath())->encode('webp', 100)->resize(150, 150)->save(public_path('uploading/' .  $time . '.webp'));
            }
            $insertTODatabase = DB::table('sittings')->insert([
                'nameWebsite' => $request->nameWebsite,
                'linkWebsite' => $request->linkWebsite,
                'Description' => $request->Description,
                'socialMidiaFacebook' => $request->socialMidiaFacebook,
                'socialMidiaTelegram' => $request->socialMidiaTelegram,
                'socialMidiaInstagram' => $request->socialMidiaInstagram,
                'socialMidiaYoutube' => $request->socialMidiaYoutube,
                'Keywords' => $request->Keywords,
                'insertQuick' => $request->insertCheck,
                'Is_hide' => $request->btnhide,
                'icon' => $time . '.' . 'webp'
            ]);
            return redirect()->back()->with('msg', 'تم الحفظ بنجاح');
        }
    }

}