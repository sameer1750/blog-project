@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
          
                <div class="panel-body">
                   {!! Form::model($blog,['method'=>'PUT','route'=>['blogs.update',$blog->id],'files'=>true]) !!}
                      <div class="form-group">
                        <label for="title">Title:</label>
                        {!! Form::text('title',null,['class'=>'form-control']) !!}
                        <div>{{ $errors->first('title')}}</div>
                      </div>
                      <div class="form-group">
                        <label for="image">Image:</label>
                        {!! Form::file('new_image',null,['class'=>'form-control']) !!}
                        <div>{{ $errors->first('image')}}</div>
                      </div>
                      <div class="form-group">
                        <label for="description">Description:</label>
                        {!! Form::textarea('description',null,['class'=>'form-control']) !!}
                        <div>{{ $errors->first('description')}}</div>
                      </div>
                      <div class="form-group">
                        <label for="slug">Slug:</label>
                        {!! Form::text('slug',null,['class'=>'form-control']) !!}
                        <div>{{ $errors->first('slug')}}</div>
                      </div>
                      <div class="form-group">
                        <label for="published">Published:</label>
                        <label><input {{ ($blog->published == '1')?'checked':'' }} type="radio" value=1 name="published">Yes</label>
                        <label><input {{ ($blog->published == '0')?'checked':'' }} type="radio" value=0 name="published">No</label>
                        <div>{{ $errors->first('published')}}</div>
                      </div>
                      <input type="hidden" value="{{$blog->image}}" name="image"/>
                      <button type="submit" class="btn btn-default">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
