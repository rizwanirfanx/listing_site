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

@section('after_styles')
<style>

.featured-list-slider .item {
    min-width: 128px;
    max-width: 130px;
}
.owl-dots
{
    display: none;
}
.owl-theme .owl-nav {
    margin-top: 10px;
    display: none;
}
.mobcat{display:none}
.mobnav{display:none}
.category-list {
     box-shadow: 0px 0px 0px !important;
    border: 1px solid #dbd9d9;
}

@media  only screen and (max-width: 600px) {
	.h-spacer{display:none;}
	.page-link {
    padding: 4px 7px !important;}
	nav.search-breadcrumb{display:none}
	.mobcat{display:block}
	.desktopcat{display:none}
	.mobtitle{display:block;}
	.desktoptitle{display:none;}

}




@media (max-width: 767px){
    .mobtitle{display:block;}
	.desktoptitle{display:none;}
.col-thin-left {
    padding-left: 5px!important;
    padding-right: 5px !important;
}
.mobile-filter-bar {display:none;} 
.aside_right--outer {display:none;}
.desktopnav{display:none}
.mobnav{display:block;}
}

.tab-filter {

    right: 76px !important; 

}

@media  screen and (min-width: 1200px){
 .mobtitle{display:none;}
}
@media  screen and (max-width: 1260px){
	.aside_right--outer {
    width: calc(100vw - 1064px);
    
}
}
@media  screen and (max-width: 1708px){
	.aside_right--outer {
    width: calc(100vw - 1284px);
}

}
.aside_right--outer {
    position: absolute;
    margin-left: -12px;
    width: 165px;
    max-width: 200px;
    min-width: 64px;
    word-break: break-word;
}

.brc__gallery {
    top: inherit;
    left: inherit;
    position: relative;
}
.brc__gallery {
    z-index: 0;
    position: absolute;
    width: 160%;
}

