<?php $__env->startSection('title', (!empty($contact)?$contact->seo_title:"")); ?>
<?php $__env->startSection('seo_keyword', (!empty($contact)?$contact->seo_keyword:"")); ?>
<?php $__env->startSection('seo_description', (!empty($contact)?$contact->seo_description:"")); ?>
<?php $__env->startSection('seo_image', (!empty($contact)?asset($contact->seo_image):"")); ?>
<?php $__env->startSection('seo_url', url()->current()); ?>
<?php $__env->startSection('content'); ?>
<!-- BEGIN .wrapper -->
	<div class="wrapper">
			<!-- BEGIN .ot-breaking-news-body -->
	<div class="ot-breaking-news-body" data-breaking-timeout="4000" data-breaking-autostart="true">
		<div class="ot-breaking-news-controls">
			<button class="right" data-break-dir="right"><i class="fa fa-angle-right"></i></button>
			<button class="right" data-break-dir="left"><i class="fa fa-angle-left"></i></button>
			<strong><i class="fa fa-bar-chart"></i>Khuyễn mãi</strong>
		</div>
		<div class="ot-breaking-news-content">
			<div class="ot-breaking-news-content-wrap">
			<?php $__currentLoopData = $khuyenmai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_km): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="item">
					<strong><a href="<?php echo e(url('/chi-tiet/'.$item_km->slug)); ?>"><?php echo e($item_km->newsname); ?></a></strong>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	<!-- END .ot-breaking-news-body -->
	</div>
		<div class="content-block has-sidebar">
			<!-- BEGIN .content-block-single -->
			<div class="content-block-single">
				<!-- BEGIN .content-panel -->
				<div class="content-panel">
					<div class="content-panel-title">
						<h2><span style="color: #8EC91D;"><?php echo e($cat_name); ?></span></h2>
					</div>
					<div class="content-panel-body article-list">
						<?php if($news_cat->count()>0): ?>
							<?php $__currentLoopData = $news_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="item" data-color-top-slider="#8EC91D">
									<div class="item-header">
										<a href="<?php echo e(url('/chi-tiet/'.$item->slug)); ?>">
											<span class="comment-tag"><i class="fa fa-comment-o"></i><span class="fb-comments-count" data-href="<?php echo e(url('chi-tiet/'.$item->slug)); ?>"></span><i></i></span>
											<span class="read-more-wrapper"><span class="read-more">Xem chi tiết +<i></i></span></span>
											<img src="<?php echo e(url('public/img/news/'.$item->newimg)); ?>" alt="No images" />
										</a>
									</div>
									<div class="item-content">
										<h3><a href="<?php echo e(url('/chi-tiet/'.$item->slug)); ?>"><?php echo e($item->newsname); ?></a></h3>
										<span class="item-meta">
											<a href="#comments"><i class="fa fa-comment-o"></i><span class="fb-comments-count" data-href="<?php echo e(url('chi-tiet/'.$item->slug)); ?>"></span> Bình luận</a>
											<a href="#"><i class="fa fa-clock-o"></i><?php echo e($item->created_at); ?></a>
										</span>
										<p><?php echo $item->newintro; ?></p>
									</div>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
							<h3>Nội dung đang được cập nhật....</h3>
						<?php endif; ?>
					</div>
				<!-- END .content-panel -->
				</div>
				

			<!-- END .content-block-single -->
			</div>

			<?php echo $__env->make('home.sitebar_right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
		

	<!-- END .wrapper -->
	</div>
<!--popup -->
	<div class="modal fade" id="modal_popup">
		<div class="modal-dialog" style="margin-top: 10%; background-color: #00918e; border-radius: 5px;">
			<div class="modal-content" style="background-color: #00918e; border-radius: 5px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: red;">&times;</button>
					<h4 class="modal-title" style="color: #fff;">Cách Đăng Ký Gói Cước</h4>
				</div>
				<div class="modal-body">
					<div id="content_modal" style="color:#fff ; font-size: 20px; font-weight: 800;">
						
					</div>
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>

<!--end popup -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>