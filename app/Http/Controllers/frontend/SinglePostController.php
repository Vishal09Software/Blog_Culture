<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,BlogPost};

class SinglePostController extends Controller
{
    public function index($id){
        // Getting data
        $category = Category::all();
        $blog = BlogPost::where('id', $id)->get();

          // Assigning to data
          $data = [
            'category' => $category,
            'blog' => $blog
          ];

            // Returning to view
            return view('frontend.single',$data);
        }
}
