<?php
$hideOnMobile = '';
if (isset($categoriesOptions, $categoriesOptions['hide_on_mobile']) and $categoriesOptions['hide_on_mobile'] == '1') {
	$hideOnMobile = ' hidden-sm';
}
?>
@if (isset($categoriesOptions) and isset($categoriesOptions['type_of_display']))
	@includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.spacer', 'home.inc.spacer'], ['hideOnMobile' => $hideOnMobile])
	<div class="container{{ $hideOnMobile }}">
		<div class="col-xl-12 content-box layout-section">
			<div class="row row-featured row-featured-category">
				<div class="col-xl-12 box-title no-border">
					<div class="inner">
						<h2>
							<span class="headingcolor title-3">{{ t('Browse by') }} <span style="font-weight: bold;">{{ t('category') }}</span></span>
							<a href="{{ \App\Helpers\UrlGen::sitemap() }}" class="sell-your-item">
								{{ t('View more') }} <i class="icon-th-list"></i>
							</a>
						</h2>
					</div>
				</div>
				
				@if ($categoriesOptions['type_of_display'] == 'c_picture_icon')
					
					@if (isset($categories) and $categories->count() > 0)
						@foreach($categories as $key => $cat)
						
							     <?php if($cat->id == "135" || $cat->id=="146") {
							         
							         if($cat->id == "135"){
							     ?>
							     
							     @if(Illuminate\Support\Facades\Auth::check())
				                   <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 f-category">

								<a href="{{ \App\Helpers\UrlGen::category($cat) }}"> 
									<img src="{{ imgUrl($cat->picture, 'cat') }}" class="lazyload img-fluid" alt="{{ $cat->name }}">
									<h6>
										{{ $cat->name }}
										
										@if (config('settings.listing.count_categories_posts'))
											&nbsp;({{ $countPostsByCat->get($cat->id)->total ?? 0 }})
										@endif
									</h6>
								</a>
							</div>
								@endif
								
								<?php }
								if($cat->id == "146"){ ?>
								 @if(!Illuminate\Support\Facades\Auth::check())
								<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 f-category">

								<a href="{{ \App\Helpers\UrlGen::category($cat) }}"> 
									<img src="{{ imgUrl($cat->picture, 'cat') }}" class="lazyload img-fluid" alt="{{ $cat->name }}">
									<h6><?php //echo $cat->id; ?>
										{{ $cat->name }}
										
										@if (config('settings.listing.count_categories_posts'))
											&nbsp;({{ $countPostsByCat->get($cat->id)->total ?? 0 }})
										@endif
									</h6>
								</a></div>
								@endif
							<?php 
								}
							         
							     } else
								{ ?>
									<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 f-category">
								<a href="{{ \App\Helpers\UrlGen::category($cat) }}"> 
									<img src="{{ imgUrl($cat->picture, 'cat') }}" class="lazyload img-fluid" alt="{{ $cat->name }}">
									<h6>
									    
										{{ $cat->name }}
										
										@if (config('settings.listing.count_categories_posts'))
											&nbsp;({{ $countPostsByCat->get($cat->id)->total ?? 0 }})
										@endif
									</h6>
								</a>
								</div>
								<?php } ?>
						
						@endforeach
					@endif
					
				@elseif (in_array($categoriesOptions['type_of_display'], ['cc_normal_list', 'cc_normal_list_s']))
					
					<div style="clear: both;"></div>
					<?php $styled = ($categoriesOptions['type_of_display'] == 'cc_normal_list_s') ? ' styled' : ''; ?>
					
					@if (isset($categories) and $categories->count() > 0)
						<div class="col-xl-12">
							<div class="list-categories-children{{ $styled }}">
								<div class="row">
									@foreach ($categories as $key => $cols)
										<div class="col-md-4 col-sm-4 {{ (count($categories) == $key+1) ? 'last-column' : '' }}">
											@foreach ($cols as $iCat)
												
												<?php
													$randomId = '-' . substr(uniqid(rand(), true), 5, 5);
												?>
											
												<div class="cat-list">
													<h3 class="cat-title rounded">
														@if (isset($categoriesOptions['show_icon']) and $categoriesOptions['show_icon'] == 1)
															<i class="{{ $iCat->icon_class ?? 'icon-ok' }}"></i>&nbsp;
														@endif
														<a href="{{ \App\Helpers\UrlGen::category($iCat) }}">
															{{ $iCat->name }}
															@if (config('settings.listing.count_categories_posts'))
																&nbsp;({{ $countPostsByCat->get($iCat->id)->total ?? 0 }})
															@endif
														</a>
														<span class="btn-cat-collapsed collapsed"
															  data-toggle="collapse"
															  data-target=".cat-id-{{ $iCat->id . $randomId }}"
															  aria-expanded="false"
														>
															<span class="icon-down-open-big"></span>
														</span>
													</h3>
													<ul class="cat-collapse collapse show cat-id-{{ $iCat->id . $randomId }} long-list-home">
														@if (isset($subCategories) and $subCategories->has($iCat->id))
															@foreach ($subCategories->get($iCat->id) as $iSubCat)
																<li>
																	<a href="{{ \App\Helpers\UrlGen::category($iSubCat) }}">
																		{{ $iSubCat->name }}
																	</a>
																	@if (config('settings.listing.count_categories_posts'))
																		&nbsp;({{ $countPostsByCat->get($iSubCat->id)->total ?? 0 }})
																	@endif
																</li>
															@endforeach
														@endif
													</ul>
												</div>
											@endforeach
										</div>
									@endforeach
								</div>
							</div>
							<div style="clear: both;"></div>
						</div>
					@endif
					
				@else
					
					<?php
					$listTab = [
						'c_circle_list' => 'list-circle',
						'c_check_list'  => 'list-check',
						'c_border_list' => 'list-border',
					];
					$catListClass = (isset($listTab[$categoriesOptions['type_of_display']])) ? 'list ' . $listTab[$categoriesOptions['type_of_display']] : 'list';
					?>
					@if (isset($categories) and $categories->count() > 0)
						<div class="col-xl-12">
							<div class="list-categories">
								<div class="row">
									@foreach ($categories as $key => $items)
										<ul class="cat-list {{ $catListClass }} col-md-4 {{ (count($categories) == $key+1) ? 'cat-list-border' : '' }}">
											@foreach ($items as $k => $cat)
												<li>
													@if (isset($categoriesOptions['show_icon']) and $categoriesOptions['show_icon'] == 1)
														<i class="{{ $cat->icon_class ?? 'icon-ok' }}"></i>&nbsp;
													@endif
													<a href="{{ \App\Helpers\UrlGen::category($cat) }}">
														{{ $cat->name }}
													</a>
													@if (config('settings.listing.count_categories_posts'))
														&nbsp;({{ $countPostsByCat->get($cat->id)->total ?? 0 }})
													@endif
												</li>
											@endforeach
										</ul>
									@endforeach
								</div>
							</div>
						</div>
					@endif
					
				@endif
		
			</div>
		</div>
	</div>
@endif

@section('before_scripts')
	@parent
	@if (isset($categoriesOptions) and isset($categoriesOptions['max_sub_cats']) and $categoriesOptions['max_sub_cats'] >= 0)
		<script>
			var maxSubCats = {{ (int)$categoriesOptions['max_sub_cats'] }};
		</script>
	@endif
@endsection
