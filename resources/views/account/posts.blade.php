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

<style>
    @media only screen and (max-width: 900px) {
        .diplay-section-mobile-none{
         display:block;
        }
        
        .display-body-section-mobile
        {
            font-size:14px;
            margin-top:20px;
            text-align:center;
        }
    }
    
    .premimum-btn {
            position: relative;
            padding: 4px 1em;
            margin: 4px;
            color: white;
            border-radius: 10px;
            border: none !important;
            width: 74%;
            white-space: nowrap;
        }
    
    
    
</style>

@section('content')
	@includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
	<div class="main-container">
		<div class="container">
			<div class="row">
				
				@if (session()->has('flash_notification'))
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-12">
								@include('flash::message')
							</div>
						</div>
					</div>
				@endif
				
				<div class="col-md-3 page-sidebar">
					@includeFirst([config('larapen.core.customizedViewPath') . 'account.inc.sidebar', 'account.inc.sidebar'])
				</div>
				<!--/.page-sidebar-->

				<div class="col-md-9 page-content">
					<div class="inner-box" style="background: #F5F5F5 !important;">
	
						
						@if ($pagePath=='my-posts')
							<h2 class="title-2"><i class="fa fa-bullhorn"></i> {{ t('my_ads') }} </h2>
						@elseif ($pagePath=='archived')
							<h2 class="title-2"><i class="icon-folder-close"></i> {{ t('archived_ads') }} </h2>
						@elseif ($pagePath=='favourite')
							<h2 class="title-2"><i class="icon-heart-1"></i> {{ t('favourite_ads') }} </h2>
						@elseif ($pagePath=='pending-approval')
							<h2 class="title-2"><i class="icon-hourglass"></i> {{ t('pending_approval') }} </h2>
						@elseif ($pagePath=='my-wallet')
							<h2 class="title-2"><i class="icon-hourglass"></i> My Wallet </h2>
						@else
							<h2 class="title-2"><i class="icon-docs"></i> {{ t('posts') }} </h2>
						@endif
					
						
						<div class="table-responsive">
							<form name="listForm" method="POST" action="{{ url('account/' . $pagePath . '/delete') }}">
								{!! csrf_field() !!}
								<div class="table-action">
									<div class="btn-group hidden-sm">
										<button type="button" class="btn btn-sm btn-secondary">
											<div class="form-check p-0 m-0" style="height: 13px;">
												<input type="checkbox" id="checkAll" class="from-check-all">
											</div>
										</button>
										<button type="button" class="btn btn-sm btn-secondary from-check-all">
											{{ t('Select') }}: {{ t('All') }}
										</button>
									</div>
									
									<button type="submit" class="btn btn-sm btn-default delete-action">
										<i class="fa fa-trash"></i> {{ t('Delete') }}
									</button>
									
									<div class="table-search pull-right col-sm-7">
										<div class="form-group">
											<div class="row">
												<label class="col-sm-5 control-label text-right">{{ t('search') }} <br>
													<a title="clear filter" class="clear-filter" href="#clear">[{{ t('clear') }}]</a>
												</label>
												<div class="col-sm-7 searchpan">
													<input type="text" class="form-control" id="filter">
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
    									if (isset($posts) && $posts->count() > 0):
    									foreach($posts as $key => $post):
    										// Fixed 1
    										if ($pagePath == 'favourite') {
    											if (isset($post->post)) {
    												if (!empty($post->post)) {
    													$post = $post->post;
    												} else {
    													continue;
    												}
    											} else {
    												continue;
    											}
    										}
    
    										// Fixed 2
    										if (!$countries->has($post->country_code)) continue;
    
    										// Get Post's URL
    										$postUrl = \App\Helpers\UrlGen::post($post);
                                        
                                        	// Get Post's Pictures
                                            if ($post->pictures->count() > 0) {
                                                $postImg = imgUrl($post->pictures->get(0)->filename, 'medium');
                                            } else {
                                                $postImg = imgUrl(config('larapen.core.picture.default'), 'medium');
                                            }
    
                                        	// Get country flag
                                        	$countryFlagPath = 'images/flags/16/' . strtolower($post->country_code) . '.png';
 							    ?>
                                    <div class="card mb-2" style="width:100%;">
                                        <div class="card-header" style="background:#E6E6E6 !important;">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-8 col-sm-12 col-md-12">
      												  <label class="mr-2"><input type="checkbox" name="entries[]" value="{{ $post->id }}"></label>
                                                      <a href="{{ $postUrl }}" title="{{ $post->title }}">{{ \Illuminate\Support\Str::limit($post->title, 40) }}</a>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12 col-md-12 diplay-section-mobile-none">
                                                        <h5>Premium Features</h5>
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </div>
                                        
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-12 col-md-12">
            											<a href="{{ $postUrl }}"><img class="img-thumbnail img-fluid" src="{{ $postImg }}" alt="img"></a>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12 col-md-4 display-body-section-mobile">
                                                        <p>
    													<strong>
                                                            <a href="{{ $postUrl }}" title="{{ $post->title }}">{{ \Illuminate\Support\Str::limit($post->title, 40) }}</a>
                                                        </strong>
    													@if (in_array($pagePath, ['my-posts', 'archived', 'pending-approval']))
    														@if (isset($post->latestPayment) and !empty($post->latestPayment))
    															@if (isset($post->latestPayment->package) and !empty($post->latestPayment->package))
    																<?php
    																if ($post->featured == 1) {
    																	$color = $post->latestPayment->package->ribbon;
    																	$packageInfo = '';
    																} else {
    																	$color = '#ddd';
    																	$packageInfo = ' (' . t('Expired') . ')';
    																}
    																?>
    																<i class="fa fa-check-circle tooltipHere" style="color: {{ $color }};" title="" data-placement="bottom"
    																   data-toggle="tooltip" data-original-title="{{ $post->latestPayment->package->short_name . $packageInfo }}"></i>
    															@endif
    														@endif
    													@endif
                                                    </p>
    												<p>
    													<strong>
    														<i class="icon-clock" title="{{ t('Posted On') }}"></i>
    													</strong>&nbsp;{!! $post->created_at_formatted !!}
    												</p>
    												<p>
    													<strong><i class="icon-location-2" title="{{ t('Located In') }}"></i></strong> {{ !empty($post->city) ? $post->city->name : '-' }}
    													@if (file_exists(public_path($countryFlagPath)))
    														<img src="{{ url($countryFlagPath) }}" data-toggle="tooltip" title="{{ $post->country->name }}">
    													@endif
    												</p>
    												@if(!empty($packages))
                                                            @foreach($packages as $key => $package)
    												 @if(isset($post->latestPayment->package_id) && ($post->latestPayment->package_id == $package->id && $post->latestPayment->active == 1))                          
    												 <strong> <i class='fas fa-wallet'></i></strong><span>
    												     
                                                    <?php
                                                    
                                                         $dayspayment=$post->latestPayment->duration*7;
                                                        
                                                        $paymentDate = date('Y-m-d',strtotime($post->latestPayment->created_at));
                                                         
                                                        // Add days to date and display it
                                                        $datetime2 = date('Y-m-d', strtotime($paymentDate. " + $dayspayment days"));
                                                        $now = time(); // or your date as well
                                                        
                                                        $current = date('Y-m-d',$now);
                                                        $datetime1 = date_create($current);
                                                        $datetime2 = date_create($datetime2);
                                                        
                                                        $interval = date_diff($datetime1, $datetime2);
                                                       
                                                          
                                                          // Display the result
                                                        echo $interval->format('%a days left');
                                                        ?>
                                               </span>
                                                @endif
    
                                                @endforeach
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-5 col-sm-12 col-md-12 border-left diplay-section-mobile-none">
                                                        @if(!empty($packages))
                                                            @foreach($packages as $key => $package)
                                                                <div style='margin:10px 0'>
                                                      
                                                                    @if(isset($post->latestPayment->package_id) && ($post->latestPayment->package_id == $package->id))                                                                  
                                                                        <input type="radio" checked>
                                                                       
                                                                    @endif
                                                                    <a href="/posts/<?php echo $post->id; ?>/payment" class="premimum-btn " style="padding:6px 20%;background:{{$colors[$package->id]}}; {{(isset($post->latestPayment->package_id) && ($post->latestPayment->package_id == $package->id) ? '' : 'margin-left:20px;')}}">
                                                                        {{$package->name}} 
                                                                        </a>
                                                                        
                                                                    <!--<button class="premimum-btn " style=" background:{{$colors[$package->id]}}; {{(isset($post->latestPayment->package_id) && ($post->latestPayment->package_id == $package->id) ? '' : 'margin-left:20px;')}}">-->
                                                                        <!--{{$package->name}} -->
                                                                    <!--</button>-->
                                    
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="card-footer" style="background:#E6E6E6 !important;">
                                          <a href="{{ $postUrl }}" title="{{ $post->title }}" class="mr-2"><i class="fa fa-eye"></i> View</a>

											@if (in_array($pagePath, ['my-posts', 'pending-approval']) and $post->user_id==$user->id and $post->archived==0)
                                                    <a href="{{ \App\Helpers\UrlGen::editPost($post) }}" class="mr-2">
                                                        <i class="fa fa-edit"></i> {{ t('Edit') }}
                                                    </a>
											@endif
											@if (in_array($pagePath, ['my-posts']) and isVerifiedPost($post) and $post->archived==0)
													<a class="confirm-action mr-2" href="{{ url('account/'.$pagePath.'/'.$post->id.'/offline') }}">
														<i class="icon-eye-off"></i> {{ t('Offline') }}
													</a>
											@endif
											@if (in_array($pagePath, ['archived']) and $post->user_id==$user->id and $post->archived==1)
                                                    <a class="confirm-action mr-2" href="{{ url('account/'.$pagePath.'/'.$post->id.'/repost') }}">
                                                        <i class="fa fa-recycle"></i> {{ t('Repost') }}
                                                    </a>
											@endif
                                                <a class=" delete-action mr-2" href="{{ url('account/'.$pagePath.'/'.$post->id.'/delete') }}">
                                                    <i class="fa fa-trash"></i> {{ t('Delete') }}
                                                </a>
											<strong style="float:right !important;"><i class="icon-eye" title="{{ t('Visitors') }}"></i>  {{ $post->visits ?? 0 }}</strong>
                                                
                                        </div>
                                    </div>
								<?php endforeach; ?>
                                <?php endif; ?>

							</form>
						</div>
                            
                        <nav>
                            {{ (isset($posts)) ? $posts->links() : '' }}
                        </nav>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('after_styles')
	<style>
		.action-td p {
			margin-bottom: 5px;
		}
	</style>
