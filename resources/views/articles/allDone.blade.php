<div class="list-group">
@foreach($articles as $article)
      <a class="list-group-item list-group-item-success" href="#">
          {{$article->title}}
      </a>
@endforeach

</div>
<div class="twice">
    {{$articles->links()}}
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
