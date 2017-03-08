<?php $__env->startSection('content'); ?>
	<div class="container" style="padding-top:20px">
		<iframe width="560" height="315" 
			src="<?php echo e($article->url); ?>?autoplay=0" frameborder="0" allowfullscreen>
		</iframe> 
		<h4><?php echo e($article->title); ?></h4>
		<p>Dato: <?php echo e($article->date); ?></p>
		<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($cat->category == $article->category): ?>
			<p>Kategorier: <a href="/<?php echo e($cat->tag); ?>"><?php echo e($article->category); ?></a></p>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<p><?php echo e($article->description); ?></p>
	</div>
	<?php if(Auth::check()): ?>
		<a href="/video/<?php echo e($article->id); ?>/edit" class="btn btn-primary" role="button">Endre</a>
		<a href="/video/<?php echo e($article->id); ?>/delete" class="btn btn-primary" role="button">Slett</a>
	<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>