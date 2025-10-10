<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CompanyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = CompanyModel::all();
        return view("dashboard.companies.index", compact('companies'));
    }

    public function create()
    {
        return view("dashboard.companies.create");
    }

    public function store(Request $request) {


        if($request -> company_image) {
            $company_image =  Helper::saveImage($request -> company_image,"company_image");
        }else
            $company_image ="";


        $company=  CompanyModel :: create([

            'name' => $request -> name ,
            'name_eng' => $request -> name_eng ,
            'details' => $request -> details ,
            'details_eng' => $request -> details_eng ,
            'pic' => $company_image ,
            'record_order' => $request -> record_order ,




        ]);


        return redirect('/dashboard/companies/');

    }
    public function edit($id) {
        $company =  CompanyModel :: find($id);
        return view('dashboard.companies.edit', compact('company'));

    }
    public function update(Request $request) {

        $company =  CompanyModel :: find($request -> id);

        if($request -> company_image) {
            $company_image_old = Config::get('app.upload_image_folder').$company ->	pic;
            if(File::exists($company_image_old)) {
                File::delete($company_image_old);
            }

            $company_image =  Helper::saveImage($request -> company_image,"company_image");
            $company -> update([
                'pic'     => $company_image,
            ]);

        }


        $company -> update([

            'name' => $request -> name ,
            'name_eng' => $request -> name_eng ,
            'details' => $request -> details ,
            'details_eng' => $request -> details_eng ,

            'record_order' => $request -> record_order ,
        ]);

        return redirect('/dashboard/companies/');
    }

    public function destroy(Request $request) {
        $company= CompanyModel::find($request -> id);

        $company_img = Config::get('app.upload_image_folder').$company ->	pic;
        if(File::exists($company_img)) {
            File::delete($company_img);
        }


        $company->delete();
        return redirect('/dashboard/companies/');

    }



}
