<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Blog extends Model
{
    use HasFactory;
    private static $blog;
    private static $image;
    private static $imageName;
    private static $imageUrl;
    private static $audio;
    private static $audioName;
    private static $audioUrl;
    private static $directory;

    public static function getImageURL($request){

        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'blog-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function getAudioURL($request){
        self::$audio = $request->file('audio');
        self::$audioName = self::$audio->getClientOriginalName();
        self::$directory = 'blog-audio/';
        self::$audio->move(self::$directory, self::$audioName);
        return self::$directory.self::$audioName;
    }

    public static function newBlog($request){

        self::$blog = new Blog();
        self::$blog->category_id = $request->category_id;
        self::$blog->author_id = Auth::user()->id;
        self::$blog->main_title = $request->main_title;
        self::$blog->lirik_indo = strip_tags($request->lirik_indo);
        self::$blog->link_yt = $request->link_yt;
        self::$blog->lirik_swq = strip_tags($request->lirik_swq);
        self::$blog->image = self::getImageURL($request);
        self::$blog->audio = self::getAudioURL($request);
        self::$blog->save();
    }
    public function category(){

        return $this->belongsTo('App\Models\Category');
    }
    public static function updateBlog($request, $id){
        self::$blog = Blog::find($id);
        if ($request->file('image')){

            if (file_exists(self::$blog->image)){

                unlink(self::$blog->image);
            }
            self::$imageUrl = self::getImageURL($request);
        }
        else{

            self::$imageUrl = self::$blog->image;
        }

        if ($request->file('audio')){

            if (file_exists(self::$blog->audio)){

                unlink(self::$blog->audio);
            }
            self::$audioUrl = self::getAudioURL($request);
        }
        else{

            self::$audioUrl = self::$blog->audio;
        }
      
        self::$blog->author_id = Auth::user()->id;
        self::$blog->main_title = $request->main_title;
        self::$blog->lirik_indo = strip_tags($request->lirik_indo);
        self::$blog->link_yt = $request->link_yt;
        self::$blog->lirik_swq = strip_tags($request->lirik_swq);
        self::$blog->image =self::$imageUrl;
        self::$blog->status = $request->status;
        self::$blog->save();
    }
}
