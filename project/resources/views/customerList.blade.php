@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Customer List</div>

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
							@if(!empty($customers) && (count($customers)>0))
							@foreach($customers as $key => $list)
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
