<?php $__env->startSection('title','Ngôn ngữ'); ?>
<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo e(trans('admin.lang')); ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-lang" id="nn-add-lang">+ <?php echo e(trans('admin.add_lang')); ?>/button>
                        </div> -->
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
                                        <th><?php echo e(trans('admin.key_lang')); ?></th>
                                        <th><?php echo e(trans('admin.name_lang')); ?></th>
                                        <th><?php echo e(trans('admin.ensign_lang')); ?></th>
                                        <th><?php echo e(trans('admin.curency_lang')); ?></th>
                                        <th><?php echo e(trans('admin.detail')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo e($lang->char); ?></td>
                                        <td><?php echo e($lang->name); ?></td>              
                                        <td class="center">
                                            <img src="<?php echo e(asset('public/img/lang/'.$lang->img)); ?>" style="width: 55px"> 
                                        </td>
                                        <td><?php echo e($lang->currency); ?></td>
                                        <td><i class="nneditlang btn btn-info fa fa-edit" id="ennlang<?php echo e($lang->id); ?>" editid="<?php echo e($lang->id); ?>" char="<?php echo e($lang->char); ?>" lname="<?php echo e($lang->name); ?>" imgo="<?php echo e($lang->img); ?>" currency="<?php echo e($lang->currency); ?>"> <?php echo e(trans('translate.edit')); ?></i></td>
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

<!-- <div class="modal fade nn-modal-add-lang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ngôn ngữ</h4>
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
                        <label for="name" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> <?php echo e(trans('admin.name_lang')); ?>:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="name" id="name" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnchar" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> <?php echo e(trans('admin.key_lang')); ?>:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnchar" id="nnchar" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nncurrency" class="col-sm-3 control-label"><i class="fa  fa-money"></i> <?php echo e(trans('admin.curency_lang')); ?>:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nncurrency" id="nncurrency" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> <?php echo e(trans('admin.ensign_lang')); ?></label>
                        <div class="col-sm-8">
                            <img id="nnavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                            <input type="file" name="nnavatarfile" id="nnavatarfile" onchange="showimg(this);">
                        </div>
                    </div>
                
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(trans('translate.close')); ?></button>
            <button type="submit" class="btn btn-primary"><?php echo e(trans('translate.addnew')); ?></button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div> -->
    <!-- end modal -->

<div class="modal fade nn-modal-edit-lang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo e(trans('admin.lang')); ?></h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
          <input type="hidden" name="ennidlang" id="ennidlang" /> 
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
                        <label for="ennname" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> <?php echo e(trans('admin.name_lang')); ?>:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennname" id="ennname" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennchar" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> <?php echo e(trans('admin.key_lang')); ?>:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennchar" id="ennchar" placeholder=" " readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="enncurrency" class="col-sm-3 control-label"><i class="fa  fa-money"></i> <?php echo e(trans('admin.curency_lang')); ?>:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="enncurrency" id="enncurrency" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="ennavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> <?php echo e(trans('admin.ensign_lang')); ?></label>
                            <div class="col-sm-8">
                                <img id="ennavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                                <input type="file" name="ennavatarfile" id="ennavatarfile" onchange="eshowimg(this);" style="display: none">
                                <input type="hidden" name="ennimguserold" id="ennimguserold">
                            </div>
                        </div>
                
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(trans('translate.close')); ?></button>
            <button type="submit" class="btn btn-primary"><?php echo e(trans('translate.update')); ?></button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(asset('public/js/lang.js')); ?>"></script>
  <script type="text/javascript">
    <?php if(session('actionuser')=='add' && count($errors) > 0): ?>
        $('.nn-modal-add-lang').modal('show');
    <?php endif; ?>
    <?php if(session('actionuser')=='edit' && count($errors) > 0): ?>
        $(document).ready(function(){
          $("#ennlang<?php echo e(session('editid')); ?>").trigger('click');
        });
    <?php endif; ?>
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>