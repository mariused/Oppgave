<?php $__env->startSection('content'); ?>
<h1>Adminpanel</h1>
<p>For å endre/slette videoer: Gå inn på videoen og deretter velg endre/slett.</p>
<h4>Funksjoner for admin:</h4>
<form>
	<div class="form-group">
		<a href="/admin/change" class="btn btn-default" role="button">Endre passord</a>
	</div>
	<div class="form-group">
		<a href="/video/create" class="btn btn-default" role="button">Legg til video</a>
	</div>
	<div class="form-group">
		<a href="/kategori/create" class="btn btn-default" role="button">Legg til kategori</a>
	</div>
	<div class="form-group">
		<label for="title">Velg kategori:</label>
		<select class="form-control" id="category" name="category">
			<option value="" disabled="true" selected="true">Kategori</option>
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($cat->id); ?>"><?php echo e($cat->category); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</select>
	</div>
	<div class="form-group">
		<a href="" class="btn btn-primary" role="button" id="edit">Endre</a>
		<a href="" class="btn btn-primary" role="button" id="delete">Slett</a>
	</div>
</form>
<script>
	var sel = document.getElementById('category');
	
	sel.onchange = function () {
		document.getElementById("edit").href = "/kategori/" + this.value + "/edit";
		document.getElementById("delete").href = "/kategori/" + this.value + "/delete";
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>