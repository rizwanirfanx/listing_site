<?php
// Default Map's values
$loc = [
	'show'       		=> false,
	'itemsCols'  		=> 3,
	'showButton' 		=> false,
	'countCitiesPosts' 	=> false,
];
$map = ['show' => false];

// Get Admin Map's values
if (isset($citiesOptions)) {
	if (isset($citiesOptions['show_cities']) and $citiesOptions['show_cities'] == '1') {
		$loc['show'] = true;
	}
	if (isset($citiesOptions['items_cols']) and !empty($citiesOptions['items_cols'])) {
		$loc['itemsCols'] = (int)$citiesOptions['items_cols'];
	}
	if (isset($citiesOptions['show_post_btn']) and $citiesOptions['show_post_btn'] == '1') {
		$loc['showButton'] = true;
	}
	
	if (file_exists(config('larapen.core.maps.path') . config('country.icode') . '.svg')) {
		if (isset($citiesOptions['show_map']) and $citiesOptions['show_map'] == '1') {
			$map['show'] = true;
		}
	}
	
	if (config('settings.listing.count_cities_posts')) {
		$loc['countCitiesPosts'] = true;
	}
}
$hideOnMobile = '';
if (isset($citiesOptions, $citiesOptions['hide_on_mobile']) and $citiesOptions['hide_on_mobile'] == '1') {
	$hideOnMobile = ' hidden-sm';
}
?>

@section('after_styles')
<style>

/*@media (max-width: 480px)
{
	.col-sm-4 {
    flex: 0 0 33.333333% !important;
    max-width: 33.333333% !important;
		}
.mobile_width ul
{
	flex: 0 0 33.333333% !important;
    max-width: 33.333333% !important;
}
}*/

 .main_content {
    flex-grow: 1;
    max-width: 100%;
    width: 100%;
}

 .chp_places__cities {
    margin: 0 0 40px 0 !important;
}

.chp_places__cities {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    margin: 20px 0 0 0;
}

.chp_places__title {
    color: #444;
    text-transform: uppercase;
    font-size: 20px;
    margin-top: 10px;
    padding-left: 20px;
    font-family: Roboto Condensed;
    display: flex;
    align-items: center;
}

.chp_places__footer_wrapper {
    padding-top: 10px;
    border-bottom: 1px solid #ddd;
}

.chp_places__table_title {
    margin: 0px 0 0px 20px;
    display: inline-block;
    position: relative;
    top: 15px;
    font-size: 1em;
}
.chp_places__table {
    display: flex;
    width: 100%;
    padding: 25px 0;
    font-size: 1em;
    box-sizing: border-box;
}
.chp_places__footer_wrapper {
    padding-top: 10px;
    border-bottom: 1px solid #ddd;
}
.chp_places__title {
    color: #444;
    text-transform: uppercase;
    font-size: 20px;
    margin-top: 10px;
    padding-left: 20px;
    font-family: Roboto Condensed;
    display: flex;
    align-items: center;
}
.chp_places__footer_wrapper {
    padding-top: 10px;
    border-bottom: 1px solid #ddd;
}
.chp_places__table--nomargin {
    margin: 0;
}
table {
    display: table;
    border-collapse: separate;
    box-sizing: border-box;
    text-indent: initial;
    border-spacing: 2px;
    border-color: grey;
}
.aside_right {
    margin-left: 14px;
    margin-bottom: 14px;
    flex-shrink: 0;
}

.chp_places__titleicon_wrapper {
    margin-right: .4em;
    display: flex;
    justify-content: center;
    align-items: center;
}

.sprites_desktop_main__pin--city {
    background-image: url(../assets/background/sprite_bg.svg#pin--city) !important;
    background-repeat: no-repeat !important;
    background-size: 100% !important;
}

.chp_places__titleicon {
    position: relative;
    top: -2px;
}

.chp_places__last_visited_wrapper {
    font-size: 14px;
    padding: 10px 20px 20px 20px;
}
.chp_places__table_title {
    margin: 0px 0 0px 20px;
    display: inline-block;
    position: relative;
    top: 15px;
    font-size: 1em;
}

.chp_places__table {
    display: flex;
    width: 100%;
    padding: 25px 0;
    font-size: 1em;
    box-sizing: border-box;
}

.chp_places__col {
    flex-basis: 33%;
    flex-grow: 1;
    display: table-cell;
    text-align: left;
}
.chp_places__col--seperator {
    border-left: 1px solid #ccc;
}

.chp_places__col {
    flex-basis: 33%;
    flex-grow: 1;
    display: table-cell;
    text-align: left;
}
#last_visited_locations.chp .last_visited_location, .chp_city {
    padding: 5px 15px 5px 40px;
    vertical-align: top;
    display: inline-block;
    text-align: left;
}
.chp_city .big_city_sign {
    width: 12px !important;
    height: 12px !important;
    position: absolute;
    left: -18px;
    top: 1px;
}

