<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('id', 'DESC')->get();
        return view("dashboard.partners.index", compact('partners'));
    }

    public function create()
    {
        return view("dashboard.partners.create");
    }

    public function store(Request $request) {


        if($request -> imagefile) {
            $image =  Helper::saveImage($request -> imagefile,"partner_");
        }else
            $image ="";


         Partner :: create([

            'name_ar' => $request -> name_ar ,
            'name_en' => $request -> name_en ,
            'url' => $request -> url ,
            'image' => $image ,
            'record_order' => $request -> record_order ,




        ]);


        return redirect(app()->getLocale().'/dashboard/partners/');

    }
    public function edit(Request $request) {

        $partner =  Partner :: find($request->id);

        return view('dashboard.partners.edit', compact('partner'));

    }
    public function update(Request $request) {

        $partner =  Partner :: find($request -> id);

        if($request -> imagefile) {
            $old_image= Config::get('app.upload_image_folder').$partner ->	pic;
            if(File::exists($old_image)) {
                File::delete($old_image);
            }

            $new_image =  Helper::saveImage($request -> imagefile,"partner_");
            $partner -> update([
                'image'     => $new_image,
            ]);

        }
        $partner -> update([
            'name_ar' => $request -> name_ar ,
            'name_en' => $request -> name_en ,
            'url' => $request -> url ,
            'record_order' => $request -> record_order ,
        ]);

        return redirect(app()->getLocale().'/dashboard/partners/');
    }

    public function destroy(Request $request) {
        $company= Partner::find($request -> id);

        $company_img = Config::get('app.upload_image_folder').$company ->	pic;
        if(File::exists($company_img)) {
            File::delete($company_img);
        }


        $company->delete();
        return redirect(app()->getLocale().'/dashboard/partners/');

    }



}
