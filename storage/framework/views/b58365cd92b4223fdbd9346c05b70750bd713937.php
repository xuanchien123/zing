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
				<!-- BEGIN .content-panel -->
				<div class="content-panel">
					<div class="content-panel-title">						
						<ul class="sub_menu">
							<li class="active"><a href="<?php echo e(url('loai-tin/'.$modnew->slug)); ?>"><?php echo e($modnew->modname); ?></a></li>
							<?php $__currentLoopData = $modnew->listnew_inmod($modnew->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat_mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li>
									<a href="<?php echo e(url('loai-tin/'.$cat_mod->slug)); ?>"><?php echo e($cat_mod->listname); ?></a>
								</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
					<?php 
						$item = $modnew->top_news_item($modnew->id);
						$hot = $item->shift();								
					 ?>
					<div class="row">
						<div class="hidden-xs col-md-7 nopadding">
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
								<a href="<?php echo e(url('/chi-tiet/'.$hot->slug)); ?>" title="<?php echo e($hot->newsname); ?>">
									<img class="img-responsive" src="<?php echo e(url('public/img/news/300x300/'.$hot->newimg)); ?>" alt="<?php echo e($hot->newimg); ?>">
								</a>
							</div>
							<div class="mobile_title">
								<a href="<?php echo e(url('/chi-tiet/'.$hot->slug)); ?>" title="<?php echo e($hot->newsname); ?>"><h1><?php echo e($hot->newsname); ?></h1></a>
							</div>
						</div>
						<?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="visible-xs col-xs-6 padding4">
							<div class="mobile_img">
								<a href="<?php echo e(url('/chi-tiet/'.$m_item->slug)); ?>" title="<?php echo e($m_item->newsname); ?>"><img class="img-responsive" src="<?php echo e(url('public/img/news/300x300/'.$m_item['newimg'])); ?>" alt=""></a>
							</div>
							<div class="mobile_title">
								<a href="<?php echo e(url('/chi-tiet/'.$m_item->slug)); ?>" title="<?php echo e($m_item->newsname); ?>"><h1><?php echo e($m_item->newsname); ?></h1></a>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>								
				</div>
				<!-- END .content-panel -->	
			
				<!-- BEGIN .content-panel -->
				<div class="content-panel">
					<div class="content-panel-title">						
						<ul class="sub_menu">
							<li class="active"><a>Tin mới trong mục</a></li>
						</ul>
					</div>
					<div class="row" id="content_pro">					
						<?php echo $__env->make('home.content_news_ajax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
						<div class="hidden-xs col-md-3 nopadding sticky_column">
							<div class="row">
								<div class="col-md-12">
									<?php if($adverts_center[0]->code != ""): ?>
										<?php echo e($adverts_center[0]->code); ?>

									<?php else: ?>
									<a href="<?php echo e($adverts_center[0]->link); ?>" target="_blank">
										<img src="<?php echo e(url('public/img/images_bn/'.$adverts_center[0]->img)); ?>" alt="No image" width="100%" style="object-fit: contain;" />
									</a>
									<?php endif; ?>
								</div>
							</div>
						</div>			
					</div>								
				</div>
				<!-- END .content-panel -->
				<div class="ajax-load text-center" style="display:none;z-index: 10000; opacity: 1;">
			        <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Đang tải</p>
			    </div>
			     <div class="text-center" <?php if($total <=10): ?> style="display: none;" <?php endif; ?>>
                     <a class="btn btn-default btn-more-info" id="load_more" base_url="<?php echo e(url('')); ?>" modid="<?php echo e($modnew->id); ?>" skip="10" take="5" total="<?php echo e($total); ?>"  role="button">
                    	<i class="fa fa-refresh" aria-hidden="true"></i> Xem thêm
                	</a>
                </div>
			</div>
			<!-- END .content-block-single -->
			<!-- BEGIN .sidebar -->
			<aside class="sidebar sticky_column ">
				<?php echo $__env->make('home.sitebar_right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			<!-- END .sidebar -->
			</aside>
		</div>
		<!-- BEGIN .content-panel -->
		<div class="content-panel">
			<div class="content-panel-body do-space">
				<?php if($adverts_main[0]->code != ""): ?>
					<?php echo e($adverts_main[0]->code); ?>

				<?php else: ?>
				<a href="<?php echo e($adverts_main[0]->link); ?>" target="_blank">
					<img src="<?php echo e(url('public/img/images_bn/'.$adverts_main[0]->img)); ?>" alt="No image" width="100%" style="object-fit: contain; max-height: 150px; display: block;overflow:hidden; margin-bottom: 20px;" />
				</a>
				<?php endif; ?>
			</div>
		<!-- END .content-panel -->
		</div>

	<!-- END .wrapper -->
	</div>
	<script type="text/javascript">
		$("#load_more").click(function(e){
	      e.preventDefault()
	      base_url = $(this).attr('base_url');
	      modid = $(this).attr('modid');
	      skip = $(this).attr('skip');
	      take = $(this).attr('take');
	      total = $(this).attr('total');
	      $.ajax(
	            {
	                url: base_url+'/loadmoremod',
	                type: 'GET',
		        	data: {
		        		"modid" : modid,
		        		"skip" : skip,
		        		"take" : take,
		        	},
	                beforeSend: function()
	                {
	                    $('.ajax-load').show();
	                }
	            })
	            .done(function(data)
	            {
	                if(data.html == " "){
	                    $('.ajax-load').html("Không có kết quả nào !");
	                    return;
	                }
	                $('.ajax-load').hide();
	                $("#content_pro").append(data); 
	                $('#load_more').attr('skip', parseInt(skip) +5); 
	                skip = $('#load_more').attr('skip');
	
	                if (parseInt(skip) >= parseInt(total)) {
	                	$('#load_more').css('display', 'none');
	                }
	                // console.log(data);
	                                                 
	            })
	            .fail(function(jqXHR, ajaxOptions, thrownError)
	            {
	                  alert('server not responding...');
	            });
	    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>