@endsection

@section('after_scripts')
	<script src="{{ url('assets/js/footable.js?v=2-0-1') }}" type="text/javascript"></script>
	<script src="{{ url('assets/js/footable.filter.js?v=2-0-1') }}" type="text/javascript"></script>
	<script type="text/javascript">
		$(function () {
			$('#addManageTable').footable().bind('footable_filtering', function (e) {
				var selected = $('.filter-status').find(':selected').text();
				if (selected && selected.length > 0) {
					e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
					e.clear = !e.filter;
				}
			});

			$('.clear-filter').click(function (e) {
				e.preventDefault();
				$('.filter-status').val('');
				$('table.demo').trigger('footable_clear_filter');
			});

			$('.from-check-all').click(function () {
				checkAll(this);
			});
			
			$('a.delete-action, button.delete-action, a.confirm-action').click(function(e)
			{
				e.preventDefault(); /* prevents the submit or reload */
				var confirmation = confirm("{{ t('confirm_this_action') }}");
				
				if (confirmation) {
					if( $(this).is('a') ){
						var url = $(this).attr('href');
						if (url !== 'undefined') {
							redirect(url);
						}
					} else {
						$('form[name=listForm]').submit();
					}
				}
				
				return false;
			});
		});
	</script>
	{{-- include custom script for ads table [select all checkbox]  --}}
	<script>
		function checkAll(bx) {
			if (bx.type !== 'checkbox') {
				bx = document.getElementById('checkAll');
				bx.checked = !bx.checked;
			}
			
			var chkinput = document.getElementsByTagName('input');
			for (var i = 0; i < chkinput.length; i++) {
				if (chkinput[i].type == 'checkbox') {
					chkinput[i].checked = bx.checked;
				}
			}
		}
	</script>
@endsection
