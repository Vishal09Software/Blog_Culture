<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $show = Category::orderBy('id', 'DESC')->paginate(10);
        return view('backend.category',compact('show'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        $insert = new Category;
        $insert->category_name = $request->input('category_name');
        $insert->save();
        return redirect('/category')->with('msg','Data Save Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($id){
        $edit = Category::find($id);
        return view('backend.editcategory',compact('edit'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'category_name'=>'required',

        ]);
        $update = Category::find($id);
        $update->category_name = $request->input('category_name');
        $update->update();
        return redirect('/category')->with('status','Data Update Successfully');
    }

    public function destroy($id){
        $delete = Category::find($id);
        $delete->delete();
        return redirect('/category')->with('status','Data Delete Successfully');
    }
}
