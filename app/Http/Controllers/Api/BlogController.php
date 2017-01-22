<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;

class BlogController extends Controller
{
    public function feed(Request $req,$page = 1){
        $limit = 10;
        $skip = $limit * ($page - 1);
        $data = Blog::with('user')->where('published',1)->orderBy('created_at','DESC')->skip($skip)->limit($limit)->get();
        if(count($data)){
            return ['code'=>1,'message'=>'blog feed','data'=>$data];
        }

        return ['code'=>0,'message'=>'no data found','data'=>new \stdClass()];
    }

    public function getOneBlog($slug){

    	$blog = Blog::with('user')->whereSlug($slug)->where('published',1)->first();
    	if(!$blog){
    		return response(['code'=>1,'message'=>'not found','data'=>new \stdClass()],422);
    	}

    	return ['code'=>1,'message'=>'found','data'=>$blog];
    }
}
