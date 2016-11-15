@inject('Themes','App\Themes')
<div class="row full-height">
    <div class="col-md-6 margin-top">
      <form class="form-horizontal" action="{{route('articles.classify')}}" method="post" id="articleForm">
          {{csrf_field()}}
          <input type="hidden" name="articleId" value="">

          <div class="form-group">
            <label for="" class="control-label col-md-4">
                发布单位:
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="" placeholder="" name="organization" value="{{$originArticle->gzh_name}}">
            </div>
          </div>
          <div class="form-group">
              <label for="" class="control-label col-md-4">
                题目:
            </label>
            <div class="col-md-8">
                <input type="text" name="title" class="form-control" id="" placeholder="" value="{{$originArticle->title}}">
            </div>
          </div>

          <div class="form-group">
              <label for="" class="control-label col-md-4">
                发布日期:
            </label>
            <div class="col-md-8">
                <input type="text" name="date" class="form-control" id="" placeholder="" value="{{$originArticle->time}}">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-4">摘要:</label>
            <div class="col-md-8">
                <textarea width="100%" name='description' class="digest" value="">
                </textarea>
            </div>
          </div>

          <div class="form-group">
              <label for="" class="control-label col-md-4">
                文章分类:
            </label>
            <div class="col-md-8">
                <select name="theme_id" class="form-control">
                    @foreach($Themes::all() as $theme)
                    	<option value="{{$theme->id}}">{{$theme->theme_name}}</option>
                    @endforeach
            </div>
          </div>

          <div class="form-group">
            <input type="submit" value="ok" class="btn btn-success">
          </div>
      </form>
    </div>
</div>
    <div class="col-md-6 full-height">
        <iframe  src="{{$originArticle->contentUrl}}" width="100%" height="100%">
        </iframe>
    </div>
</div>
