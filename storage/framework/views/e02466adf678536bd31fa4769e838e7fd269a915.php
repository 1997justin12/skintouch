<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="col-md-12">
		<a href="addProduct" class="btn btn-info margin-top-bottom active button-no-radius"><i class="fa fa-cube"></i> <span>Add New Product</span></a>

		<a href="viewStocks" class="btn btn-info margin-top-bottom active button-no-radius"><i class="fa fa-cubes"></i> <span>View Products Stock</span></a>

		<table class="table table-condensed table-striped table-bordered" id="products">
			<thead>
				<tr>
					<th>Name of Product</th>
					<th>Retailer's Price</th>
					<th>Member's Price</th>
					<th>Reseller's Price</th>
					<th>Date Added</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
					<?php foreach ($products as  $product){ ?>
						<tr>
							<td><?php echo e($product->name); ?></td>
							<td><b>Php</b> <?php echo number_format($product->retailers_price, 2); ?></td>
							<td><b>Php</b> <?php echo number_format($product->members_price, 2); ?></td>
							<td><b>Php</b> <?php echo number_format($product->resellers_price, 2); ?></td>
							<td><?php echo e($product->created_at); ?></td>
							<td>
								<a href=""><i class="fa fa-eye" title="View Product's Information"></i></a>&nbsp;
								<a href=""><i class="fa fa-pencil" title="Edit Product's Information"></i></a>&nbsp;
								<a href=""><i class="fa fa-trash" title="Delete Product's"></i></a>
							</td>
						</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>
		
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script type="text/javascript">

		$("#products").dataTable();
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>