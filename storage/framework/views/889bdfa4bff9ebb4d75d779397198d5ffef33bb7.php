<?php $__env->startSection('title','Quảng Cáo'); ?>
<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quảng Cáo</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-advert" id="nn-add-advert">+ Thêm Quảng Cáo</button>
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
                            <tr>
                                <th>NN</th>
                                <th>Vị trí</th>
                                <th>Hiện thị</th>
                                <th>Hình ảnh</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $adverts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="odd gradeX">
                                <td><?php echo e($advert->idlang); ?></td>
                                <td class="text-center">
                                    <?php if($advert->area ==1): ?>
                                        <span style="color: #1f796d;">Đầu trang</span>
                                    <?php elseif($advert->area ==2): ?>
                                        <span style="color: #16690c;">Giữa trang</span>
                                    <?php elseif($advert->area ==3): ?>
                                        <span style="color: red;">Cuối trang </span>    
                                    <?php else: ?>
                                        <span style="color: #673020;">Trang chủ</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if($advert->hide ==1): ?>
                                        <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                    <?php else: ?>
                                         <i class="glyphicon glyphicon-ok" style="color:green;"></i>
                                    <?php endif; ?>
                                </td>
                                <td class="center">
                                    <img src="<?php echo e(asset('public/img/images_bn/'.$advert->img)); ?>" style="width: 55px"> 
                                </td>
                                <td>
                                    <i class="nneditadvert btn btn-info fa fa-edit" id="ennadvert<?php echo e($advert->id); ?>" editid="<?php echo e($advert->id); ?>" lang="<?php echo e($advert->idlang); ?>" hide="<?php echo e($advert->hide); ?>" area="<?php echo e($advert->area); ?>"  link="<?php echo e($advert->link); ?>" code="<?php echo e($advert->code); ?>" sort="<?php echo e($advert->sort); ?>" imgo="<?php echo e($advert->img); ?>"> Sửa</i>
                                    <i class="nndeditlistpro btn btn-danger fa fa-trash"  editid="<?php echo e($advert->id); ?>" imgo="<?php echo e($advert->img); ?>" title="<?php echo e($advert->id); ?>" > Xóa</i>
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

<div class="modal fade nn-modal-add-advert" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Quảng cáo</h4>
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
                <div class="col-xs-12">                 
                    <div class="form-group">
                        <label for="nnchar" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Hiện thị:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" id="nn-hide-1" value="1" > Ẩn
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" id="nn-hide-2" value="2" checked> Hiện
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnchar" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Khu vực:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="nnshowin" id="nn-show-1" value="1" > Đầu trang
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnshowin" id="nn-show-2" value="2" checked> Giữa trang
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnshowin" id="nn-show-3" value="3"> Cuối trang
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnshowin" id="nn-show-4" value="4"> Trang chủ
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnlink" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Thứ tự:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="sort" id="idsort" placeholder="Nhấp số thứ tự xắp xếp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnlink" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Link:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnlink" id="nnlink" placeholder="link bài viết quảng cáo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnlink" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Code :</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" name="code" id="idcode" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnavatar" class="col-sm-3 control-label"><i class="fa  fa-picture-o"></i> Hình ảnh</label>
                        <div class="col-sm-9">
                            <img id="nnavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                            <input type="file" name="nnavatarfile" id="nnavatarfile" onchange="showimg(this);">
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

<div class="modal fade nn-modal-edit-advert" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Quảng cáo</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
          <input type="hidden" name="ennidadvert" id="ennidadvert" /> 
          <div class="modal-body">
            <div class="row">
                <?php if(count($errors)>0): ?>
                    <div class="alert-tb alert alert-danger">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <i class="fa fa-exclamation-circle"></i> <?php echo e($err); ?><br/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="ennhide" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Hiện thị:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" id="nn-hide-1" value="1" > Ẩn
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" id="nn-hide-2" value="2"> Hiện
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennshowin" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Khu vực:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="ennshowin" id="nn-show-1" value="1" > Đầu trang
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennshowin" id="nn-show-2" value="2"> Giữa trang
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennshowin" id="nn-show-3" value="3"> Cuối trang
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennshowin" id="nn-show-4" value="4"> Trang chủ
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnlink" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Thứ tự:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="esort" id="idesort" placeholder="Nhấp số thứ tự xắp xếp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennlink" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Link:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennlink" id="ennlink" placeholder="link bài viết quảng cáo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnlink" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Code :</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" name="ecode" id="idecode" rows="4"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                            <label for="ennavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> Hình ảnh</label>
                            <div class="col-sm-8">
                                <img id="ennavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                                <input type="file" name="ennavatarfile" id="ennavatarfile" onchange="eshowimg(this);" style="display: none">
                                <input type="hidden" name="ennimguserold" id="ennimguserold">
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

    <!-- end modal -->
<div class="modal fade nn-modal-delete-listpro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Xóa Quảng Cáo</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidlistpro" id="dennidlistpro" /> 
          <input type="hidden" name="dennimglistpro" id="dennimglistpro" /> 
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete">Bạn có chắc xóa Quảng Cáo <i id="deletename"></i></h4>
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
  <script src="<?php echo e(asset('public/js/advert.js')); ?>"></script>
  <script type="text/javascript">
    <?php if(session('actionuser')=='add' && count($errors) > 0): ?>
        $('.nn-modal-add-advert').modal('show');
    <?php endif; ?>
    <?php if(session('actionuser')=='edit' && count($errors) > 0): ?>
        $(document).ready(function(){
          $("#ennadvert<?php echo e(session('editid')); ?>").trigger('click');
        });
    <?php endif; ?>
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>