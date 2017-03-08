<?php $__env->startSection('content'); ?>
<div class="content">
	<div class="row marketing">
		<div class="col-lg-6">
		<h1>Endre video</h1>
			<form method="POST" action="/video/<?php echo e($article->id); ?>">
				
				<?php echo e(csrf_field()); ?>

			
				<div class="form-group">
					<label for="title">Tittel</label>
					<input type="text" value="<?php echo e($article->title); ?>" class="form-control" id="title" name="title">
				</div>
				
				<div class="form-group">
					<label for="description">Beskrivelse</label>
					<textarea id="description" style="min-height:90px;" name="description" class="form-control"><?php echo e($article->description); ?></textarea>
				</div>
				
				<div class="form-group">
					<label for="url">Url</label>
					<input type="text" value="<?php echo e($article->url); ?>" class="form-control" id="url" name="url">
				</div>
				
				<div class="form-group">
					<label for="emphasise">Fremhevet</label><br>
					<?php if($article->emphasise == 1): ?>
						<input type="radio" name="emphasise" value="1" checked="1">Ja <br>
						<input type="radio" name="emphasise" value="0">Nei
					<?php else: ?>
						<input type="radio" name="emphasise" value="1">Ja <br>
						<input type="radio" name="emphasise" value="0" checked="1">Nei
					<?php endif; ?>
				</div>
				<div class="form-group">
					<input type="date" name="date" max="<?php echo e(date('Y-m-d')); ?>" min="2010-12-31" value="<?php echo e($article->date); ?>">
				</div>
				<label for="title">Velg kategori:</label>
				<select class="form-control" id="category" name="category">
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($article->category == $cat->category): ?>
								<option value="<?php echo e($cat->category); ?>" selected="true"><?php echo e($cat->category); ?></option>
							<?php else: ?>
								<option value="<?php echo e($cat->category); ?>"><?php echo e($cat->category); ?></option>
							<?php endif; ?>
							
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>

				<div class="form-group">
					<br><button type="submit" class="btn btn-primary">Endre</button>
				</div>
			</form>
			<?php echo $__env->make('layout.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
</div>	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>