.brc__gallery_header {
    width: 104%;
    background: #ff0000;
    color: #fff !important;
    margin-bottom: 4px;
    border-radius: 0 22px 22px 0;
    padding: 4px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.brc__gallery_header .brc__head {
    font-weight: bold;
    font-size: 14px;
}
.brc__gallery__entry {
    border: none;
    border-top: 5px solid #ff0000;
    border-radius: 0;
    background-color: #fff;
    overflow: inherit;
}


.gallery_entry {
    z-index: 1000;
    background-color: #ffffff;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: background .5s;
    margin-bottom: 8px;
    overflow: hidden;
}


.gallery_entry .entry_title {
    font-weight: bold;
}

.brc__gallery__entry__title {
    font-weight: bold;
    font-size: 11px;
    color: #448cca;
    overflow: hidden;
    text-overflow: ellipsis;
    -webkit-line-clamp: 2;
    display: -webkit-box;
    -webkit-box-orient: vertical;
}

.gallery_entry .entry_images {
    text-align: center;
}
.brc__gallery__entry__images {
    min-height: 60px;
    display: flex;
    justify-content: space-evenly;
    text-align: center;
}

.topmargin {
    padding-top: 10px !important;
}

.bp_promo--top {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    background: #ff0000;
    border-top-right-radius: 18px;
    border-bottom-right-radius: 18px;
    color: #fff;
    height: 40px;
    margin: 7px 0 7px 0;
    box-shadow: 0 0 2px 4px #fff;
}

.bp_promo--top a {
    color: #fff;
    font-size: 1.8em !important;
    font-family: Roboto Condensed;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-shadow: 0 1px 2px #73461a;
}

.bp_promo--top svg, .bp_promo--top .yicon {
    position: absolute;
    right: 10px;
}


.cornerRibbons {
    box-shadow: 0 0 2px rgb(0 0 0 / 20%);
    right: -8%;
    overflow: hidden;
    position: absolute;
    top: 20%;
    -moz-transform: rotate(45deg);
    -webkit-transform: rotate(
45deg);
    -o-transform: rotate(45deg);
    transform: rotate(
45deg);
    width: 200px;
    z-index: 2;
    -webkit-transition: all .3s ease 0s;
    -moz-transition: all .3s ease 0s;
    -o-transition: all .3s ease 0s;
    transition: all .3s ease 0s;
}

@media (max-width: 767px)
.cornerRibbons {
    left: 427px !important;
    top: 24px !important;
    width: 160px !important;
}

<style>
	 .cornerRibbons{display:none}
	 /*.MultiCarousel{display:none}*/
	 .MultiCarousel-gallery{display:none}
.make-compact .item-list .add-title {
    height: 24px !important;
}
	.fav {    position: absolute;
    right: 5px;
    bottom: 5px;
}

.cameraicon{display:none} 
.notgrid, .notcl {display:none}

.category-list:not(.make-list):not(.make-compact) p.desc {
    display:none !important;
}


.category-list:not(.make-list):not(.make-compact) .notgrid, .notcl {
    display:none !important;
}
/*.category-list:not(.make-list):not(.make-compact) .notgrid, .item-list {
   height:200px!important;
}*/

.category-list:not(.make-grid) .forgrid {
    display:none !important;
}

.category-list:not(.make-grid) .notcl {
    display:block !important;
	font-size:17px;
}


.make-grid .item-list .add-desc-box {
    padding: 0px 0 !important;
}

.items-details h1, .items-details h2, .items-details h3, .items-details h4, .items-details h5, .items-details h6 {
    padding: 0px !important;
}

@media (max-width: 979px){
h5 {
    font-size: 17px!important;
    
}
}

@media (max-width: 767px){
.price-box {
    padding: 0px 0px 0;
}
.MultiCarousel-gallery{display:block}
}


@media  only screen and (max-width: 600px) {
  .compact-item{padding:0px!important}
  p.desc{color:black;margin-bottom:3px !important}
  .info-row{margin-bottom:6px !important;}
  span.category{display:block !important}
  .add-title {padding: 7px 0px 6px 5px !important;}
  .item-list .items-details {
    padding: 5px 0 0 !important;
}
.add-desc-box{padding-left:5px !important; padding-right:5px !important;}
}

.category-list:not(.make-list):not(.make-compact) .notgridad {
    display:none;
}


.category-list:not(.make-list):not(.make-compact) .cat {
    display:none;
}

.category-list:not(.make-grid) .forgrid {
    display:none;
}


@media (max-width: 768px) and (min-width: 300px){
.category-list:not(.make-grid):not(.make-compact) .add-desc-box {
    width: 60%!important;
}

.category-list:not(.make-grid):not(.make-compact) .col-md-2.photobox {
    width: 40% !important;
}
.text-align{text-align:left !important}

.category-list:not(.make-compact) .cameraicon {
    display:none;
}
.category-list:not(.make-compact) .item-list .items-details {
    padding: 1px 0 0 !important;
}



.category-list:not(.make-grid) .notgrid {
    display:block !important;
	width:100%;
}

.category-list:not(.make-grid) .notcl {
    display:none !important;
}

}

@media (max-width: 767px){
.make-grid .item-list{
 border: 1px solid #ddd;
 max-height:237px !important;
}
}

@media  only screen and (max-width: 600px){
@media (max-width: 768px) and (min-width: 300px){
.category-list:not(.make-compact) .item-list .items-details {
    padding: 4px 9px 0 !important;
}
span.cat{display:none !important}

.items-details>h5{font-size:12px !important};
}
}

h5.notgrid {
    display:none !important;
}
.adds-wrapper.make-grid .item-list:nth-child(4n+4), .category-list.make-grid .item-list:nth-child(4n+4) {
    border-right: 1px solid #ddd !important;
}

.make-compact .item-list .info-row {
    width: 100% !important;
}

@media (min-width: 1200px)
{
    .make-list .item-list .cornerRibbons {
    top: -6px;
    left: 40.6rem;
    padding: 10px 8px 0px 3px !important;
    }
    

    .make-compact .item-list .cornerRibbons {
    position: absolute;
    top: 7px;
    left: 34.5rem;
    }
    

    .make-grid .item-list .cornerRibbons {
    position: absolute;
    top: 8px;
    left: 4.4rem;
    }
    

}

@media (max-width: 1200px)
{
    .make-compact .item-list .cornerRibbons {
    position: absolute;
    top: 2px;
    left: 27.8rem;
    padding: 10px 9px 0px 0px !important;
}
    
    .make-list .item-list .cornerRibbons {
    position: absolute;
    top: 0px;
    left: 28.2rem;
    padding: 10px 9px 0px 0px !important;
}
    .make-grid .item-list .cornerRibbons {
    position: absolute;
    top: -1px;
    left: 3.1rem;
    padding: 10px 9px 0px 0px !important;
}
}



@media screen and (max-width: 992px), screen and (max-device-width: 992px){
.make-compact .item-list .cornerRibbons { 
    position: relative;
    top: -14px;
    left: 17rem;
    padding: 10px 9px 0px 0px !important;
}

.make-list .item-list .cornerRibbons { 
position: relative;
    top: -16px;
    left: 16.9rem;
    padding: 10px 9px 0px 0px !important;
}
.make-grid .item-list .cornerRibbons{
    position: relative;
    top: -15px;
    left: -1.5rem;
    padding: 10px 9px 0px 0px !important;
}
}

@media screen and (max-width: 768px), screen and (max-device-width:768px){
.make-compact .item-list .cornerRibbons { 
    position: relative;
    top: -16px;
    left: 25.5rem;
    padding: 10px 9px 0px 0px !important;
}

.make-list .item-list .cornerRibbons { 
    position: relative;
    top: -13px;
    left: 25.5rem;
    padding: 10px 9px 0px 0px !important;
}
.make-grid .item-list .cornerRibbons{
    position: relative;
    top: -16px;
    left: 8.7rem;
    padding: 10px 9px 0px 0px !important;
}
}


@media screen and (max-width: 576px), screen and (max-device-width:576px){
.make-compact .item-list .cornerRibbons { 
    position: relative;
    top: -12px;
    left: 26.8rem;
    padding: 10px 9px 0px 0px !important;
}

.make-list .item-list .cornerRibbons { 
    position: relative;
    top: -16px;
    left: 24.5rem;
    padding: 10px 9px 0px 0px !important;
}
.make-grid .item-list .cornerRibbons{
    position: relative;
    top: -18px;
    left: 8.4rem;
    padding: 10px 9px 0px 0px !important;
}


}


@media screen and (max-width: 572px), screen and (max-device-width:572px){
.make-compact .item-list .cornerRibbons { 
    position: relative;
    top: -12px;
    left: 22.8rem;
    padding: 10px 9px 0px 0px !important;
}

.make-list .item-list .cornerRibbons { 
    position: relative;
    top: -16px;
    left: 22.5rem;
    padding: 10px 9px 0px 0px !important;
}
.make-grid .item-list .cornerRibbons{
    position: relative;
    top: -18px;
    left: 8.4rem;
    padding: 10px 9px 0px 0px !important;
}


}


@media screen and (max-width: 519px), screen and (max-device-width:519px){
.make-compact .item-list .cornerRibbons { 
    position: relative;
    top: -12px;
    left: 18.8rem;
    padding: 10px 9px 0px 0px !important;
}

.make-list .item-list .cornerRibbons { 
    position: relative;
    top: -16px;
    left: 23.1rem;
    padding: 10px 9px 0px 0px !important;
}
.make-grid .item-list .cornerRibbons{
    position: relative;
    top: -18px;
    left: 5.4rem;
    padding: 10px 9px 0px 0px !important;
}


}


@media screen and (max-width: 498px), screen and (max-device-width:498px){
.make-compact .item-list .cornerRibbons { 
    position: relative;
    top: -12px;
    left: 22.8rem;
    padding: 10px 9px 0px 0px !important;
}

.make-list .item-list .cornerRibbons { 
    position: relative;
    top: -12px;
    left: 22.4rem;
    padding: 10px 9px 0px 0px !important;
}
.make-grid .item-list .cornerRibbons{
    position: relative;
    top: -16px;
    left: 7.3rem;
    padding: 10px 9px 0px 0px !important;
}


}


@media screen and (max-width: 485px), screen and (max-device-width:485px){
.make-compact .item-list .cornerRibbons { 
    position: relative;
    top: -12px;
    left: 22.8rem;
    padding: 10px 9px 0px 0px !important;
}

.make-list .item-list .cornerRibbons { 
    position: relative;
    top: -12px;
    left: 22.4rem;
    padding: 10px 9px 0px 0px !important;
}
.make-grid .item-list .cornerRibbons{
    position: relative;
    top: -16px;
    left: 6.3rem;
    padding: 10px 9px 0px 0px !important;
}


}


@media screen and (max-width: 441px), screen and (max-device-width:441px){
.make-compact .item-list .cornerRibbons {
    position: absolute;
    top: 2px;
    left: 20rem;
    padding: 10px 9px 0px 0px !important;
}

.make-list .item-list .cornerRibbons {
    position: absolute;
    top: 1px;
    left: 20rem;
    padding: 10px 9px 0px 0px !important;
}
.make-grid .item-list .cornerRibbons {
    position: absolute;
    top: 1px;
    left: 118px;
    padding: 10px 9px 0px 0px !important;
}


}

@media screen and (max-width: 409px), screen and (max-device-width:409px){
.make-compact .item-list .cornerRibbons { 
    position: relative;
    top: -12px;
    left: 17.8rem;
    padding: 10px 9px 0px 0px !important;
}

.make-list .item-list .cornerRibbons { 
    position: relative;
    top: -17px;
    left: 17.4rem;
    padding: 10px 9px 0px 0px !important;
}
.make-grid .item-list .cornerRibbons{
    position: relative;
    top: -16px;
    left: 4.3rem;
    padding: 10px 9px 0px 0px !important;
}


}


@media screen and (max-width: 399px), screen and (max-device-width:399px){
.make-compact .item-list .cornerRibbons { 
    position: relative;
    top: -12px;
    left: 16.8rem;
    padding: 10px 9px 0px 0px !important;
}

.make-list .item-list .cornerRibbons { 
    position: relative;
    top: -17px;
    left: 16.4rem;
    padding: 10px 9px 0px 0px !important;
}
.make-grid .item-list .cornerRibbons{
    position: relative;
    top: -16px;
    left: 4.3rem;
    padding: 10px 9px 0px 0px !important;
}


}


@media screen and (max-width: 387px), screen and (max-device-width:387px){
.make-compact .item-list .cornerRibbons { 
    position: relative;
    top: -12px;
    left: 15.8rem;
    padding: 10px 9px 0px 0px !important;
}

.make-list .item-list .cornerRibbons { 
    position: relative;
    top: -17px;
    left: 15.4rem;
    padding: 10px 9px 0px 0px !important;
}
.make-grid .item-list .cornerRibbons{
    position: relative;
    top: -16px;
    left: 4.3rem;
    padding: 10px 9px 0px 0px !important;
}


}

@media screen and (max-width: 375px), screen and (max-device-width:375px){


.make-compact .item-list .cornerRibbons {
    position: absolute;
    top: 2px;
    left: 16.4rem;
    padding: 10px 9px 0px 0px !important;
}

.make-list .item-list .cornerRibbons {
    position: absolute;
    top: 1px;
    left: 16.5rem;
    padding: 10px 9px 0px 0px !important;
}

/*.make-list .item-list .cornerRibbons { 
    position: relative;
    top: -17px;
    left: 15.4rem;
    padding: 10px 9px 0px 0px !important;
}*/
.make-grid .item-list .cornerRibbons {
    position: absolute;
    top: 1px;
    left: 5.5rem;
    padding: 10px 9px 0px 0px !important;
}


}

@media screen and (min-width: 376px max-width: 381px), screen and (min-device-width: 376px max-device-width:381px){


.make-compact .item-list .cornerRibbons {
    position: absolute;
    top: 2px;
    left: 16.4rem;
    padding: 10px 9px 0px 0px !important;
}

.make-list .item-list .cornerRibbons {
    position: absolute;
    top: 1px;
    left: 16.5rem;
    padding: 10px 9px 0px 0px !important;
}

/*.make-list .item-list .cornerRibbons { 
    position: relative;
    top: -17px;
    left: 15.4rem;
    padding: 10px 9px 0px 0px !important;
}*/
.make-grid .item-list .cornerRibbons {
    position: absolute;
    top: 1px;
    left: 5.5rem;
    padding: 10px 9px 0px 0px !important;
}


}




@media screen and (max-width: 347px), screen and (max-device-width:347px){
.make-compact .item-list .cornerRibbons {
    position: absolute;
    top: 0px;
    left: 14rem;
    padding: 10px 9px 0px 0px !important;
}

.make-list .item-list .cornerRibbons {
    position: absolute;
    top: 2px;
    left: 14rem;
    padding: 10px 9px 0px 0px !important;
}
.make-grid .item-list .cornerRibbons {
    position: absolute;
    top: -2px;
    left: 4.3rem;
    padding: 10px 9px 0px 0px !important;
}


}


@media screen and (max-width: 313px), screen and (max-device-width:313px){
.make-compact .item-list .cornerRibbons { 
    position: relative;
    top: -15px;
    left: 12.3rem;
    padding: 10px 9px 0px 0px !important;
}

.make-list .item-list .cornerRibbons { 
    position: relative;
    top: -17px;
    left: 12.4rem;
    padding: 10px 9px 0px 0px !important;
}


@media screen and (max-width: 310px), screen and (max-device-width:310px){
.make-compact .item-list .cornerRibbons { 
    position: relative;
    top: -15px;
    left: 11.3rem;
    padding: 10px 9px 0px 0px !important;
}

.make-list .item-list .cornerRibbons { 
    position: relative;
    top: -17px;
    left: 10.4rem;
    padding: 10px 9px 0px 0px !important;
}


.make-grid .item-list .cornerRibbons{
    position: relative;
    top: -16px;
    left: 1.3rem;

    padding: 10px 9px 0px 0px !important;
}


}

}
.cornerRibbons a {

    font-size: 14px !important;
    padding: 23px 58px 0px!important;
    text-align: left !important;
}
.item-list {
    margin-bottom: 5px;
}


.category-list:not(.make-list):not(.make-compact) .bp_promo--top {
    display:none;
}
.MultiCarousel { float: left; overflow: hidden;  width: 100%; position:relative; }
    .MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }
        .MultiCarousel .MultiCarousel-inner .item { float: left;}
        .MultiCarousel .MultiCarousel-inner .item > div { text-align: center; padding:8px 4px 0px 10px; margin:0px; color:#666;}
    .MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; border-radius:50%;top:calc(50% - -5px); }
    .MultiCarousel .leftLst { left:0; }
    .MultiCarousel .rightLst { right:0; }
    
        .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: none; background:#ccc; }
        
        .vipicon {
    position: absolute;
    width: 34%;
    bottom: 4px;
    left: 2px;
    background: white;
    border-radius: 50%;
    padding: 4px;
    border: 1px solid #9d5f04;
}
.vipicon2 {
    position: absolute;
    width: 21%;
    left: 2px;
    background: white;
    border-radius: 50%;
    padding: 4px;
    border: 1px solid #9d5f04;
}
.item-list{background:#f5f5f5}
.compact-view{display:none;}
.grid-view{display:none;}
</style>


@endsection


@section('search')
	@parent
	@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.form', 'search.inc.form'])
@endsection

@section('content')
	<div class="main-container">
		
		@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.breadcrumbs', 'search.inc.breadcrumbs'])
		@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.categories', 'search.inc.categories'])
		<?php if (isset($topAdvertising) and !empty($topAdvertising)): ?>
			@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.advertising.top', 'layouts.inc.advertising.top'], ['paddingTopExists' => true])
		<?php
			$paddingTopExists = false;
		else:
			if (isset($paddingTopExists) and $paddingTopExists) {
				$paddingTopExists = false;
			}
		endif;
		?>
		@includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])

		
		<div class="container">
			<div class="row">

				<!-- Sidebar -->
                @if (config('settings.listing.left_sidebar'))
                    @includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.sidebar', 'search.inc.sidebar'])
                    <?php $contentColSm = 'col-md-8'; ?>
                    <?php $galleryColSm = 'col-md-2'; ?>
                    <?php $galleryColSm1 = 'col-md-1'; ?>
                @else
                    <?php $contentColSm = 'col-md-9'; ?>
                    <?php $galleryColSm = 'col-md-3'; ?>
                    <?php $galleryColSm1 = 'col-md-1'; ?>

                @endif

				<!-- Content -->
				<div class="{{ $contentColSm }} page-content col-thin-left">
					<div class="category-list{{ ($contentColSm == 'col-md-12') ? ' noSideBar' : '' }}">


						
						<div class="tab-box">

							<!-- Nav tabs -->
							<ul id="postType" class="nav nav-tabs add-tabs tablist" role="tablist">
                                <?php
                                $liClass = 'class="nav-item"';
                                $spanClass = 'alert-danger';
								if (config('settings.single.show_post_types')) {
									if (!request()->filled('type') or request()->get('type') == '') {
										$liClass = 'class="nav-item active"';
										$spanClass = 'badge-danger';
									}
                                } else {
									$liClass = 'class="nav-item active"';
									$spanClass = 'badge-danger';
								}
                                ?>
								<li {!! $liClass !!}>
									<a href="{!! qsUrl(request()->url(), request()->except(['page', 'type']), null, false) !!}"
									   role="tab"
									   data-toggle="tab"
									   class="nav-link"
									>
										{{ t('All Ads') }} <span class="badge badge-pill {!! $spanClass !!}">{{ $count->get('all') }}</span>
									</a>
								</li>
								@if (config('settings.single.show_post_types'))
									@if (isset($postTypes) and $postTypes->count() > 0)
										@foreach ($postTypes as $postType)
											<?php
												$postTypeUrl = qsUrl(
													request()->url(),
													array_merge(request()->except(['page']), ['type' => $postType->id]),
													null,
													false
												);
												$postTypeCount = ($count->has($postType->id)) ? $count->get($postType->id) : 0;
											?>
											@if (request()->filled('type') && request()->get('type') == $postType->id)
												<li class="nav-item active">
													<a href="{!! $postTypeUrl !!}" role="tab" data-toggle="tab" class="nav-link">
														{{ $postType->name }}
														<span class="badge badge-pill badge-danger">
															{{ $postTypeCount }}
														</span>
													</a>
												</li>
											@else
												<li class="nav-item">
													<a href="{!! $postTypeUrl !!}" role="tab" data-toggle="tab" class="nav-link">
														{{ $postType->name }}
														<span class="badge badge-pill alert-danger">
															{{ $postTypeCount }}
														</span>
													</a>
												</li>
											@endif
										@endforeach
									@endif
								@endif
							</ul>
							
							<div class="tab-filter">
								<select id="orderBy" title="sort by" class="niceselecter select-sort-by" data-style="btn-select" data-width="auto">
									<option value="{!! qsUrl(request()->url(), request()->except(['orderBy', 'distance']), null, false) !!}">{{ t('Sort by') }}</option>
									<option{{ (request()->get('orderBy')=='priceAsc') ? ' selected="selected"' : '' }}
											value="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'priceAsc']), null, false) !!}">
										{{ t('price_low_to_high') }}
									</option>
									<option{{ (request()->get('orderBy')=='priceDesc') ? ' selected="selected"' : '' }}
											value="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'priceDesc']), null, false) !!}">
										{{ t('price_high_to_low') }}
									</option>
									@if (request()->filled('q'))
										<option{{ (request()->get('orderBy')=='relevance') ? ' selected="selected"' : '' }}
												value="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'relevance']), null, false) !!}">
											{{ t('Relevance') }}
										</option>
									@endif
									<option{{ (request()->get('orderBy')=='date') ? ' selected="selected"' : '' }}
											value="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'date']), null, false) !!}">
										{{ t('Date') }}
									</option>
									@if (isset($city, $distanceRange) and !empty($city) and !empty($distanceRange))
										@foreach($distanceRange as $key => $value)
											<option{{ (request()->get('distance', config('settings.listing.search_distance_default', 100))==$value) ? ' selected="selected"' : '' }}
													value="{!! qsUrl(request()->url(), array_merge(request()->except('distance'), ['distance' => $value]), null, false) !!}">
												{{ t('around_x_distance', ['distance' => $value, 'unit' => getDistanceUnit()]) }}
											</option>
										@endforeach
									@endif
									@if (config('plugins.reviews.installed'))
										<option{{ (request()->get('orderBy')=='rating') ? ' selected="selected"' : '' }}
												value="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'rating']), null, false) !!}">
										{{ trans('reviews::messages.Rating') }}
										</option>
									@endif
								</select>
							</div>

						</div>

						<div class="listing-filter">
							<div class="pull-left col-md-9 col-sm-8 col-12">
								<div class="breadcrumb-list">
									{!! (isset($htmlTitle)) ? $htmlTitle : '' !!}
								</div>
                                <div style="clear:both;"></div>
							</div>
                            
							@if (isset($posts) and $posts->count() > 0)
								<div class="pull-right col-md-3 col-sm-4 col-12 text-right listing-view-action">
									<span class="list-view"><i class="icon-th"></i></span>
									<span class="compact-view"><i class="icon-th-list"></i></span>
									<span class="grid-view active"><i class="icon-th-large"></i></span>
								</div>
							@endif

							<div style="clear:both"></div>
						</div>
						

						<!-- Mobile Filter Bar -->
						<div class="mobile-filter-bar col-xl-12">
							<ul class="list-unstyled list-inline no-margin no-padding">
								@if (config('settings.listing.left_sidebar'))
								<li class="filter-toggle">
									<a class="">
										<i class="icon-th-list"></i> {{ t('Filters') }}
									</a>
								</li>
								@endif
								<li>
									<div class="dropdown">
										<a data-toggle="dropdown" class="dropdown-toggle">{{ t('Sort by') }}</a>
										<ul class="dropdown-menu">
											<li>
												<a href="{!! qsUrl(request()->url(), request()->except(['orderBy', 'distance']), null, false) !!}" rel="nofollow">
													{{ t('Sort by') }}
												</a>
											</li>
											<li>
												<a href="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'priceAsc']), null, false) !!}" rel="nofollow">
													{{ t('price_low_to_high') }}
												</a>
											</li>
											<li>
												<a href="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'priceDesc']), null, false) !!}" rel="nofollow">
													{{ t('price_high_to_low') }}
												</a>
											</li>
											@if (request()->filled('q'))
												<li>
													<a href="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'relevance']), null, false) !!}" rel="nofollow">
														{{ t('Relevance') }}
													</a>
												</li>
											@endif
											<li>
												<a href="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'date']), null, false) !!}" rel="nofollow">
													{{ t('Date') }}
												</a>
											</li>
											@if (isset($city, $distanceRange) and !empty($city) and !empty($distanceRange))
												@foreach($distanceRange as $key => $value)
													<li>
														<a href="{!! qsUrl(request()->url(), array_merge(request()->except('distance'), ['distance' => $value]), null, false) !!}" rel="nofollow">
															{{ t('around_x_distance', ['distance' => $value, 'unit' => getDistanceUnit()]) }}
														</a>
													</li>
												@endforeach
											@endif
											@if (config('plugins.reviews.installed'))
												<li>
													<a href="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'rating']), null, false) !!}"
													   rel="nofollow">
														{{ trans('reviews::messages.Rating') }}
													</a>
												</li>
											@endif
										</ul>
									</div>
								</li>
							</ul>
						</div>
						<div class="menu-overly-mask"></div>
						<!-- Mobile Filter bar End-->

						<div id="postsList" class="posts-wrapper row no-margin">
							@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.posts', 'search.inc.posts'])
						</div>

						<div class="tab-box save-search-bar text-center">
							@if (request()->filled('q') and request()->get('q') != '' and $count->get('all') > 0)
								<a name="{!! qsUrl(request()->url(), request()->except(['_token', 'location']), null, false) !!}" id="saveSearch"
								   count="{{ $count->get('all') }}">
									<i class="icon-star-empty"></i> {{ t('Save Search') }}
								</a>
							@else
								<a href="#"> &nbsp; </a>
							@endif
						</div>
						
					</div>
					
					<nav class="pagination-bar mb-5 pagination-sm" aria-label="">
						{!! $posts->appends(request()->query())->links() !!}
					</nav>

					<div class="post-promo text-center mb-5">
						<h2> {{ t('do_have_anything_to_sell_or_rent') }} </h2>
						<h5>{{ t('sell_products_and_services_online_for_free') }}</h5>
						@if (!auth()->check() and config('settings.single.guests_can_post_ads') != '1')
							<a href="#quickLogin" class="btn btn-border btn-post btn-add-listing" data-toggle="modal">{{ t('start_now') }}</a>
						@else
							<a href="{{ \App\Helpers\UrlGen::addPost() }}" class="btn btn-border btn-post btn-add-listing">{{ t('start_now') }}</a>
						@endif
					</div>

				</div>
				


				<div class="{{ $galleryColSm1 }} hidden-sm">


					<div class="brc__gallery">
					<div class="brc__gallery_header">
					<div>
					<div class="brc__head">Gallery Ads</div>
					<a class="brc__appear" href="{{ url('posts/create')}}" style="color:white">Want your ad here?
					</a>
					</div>
					<!-- <svg class="ysvg" style="width: 40px; height:40px"><use xlink:href="../assets/background/sprite.svg#gallery"></use></svg> -->
					</div>



					@if(isset($galleryadd) and $galleryadd->count() > 0)	
					@foreach($galleryadd as $key => $post)
	    					
	                @if(isset($post->latestPayment->package_id))

	                	<?php
	                		if ($post->pictures->count() > 0) {
								$postImg = imgUrl($post->pictures->get(0)->filename, 'medium');
							} else {
								$postImg = imgUrl(config('larapen.core.picture.default'), 'medium');
							}

	                	?>

	                <a href="{{ \App\Helpers\UrlGen::post($post) }}" title="{{ \Illuminate\Support\Str::limit($post->title, 70) }}">
						<div class="brc__gallery__entry gallery_entry" style="border-top:5px solid #ff0000">
						<div class="brc__gallery__entry__title entry_title">
						{{ \Illuminate\Support\Str::limit($post->title, 70) }}</div>
						<div class="brc__gallery__entry__images entry_images topmargin">
						 <img class="brc__image lazyloaded" style="max-width:80px;max-height:80px;display:inline-block" data-src="{{ $postImg }}" src="{{ $postImg }}">
						</div>
						</div>
						</a>


