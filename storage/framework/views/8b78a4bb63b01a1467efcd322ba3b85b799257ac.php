

<?php $__env->startSection('content'); ?>

<table class="table" id="example">
	<thead>
		<tr class="text-center">
			<th scope="col">#</th>
			<th style="width: 30%!important" scope="col">Título</th>
			<th scope="col">Fecha</th>
			<th scope="col">Estado</th>
			<th colspan="0" scope="col"></th>
			<th ></th>
			<th ></th>
		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<tr>
			<th  class="text-center" scope="row"><?php echo e($e->id); ?></th>
			<td style="width: 30%!important"><?php echo e($e->titulo); ?></td>
			<td class="text-center"><?php echo e(date('d/m/Y H:i:s', strtotime($e->fecha))); ?></td>
			<?php if($e->state): ?>
			<td class="text-center"> <i class="fas fa-check-square text-success"></i></td>

			<?php else: ?>
			<td class="text-center"> <i class="fas fa-times text-danger"></i></td>
			<?php endif; ?>

			<td class="text-center">
				<a href="<?php echo e(route('ver.edit',$e->id)); ?>" class="text-decoration-none btn btn-warning font-weight-bold" title="Eliminar noticia">
					Editar
				</a>
			</td>

			<td class="text-center">
				<a href="<?php echo e(route('ver.noticia',$e->id)); ?>" class="text-decoration-none btn btn-light font-weight-bold" title="Ver noticia">
					Vista previa
				</a>
			</td>

			<td class="text-center">
				<form action="<?php echo e(route('noticia.eliminar',$e->id)); ?>" method="POST">
					<?php echo csrf_field(); ?>
					<?php echo method_field('DELETE'); ?>
					<?php echo Form::submit('Eliminar', ['class'=>'btn btn-danger font-weight-bold']); ?>

				</form>
			</td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script src="<?php echo e(asset('js/js-template-bootstrap/charts/datatables-demo.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboadr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\oncti\resources\views/noticias/listar.blade.php ENDPATH**/ ?>