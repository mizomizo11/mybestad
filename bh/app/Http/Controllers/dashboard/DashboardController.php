<?php


namespace App\Http\Controllers\Site111;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{


    public function show_dashboard() {

        return view('site.show_site_dashboard');

    }




}
