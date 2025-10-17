<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
class CountryController extends Controller
{
    public function index()
    {        $countries = Country::get();
        return view("admins.countries.index", compact('countries'));
    }
    public function countries_in_json()
    {
        $countries = Country::get();
        $response = array(
            "data" => $countries
        );
        return response()->json($response);
    }

    public function create()
    {
        return view("admins.countries.create");
    }

    public function store(Request $request) {
        if($request -> image_file) {
            $image =  Helper::saveImage($request -> image_file,"country_");
        }else
            $image ="";
        $country=  Country :: create([
            'name_ar'     => $request -> name_ar ,
            'name_en'     => $request -> name_en ,
            'image' => $image ,
            'record_order'     => $request -> record_order ,
        ]);
        return redirect(app()->getLocale().'/admins/countries/');
    }
    public function edit(Request $request) {

        $country =  Country :: find($request->id);
        return view('admins.countries.edit', compact('country'));

    }
    public function update(Request $request) {
        $country=  Country :: find($request -> id);
        if($request -> imagefile) {
            $old_image= Config::get('app.upload').$country ->	pic;
            if(File::exists($old_image)) {
                File::delete($old_image);
            }
            $new_image =  Helper::saveImage($request -> imagefile,"country_");
            $country -> update([
                'image'     => $new_image,
            ]);
        }
        $country -> update([
            'name_ar'     => $request -> name_ar ,
            'name_en'     => $request -> name_en ,
            'record_order'     => $request -> record_order ,
        ]);
        request()->session()->flash('swal', [
            'title' => "  التحديث  ",
            'message' => "تم التحديث بنجاح",
            'icon' => "success",
            //'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);
        return redirect(app()->getLocale().'/admins/countries//');
    }
    public function destroy(Request $request)
    {
        $country = Country::find($request->id);
        $old_image = Config::get('app.upload') . $country->image;
        if (File::exists($old_image)) {
            File::delete($old_image);
        }
        $deleted=$country->delete();
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
       // return redirect(app()->getLocale() . '/admins/countries/');
    }


    public function get_areas_in_country_in_json(Request $request) {
        $cities= DB::table('p_areas')->where('countries_id', $request -> country_id)->get();
        return response()->json($cities);


    }

}
