@inject('Themes','App\Themes')
@inject('Gzh','App\Gzh')

detail:
<form method="post" action="{{route('articles.classify')}}">
      {{csrf_field()}}
<input type="hidden" name="articleId" value="{{$originArticle->id}}">

organization:
<input type="text" readonly="readonly" name="organization" value="{{$Gzh::find($originArticle->gzh_id)->name}}">
<br>
title:
<input type="text" readonly="readonly" name="title" value="{{$originArticle->title}}">
<br>
url:
<input type="text" readonly="readonly" name="url" value="{{$originArticle->url}}">
<br>
date:
<input type="text" readonly="readonly" name="date" value="{{$originArticle->date}}">
<br>
content:
<textarea name='content' >
	{{$originArticle->content}}
</textarea>
<br>
choose theme for this aricle:
<select name="theme_id">
@foreach($Themes::all() as $theme)
	<option value="{{$theme->id}}">{{$theme->theme_name}}</option>
@endforeach
</select>	
	<input type="submit" value="ok">
</form>
