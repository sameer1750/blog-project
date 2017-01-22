<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
    	return view('blogfeed');
    }

    public function getOneBySlug($slug){
    	return view('blog');
    }
}
