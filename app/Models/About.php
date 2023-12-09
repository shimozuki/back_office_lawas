<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = "about";
    private static $about;

    public function newSejarah($request)
    {
        self::$about = new About();
        self::$about->description = strip_tags($request->description);
    }

    public function updateabout($request, $id)
    {
        self::$about =About::find($id);
        self::$about->description = strip_tags($request->description);
        self::$about->save();
    }
}
