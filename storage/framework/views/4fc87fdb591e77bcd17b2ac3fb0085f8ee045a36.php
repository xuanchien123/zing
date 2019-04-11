<?php $__env->startSection('title','admin'); ?>
<?php $__env->startSection('content'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo e(trans('translate.Dashboard')); ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-calendar  fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo e($news); ?></div>
                            <div>Bản tin</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo e(url('/admin/news/list')); ?>">
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo e(trans('translate.viewall')); ?>!</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-address-card fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo e($news_count); ?></div>
                            <div>Tổng lượt xem</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo e(url('/admin/news/list')); ?>">
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo e(trans('translate.viewall')); ?>!</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-microchip fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo e($ads); ?></div>
                            <div>Số quảng cáo</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo e(url('/admin/advert/list')); ?>">
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo e(trans('translate.viewall')); ?>!</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
<!-- /#page-wrapper -->
<hr>
    <div class="row">  
        <div class="col-sm-4 alert alert-danger">
            <h4><?php echo e(trans('admin.visit')); ?></h4>
            <p> 
                <?php echo e(trans('admin.online')); ?>: <?php echo e($online); ?> <br>
                <?php echo e(trans('admin.today')); ?>: <?php echo e($day); ?> <br>
                <?php echo e(trans('admin.yesterday')); ?>: <?php echo e($yesterday); ?> <br>
                <?php echo e(trans('admin.this_week')); ?>: <?php echo e($week); ?> <br>
                <?php echo e(trans('admin.last_week')); ?>: <?php echo e($lastweek); ?> <br>
                <?php echo e(trans('admin.this_month')); ?>: <?php echo e($month); ?> <br>
                <?php echo e(trans('admin.this_year')); ?>: <?php echo e($year); ?> <br>
                <?php echo e(trans('admin.times')); ?>: <?php echo e($visit); ?>

            </p>
        </div>
    </div>
<hr>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>