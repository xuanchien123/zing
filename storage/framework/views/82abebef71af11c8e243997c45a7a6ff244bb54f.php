<?php $__env->startSection('title', (!empty($contact)?$contact->seo_title:"")); ?>
<?php $__env->startSection('seo_keyword', (!empty($contact)?$contact->seo_keyword:"")); ?>
<?php $__env->startSection('seo_description', (!empty($contact)?$contact->seo_description:"")); ?>
<?php $__env->startSection('seo_image', (!empty($contact)?asset($contact->seo_image):"")); ?>
<?php $__env->startSection('seo_url', url()->current()); ?>
<?php $__env->startSection('content'); ?>
<!-- BEGIN .wrapper -->
<div class="wrapper">

	<div class="content-block">

		<!-- BEGIN .content-block-single -->
		<div class="content-block-single">
			
			<!-- BEGIN .content-panel -->
			<div class="content-panel">
				<div class="content-panel-body big-message">

					<div class="big-message-inner">
						<i class="fa fa-file-text-o"></i>
						<h1>Page not found</h1>
						<h2>Error 404</h2>
						<p>Trang bạn đang cố truy cập hiện không được tìm thấy. </p>
						<a href="<?php echo e(url('/')); ?>" class="back-button"><i class="fa fa-home"></i>Về trang chủ</a>
					</div>

				</div>
			<!-- END .content-panel -->
			</div>

		<!-- END .content-block-single -->
		</div>

	</div>
	

<!-- END .wrapper -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>