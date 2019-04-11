<div class="hidden-xs col-xs-12 col-md-9 nopadding">
	@foreach($modnews_cat as $hot)
	<div class="col-md-12">							
		<div class="content-panel-body article-list">
			<div class="item" data-color-top-slider="#867eef">
				<div class="item-header">
					<a href="{{url('chi-tiet/'.$hot->slug)}}">
						<span class="comment-tag"><i class="fa fa-comment-o"></i><span class="fb-comments-count" data-href="{{url('chi-tiet/'.$hot->slug)}}"></span><i></i></span>
						<span class="read-more-wrapper"><span class="read-more">Đọc thêm +<i></i></span></span>
						<img src="{{url('img/news/300x300/'.$hot->newimg)}}" alt="No image" />
					</a>
				</div>
				<div class="item-content">
					<h3><a href="{{url('chi-tiet/'.$hot->slug)}}">{{$hot->newsname}}</a></h3>
					<span class="item-meta">
						<a href="#"><i class="fa fa-clock-o"></i>{{$hot->created_at}}</a>
					</span>
					<p>{!! $hot->newintro !!}</p>	
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>	
<?php $i=0; ?>
@foreach($modnews_cat as $item)
@if($modnew->type ==0)
@if($i ==0 || $i ==7 ||$i ==0 ||$i ==13)
	<div class="visible-xs col-xs-12">
		<div class="mobile_hot_img">
			<a href="{{url('/chi-tiet/'.$item->slug)}}" title="{{$item->newsname}}">
				<img src="{{url('img/news/300x300/'.$item->newimg)}} " alt="{{$item->newimg}}">
			</a>
		</div>
		<div class="mobile_title">
			<a href="{{url('/chi-tiet/'.$item->slug)}}" title="{{$item->newsname}}"><h1>{{$item->newsname}}</h1></a>
		</div>
	</div>
@elseif($i<20)
	<div class="visible-xs col-xs-6 padding4">
		<div class="mobile_img">
			<a href="{{url('/chi-tiet/'.$item->slug)}}" title="{{$item->newsname}}">
				<img src="{{url('img/news/300x300/'.$item->newimg)}}" alt="{{$item->newsname}}">
			</a>
		</div>
		<div class="mobile_title">
			<a href="{{url('/chi-tiet/'.$item->slug)}}" title="{{$item->newsname}}"><h1>{{$item->newsname}}</h1></a>
		</div>
	</div>
@else 
	<div class="item">
		<div class="item-header">
			<a href="{{url('chi-tiet/'.$item->slug)}}" title="{{$item->newsname}}"> 
				<b>{{$count}}</b>  <img src="{{url('img/news/300x300/'.$item->newimg)}} " alt="no img" width="50" />
			</a>
		</div>
		<div class="item-content">
			<h4><a href="{{url('chi-tiet/'.$item->slug)}}" title="{{$item->newsname}}">{{$item->newsname}}</a></h4>
			<span class="item-meta">
				<a href="#"><i class="fa fa-clock-o"></i>{{$item->created_at}}</a>
			</span>
		</div>
	</div>
@endif
<?php $i = $i+1; ?>
@else
<div class="widget visible-xs">
	<div class="widget-article-list visible-xs">
		<div class="item">
			<div class="item-header">
				<a href="{{url('chi-tiet/'.$item->slug)}}">
					<img src="{{url('/img/news/100x100/'.$item->newimg)}}" alt="no img" width="80" />
				</a>
			</div>
			<div class="item-content">
				<h4><a href="{{url('chi-tiet/'.$item->slug)}}">{{$item->newsname}}</a></h4>
				<span class="item-meta">
					<a href="#"><i class="fa fa-clock-o"></i>{{$item->created_at}}</a>
				</span>
			</div>
		</div>
		<div class="clearfix">
		
		</div>
	</div>
</div>
@endif
@endforeach
