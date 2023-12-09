<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SejarahModels;

class SejarahController extends Controller
{
    private $sejarah;
    private $sejarahs;
    public function index()
    {
        return view('admin.sejarah.add');
    }

    public function manage()
    {
        $this->sejarah = SejarahModels::orderBy('id','desc')->get();

        return view('admin.sejarah.manage',['sejarah'=>$this->sejarah]);
    }

    public function edit($id)
    {
        $this->sejarah = SejarahModels::find($id);
        return view('admin.sejarah.edit',['sejarah'=>$this->sejarah]);

    }
    public function update(Request $request,$id)
    {
        $sejarahModel = new SejarahModels();
        $sejarahModel->updateSejarah($request, $id);
        return redirect()->back()->with('message' , 'Sejarah info Update successfully');
    }
    
}
