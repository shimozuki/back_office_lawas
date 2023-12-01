<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    private $category;
    private $categorys;
    public function index()
    {
        return view('admin.category.add');
    }
    public function create(Request $request)
    {
        Category::newCategory($request);
        return redirect()->back()->with('message' , 'category info create successfully');
    }
    public function manage()
    {
        $this->categorys = Category::orderBy('id','desc')->get();

        return view('admin.category.manage',['categorys'=>$this->categorys]);
    }
    public function edit($id)
    {
        $this->category = Category::find($id);
        return view('admin.category.edit',['category'=>$this->category]);

    }
    public function update(Request $request,$id)
    {

        Category::updateCategory($request,$id);
        return redirect()->back()->with('message' , 'category info Update successfully');

    }
    public function delete($id)
    {
        $this->category =Category::find($id);
        if(file_exists($this->category->image))
        {
            unlink($this->category->image);
        }
        $this->category->delete();
        return redirect('/category.manage')->with('manage','category info delete successfully');
    }
}
