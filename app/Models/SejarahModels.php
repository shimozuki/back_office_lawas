<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SejarahModels extends Model
{
    use HasFactory;
    protected $table = "sejarah";
    private static $sejarah;

    public function newSejarah($request)
    {
        self::$sejarah = new SejarahModels();
        self::$sejarah->description = strip_tags($request->description);
    }

    public function updateSejarah($request, $id)
    {
        self::$sejarah =SejarahModels::find($id);
        self::$sejarah->description = strip_tags($request->description);
        self::$sejarah->save();
    }
}
