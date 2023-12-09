<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutCOntroller extends Controller
{
    private $About;
    public function index()
    {
        return view('admin.about.add');
    }

    public function manage()
    {
        $this->About = About::orderBy('id','desc')->get();

        return view('admin.about.manage',['about'=>$this->About]);
    }

    public function edit($id)
    {
        $this->About = About::find($id);
        return view('admin.about.edit',['about'=>$this->About]);

    }
    public function update(Request $request,$id)
    {
        $AboutModel = new About();
        $AboutModel->updateabout($request, $id);
        return redirect()->back()->with('message' , 'About info Update successfully');
    }
}
