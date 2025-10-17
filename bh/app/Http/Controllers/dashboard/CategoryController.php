<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryModel::all();
        return view("dashboard.categories.index", compact('categories'));
    }
    public function create()
    {
        return view("dashboard.categories.create");
    }
    public function store(Request $request) {
        if($request -> category_image) {
            $category_image =  Helper::saveImage($request -> category_image,"category_image");
        }else
            $category_image ="";
        $category=  CategoryModel :: create([
            'name' => $request -> name ,
            'name_eng' => $request -> name_eng ,
            'details' => $request -> details ,
            'details_eng' => $request -> details_eng ,
            'pic' => $category_image ,
            'record_order' => $request -> record_order ,




        ]);


        return redirect('/dashboard/categories/');

    }
    public function edit($id) {
        $category =  CategoryModel :: find($id);
        return view('dashboard.categories.edit', compact('category'));

    }
    public function update(Request $request) {

        $category =  CategoryModel :: find($request -> id);

        if($request -> category_image) {
            $category_image_old = Config::get('app.upload_image_folder').$category ->	pic;
            if(File::exists($category_image_old)) {
                File::delete($category_image_old);
            }

            $category_image =  Helper::saveImage($request -> category_image,"category_image");
            $category -> update([
                'pic'     => $category_image,
            ]);

        }


        $category -> update([
            'name' => $request -> name ,
            'name_eng' => $request -> name_eng ,
            'details' => $request -> details ,
            'details_eng' => $request -> details_eng ,
            'record_order' => $request -> record_order ,
        ]);

        return redirect('/dashboard/categories/');
    }

    public function destroy(Request $request) {
        $category= CategoryModel::find($request -> id);

        $category_img = Config::get('app.upload_image_folder').$category ->	pic;
        if(File::exists($category_img)) {
            File::delete($category_img);
        }


        $category->delete();
        return redirect('/dashboard/categories/');

    }



}
