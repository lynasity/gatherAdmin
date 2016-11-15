<!-- @foreach($themes as $theme)
  <li>{{$theme->theme_name}} | <a href="{{route('themes.updateForm',['id',$theme->id])}}">update</a> | <a href="{{url('themes/delete',['id',$theme->id])}}">delete</a> </li>
@endforeach
<p><a href="{{url('themes/add')}}">add theme</a></p> -->

<div class="row">
	<div class="col-md-5 col-md-offset-1">
		<div class="panel panel-primary">
		<div class="panel-heading ">
			<h3 class="panel-title">
				<i class="fa fa-bars"></i>
				主题列表
			</h3>
		</div>
		<div class="panel-body cus-panel-body">
			<table class="table-striped table-hover tbale-responsive" id="themeTable">
				<thead>
					<tr class="bg-primary gzh-table-head">
						<th style="width: 30%">
							id
						</th>
						<th style="width: 30%">主题名称</th>
						<th style="width: 30%">操作</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($themes as $theme)
						<tr>
							<td>{{$theme->id}}</td>
							<td>{{$theme->theme_name}}</td>
							<td data-id="{{$theme->id}}">
								{{-- url('') --}}
								<button class="btn btn-primary">更新</button>
								<button class="btn btn-danger">删除</button>
							</td>
						</tr>
					@endforeach


				</tbody>
			</table>
				<div class="once">
					{{$themes->links()}}
				</div>
		</div>
	</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-primary">
		  <div class="panel-heading">
			<h3 class="panel-title">
				<i class="fa fa-bars"></i>
				更新|增加
			</h3>
		  </div>
		  <div class="panel-body">
			  <form method="post" action="{{url('themes/add')}}" class="form-horizontal" id="themeForm">
				  {{csrf_field()}}
				  <input type="hidden" name='id' value="">

					<div class="form-group">
						<label for="" class="control-label col-md-3">
							theme name:
						</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="theme_name">
						</div>
					</div>
					<div class="form-group">
						<div class="pull-right col-md-3">
							<input class="btn btn-success" type="submit" value="submit">
						</div>
					</div>
			</form>

		  </div>
		</div>

	</div>
</div>
