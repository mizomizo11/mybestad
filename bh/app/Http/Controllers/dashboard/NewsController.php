<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view("dashboard.news.index", compact('news'));
    }

    public function create()
    {
        return view("dashboard.news.create");
    }

    public function store(Request $request) {
        if($request -> news_image) {
            $news_image =  Helper::saveImage($request -> news_image,"news_image");
        }else
            $news_image ="";
        $news=  News :: create([
            'name_ar' => $request -> name_ar ,
            'name_en' => $request -> name_en ,
            'slug_ar' => Str::slug($request -> name_ar,'-',null),
            'slug_en' => Str::slug($request -> name_en,'-',null),
            'summary_ar' => $request -> summary_ar ,
            'summary_en' => $request -> summary_en ,
            'details_ar' => $request -> details_ar ,
            'details_en' => $request -> details_en ,
            'image' => $news_image ,
            'keywords_ar' => $request -> keywords_ar ,
            'keywords_en' => $request -> keywords_en ,
            'record_order' => $request -> record_order ,

        ]);
        return redirect(app()->getLocale().'/dashboard/news/');
    }
    public function edit(Request $request) {
        $news=  News :: find($request->id);
        return view('dashboard.news.edit', compact('news'));
    }
    public function update(Request $request) {
        $news =  News :: find($request -> id);
        if($request -> news_image) {
            $news_image_old = Config::get('app.upload').$news ->	image;
            if(File::exists($news_image_old)) {
                File::delete($news_image_old);
            }
            $news_image =  Helper::saveImage($request -> news_image,"news_image");
            $news -> update([
                'image'     => $news_image,
            ]);

        }
        $news -> update([
            'name_ar' => $request -> name_ar ,
            'name_en' => $request -> name_en ,
            'slug_ar' => Str::slug($request -> name_ar,'-',null),
            'slug_en' => Str::slug($request -> name_en,'-',null),
            'summary_ar' => $request -> summary_ar ,
            'summary_en' => $request -> summary_en ,
            'details_ar' => $request -> details_ar ,
            'details_en' => $request -> details_en ,
            'keywords_ar' => $request -> keywords_ar ,
            'keywords_en' => $request -> keywords_en ,
            'record_order' => $request -> record_order ,

        ]);
        return redirect(app()->getLocale().'/dashboard/news/');
    }

    public function destroy(Request $request) {
        $news= News::find($request -> id);
        $news_img = Config::get('app.upload').$news ->	image;
        if(File::exists($news_img)) {
            File::delete($news_img);
        }
        $news->delete();
        return redirect(app()->getLocale().'/dashboard/news/');
    }



}
