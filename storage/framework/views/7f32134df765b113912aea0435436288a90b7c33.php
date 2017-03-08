<?php $__env->startSection('content'); ?>
<div class="content">
	<div class="row marketing">
		<div class="col-lg-6">
		<h1>Legg til video</h1>
			<form method="POST" action="/video">
				
				<?php echo e(csrf_field()); ?>

			
				<div class="form-group">
					<label for="title">Tittel</label>
					<input type="text" class="form-control" id="title" name="title">
				</div>
				
				<div class="form-group">
					<label for="description">Beskrivelse</label>
					<textarea id="description" name="description" class="form-control"></textarea>
				</div>
				
				<div class="form-group">
					<label for="url">Url</label>
					<input type="text" class="form-control" id="url" name="url">
				</div>
				
				<div class="form-group">
					<label for="title">Fremhevet</label><br>
					<input type="radio" name="emphasise" value="1">Ja <br>
					<input type="radio" name="emphasise" value="0" checked="1">Nei
				</div>
				
				<label for="title">Velg kategori:</label>
				<select class="form-control" id="select_1" name="category">
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($cat->category); ?>"><?php echo e($cat->category); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>

				<div class="form-group">
					<br><button type="submit" class="btn btn-default">Lagre</button>
				</div>
			</form>
			<?php echo $__env->make('layout.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
</div>	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>