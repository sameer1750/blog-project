@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="blog">
            
        </div>
        
    </div>
</div>
<hr>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.6/handlebars.min.js"></script>
    <script id="entry-template" type="text/x-handlebars-template">
       <h2>
                @{{data.title}}
                </h2>
                <p class="lead">
                    by @{{data.user.name}}
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on @{{data.created_at}}</p>
                <hr>
                <img class="img-responsive" src="/@{{data.image}}" alt="">
                <hr>
                <p>@{{data.description}}</p>
            <hr>
    </script>

    <script>
        var slug = "{{Request::segment(2)}}";
        (getFeed = function(){
            $.ajax({
                type:'GET',
                url:'http://api.randomproject.l/blog/'+slug,
                success:function(resp){
                    if(resp.code == 1){
                        var source   = $("#entry-template").html();
                        var template = Handlebars.compile(source);
                        var html = template({data:resp.data});
                        $('.blog').append(html);
                    }else{
                        noMoreData = true;
                    }
                }
            });
        })();
    
    </script>
@endsection
