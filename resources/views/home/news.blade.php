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
					<div class="content-panel-body article-header">
						<strong class="category-link">
						@if($itemnews->idlistnew !="")
							Danh mục : <a href="{{url('loai-tin/'.$itemnews->list_name($itemnews->idlistnew)['slug'])}}">{{ $itemnews->list_name($itemnews->idlistnew)['listname'] }}</a>
						@elseif($itemnews->idmodnew !="")
							Danh mục : <a href="{{url('loai-tin/'.$itemnews->mod_name($itemnews->idmodnew)['slug'])}}">{{ $itemnews->mod_name($itemnews->idmodnew)['modname'] }}</a>
						@endif
						</strong>
						<h2>{{$itemnews->newsname}}</h2>
						<div class="article-meta">
							<a href="#" class="meta-item">{{$itemnews->newuser}}</a>
							<a href="#" class="meta-item">{{ $itemnews->created_at }}</a>							
							<a href="#comments" class="meta-item"><span class="fb-comments-count" data-href="{{url()->current()}}"></span> Bình Luận</a>
							<a href="#" title="" class="meta-item">{{ $itemnews->view_count }} Lượt xem</a>
							@if($itemnews->dangky !="")
							<a class="btn btn-danger" id="btn_dangky" title="Cách đăng ký" data-toggle="modal" href='#modal_popup'>Đăng Ký</a>
							@endif
						</div>
					</div>
					<div class="content-panel-body shortcode-content">
						{!! $itemnews->newintro !!}
					</div>
				<!-- END .content-panel -->
				</div>
				
				<!-- BEGIN .content-panel -->
				<div class="content-panel">
					<div class="content_news">
						<div class="share_news">
							<div class="fb-share-button" 
							    data-href="{{url()->current()}}" 
							    data-mobile_iframe="true"
							    data-layout="button">
							 </div> <hr style="margin: 5px;">
							 <!-- Đặt thẻ này vào nơi bạn muốn nút chia sẻ kết xuất. -->
						<div class="g-plus" data-action="share" data-annotation="bubble" data-height="24" data-href="{{url()->current()}}"></div>
						</div>
						{!! $itemnews->newcontent !!}
					</div>
					
					<div class="text-center">
						@if($itemnews->dangky !="")
							<a class="btn btn-danger" id="btn_dangky" title="Cách đăng ký" data-toggle="modal" href='#modal_popup'>Đăng Ký Ngay</a>
						@endif
					</div>
				<!-- END .content-panel -->
				</div>
				<hr>
				<!-- BEGIN .content-panel -->
				<div class="content-panel">
					<div class="content-panel-body article-main-share" style="line-height: 7px;">
						<span class="share-front"><i class="fa fa-share-alt"></i>Share</span>
						<div class="fb-share-button" 
						    data-href="{{url()->current()}}" 
						    data-layout="button_count">
						  </div>	
						  <div class="g-plus" data-action="share" data-annotation="bubble" data-height="24" data-href="{{url()->current()}}"></div>					
					</div>
				<!-- END .content-panel -->
				</div>
				
				<!-- BEGIN .content-panel -->
				<div class="content-panel">
					<div class="content-panel-body article-main-tags">
						<span class="tags-front"><i class="fa fa-tags"></i>Tags</span>
					<?php 
						if($itemnews->newtag !=""){
							$tags = explode(", ", $itemnews->newtag);
						}
					?>
					@if(!empty($tags))
						@for($count=0; $count < count($tags);$count ++ )
							<a href="{{url('/tags/'.$tags[$count])}}">{{$tags[$count]}}</a>
						@endfor
					@endif
					</div>
				<!-- END .content-panel -->
				</div>
				
				<!-- BEGIN .content-panel -->
				<div class="content-panel">
					<div class="content-panel-body do-space">
						<a href="{{$adverts_main[0]->link}}" target="_blank">
							<img src="{{url('img/images_bn/'.$adverts_main[0]->img)}}" alt="No image" width="100%" style="object-fit: contain; max-height: 150px; display: block;overflow:hidden; margin-bottom: 20px;" />
						</a>
					</div>
				<!-- END .content-panel -->
				</div>
				<!-- BEGIN .content-panel -->
				<div class="content-panel">
					<div class="content-panel-title">
						<h2> Ý kiến của bạn</h2>
					</div>
					<div class="content-panel-body comment-list">						
						<div class="fb-comments" data-href="{{url()->current()}}" data-width="100%" data-numposts="5"></div>
					</div>
				<!-- END .content-panel -->
				</div>
				<!-- BEGIN .content-panel -->
			@if($new_in_list_active->count()>0)
				<div class="content-panel widget">
					<div class="content-panel-title">						
						<h2>Đọc tiếp</h2>
					</div>
					<!-- BEGIN .top-slider-body -->
					<div class="top-slider-body" data-top-slider-timeout="6000" data-top-slider-autostart="false">
						<div class="widget-article-list">
						@foreach($new_in_list_active as $item_lt )
						<div class="col-md-6">
							<div class="item">
								<div class="item-header">
									<a href="{{url('chi-tiet/'.$item_lt->slug)}}">
										<img src="{{url('/img/news/100x100/'.$item_lt->newimg)}}" alt="no img" width="50" /></a>
								</div>
								<div class="item-content">
									<h4><a href="{{url('chi-tiet/'.$item_lt->slug)}}">{{$item_lt->newsname}}</a></h4>
									<span class="item-meta">
										<a href="#"><i class="fa fa-clock-o"></i>{{$item_lt->created_at}}</a>
									</span>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					</div>
				<!-- END .content-panel -->
				</div>
			@endif
			<!-- END .content-block-single -->
			</div>

			<!-- BEGIN .sidebar -->
			<aside class="sidebar sticky_column">
				@include('home.sitebar_right')
			<!-- END .sidebar -->
			</aside>
		</div>
		

	<!-- END .wrapper -->
	</div>
@endsection