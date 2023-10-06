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

<?php
	$addListingUrl = (isset($addListingUrl)) ? $addListingUrl : \App\Helpers\UrlGen::addPost();
	$addListingAttr = '';
	if (!auth()->check()) {
		if (config('settings.single.guests_can_post_ads') != '1') {
			$addListingUrl = '#quickLogin';
			$addListingAttr = ' data-toggle="modal"';
		}
	}
?>


@section('after_styles')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<style type="text/css">
    
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap");

/*===== Variable Define =====*/
:root {
    --primary-color: #1D5991; 
}

body {
  font-family: "Poppins", sans-serif !important;
   background-color: #eee;
}
small,
span{
    font-weight: 600;
}  
.headline{
    color:var(--primary-color);
}
.main-btn{
    background-color: var(--primary-color);
    border-radius: 30px;
}

@media (max-width:767px){
    .main-btn{
        margin-top:20px;
    }
}


.mg-0{
    margin-bottom: 0px !important;
}
.radius{
    border-radius: 20px !important;
    border: 1px solid black;
}
.pov{
    font-size: 40px;
}
.smfont{
    font-size: 14px;
}
.star-img {
    border-radius: 50%;
    background-color: #ff5124;
    padding: 17px;
    color: #fff;
    position: absolute;
    z-index: 1;
    top: 228px;
}
.circle{
    border-radius: 50%;
    background-color: #fb8d21;
    padding: 14px;
    color: #fff;
    font-size: 20px;
}
.circle-img{
    border-radius: 50%;
    background-color: #fb8d21;
    padding: 8px;
    color: #fff;
    position: absolute;
    left: 4px;
    top: 4px;
}
.circle1{
    border-radius: 50%;
    background-color: #8057a7;
    padding: 14px;
    color: #fff;
}
.circle1-img{
    border-radius: 50%;
    background-color: #8057a7;
    padding: 8px;
    color: #fff;
    position: absolute;
    left: 4px;
    top: 4px;
}
.circle2{
    border-radius: 50%;
    background-color: #249da0;
    padding: 14px;
    color: #fff;
    margin-left: -15px;
}
.circle2-img{
    border-radius: 50%;
    background-color: #249da0;
    padding: 8px;
    color: #fff;
    position: absolute;
    left: 4px;
    top: 4px;
}
.btn-custom{
    background-color: #8057a7;
    padding: 4px 50px;
    font-weight: 700;
    color:white;
}
.btn-custom:hover{
    background-color: #fb8d21;
    box-shadow: #1d5991;
    color: #fff;
}
.btn-custom-pro{
    background-color: #1d5991;
    padding: 4px 50px;
    font-weight: 700;
    color: white;
}
.btn-custom-pro:hover{
    background-color: #fb8d21;
    box-shadow: #1d5991;
    color: #fff;
}
.btn-custom-p{
    background-color: #1d5991;
    padding: 4px 20px;
    font-weight: 700;
    color: white;
}
.btn-custom-p:hover{
    background-color: #fb8d21;
    box-shadow: #1d5991;
    color: #fff;
}
.btn-custom-a{
    background-color: #1d5991;
    padding: 4px 50px;
    font-weight: 700;
    color: white;
}
.btn-custom-a:hover{
    background-color: #fb8d21;
    box-shadow: #1d5991;
    color: #fff;
}
.px{
    padding: 0px 100px;
}
.rounded-left {
    border-top-left-radius: 1.25rem!important;
    border-bottom-left-radius: 1.25rem!important;
}
.rounded-right {
    border-top-right-radius: 1.25rem!important;
    border-bottom-right-radius: 1.25rem!important;
}
/*@media (min-width: 992px){
.col-lg-2 {
    -ms-flex: 0 0 16.666667%;
    flex: 0 0 19.666667%;
    max-width: 19.666667%;
}
.col-lg-1 {
    flex: 0 0 0.333333%;
    max-width: 0.333333%;
}

}*/

 @media  (max-width: 2560px) {
    .star-img {
        border-radius: 50%;
        background-color: #ff5124;
        padding: 17px;
        color: #fff;
        position: absolute;
        z-index: 1;
        top: 228px;
    }
    .rounded-left {
        border-top-left-radius: 1.25rem!important;
        border-bottom-left-radius: 1.25rem!important;
    }
    .rounded-right {
        border-top-right-radius: 1.25rem!important;
        border-bottom-right-radius: 1.25rem!important;
    }
 }
 
 @media  (max-width: 1440px) {
    .star-img {
        border-radius: 50%;
        background-color: #ff5124;
        padding: 17px;
        color: #fff;
        position: absolute;
        z-index: 1;
        top: 228px;
    }
    .rounded-left {
        border-top-left-radius: 1.25rem!important;
        border-bottom-left-radius: 1.25rem!important;
    }
    .rounded-right {
        border-top-right-radius: 1.25rem!important;
        border-bottom-right-radius: 1.25rem!important;
    }
 }
 @media  (max-width: 1024px) {
    .star-img {
        border-radius: 50%;
        background-color: #ff5124;
        padding: 17px;
        color: #fff;
        position: absolute;
        z-index: 1;
        top: 228px;
    }
    .rounded-left {
        border-top-left-radius: 1.25rem!important;
        border-bottom-left-radius: 1.25rem!important;
    }
    .rounded-right {
        border-top-right-radius: 1.25rem!important;
        border-bottom-right-radius: 1.25rem!important;
    }
 }
 @media  (max-width: 768px) {
    .star-img {
        border-radius: 50%;
        background-color: #ff5124;
        padding: 17px;
        color: #fff;
        position: absolute;
        z-index: 1;
        top: 228px;
    }
    .rounded-left {
        border-top-left-radius: 1.25rem!important;
        border-bottom-left-radius: 1.25rem!important;
    }
    .rounded-right {
        border-top-right-radius: 1.25rem!important;
        border-bottom-right-radius: 1.25rem!important;
    }
 }
 @media  (max-width: 425px) {
    .star-img {
        border-radius: 50%;
        background-color: #ff5124;
        padding: 17px;
        color: #fff;
        position: absolute;
        z-index: 1;
        top: 241px;
    }
    .rounded-left {
        border-top-left-radius: 0rem!important;
        border-bottom-left-radius: 0rem!important;
    }
    .rounded-right {
        border-top-right-radius: 0rem!important;
        border-bottom-right-radius: 0rem!important;
    }
 }
 @media  (max-width: 375px) {
    .star-img {
        border-radius: 50%;
        background-color: #ff5124;
        padding: 17px;
        color: #fff;
        position: absolute;
        z-index: 1;
        top: 246px;
    }
    .rounded-left {
        border-top-left-radius: 0rem!important;
        border-bottom-left-radius: 0rem!important;
    }
    .rounded-right {
        border-top-right-radius: 0rem!important;
        border-bottom-right-radius: 0rem!important;
    }
 }
 @media  (max-width: 320px) {
    .star-img {
        border-radius: 50%;
        background-color: #ff5124;
        padding: 12px;
        color: #fff;
        position: absolute;
        z-index: 1;
        top: 269px;
    }
    .rounded-left {
        border-top-left-radius: 1.25rem!important;
        border-bottom-left-radius: 1.25rem!important;
    }
    .rounded-right {
        border-top-right-radius: 1.25rem!important;
        border-bottom-right-radius: 1.25rem!important;
    }
    .rounded-left {
        border-top-left-radius: 0rem!important;
        border-bottom-left-radius: 0rem!important;
    }
    .rounded-right {
        border-top-right-radius: 0rem!important;
        border-bottom-right-radius: 0rem!important;
    }
 }
 

