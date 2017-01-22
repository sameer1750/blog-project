@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                @if(Session::has('success'))
                    {{ Session::get('ssuccess') }}
                @endif
                <div class="panel-body">
                   {!! Form::open(['route'=>'blogs.store','files'=>true]) !!}
                      <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control">
                        <div>{{ $errors->first('title')}}</div>
                      </div>
                      <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" class="form-control">
                        <div>{{ $errors->first('image')}}</div>
                      </div>
                      <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control"></textarea>
                        <div>{{ $errors->first('description')}}</div>
                      </div>
                      <div class="form-group">
                        <label for="slug">Slug:</label>
                        <input type="text" name="slug" class="form-control">
                        <div>{{ $errors->first('slug')}}</div>
                      </div>
                      <div class="form-group">
                        <label for="published">Published:</label>
                        <label><input type="radio" value=1 name="published">Yes</label>
                        <label><input type="radio" value=0 name="published">No</label>
                        <div>{{ $errors->first('published')}}</div>
                      </div>
                      <button type="submit" class="btn btn-default">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
