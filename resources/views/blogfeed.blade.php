@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="blogFeed">
            
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
                <img class="img-responsive" src="@{{data.image}}" alt="">
                <hr>
                <p>@{{data.short_description}}</p>
                <a class="btn btn-primary" href="/blog/@{{data.slug}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
    </script>

    <script>
        
        var page = 1;
        var noMoreData = false;
        $(document).ready(function(){
            $(window).scroll(function() {
               if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
                   getFeed();
               }
            });
        });

        (getFeed = function(){
            if(!noMoreData){
                $.ajax({
                    type:'GET',
                    url:'http://api.randomproject.l/feed/'+page,
                    success:function(resp){
                        if(resp.code == 1){
                            page++;
                            var source   = $("#entry-template").html();
                            var template = Handlebars.compile(source);
                             for(var i=0;i<resp.data.length;i++){
                                var html = template({data:resp.data[i]});
                                $('.blogFeed').append(html);
                                }
                        }else{
                            noMoreData = true;
                        }
                    }
                });
            }   
        })();
    
    </script>
@endsection
