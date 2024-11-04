<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function index()
    {
       
        if (auth()->guest()) {
            abort(403); // Forbidden access
        }

        
        $categories = Category::all();

        
        return view('dashboard.categories.index', [
            'categories' => $categories,
        ]);
    }
}