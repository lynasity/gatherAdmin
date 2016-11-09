@foreach($articles as $article)
   title<li><a href="{{url('articles/showDetail',['id'=>$article->id])}}">{{$article->title}}</a></li>

   {{--organization<li>{{$Gzh::find($article->gzh_id)->name}}</li>
   digest<li>{{$article->digest}}</li>
   content<li>{{$article->content}}</li>
   url<li>{{$article->url}}</li>
   date<li>{{$article->date}}</li>
   <hr>--}}
@endforeach
{{$articles->links()}}
