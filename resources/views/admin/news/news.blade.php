@extends('master')
@section('title','Tin Tức')
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tin Tức</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-news" id="nn-add-job">+ Thêm Tin Tức</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        @if(session('thongbao'))
                            <div class="alert-tb alert alert-success">
                                <span class="fa fa-check"> </span> {{ session('thongbao') }}
                            </div>
                        @endif
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên bài viết</th>
                                        <th>Thể loại</th>
                                        <th>Loại tin</th>
                                        <!-- <th>Trạng thái</th> -->
                                        <th>Hình ảnh</th>
                                        <th>Người viết</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lnews as $new)
                                    <tr class="odd gradeX info">
                                        <td>{{ $new->id }}</td>
                                        <td>{{ $new->newsname }}</td>
                                        <td >{{ $new->mod_name($new->idmodnew)['modname'] }}</td>
                                        <td >{{ $new->list_name($new->idlistnew)['listname'] }}</td>
                                        <!-- <td>
                                            @if($new->status ==2)
                                                <strong class="text-success">Nổi bật</strong>
                                            @elseif($new->status ==1)
                                                <strong class="text-info">Đang Hiện</strong>
                                            @else
                                                <strong class="text-danger">Đang Ẩn</strong>
                                            @endif
                                        </td> -->
                                        <td class="center">
                                            <img src="{{ asset('img/news/100x100/'.$new->newimg) }}" style="width: 55px"> 
                                        </td>
                                        <td class="center info">admin</td>                                        
                                        <td>
                                            <i class="nneditnew btn btn-info fa fa-edit" id="ennnew{{ $new->id }}"  
                                            idlistnew="{{ $new->idlistnew }}" 
                                            idmod="{{$new->idmodnew}}" 
                                                    editid="{{ $new->id }}" name="{{ $new->newsname }}" dangky="{{$new->dangky}}" imgo="{{ $new->newimg }}" num="{{ $new->newnumber }}" intro="{{ $new->newintro }}" newvideo="{{ $new->newvideo }}" newcontent="{{ $new->newcontent }}" newkeywords="{{ $new->newkeywords }}" newtag="{{ $new->newtag }}" > Sửa</i>
                                            <i class="nndeditnew btn btn-danger fa fa-trash" imgo="{{ $new->newimg }}" editid="{{ $new->id }}" name="{{ $new->newsname }}"> Xóa </i>
                                        </td>
                                    </tr>
                                    @endforeach
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

