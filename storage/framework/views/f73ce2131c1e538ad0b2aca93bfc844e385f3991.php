<?php $__env->startSection('content'); ?>
	<div class="row marketing">
		<div class="col-lg-6">
			<h1>Logg inn</h1>
			
			<form method="POST" action="/login">
				<?php echo e(csrf_field()); ?>

				
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email" name="email" required>
				</div>
				
				<div class="form-group"> 
					<label for="password">Passord:</label>
					<input type="password" class="form-control" id="password" name="password" required>
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Log in</button>
					<a style="margin-left:20px" href="/password/reset">Glemt passord</a>
				</div>
				<?php echo $__env->make('layout.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</form>

		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>