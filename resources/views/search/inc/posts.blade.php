 <?php
if (!isset($cacheExpiration)) {
    $cacheExpiration = (int)config('settings.optimization.cache_expiration');
}

$hideOnMobile = '';
?>
<style>
.desc{
    
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical;

}
@media (max-width: 767px) {
         .item-list{
        padding:10px 0px;
    }
    .mobtitle {
        padding-left:6%;
        font-size:12px;
        
        font-weight:bold;
    }
    .labelicon{
        position:absolute;
        margin-top:30%;
    }
      }
      
   
</style>
@if(isset($vip_lounch_add) and count($vip_lounch_add) > 0)
<div class="MultiCarousel" style="background-color:#ff0000; color:white; font-weight:bold; padding:4px;">
      <div>VIP Lounge Ad <img style="width:4%; border: 1px solid #9d5f04;border-radius: 16%;" src="{{url('images/vip.png')}}"></div>
      <span style=" margin-right: 6px; float: right; margin-top: -19px;"><i class="fa fa-info-circle"></i> <a href="{{url('posts/create')}}" style="color:white;">Want your ad here?</a></span>
   </div>

<div class="container">
		
			<div class="row row-featured row-featured-category">
		
				<div style="clear: both"></div>
		
				<div class="relative content featured-list-row clearfix">
					
					<div class="large-12 columns" id="vip_lounch">
						<div class="no-margin featured-list-slider owl-carousel vip_lounch owl-theme">
							@foreach($vip_lounch_add as $key => $post)
								<?php
								// Main Picture
								if ($post->pictures->count() > 0) {
									$postImg = imgUrl($post->pictures->get(0)->filename, 'medium');
								} else {
									$postImg = imgUrl(config('larapen.core.picture.default'), 'medium');
								}
								?>
								
								<div class="item">
									<a href="{{ \App\Helpers\UrlGen::post($post) }}">
										<span class="item-carousel-thumb">
											<!-- <span class="photo-count"><i class="fa fa-camera"></i> {{ $post->pictures->count() }} </span> -->
											<span class="vipicon2"> <img  src="{{url('images/vip.png')}}"></span>
											<img class="img-fluid rounded-circle" src="{{ $postImg }}" alt="{{ $post->title }}" style="border: 1px solid #e7e7e7; margin-top: 2px;">
										</span>
										
											{{ $post->city->name }}
									</a>	
									<a style="margin-left: 18px;margin-right: 18px;"  id="phoneModalLink" href="tel:{{$post->phone}}" class="btn btn-primary">
                    					<i class="icon-phone-1"></i> Call Now!
                    				</a>
										<!--<span class="item-name">{{$post->phone?$post->phone:\Illuminate\Support\Str::limit($post->title, 70) }}</span>-->
										
										@if (config('plugins.reviews.installed'))
											@if (view()->exists('reviews::ratings-list'))
												@include('reviews::ratings-list')
											@endif
										@endif
									
								</div>
							@endforeach
							
						</div>
					</div>
		
				</div>
			</div>
	
	</div>
@endif

@if(isset($galleryadd) and count($galleryadd) > 0)
	<div class="MultiCarousel MultiCarousel-gallery" style="background-color:#ff0000; color:white; font-weight:bold; padding:4px;">
      <div>Gallery Ad</div>
      <span style=" margin-right: 6px; float: right; margin-top: -19px;"><i class="fa fa-info-circle"></i> <a href="{{url('posts/create')}}" style="color:white;">Want your ad here?</a></span>
   </div>

