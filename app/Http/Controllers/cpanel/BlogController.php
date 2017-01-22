<?php

namespace App\Http\Controllers\cpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use App\Http\Requests\StoreBlogPost;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::with('user')->wherePublished(1)->orderBy('created_at','Desc')->paginate(10);
        return view('cpanel.blog.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpanel.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        $params = $request->all();
        $params['image'] = $request->image->store('images','local');
        $params['created_by'] = $request->user()->id;
        Blog::create($params);
        return redirect()->back()->with('success','Blog created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Blog::with('user')->find($id);
        return view('cpanel.blog.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('cpanel.blog.edit',['blog'=>$blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request, $id)
    {
        $params = $request->all();
        $blog = Blog::find($id);
        $blog->title = $params['title'];
        $blog->description = $params['description'];
        $blog->slug = $params['slug'];
        $blog->published = $params['published'];
        if($request->new_image){
            $blog->image = $request->new_image->store('images','local');
        }
        $blog->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        return redirect()->back();
    }
}
