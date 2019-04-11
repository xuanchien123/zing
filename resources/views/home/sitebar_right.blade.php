{{-- tin moi nhat --}}
	<div class="widget">
		<h3>Tin mới nhất</h3>
		<div class="widget-article-list">
		<?php $count =0; ?>
		@foreach($lasted_news as $item_lt)
			@if($count <5)
			<div class="item">
				<div class="item-header">
					<a href="{{url('chi-tiet/'.$item_lt->slug)}}">
						<img src="{{url('/img/news/100x100/'.$item_lt->newimg)}}" alt="no img" width="80" />
					</a>
				</div>
				<div class="item-content">
					<h4><a href="{{url('chi-tiet/'.$item_lt->slug)}}">{{$item_lt->newsname}}</a></h4>
					<span class="item-meta">
						<a href="#"><i class="fa fa-clock-o"></i>{{$item_lt->created_at}}</a>
					</span>
				</div>
			</div>
			<div class="clearfix">
			
			</div>
			@endif
		<?php  $count = $count +1; ?>
		@endforeach
		</div>
	</div>

{{-- quang cao 1 --}}
<div class="widget">
		<div class="social-widget">
			<div class="item">
				<div class="item-header">
					@if($adverts_bottom[0]->code != "")
							{{$adverts_bottom[0]->code}}
					@else
					<a href="{{$adverts_bottom[0]->link}}">
						<img src="{{url('img/images_bn/'.$adverts_bottom[0]->img)}}" alt="No image" />
					</a>
					@endif
				</div>
			</div>
		</div>
	</div>

{{-- doc nhieu nhat --}}
<div class="widget">
	<h3>Đọc nhiều nhất</h3>
	<div class="widget-article-list">
	<?php $count =1; ?>
	@foreach($most_news as $item_most)
		@if($count <6)
		<div class="item">
			<div class="item-header">
				<a href="{{url('chi-tiet/'.$item_most->slug)}}" title="{{$item_most->newsname}}"> 
					<b><!-- {{$count}} --></b>  <img src="{{url('/img/news/100x100/'.$item_most->newimg)}}" alt="no img" width="80" />
				</a>
			</div>
			<div class="item-content">
				<h4><a href="{{url('chi-tiet/'.$item_most->slug)}}" title="{{$item_most->newsname}}">{{$item_most->newsname}}</a></h4>
				<span class="item-meta">
					<a href="#"><i class="fa fa-clock-o"></i>{{$item_most->created_at}}</a>
				</span>
			</div>
		</div>
		<div class="clearfix">
			
		</div>
		@endif
	<?php  $count = $count +1; ?>
	@endforeach
	</div>
</div>
{{-- quang cao 2 --}}
<div class="widget">
	<div class="social-widget">
		<div class="item">
			<div class="item-header">
				@if($adverts_bottom[1]->code != "")
					{{$adverts_bottom[1]->code}}
				@else
				<a href="{{$adverts_bottom[1]->link}}">
					<img src="{{url('img/images_bn/'.$adverts_bottom[1]->img)}}" alt="No image" />
				</a>
				@endif
			</div>
		</div>
		<div class="clearfix">
			
		</div>
	</div>
</div>