<!-- 
	                <div id="floatItem21" class="floatItem" style="height: 46px;"><table><tbody><tr><td valign="middle"><i style="color:#fac008" class="fa fa-star"></i></td><td><div class="ticker_box">New ad: <a href="{{ \App\Helpers\UrlGen::post($post) }}">{{ \Illuminate\Support\Str::limit($post->title, 70) }}</a> ({{ \Illuminate\Support\Str::limit($post->city->name, 70) }})</div></td></tr></tbody></table>
					</div> -->
					@endif
	              	
	               

	               @endforeach
	               @endif

				</div>

				</div>
				<div style="clear:both;"></div>
					<?php
						// echo "<pre>";	
						// print_r($posts[0]->category->parent_id != null);
						// die();
					?>
				@if(isset($cat_details) and $cat_details->count() > 0)
				@if($cat_details->parent_id != null)
				<div class="h-spacer"></div>
				<div class="container">
				<div class="row ">

				<div class="col-xl-12 page-content">

					{!! $cat_details->cat_below_description !!}
					
				</div>
				</div>

			 </div>	
			 @endif	
			 @endif	
			

				<!-- Advertising -->
				@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.advertising.bottom', 'layouts.inc.advertising.bottom'])

			</div>
		</div>
	</div>
@endsection