</style>

@endsection

@section('content')
	@includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
	<div class="main-container inner-page">
	    <div class="container-fluid text-center">
            <h6 class="mt-4 font-weight-bolder">Upgrade your ad and get up to 10x more views</h6>
            <small class="font-weight-bold">Receive additional Premium Features <span style="background-color: #fb8d21; color:#fff; padding:3px 6px ;">FREE</span> with our special package deals</small>

            @if ($packages->count() > 0)
                   

            <div class="container">

                <div class="card-deck mt-5">
                    <p class="star-img font-weight-bolder">Best Seller</p>
                     @foreach($packages as $package)

                     @if($package->id == 34)
                    <div class="card col-lg-6 col-md-12" style="background-color: #eee; border: none;">
                        <div class="col-md-12  font-weight-bolder" >
                            <div class="row">
                                <div class="col-sm-6 py-3 rounded-left" style="background-color: #fb8d21; color: #fff;">
                                    <h4 class="mg-0 mt-4 font-weight-bolder">{{ $package->short_name }}</h4>
                                    <p class="mg-0">1 month Top Ad</p>
                                    <span class="pov">+</span>
                                    <p class="mg-0">Pole Position</p>
                                    <!-- <p>Premium Ad</p> -->
                                </div>
                                <div class="col-sm-6 font-weight-bolder rounded-right" style="background-color: #fff; color: #000;">
                                    <p class="text-danger mt-3 mg-0 smfont"><del>{!! $package->currency->symbol !!} 4,000</del></p>
                                    <h4 class="mg-0" style="font-weight: 700;">
                                      @if ($package->currency->in_left == 1)
                                        {!! $package->currency->symbol !!}
                                    @endif
                                    {{ \App\Helpers\Number::format($package->price) }}
                                    @if ($package->currency->in_left == 0)
                                        {!! $package->currency->symbol !!}
                                    @endif

                                </h4>
                                    <i class=" circle mb-3 fas fa-thumbs-up"></i> <span class="pov">+</span> <i class="circle1 far fa-gem"></i>
                                    <div>
                                        <button onclick="buttonClick(this,{{$package->id}},{{$package->price}})" class="button_text_{{$package->id}} btn btn-custom mb-5 add_button">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    @elseif($package->id == 35)
                    <div class="card col-lg-6 col-md-12"  style="background-color: #eee; border: none;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-6 py-1 rounded-left" style="background-color: #249da0; color: #fff;">
                                    <h4 class="mg-0 mt-4 font-weight-bolder">{{ $package->short_name }}</h4>
                                    <p class="mg-0">1 month Top Ad</p>
                                    <p class="mg-0">1 month Gallery Ad</p>
                                    <span class="pov font-weight-bolder" >+</span>
                                    <p class="mg-0">Pole Position </p>
                                  <!--   <p>Premium Ad</p> -->
                                </div>
                                <div class="col-sm-6 font-weight-bolder rounded-right" style="background-color: #fff; color: #000;">
                                    <p class="text-danger mt-3 mg-0 smfont"><del>{!! $package->currency->symbol !!} 5,200</del></p>
                                    <h4 class="mg-0" style="font-weight: 700;">

                                    @if ($package->currency->in_left == 1)
                                    {!! $package->currency->symbol !!}
                                    @endif
                                    {{ \App\Helpers\Number::format($package->price) }}
                                    @if ($package->currency->in_left == 0)
                                        {!! $package->currency->symbol !!}
                                    @endif
                                </h4>
                                    <i class=" circle mb-3 fas fa-thumbs-up"></i> <i class=" circle2 far fa-images"></i> <span class="pov">+</span> <i class="circle1 far fa-gem"></i>
                                    <div>
                                        <button onclick="buttonClick(this,{{$package->id}},{{$package->price}})" class="button_text_{{$package->id}} btn btn-custom-pro mb-5 add_button">Add</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                     
                  </div>
                
            </div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="container rounded mt-5">
                <div class="card-deck">
                    <div class="col-lg-8 col-md-12 py-5  bg-light">
                        
                    @if ($packages->count() > 0)
					@foreach($packages as $package)
						
						<?php
						$url= url('public/images/package/top.png');
						if($package->short_name == 'Free')
							$url = url('public/images/package/top.png');
						else if($package->short_name == 'VIP Lounge')
							$url = url('public/images/package/top.png');
						else if($package->short_name == 'Top Add')
							$url = url('public/images/package/top.png');
						else if($package->short_name == 'Gallery Ad')
							$url = url('public/images/package/gallery.png');
						else if($package->short_name == 'Top Ad + Gallery Ad')
							$url = url('public/images/package/top.png');
                    $ids = [35,34];
						?>
					@if(!in_array($package->id, $ids))
					    <div class="row">
                        <div class="col-md-3" style="background-color: white;">
                            <div>
                                <i class=" circle-img mb-3 fas fa-thumbs-up"></i>
                                <img class="img-fluid py-3" src="{{$url}}" alt="img" >
                            </div>
                        </div>
                        <div class="col-md-6" style="border-right: 3px solid #eee;">
                            <div class="row mt-2">
                               <div class="col-sm-4 my-auto">
                                <h5 class="float-left font-weight-bolder">{{ $package->short_name }}</h5>
                               </div>
                               <div class="col-sm-4 my-auto"><h6 class="font-weight-bolder float-right">
                                     @if ($package->currency->in_left == 1)
                                        {!! $package->currency->symbol !!}
                                    @endif
                                    {{ \App\Helpers\Number::format($package->price) }}
                                    @if ($package->currency->in_left == 0)
                                        {!! $package->currency->symbol !!}
                                    @endif
                                   
                                   </h6></div>
                                <div class="col-sm-4">
                                    @if($package->id != 1)
                                    <div class="float-right"style="border: 1px solid black;">
                                        <select  disabled="disabled" id="change_option_{{$package->id}}" class="form-control" onchange="changeprice(this,{{$package->price}},{{$package->id}});" style="font-size: .875rem !important;height: 31px; padding: 0px 0px !important;">
                                           <!--  <option value="1">Select Duration</option> -->
                                            <option value="1">Weeks 1</option>
                                            <option value="2">Weeks 2</option>
                                            <option value="3">Weeks 3</option>
                                            <option value="4">Weeks 4</option>
                                            <option value="5">Weeks 5</option>
                                        </select>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <p class="float-left">{{$package->description}}</p>
                        </div>
                        <div class="col-md-3 text-center">
                            <button onclick="buttonClick(this,{{$package->id}},{{$package->price}})" class="btn btn-custom  button_text_{{$package->id}}">Add</button>
                        </div>
                      </div>
                     
                      
                      
                      <hr>
					    @endif 
					@endforeach
				    @else
					<div class="col-md-6 col-sm-12 text-center">
						<div class="card bg-light">
							<div class="card-body">
								{{ t('no_package_available') }}
							</div>
						</div>
					</div>
				    @endif
                    </div>
                    
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3 col-md-12 bg-light text-center">
                      <div class="card-body">
                        <h4 class="light my-4">Total</h4>
                        <h6 class="my-4" id="total_price">Rs 0.00</h6>
                        <div>
                        	<form action="{{url('posts/create')}}">
                        		<input type="hidden" name="package">
                        		<input type="hidden" name="final_price">
                        		<input type="hidden" name="duration">
                        	<button type="submit" class="btn btn-custom-p">Proceed</button>
                        	</form>
                        </div>
                      </div>
                    </div>
                    
                     
                </div>
            </div>
        </div>

	</div>
