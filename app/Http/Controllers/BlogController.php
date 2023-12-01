<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blog;
    private $blogs;
    private $categories;

    public function index()
    {

        $this->categories = Category::all();
        return view('admin.blog.add', ['categories' => $this->categories]);
    }

    public function create(Request $request)
    {
        Blog::newBlog($request);
        return redirect()->back()->with('message' , 'category info create successfully');
    }


    public function manage()
    {
        $this->blogs = Blog::orderBy('id','desc')->get();

        return view('admin.blog.manage',['blogs'=>$this->blogs]);
    }

    public function edit($id)
    {

        $this->blog = Blog::find($id);
        $this->categories = Category::all();
        return view('admin.blog.edit', ['blog' => $this->blog, 'categories' => $this->categories]);
    }

    public function update(Request $request, $id)
    {

        Blog::updateBlog($request,$id);
        return redirect('/blog-manage')->with('message','Blog info Update Successfully');
    }
    public function delete($id)
    {
        $this->blog =Blog::find($id);
        if(file_exists($this->blog->image))
        {
            unlink($this->blog->image);
        }
        $this->blog->delete();
        return redirect('/blog-manage')->with('manage','Blog info delete successfully');
    }

}
