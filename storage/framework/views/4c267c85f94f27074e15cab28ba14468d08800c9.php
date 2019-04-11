<?php $__env->startSection('title','Maketing'); ?>
<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Maketing</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                <?php if(session('thongbao')): ?>
                    <div class="alert-tb alert alert-success">
                        <span class="fa fa-check"> </span> <?php echo e(session('thongbao')); ?>

                    </div>
                <?php endif; ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-maketing" id="nn-add-maketing">+ Thêm chiến dịch</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Tên chiến dịch</th>
                                        <th>Ngày thực hiện</th>
                                        <th>Nhân viên</th>
                                        <th>Nhóm khách hàng</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $maket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($mk->title); ?></td>
                                        <td><?php echo e($mk->created_at); ?></td>
                                        <td><?php echo e($mk->username); ?></td>
                                        <td><?php echo e($mk->customer); ?></td>
                                        <td><span content="<?php echo e($mk->content); ?>" title="<?php echo e($mk->title); ?>" class="btn btn-info view_maketting"><i class="fa fa-calendar"></i> Chi tiết</span></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
</div>
<!-- model -->

<div class="modal fade nn-modal-add-maketing" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Thêm chiến dịch</h4>
          </div>
        <form class="form-horizontal" method="post" action="sendmail" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
        
          <div class="modal-body">
            <div class="row">
                <div class="col-xs-12"> 
                <?php if(count($errors)>0): ?>
                    <div class="alert-tb alert alert-danger">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <i class="fa fa-exclamation-circle"></i> <?php echo e($err); ?><br/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?> 
                    <div class="form-group">
                        <label for="nntitlemaketing" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Tiêu đề:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="nntitlemaketing" name="nntitlemaketing" placeholder="Tiêu đề mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nncontentmaketing" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Nội dung mail:</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" rows="7" id="nncontentmaketing" name="nncontentmaketing"></textarea>
                          <script type="text/javascript">ckeditor("nncontentmaketing") </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnnamecustomer" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Gửi đến:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="nnnamecustomer" id="nnnamecustomer">
                                <option value="0"><?php echo e(trans('translate.allcustomer')); ?></option>
                                <?php $__currentLoopData = $grcus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($gr->id); ?>"><?php echo e($gr->listname); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng cửa sổ</button>
            <button type="submit" class="btn btn-primary" id="nnstartmaket">Khởi chạy chiến dịch</button>
          </div>
        </form>
        </div>
      </div>
    </div>
</div>


<div class="modal fade nn-modal-view-maketing" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Xem chiến dịch</h4>
          </div>
        <form class="form-horizontal">
          <div class="modal-body">
            <div class="row">
                <div class="col-xs-12"> 
                    <div class="form-group">
                        <label for="enntitlemaketing" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Tiêu đề:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="enntitlemaketing" name="enntitlemaketing" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="enncontentmaketing" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Nội dung mail:</label>
                        <div class="col-sm-9" id="contentmail">
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng cửa sổ</button>
          </div>
        </form>
        </div>
      </div>
    </div>
</div>

    <!-- end modal -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/js/admin/maketting.js')); ?>"></script>
<script type="text/javascript">
    <?php if(session('actionuser')=='add' && count($errors) > 0): ?>
        $('.nn-modal-add-maketing').modal('show');
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>