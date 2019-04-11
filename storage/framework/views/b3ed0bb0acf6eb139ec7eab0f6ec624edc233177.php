<?php $__env->startSection('title','Mạng xã hội'); ?>
<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo e(trans('admin.social')); ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-socical" id="nn-add-socical">+ <?php echo e(trans('admin.add_social')); ?></button>
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
                                        <th>Stt</th>
                                        <th><?php echo e(trans('admin.name')); ?></th>
                                        <th><?php echo e(trans('admin.icon')); ?></th>
                                        <th><?php echo e(trans('admin.status')); ?></th>
                                        <th><?php echo e(trans('admin.detail')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $socicals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo e($socical->id); ?></td>
                                        <td><?php echo e($socical->name); ?></td>
                                        <td class="center">
                                            <i class="fa <?php echo e($socical->icon); ?>">
                                        </td>
                                        <td><?php echo e($socical->hide); ?></td>        
                                        <td>
                                            <i class="nneditsocical btn btn-info fa fa-edit" id="ennsocical<?php echo e($socical->id); ?>" editid="<?php echo e($socical->id); ?>" lang="<?php echo e($socical->idlang); ?>" hide="<?php echo e($socical->hide); ?>" name="<?php echo e($socical->name); ?>" icon="<?php echo e($socical->icon); ?>" link="<?php echo e($socical->link); ?>"> <?php echo e(trans('translate.edit')); ?></i>
                                            <i class="nndeletesocical btn btn-danger fa fa-trash" editid="<?php echo e($socical->id); ?>" name="<?php echo e($socical->name); ?>"> <?php echo e(trans('translate.delete')); ?></i>
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

<div class="modal fade nn-modal-add-socical" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo e(trans('admin.social')); ?></h4>
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
                        <label for="nnlang" class="col-sm-3 control-label"><i class="fa fa-ravelry"></i> <?php echo e(trans('translate.language')); ?>:</label>
                        <div class="col-sm-9">
                            <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="radio-inline">
                                <input type="radio" name="nnlang" id="nn-lang-1" value="<?php echo e($lang->id); ?>" <?php if($lang->id ==1): ?> checked <?php endif; ?> > <?php echo e($lang->name); ?>

                            </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> <?php echo e(trans('admin.name')); ?>:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnname" id="nnname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnicon" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> <?php echo e(trans('admin.icon')); ?>:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnicon" id="nnicon" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnlink" class="col-sm-3 control-label"><i class="fa fa-share-alt-square"></i> Link:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnlink" id="nnlink" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnchar" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> <?php echo e(trans('admin.status')); ?>:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" id="nn-hide-1" value="1" > <?php echo e(trans('admin.status_hide')); ?>

                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" id="nn-hide-2" value="2" checked> <?php echo e(trans('admin.status_show')); ?>

                            </label>
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
</div>
    <!-- end modal -->
<div class="modal fade nn-modal-edit-socical" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit mạng xã hội</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
          <input type="hidden" name="ennidsocical" id="ennidsocical" /> 
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
                        <label for="ennlang" class="col-sm-3 control-label"><i class="fa fa-ravelry"></i> <?php echo e(trans('translate.language')); ?>:</label>
                        <div class="col-sm-9">
                            <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="radio-inline">
                                <input type="radio" name="ennlang" id="nn-lang-1" value="<?php echo e($lang->id); ?>"/><?php echo e($lang->name); ?>

                            </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> <?php echo e(trans('admin.name')); ?>:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennname" id="ennname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennicon" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Icon:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennicon" id="ennicon" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennlink" class="col-sm-3 control-label"><i class="fa fa-share-alt-square"></i> Link:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennlink" id="ennlink" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennhide" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> <?php echo e(trans('admin.status')); ?>::</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" id="nn-hide-1" value="1" > <?php echo e(trans('admin.status_hide')); ?>

                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" id="nn-hide-2" value="2" checked> <?php echo e(trans('admin.status_show')); ?>

                            </label>
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
<div class="modal fade nn-modal-delete-socical" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo e(trans('translate.delete')); ?> <?php echo e(trans('admin.social')); ?></h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidsocical" id="dennidsocical" /> 
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete"><?php echo e(trans('translate.delete')); ?>? <i id="deletename"></i></h4>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo e(trans('translate.close')); ?></button>
            <button type="submit" class="btn btn-warning"><?php echo e(trans('translate.update')); ?></button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(asset('public/js/admin/socical.js')); ?>"></script>
  <script type="text/javascript">
    <?php if(session('actionuser')=='add' && count($errors) > 0): ?>
        $('.nn-modal-add-socical').modal('show');
    <?php endif; ?>
    <?php if(session('actionuser')=='edit' && count($errors) > 0): ?>
        $(document).ready(function(){
          $("#ennsocical<?php echo e(session('editid')); ?>").trigger('click');
        });
    <?php endif; ?>
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>