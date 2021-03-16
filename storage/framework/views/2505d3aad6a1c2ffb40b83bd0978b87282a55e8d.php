	<?php if($errors->any()): ?>
			<div class="alert-danger rounded-bottom rounded-top rounded-left rounded-right p-3">
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><?php echo e($e); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\oncti\resources\views/partials/errors.blade.php ENDPATH**/ ?>