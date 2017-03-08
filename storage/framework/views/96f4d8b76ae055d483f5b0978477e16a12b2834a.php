<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ge.no/tv</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href="/">Home</a></li>
			</ul>
			
		<?php if(Auth::check()): ?>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/admin"><?php echo e(Auth::user()->name); ?></a></li>
				<li><a href="/logout">Logg ut</a></li>
			</ul>
		<?php else: ?>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/register/create">Registrer bruker</a></li>
				<li><a href="/login">Logg inn</a></li>
			</ul>
		<?php endif; ?>
			
        </div><!--/.nav-collapse -->
      </div>
</nav>
		<div class="container" style="padding-top:50px">
		<div class="dropdown">
		<a href="/" class="btn btn-primary" role="button">Alle</a>
		  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Arkiv
		  <span class="caret"></span></button>
		  <ul class="dropdown-menu">
			<li><a href="/arkiv/2017">2017</a></li>
			<li><a href="/arkiv/2016">2016</a></li>
			<li><a href="/arkiv/2015">2015</a></li>
			<li><a href="/arkiv/2014">2014</a></li>
			<li><a href="/arkiv/2013">2013</a></li>
			<li><a href="/arkiv/2012">2012</a></li>
		  </ul>
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<a href="/<?php echo e($cat->tag); ?>" class="btn btn-primary" role="button"><?php echo e($cat->category); ?></a>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
	