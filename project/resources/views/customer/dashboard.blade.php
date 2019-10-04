@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			@if(session('message'))
			<div class="alert alert-success text-center alert-dismissable fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>{{session('message')}} </strong>
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">Update Profile</div>

				<div class="panel-body">
					<form action="{{url('dashboard/customer/update')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}

						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" value="{{Auth::guard('customer')->user()->name}}" required="">

							@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
							@endif

						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label>File</label>
								</div>
								<div class="col-md-8">
									<input type="file" name="file" class="form-control" value="">

									@if ($errors->has('file'))
									<span class="help-block">
										<strong>{{ $errors->first('file') }}</strong>
									</span>
									@endif

								</div>
								<div class="col-md-2">
									<a href="{{url('/dashboard/customer/file/delete')}}" onclick="return confirm('Are you sure？')" class="btn btn-danger btn-block">Delete</a>
								</div>
								<div class="col-md-2">
									<button type="button" class="btn btn-info btn-block preview" data-target="#previewModal" data-toggle="modal" >Preview</button>
								</div>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Save</button>
						</div>
					</form>
				</div>
			</div>


		</div>
	</div>
</div>


<!-- preview modal -->
<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Preview</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<iframe src="" id="file" style="width: 100%;height: 500px"></iframe>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


@endsection

@push('js')
<script type="text/javascript">
	$(".preview").click(function(){
		var site_url = jQuery('.site_url').val();
		var request_url = site_url+'/dashboard/customer/preview/';
		
		$.ajax({
			url: request_url,
			method: "GET",
			success:function(data){
				console.log(data);
				var Banner = '{{asset("uploads/customer")}}'+'/'+data.id+'/'+data.file;
				$(".modal-body #file").attr('src', Banner);
			}
		});
	});
</script>
@endpush