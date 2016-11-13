<div class="row full-height">
    <div class="col-md-6">
      <form class="form-horizontal" action="index.html" method="post">
          {{csrf_field()}}
          <input type="hidden" name="articleId" value="">

          <div class="form-group">
            <label for="" class="control-label col-md-4">
                organization:
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="" placeholder="" name="organization">
            </div>
          </div>
          <div class="form-group">
              <label for="" class="control-label col-md-4">
                title:
            </label>
            <div class="col-md-8">
                <input type="text" name="title" class="form-control" id="" placeholder="">
            </div>
          </div>
          <div class="form-group">
              <label for="" class="control-label col-md-4">
                date:
            </label>
            <div class="col-md-8">
                <input type="text" name="date" class="form-control" id="" placeholder="">
            </div>
          </div>
          <div class="form-group">
              <label for="" class="control-label col-md-4">
                choose theme for this aricle:
            </label>
            <div class="col-md-8">
                <select name="theme_id" class="form-control">
                    <option value="">option</option>
                    <option value="">option</option>
                </select>
            </div>
          </div>
          <div class="form-group">
              <div class="col-md-3 pull-right">
                  <input type="submit" value="ok" class="btn btn-success">
              </div>
          </div>



      </form>
    </div>

    <div class="col-md-6 full-height">
        <iframe  src="http://www.baidu.com" width="100%" height="100%"></iframe>
    </div>

</div>

{{-- @inject('Themes','App\Themes')
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
</form> --}}
