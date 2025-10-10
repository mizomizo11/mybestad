<?php

namespace App\Http\Controllers\dashboard;


use App\Http\Controllers\Controller;
use App\Models\Timezone;
use Illuminate\Http\Request;

class TimezoneController extends Controller
{
    public function index()
    {
        $timezones = Timezone::orderby("id","desc")->get();
        return view("admins.timezones.index", compact('timezones'));
    }

    public function create()
    {
        return view("admins.timezones.create");
    }

    public function store(Request $request) {

        Timezone :: create([
            'name_ar' => $request -> name_ar ,
            'name_en' => $request -> name_en ,
            'utc_offset' => $request -> utc_offset ,
        ]);
        return redirect(app()->getLocale().'/admins/timezones/');
    }
    public function edit(Request $request) {
        $timezone=  Timezone :: find($request->id);
        return view('admins.timezones.edit', compact('timezone'));
    }
    public function update(Request $request) {
        $Timezone =  Timezone :: find($request -> id);

        $Timezone -> update([
            'name_ar' => $request -> name_ar ,
            'name_en' => $request -> name_en ,
            'utc_offset' => $request -> utc_offset ,
        ]);
        request()->session()->flash('swal', [
            'title' => "  التحديث  ",
            'message' => "تم التحديث بنجاح",
            'icon' => "success",
            //'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);
        return redirect(app()->getLocale().'/admins/timezones/');
    }

    public function destroy(Request $request) {
        $Timezone= Timezone::find($request -> id);

        $deleted=$Timezone->delete();
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
        //return redirect(app()->getLocale().'/admins/timezones/');

    }



}
