<?php $__env->startSection('title','workflow management - customer'); ?>
<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo e(trans("admin.custommer")); ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-add-customer" id="nn-add-cust">+ <?php echo e(trans("admin.add")); ?></button>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                <?php if(session('thongbao')): ?>
                    <div class="alert-tb alert alert-success">
                        <span class="fa fa-check"> </span> <?php echo e(session('thongbao')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session('loi')): ?>
                    <div class="alert-tb alert alert-danger">
                        <span class="fa fa-check"> </span> <?php echo e(session('loi')); ?>

                    </div>
                <?php endif; ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-customer">
                        <thead>
                            <tr>
                                <th><?php echo e(trans("admin.name")); ?></th>
                                <th><?php echo e(trans("admin.info")); ?></th>
                                <th><?php echo e(trans("admin.phone")); ?></th>
                                <th><?php echo e(trans("admin.status")); ?></th>
                                <th><?php echo e(trans("admin.detail")); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="odd gradeX">
                                <td><?php echo e($cus->cusfullname); ?></td>
                                <td><?php echo e($cus->cusemail); ?></td>
                                <td><?php echo e($cus->cusphone); ?></td>
                                
                                <td class="center">

                                <img <?php if($cus->idloginsocial==null): ?> src="<?php echo e(asset('public/img/customers/'.$cus->cusimg)); ?>" <?php else: ?> src="<?php echo e($cus->cusimg); ?>" <?php endif; ?> style="width: 55px">
                                </td>                                        
                                <td>
                                    <i class="nneditcustomer btn btn-info fa fa-edit" id="enngr<?php echo e($cus->id); ?>" editid="<?php echo e($cus->id); ?>" name="<?php echo e($cus->cusfullname); ?>" imgo="<?php echo e($cus->cusimg); ?>" phone="<?php echo e($cus->cusphone); ?>" cusemail="<?php echo e($cus->cusemail); ?>" status="<?php echo e($cus->status); ?>" cusaddress="<?php echo e($cus->cusaddress); ?>" cusface="<?php echo e($cus->cusface); ?>" hide="<?php echo e($cus->status); ?>" idgroup="<?php echo e($cus->idgroup); ?>"> <?php echo e(trans("admin.edit")); ?></i>
                                    <i class="nndremovecus btn btn-danger fa fa-trash" imgo="<?php echo e($cus->cusimg); ?>" editid="<?php echo e($cus->id); ?>" name="<?php echo e($cus->cusfullname); ?>"> <?php echo e(trans("admin.delete")); ?></i>
                                    <a style="float: right" href="<?php echo url('/admin/customers/profile/'.$cus->id); ?>"><span class="btn btn-default"><i class="fa fa-calendar"> <?php echo e(trans("admin.detail")); ?></i></span></a>
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


        <!-- end modal -->

<div class="modal fade nn-add-customer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo e(trans("admin.add")); ?></h4>
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
                        <label for="nngroupkh" class="col-sm-3 control-label"><i class="fa  fa-font"></i> <?php echo e(trans("admin.group")); ?>:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="nngroupkh">
                                <option value="xxxx">---</option>
                                <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ls->id); ?>"> <?php echo e($ls->listname); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnfullname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> <?php echo e(trans("admin.name")); ?>:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnfullname" id="nnfullname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnmailcus" class="col-sm-3 control-label"><i class="fa  fa-newspaper-o"></i><?php echo e(trans("admin.email")); ?>:</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" name="nnmailcus" id="nnmailcus" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnphonecus" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> <?php echo e(trans("admin.phone")); ?>:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnphonecus" id="nnphonecus" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnaddcus" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> <?php echo e(trans("admin.address")); ?>:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnaddcus" id="nnaddcus" placeholder=" ">
                        </div>
                    </div>                    

                </div>
                <div class="col-xs-6"> 
                    <div class="form-group">
                        <label for="nnavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> <?php echo e(trans("admin.image")); ?></label>
                        <div class="col-sm-8">
                            <img id="nnavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                            <input type="file" name="nnavatarfile" id="nnavatarfile" onchange="showimg(this);">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnhide" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> <?php echo e(trans("admin.status")); ?>:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" value="1" checked> Vip 
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" value="1" > Mới 
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" value="0"> Ẩn 
                            </label>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="nnfacebook" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> Link FB KH:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnfacebook" id="nnfacebook" placeholder="Facebook Khách hàng">
                        </div>
                    </div>
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(trans("admin.close")); ?></button>
            <button type="submit" class="btn btn-primary"><?php echo e(trans("admin.add")); ?></button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
<div class="modal fade nn-modal-edit-Customer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo e(trans("admin.edit")); ?></h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
          <input type="hidden" name="ennidCustomer" id="ennidCustomer" /> 
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
                        <label for="enngroupkh" class="col-sm-3 control-label"><i class="fa  fa-font"></i> <?php echo e(trans("admin.group")); ?>:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="enngroupkh">
                                <option value="xxxx">---</option>
                                <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ls->id); ?>"> <?php echo e($ls->listname); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennfullname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> <?php echo e(trans("admin.name")); ?>:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennfullname" id="ennfullname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennmailcus" class="col-sm-3 control-label"><i class="fa  fa-newspaper-o"></i> <?php echo e(trans("admin.email")); ?>:</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" name="ennmailcus" id="ennmailcus" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennphonecus" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> <?php echo e(trans("admin.phone")); ?>:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennphonecus" id="ennphonecus" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennaddcus" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> <?php echo e(trans("admin.address")); ?>:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennaddcus" id="ennaddcus" placeholder=" ">
                        </div>
                    </div>                    

                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="ennavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> <?php echo e(trans("admin.image")); ?></label>
                        <div class="col-sm-8">
                            <img id="ennavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                            <input type="file" name="ennavatarfile" id="ennavatarfile" onchange="eshowimg(this);" style="display: none">
                            <input type="hidden" name="ennimguserold" id="ennimguserold">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennhide" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> <?php echo e(trans("admin.status")); ?>:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" value="1" checked> Vip 
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" value="1" > Mới 
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" value="0"> Ẩn 
                            </label>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="ennfacebook" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> Facebook:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennfacebook" id="ennfacebook" placeholder=" ">
                        </div>
                    </div>
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(trans("admin.close")); ?></button>
            <button type="submit" class="btn btn-primary"><?php echo e(trans("admin.update")); ?></button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
<div class="modal fade nn-modal-delete-Customer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo e(trans("admin.delete")); ?></h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidCustomer" id="dennidCustomer" /> 
          <input type="hidden" name="dennimgCustomer" id="dennimgCustomer" /> 
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete"><?php echo e(trans("admin.delete")); ?>? <i id="deletename"></i></h4>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo e(trans("admin.close")); ?></button>
            <button type="submit" class="btn btn-warning"><?php echo e(trans("admin.delete")); ?></button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(asset('public/js/admin/customer.js')); ?>"></script>
  <script type="text/javascript">
    <?php if(session('actionuser')=='add' && count($errors) > 0): ?>
        $('.nn-add-customer').modal('show');
    <?php endif; ?>
    <?php if(session('actionuser')=='edit' && count($errors) > 0): ?>
        $(document).ready(function(){
          $("#enngr<?php echo e(session('editid')); ?>").trigger('click');
        });
    <?php endif; ?>
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>