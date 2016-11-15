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
	  		    @foreach($articles as $article)
	  		    		<a class="list-group-item-warning list-group-item" href="{{url('articles/showDetail',['id',$article->id])}}">
							{{$article->title}}
	  		    		</a>
	  		    @endforeach()
	  		    </div>
	  		    <div class="once">
		  		    {{$articles->links()}}
	  		    </div>
	  		  </div>
	  		</div>
		</div>
	</div>
</div>