<?php $__env->startSection('content'); ?>
<?php
	$emp = 0;
?>

	<div class="row marketing">
		<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($article->emphasise == 1): ?>
				
				<?php
					$emp = $article->id;
					$url = $article->url;
					if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)){
						$video_id = $match[1];
					}
				?>
				<div class="col-md-9">
					<div class="list-group" style="width:685px">
							<a href="/video/<?php echo e($article->id); ?>" class="list-group-item" style="height:300px; width:685px; background-image:url('https://img.youtube.com/vi/<?php echo e($video_id); ?>/maxresdefault.jpg'); background-size:685px 300px">
							<p class="list-group-item-text"><h4 style="color: white;text-shadow: 2px 2px 4px #000000;"><?php echo e($article->title); ?></h4></p>
							</a>
					</div>
				</div>
			<?php endif; ?>
			
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		<div class="col-lg-4">
		<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($emp == $article->id): ?>
				
			<?php else: ?>
				<?php
					$url = $article->url;
					if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)){
						$video_id = $match[1];
					}
				?>
			
				<div class="list-group" style="width:200px">
					<a href="/video/<?php echo e($article->id); ?>" class="list-group-item" style="height:120px; width:220px; background-image:url('https://img.youtube.com/vi/<?php echo e($video_id); ?>/maxresdefault.jpg'); background-size:220px 120px">
					<p class="list-group-item-text"><h4 style="color: white;text-shadow: 2px 2px 4px #000000;"><?php echo e($article->title); ?></h4></p>
					</a>
				</div>
				</div><div class="col-lg-4">
			<?php endif; ?>
			
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div></div>
		<div class="footer">
		<?php echo e($articles->links()); ?>

		
</div>
<?php $__env->stopSection(); ?>
	

<?php echo $__env->make('layout/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>