<div class="MultiCarousel MultiCarousel-gallery container">
		
			<div class="row row-featured row-featured-category">
		
				<div style="clear: both"></div>
		
				<div class="relative content featured-list-row clearfix">
					
					<div class="large-12 columns" id="gallery_add">
						<div class="no-margin featured-list-slider owl-carousel owl-theme">
							@foreach($galleryadd as $key => $post)
								<?php
								// Main Picture
								if ($post->pictures->count() > 0) {
									$postImg = imgUrl($post->pictures->get(0)->filename, 'medium');
								} else {
									$postImg = imgUrl(config('larapen.core.picture.default'), 'medium');
								}
								?>
								
								<div class="item">
									<a href="{{ \App\Helpers\UrlGen::post($post) }}">
										<span class="item-carousel-thumb">
											<!-- <span class="photo-count"><i class="fa fa-camera"></i> {{ $post->pictures->count() }} </span> -->
											<img class="img-fluid" src="{{ $postImg }}" alt="{{ $post->title }}" style="border: 1px solid #e7e7e7; margin-top: 2px;">
										</span>
										<span class="item-name">{{ \Illuminate\Support\Str::limit($post->title, 70) }}</span>
										
										@if (config('plugins.reviews.installed'))
											@if (view()->exists('reviews::ratings-list'))
												@include('reviews::ratings-list')
											@endif
										@endif
										
										<!-- <span class="price">
											@if (isset($post->category, $post->category->type))
												@if (!in_array($post->category->type, ['not-salable']))
													@if (is_numeric($post->price) && $post->price > 0)
														{!! \App\Helpers\Number::money($post->price) !!}
													@elseif(is_numeric($post->price) && $post->price == 0)
														{!! t('free_as_price') !!}
													@else
														{!! \App\Helpers\Number::money(' --') !!}
													@endif
												@endif
											@else
												{{ '--' }}
											@endif
										</span> -->
									</a>
								</div>
							@endforeach
						</div>
					</div>
		
				</div>
			</div>
	
	</div>
@endif

	@if(isset($top_pole_add) and count($top_pole_add) > 0)

	    					
	   @if(isset($top_pole_add[0]->latestPayment->package_id))

	                	<?php
	                		if ($top_pole_add[0]->pictures->count() > 0) {
								$postImg = imgUrl($top_pole_add[0]->pictures->get(0)->filename, 'medium');
							} else {
								$postImg = imgUrl(config('larapen.core.picture.default'), 'medium');
							}

								
	                	?>

	                		<div class="item-list premium">
								

				<div class="cornerRibbons blue">
										<a href="#">Top</a>
									</div>
		
				<div class="row">
							<div class="col-sm-2 col-4 no-padding photobox">
								<div class="add-image">
									<!-- <span class="photo-count"><i class="fa fa-camera"></i> {{ $top_pole_add[0]->pictures->count() }} </span> -->
									<a href="{{ \App\Helpers\UrlGen::post($top_pole_add[0]) }}">
										<img class="lazyload img-thumbnail no-margin" src="{{ $postImg }}" alt="{{ $top_pole_add[0]->title }}">
									</a>
								</div>
							</div>
	
							<div class="col-sm-7 col-8 add-desc-box">
								<div class="items-details">
									<h5 class="add-title">
										<a href="{{ \App\Helpers\UrlGen::post($top_pole_add[0]) }}">{{ \Illuminate\Support\Str::limit($top_pole_add[0]->title, 30) }} 
										<img width="20" class="labelicon"src="/storage/app/verifylabel.png">
										</a>
									</h5>
									
									<span class="info-row">
										@if (config('settings.single.show_post_types'))
											@if (isset($top_pole_add[0]->postType) && !empty($top_pole_add[0]->postType))
												<span class="add-type business-ads tooltipHere"
													  data-toggle="tooltip"
													  data-placement="bottom"
													  title="{{ $top_pole_add[0]->postType->name }}"
												>
													{{ strtoupper(mb_substr($top_pole_add[0]->postType->name, 0, 1)) }}
												</span>&nbsp;
											@endif
										@endif
										@if (!config('settings.listing.hide_dates'))
											<span class="date"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
												<i class="icon-clock"></i> {!! $top_pole_add[0]->created_at_formatted !!}
											</span>
										@endif
										<span class="category"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
											<i class="icon-folder-circled"></i>&nbsp;
											@if (isset($top_pole_add[0]->category->parent) && !empty($top_pole_add[0]->category->parent))
												<a href="{!! \App\Helpers\UrlGen::category($top_pole_add[0]->category->parent, null, $city ?? null) !!}" class="info-link">
													{{ $top_pole_add[0]->category->parent->name }}
												</a>&nbsp;&raquo;&nbsp;
											@endif
											<a href="{!! \App\Helpers\UrlGen::category($top_pole_add[0]->category, null, $city ?? null) !!}" class="info-link">
												{{ $top_pole_add[0]->category->name }}
											</a>
										</span>
										<span class="item-location"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
											<i class="icon-location-2"></i>&nbsp;
											<a href="{!! \App\Helpers\UrlGen::city($top_pole_add[0]->city, null, $cat ?? null) !!}" class="info-link">
												{{ $top_pole_add[0]->city->name }}
											</a> {{ (isset($top_pole_add[0]->distance)) ? '- ' . round($top_pole_add[0]->distance, 2) . getDistanceUnit() : '' }}
										</span>

										<span >
											
										</span>
									</span>
								</div>
					
								@if (config('plugins.reviews.installed'))
									@if (view()->exists('reviews::ratings-list'))
										@include('reviews::ratings-list')
									@endif
								@endif
								
							</div>
		
				</div>
		</div>


	       @endif
	               
	@endif

	<div class="bp_promo--top"> <a href="{{url('posts/create')}}"> Want your ad here? <i style="width:24px; height:24px;" class="yicon fa fa-thumbs-up"></i> </a> </div>

