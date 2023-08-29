<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,BlogPost};


class HomeController extends Controller
{
    public function index(){
    // Getting data
    $category = Category::all();
    $blog = BlogPost::orderBy('id', 'DESC')->paginate(7);

      // Assigning to data
      $data = [
        'category' => $category,
        'blog' => $blog
      ];

        // Returning to view
        return view('frontend.index',$data);
    }

    public function blogsearch(Request $request){

        if($request->ajax()){
            $data = BlogPost::where('heading','LIKE',$request->heading.'%')->get();
            $output = '';
            if(count($data) >0){
                $output = '<ul class="list-group" style="display:block; position:relative; z-index: 1;">';

                foreach($data as $row){
                    $output .=' <li class="list-group-item"><a href="/single/'.$row->id.'" style="color:black;" >' .$row->heading.'</a></li>';
                }
                $output.='</ul>';
            }

            else{
                $output .= '<li class="list-group-item"> No Data Found</li>';
            }
            return $output;
        }
    }
}
