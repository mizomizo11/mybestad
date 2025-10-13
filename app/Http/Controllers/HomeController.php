<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::where('approved', true)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('home', compact('reviews'));
    }
}
