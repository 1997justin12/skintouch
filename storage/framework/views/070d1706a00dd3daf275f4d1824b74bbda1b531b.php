<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
			<div class="col-md-8 text-left button-groups margin-top-bottom">
                <a href="addStore" class="btn btn-info active button-no-radius "><i class="fa fa-money"></i>Add New Branch</a>
			</div>

			<div class="col-md-12">
				<table class="table table-condesed table-bordered" id="stores">
					<thead>
						<tr>
							<th>Province</th>
							<th>City</th>
							<th>Street</th>
							<th>Landmark</th>
							<th>Sales</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr id="store-<?php echo e($store->id); ?>">
								<td><?php echo e($store->province); ?></td>		
								<td><?php echo e($store->city); ?></td>		
								<td><?php echo e($store->street); ?></td>		
								<td><?php echo e($store->landmark); ?></td>		
								<td><?php echo e($store->sales); ?></td>	
								<td>
								<a href="view/branch/<?php echo e($store->id); ?>"><i class="fa fa-eye"></i></a>
								<a href="" onclick="event.preventDefault()"><i class="fa fa-trash delete-branch" id="<?php echo e($store->id); ?>"></i></a>
								</td>	
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$("#stores").DataTable();

		$(".delete-branch").click(function(){
			$("#store-"+this.id).remove();
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>