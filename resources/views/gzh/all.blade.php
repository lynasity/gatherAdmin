
<div class="gzh">
	<div class="row">
		<div class="col-md-5 col-md-offset-1">
			<div class="panel panel-primary">
			<div class="panel-heading ">
				<h3 class="panel-title">
					<i class="fa fa-bars"></i>
					公众号
				</h3>
			</div>
			<div class="panel-body cus-panel-body">
				<table class="table-striped table-hover tbale-responsive" id="gzhTable">
					<thead>
						<tr class="bg-primary gzh-table-head">
							<th style="width: 33%">id</th>
							<th style="width: 33%">公众号名称</th>

							<th style="width: 33%">操作</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($gzhs as $gzh)
							<tr>
								<td>{{$gzh->id}}</td>
								<td>{{$gzh->name}}</td>
								<td data-id="{{$gzh->id}}">
									{{--
									get url('gzh/update/id',['id'=>{{$gzh->id}}]) --}}
									<button class="btn btn-primary">更新</button>
									{{--
									get
									 url('gzh/delete/id ',['id'=>{{$gzh->id}}]) --}}
									<button class="btn btn-danger">删除</button>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{{$gzhs->links()}}
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
				  <form method="post" id="gzhForm" action="{{url('gzh/add')}}" class="form-horizontal">
					  {{csrf_field()}}
					  <input type="hidden" name="id" value="">
						<div class="form-group">
							<label for="" class="control-label col-md-3">
								gzh name:
							</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="name">
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
</div>
