@extends('home.master')
@section('title', (!empty($contact)?$contact->seo_title:""))
@section('seo_keyword', (!empty($contact)?$contact->seo_keyword:""))
@section('seo_description', (!empty($contact)?$contact->seo_description:""))
@section('seo_image', (!empty($contact)?asset($contact->seo_image):""))
@section('seo_url', url()->current())
@section('content')
<!-- BEGIN .wrapper -->
<div class="wrapper">

	<!-- BEGIN .ot-breaking-news-body -->
	<div class="ot-breaking-news-body" data-breaking-timeout="4000" data-breaking-autostart="true">
		<div class="ot-breaking-news-controls">
			<button class="right" data-break-dir="right"><i class="fa fa-angle-right"></i></button>
			<button class="right" data-break-dir="left"><i class="fa fa-angle-left"></i></button>
			<strong><i class="fa fa-bar-chart"></i>Tin mới</strong>
		</div>
		<div class="ot-breaking-news-content">
			<div class="ot-breaking-news-content-wrap">
			@foreach($khuyenmai as $item_km)
				<div class="item">
					<strong><a href="{{url('/chi-tiet/'.$item_km->slug)}}">{{ $item_km->newsname}}</a></strong>
				</div>
			@endforeach
			</div>
		</div>
	<!-- END .ot-breaking-news-body -->
	</div>
	<div class="content-block has-sidebar">
		<!-- BEGIN .content-block-single -->
		<div class="content-block-single">
			
			<!-- BEGIN .content-panel -->
			<div class="content-panel">
				<div class="content-panel-title">
				@if(isset($key))
					<h2>Kết quả tìm kiếm : {{ $key}}</h2>
				@else
					<h2>Các tin tức với tags : {{ $tags}}</h2>
				@endif
				</div>				
					<div class="row">						
						<div class="col-md-8">
							<div class=" article-list">
							<div class="widget">
								{{-- {{dd($news_serch->count())}} --}}
								<div class="widget-article-list">
								<?php $i=0; ?>
								@foreach($news_serch as $item_serch)
									<div class="item">
										<div class="item-header">
											<a href="{{url('chi-tiet/'.$item_serch->slug)}}">
												<img src="{{url('/img/news/100x100/'.$item_serch->newimg)}}" alt="no img" width="90" />
											</a>
										</div>
										<div class="item-content">
											<h4><a href="{{url('chi-tiet/'.$item_serch->slug)}}">{{$item_serch->newsname}}</a></h4>
											<div class="search_intro">
												{{$item_serch->newintro}}
											</div>
											<span class="item-meta">
												<a href="#"><i class="fa fa-clock-o"></i>{{$item_serch->created_at}}</a>
												<a href="{{url('/loai-tin/'.$item_serch->list_name($item_serch->idlistnew)['slug'])}}">
													<i class="fa fa-list-ul" aria-hidden="true"></i>
													@if($item_serch->list_name($item_serch->idlistnew)['listname'] !="")
														{{ $item_serch->list_name($item_serch->idlistnew)['listname'] }}
													@else
														{{$item_serch->mod_name($item_serch->idmodnew)['modname']}}
													@endif
												</a>
											</span>
										</div>
									</div>
									<div class="clearfix">
										
									</div>
								@endforeach
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-12" style="min-height: 200px;">
								@if($adverts_center[0]->code != "")
									{{$adverts_center[0]->code}}
								@else
								<a href="{{$adverts_center[0]->link}}" target="_blank">
									<img src="{{url('img/images_bn/'.$adverts_center[0]->img)}}" alt="No image" width="100%" style="object-fit: contain;" />
								</a>
								@endif
							</div>
						</div>
					</div>
				</div>						
			<!-- END .content-panel -->
			</div>

		<!-- END .content-block-single -->
		</div>

		<!-- BEGIN .sidebar -->
			<aside class="sidebar sticky_column">
				@include('home.sitebar_right')
			<!-- END .sidebar -->
	</div>
	

<!-- END .wrapper -->
</div>
@endsection