<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;


use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PortfolioCategoryController extends Controller
{
    public function index()
    {

       $categories = PortfolioCategory::orderBy('id', 'DESC')->get();

        return view("dashboard.portfolios_categories.index", compact('categories'));
    }

    public function create()
    {
        return view("dashboard.portfolios_categories.create");
    }

    public function store(Request $request) {

        if($request -> fileimage) {
            $image =  Helper::saveImage($request -> fileimage,"category_image");
        }else
            $image ="";
        $category=  PortfolioCategory :: create([
            'name_ar' => $request -> name_ar ,
            'name_en' => $request -> name_en ,
            'details_ar' => $request -> details_ar ,
            'details_en' => $request -> details_en ,
            'image' => $image ,
            'record_order' => $request -> record_order ,
            'html' => $request -> html ,
            'style' => $request -> style ,
            'slug_ar' => Str::slug($request -> name_ar,'-',null),
            'slug_en' => Str::slug($request -> name_en,'-',null)

        ]);
        return redirect(app()->getLocale().'/dashboard/portfolios-categories/');
    }
    public function edit(Request $request) {
        $category =  PortfolioCategory :: find($request->id);
        return view('dashboard.portfolios_categories.edit', compact('category'));

    }
    public function update(Request $request) {
        $category =  PortfolioCategory :: find($request -> id);
        if($request -> image_file) {
            $old_image = Config::get('app.upload').$category ->	image;
            if(File::exists($old_image)) {
                File::delete($old_image);
            }
            $image =  Helper::saveImage($request -> image_file,"category_image");
            $category -> update([
                'image'     => $image,
            ]);

        }


        $category -> update([
            'name_ar' => $request -> name_ar ,
            'name_en' => $request -> name_en ,
            'details_ar' => $request -> details_ar ,
            'details_en' => $request -> details_en ,
            'record_order' => $request -> record_order ,
            'html' => $request -> html ,
            'style' => $request -> style ,
            'slug_ar' => Str::slug($request -> name_ar,'-',null),
            'slug_en' => Str::slug($request -> name_en,'-',null)
            //, '-', null
        ]);

        return redirect(app()->getLocale().'/dashboard/portfolios-categories/');
    }

    public function destroy(Request $request) {
        $category= PortfolioCategory::find($request -> id);
        $old_image = Config::get('app.upload').$category ->	image;
        if(File::exists($old_image)) {
            File::delete($old_image);
        }
        $category->delete();
        return redirect(app()->getLocale().'/dashboard/portfolios-categories/');

    }



}
