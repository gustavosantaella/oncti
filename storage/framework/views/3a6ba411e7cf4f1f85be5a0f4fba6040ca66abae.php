
<?php $__env->startSection('content'); ?>
<div class="">

	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear noticia')): ?>
	<a href="<?php echo e(route('noticia.crear')); ?>" class=" font-weight-bold btn btn-primary small ">Seguir agregando</a>
	<?php endif; ?>
	
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('modificar noticia')): ?>
	<?php if($noticia->state): ?>
	<div class=" font-weight-bold alert-success rounded-top rounded-right rounded-left rounded-bottom p-2 mt-4">
		Estado: publicada.
	</div>

	<?php else: ?>
	<div class=" font-weight-bold alert-warning rounded-top rounded-right rounded-left rounded-bottom p-2 mt-4">
		Estado: Borrador, cambia el estado de la notica <a href="<?php echo e(route('ver.edit',$noticia->noticia_id)); ?>" title="Editar noticia" class="text-decoration-none">Aqui</a>.
	</div>
	<?php endif; ?>
	<?php endif; ?>
</div>
<div class="card border-light">
	<div class="card-header bg-transparent border-light font-weight-bold">Noticia #<?php echo e($noticia->noticia_id); ?></div>
	<div class="card-body text-center">
		<div class="card-img img-fluid">
			<img src="<?php echo e($noticia->url); ?>" class="img-fluid" alt="">			
		</div>
		<h4 class="card-title mt-4 h6"><?php echo date('d-m-Y'); ?></h4>
		<h4 class="card-title mt-2"><?php echo $noticia->titulo; ?></h4>
		<p class="card-text">
			<?php echo $noticia->cuerpo; ?>

		</p>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboadr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\oncti\resources\views/noticias/ver.blade.php ENDPATH**/ ?>