<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" href="<?php echo e(asset('public/favicon.ico')); ?>">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <link href="<?php echo e(asset('public/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet"> 
    <link href="<?php echo e(asset('public/bootstrap/metisMenu/metisMenu.min.css')); ?>" rel="stylesheet">  
        <!-- DataTables CSS -->
    <link href="<?php echo e(asset('public/bootstrap/datatables-plugins/dataTables.bootstrap.css')); ?>" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo e(asset('public/bootstrap/datatables-responsive/dataTables.responsive.css')); ?>" rel="stylesheet"> 
    <link href="<?php echo e(asset('public/bootstrap/selector/css/select2.min.css')); ?>" rel="stylesheet"> 
    <link href="<?php echo e(asset('public/bootstrap/css/sb-admin-2.css')); ?>" rel="stylesheet"> 
    <link href="<?php echo e(asset('public/css/page.css')); ?>" rel="stylesheet"> 
    <link href="<?php echo e(asset('public/bootstrap/css/font-awesome.css')); ?>" rel="stylesheet"> 
    <script src="<?php echo e(asset('public/bootstrap/js/jquery.js')); ?>"></script>

    <!-- ckeditor -->
    <script src="<?php echo e(url('public/editor/ckeditor/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(url('public/editor/ckfinder/ckfinder.js')); ?>"></script>
    <script type="text/javascript">
        var baseURL="<?php echo url('/'); ?>";        
    </script>
    <script src="<?php echo e(url('public/editor/func_ckfinder.js')); ?>"></script>
    <!-- endckeditor -->

</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top navbar-fixed-top" role="navigation" style="margin-bottom: 0 ;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo e(url('/admin')); ?>">Tin tức mới | Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i><?php echo e(Session::get('locale')); ?></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <?php $__currentLoopData = $admin_lang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="col-xs-12 nn_select_lang" name="nnlocation" idlang="<?php echo e($lang->id); ?>">
                                <input type="radio" name="nnlang" id="nn-lang-1" value="<?php echo e($lang->id); ?>" <?php if($lang->id == Session('idlocale')): ?> checked <?php endif; ?> > <?php echo e($lang->name); ?>

                                <img src="<?php echo e(asset('public/img/lang/'.$lang->img)); ?>" class="img-thumnail nn-img-lang-top">
                            </div>
                            <hr>
                        </li>
                        <li class="divider"></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <?php if(Auth::check()): ?>
                            <li><a href="#"><i class="fa fa-user fa-fw"></i><?php echo e(Auth::user()->fullname); ?></a>
                            </li>
                            <li data-toggle="modal" data-target=".nn-modal-change-pass"><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo url('admin/auth/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i>  <?php echo e(trans('translate.Logout')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="nn-navbar-left navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo e(url('/admin')); ?>"><i class="fa fa-dashboard fa-fw"></i> <?php echo e(trans('translate.Dashboard')); ?></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cogs fa-fw"></i> <?php echo e(trans('translate.Setting')); ?><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                <li>
                                    <a href="<?php echo e(url('/admin/lang/list')); ?>"><i class="fa fa-globe fa-fw"></i> <?php echo e(trans('translate.language')); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/admin/socical/list')); ?>"><i class="fa fa-share-alt-square fa-fw"></i> <?php echo e(trans('translate.socical')); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/admin/contact')); ?>"><i class="fa fa-exclamation-circle fa-fw"></i> <?php echo e(trans('translate.info')); ?></a>
                                </li>
                            </ul>  
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-address-card-o fa-fw"></i> Bạn đọc<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo url('/admin/customers/listgr'); ?>"><i class="fa fa-tags fa-fw"></i> Nhóm</a>
                                </li>
                                <li>
                                    <a href="<?php echo url('/admin/customers/list'); ?>"><i class="fa  fa-address-book fa-fw"></i> Người đọc</a>
                                </li>
                                <li>
                                    <a href="<?php echo url('/admin/customers/feedback'); ?>"><i class="fa  fa-comment fa-fw"></i> Ý kiến bạn đọc</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> <?php echo e(trans('translate.News')); ?><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo url('/admin/modnews/list'); ?>"><i class="fa fa-retweet fa-fw"></i> <?php echo e(trans('translate.modNews')); ?></a>
                                </li>                                
                                <li>
                                    <a href="<?php echo url('/admin/listnews/list'); ?>"><i class="fa fa-bars fa-fw"></i> <?php echo e(trans('translate.cateNews')); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo url('/admin/news/list'); ?>"><i class="fa fa-newspaper-o fa-fw"></i> <?php echo e(trans('translate.News')); ?></a>
                                </li>
                            </ul>  
                        </li>                           
                        <li>
                            <a href="<?php echo e(url('/admin/slide/list')); ?>"><i class="fa fa-picture-o fa-fw"></i> Slide show</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/admin/advert/list')); ?>"><i class="fa fa-bullhorn fa-fw"></i><?php echo e(trans('translate.advert')); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/admin/user/listuser')); ?>"><i class="fa fa-users fa-fw"></i> <?php echo e(trans('translate.member')); ?></a>
                        </li>                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<!-- content -->
    <?php echo $__env->yieldContent('content'); ?>

<div class="modal fade nn-modal-change-pass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <!-- Modal content-->
    <div class="modal-content modal-dialog">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Đổi Mật Khẩu</h4>
      </div>
      <form class="form-horizontal" method="post" action="<?php echo e(url('admin/auth/changepass')); ?>" enctype="multipart/form-data">        
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
          <div class="modal-body">
            <div class="row">
        <?php if(count($errors)>0): ?>
            <div class="alert-tb alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <i class="fa fa-exclamation-circle"></i> <?php echo e($err); ?><br/>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>       
                <div class="col-xs-12" style="padding: 20px 40px;">        
                    <div class="form-group ">
                        <input type="password" class="form-control" name="nnpasswordold" placeholder="Mật khẩu hiện tại" tabindex="2" />
                    </div>
                    <div class="form-group ">
                        <input type="password" class="form-control" name="nnpasswordnew" placeholder="Mật khẩu mới" tabindex="2" />
                    </div>
                    <div class="form-group ">
                        <input type="password" class="form-control" name="nnrepasswordnew" placeholder="Nhập lại mật khẩu mới" tabindex="2" />
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng cửa sổ</button>
            <button type="submit" class="btn btn-info">Đổi mật khẩu</button>
          </div>
      </form>
    </div>
</div>
    <!-- end modal -->
    

</body>
    <script src="<?php echo e(asset('public/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/bootstrap/metisMenu/metisMenu.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/bootstrap/datatables/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/bootstrap/datatables-plugins/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/bootstrap/datatables-responsive/dataTables.responsive.js')); ?>"></script>
    <script src="<?php echo e(asset('public/bootstrap/selector/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/bootstrap/selector/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('public/bootstrap/js/sb-admin-2.js')); ?>"></script>
    <?php echo $__env->yieldContent('script'); ?>
    <script src="<?php echo e(asset('public/js/page.js')); ?>"></script>    
    <script type="text/javascript">
        $(document).ready(function() {
            $(".nn_select_lang").click(function(){
                var idlang= $(this).attr('idlang');
                if (idlang ==1) {
                    alert('Đã đổi thành công ngôn ngữ thành Việt Nam');
                } else {
                    alert('Successfully changed language into English');
                }
                $.get("<?php echo e(url('')); ?>/setlocale/"+idlang,function(data){
                    location.reload();
                });
            });
        });
        <?php if(session('actionuser')=='change' && count($errors) > 0): ?>
            $('.nn-modal-change-pass').modal('show');
        <?php endif; ?>
    </script>
</html>
