<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12">
		<h3>Add Products</h3>
	</div>
	<div class="col-md-12">
	<?php if($errors->any()): ?>
		<div class="alert alert-warning">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php echo e($error); ?><br>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	<?php endif; ?>
	<?php if(session('success')): ?>
		<div class="alert alert-success">
			<?php echo e(session('success')); ?>

		</div>
	<?php endif; ?>
	</div>

	<div class="col-md-6">
	<form role="form" action="createProduct" method="post">
		<?php echo e(csrf_field()); ?>

	 <div class="form-body">
		<div class="form-group">
			<label for="product's name">Product's Name</label>
			<input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="retailer's price">Retailer's Price</label>
			<input type="text" name="retailers_price" value="<?php echo e(old('name')); ?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="member's price">Member's Price</label>
			<input type="text" name="members_price" value="<?php echo e(old('name')); ?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="reseller's price">Reseller's Price</label>
			<input type="text" name="resellers_price" value="<?php echo e(old('name')); ?>" class="form-control">
		</div>
	</div>
	<div class="form-action pull-right">
			<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
	</div>

	</form>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>