.chp_city a {
    position: relative;
    display: flex;
    align-items: center;
}
.chp_places__footer_wrapper {
    padding-top: 10px;
    border-bottom: 1px solid #ddd;
}

.sprites_desktop_main__pin--state {
    background-image: url(../assets/background/sprite_bg.svg#pin--state) !important;
    background-repeat: no-repeat !important;
    background-size: 100% !important;
}

.chp_state {
    padding: 5px 15px 5px 20px;
    vertical-align: top;
    display: inline-block;
    text-align: left;
}

@media  screen and (min-width: 1261px){
.box_right {
    width: 300px;
    max-width: 300px;
}
}

.box_right {
    float: right;
    margin-bottom: 10px;
    width: 244px;
    min-width: 244px;
    max-width: 244px;
    white-space: normal;
    padding: 0;
    vertical-align: top;
}

@media  screen and (min-width: 1261px){
.mybox.small {
    font-size: 13px !important;
}
}
.mybox {
    margin-bottom: 10px;
    border-top: 0;
}
.mybox {
    padding-bottom: 20px;
}
.mybox, .mybox_title {
    padding: 5px 0;
    overflow: hidden;
}


@media (max-width:768px){
	aside.aside_right{display:none;}
.h-spacer{display:block !important;}


}

#tckr_container {
    overflow: hidden;
    position: relative;
    margin-left: 4px;
}

#tckr_container .floatItem {
    border: 1px solid #eee;
    padding: 31px 4px;
    display: flex;
    align-items: center;
    background: #eee;
}

div.floatItem {
    margin: 0 0 5px;
    padding: 0;
}

@media(max-width:360px){
#last_visited_locations.chp .last_visited_location, .chp_city {
    padding: 3px 0px 4px 30px!important;
}
}

@media (max-width: 375px) and (min-width:361px){
#last_visited_locations.chp .last_visited_location, .chp_city {
    padding: 6px 16px 5px 24px!important;
}
}

@media (min-width: 375px) and (max-width:768px){
#last_visited_locations.chp .last_visited_location, .chp_city {
    padding: 6px 16px 5px 24px!important;
}
}


@media (min-width: 375px) and (max-width:410px)
{
	.left-seprator-0
	{
		margin-left: -15px !important;
	}

	.left-seprator-1
	{
		margin-left: -15px !important;
	}

	.left-seprator-2
	{
		margin-left: -15px !important;
	}
	
}

.mcs-wrapper span a, .mcs-wrapper span
{
	display: none !important;
	display: none !important;
}


</style>
@endsection


@if ($loc['show'] || $map['show'])
@includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.spacer', 'home.inc.spacer'], ['hideOnMobile' => $hideOnMobile])
<div class="container{{ $hideOnMobile }}">
	

