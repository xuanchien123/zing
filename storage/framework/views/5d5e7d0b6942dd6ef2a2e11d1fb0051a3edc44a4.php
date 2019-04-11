<?php $__env->startSection('title','Slide show'); ?>
<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Slide show</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-slide" id="nn-add-slide">+ Thêm Slide show</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <?php if(session('thongbao')): ?>
                            <div class="alert-tb alert alert-success">
                                <span class="fa fa-check"> </span> <?php echo e(session('thongbao')); ?>

                            </div>
                        <?php endif; ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr >
                                        <th>Stt</th>
                                        <th>Tiêu đề</th>
                                        <th class="text-center">Ẩn hiện</th>
                                        <th>Hình ảnh</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo e($slide->number); ?></td>
                                        <td><?php echo e($slide->title); ?></td>
                                        <td class="text-center">
                                            <?php if($slide->status ==0): ?>
                                                <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                            <?php else: ?>
                                                 <i class="glyphicon glyphicon-ok" style="color:green;"></i>
                                            <?php endif; ?>
                                        </td>
                                        <td class="center">
                                            <img src="<?php echo e(asset('public/img/slide/'.$slide->img)); ?>" style="width: 55px"> 
                                        </td>
                                        <td><i class="nneditslide btn btn-info fa fa-edit" id="ennslide<?php echo e($slide->id); ?>" editid="<?php echo e($slide->id); ?>" hide="<?php echo e($slide->status); ?>" title="<?php echo e($slide->title); ?>" linknew="<?php echo e($slide->linknew); ?>" linkyou="<?php echo e($slide->linkyoutube); ?>" imgo="<?php echo e($slide->img); ?>" lang="<?php echo e($slide->idlang); ?>" num="<?php echo e($slide->number); ?>"> Sửa</i>
                                            <i class="nndeditslide btn btn-danger fa fa-trash" imgo="<?php echo e($slide->img); ?>" editid="<?php echo e($slide->id); ?>" title="<?php echo e($slide->title); ?>"> Xóa </i>
                                        </td>
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

<div class="modal fade nn-modal-add-slide" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Slide</h4>
          </div>
          <form class="form-horizontal" method="post" action="list" enctype="multipart/form-data">
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
                <div class="col-xs-6">
                 

                    <div class="form-group">
                        <label for="nnlang" class="col-sm-3 control-label"><i class="fa  fa-ravelry"></i> Ngôn ngữ:</label>
                        <div class="col-sm-9">
                            <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="radio-inline">
                                <input type="radio" name="nnlang" id="nn-lang-1" value="<?php echo e($lang->id); ?>" <?php if($lang->id ==1): ?> checked <?php endif; ?> > <?php echo e($lang->name); ?>

                            </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nntitle" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Tiêu đề:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nntitle" id="nntitle" placeholder="Tiêu đề slide">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnlinknew" class="col-sm-3 control-label"><i class="fa  fa-newspaper-o"></i> Link bài viết:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnlinknew" id="nnlinknew" placeholder="Link bài viết">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnyoutube" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> Dùng video:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnyoutube" id="nnyoutube" placeholder="link youtube">
                        </div>
                    </div>
                </div>
                <div class="col-xs-6"> 
                    <div class="form-group">
                        <label for="nnavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> Hình ảnh</label>
                        <div class="col-sm-8">
                            <img id="nnavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                            <input type="file" name="nnavatarfile" id="nnavatarfile" onchange="showimg(this);">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnhide" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> Chế độ:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" value="1" checked> Hiện 
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" value="0"> Ẩn 
                            </label>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="nnnumber" class="col-sm-3 control-label"><i class="fa  fa-sort-numeric-asc"></i> Slide số:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnnumber" id="nnnumber" placeholder="Hiện thị số 3< chỉ điền số>">
                        </div>
                    </div>
                
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng cửa sổ</button>
            <button type="submit" class="btn btn-primary">Tạo mới</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
<div class="modal fade nn-modal-edit-slide" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Sửa Slide</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
          <input type="hidden" name="ennidslide" id="ennidslide" /> 
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
                <div class="col-xs-6">
                 

                    <div class="form-group">
                        <label for="nnlang" class="col-sm-3 control-label"><i class="fa  fa-ravelry"></i> Ngôn ngữ:</label>
                        <div class="col-sm-9">
                            <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="radio-inline">
                                <input type="radio" name="ennlang" id="enn-lang-<?php echo e($lang->id); ?>" value="<?php echo e($lang->id); ?>" <?php if($lang->id ==1): ?> checked <?php endif; ?> > <?php echo e($lang->name); ?>

                            </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="enntitle" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Tiêu đề:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="enntitle" id="enntitle" placeholder="Tiêu đề slide">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennlinknew" class="col-sm-3 control-label"><i class="fa  fa-newspaper-o"></i> Link bài viết:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennlinknew" id="ennlinknew" placeholder="Link bài viết">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennyoutube" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> Dùng video:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennyoutube" id="ennyoutube" placeholder="link youtube">
                        </div>
                    </div>
                </div>
                <div class="col-xs-6"> 
                    <div class="form-group">
                        <label for="ennavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> Hình ảnh</label>
                        <div class="col-sm-8">
                            <img id="ennavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                            <input type="file" name="ennavatarfile" id="ennavatarfile" onchange="eshowimg(this);" style="display: none">
                            <input type="hidden" name="ennimguserold" id="ennimguserold">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennhide" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> Chế độ:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" value="1" checked> Hiện 
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" value="0"> Ẩn 
                            </label>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="ennnumber" class="col-sm-3 control-label"><i class="fa  fa-sort-numeric-asc"></i> Slide số:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennnumber" id="ennnumber" placeholder="Hiện thị số 3< chỉ điền số>">
                        </div>
                    </div>
                
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng cửa sổ</button>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
<div class="modal fade nn-modal-delete-slide" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Xóa Slide</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidslide" id="dennidslide" /> 
          <input type="hidden" name="dennimgslide" id="dennimgslide" /> 
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete">Bạn có chắc xóa slide <i id="deletename"></i></h4>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Đóng cửa sổ</button>
            <button type="submit" class="btn btn-warning">Xóa</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(asset('public/js/slide.js')); ?>"></script>
  <script type="text/javascript">
    <?php if(session('actionuser')=='add' && count($errors) > 0): ?>
        $('.nn-modal-add-slide').modal('show');
    <?php endif; ?>
    <?php if(session('actionuser')=='edit' && count($errors) > 0): ?>
        $(document).ready(function(){
          $("#ennslide<?php echo e(session('editid')); ?>").trigger('click');
        });
    <?php endif; ?>
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>