<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>@yield('title')</title>

    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('bootstrap/metisMenu/metisMenu.min.css') }}" rel="stylesheet">  
        <!-- DataTables CSS -->
    <link href="{{ asset('bootstrap/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('bootstrap/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet"> 
    <link href="{{ asset('bootstrap/selector/css/select2.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('bootstrap/css/sb-admin-2.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/page.css') }}" rel="stylesheet"> 
    <link href="{{ asset('bootstrap/css/font-awesome.css') }}" rel="stylesheet"> 
    <script src="{{ asset('bootstrap/js/jquery.js') }}"></script>

    <!-- ckeditor -->
    <script src="{{ url('editor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ url('editor/ckfinder/ckfinder.js')}}"></script>
    <script type="text/javascript">
        var baseURL="{!! url('/') !!}";        
    </script>
    <script src="{{ url('editor/func_ckfinder.js')}}"></script>
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
                <a class="navbar-brand" href="{{ url('/admin')}}">Tin tức mới | Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                   <!--  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       <i>{{ Session::get('locale') }}</i> <i class="fa fa-caret-down"></i>
                   </a> -->
                    <ul class="dropdown-menu dropdown-alerts">
                        @foreach($admin_lang as $lang)
                        <li>
                            <div class="col-xs-12 nn_select_lang" name="nnlocation" idlang="{{$lang->id}}">
                                <input type="radio" name="nnlang" id="nn-lang-1" value="{{ $lang->id }}" @if($lang->id == Session('idlocale')) checked @endif > {{ $lang->name }}
                                <img src="{{ asset('img/lang/'.$lang->img) }}" class="img-thumnail nn-img-lang-top">
                            </div>
                            <hr>
                        </li>
                        <li class="divider"></li>
                        @endforeach                        
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"> </i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        @if(Auth::check())
                            <li><a href="#"><i class="fa fa-user fa-fw"></i>{{ Auth::user()->fullname }}</a>
                            </li>
                            <li data-toggle="modal" data-target=".nn-modal-change-pass"><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{!! url('admin/auth/logout')!!}"><i class="fa fa-sign-out fa-fw"></i>  {{ trans('translate.Logout')}}</a>
                            </li>
                        @endif
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
                            <a href="{{ url('/admin')}}"><i class="fa fa-dashboard fa-fw"></i> {{ trans('translate.Dashboard') }}</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cogs fa-fw"></i> {{ trans('translate.Setting') }}<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                              
                              <!-- <li>
                                  <a href="{{ url('/admin/lang/list')}}"><i class="fa fa-globe fa-fw"></i> {{ trans('translate.language') }}</a>
                              </li> -->
                            <!--   <li>
                                <a href="{{ url('/admin/socical/list')}}"><i class="fa fa-share-alt-square fa-fw"></i> {{ trans('translate.socical') }}</a>
                            </li> -->
                               <li>
                                   <a href="{{ url('/admin/contact')}}"><i class="fa fa-exclamation-circle fa-fw"></i> {{ trans('translate.info') }}</a>
                               </li>
                           </ul>  
                        </li>
                     <!--    <li>
                         <a href="#"><i class="fa fa-address-card-o fa-fw"></i> Bạn đọc<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                             <li>
                                 <a href="{!! url('/admin/customers/listgr')!!}"><i class="fa fa-tags fa-fw"></i> Nhóm</a>
                             </li>
                             <li>
                                 <a href="{!! url('/admin/customers/list')!!}"><i class="fa  fa-address-book fa-fw"></i> Người đọc</a>
                             </li>
                             <li>
                                 <a href="{!! url('/admin/customers/feedback')!!}"><i class="fa  fa-comment fa-fw"></i> Ý kiến bạn đọc</a>
                             </li>
                         </ul>
                     </li> -->
                        <li>
                            <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> {{ trans('translate.News') }}<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! url('/admin/modnews/list')!!}"><i class="fa fa-retweet fa-fw"></i> {{ trans('translate.modNews') }}</a>
                                </li>                                
                                <li>
                                    <a href="{!! url('/admin/listnews/list')!!}"><i class="fa fa-bars fa-fw"></i> {{ trans('translate.cateNews') }}</a>
                                </li>
                                <li>
                                    <a href="{!! url('/admin/news/list')!!}"><i class="fa fa-newspaper-o fa-fw"></i> {{ trans('translate.News') }}</a>
                                </li>
                            </ul>  
                        </li>                           
                        <li>
                            <a href="{{ url('/admin/slide/list')}}"><i class="fa fa-picture-o fa-fw"></i> Slide show</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/advert/list')}}"><i class="fa fa-bullhorn fa-fw"></i>{{ trans('translate.advert') }}</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/user/listuser')}}"><i class="fa fa-users fa-fw"></i> {{ trans('translate.member') }}</a>
                        </li>   
                        <li>
                            <a  style="color: black; font-style: inherit;" href="{{url('')}}">Về trang chủ</a>
                        </li>                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<!-- content -->
    @yield('content')

<div class="modal fade nn-modal-change-pass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <!-- Modal content-->
    <div class="modal-content modal-dialog">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Đổi Mật Khẩu</h4>
      </div>
      <form class="form-horizontal" method="post" action="{{ url('admin/auth/changepass') }}" enctype="multipart/form-data">        
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
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('bootstrap/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bootstrap/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('bootstrap/selector/js/select2.min.js') }}"></script>
    <script src="{{ asset('bootstrap/selector/js/select2.js') }}"></script>
    <script src="{{ asset('bootstrap/js/sb-admin-2.js') }}"></script>
    @yield('script')
    <script src="{{ asset('js/page.js') }}"></script>    
    
</html>
