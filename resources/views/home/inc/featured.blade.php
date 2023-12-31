<?php

if (!isset($cacheExpiration)) {
    $cacheExpiration = (int)config('settings.optimization.cache_expiration');
}
$hideOnMobile = '';
if (isset($featuredOptions, $featuredOptions['hide_on_mobile']) and $featuredOptions['hide_on_mobile'] == '1') {
	$hideOnMobile = ' hidden-sm';
}
?>
@if (isset($featured) and !empty($featured) and $featured->posts->count() > 0)
	@includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.spacer', 'home.inc.spacer'], ['hideOnMobile' => $hideOnMobile])
	<div class="container{{ $hideOnMobile }}">
		<div class="col-xl-12 content-box layout-section">
			<div class="row row-featured row-featured-category">
				<div class="col-xl-12 box-title">
					<div class="inner">
						<h2>
						  
							<span class="title-3">{!! $featured->title !!}</span>
							<a href="/category/{{ $featured->posts[0]->category->parent->name}}" class="sell-your-item">
								{{ t('View more') }} <i class="icon-th-list"></i>
							</a>
						</h2>
					</div>
				</div>
	
				<div style="clear: both"></div>
		
				<div class="relative content featured-list-row clearfix">
					
					<div class="large-12 columns">
						<div class="no-margin featured-list-slider owl-carousel owl-theme">
						    
							@foreach($featured->posts as $key => $post)
							
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
											<span class="photo-count"><i class="fa fa-camera"></i> {{ $post->pictures->count() }} </span>
											<img class="img-fluid" src="{{ $postImg }}" alt="{{ $post->title }}" style="border: 1px solid #e7e7e7; margin-top: 2px;">
										</span>
										<span class="item-name">{{ \Illuminate\Support\Str::limit($post->title, 70) }}</span>
										
										@if (config('plugins.reviews.installed'))
											@if (view()->exists('reviews::ratings-list'))
												@include('reviews::ratings-list')
											@endif
										@endif
										
										<span class="price">
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
										</span>
									</a>
								</div>
							
							@endforeach
						</div>
					</div>
		
				</div>
			</div>
		</div>
	</div>
@endif

@section('after_style')
	@parent
@endsection

@section('before_scripts')
	@parent
	<script>
		/* Carousel Parameters */
		var carouselItems = {{ (isset($featured) and isset($featured->posts)) ? collect($featured->posts)->count() : 0 }};
		var carouselAutoplay = {{ (isset($featuredOptions) && isset($featuredOptions['autoplay'])) ? $featuredOptions['autoplay'] : 'false' }};
		var carouselAutoplayTimeout = {{ (isset($featuredOptions) && isset($featuredOptions['autoplay_timeout'])) ? $featuredOptions['autoplay_timeout'] : 1500 }};
		var carouselLang = {
			'navText': {
				'prev': "{{ t('prev') }}",
				'next': "{{ t('next') }}"
			}
		};
	</script>
@endsection