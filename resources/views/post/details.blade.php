{{--
 * LaraClassified - Classified Ads Web Application
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: https://bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from CodeCanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
--}}
@extends('layouts.master')

@section('robots_nofollow')
<!--<meta name="robots" property="robots" content="noindex, nofollow, noarchive">-->
{!! MetaTag::tag('robots') !!}
@endsection

@section('content')
	{!! csrf_field() !!}
	<input type="hidden" id="postId" name="post_id" value="{{ $post->id }}">
	
	@if (session()->has('flash_notification'))
		@includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
		<?php $paddingTopExists = true; ?>
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					@include('flash::message')
				</div>
			</div>
		</div>
		<?php session()->forget('flash_notification.message'); ?>
	@endif
	
	<div class="main-container">
		
		<?php if (isset($topAdvertising) and !empty($topAdvertising)): ?>
			@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.advertising.top', 'layouts.inc.advertising.top'], ['paddingTopExists' => $paddingTopExists ?? false])
		<?php
			$paddingTopExists = false;
		endif;
		?>

		
		<div class="container {{ (isset($topAdvertising) and !empty($topAdvertising)) ? 'mt-3' : 'mt-2' }}">
			<div class="row">
				<div class="col-md-12">
					
					<nav aria-label="breadcrumb" role="navigation" class="pull-left">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="icon-home fa"></i></a></li>
							<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ config('country.name') }}</a></li>
							@if (isset($catBreadcrumb) && is_array($catBreadcrumb) && count($catBreadcrumb) > 0)
								@foreach($catBreadcrumb as $key => $value)
									<li class="breadcrumb-item">
										<a href="{{ $value->get('url') }}">
											{!! $value->get('name') !!}
										</a>
									</li>
								@endforeach
							@endif
							<li class="breadcrumb-item active" aria-current="page">{{ \Illuminate\Support\Str::limit($post->title, 70) }}</li>
						</ol>
					</nav>
					
					<div class="pull-right backtolist">
						<a href="{{ rawurldecode(url()->previous()) }}"><i class="fa fa-angle-double-left"></i> {{ t('back_to_results') }}</a>
					</div>
				
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-lg-9 page-content col-thin-right">
					<div class="inner inner-box items-details-wrapper pb-0">
						<h2 class="enable-long-words">
							<strong>
								<a href="{{ \App\Helpers\UrlGen::post($post) }}" title="{{ $post->title }}">
									{{ $post->title }}
                                </a>
                            </strong>
							@if (config('settings.single.show_post_types'))
								@if (isset($post->postType) && !empty($post->postType))
									<small class="label label-default adlistingtype">{{ $post->postType->name }}</small>
								@endif
							@endif
							@if ($post->featured==1 && !empty($post->latestPayment))
								@if (isset($post->latestPayment->package) && !empty($post->latestPayment->package))
									<i class="icon-ok-circled tooltipHere"
									   style="color: {{ $post->latestPayment->package->ribbon }};"
									   title=""
									   data-placement="bottom"
									   data-toggle="tooltip"
									   data-original-title="{{ $post->latestPayment->package->short_name }}"
									></i>
								@endif
                            @endif
						</h2>
						<span class="info-row">
							@if (!config('settings.single.hide_dates'))
							<span class="date"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
								<i class="icon-clock"></i> {!! $post->created_at_formatted !!}
							</span>&nbsp;
							@endif
							<span class="category"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
								<i class="icon-folder-circled"></i> {{ (!empty($post->category->parent)) ? $post->category->parent->name : $post->category->name }}
							</span>&nbsp;
							<span class="item-location"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
								<i class="fas fa-map-marker-alt"></i> {{ $post->city->name }}
							</span>&nbsp;
							<!-- <span class="category"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
								<i class="icon-eye-3"></i> {{ \App\Helpers\Number::short($post->visits) }} {{ trans_choice('global.count_views', getPlural($post->visits)) }}
							</span> -->
						</span>
						
						<?php $picturesSlider = 'post.inc.pictures-slider.' . config('settings.single.pictures_slider', 'horizontal-thumb'); ?>
						@if (view()->exists($picturesSlider))
							@includeFirst([config('larapen.core.customizedViewPath') . $picturesSlider, $picturesSlider])
						@endif
						
						
						@if (config('plugins.reviews.installed'))
							@if (view()->exists('reviews::ratings-single'))
								@include('reviews::ratings-single')
							@endif
						@endif
						

						<div class="items-details">
							<ul class="nav nav-tabs" id="itemsDetailsTabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active"
									   id="item-details-tab"
									   data-toggle="tab"
									   href="#item-details"
									   role="tab"
									   aria-controls="item-details"
									   aria-selected="true"
									>
										<h4>{{ t('ad_details') }}</h4>
									</a>
								</li>
								@if (config('plugins.reviews.installed'))
									<li class="nav-item">
										<a class="nav-link"
										   id="item-{{ config('plugins.reviews.name') }}-tab"
										   data-toggle="tab"
										   href="#item-{{ config('plugins.reviews.name') }}"
										   role="tab"
										   aria-controls="item-{{ config('plugins.reviews.name') }}"
										   aria-selected="false"
										>
											<h4>
												{{ trans('reviews::messages.Reviews') }}
												@if (isset($rvPost) && !empty($rvPost))
												({{ $rvPost->rating_count }})
												@endif
											</h4>
										</a>
									</li>
								@endif
							</ul>
							
							<!-- Tab panes -->
							<div class="tab-content p-3 mb-3" id="itemsDetailsTabsContent">
								<div class="tab-pane show active" id="item-details" role="tabpanel" aria-labelledby="item-details-tab">
									<div class="row">
										<div class="items-details-info col-md-12 col-sm-12 col-12 enable-long-words from-wysiwyg">
											
											<div class="row">
												<!-- Location -->
												<div class="detail-line-lite col-md-6 col-sm-6 col-6">
													<div>
														<span><i class="fas fa-map-marker-alt"></i> {{ t('location') }}: </span>
														<span>
															<a href="{!! \App\Helpers\UrlGen::city($post->city) !!}">
																{{ $post->city->name }}
															</a>
														</span>
													</div>
												</div>
												
												@if (!in_array($post->category->type, ['not-salable']))
													<!-- Price / Salary -->
													<div class="detail-line-lite col-md-6 col-sm-6 col-6">
														<div>
															<span>
																{{ (!in_array($post->category->type, ['job-offer', 'job-search'])) ? t('price') : t('Salary') }}:
															</span>
															<span>
																@if (is_numeric($post->price) && $post->price > 0)
																	{!! \App\Helpers\Number::money($post->price) !!}
																@elseif(is_numeric($post->price) && $post->price == 0)
																	{!! t('free_as_price') !!}
																@else
																	{!! \App\Helpers\Number::money(' --') !!}
																@endif
																@if ($post->negotiable == 1)
																	<small class="label badge-success"> {{ t('negotiable') }}</small>
																@endif
															</span>
														</div>
													</div>
												@endif
											</div>
											<hr>
											
											<!-- Description -->
											<div class="row">
												<div class="col-12 detail-line-content">
													{!! transformDescription($post->description) !!}
												</div>
											</div>
											
											<!-- Custom Fields -->
											@includeFirst([config('larapen.core.customizedViewPath') . 'post.inc.fields-values', 'post.inc.fields-values'])
										
											<!-- Tags -->
											@if (!empty($post->tags))
												<?php $tags = array_map('trim', explode(',', $post->tags)); ?>
												@if (!empty($tags))
													<div class="row">
														<div class="tags col-12">
															<h4><i class="icon-tag"></i> {{ t('Tags') }}:</h4>
															@foreach($tags as $iTag)
																<a href="{{ \App\Helpers\UrlGen::tag($iTag) }}">
																	{{ $iTag }}
																</a>
															@endforeach
														</div>
													</div>
												@endif
											@endif
											
											<!-- Actions -->
											<div class="row detail-line-action text-center">
												<div class="col-4">
												@if (auth()->check())
													@if (auth()->user()->id == $post->user_id)
														<a href="{{ url('posts/' . $post->id . '/edit') }}">
															<i class="icon-pencil-circled tooltipHere"
															   data-toggle="tooltip"
															   data-original-title="{{ t('Edit') }}"
															></i>
														</a>
													@else
														{!! genEmailContactBtn($post, false, true) !!}
													@endif
												@else
													{!! genEmailContactBtn($post, false, true) !!}
												@endif
												</div>
												@if (isVerifiedPost($post))
													<div class="col-4">
														<a class="make-favorite" id="{{ $post->id }}" href="javascript:void(0)">
															@if (auth()->check())
																@if (isset($post->savedByLoggedUser) && $post->savedByLoggedUser->count() > 0)
																	<i class="fa fa-heart tooltipHere"
																	   data-toggle="tooltip"
																	   data-original-title="{{ t('Remove favorite') }}"
																	></i>
																@else
																	<i class="far fa-heart"
																	   class="tooltipHere"
																	   data-toggle="tooltip"
																	   data-original-title="{{ t('Save ad') }}"
																	></i>
																@endif
															@else
																<i class="far fa-heart"
																   class="tooltipHere"
																   data-toggle="tooltip"
																   data-original-title="{{ t('Save ad') }}"
																></i>
															@endif
														</a>
													</div>
													<div class="col-4">
														<a href="{{ url('posts/' . $post->id . '/report') }}">
															<i class="fa icon-info-circled-alt tooltipHere"
															   data-toggle="tooltip"
															   data-original-title="{{ t('Report abuse') }}"
															></i>
														</a>
													</div>
												@endif
											</div>
										</div>
										
										<br>&nbsp;<br>
									</div>
								</div>
								
								@if (config('plugins.reviews.installed'))
									@if (view()->exists('reviews::comments'))
										@include('reviews::comments')
									@endif
								@endif
							</div>
							<!-- /.tab content -->
									
							<!-- <div class="content-footer text-left">
								@if (auth()->check())
									@if (auth()->user()->id == $post->user_id)
										<a class="btn btn-default" href="{{ \App\Helpers\UrlGen::editPost($post) }}"><i class="fa fa-pencil-square-o"></i> {{ t('Edit') }}</a>
									@else
										{!! genPhoneNumberBtn($post) !!}
										{!! genEmailContactBtn($post) !!}
									@endif
								@else
									{!! genPhoneNumberBtn($post) !!}
									{!! genEmailContactBtn($post) !!}
								@endif
							</div> -->
						</div>
					</div>
					<!--/.items-details-wrapper-->
				</div>
				<!--/.page-content-->

				<div class="col-lg-3 page-sidebar-right">
					<aside>
						<div class="card card-user-info sidebar-card">
							@if (auth()->check() && auth()->id() == $post->user_id)
								<div class="card-header">{{ t('Manage Ad') }}</div>
							@else
								<div class="block-cell user">
									<div class="cell-media">
										<img src="{{ $post->user_photo_url }}" alt="{{ $post->contact_name }}">
									</div>
									<div class="cell-content">
										<h5 class="title">{{ t('Posted by') }}</h5>
										<span class="name">
											@if (isset($user) && !empty($user))
												<a href="{{ \App\Helpers\UrlGen::user($user) }}">
													{{ $post->contact_name }}
												</a>
											@else
												{{ $post->contact_name }}
											@endif
										</span>
										
										@if (config('plugins.reviews.installed'))
											@if (view()->exists('reviews::ratings-user'))
												@include('reviews::ratings-user')
											@endif
										@endif
										
									</div>
								</div>
							@endif
							
							<div class="card-content">
								<?php $evActionStyle = 'style="border-top: 0;"'; ?>
								@if (!auth()->check() || (auth()->check() && auth()->user()->getAuthIdentifier() != $post->user_id))
									<div class="card-body text-left">
										<div class="grid-col">
											<div class="col from">
												<i class="fas fa-map-marker-alt"></i>
												<span>{{ t('location') }}</span>
											</div>
											<div class="col to">
												<span>
													<a href="{!! \App\Helpers\UrlGen::city($post->city) !!}">
														{{ $post->city->name }}
													</a>
												</span>
											</div>
										</div>
										@if (!config('settings.single.hide_dates'))
											@if (isset($user) && !empty($user) && !is_null($user->created_at_formatted))
											<div class="grid-col">
												<div class="col from">
													<i class="fas fa-user"></i>
													<span>{{ t('Joined') }}</span>
												</div>
												<div class="col to">
													<span>{!! $user->created_at_formatted !!}</span>
												</div>
											</div>
											@endif
										@endif
									</div>
									<?php $evActionStyle = 'style="border-top: 1px solid #ddd;"'; ?>
								@endif
								
								<div class="ev-action" {!! $evActionStyle !!}>
									@if (auth()->check())
										@if (auth()->user()->id == $post->user_id)
											<a href="{{ \App\Helpers\UrlGen::editPost($post) }}" class="btn btn-default btn-block">
												<i class="fa fa-pencil-square-o"></i> {{ t('Update the Details') }}
											</a>
											@if (config('settings.single.publication_form_type') == '1')
												<a href="{{ url('posts/' . $post->id . '/photos') }}" class="btn btn-default btn-block">
													<i class="icon-camera-1"></i> {{ t('Update Photos') }}
												</a>
												@if (isset($countPackages) && isset($countPaymentMethods) && $countPackages > 0 && $countPaymentMethods > 0)
													<a href="{{ url('posts/' . $post->id . '/payment') }}" class="btn btn-success btn-block">
														<i class="icon-ok-circled2"></i> {{ t('Make It Premium') }}
													</a>
												@endif
											@endif
										@else
											{!! genPhoneNumberBtn($post, true) !!}
											{!! genEmailContactBtn($post, true) !!}
										@endif
										<?php
										try {
											if (auth()->user()->can(\App\Models\Permission::getStaffPermissions())) {
												$btnUrl = admin_url('blacklists/add') . '?email=' . $post->email;
												
												if (!isDemo($btnUrl)) {
													$cMsg = trans('admin.confirm_this_action');
													$cLink = "window.location.replace('" . $btnUrl . "'); window.location.href = '" . $btnUrl . "';";
													$cHref = "javascript: if (confirm('" . addcslashes($cMsg, "'") . "')) { " . $cLink . " } else { void('') }; void('')";
													
													$btnText = trans('admin.ban_the_user');
													$btnHint = trans('admin.ban_the_user_email', ['email' => $post->email]);
													$tooltip = ' data-toggle="tooltip" data-placement="bottom" title="' . $btnHint . '"';
													
													$btnOut = '';
													$btnOut .= '<a href="'. $cHref .'" class="btn btn-danger btn-block"'. $tooltip .'>';
													$btnOut .= $btnText;
													$btnOut .= '</a>';
													
													echo $btnOut;
												}
											}
										} catch (\Exception $e) {}
										?>
									@else
										{!! genPhoneNumberBtn($post, true) !!}
										{!! genEmailContactBtn($post, true) !!}
									@endif
								</div>
							</div>
						</div>
						
						@if (config('settings.single.show_post_on_googlemap'))
							<div class="card sidebar-card">
								<div class="card-header">{{ t('location_map') }}</div>
								<div class="card-content">
									<div class="card-body text-left p-0">
										<div class="ads-googlemaps">
											<iframe id="googleMaps" width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=""></iframe>
										</div>
									</div>
								</div>
							</div>
						@endif
						
						@if (isVerifiedPost($post))
							@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.social.horizontal', 'layouts.inc.social.horizontal'])
						@endif
						
						<div class="card sidebar-card">
							<div class="card-header">{{ t('Safety Tips for Buyers') }}</div>
							<div class="card-content">
								<div class="card-body text-left">
									<ul class="list-check">
										<li> {{ t('Meet seller at a public place') }} </li>
										<li> {{ t('Check the item before you buy') }} </li>
										<li> {{ t('Pay only after collecting the item') }} </li>
									</ul>
                                    <?php $tipsLinkAttributes = getUrlPageByType('tips'); ?>
                                    @if (!\Illuminate\Support\Str::contains($tipsLinkAttributes, 'href="#"') && !\Illuminate\Support\Str::contains($tipsLinkAttributes, 'href=""'))
									<p>
										<a class="pull-right" {!! $tipsLinkAttributes !!}>
                                            {{ t('Know more') }}
                                            <i class="fa fa-angle-double-right"></i>
                                        </a>
                                    </p>
                                    @endif
								</div>
							</div>
						</div>
					</aside>
				</div>
			</div>

		</div>
		
		@if (config('settings.single.similar_posts') == '1' || config('settings.single.similar_posts') == '2')
			@includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.featured', 'home.inc.featured'], ['firstSection' => false])
		@endif
		
		@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.advertising.bottom', 'layouts.inc.advertising.bottom'], ['firstSection' => false])
		
		@if (isVerifiedPost($post))
			@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.tools.facebook-comments', 'layouts.inc.tools.facebook-comments'], ['firstSection' => false])
		@endif
		
	</div>
