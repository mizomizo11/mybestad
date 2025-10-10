<?php

namespace App\Http\Controllers\dashboard;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
class SettingController extends Controller
{
    public function edit() {
        $settings=  Settings :: find("1");
        return view('admins.settings.edit', compact('settings'));
    }
    public function update(Request $request) {
        $setting =  Settings :: find(1);
        if($request -> imagefile1) {
            $setting_image_old = Config::get('app.upload').$setting ->	logo_ar;
            if(File::exists($setting_image_old)) {
                File::delete($setting_image_old);
            }
            $setting_image =  Helper::saveImage($request -> imagefile1,"logo_ar_");
            $setting -> update([
                'logo_ar'     => $setting_image,
            ]);
        }
        if($request -> imagefile2) {
            $setting_image_old = Config::get('app.upload').$setting ->	logo_en;
            if(File::exists($setting_image_old)) {
                File::delete($setting_image_old);
            }
            $setting_image2 =  Helper::saveImage($request -> imagefile2,"logo_en_");
            $setting -> update([
                'logo_en'     => $setting_image2,
            ]);
        }
        $setting -> update([
            'primary_color' => $request -> primary_color ,


        ]);

        request()->session()->flash('swal', [
            'title' => "  التحديث  ",
            'message' => "تم التحديث بنجاح",
            'icon' => "success",
            //'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);


        return redirect(app()->getLocale().'/admins/settings/');
    }

}
