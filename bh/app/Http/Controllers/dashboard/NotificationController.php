<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Notification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
class NotificationController extends Controller
{
    public function index()
    {        $countries = Notification::get();
        return view("admins.countries.index", compact('countries'));
    }
    public function countries_in_json()
    {
        $countries = Notification::get();
        $response = array(
            "data" => $countries
        );
        return response()->json($response);
    }

    public function create()
    {
        return view("admins.notifications.create");
    }

    public function store(Request $request) {

        $country=  Notification :: create([
            'notification'     => $request -> name_ar ,
            'read'     => $request -> name_en ,
            'link'     => $request -> name_en ,


        ]);
        return redirect(app()->getLocale().'/admins/countries/');
    }
    public function edit(Request $request) {

        $country =  Notification :: find($request->id);
        return view('admins.countries.edit', compact('country'));

    }
    public function update(Request $request) {
        $notification=  Notification :: find($request -> id);

     $updated=   $notification -> update([
            'read'     => "yes" ,


        ]);
//        request()->session()->flash('swal', [
//            'title' => "  التحديث  ",
//            'message' => "تم التحديث بنجاح",
//            'icon' => "success",
//            //'position' => "bottom-end",
//            'showConfirmButton' => false,
//        ]);

        if ($updated) {
            return response()->json([
                'status' => 'true',
                'msg' => 'store success',

            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'msg' => 'store faild',

            ]);

        }

        //return redirect(app()->getLocale().'/admins/countries//');
    }
    public function destroy(Request $request)
    {
        $country = Country::find($request->id);

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


}
