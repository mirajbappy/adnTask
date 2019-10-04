<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<?php if(session('message')): ?>
			<div class="alert alert-success text-center alert-dismissable fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo e(session('message')); ?> </strong>
			</div>
			<?php endif; ?>
		</div>


		<div class="col-md-6">

			<div class="panel panel-default">
				<div class="panel-heading">Create Admin</div>

				<div class="panel-body">
					<form action="<?php echo e(url('/dashboard/systemadmin/create-admin/')); ?>" method="post" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>


						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" value="" required="">

							<?php if($errors->has('name')): ?>
							<span class="help-block">
								<strong><?php echo e($errors->first('name')); ?></strong>
							</span>
							<?php endif; ?>

						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" value="" required="">

							<?php if($errors->has('email')): ?>
							<span class="help-block">
								<strong><?php echo e($errors->first('email')); ?></strong>
							</span>
							<?php endif; ?>

						</div>

						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" value="" required="">

							<?php if($errors->has('password')): ?>
							<span class="help-block">
								<strong><?php echo e($errors->first('password')); ?></strong>
							</span>
							<?php endif; ?>

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
							<?php if(!empty($admins) && (count($admins)>0)): ?>
							<?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($key+1); ?></td>
								<td><?php echo e($list->name); ?></td>
								<td><?php echo e($list->email); ?></td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>


	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>