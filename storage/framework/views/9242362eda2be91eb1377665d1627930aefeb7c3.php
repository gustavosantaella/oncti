<fieldset class="form-group">
	<?php echo Form::label('formGroupExampleInput', 'Título', ['class'=>'font-weight-bold']); ?>

	<?php echo Form::text('titulo', $noticia->titulo, ['placeholder'=>'Título de la noticia...','class'=>'form-control']); ?>

</fieldset>


<fieldset class="form-group">
	<?php echo Form::label('formGroupExampleInput2', 'Extracto', ['class'=>'font-weight-bold']); ?>

	<?php echo Form::textarea('extracto' , $noticia->extracto, ['placeholder'=>'Extracto de la notica...']); ?>

</fieldset>

<fieldset class="form-group">
	<?php echo Form::label('formGroupExampleInput2', 'Cuerpo', ['class'=>'font-weight-bold']); ?>

	<?php echo Form::textarea('cuerpo' , $noticia->cuerpo, ['placeholder'=>'Cuerpo de la notica...']); ?>

</fieldset>

<fieldset class="form-group">
	<?php echo Form::label('formGroupExampleInput2', 'Estado', ['class'=>'font-weight-bold d-flex']); ?>

	<?php echo Form::select('state', [true=>'Publicado',false=>'Borrador'], 0, ['class'=>'form-control']); ?>

</fieldset>




<?php /**PATH C:\xampp\htdocs\oncti\resources\views/partials/noticias/formNew.blade.php ENDPATH**/ ?>