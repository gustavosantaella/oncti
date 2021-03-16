
<?php $__env->startSection('content'); ?>
<div class="card">

	<div class="card-body">
		<div class="text-right">
			<button class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#exampleModal">Crear permiso</button>
		</div>


		<?php echo $__env->make('partials.permisos.form',['ruta'=>'guardar.permiso'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<hr>
		<div >
			<table id="example" class="table table-responsive table-hover" >
				<thead>
					<th class="text-center">#</th>
					<th class="text-center"width='25%'>Nombre</th>
					<th  class="text-center"width='25%'>Fecha de creaci&oacute;n</th>
					<th  class="text-center"width='25%'>Fecha de actualizaci&oacute;n</th>
					<th  class="text-center"width='25%'>Opciones</th>
				</thead>
				<tbody>

					<?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($permiso->id); ?></td>
						<td width='25%'><?php echo e($permiso->name); ?></td>
						<td width='25%'><?php echo e($permiso->created_at); ?></td>
						<td width='25%'><?php echo e($permiso->updated_at); ?></td>
						<td class="text-center" width='25%'>
							<a href="<?php echo e(route('eliminar.permiso',$permiso->id)); ?>" class="btn btn-danger font-weight-bold" title="">Eliminar</a>
						
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
	
	td{
		padding-top: 20px;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script src="<?php echo e(asset('js/js-template-bootstrap/charts/datatables-demo.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboadr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\oncti\resources\views/admin/permisos/create.blade.php ENDPATH**/ ?>