<?php $__env->startSection('content'); ?>
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
							<?php if(!empty($customers) && (count($customers)>0)): ?>
							<?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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