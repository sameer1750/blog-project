@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">View - {{$data->title}}</div>
                @if($data)
                  <div class="row">
                     <div class="col-md-4">
                          Title
                      </div>
                      <div class="col-md-8">
                          {{$data->title}}
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                          Description
                      </div>
                      <div class="col-md-8">
                          {{$data->description}}
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                          Image
                      </div>
                      <div class="col-md-8">
                          <img width="100" height="100" src="/{{$data->image}}" />
                      </div>
                  </div>
                   <div class="row">
                    <div class="col-md-4">
                          Published
                      </div>
                      <div class="col-md-8">
                          {{($data->published == 1)?'Yes':'No'}}
                      </div>
                  </div>
                   <div class="row">
                     <div class="col-md-4">
                          Created By
                      </div>
                      <div class="col-md-8">
                          {{$data->user->name}}
                      </div>
                  </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
