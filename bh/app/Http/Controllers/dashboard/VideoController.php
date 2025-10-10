<?php

namespace App\Http\Controllers\dashboard;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class VideoController extends Controller
{
    public function edit() {
        $video=  Video :: find(1);
        return view('admins.videos.edit', compact('video'));
    }
    public function update(Request $request) {
        $video=  Video :: find($request -> id);
       // $whous->update($request->all());

        $video -> update([
            'details_ar' => $request -> details_ar ,
            'details_en' => $request -> details_en ,
            'details2_ar' => $request -> details2_ar ,
            'details2_en' => $request -> details2_en ,


        ]);


        if($request -> video1) {
            $old = Config::get('app.upload').$video ->	video_ar;
            if(File::exists($old)) {
                File::delete($old);
            }
            $new =  Helper::saveImage($request -> video1,"video_ar_");
            $video -> update([
                'video_ar'     => $new,
            ]);
        }

        if($request -> video2) {
            $old = Config::get('app.upload').$video ->	video_en;
            if(File::exists($old)) {
                File::delete($old);
            }
            $new =  Helper::saveImage($request -> video2,"video_en_");
            $video -> update([
                'video_en'     => $new,
            ]);
        }


        if($request -> video3) {
            $old = Config::get('app.upload').$video ->	video_ar;
            if(File::exists($old)) {
                File::delete($old);
            }
            $new =  Helper::saveImage($request -> video3,"video_ar_");
            $video -> update([
                'video2_ar'     => $new,
            ]);
        }
        if($request -> video4) {
            $old = Config::get('app.upload').$video ->	video_en;
            if(File::exists($old)) {
                File::delete($old);
            }
            $new =  Helper::saveImage($request -> video4,"video_en_");
            $video -> update([
                'video2_en'     => $new,
            ]);
        }








        request()->session()->flash('swal', [
            'title' => "  التحديث  ",
            'message' => "تم التحديث بنجاح",
            'icon' => "success",
            //'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);
        return redirect(app()->getLocale().'/admins/videos');
    }


}
