<?php $__env->startSection('title','info'); ?>
<?php $__env->startSection('content'); ?>
    <!-- /.col-lg-12 -->
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo e(trans('admin.contact')); ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
	<form action="" method="POST" enctype="multipart/form-data">
	    <div class="col-lg-12" style="padding-bottom:120px">
	    	<?php if(session('thongbao')): ?>
	            <div class="alert-tb alert alert-success">
	                <span class="fa fa-check"> </span> <?php echo e(session('thongbao')); ?>

	            </div>
	        <?php endif; ?> 
	        <?php if(count($errors)>0): ?>
                <div class="alert-tb alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <i class="fa fa-exclamation-circle"></i> <?php echo e($err); ?><br/>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>      
	        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />  
	            <div class="form-group">
	                <label><?php echo e(trans('admin.map')); ?></label>
	                <input class="form-control" name="txtMap" placeholder="" value="<?php echo $contact['map']; ?>" />
	            </div>
	            <div class="form-group">
	                <label><?php echo e(trans('admin.name_company')); ?></label>
	                <input class="form-control" name="txtNameCo" placeholder="" value="<?php echo $contact['nameco']; ?>" />
	            </div>
	            <div class="form-group">
	                <label><?php echo e(trans('admin.address_company')); ?></label>
	                <input class="form-control" name="txtAddress" placeholder="" value="<?php echo $contact['address']; ?>" />
	            </div>
	            <div class="form-group">
	                <label><?php echo e(trans('admin.phone')); ?></label>
	                <input class="form-control" name="txtPhone" placeholder="" value="<?php echo $contact['phone']; ?>" />
	            </div>
	            <div class="form-group">
	                <label><?php echo e(trans('admin.email')); ?></label>
	                <input class="form-control" name="txtMail" placeholder="" value="<?php echo $contact['mail']; ?>" />
	            </div>
	            <div class="form-group">
	                <label>Logo</label>
	                <div>
	                    <img id="logo" src="<?php echo e(asset('public/home/'.$contact['logo'])); ?>" alt="..." class="img-thumbnail" style="width: 15%;">
	                    <input type="file" name="logo_img" id="logo_img" onchange="showlogo(this);">
                    </div>
	            </div>
	            <div class="form-group">
	                <label><?php echo e(trans('admin.time_work')); ?></label>
	                <input class="form-control" name="txtTime" placeholder="" value="<?php echo $contact['time']; ?>" />
	            </div> 
	            <div class="form-group">
	                <label>Fanpage Facebook</label>
	                <input class="form-control" name="txtFanpage" placeholder="" value="<?php echo $contact['fanpage']; ?>" />
	            </div> 
	            <div class="form-group">
	                <label><?php echo e(trans('admin.copyright')); ?></label>
	                <input class="form-control" name="txtWebsite" placeholder="" value="<?php echo $contact['website']; ?>" />
	            </div> 
	            <div class="form-group">
	                <label>Slogan</label>
	                <textarea class="form-control" rows="3" name="txtSlogan"><?php echo old('txtSlogan', isset($contact)?$contact['slogan'] : null ); ?></textarea>
	                <script type="text/javascript">ckeditor("txtSlogan") </script>
	            </div>
	            <div class="form-group">
	                <label>Slogan intro</label>
	                <textarea class="form-control" rows="3" name="txtSloganIntro"><?php echo old('txtSloganIntro', isset($contact)?$contact['slogan_intro'] : null ); ?></textarea>
	                <script type="text/javascript">ckeditor("txtSloganIntro") </script>
	            </div>
	            <hr>
	            <h3><?php echo e(trans('admin.info')); ?> Paypal</h3>
	            <div class="form-group">
	                <label>Api Username</label>
	                <input class="form-control" name="api_username" placeholder="" value="<?php echo $contact['api_username']; ?>" />
	            </div> 
	            <div class="form-group">
	                <label>Api Password</label>
	                <input class="form-control" name="api_password" placeholder="" value="<?php echo $contact['api_password']; ?>" />
	            </div> 
	            <div class="form-group">
	                <label>Api Signature</label>
	                <input class="form-control" name="api_signature" placeholder="" value="<?php echo $contact['api_signature']; ?>" />
	            </div> 


	            <hr>
	            <h3><?php echo e(trans('admin.info')); ?> SEO</h3>
	            <div class="form-group">
	                <label>Seo title</label>
	                <input class="form-control" name="seo_title" placeholder="" value="<?php echo $contact['seo_title']; ?>" />
	            </div> 
	            <div class="form-group">
	                <label>Seo Keyword</label>
	                <input class="form-control" name="seo_keyword" placeholder="" value="<?php echo $contact['seo_keyword']; ?>" />
	            </div> 
	            <div class="form-group">
	                <label>Seo Description</label>
	                <input class="form-control" name="seo_description" placeholder="" value="<?php echo $contact['seo_description']; ?>" />
	            </div> 
	            <div class="form-group">
	                <label>Seo Image</label>
	                <div>
	                    <img id="nnseoimage" src="<?php echo e(asset($contact['seo_image'])); ?>" alt="..." class="img-thumbnail" style="width: 50%;">
	                    <input type="file" name="seo_image" id="seo_image" onchange="showimg(this);">
                    </div>
	            </div> 

	            <hr>
	            <h3><?php echo e(trans('admin.info')); ?> SEO</h3>
	            <div class="form-group">
	                <label>Facebook APP ID</label>
	                <input class="form-control" name="fb_app_id" placeholder="" value="<?php echo $contact['fb_app_id']; ?>" />
	            </div> 
	            <div class="form-group">
	                <label>Google Analyst</label>
	                <textarea class="form-control" name="google_analyst"><?php echo $contact['google_analyst']; ?></textarea>
	            </div> 

	            <button type="submit" class="btn btn-info"><?php echo e(trans('translate.update')); ?></button> 
	        
	    </div>
	</form>
</div>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('script'); ?> 
  <script type="text/javascript">

  function showimg(input) { 
  	if (input.files && input.files[0]) { 
	    var reader = new FileReader();
	    reader.onload = function (e) {
	      $('#nnseoimage')
	        .attr('src', e.target.result);
	    };
	    reader.readAsDataURL(input.files[0]);
	  }
	} 
	// logo
	function showlogo(input) { 
  	if (input.files && input.files[0]) { 
	    var reader = new FileReader();
	    reader.onload = function (e) {
	      $('#logo')
	        .attr('src', e.target.result);
	    };
	    reader.readAsDataURL(input.files[0]);
	  }
	}
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>