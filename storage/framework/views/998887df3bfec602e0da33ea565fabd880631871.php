
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo e(Form::model($id,['route' => ['noticia.editar',$id],'method'=>'put'])); ?>


<?php echo $__env->make('partials.noticias.formNew',['btn'=>'Actualizar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<fieldset class="form-group">

	<?php echo Form::submit('Actualizar', ['class'=>'btn btn-primary font-weight-bold']); ?>


</fieldset>

<?php echo e(Form::close()); ?>


<?php echo e(Form::model($id,['route' => ['noticia.editarFoto',$id],'files'=>'true','method'=>'put'])); ?>

<fieldset class="form-group">

	<h2>Imagen actual</h2>

	<img src="<?php echo e($noticia->url); ?>" width="350" height="250" alt="">
</fieldset>
<fieldset class="form-group">

	<?php echo Form::label(null, null, ['class'=>'font-weight-bold d-flex']); ?>

	<?php echo Form::file('foto', ['accept'=>'image/png,image/jpg,image/jpeg']); ?>

</fieldset>

<fieldset class="form-group">

	<?php echo Form::submit('Actualizar imagen', ['class'=>'btn btn-primary font-weight-bold']); ?>


</fieldset>
<?php echo e(Form::close()); ?>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.noticias.scriptTypedNew', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.dashboadr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\oncti\resources\views/noticias/edit.blade.php ENDPATH**/ ?>