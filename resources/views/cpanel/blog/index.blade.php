@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Blogs</div>
                <div class="panel-body">
                   <table class="table table-bordered table-hover table-condensed" cellspacing="0"
                           width="100%">
                        <tr>
                            <th style="width: 30px">title</th>
                            <th>Description</th>
                            <th>Published</th>
                            <th>Created By</th>
                            <th style="width: 40px">Action</th>
                        </tr>
                        @foreach($data as $d)

                            <tr>
                                <td>{{ $d->title }}</td>
                                <td>{{ $d->description }}</td>
                                <td>{{ ($d->published == 1)?'Yes':'No' }}</td>                                
                                <td>{{ $d->user->name }}</td>
                                <td>
                                    <a  class="btn btn-primary btn-xs" href={{ route('blogs.edit',['id' => $d->id]) }}>
                                        Edit
                                    </a>
                                    <a href="{{route('blogs.show',$d->id)}}" class="btn btn-primary btn-xs">show</a>
                                    {!! Form::open(['method'=>'delete','route'=>['blogs.destroy',$d->id],'class'=>'form-horizontal war-delete']) !!}
                                        {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            </tr>
                        @endforeach

                    </table>
                    <div class="box-footer clearfix">
                      <div class="pagination-sm no-margin pull-right">
                        {!! $data->render() !!}
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
