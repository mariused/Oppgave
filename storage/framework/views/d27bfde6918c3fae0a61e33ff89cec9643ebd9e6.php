<?php $__env->startSection('content'); ?>
	<div class="row merketing">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default" style="margin-top:50px">
				<div class="panel-heading">Reset Password</div>
				
				<div class="panel-body">
					<form method="POST" action="/password/email">
						<?php echo e(csrf_field()); ?>

						<label for="email">Email-adresse</label>
						<input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required><br>
						
						<button type="submit" class="btn btn-primary">Reset passord</button>
						<?php echo $__env->make('layout.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>