<div class="row">
    
    
	
	<div class="col-xl-12 page-content custom-box-shadow">
		<div class="inner-box">
			
			<div class="row">
				@if (!$map['show'])
					<!-- <div class="row"> -->
						<div class="col-xl-12 col-sm-12 map-title-home">

							<div class="chp_places__title pt-1 pr-3 pb-3 pl-3">
			<div class="chp_places__titleicon_wrapper_update" style="margin-right: 0.5rem;">
				<div style="width:25px; height:25px;" class="sprites_pin_city yicon chp_places__titleicon"></div>
			</div>
			{{ t('Choose a city') }}
			</div>

						</div>
				@endif
				<?php
				$leftClassCol = '';
				$rightClassCol = '';
				$ulCol = 'col-md-4 col-sm-12'; // Cities Columns
				
				if ($loc['show'] && $map['show']) {
					// Display the Cities & the Map
					$leftClassCol = 'col-lg-8 col-md-12';
					$rightClassCol = 'col-lg-3 col-md-12 mt-3 mt-xl-0 mt-lg-0';
					$ulCol = 'col-md-4 col-sm-6 col-12';
					
					if ($loc['itemsCols'] == 2) {
						$leftClassCol = 'col-md-6 col-sm-12';
						$rightClassCol = 'col-md-5 col-sm-12';
						$ulCol = 'col-md-6 col-sm-12';
					}
					if ($loc['itemsCols'] == 1) {
						$leftClassCol = 'col-md-3 col-sm-12';
						$rightClassCol = 'col-md-8 col-sm-12';
						$ulCol = 'col-xl-12';
					}
				} else {
					if ($loc['show'] && !$map['show']) {
						// Display the Cities & Hide the Map
						$leftClassCol = 'col-xl-12';
					}
					if (!$loc['show'] && $map['show']) {
						// Display the Map & Hide the Cities
						$rightClassCol = 'col-xl-12';
					}
				}
				?>
				@if ($loc['show'])
				<div class="{{ $leftClassCol }} page-content m-0 p-0">
					@if (isset($cities))
						<div class="relative location-content">
							
							@if ($loc['show'] && $map['show'])
								<h2 class="title-3 pt-1 pr-3 pb-3 pl-3" style="white-space: nowrap;">
									<i class="icon-location-2"></i>&nbsp;{{ t('Choose a city or region') }}
								</h2>
							@endif
							<div class="col-xl-12 tab-inner">
								<div class="row mobile_width">
									@foreach ($cities as $key => $items)




										<ul class="left-seprator-{{$loop->index}} {{$loop->first?'':'left-seprator'}} cat-list custom-box-shadow col-md-4 col-sm-4 col-xs-4 mb-0 mb-xl-2 mb-lg-2 mb-md-2 {{ ($cities->count() == $key+1) ? 'cat-list-border' : '' }}">
											@foreach ($items as $k => $city)

											<?php
											// echo "<pre>";
											// print_r($city);
											// die();
											$citylist = ['Bahawalpur','Dera Ghazi Khan','Faisalabad','Hyderabad','Islamabad','Jhang','Karachi','Lahore','Multan','Peshawar','Quetta','Rawalpindi','Sialkot'];
									
											?>


												<li>
													@if ($city->id == 0)
														<a href="#browseAdminCities" data-toggle="modal">{!! $city->name !!}</a>
													@else

													@if(in_array($city->name, $citylist))

													
													<a href="{{ \App\Helpers\UrlGen::city($city) }}">
													<span class="chp_places__big_city_sign">
													<img src="https://static.locanto.info/assets/210622_122409/images/bg/chp/favorite.svg" alt="">
													</span> <strong>{{ $city->name }}</strong>
													</a>
													@else

													<a href="{{ \App\Helpers\UrlGen::city($city) }}">
															{{ $city->name }}
														</a>

													@endif
														
														@if ($loc['countCitiesPosts'])
															&nbsp;({{ $city->posts_count ?? 0 }})
														@endif
													@endif
												</li>
											@endforeach
										</ul>
									@endforeach
								</div>
							</div>
							
							<!-- @if ($loc['showButton'])
								@if (!auth()->check() and config('settings.single.guests_can_post_ads') != '1')
									<a class="btn btn-lg btn-add-listing" href="#quickLogin" data-toggle="modal">
										<i class="fa fa-plus-circle"></i> {{ t('Add Listing') }}
									</a>
								@else
									<a class="btn btn-lg btn-add-listing pl-4 pr-4" href="{{ \App\Helpers\UrlGen::addPost() }}" style="text-transform: none;">
										<i class="fa fa-plus-circle"></i> {{ t('Add Listing') }}
									</a>
								@endif
							@endif -->
	
						</div>
					@endif
				</div>
				@endif
				
				@includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.locations.svgmap', 'home.inc.locations.svgmap'])
			</div>
				

	
	</div>

	<!-- class Start of footer home text -->
	<div class="row  hidden-sm">



		<div class="col-xl-12 col-sm-12">
			<div class="inner-box">


			<div class="chp_places__title">
			<div class="chp_places__titleicon_wrapper_update" style="margin-right: 0.5rem;">
				<div style="width:25px; height:25px;" class="sprites_pin_state yicon chp_places__titleicon"></div>
			</div>
			{{ t('PROVINCES') }}
			</div>

			</div>
		</div>

		</div>
	</div>
	

		<div class="col-xl-12 page-content custom-box-shadow" >
			<div class="inner-box">

				<div class="col-xl-12 tab-inner">
				<div class="row">

				@if (isset($modalAdmins) and $modalAdmins->count() > 0)

					<?php
						$numberOfCols = 3;
						$maxRowsPerCol = round($modalAdmins->count() / $numberOfCols, 0); // PHP_ROUND_HALF_EVEN
						$maxRowsPerCol = ($maxRowsPerCol > 0) ? $maxRowsPerCol : 1;  // Fix array_chunk with 0
						$provence = $modalAdmins->chunk($maxRowsPerCol);

					?>
							@foreach ($provence as $key => $items)

										<ul class="{{($loop->first || $loop->last)?'':'left-seprator'}} cat-list custom-box-shadow {{ $ulCol }} mb-0 mb-xl-2 mb-lg-2 mb-md-2 {{ ($provence->count() == $key+1) ? 'cat-list-border' : '' }}">
											@foreach ($items as $k => $city)
												<li>
													<a href="">{{ $city->name }}</a>	
												</li>
											@endforeach
										</ul>
									@endforeach	
									@endif


				</div>
				</div>
							

			</div>

		</div>
		

	</div> 
	<div class="row h-spacer">

		<div class="col-xl-9 page-content">
		
				Your Classified offers free user-to-user classified ads in all major cities in the Pakistan. You can post an ad at no cost and browse through the huge selection of free classifieds on Your Classified!
					
		</div>
	</div>
	<div class="row" style="padding-bottom: 35px;" >	
		<div class="col-xl-9 page-content">
			<table class="chp_info_table" style="width:100%">
			<tbody><tr>
				<td style="width:45%;vertical-align:top;padding:0;"><br><span class="yc-em2"><b>Are You Looking for Something?</b></span><br>
					<br>
					Many things in life work best locally. If you are for example searching online for a used car or a babysitter, local offers in your vicinity are often the best solution for your needs. This is why Your Classified offers a local marketplace instead of nationwide classifieds. Start a new career with our job exchange, buy a car in the used cars category, or find a new home in the property classifieds. The Personals, Pets, Community, Buy &amp; Sell, and Services categories may also hold an offer that you probably can’t resist.</td>
									<td style="width:40px;padding:0;"></td>
				<td style="width:45%;vertical-align:top;padding:0;">
					<br>
					<span class="yc-em2"><b>Would You Like to Post a Classified Ad?</b></span> <br>
					<br>
					It’s very easy to post an ad on Your Classified and works just like the ads in the local newspaper. Your advantage at Your Classified is that your ad will reach a much larger audience. What makes it even more interesting is that you can upload pictures or add a link to your website. To post a free classified ad now, simply choose your city or click the link below.<br><br>
								@if ($loc['showButton'])
								@if (!auth()->check() and config('settings.single.guests_can_post_ads') != '1')
									<a class="btn btn-lg btn-add-listing" href="#quickLogin" data-toggle="modal">
										<i class="fa fa-plus-circle"></i> {{ t('Add Listing') }}
									</a>
								@else
									<a class="pl-4 pr-4" href="{{ \App\Helpers\UrlGen::addPost() }}" style="text-transform: none;">
										{{ t('Add Listing') }}
									</a>
								@endif
							@endif
									</td>
				<td style="width:20px"></td>
			</tr>
		</tbody></table>
		</div>
	</div>
	<!-- class end of footer home text -->

</div>
@endif

@section('modal_location')
	@parent
	@if ($loc['show'] || $map['show'])
		@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.modal.location', 'layouts.inc.modal.location'])
	@endif
@endsection


@section('after_scripts')
<script type="text/javascript">
	setInterval(function(){
    $('#scrolvip')
        .find('div:first')
        .before($('div:last', '#scrolvip'))
        .end()
        .scrollTop(40)
        .stop()
    .animate({scrollTop:0}, 400, 'swing');
}, 1000);

</script>
@endsection