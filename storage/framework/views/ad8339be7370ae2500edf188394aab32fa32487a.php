<div class="hidden-xs col-xs-12 col-md-9 nopadding">
	<?php $__currentLoopData = $modnews_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="col-md-12">							
		<div class="content-panel-body article-list">
			<div class="item" data-color-top-slider="#867eef">
				<div class="item-header">
					<a href="<?php echo e(url('chi-tiet/'.$hot->slug)); ?>">
						<span class="comment-tag"><i class="fa fa-comment-o"></i><span class="fb-comments-count" data-href="<?php echo e(url('chi-tiet/'.$hot->slug)); ?>"></span><i></i></span>
						<span class="read-more-wrapper"><span class="read-more">Đọc thêm +<i></i></span></span>
						<img src="<?php echo e(url('public/img/news/300x300/'.$hot->newimg)); ?>" alt="No image" />
					</a>
				</div>
				<div class="item-content">
					<h3><a href="<?php echo e(url('chi-tiet/'.$hot->slug)); ?>"><?php echo e($hot->newsname); ?></a></h3>
					<span class="item-meta">
						<a href="#"><i class="fa fa-clock-o"></i><?php echo e($hot->created_at); ?></a>
					</span>
					<p><?php echo $hot->newintro; ?></p>	
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>	
<?php $i=0; ?>
<?php $__currentLoopData = $modnews_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($modnew->type ==0): ?>
<?php if($i ==0 || $i ==7 ||$i ==0 ||$i ==13): ?>
	<div class="visible-xs col-xs-12">
		<div class="mobile_hot_img">
			<a href="<?php echo e(url('/chi-tiet/'.$item->slug)); ?>" title="<?php echo e($item->newsname); ?>">
				<img src="<?php echo e(url('public/img/news/300x300/'.$item->newimg)); ?> " alt="<?php echo e($item->newimg); ?>">
			</a>
		</div>
		<div class="mobile_title">
			<a href="<?php echo e(url('/chi-tiet/'.$item->slug)); ?>" title="<?php echo e($item->newsname); ?>"><h1><?php echo e($item->newsname); ?></h1></a>
		</div>
	</div>
<?php elseif($i<20): ?>
	<div class="visible-xs col-xs-6 padding4">
		<div class="mobile_img">
			<a href="<?php echo e(url('/chi-tiet/'.$item->slug)); ?>" title="<?php echo e($item->newsname); ?>">
				<img src="<?php echo e(url('public/img/news/300x300/'.$item->newimg)); ?>" alt="<?php echo e($item->newsname); ?>">
			</a>
		</div>
		<div class="mobile_title">
			<a href="<?php echo e(url('/chi-tiet/'.$item->slug)); ?>" title="<?php echo e($item->newsname); ?>"><h1><?php echo e($item->newsname); ?></h1></a>
		</div>
	</div>
<?php else: ?> 
	<div class="item">
		<div class="item-header">
			<a href="<?php echo e(url('chi-tiet/'.$item->slug)); ?>" title="<?php echo e($item->newsname); ?>"> 
				<b><?php echo e($count); ?></b>  <img src="<?php echo e(url('public/img/news/300x300/'.$item->newimg)); ?> " alt="no img" width="50" />
			</a>
		</div>
		<div class="item-content">
			<h4><a href="<?php echo e(url('chi-tiet/'.$item->slug)); ?>" title="<?php echo e($item->newsname); ?>"><?php echo e($item->newsname); ?></a></h4>
			<span class="item-meta">
				<a href="#"><i class="fa fa-clock-o"></i><?php echo e($item->created_at); ?></a>
			</span>
		</div>
	</div>
<?php endif; ?>
<?php $i = $i+1; ?>
<?php else: ?>
<div class="widget visible-xs">
	<div class="widget-article-list visible-xs">
		<div class="item">
			<div class="item-header">
				<a href="<?php echo e(url('chi-tiet/'.$item->slug)); ?>">
					<img src="<?php echo e(url('/public/img/news/100x100/'.$item->newimg)); ?>" alt="no img" width="80" />
				</a>
			</div>
			<div class="item-content">
				<h4><a href="<?php echo e(url('chi-tiet/'.$item->slug)); ?>"><?php echo e($item->newsname); ?></a></h4>
				<span class="item-meta">
					<a href="#"><i class="fa fa-clock-o"></i><?php echo e($item->created_at); ?></a>
				</span>
			</div>
		</div>
		<div class="clearfix">
		
		</div>
	</div>
</div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