@if (isset($posts) && $posts->total() > 0)
	<?php
	$loop=0;
	if (!isset($cats)) {
		$cats = collect([]);
	}

	foreach($posts->items() as $key => $post):
		if (empty($post->city)) continue;
		
		// Main Picture
		if ($post->pictures->count() > 0) {
			$postImg = imgUrl($post->pictures->get(0)->filename, 'medium');
		} else {
			$postImg = imgUrl(config('larapen.core.picture.default'), 'medium');
		}
		
    
// 		echo "<pre>";
// 		print_r($post->latestPayment);
// 		die();
		
	?>


	@if(isset($post->package_id) && ($post->package_id != 2 || $post->package_id != 4))

	<div class="item-list" @if(isset($post->package_id) && $post->package_id == 2) style="background-color:#fac00891" @endif>
		
		@if(isset($post->active) && ($post->active==1)) 
		
			@if (isset($post->latestPayment, $post->latestPayment->package) && !empty($post->latestPayment->package))
			   
				@if ($post->latestPayment->package->ribbon != '')
					<div class="cornerRibbons orange">
						<a href="#"> TOP</a>
					</div>
				@endif
			@endif
		@endif
	
			<a class="mobtitle" href="{{ \App\Helpers\UrlGen::post($post) }}">{{ \Illuminate\Support\Str::limit($post->title, 40) }} 
						</a>
						
		<div class="row">
		    
					
					
			<div class="col-sm-2 " style="width:33%;padding: 0px;">
				
					<!-- <span class="photo-count"><i class="fa fa-camera"></i> {{ $post->pictures->count() }} </span> -->

					
					<a href="{{ \App\Helpers\UrlGen::post($post) }}">
						 
						@if($post->package_id == 2)
						<span class="vipicon"> <img src="{{url('images/vip.png')}}"></span>
						<img class="lazyload img-thumbnail no-margin" style="height:88%" src="{{ $postImg }}" alt="{{ $post->title }}">
						@else
						<img class="lazyload img-thumbnail no-margin" style="height:88%" src="{{ $postImg }}" alt="{{ $post->title }}">
						@endif

					</a>
			
			</div>
		
			<div class="col-sm-10 col-8 add-desc-box">
				<div class="items-details">
					<h5 class="add-title desktoptitle">

						</b><a href="{{ \App\Helpers\UrlGen::post($post) }}"><b>{{ \Illuminate\Support\Str::limit($post->title, 70) }} </b>
						</a>
						
					</h5>
                    
                    
                    
					  @if($post->description)
				        <p class="desc">
                        {!! \Illuminate\Support\Str::limit(strip_tags($post->description)) !!}
                        
                        </p>
                        
					    @endif
					   
					<span class="info-row">
						@if (config('settings.single.show_post_types'))
							@if (isset($post->postType) && !empty($post->postType))
								<span class="add-type business-ads tooltipHere"
									  data-toggle="tooltip"
									  data-placement="bottom"
									  title="{{ $post->postType->name }}"
								>
									{{ strtoupper(mb_substr($post->postType->name, 0, 1)) }}
								</span>&nbsp;
								
							@endif
						@endif
						@if (!config('settings.listing.hide_dates'))
							<span class="date"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
								<i class="icon-clock"></i> {!! $post->created_at_formatted !!}
							</span>
						@endif
						<span class="category"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
							<i class="icon-folder-circled"></i>&nbsp;
							@if (isset($post->category->parent) && !empty($post->category->parent))
								<a href="{!! \App\Helpers\UrlGen::category($post->category->parent, null, $city ?? null) !!}" class="info-link">
									{{ $post->category->parent->name }}
								</a>&nbsp;&raquo;&nbsp;
							@endif
							<a href="{!! \App\Helpers\UrlGen::category($post->category, null, $city ?? null) !!}" class="info-link">
								{{ $post->category->name }}
							</a>
						</span>
						<span class="item-location"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
							<i class="icon-location-2"></i>&nbsp;
							<a href="{!! \App\Helpers\UrlGen::city($post->city, null, $cat ?? null) !!}" class="info-link">
								{{ $post->city->name }}
							</a> {{ (isset($post->distance)) ? '- ' . round($post->distance, 2) . getDistanceUnit() : '' }}
						</span>
						
					@if(isset($post->package_id) && ($post->package_id==2))
						 <span class=" float-right" style="color:#639;">VIP Sponsored  Ad</span>
					@elseif(isset($post->package_id) && ($post->package_id==3))
						 <span class=" float-right" style="color:#639;"><?php echo json_decode($post->name)->en ?></span>
					@elseif(isset($post->package_id) && ($post->package_id==5))
						 <span class=" float-right" style="color:#639;">Premium Sponsored Ad</span>
					@elseif(isset($post->package_id))	 
					<span class=" float-right" style="color:#639;"><?php echo json_decode($post->name)->en ?></span>
					@endif
					
					<span>@if(isset($post->status) && ($post->status==1))   <i class="fas fa-hourglass-end"></i>  Expire @endif</span>
					</span>
				</div>
	
				@if (config('plugins.reviews.installed'))
					@if (view()->exists('reviews::ratings-list'))
						@include('reviews::ratings-list')
					@endif
				@endif
				
			</div>
			
			<!-- <div class="col-sm-3 col-12 text-right price-box" style="white-space: nowrap;"> -->
				<!-- <h4 class="item-price">
					@if (isset($post->category->type))
						@if (!in_array($post->category->type, ['not-salable']))
							@if (is_numeric($post->price) && $post->price > 0)
								{!! \App\Helpers\Number::money($post->price) !!}
							@elseif(is_numeric($post->price) && $post->price == 0)
								{!! t('free_as_price') !!}
							@else
								{!! \App\Helpers\Number::money(' --') !!}
							@endif
						@endif
					@else
						{{ '--' }}
					@endif
				</h4> -->
			
				<!-- @if (isset($post->latestPayment, $post->latestPayment->package) && !empty($post->latestPayment->package))
					@if ($post->latestPayment->package->has_badge == 1)
						<a class="btn btn-danger btn-sm make-favorite">
							<i class="fa fa-certificate"></i>
							<span> {{ $post->latestPayment->package->short_name }} </span>
						</a>&nbsp;
					@endif
				@endif
				@if (isset($post->savedByLoggedUser) && $post->savedByLoggedUser->count() > 0)
					<a class="btn btn-success btn-sm make-favorite" id="{{ $post->id }}">
						<i class="fa fa-heart"></i><span> {{ t('Saved') }} </span>
					</a>
				@else
					<a class="btn btn-default btn-sm make-favorite" id="{{ $post->id }}">
						<i class="fa fa-heart"></i><span> {{ t('Save') }} </span>
					</a>
				@endif -->
			<!-- </div> -->
		</div>
	</div>
	<?php
	     $loop++;
	     
	   // var_dump($loop);
	   // die('herer');
	
	?>
	@if($loop == 4)
	<div class="item-list notgridad compact-item "> 
	<form method="get" id="postForm" action="{{url('posts/create')}}">

	<div class="row">
	
	<div class="col-xs-12 col-sm-12" style="margin:5px 0px;">
	<input type="text" name="title" placeholder="Enter Your Title" class="form-control" style="margin-bottom:5px; font-size:15px;">
	<button type="button" id="postthisform" class=" btn btn-danger btn-block" style="font-size:18px"><i class="fa fa-plus-circle"></i> Post Free Ad</button>
	</div>
	
	</div>
	</form>
	</div>
	
	@endif
	@else
	
		<div class="item-list" @if(isset($post->package_id) && $post->package_id == 2) style="background-color:#fac00891" @endif>
		@if ($post->featured == 1)
			@if (isset($post->latestPayment, $post->latestPayment->package) && !empty($post->latestPayment->package))
			 	@if ($post->latestPayment->package->ribbon != '')
			
					<div class="cornerRibbons orange">
						<a href="#">Top</a>
					</div>
				@endif
			@endif
		@endif
			<a class="mobtitle" href="{{ \App\Helpers\UrlGen::post($post) }}">{{ \Illuminate\Support\Str::limit($post->title, 40) }} 
						</a>
						
		<div class="row">
		    
					
					
			<div class="col-sm-2 " style="width:33%;padding: 0px;">
				
					<!-- <span class="photo-count"><i class="fa fa-camera"></i> {{ $post->pictures->count() }} </span> -->

					
					<a href="{{ \App\Helpers\UrlGen::post($post) }}">
						 
						@if($post->package_id == 2)
						<span class="vipicon"> <img src="{{url('images/vip.png')}}"></span>
						<img class="lazyload img-thumbnail no-margin" style="height:88%" src="{{ $postImg }}" alt="{{ $post->title }}">
						@else
						<img class="lazyload img-thumbnail no-margin" style="height:88%" src="{{ $postImg }}" alt="{{ $post->title }}">
						@endif

					</a>
			
			</div>
		
			<div class="col-sm-10 col-8 add-desc-box">
				<div class="items-details">
					<h5 class="add-title desktoptitle">

						</b><a href="{{ \App\Helpers\UrlGen::post($post) }}"><b>{{ \Illuminate\Support\Str::limit($post->title, 70) }} </b>
						</a>
						
					</h5>
                    
                    
                    
					  @if($post->description)
				        <p class="desc">
                        {!! \Illuminate\Support\Str::limit(strip_tags($post->description)) !!}
                        
                        </p>
                        
					    @endif
					   
					<span class="info-row">
						@if (config('settings.single.show_post_types'))
							@if (isset($post->postType) && !empty($post->postType))
								<span class="add-type business-ads tooltipHere"
									  data-toggle="tooltip"
									  data-placement="bottom"
									  title="{{ $post->postType->name }}"
								>
									{{ strtoupper(mb_substr($post->postType->name, 0, 1)) }}
								</span>&nbsp;
								
							@endif
						@endif
						@if (!config('settings.listing.hide_dates'))
							<span class="date"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
								<i class="icon-clock"></i> {!! $post->created_at_formatted !!}
							</span>
						@endif
						<span class="category"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
							<i class="icon-folder-circled"></i>&nbsp;
							@if (isset($post->category->parent) && !empty($post->category->parent))
								<a href="{!! \App\Helpers\UrlGen::category($post->category->parent, null, $city ?? null) !!}" class="info-link">
									{{ $post->category->parent->name }}
								</a>&nbsp;&raquo;&nbsp;
							@endif
							<a href="{!! \App\Helpers\UrlGen::category($post->category, null, $city ?? null) !!}" class="info-link">
								{{ $post->category->name }}
							</a>
						</span>
						<span class="item-location"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
							<i class="icon-location-2"></i>&nbsp;
							<a href="{!! \App\Helpers\UrlGen::city($post->city, null, $cat ?? null) !!}" class="info-link">
								{{ $post->city->name }}
							</a> {{ (isset($post->distance)) ? '- ' . round($post->distance, 2) . getDistanceUnit() : '' }}
						</span>
						
					@if(isset($post->package_id) && ($post->package_id==2))
						 <span class=" float-right" style="color:#639;">VIP Sponsored  Ad</span>
					@elseif(isset($post->package_id) && ($post->package_id==3))
						 <span class=" float-right" style="color:#639;"><?php echo json_decode($post->name)->en ?></span>
					@elseif(isset($post->package_id) && ($post->package_id==5))
						 <span class=" float-right" style="color:#639;">Premium Sponsored Ad</span>
					@elseif(isset($post->package_id))	 
					<span class=" float-right" style="color:#639;"><?php echo json_decode($post->name)->en ?></span>
					@endif
					</span>
					
				</div>
	
				@if (config('plugins.reviews.installed'))
					@if (view()->exists('reviews::ratings-list'))
						@include('reviews::ratings-list')
					@endif
				@endif
				
			</div>
			
			<!-- <div class="col-sm-3 col-12 text-right price-box" style="white-space: nowrap;"> -->
				<!-- <h4 class="item-price">
					@if (isset($post->category->type))
						@if (!in_array($post->category->type, ['not-salable']))
							@if (is_numeric($post->price) && $post->price > 0)
								{!! \App\Helpers\Number::money($post->price) !!}
							@elseif(is_numeric($post->price) && $post->price == 0)
								{!! t('free_as_price') !!}
							@else
								{!! \App\Helpers\Number::money(' --') !!}
							@endif
						@endif
					@else
						{{ '--' }}
					@endif
				</h4> -->
			
				<!-- @if (isset($post->latestPayment, $post->latestPayment->package) && !empty($post->latestPayment->package))
					@if ($post->latestPayment->package->has_badge == 1)
						<a class="btn btn-danger btn-sm make-favorite">
							<i class="fa fa-certificate"></i>
							<span> {{ $post->latestPayment->package->short_name }} </span>
						</a>&nbsp;
					@endif
				@endif
				@if (isset($post->savedByLoggedUser) && $post->savedByLoggedUser->count() > 0)
					<a class="btn btn-success btn-sm make-favorite" id="{{ $post->id }}">
						<i class="fa fa-heart"></i><span> {{ t('Saved') }} </span>
					</a>
				@else
					<a class="btn btn-default btn-sm make-favorite" id="{{ $post->id }}">
						<i class="fa fa-heart"></i><span> {{ t('Save') }} </span>
					</a>
				@endif -->
			<!-- </div> -->
		</div>
	</div>
	<?php
	     $loop++;
	     
	   // var_dump($loop);
	   // die('herer');
	
	?>
	@if($loop == 4)
	<div class="item-list notgridad compact-item "> 
	<form method="get" id="postForm" action="{{url('posts/create')}}">

	<div class="row">
	
	<div class="col-xs-12 col-sm-12" style="margin:5px 0px;">
	<input type="text" name="title" placeholder="Enter Your Title" class="form-control" style="margin-bottom:5px; font-size:15px;">
	<button type="button" id="postthisform" class=" btn btn-danger btn-block" style="font-size:18px"><i class="fa fa-plus-circle"></i> Post Free Ad</button>
	</div>
	
	</div>
	</form>
	</div>
	
	@endif
	@endif
	
	


	
	
	<?php endforeach; ?>
	
