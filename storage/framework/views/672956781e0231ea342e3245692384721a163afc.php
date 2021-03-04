
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo e(Form::open(['route' => 'noticia.guardar','files'=>'true'])); ?>


<?php echo $__env->make('partials.noticias.formNew',['btn'=>'Enviar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<fieldset class="form-group">

	<?php echo Form::label(null, 'Imagen', ['class'=>'font-weight-bold d-flex']); ?>

	<?php echo Form::file('foto', ['accept'=>'image/png,image/jpg,image/jpeg']); ?>

</fieldset>
<fieldset class="form-group">

	<?php echo Form::submit('Enviar', ['class'=>'btn btn-primary font-weight-bold']); ?>


</fieldset>

</fieldset>
<?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.noticias.scriptTypedNew', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.dashboadr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\oncti\resources\views/noticias/create.blade.php ENDPATH**/ ?>