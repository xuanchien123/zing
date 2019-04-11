<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" href="<?php echo e(asset('public/favicon.ico')); ?>">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <link href="<?php echo e(asset('public/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet"> 
    <link href="<?php echo e(asset('public/css/login.css')); ?>" rel="stylesheet"> 
    <link href="<?php echo e(asset('public/bootstrap/css/font-awesome.css')); ?>" rel="stylesheet"> 
    <script src="<?php echo e(asset('public/bootstrap/js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/login.js')); ?>"></script>


</head>

<body>
	<div class="login-body">
	    <article class="container-login center-block">
			<section>
				<ul id="top-bar" class="nav nav-tabs nav-justified">
					<li class="active"><a href="#login-access" style="color: #">CỔNG THÔNG TIN ĐIỆN TỬ</a></li>
				</ul>
				<div class="tab-content tabs-login col-lg-12 col-md-12 col-sm-12 cols-xs-12">
					<div id="login-access" class="tab-pane fade active in">
						<h2 style="margin-top: 0px;"><i class="glyphicon glyphicon-log-in"></i> Đăng nhập</h2>						
						<form method="POST" accept-charset="utf-8" autocomplete="off" role="form" class="form-horizontal" action="login">
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
							<div class="form-group ">
								<input type="email" class="form-control" name="username" placeholder="Nhập Email" tabindex="1" value="" />
							</div>
							<div class="form-group ">
								<input type="password" class="form-control" name="nnpassword" placeholder="Nhập mật khẩu" tabindex="2" />
							</div>
							<div class="checkbox">
									<label class="control-label" for="remember_me">
										<input type="checkbox" name="remember_me" id="nn-remember-pass" value="1" class="" tabindex="3" /> Nhớ mật khẩu
									</label>
							</div>
							<br/>
							<div class="form-group ">				
									<button type="submit" name="nn-login-sm" id="nn-submit" tabindex="5" class="btn btn-lg btn-primary">Đăng nhập</button>
							</div>
						</form>	
						<?php if(count($errors) >0): ?>
						<div class="alert-tb alert alert-danger">
							<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php echo e($err); ?><br/>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						<?php endif; ?>
						<?php if(session('thongbao')): ?>
						<div class="alert-tb alert alert-warning">
								<?php echo e(session('thongbao')); ?>

						</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
		</article>
	</div>
</body>