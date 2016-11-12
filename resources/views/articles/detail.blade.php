@inject('Themes','App\Themes')

detail:
<form method="post" action="{{route('articles.classify')}}">
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
