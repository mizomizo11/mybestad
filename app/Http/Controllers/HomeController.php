<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::where('approved', true)
            ->orderBy('created_at', 'desc')
            ->get();
        
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        
        return view('home', compact('reviews', 'services'));
    }
}
