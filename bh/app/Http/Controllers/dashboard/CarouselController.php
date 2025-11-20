<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::all();
        return view("admins.carousels.index", compact('carousels'));
    }

    public function create()
    {
        return view("admins.carousels.create");
    }

    public function store(Request $request) {
        if($request -> carousel_image) {
            $carousel_image =  Helper::saveImage($request -> carousel_image,"carousel_image");
        }else
            $carousel_image ="";
        $carousel=  Carousel :: create([
            'name_ar' => $request -> name_ar ,
            'name_en' => $request -> name_en ,
            'details_ar' => $request -> details_ar ,
            'details_en' => $request -> details_en ,
            'image' => $carousel_image ,
            'sort' => $request -> sort ,
        ]);
        return redirect(app()->getLocale().'/admins/carousels/');
    }
    public function edit(Request $request) {
        $carousel=  Carousel :: find($request->id);
        return view('admins.carousels.edit', compact('carousel'));
    }
    public function update(Request $request) {
        $carousel =  Carousel :: find($request -> id);
        if($request -> carousel_image) {
            $carousel_image_old = Config::get('app.upload').$carousel ->	image;
            if(File::exists($carousel_image_old)) {
                File::delete($carousel_image_old);
            }
            $carousel_image =  Helper::saveImage($request -> carousel_image,"carousel_image");
            $carousel -> update([
                'image'     => $carousel_image,
            ]);

        }
        $carousel -> update([
            'name_ar' => $request -> name_ar ,
            'name_en' => $request -> name_en ,
            'details_ar' => $request -> details_ar ,
            'details_en' => $request -> details_en ,
            'record_order' => $request -> record_order ,
        ]);
        request()->session()->flash('swal', [
            'title' => "  التحديث  ",
            'message' => "تم التحديث بنجاح",
            'icon' => "success",
            //'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);
        return redirect(app()->getLocale().'/admins/carousels/');
    }

    public function destroy(Request $request) {
        $carousel= Carousel::find($request -> id);

        $carousel_img = Config::get('app.upload').$carousel ->	pic;
        if(File::exists($carousel_img)) {
            File::delete($carousel_img);
        }


        $deleted=$carousel->delete();
        if($deleted){
            return response()->json([
                'status' => 'true' ,
                'msg' => 'store success' ,
            ]);
        }else{
            return response()->json([
                'status' => 'false' ,
            ]);
        }
        //return redirect(app()->getLocale().'/admins/carousels/');

    }



}
