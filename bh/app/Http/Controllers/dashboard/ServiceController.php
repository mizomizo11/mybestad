<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderby('id','desc')->get();
        return view("admins.services.index", compact('services'));
    }

    public function create()
    {
        return view("admins.services.create");
    }

    public function store(Request $request)
    {
        if ($request->image_file) {
            $image = Helper::saveImage($request->image_file, "service_");
        } else
            $image = "";
        Service:: create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'summary_ar' => $request->summary_ar,
            'summary_en' => $request->summary_en,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'image' => $image,
            'record_order' => $request->record_order,
        ]);
        return redirect(app()->getLocale() . '/admins/services/');
    }

    public function upload_file(Request $request)
    {
        if ($request->file) {
            $image = Helper::saveImage($request->file, "file_");
        } else
            $image = "";

        if ($image) {
            return response()->json([
                'status' => true,
                'msg' => 'store success',
            ]);

        } else {
            return response()->json([
                'status' => 'false',
            ]);

        }


//        ServiceModel :: create([
//
//            'name' => $request -> name ,
//            'name_eng' => $request -> name_eng ,
//            'details' => $request -> details ,
//            'details_eng' => $request -> details_eng ,
//            'pic' => $image ,
//            'record_order' => $request -> record_order ,
//
//
//
//
//        ]);


//        return redirect(app()->getLocale().'/admins/services/');
//
    }

    public function edit(Request $request)
    {
        $service = Service:: find($request->id);
        return view('admins.services.edit', compact('service'));
    }

    public function update(Request $request)
    {

        $service = Service:: find($request->id);
        if ($request->imagefile) {
            $old_image = Config::get('app.upload') . $service->pic;
            if (File::exists($old_image)) {
                File::delete($old_image);
            }

            $new_image = Helper::saveImage($request->imagefile, "service_");
            $service->update([
                'image' => $new_image,
            ]);

        }
        $service->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'summary_ar' => $request->summary_ar,
            'summary_en' => $request->summary_en,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'record_order' => $request->record_order,
        ]);
        request()->session()->flash('swal', [
            'title' => "  التحديث  ",
            'message' => "تم التحديث بنجاح",
            'icon' => "success",
            //'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);
        return redirect(app()->getLocale() . '/admins/services/');
    }

    public function destroy(Request $request)
    {
        $service = Service::find($request->id);
        $old_image = Config::get('app.upload') . $service->image;
        if (File::exists($old_image)) {
            File::delete($old_image);
        }
        $deleted= $service->delete();
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
       // return redirect(app()->getLocale() . '/admins/services/');
    }


}
