<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('cats')->orderBy('id', 'DESC')->get();
        $clients_cats = ClientCategory::orderBy('id', 'DESC')->get();
        return view("dashboard.clients.index", compact('clients', 'clients_cats'));
    }

    public function create()
    {
        $clients_cats = ClientCategory::orderBy('id', 'DESC')->get();
        return view("dashboard.clients.create", compact('clients_cats'));
    }

    public function store(Request $request)
    {
        if ($request->imagefile) {
            $image = Helper::saveImage($request->imagefile, "portfolio_");
        } else
            $image = "";
        Client:: create([
            'clients_categories_id' => $request->clients_categories_id,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'country_ar' => $request->country_ar,
            'country_en' => $request->country_en,
            'customer_ar' => $request->customer_ar,
            'customer_en' => $request->customer_en,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'image' => $image,
            'year' => $request->year,
            'record_order' => $request->record_order,
        ]);
        return redirect(app()->getLocale() . '/dashboard/clients/');
    }

    public function edit(Request $request)
    {
        $client = Client:: find($request->id);
        $clients_cats = ClientCategory::orderBy('id', 'DESC')->get();
        return view('dashboard.clients.edit', compact('client', 'clients_cats'));
    }

    public function update(Request $request)
    {
        $client = Client:: find($request->id);
        if ($request->imagefile) {
            $old_image = Config::get('app.upload_image_folder') . $client->image;
            if (File::exists($old_image)) {
                File::delete($old_image);
            }
            $new_image = Helper::saveImage($request->imagefile, "client_");
            $client->update([
                'image' => $new_image,
            ]);
        }
        $client->update([
            'clients_categories_id' => $request->clients_categories_id,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'country_ar' => $request->country_ar,
            'country_en' => $request->country_en,
            'customer_ar' => $request->customer_ar,
            'customer_en' => $request->customer_en,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'year' => $request->year,
            'record_order' => $request->record_order,
        ]);
        return redirect(app()->getLocale() . '/dashboard/clients/');
    }

    public function destroy(Request $request)
    {
        $company = Client::find($request->id);
        $company_img = Config::get('app.upload') . $company->image;
        if (File::exists($company_img)) {
            File::delete($company_img);
        }
        $company->delete();
        return redirect(app()->getLocale() . '/dashboard/clients/');
    }


}
