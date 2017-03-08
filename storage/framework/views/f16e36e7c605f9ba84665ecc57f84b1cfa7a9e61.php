<?php $__env->startSection('content'); ?>
	<div class="row marketing">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default" style="margin-top:50px">
				<div class="panel-heading">Reset Password</div>
				
				<div class="panel-body">
					<form method="POST" action="/password/reset">
						<?php echo e(csrf_field()); ?>

						<input type="hidden" name="token" value="<?php echo e($token); ?>">
						<label for="email">Email-adresse:</label>
						<input type="email" name="email" class="form-control" value="<?php echo e($email); ?>" required><br>
						<label for="password">Nytt passord:</label>
						<input type="password" name="password" class="form-control<?php echo e($errors->has('password') ? ' has-error' : ''); ?>"><br>
						<label for="password_confirmation">Bekreft passord:</label>
						<input type="password" name="password_confirmation" class="form-control<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
						<br><button type="submit" class="btn btn-primary">Reset passord</button>
						<?php echo $__env->make('layout.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>