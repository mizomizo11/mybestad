<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;


use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\StoreModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        //$products = ProductModel::orderBy('id', 'desc')->get();

        $products = DB::table('products')
            ->leftJoin("categories","products.categories_id",'categories.id')
            ->select("products.*","categories.name AS category_name" )
            ->get();






        return view("dashboard.products.index", compact('products'));
    }

    public function create()
    {

        $categories= CategoryModel::all();
        return view("dashboard.products.create",compact('categories'));
    }

    public function store(Request $request) {


        if($request -> userfile) {
            $userfile =  Helper::saveImage($request -> userfile,"product_image");
        }else
            $userfile ="";


        $product=  ProductModel :: create([
            'categories_id'=> $request -> categories_id,
            'name'=> $request -> name,

            'details'=> $request -> details,

            'pic'=> $userfile,
            'price'=> $request -> price,

            'is_available'=> $request -> is_available,
            'special_products'=> $request -> special_products,
            'most_ordered'=> $request -> most_ordered,




        ]);


        return redirect(app()->getLocale().'/dashboard/products/');

    }
    public function edit(Request $request) {
        $product=  ProductModel :: find($request-> id);
        $categories= CategoryModel::all();

        return view('dashboard.products.edit', compact('product','categories'));

    }
    public function update(Request $request) {

        $product =  ProductModel :: find($request -> id);

        if($request -> userfile) {
            $userfile_old = Config::get('app.upload_image_folder').$product ->	pic;
            if(File::exists($userfile_old)) {
                File::delete($userfile_old);
            }

            $userfile =  Helper::saveImage($request -> userfile,"product_image");
            $product-> update([
                'pic'=> $userfile,
            ]);

        }


        $product-> update([
            'store_id'=> $request -> store_id,
            'name'=> $request -> name,
             'details'=> $request -> details,
            'categories_id'=> $request -> categories_id,

            'price'=> $request -> price,
            'is_available'=> $request -> is_available,
            'special_products'=> $request -> special_products,
            'most_ordered'=> $request -> most_ordered,
        ]);

        return redirect(app()->getLocale().'/dashboard/products/');
    }

    public function destroy(Request $request) {
        $product= ProductModel::find($request -> id);

        $product_img = Config::get('app.upload_image_folder').$product ->	pic;
        if(File::exists($product_img)) {
            File::delete($product_img);
        }


        $product->delete();
        return redirect(app()->getLocale().'/dashboard/products/');

    }



}
