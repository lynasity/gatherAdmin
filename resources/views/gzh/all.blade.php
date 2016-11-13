<!-- @foreach($gzhs as $gzh)
    <li>{{$gzh->name}}</li>
@endforeach -->
<div class="gzh">
	<div class="row">
		<div class="col-md-3 col-md-offset-1">
			<div class="panel panel-primary">
			<div class="panel-heading ">
				<h3 class="panel-title">
					<i class="fa fa-bars"></i>
					公众号
				</h3>
			</div>
			<div class="panel-body cus-panel-body">
				<table class="table-striped table-hover tbale-responsive">
					<thead>
						<tr class="bg-primary gzh-table-head">
							<th style="width: 50%">公众号名称</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>lorem</td>
							<td>
								<button class="btn btn-primary">更新</button>
								<button class="btn btn-danger">删除</button>
							</td>
						</tr>
						<tr>
							<td>lorem</td>
							<td>
								<button class="btn btn-primary">更新</button>
								<button class="btn btn-danger">删除</button>
							</td>
						</tr>
						<tr>
							<td>lorem</td>
							<td>
								<button class="btn btn-primary">更新</button>
								<button class="btn btn-danger">删除</button>
							</td>
						</tr>
						<tr>
							<td>lorem</td>
							<td>
								<button class="btn btn-primary">更新</button>
								<button class="btn btn-danger">删除</button>
							</td>
						</tr>
					</tbody>
				</table>
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
				  <form method="post" action="{{url('gzh/add')}}" class="form-horizontal">
					  {{csrf_field()}}
						<div class="form-group">
							<label for="" class="control-label col-md-3">
								gzh name:
							</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="name">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label col-md-3">
								history url:
							</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="historyUrl">
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
