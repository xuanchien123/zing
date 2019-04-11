@extends('master')
@section('title','admin')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('translate.Dashboard')}}</h1>
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
                            <div class="huge">{{$news}}</div>
                            <div>Bản tin</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/news/list')}}">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans('translate.viewall')}}!</span>
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
                            <div class="huge">{{ $news_count }}</div>
                            <div>Tin Tức</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/news/list')}}">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans('translate.viewall')}}</span>
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
                            <div class="huge">{{ $ads }}</div>
                            <div>Quảng cáo</div>
                        </div>
                    </div>
                </div>
                <a href="{{url('/admin/advert/list')}}">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans('translate.viewall')}}!</span>
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
            <h4>{{ trans('admin.visit') }}</h4>
            <p> 
                {{ trans('admin.online') }}: {{ $online }} <br>
                {{ trans('admin.today') }}: {{ $day }} <br>
                {{ trans('admin.yesterday') }}: {{ $yesterday }} <br>
                {{ trans('admin.this_week') }}: {{ $week }} <br>
                {{ trans('admin.last_week') }}: {{ $lastweek }} <br>
                {{ trans('admin.this_month') }}: {{ $month }} <br>
                {{ trans('admin.this_year') }}: {{ $year }} <br>
                {{ trans('admin.times') }}: {{ $visit }}
            </p>
        </div>
    </div>
<hr>
</div>
@endsection() 