<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\{Category,BlogPost};


class BlogPostController extends Controller
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
        return view('backend.blogpost',$data);
    }

    public function store(Request $request){
        $request->validate([
            'heading'=>'required',
            'category_name'=>'required',
            'paragraph'=>'required',
            'date'=>'required',
            'image'=>'required',

    ]);

        $insert = new BlogPost;
        $insert->heading = $request->input('heading');
        $insert->category_name = $request->input('category_name');
        $insert->paragraph = $request->input('paragraph');
        $insert->date = $request->input('date');
        if ($request->hasfile('image')){
            $file= $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('backend/images/',$filename);
            $insert->image = $filename;
        }
        $insert ->save();
        return redirect()->back()->with('msg','Data Insert Successfully');
    }

    public function edit($id){
    // Getting data
    $category = Category::all();
    $edit = BlogPost::find($id);

    // Assigning to data
    $data = [
        'category' => $category,
        'blog' => $edit,

    ];
    // Returning to view
    return view('backend.editblogpost',$data);
}
public function update(Request $request,$id){
    $update = BlogPost::find($id);
    $update->heading = $request->input('heading');
    $update->category_name = $request->input('category_name');
    $update->paragraph = $request->input('paragraph');
    $update->date = $request->input('date');
    if ($request->hasfile('image') ){
        $destination = 'backend/images/'.$update->image;
            if (File::exists($destination))
            {
                File::delete($destination);
            }
        $file= $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('backend/images/',$filename);
        $update->image = $filename;
}
    $update->update();
    return redirect('/blog_post')->with('msg','Data Update Successfully');
}

public function destroy($id){
    $delete = BlogPost::find($id);
    $destination = 'backend/images/'.$delete->image;
    if (File::exists($destination))
        {
        File::delete($destination);
        }
    $delete->delete();
    return redirect('/blog_post')->with('status','Data Delete Successfully');
}
}