@section('modal_location')
	@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.modal.location', 'layouts.inc.modal.location'])
@endsection

@section('after_scripts')
	<script>
		$(document).ready(function () {
			$('#postType a').click(function (e) {
				e.preventDefault();
				var goToUrl = $(this).attr('href');
				redirect(goToUrl);
			});
			$('#orderBy').change(function () {
				var goToUrl = $(this).val();
				redirect(goToUrl);
			});
		});
		
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

	<script>
	
  listView('.list-view');
		/* Default view (See in /js/script.js) 
									listView('.list-view');
				
							/* Save the Search page display mode 
		var listingDisplayMode = readCookie('listing_display_mode');
		if (!listingDisplayMode) {
			createCookie('listing_display_mode', '.list-view', 7);
		}*/
		
		/* Favorites Translation */
		var lang = {
			labelSavePostSave: "Save ad",
			labelSavePostRemove: "Remove favorite",
			loginToSavePost: "Please log in to save the Ads.",
			loginToSaveSearch: "Please log in to save the search.",
			confirmationSavePost: "Post saved in favorites successfully!",
			confirmationRemoveSavePost: "Post deleted from favorites successfully !",
			confirmationSaveSearch: "Search saved successfully !",
			confirmationRemoveSaveSearch: "Search deleted successfully !"
		};
		
		 
$(".clickable").click(function(){
	var url = $(this).attr('url');
	window.location.href = url;
	
});


$( "#postthisform" ).click(function() {
  $( "#postForm" ).submit();
});



setTimeout(function() {
    $(".cornerRibbons").show();
  }, 50);


$(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

});
	</script>
@endsection
