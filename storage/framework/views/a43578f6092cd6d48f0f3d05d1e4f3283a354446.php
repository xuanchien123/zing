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
			<strong><i class="fa fa-bar-chart"></i>Tin mới</strong>
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
					<div class="content-panel-body article-header">
						<strong class="category-link">
						<?php if($itemnews->idlistnew !=""): ?>
							Danh mục : <a href="<?php echo e(url('loai-tin/'.$itemnews->list_name($itemnews->idlistnew)['slug'])); ?>"><?php echo e($itemnews->list_name($itemnews->idlistnew)['listname']); ?></a>
						<?php elseif($itemnews->idmodnew !=""): ?>
							Danh mục : <a href="<?php echo e(url('loai-tin/'.$itemnews->mod_name($itemnews->idmodnew)['slug'])); ?>"><?php echo e($itemnews->mod_name($itemnews->idmodnew)['modname']); ?></a>
						<?php endif; ?>
						</strong>
						<h2><?php echo e($itemnews->newsname); ?></h2>
						<div class="article-meta">
							<a href="#" class="meta-item"><?php echo e($itemnews->newuser); ?></a>
							<a href="#" class="meta-item"><?php echo e($itemnews->created_at); ?></a>							
							<a href="#comments" class="meta-item"><span class="fb-comments-count" data-href="<?php echo e(url()->current()); ?>"></span> Bình Luận</a>
							<a href="#" title="" class="meta-item"><?php echo e($itemnews->view_count); ?> Lượt xem</a>
							<?php if($itemnews->dangky !=""): ?>
							<a class="btn btn-danger" id="btn_dangky" title="Cách đăng ký" data-toggle="modal" href='#modal_popup'>Đăng Ký</a>
							<?php endif; ?>
						</div>
					</div>
					<div class="content-panel-body shortcode-content">
						<?php echo $itemnews->newintro; ?>

					</div>
				<!-- END .content-panel -->
				</div>
				
				<!-- BEGIN .content-panel -->
				<div class="content-panel">
					<div class="content_news">
						<div class="share_news">
							<div class="fb-share-button" 
							    data-href="<?php echo e(url()->current()); ?>" 
							    data-mobile_iframe="true"
							    data-layout="button">
							 </div> <hr style="margin: 5px;">
							 <!-- Đặt thẻ này vào nơi bạn muốn nút chia sẻ kết xuất. -->
						<div class="g-plus" data-action="share" data-annotation="bubble" data-height="24" data-href="<?php echo e(url()->current()); ?>"></div>
						</div>
						<?php echo $itemnews->newcontent; ?>

					</div>
					
					<div class="text-center">
						<?php if($itemnews->dangky !=""): ?>
							<a class="btn btn-danger" id="btn_dangky" title="Cách đăng ký" data-toggle="modal" href='#modal_popup'>Đăng Ký Ngay</a>
						<?php endif; ?>
					</div>
				<!-- END .content-panel -->
				</div>
				<hr>
				<!-- BEGIN .content-panel -->
				<div class="content-panel">
					<div class="content-panel-body article-main-share" style="line-height: 7px;">
						<span class="share-front"><i class="fa fa-share-alt"></i>Share</span>
						<div class="fb-share-button" 
						    data-href="<?php echo e(url()->current()); ?>" 
						    data-layout="button_count">
						  </div>	
						  <div class="g-plus" data-action="share" data-annotation="bubble" data-height="24" data-href="<?php echo e(url()->current()); ?>"></div>					
					</div>
				<!-- END .content-panel -->
				</div>
				
				<!-- BEGIN .content-panel -->
				<div class="content-panel">
					<div class="content-panel-body article-main-tags">
						<span class="tags-front"><i class="fa fa-tags"></i>Tags</span>
					<?php 
						if($itemnews->newtag !=""){
							$tags = explode(", ", $itemnews->newtag);
						}
					?>
					<?php if(!empty($tags)): ?>
						<?php for($count=0; $count < count($tags);$count ++ ): ?>
							<a href="<?php echo e(url('/tags/'.$tags[$count])); ?>"><?php echo e($tags[$count]); ?></a>
						<?php endfor; ?>
					<?php endif; ?>
					</div>
				<!-- END .content-panel -->
				</div>
				
				<!-- BEGIN .content-panel -->
				<div class="content-panel">
					<div class="content-panel-body do-space">
						<a href="<?php echo e($adverts_main[0]->link); ?>" target="_blank">
							<img src="<?php echo e(url('public/img/images_bn/'.$adverts_main[0]->img)); ?>" alt="No image" width="100%" style="object-fit: contain; max-height: 150px; display: block;overflow:hidden; margin-bottom: 20px;" />
						</a>
					</div>
				<!-- END .content-panel -->
				</div>
				<!-- BEGIN .content-panel -->
				<div class="content-panel">
					<div class="content-panel-title">
						<h2> Ý kiến của bạn</h2>
					</div>
					<div class="content-panel-body comment-list">						
						<div class="fb-comments" data-href="<?php echo e(url()->current()); ?>" data-width="100%" data-numposts="5"></div>
					</div>
				<!-- END .content-panel -->
				</div>
				<!-- BEGIN .content-panel -->
			<?php if($new_in_list_active->count()>0): ?>
				<div class="content-panel widget">
					<div class="content-panel-title">						
						<h2>Đọc tiếp</h2>
					</div>
					<!-- BEGIN .top-slider-body -->
					<div class="top-slider-body" data-top-slider-timeout="6000" data-top-slider-autostart="false">
						<div class="widget-article-list">
						<?php $__currentLoopData = $new_in_list_active; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-6">
							<div class="item">
								<div class="item-header">
									<a href="<?php echo e(url('chi-tiet/'.$item_lt->slug)); ?>">
										<img src="<?php echo e(url('/public/img/news/100x100/'.$item_lt->newimg)); ?>" alt="no img" width="50" /></a>
								</div>
								<div class="item-content">
									<h4><a href="<?php echo e(url('chi-tiet/'.$item_lt->slug)); ?>"><?php echo e($item_lt->newsname); ?></a></h4>
									<span class="item-meta">
										<a href="#"><i class="fa fa-clock-o"></i><?php echo e($item_lt->created_at); ?></a>
									</span>
								</div>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					</div>
				<!-- END .content-panel -->
				</div>
			<?php endif; ?>
			<!-- END .content-block-single -->
			</div>

			<!-- BEGIN .sidebar -->
			<aside class="sidebar sticky_column">
				<?php echo $__env->make('home.sitebar_right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<!-- END .sidebar -->
			</aside>
		</div>
		

	<!-- END .wrapper -->
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>