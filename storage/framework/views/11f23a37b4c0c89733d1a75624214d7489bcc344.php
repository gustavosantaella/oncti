<?php $__env->startSection('content'); ?>

	
		<?php if($errors->any()): ?>
			<div class="alert-danger">
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><?php echo e($e); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		<?php endif; ?>


	<?php echo e(Form::open(['route' => 'noticia.guardar','files'=>'true'])); ?>


	    <fieldset class="form-group">
			<?php echo Form::label('formGroupExampleInput', 'Título', ['class'=>'font-weight-bold']); ?>

			<?php echo Form::text('titulo', null, ['placeholder'=>'Título de la noticia...','class'=>'form-control']); ?>

		</fieldset>


		<fieldset class="form-group">
			<?php echo Form::label('formGroupExampleInput2', 'Extracto', ['class'=>'font-weight-bold']); ?>

			<?php echo Form::textarea('extracto' , null, ['placeholder'=>'Extracto de la notica...']); ?>

		</fieldset>

		<fieldset class="form-group">
			<?php echo Form::label('formGroupExampleInput2', 'Cuerpo', ['class'=>'font-weight-bold']); ?>

			<?php echo Form::textarea('cuerpo' , null, ['placeholder'=>'Cuerpo de la notica...']); ?>

		</fieldset>

		<fieldset class="form-group">
			<?php echo Form::label('formGroupExampleInput2', 'Estado', ['class'=>'font-weight-bold d-flex']); ?>

		<?php echo Form::select('state', [true=>'Publicado',false=>'Borrador'], 0, ['class'=>'form-control']); ?>

		</fieldset>

		<fieldset class="form-group">
			<?php echo Form::label('formGroupExampleInput2', 'Imagen', ['class'=>'font-weight-bold d-flex']); ?>

		<?php echo Form::file('foto', ['accept'=>'image/png,image/jpg,image/jpeg']); ?>

		</fieldset>

		<fieldset class="form-group">
		
		<?php echo Form::submit('Enviar', ['class'=>'btn btn-primary font-weight-bold']); ?>


		</fieldset>

	<?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboadr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/oncti/resources/views/noticias/create.blade.php ENDPATH**/ ?>