
	<div class="widget">
		<h3>Tin mới nhất</h3>
		<div class="widget-article-list">
		<?php $count =0; ?>
		<?php $__currentLoopData = $lasted_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($count <5): ?>
			<div class="item">
				<div class="item-header">
					<a href="<?php echo e(url('chi-tiet/'.$item_lt->slug)); ?>">
						<img src="<?php echo e(url('/public/img/news/100x100/'.$item_lt->newimg)); ?>" alt="no img" width="80" />
					</a>
				</div>
				<div class="item-content">
					<h4><a href="<?php echo e(url('chi-tiet/'.$item_lt->slug)); ?>"><?php echo e($item_lt->newsname); ?></a></h4>
					<span class="item-meta">
						<a href="#"><i class="fa fa-clock-o"></i><?php echo e($item_lt->created_at); ?></a>
					</span>
				</div>
			</div>
			<div class="clearfix">
			
			</div>
			<?php endif; ?>
		<?php  $count = $count +1; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>


<div class="widget">
		<div class="social-widget">
			<div class="item">
				<div class="item-header">
					<?php if($adverts_bottom[0]->code != ""): ?>
							<?php echo e($adverts_bottom[0]->code); ?>

					<?php else: ?>
					<a href="<?php echo e($adverts_bottom[0]->link); ?>">
						<img src="<?php echo e(url('public/img/images_bn/'.$adverts_bottom[0]->img)); ?>" alt="No image" />
					</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>


<div class="widget">
	<h3>Đọc nhiều nhất</h3>
	<div class="widget-article-list">
	<?php $count =1; ?>
	<?php $__currentLoopData = $most_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_most): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if($count <6): ?>
		<div class="item">
			<div class="item-header">
				<a href="<?php echo e(url('chi-tiet/'.$item_most->slug)); ?>" title="<?php echo e($item_most->newsname); ?>"> 
					<b><?php echo e($count); ?></b>  <img src="<?php echo e(url('/public/img/news/100x100/'.$item_most->newimg)); ?>" alt="no img" width="80" />
				</a>
			</div>
			<div class="item-content">
				<h4><a href="<?php echo e(url('chi-tiet/'.$item_most->slug)); ?>" title="<?php echo e($item_most->newsname); ?>"><?php echo e($item_most->newsname); ?></a></h4>
				<span class="item-meta">
					<a href="#"><i class="fa fa-clock-o"></i><?php echo e($item_most->created_at); ?></a>
				</span>
			</div>
		</div>
		<div class="clearfix">
			
		</div>
		<?php endif; ?>
	<?php  $count = $count +1; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div>

<div class="widget">
	<div class="social-widget">
		<div class="item">
			<div class="item-header">
				<?php if($adverts_bottom[1]->code != ""): ?>
					<?php echo e($adverts_bottom[1]->code); ?>

				<?php else: ?>
				<a href="<?php echo e($adverts_bottom[1]->link); ?>">
					<img src="<?php echo e(url('public/img/images_bn/'.$adverts_bottom[1]->img)); ?>" alt="No image" />
				</a>
				<?php endif; ?>
			</div>
		</div>
		<div class="clearfix">
			
		</div>
	</div>
</div>