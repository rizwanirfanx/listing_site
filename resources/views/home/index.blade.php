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

@section('after_styles')
<style>
@media screen and (max-width: 480px)
{
	div.f-category
	{
	    width: 33%!important;
	}

	.mobile_width ul {
    flex: 0 0 33.333333% !important;
    max-width: 33.333333% !important;
		}

		.left-seprator-0
	{
		margin-left: -27px !important;
	}

	.left-seprator-1
	{
		margin-left: 19px !important;
	}

	.left-seprator-2
	{
		margin-left: 3px !important;
	}


}

.MagicScroll-vertical span
	{
		display: none !important;
	}
</style>
@endsection

@extends('layouts.master')
{{ddd("HERE ME FACE");}}

@section('search')
	@parent
@endsection

@section('content')
	<div class="main-container" id="homepage">
		<a href="{{Storage::url('app/verifylabel.png')}}">Link</a>
		<img src="{{ Storage::url('app/verifylabel.png') }}"/>
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
		@endif
			
		@if (isset($sections) and $sections->count() > 0)
			@foreach($sections as $section)
				@if (view()->exists($section->view))
					@includeFirst([config('larapen.core.customizedViewPath') . $section->view, $section->view], ['firstSection' => $loop->first])
				@endif
			@endforeach
		@endif
		
	</div>
@endsection

@section('after_scripts')
	<script>
		@if (config('settings.optimization.lazy_loading_activation') == 1)
		$(document).ready(function () {
			$('#postsList').each(function () {
				var $masonry = $(this);
				var update = function () {
					$.fn.matchHeight._update();
				};
				$('.item-list', $masonry).matchHeight();
				this.addEventListener('load', update, true);
			});
		});
		@endif
	</script>
@endsection
