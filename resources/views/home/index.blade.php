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
				<strong><i class="fa fa-bar-chart"></i>Tin mới	</strong>
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
			<?php $index_count = 0; $ads = 0;?>
			@foreach($modnews as $index_mod)		
				<!-- BEGIN .content-panel -->
				<div class="content-panel">
					<div class="content-panel-title">						
						<ul class="sub_menu">
							<li class="active"><a href="{{ url('loai-tin/'.$index_mod->slug) }}">{{ $index_mod->modname }}</a></li>
							@foreach($index_mod->listnews as $itemlist) 
							<li><a href="{{url('/loai-tin/'.$itemlist->slug)}}" title="{{$itemlist->listname}}">{{$itemlist->listname}}</a></li>
							@endforeach
						</ul>
					</div>
					<?php 
						$item = $index_mod->news_in_mod($index_mod->id);
						$hot = $item->shift();								
					 ?>
					<div class="row">
						<div class="hidden-xs col-md-7 nopadding">
							<div class="content-panel-body article-list">							
								<div class="item" data-color-top-slider="#867eef">
									<div class="item-header">
										<a href="{{url('chi-tiet/'.$hot['slug'])}}">
											<span class="comment-tag"><i class="fa fa-comment-o"></i><span class="fb-comments-count" data-href="{{url('chi-tiet/'.$hot['slug'])}}"></span><i></i></span>
											<span class="read-more-wrapper"><span class="read-more">Đọc thêm +<i></i></span></span>
											<img src="{{url('img/news/300x300/'.$hot['newimg'])}}" alt="No image" />
										</a>
									</div>
									<div class="item-content">
										<h3><a href="{{url('chi-tiet/'.$hot['slug'])}}">{{$hot['newsname']}}</a></h3>
										<p>{!! $hot['newintro'] !!}</p>	
									</div>
								</div>
							</div>
						</div>
						<div class="hidden-xs col-md-5 nopadding">
							<div class="content-panel-body article-list">
								<ul>
									@foreach($item as $news)
									<li>
										<a href="{{url('/chi-tiet/'.$news->slug)}}" title="{{$news->newsname}}"><b class="fa fa-angle-right" aria-hidden="true"></b> <b>{{$news->newsname}}</b> </a>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
						<div class="visible-xs col-xs-12">
							<div class="mobile_hot_img">
								<a href="{{url('/chi-tiet/'.$hot->slug)}}" title="{{$hot->newsname}}"><img class="img-responsive" src="{{url('img/news/300x300/'.$hot['newimg'])}}" alt="{{$hot['newimg']}}"></a>
							</div>
							<div class="mobile_title">
								<a href="{{url('/chi-tiet/'.$hot->slug)}}" title="{{$hot->newsname}}"><h1>{{$hot->newsname}}</h1></a>
							</div>
						</div>
						@foreach($item as $m_item)
						<div class="visible-xs col-xs-6 padding4 mobile_item">
							<div class="mobile_img">
								<a href="{{url('/chi-tiet/'.$m_item->slug)}}" title="{{$m_item->newsname}}"><img class="img-responsive" src="{{url('img/news/300x300/'.$m_item['newimg'])}}" alt=""></a>
							</div>
							<div class="mobile_title">
								<a href="{{url('/chi-tiet/'.$m_item->slug)}}" title="{{$m_item->newsname}}"><h1>{{$m_item->newsname}}</h1></a>
							</div>
						</div>
						@endforeach
					</div>								
					{{-- quang cao --}}
				@if($index_count == 4)
					<div class="content-panel">
						<div class="content-panel-body do-space">
						@if($adverts_main[$ads]->code != "")
							{{$adverts_main[$ads]->code}}
						@else
							<a href="{{$adverts_main[$ads]->link}}" target="_blank">
								<img src="{{url('img/images_bn/'.$adverts_main[$ads]->img)}}" alt="No image" width="100%" style="object-fit: contain; max-height: 150px; display: block;overflow:hidden; margin-bottom: 20px;" />
							</a>
						@endif
						</div>
					<?php $ads = $ads +1; ?>
					<!-- END .content-panel -->
					</div>
				@endif
				</div>
				<?php $index_count = $index_count +1; ?>
				<!-- END .content-panel -->
				@endforeach				
			</div>
			<!-- END .content-block-single -->
			<!-- BEGIN .sidebar -->
			<aside class="sidebar sticky_column">
				@include('home.sitebar_right')
			<!-- END .sidebar -->
			</aside>
		</div>
		<!-- BEGIN .content-panel -->
		<div class="content-panel">
			<div class="content-panel-body do-space">
				@if($adverts_main[$ads]->code != "")
					{{$adverts_main[$ads]->code}}
				@else
				<a href="{{$adverts_main[$ads]->link}}" target="_blank">
					<img src="{{url('img/images_bn/'.$adverts_main[$ads]->img)}}" alt="No image" width="100%" style="object-fit: contain; max-height: 150px; display: block;overflow:hidden; margin-bottom: 20px;" />
				</a>
				@endif
			</div>
		<!-- END .content-panel -->
		</div>

	<!-- END .wrapper -->
	</div>
@endsection