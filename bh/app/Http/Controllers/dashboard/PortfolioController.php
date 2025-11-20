<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('cats')->orderby("id",'desc')->get();
       //return $portfolios;
        return view("dashboard.portfolios.index", compact('portfolios'));
    }

    public function create()
    {
        $portfolios_cats=PortfolioCategory::orderBy('id', 'DESC')->get();
        return view("dashboard.portfolios.create",compact('portfolios_cats'));
    }

    public function store(Request $request)
    {
        if ($request->imagefile) {
            $image = Helper::saveImage($request->imagefile, "Portfolio_");
        } else
            $image = "";
        Portfolio:: create([
            'portfolios_categories_id' => $request->portfolios_categories_id,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'image' => $image,
            'record_order' => $request->record_order,
        ]);
        return redirect(app()->getLocale() . '/dashboard/portfolios/');
    }

    public function edit(Request $request)
    {
        $portfolio = Portfolio:: find($request->id);
        $portfolios_cats=PortfolioCategory::orderBy('id', 'DESC')->get();
        return view('dashboard.portfolios.edit', compact('portfolio','portfolios_cats'));
    }

    public function update(Request $request)
    {
        $Portfolio = Portfolio:: find($request->id);
        if ($request->imagefile) {
            $old_image = Config::get('app.upload_image_folder') . $Portfolio->image;
            if (File::exists($old_image)) {
                File::delete($old_image);
            }

            $new_image = Helper::saveImage($request->imagefile, "Portfolio_");
            $Portfolio->update([
                'image' => $new_image,
            ]);
        }
        $Portfolio->update([
            'portfolios_categories_id' => $request->portfolios_categories_id,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'record_order' => $request->record_order,
        ]);
        return redirect(app()->getLocale() . '/dashboard/portfolios/');
    }

    public function destroy(Request $request)
    {
        $company = Portfolio::find($request->id);
        $company_img = Config::get('app.upload_image_folder') . $company->pic;
        if (File::exists($company_img)) {
            File::delete($company_img);
        }
        $company->delete();
        return redirect(app()->getLocale() . '/dashboard/portfolios/');

    }

}
