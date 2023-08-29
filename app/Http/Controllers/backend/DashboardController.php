<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, BlogPost};


class DashboardController extends Controller
{
    public function index(){
        // Getting data
        $category = Category::count();
        $blog = BlogPost::count();

        // Assigning to data
        $data = [
            'category' => $category,
            'blog' => $blog
        ];

        // Returning to view
        return view('backend.index',$data);
    }

}
