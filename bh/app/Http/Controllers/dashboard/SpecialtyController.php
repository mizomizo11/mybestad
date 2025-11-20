<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class SpecialtyController extends Controller
{
    public function index()
    {
        $specialties = Specialty::orderby('id','desc')->get();
        return view("admins.specialties.index", compact('specialties'));
    }
    public function create()
    {
        $specialties = Specialty::orderBy('record_order', 'asc')->get();
        return view("admins.specialties.create",compact('specialties'));
    }
    public function store(Request $request) {
        if($request -> image_file) {
            $image =  Helper::saveImage($request -> image_file,"speciality_image");
        }else
            $image ="";
        $created=  Specialty :: create([
            'name_ar' => $request -> name_ar ,
            'name_en' => $request -> name_en ,
            'price' => $request -> price ,
            'details_ar' => $request -> details_ar ,
            'details_en' => $request -> details_en ,
            'record_order' => $request -> record_order ,
            'image' => $image ,
           ]);
        return redirect(app()->getLocale().'/admins/specialties/');
    }
    public function edit(Request $request) {
        $specialty  =  Specialty :: find($request->id);
        return view('admins.specialties.edit', compact('specialty'));
    }
    public function update(Request $request) {
        $specialty =  Specialty :: find($request -> id);
        if($request -> image_file) {
            $old_image = Config::get('app.upload').$specialty ->	image;
            if(File::exists($old_image)) {
                File::delete($old_image);
            }
            $new_image =  Helper::saveImage($request -> image_file,"specialty_image");
            $specialty -> update([
                'image'     => $new_image,
            ]);

        }
        $specialty -> update([
            'name_ar' => $request -> name_ar ,
            'name_en' => $request -> name_en ,
            'price' => $request -> price ,
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
        return redirect(app()->getLocale().'/admins/specialties/');
    }

    public function destroy(Request $request) {
        $specialty= Specialty::find($request -> id);
        $old_image = Config::get('app.upload').$specialty ->image;
        if(File::exists($old_image)) {
            File::delete($old_image);
        }
        $deleted= $specialty->delete();

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
      // return redirect(app()->getLocale().'/admins/specialties/');

    }



}
