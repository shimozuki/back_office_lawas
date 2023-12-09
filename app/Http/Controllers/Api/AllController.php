<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class AllController extends Controller
{
    public function index()
    {
        $data = Blog::where('status', 1)->get();

        if (!empty($data)) {
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Success get data',
                'data' => $data
            ];
        }else {
            $response = [
                'status' => 500,
                'error' => true,
                'message' => 'No Entry Data',
                'data' => []
            ];
        }
        return response()->json($response);
    }

    public function getbyID(Request $request)
    {
        $id = $request->id;

        $data = Blog::find($id);

        if (!empty($data)) {
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Success get data',
                'data' => $data
            ];
        }else {
            $response = [
                'status' => 500,
                'error' => true,
                'message' => 'No Entry Data',
                'data' => []
            ];
        }
        return response()->json($response);
    }
}


