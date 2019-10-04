<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<?php if(session('message')): ?>
			<div class="alert alert-success text-center alert-dismissable fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo e(session('message')); ?> </strong>
			</div>
			<?php endif; ?>

			<div class="panel panel-default">
				<div class="panel-heading">Update Profile</div>

				<div class="panel-body">
					<form action="<?php echo e(url('dashboard/customer/update')); ?>" method="post" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>


						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" value="<?php echo e(Auth::guard('customer')->user()->name); ?>" required="">

							<?php if($errors->has('name')): ?>
							<span class="help-block">
								<strong><?php echo e($errors->first('name')); ?></strong>
							</span>
							<?php endif; ?>

						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label>File</label>
								</div>
								<div class="col-md-8">
									<input type="file" name="file" class="form-control" value="">

									<?php if($errors->has('file')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('file')); ?></strong>
									</span>
									<?php endif; ?>

								</div>
								<div class="col-md-2">
									<a href="<?php echo e(url('/dashboard/customer/file/delete')); ?>" onclick="return confirm('Are you sure？')" class="btn btn-danger btn-block">Delete</a>
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


<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script type="text/javascript">
	$(".preview").click(function(){
		var site_url = jQuery('.site_url').val();
		var request_url = site_url+'/dashboard/customer/preview/';
		
		$.ajax({
			url: request_url,
			method: "GET",
			success:function(data){
				console.log(data);
				var Banner = '<?php echo e(asset("uploads/customer")); ?>'+'/'+data.id+'/'+data.file;
				$(".modal-body #file").attr('src', Banner);
			}
		});
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>