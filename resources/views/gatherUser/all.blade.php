<!-- @foreach($gatherUsers as $user)
   <li>{{$user->username}}</li>
@endforeach -->

<div class="row">
	<div class="col-md-6 col-md-offset-1">
		<div class="panel panel-primary">
		<div class="panel-heading ">
			<h3 class="panel-title">
				<i class="fa fa-bars"></i>
				用户列表
			</h3>
		</div>
		<div class="panel-body cus-panel-body">
			<table class="table-striped table-hover tbale-responsive" id="userTable">
				<thead>
					<tr class="bg-primary gzh-table-head">
						<th style="width: 25%">用户名称</th>
						<th style="width: 25%">sex</th>
						<th style="width: 25%">email</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($gatherUsers as $user)

					@endforeach
					<tr>
						<td>
							{{$user->username}}
						</td>
						<td>
							{{$user->gender}}
						</td>
						<td>
				            {{$user->email}}
						</td>
						{{-- <td>
							<button class="btn btn-primary">更新</button>
							<button class="btn btn-danger">删除</button>
						</td> --}}
					</tr>

				</tbody>
			</table>
		</div>
	</div>
	</div>
	{{-- <div class="col-md-4">
		<div class="panel panel-primary">
		  <div class="panel-heading">
			<h3 class="panel-title">
				<i class="fa fa-bars"></i>
				更新|增加
			</h3>
		  </div>
		  <div class="panel-body">
			  <form method="post" action="{{url('user/add')}}" class="form-horizontal" id="userForm">
				  {{csrf_field()}}
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							用户名:
						</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="username">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							性别:
						</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="gender">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							邮箱:
						</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="email">
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

	</div> --}}
</div>
