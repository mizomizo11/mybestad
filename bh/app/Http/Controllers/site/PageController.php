<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Models\ClientCategory;
use App\Models\Faq;
use App\Models\News;
use App\Models\Partner;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\Service;

use App\Models\Whous;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class PageController extends Controller
{

    public function index()
    {
        $clients = DB::table('clients')->orderBy('record_order', 'asc')->get();
        $carousels = Carousel::orderBy('record_order', 'asc')->where("place","place1")->get();
        $carousels2 = Carousel::orderBy('record_order', 'asc')->where("place","place2")->get();
        $portfolios_cats = PortfolioCategory::with("portfolios")->orderBy('record_order', 'asc')->get();
        $services = Service::orderBy('record_order', 'asc')->get();


        $partners= Partner::orderBy('record_order', 'asc')->get();

        return view("site.index",compact('clients','carousels','carousels2','partners','portfolios_cats','services'));
    }
    public function whous()
    {
        $whous = Whous::first();
        $last_stores = DB::table('carousels')->limit(4)->orderBy('id', 'desc')->get();
        return view("site.whous",compact('whous','last_stores'));
    }
//    public function show_service(Request $request)
//    {
//        $services = ServiceCategory::with("services")
//            ->where('slug_'.app()->getLocale(),$request->slug)
//            ->orderBy('record_order', 'asc')->get();
//        //$services = Service::where('slug',$request->slug)->orderBy('record_order', 'asc')->get();
//        $whous = Whous::first();
//        return view("site.service",compact('whous','services'));
//    }
    public function show_services()
    {
        $services = Service::orderBy('record_order', 'asc')->get();
        $whous = Whous::first();
        return view("site.show_services",compact('whous','services'));
    }
    public function show_service(Request $request)
    {

        $service = Service::where('slug_'.app()->getLocale(),$request->slug)->orderBy('record_order', 'desc')->first();
//return $service;

        return view("site.show_service",compact('service'));
    }
    public function show_faqs()
    {
        $faqs = Faq::orderBy("record_order", 'asc')->get();
        return view("site.show_faqs",compact('faqs'));
    }

    public function show_prices()
    {
        $faqs = Faq::orderBy("record_order", 'asc')->get();
        return view("site.show_prices",compact('faqs'));
    }

//    public function show_portfolios()
//    {
//        $portfolios = Portfolio::orderBy('record_order', 'asc')->get();
//        $whous = Whous::first();
//        return view("site.portfolios",compact('whous','portfolios'));
//    }

    public function show_articles()
    {
        $articles = News::orderBy('record_order', 'asc')->get();
        $last_article = News::orderBy('record_order', 'asc')->first();
        $whous = Whous::first();
        return view("site.articles",compact('whous','articles','last_article'));
    }
    public function show_article(Request $request)
    {
       // $articles = News::orderBy('record_order', 'asc')->get();

        $article = News::where('slug_'.app()->getLocale(),$request->slug)
          ->orderBy('record_order', 'asc')->first();
          // ->with("portfolios")->
       // $whous = Whous::first();
      // return $article;
        return view("site.article",compact('article'));
    }
//    public function show_portfolios()
//    {
//        $portfolios = Portfolio::orderBy('record_order', 'asc')->get();
//        $whous = Whous::first();
//        return view("site.portfolios",compact('whous','portfolios'));
//    }

    public function show_portfolios()
    {
        $portfolios = DB::table('portfolios')->orderBy('record_order', 'asc')->get();
       // $portfolios_cats=PortfolioCategory::orderBy('id', 'DESC')->get();

        $portfolios_cats = PortfolioCategory::with("portfolios")->orderBy('record_order', 'asc')->get();
            return view("site.portfolios",compact('portfolios','portfolios_cats'));
    }
    public function show_portfolio(Request $request)
    {

        $portfolios_cats = PortfolioCategory::
        where('slug_'.app()->getLocale(),$request->slug)
            ->with("portfolios")->orderBy('record_order', 'asc')->get();
        //return $portfolios;
        //$services = Service::where('slug',$request->slug)->orderBy('record_order', 'asc')->get();
        $whous = Whous::first();
        return view("site.portfolio",compact('whous','portfolios_cats'));
    }
    public function show_clients()
    {
        $clients = DB::table('clients')->orderBy('record_order', 'asc')->get();
        $clients_cats=ClientCategory::orderBy('id', 'DESC')->get();
        return view("site.clients",compact('clients','clients_cats'));
    }
    public function contacts()
    {

        $whous = Whous::get();
        return view("site.contacts",compact('whous'));
    }

}
