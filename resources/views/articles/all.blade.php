<div class="row">
  	<div class="col-md-10 col-md-offset-1">
		<div class="col-md-5">
			<div class="panel panel-primary">
	  		  <div class="panel-heading">
	  		    <h3 class="panel-title">
	  		    	<i class="fa fa-bars"></i>
					待处理文章
	  		    </h3>
	  		  </div>
	  		  <div class="panel-body">
	  		    <div class="list-group" id="toHandleList">
	  		    @foreach($undoneArticles as $undoneArticle)
	  		    		<a class="list-group-item-warning list-group-item" href="{{url('articles/showDetail',['id',$undoneArticle->id])}}">
							{{$undoneArticle->title}}
	  		    		</a>
	  		    @endforeach()
	  		    </div>
	  		    {{$undoneArticles->links()}}
	  		  </div>
	  		</div>
		</div>
		<div class="col-md-5">
			<div class="panel panel-primary">
	  		  <div class="panel-heading">
	  		    <h3 class="panel-title">
	  		    	<i class="fa fa-bars"></i>
					已处理文章
	  		    </h3>
	  		  </div>
	  		  <div class="panel-body">
				  <div class="list-group">
				  @foreach($articles as $article)
				  		<a class="list-group-item list-group-item-success" href="#">
				  			{{$article->title}}
				  		</a>
				  @endforeach
				  </div>
				  {{$articles->links()}}
	  		  </div>
	  		</div>
		</div>
  	</div>
</div>

{{-- <div class="col-md-10 col-md-offse-1">
	<form class="form-horizontal" method="post" action="{{route('articles.classify')}}">
	      {{csrf_field()}}
	<input type="hidden" name="articleId" value="{{$originArticle->id}}">

	organization:
	<input type="text"  name="organization" value="{{$originArticle->gzh_name}}">
	<br>
	title:
	<input type="text"  name="title" value="{{$originArticle->title}}">
	<br>
	content:
	<iframe src="{{$originArticle->contentUrl}}">

	</iframe>
	<br>
	date:
	<input type="text"  name="date" value="{{$originArticle->time}}">
	<br>
	<br>
	choose theme for this aricle:
	<select name="theme_id">
	@foreach($Themes::all() as $theme)
		<option value="{{$theme->id}}">{{$theme->theme_name}}</option>
	@endforeach
	</select>
		<input type="submit" value="ok">
	</form>

</div> --}}
{{-- <div class="col-md-10 col-md-offse-1">
	<form class="form-horizontal" method="post" action="{{route('articles.classify')}}">
	      {{csrf_field()}}
	<input type="hidden" name="articleId" value="{{$originArticle->id}}">

	organization:
	<input type="text"  name="organization" value="{{$originArticle->gzh_name}}">
	<br>
	title:
	<input type="text"  name="title" value="{{$originArticle->title}}">
	<br>
	content:
	<iframe src="{{$originArticle->contentUrl}}">

	</iframe>
	<br>
	date:
	<input type="text"  name="date" value="{{$originArticle->time}}">
	<br>
	<br>
	choose theme for this aricle:
	<select name="theme_id">
	@foreach($Themes::all() as $theme)
		<option value="{{$theme->id}}">{{$theme->theme_name}}</option>
	@endforeach
	</select>
		<input type="submit" value="ok">
	</form>

</div> --}}
