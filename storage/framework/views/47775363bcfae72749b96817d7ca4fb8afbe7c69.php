<?php $__env->startSection('content'); ?>
	<div class="row marketing">
        <div class="col-lg-4">
				
				<?php for($i = 0; $i<count($articles); $i++): ?>
					<?php
						$url = $articles[$i]->url;
						if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)){
							$video_id = $match[1];
						}
					?>
					
					<div class="list-group" style="width:200px">
						<a href="/video/<?php echo e($articles[$i]->id); ?>" class="list-group-item" style="height:120px; width:220px; background-image:url('https://img.youtube.com/vi/<?php echo e($video_id); ?>/maxresdefault.jpg'); background-size:220px 120px">
						<!--<h5 class="list-group-item-heading"><?php echo e($articles[$i]->title); ?></h5> -->
						<!--<p class="list-group-item-text"><?php echo e(substr($articles[$i]->description, 0, 50)); ?>..</p> -->
						<p class="list-group-item-text"><h4 style="color: white;text-shadow: 2px 2px 4px #000000;"><?php echo e($articles[$i]->title); ?></h4></p>
						</a>
					</div>
		</div><div class="col-lg-4">
				<?php endfor; ?>
		</div>
		<div class="footer">
		<?php echo e($articles->links()); ?>

		
</div>
<?php $__env->stopSection(); ?>
	

<?php echo $__env->make('layout/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>