<div class="modal fade nn-modal-add-news" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="margin-top: -3%;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Thêm Tin Tức</h4>
          </div>
          <form class="form-horizontal" method="post" action="list" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                @if(count($errors)>0)
                    <div class="alert-tb alert alert-danger">
                        @foreach($errors->all() as $err)
                          <i class="fa fa-exclamation-circle"></i> {{ $err }}<br/>
                        @endforeach
                    </div>
                @endif
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div class="col-xs-12 col-md-12">
                        <div class="form-group">
                            <label for="nnmodnews" class="control-label"> Thể Loại:</label>
                            <select class="form-control" name="nnmodnews" id="nn-mod-news" required>
                                <option value="">---Vui Lòng Chọn Thể loại---</option>
                                @foreach($modulepro as $ls)
                                    <option value="{!! $ls->id !!}"> {{ $ls->modname }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <div class="form-group">
                            <label for="nnlistnew" class="control-label"> Loại Tin:</label>
                            <select class="form-control" name="nnlistnew" id="nn-list-new">
                                <option value="">---Vui Lòng Chọn Thể loại---</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <div class="form-group">
                            <label for="newsname" class="control-label"><i class="fa  fa-newspaper-o"></i> Tiêu đề:</label>
                              <input type="text" class="form-control" name="newsname" id="nntitlenew" placeholder="tiêu đề bài viết" value="{!! old('newsname') !!}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <div class="form-group">
                            <div class="col-xs-12 col-md-12 text-center">
                                <label class="radio-inline">
                                    <input type="radio" name="nnhide" value="2" > Nổi bật 
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nnhide" value="1" checked> Bình thường 
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nnhide" value="0"> Ẩn 
                                </label>                                
                            </div>                    
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="col-xs-12 col-md-12">
                        <div class="form-group">
                            <label for="nnavatar" class="control-label"><i class="fa  fa-picture-o"></i> Hình ảnh</label> <br>
                            <img id="nnavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                            <input type="file" name="nnavatarfile" id="nnavatarfile" onchange="showimg(this);">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <div class="form-group">
                            <label for="nntagnew" class="control-label"><i class="fa  fa-note"></i> Tag:</label>
                            <div>
                              <textarea class="form-control" rows="1" name="nntagnew">{!! old('nntagnew') !!}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="nntomtatnew" class="control-label"><i class="fa  fa-note"></i> Tóm tắt:</label>
                        <div class="col-sx-12 col-md-12">
                          <textarea name="nntomtatnew" class="form-control" rows="4">{!! old('nntomtatnew') !!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="nncontentnew" class="control-label"><i class="fa  fa-note"></i> Nội Dung:</label>
                        <div class="col-sx-12 col-md-12">
                          <textarea name="nncontentnew" class="form-control" rows="5">{!! old('nncontentnew') !!}</textarea>
                          <script type="text/javascript">ckeditor("nncontentnew") </script>
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
<div class="modal fade nn-modal-edit-news" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="margin-top: -3%;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Sửa Tin Tức</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
          <input type="hidden" name="ennidnews" id="ennidnews" />
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                @if(count($errors)>0)
                    <div class="alert-tb alert alert-danger">
                        @foreach($errors->all() as $err)
                          <i class="fa fa-exclamation-circle"></i> {{ $err }}<br/>
                        @endforeach
                    </div>
                @endif
                    <div class="col-xs-12 col-sm-12 col-md-8">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="ennmodnews" class="control-label">Thể Loại:</label>
                                <div class="col-xs-12 col-md-12">
                                    <select class="form-control" name="ennmodnews" id="enn-mod-news">
                                        <option value="">--Vui Lòng Chọn Thể loại--</option>
                                        @foreach($modulepro as $mod)
                                            <option value="{!! $mod->id !!}"> {{ $mod->modname }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="ennlistnew" class="control-label"> Loại Tin:</label>
                                <div class="col-xs-12 col-md-12">
                                    <select class="form-control" name="ennlistnew" id="enn-list-new">
                                        <option value="">--Vui Lòng Chọn Thể loại--</option>
                                        @foreach($typenews as $ls)
                                            <option value="{!! $ls->id !!}"> {{ $ls->listname }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="newsname" class="control-label"><i class="fa  fa-newspaper-o"></i> Tiêu đề:</label>
                                <div class="col-xs-12 col-md-12">
                                  <input type="text" class="form-control" name="newsname" id="enntitlenew" placeholder="Link bài viết" value="{!! old('newsname') !!}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sx-12 col-md-12">
                            <div class="form-group">
                                <label class="radio-inline">
                                    <input type="radio" name="ennhide" value="2" checked> Nổi bật 
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="ennhide" value="1" checked > Bình thường 
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="ennhide" value="0"> Ẩn 
                                </label>                  
                            </div>
                         </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="col-sx-12 col-md-12">
                            <div class="form-group">
                                <label for="ennavatar" class="control-label"><i class="fa  fa-picture-o"></i> Hình ảnh</label>
                                <div class="col-xs-12 col-md-12">
                                    <img id="ennavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                                    <input type="file" name="ennavatarfile" id="ennavatarfile" onchange="eshowimg(this);" style="display: none">
                                    <input type="hidden" name="ennimguserold" id="ennimguserold">
                                </div>
                            </div>
                        </div>
                        <div class="col-sx-12 col-md-12">
                            <div class="form-group">
                                <label for="enntagnew" class="control-label"><i class="fa  fa-note"></i> Tag:</label>
                                  <textarea class="form-control" rows="2" name="enntagnew" id="enntagnew">{!! old('enntagnew') !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="enntomtatnew" class="control-label"><i class="fa  fa-note"></i> Tóm tắt:</label>
                            <div class="col-xs-12 col-md-12">
                              <textarea name="enntomtatnew" class="form-control" rows="4" id="enntomtatnew">{!! old('enntomtatnew') !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="enncontentnew" class="control-label"><i class="fa  fa-note"></i> Nội Dung:</label>
                            <div class="col-xs-12 col-md-12">
                              <textarea id="enncontentnew" name="enncontentnew" class="form-control" rows="5">{!! old('enncontentnew') !!}</textarea>
                              <script type="text/javascript">ckeditor("enncontentnew")</script>
                            </div>
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
<div class="modal fade nn-modal-delete-news" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Xóa Tin</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidnew" id="dennidnew" /> 
          <input type="hidden" name="dennimgnew" id="dennimgnew" /> 
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete">Bạn có chắc xóa tin <i id="deletename"></i></h4>
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

@endsection()
@section('script')
  <script src="{{ asset('js/admin/news.js') }}"></script>
  <script type="text/javascript">
    @if(session('actionuser')=='add' && count($errors) > 0)
        $('.nn-modal-add-news').modal('show');
    @endif
    @if (session('actionuser')=='edit' && count($errors) > 0)
        $(document).ready(function(){
          $("#ennnew{{ session('editid') }}").trigger('click');
        });
    @endif
  </script>
@endsection()