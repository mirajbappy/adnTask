@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-md-12">
			@if(session('message'))
			<div class="alert alert-success text-center alert-dismissable fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>{{session('message')}} </strong>
			</div>
			@endif
		</div>


		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Create Admin</div>
				<div class="panel-body">
					<form action="{{url('/dashboard/systemadmin/create-admin/')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" value="" required="">
							@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
							@endif
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" value="" required="">
							@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
							@endif
						</div>

						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" value="" required="">
							@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
							@endif
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>


		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Admin List</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>SL</th>
								<th>Name</th>
								<th>Email</th>
							</tr>
						</thead>
						<tbody>
							@if(!empty($admins) && (count($admins)>0))
							@foreach($admins as $key => $list)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$list->name}}</td>
								<td>{{$list->email}}</td>
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>


	</div>
</div>
@endsection