@endsection
<?php
if (!session()->has('emailVerificationSent') && !session()->has('phoneVerificationSent')) {
	if (session()->has('message')) {
		session()->forget('message');
	}
}
?>

@section('modal_message')
	@if (config('settings.single.show_security_tips') == '1')
		@includeFirst([config('larapen.core.customizedViewPath') . 'post.inc.security-tips', 'post.inc.security-tips'])
	@endif
	@if (auth()->check() || config('settings.single.guests_can_contact_ads_authors')=='1')
		@includeFirst([config('larapen.core.customizedViewPath') . 'account.messenger.modal.create', 'account.messenger.modal.create'])
	@endif
@endsection

@section('after_styles')
	<!-- bxSlider CSS file -->
	@if (config('lang.direction') == 'rtl')
		<link href="{{ url('assets/plugins/bxslider/jquery.bxslider.rtl.css') }}" rel="stylesheet"/>
	@else
		<link href="{{ url('assets/plugins/bxslider/jquery.bxslider.css') }}" rel="stylesheet"/>
	@endif
@endsection

@section('before_scripts')
	<script>
		var showSecurityTips = '{{ config('settings.single.show_security_tips', '0') }}';
	</script>
@endsection

@section('after_scripts')
    @if (config('services.googlemaps.key'))
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.googlemaps.key') }}" type="text/javascript"></script>
    @endif

	<!-- bxSlider Javascript file -->
	<script src="{{ url('assets/plugins/bxslider/jquery.bxslider.min.js') }}"></script>
    
	<script>
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
		
		$(document).ready(function () {
			$('[rel="tooltip"]').tooltip({trigger: "hover"});
			
			@if (config('settings.single.show_post_on_googlemap'))
				/* Google Maps */
				getGoogleMaps(
				'{{ config('services.googlemaps.key') }}',
				'{{ (isset($post->city) && !empty($post->city)) ? addslashes($post->city->name) . ',' . config('country.name') : config('country.name') }}',
				'{{ config('app.locale') }}'
				);
			@endif
            
			/* Keep the current tab active with Twitter Bootstrap after a page reload */
            /* For bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line */
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                /* save the latest tab; use cookies if you like 'em better: */
                localStorage.setItem('lastTab', $(this).attr('href'));
            });
            /* Go to the latest tab, if it exists: */
            var lastTab = localStorage.getItem('lastTab');
            if (lastTab) {
                $('[href="' + lastTab + '"]').tab('show');
            }
		});
	</script>
@endsection