@endsection

@section('after_styles')
@endsection

@section('after_scripts')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>




<script type="text/javascript">
	
	//var values [];
	function changeprice(event,price,packge_id)
	{	
		var final_price = price*event.value;
		console.log(event.value);
		$("input[name=duration]").val(event.value);
		$("input[name=final_price]").val(final_price);
		$("#total_price").text('$ '+final_price.toLocaleString());
	}

	function buttonClick(e,id,price)
	{
		var old_text = $(".button_text_"+id).text()

	  	//--^------ change here
	  	if(old_text == "Add")
	  	{	
	  		var button_text = $("*[class*='button_text']");

	  		var change_option = $("*[id*='change_option']");

	  		button_text.text("Add");
	  		button_text.css("background-color","#1d5991");


	  		$(".button_text_"+id).text("Selected")
	  		$(".button_text_"+id).css("background-color","#fb8d21");
	  		
	  		$("#total_price").text('Rs '+price.toLocaleString());
	  		$("input[name=final_price]").val(price);
	  		$("input[name=package]").val(id);
	  		change_option.prop("disabled", true);
	  		change_option.prop("selectedIndex", 0);
	  		$("#change_option_"+id).prop("disabled", false);

	  		
	  	}
	  	else
	  	{	
	  		$("input[name=final_price]").val(null);
	  		$("input[name=package]").val(null);
	  		$("input[name=duration]").val(null);

	  		$("#total_price").text('Rs '+0.00	);		
	  		$(".button_text_"+id).text("Add")
	  		$("#change_option_"+id).prop("disabled", true);
	  		$("#change_option_"+id).prop("selectedIndex", 0);
	  		$(".button_text_"+id).css("background-color","#1d5991");
	  	}
	  	
	}

	$(document).ready(function()
	{
  		$('form').on('submit', function(e)
  		{		
  			var final_price = $("input[name=final_price]").val()
  			if(final_price<=0)
      		e.preventDefault();

  		});
	})
	

</script>
@endsection