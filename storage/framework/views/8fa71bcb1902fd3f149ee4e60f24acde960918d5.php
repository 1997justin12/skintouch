<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12 button-group margin-top-bottom">
		<a class="btn btn-info button-no-radius active"><i class="fa fa-pdf"></i><span>Export PDF</span></a>
		<a class="btn btn-info button-no-radius active"><i class="fa fa-print"></i> <span>Print Copy</span></a>
		<a class="btn btn-info button-no-radius active"><i class="fa fa-pdf"></i><span>Export Excel</span></a>
		<a class="btn btn-info button-group active pull-right"><i class="fa fa-stat"></i><span>View Graphs</span></a>
	</div>

	<div>
		<div class="">
					
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>