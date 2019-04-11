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
				<strong><i class="fa fa-bar-chart"></i>Tin mới	</strong>
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
			<?php $index_count = 0; $ads = 0;?>
			<?php $__currentLoopData = $modnews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index_mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>		
				<!-- BEGIN .content-panel -->
				<div class="content-panel">
					<div class="content-panel-title">						
						<ul class="sub_menu">
							<li class="active"><a href="<?php echo e(url('loai-tin/'.$index_mod->slug)); ?>"><?php echo e($index_mod->modname); ?></a></li>
							<?php $__currentLoopData = $index_mod->listnews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
							<li><a href="<?php echo e(url('/loai-tin/'.$itemlist->slug)); ?>" title="<?php echo e($itemlist->listname); ?>"><?php echo e($itemlist->listname); ?></a></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
					<?php 
						$item = $index_mod->news_in_mod($index_mod->id);
						$hot = $item->shift();								
					 ?>
					<div class="row">
						<div class="hidden-xs col-md-7 nopadding">
							<div class="content-panel-body article-list">							
								<div class="item" data-color-top-slider="#867eef">
									<div class="item-header">
										<a href="<?php echo e(url('chi-tiet/'.$hot['slug'])); ?>">
											<span class="comment-tag"><i class="fa fa-comment-o"></i><span class="fb-comments-count" data-href="<?php echo e(url('chi-tiet/'.$hot['slug'])); ?>"></span><i></i></span>
											<span class="read-more-wrapper"><span class="read-more">Đọc thêm +<i></i></span></span>
											<img src="<?php echo e(url('public/img/news/300x300/'.$hot['newimg'])); ?>" alt="No image" />
										</a>
									</div>
									<div class="item-content">
										<h3><a href="<?php echo e(url('chi-tiet/'.$hot['slug'])); ?>"><?php echo e($hot['newsname']); ?></a></h3>
										<p><?php echo $hot['newintro']; ?></p>	
									</div>
								</div>
							</div>
						</div>
						<div class="hidden-xs col-md-5 nopadding">
							<div class="content-panel-body article-list">
								<ul>
									<?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li>
										<a href="<?php echo e(url('/chi-tiet/'.$news->slug)); ?>" title="<?php echo e($news->newsname); ?>"><b class="fa fa-angle-right" aria-hidden="true"></b> <b><?php echo e($news->newsname); ?></b> </a>
									</li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							</div>
						</div>
						<div class="visible-xs col-xs-12">
							<div class="mobile_hot_img">
								<a href="<?php echo e(url('/chi-tiet/'.$hot->slug)); ?>" title="<?php echo e($hot->newsname); ?>"><img class="img-responsive" src="<?php echo e(url('public/img/news/300x300/'.$hot['newimg'])); ?>" alt="<?php echo e($hot['newimg']); ?>"></a>
							</div>
							<div class="mobile_title">
								<a href="<?php echo e(url('/chi-tiet/'.$hot->slug)); ?>" title="<?php echo e($hot->newsname); ?>"><h1><?php echo e($hot->newsname); ?></h1></a>
							</div>
						</div>
						<?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="visible-xs col-xs-6 padding4 mobile_item">
							<div class="mobile_img">
								<a href="<?php echo e(url('/chi-tiet/'.$m_item->slug)); ?>" title="<?php echo e($m_item->newsname); ?>"><img class="img-responsive" src="<?php echo e(url('public/img/news/300x300/'.$m_item['newimg'])); ?>" alt=""></a>
							</div>
							<div class="mobile_title">
								<a href="<?php echo e(url('/chi-tiet/'.$m_item->slug)); ?>" title="<?php echo e($m_item->newsname); ?>"><h1><?php echo e($m_item->newsname); ?></h1></a>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>								
					
				<?php if($index_count == 4): ?>
					<div class="content-panel">
						<div class="content-panel-body do-space">
						<?php if($adverts_main[$ads]->code != ""): ?>
							<?php echo e($adverts_main[$ads]->code); ?>

						<?php else: ?>
							<a href="<?php echo e($adverts_main[$ads]->link); ?>" target="_blank">
								<img src="<?php echo e(url('public/img/images_bn/'.$adverts_main[$ads]->img)); ?>" alt="No image" width="100%" style="object-fit: contain; max-height: 150px; display: block;overflow:hidden; margin-bottom: 20px;" />
							</a>
						<?php endif; ?>
						</div>
					<?php $ads = $ads +1; ?>
					<!-- END .content-panel -->
					</div>
				<?php endif; ?>
				</div>
				<?php $index_count = $index_count +1; ?>
				<!-- END .content-panel -->
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				
			</div>
			<!-- END .content-block-single -->
			<!-- BEGIN .sidebar -->
			<aside class="sidebar sticky_column">
				<?php echo $__env->make('home.sitebar_right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<!-- END .sidebar -->
			</aside>
		</div>
		<!-- BEGIN .content-panel -->
		<div class="content-panel">
			<div class="content-panel-body do-space">
				<?php if($adverts_main[$ads]->code != ""): ?>
					<?php echo e($adverts_main[$ads]->code); ?>

				<?php else: ?>
				<a href="<?php echo e($adverts_main[$ads]->link); ?>" target="_blank">
					<img src="<?php echo e(url('public/img/images_bn/'.$adverts_main[$ads]->img)); ?>" alt="No image" width="100%" style="object-fit: contain; max-height: 150px; display: block;overflow:hidden; margin-bottom: 20px;" />
				</a>
				<?php endif; ?>
			</div>
		<!-- END .content-panel -->
		</div>

	<!-- END .wrapper -->
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>