@else

	<div class="p-4" style="width: 100%;">
		{{ t('no_result_refine_your_search') }}
	</div>
@endif

@section('after_scripts')
	@parent
	
	<script>
	
	$(document).ready(function () {
   	/*==================================
	 Carousel
	 ==================================*/
	
	/* Featured Listings Carousel */
	var carouselObject = $('.vip_lounch');
	var responsiveObject = {
		0: {
			items: 1,
			nav: true
		},
		576: {
			items: 2,
			nav: false
		},
		768: {
			items: 3,
			nav: false
		},
		992: {
			items: 5,
			nav: false,
			loop: (carouselItems > 5) ? true : false
		}
	};
	carouselObject.owlCarousel({
		rtl: false,
		nav: false,
		navText: [carouselLang.navText.prev, carouselLang.navText.next],
		loop: true,
		responsiveClass: true,
		responsive: responsiveObject,
		autoWidth: true,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true
	});
	
});


	</script>

	<script>
		/* Default view (See in /js/script.js) */
		@if ($count->get('all') > 0)
			@if (config('settings.listing.display_mode') == '.grid-view')
				gridView('.grid-view');
			@elseif (config('settings.listing.display_mode') == '.list-view')
				listView('.list-view');
			@elseif (config('settings.listing.display_mode') == '.compact-view')
				compactView('.compact-view');
			@else
				gridView('.grid-view');
			@endif
		@else
			listView('.list-view');
		@endif
		/* Save the Search page display mode */
		var listingDisplayMode = readCookie('listing_display_mode');
		if (!listingDisplayMode) {
			createCookie('listing_display_mode', '{{ config('settings.listing.display_mode', '.grid-view') }}', 7);
		}
		
		/* Favorites Translation */
		var lang = {
			labelSavePostSave: "{!! t('Save ad') !!}",
			labelSavePostRemove: "{!! t('Remove favorite') !!}",
			loginToSavePost: "{!! t('Please log in to save the Ads') !!}",
			loginToSaveSearch: "{!! t('Please log in to save your search') !!}",
			confirmationSavePost: "{!! t('Post saved in favorites successfully') !!}",
			confirmationRemoveSavePost: "{!! t('Post deleted from favorites successfully') !!}",
			confirmationSaveSearch: "{!! t('Search saved successfully') !!}",
			confirmationRemoveSaveSearch: "{!! t('Search deleted successfully') !!}"
		};
	</script>
@endsection
