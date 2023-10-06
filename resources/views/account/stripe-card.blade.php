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
<?php
	$plugins = array_keys((array)config('plugins'));
	$publicDisk = \Storage::disk(config('filesystems.default'));
?>
<!DOCTYPE html>
<html lang="{{ ietfLangTag(config('app.locale')) }}"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@includeFirst([config('larapen.core.customizedViewPath') . 'common.meta-robots', 'common.meta-robots'])
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="apple-mobile-web-app-title" content="{{ config('settings.app.app_name') }}">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ $publicDisk->url('app/default/ico/apple-touch-icon-144-precomposed.png') . getPictureVersion()
	}}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ $publicDisk->url('app/default/ico/apple-touch-icon-114-precomposed.png') . getPictureVersion() }}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ $publicDisk->url('app/default/ico/apple-touch-icon-72-precomposed.png') . getPictureVersion() }}">
	<link rel="apple-touch-icon-precomposed" href="{{ $publicDisk->url('app/default/ico/apple-touch-icon-57-precomposed.png') . getPictureVersion() }}">
	<link rel="shortcut icon" href="{{ imgUrl(config('settings.app.favicon'), 'favicon') }}">
	<!-- PWA  -->
<meta name="theme-color" content="#6777ef"/>
<link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">

	<title>{!! MetaTag::get('title') !!}</title>
	{!! MetaTag::tag('description') !!}{!! MetaTag::tag('keywords') !!}
	 @yield('robots_nofollow')
	<link rel="canonical" href="{{ request()->fullUrl() }}"/>
	@if (isset($post))
		@if (isVerifiedPost($post))
			@if (config('services.facebook.client_id'))
				<meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}" />
			@endif
			{!! $og->renderTags() !!}
			{!! MetaTag::twitterCard() !!}
		@endif
	@else
		@if (config('services.facebook.client_id'))
			<meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}" />
		@endif
		{!! $og->renderTags() !!}
		{!! MetaTag::twitterCard() !!}
	@endif
	@include('feed::links')
	{!! seoSiteVerification() !!}
	
	@if (file_exists(public_path('manifest.json')))
		<!--<link rel="manifest" href="/manifest.json">
		-->
<link rel="manifest" href="{{ asset('/manifest.json') }}">
	@endif
	
	@stack('before_styles_stack')
    @yield('before_styles')
	
	@if (config('lang.direction') == 'rtl')
		<link href="https://fonts.googleapis.com/css?family=Cairo|Changa" rel="stylesheet">
		<link href="{{ url(mix('css/app.rtl.css')) }}" rel="stylesheet">
	@else
		<link href="{{ url(mix('css/app.css')) }}" rel="stylesheet">
	@endif


</head>
			
            <div style="width: 300px;margin: 0 auto;margin-top: 8px;">
               
                  <div id="card-element">
                      <form action="/extra/plugins/stripe">
                          <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-7">
                              <input type="tel" class="form-control" name="stripeCardNumber" placeholder="Valid Card Number" autocomplete="cc-number" maxlength="16" required=""> 
                            </div>
                            <div class="col-lg-3">
                                 
                   <input type="tel" class="form-control" onkeyup="addSlashes(this)" name="stripeCardExpiry" id="stripeCardExpiry" maxlength="7" placeholder="MM / YYYY" autocomplete="cc-exp" required="">
                            
                                <input type="tel" class="form-control" name="stripeCardCVC" placeholder="CVC" autocomplete="cc-csc" maxlength="3" required=""> 
                            </div>
                        </div>
                        
                    </div>
                    <button id="cardpaybtn" class="btn btn-success" style="width: 50%;margin: 0px 15%;    color: #fff;
    background-color: #2ecc71;padding: 8px;border-radius: 5px;border-color: #2ecc71;"> Pay Now Rs10000</button>
                 
                      </form> 
                    
              
                  
                   
                  </div>
         
         
         
         <div id="stripeerror" class="text-daanger" style="color:red"></div>
          <div id="stripesuccess" class="text-success"></div>
          <div id="stripeloader" class="text-center"></div>
          
          
            </div>
       

     

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js"></script>
	<script src="https://js.stripe.com/v3/"></script>

<script>

    
	var cs = '';
        var stripe = Stripe('pk_live_51Gxs1ODiNS35MYDSNSqMtwyKVJeSvfG6F3oy6ncudS1LVaCnO4r3eoNVHSMBzMng2GklQbUUWGNqL8OEbGzRPArj00HWVa6Wzt');
        var elements = stripe.elements();
        // Set up Stripe.js and Elements to use in checkout form
        var style = {
          base: {
            color: "#32325d",
          }
        };

        var card = elements.create("card", { style: style });
        card.mount("#card-element");


        card.addEventListener('change', ({error}) => {
          if (error) {
              $("div#stripeerror").html("<div class='alert alert-danger>'"+error.message+"</div>");
            ///displayError.textContent = error.message;
            $('button#cardpaybtn').prop('disabled', true);

          } else {
            //displayError.textContent = '';
            $("div#stripeerror").empty();
             $('button#cardpaybtn').prop('disabled', false);

          }
        });

        var form = document.getElementById('payment-form');
        
        	$("button#cardpaybtn").click(function(){
        	   
            $("div#stripeloader").html('Processing your payment please wait...');
            $("div#loading1").show();
            $("input#is_paid").val("no");
            event.preventDefault();
          
          
          var name = "Asi432";
          var email =  "asif@yopmail.com";
          var total =  "10000";
                
          
          $.post("https://adposto.com/getintent", {total:total, email:email}, function(data){
              cs = data.id;
          //cardnumber,exp-date,cvc
          stripe.confirmCardPayment(cs, {
            payment_method: {
              card: card,
              billing_details: {
                name: name,
                email: email,
              }
            },
            setup_future_usage: 'off_session'
          }).then(function(result) {
             
           
            if (result.error) {
            $("div#loading1").hide();
              $('div#stripeerror').html("<div class='alert alert-danger'>"+result.error.message+"</div>");
               $("div#stripeloader").html('');
            
            } else {
              if (result.paymentIntent.status === 'succeeded') {
                $('div#stripesuccess').html("<div class='alert alert-success'>payment successfully completed.</div>");
                 $("div#stripeloader").html("Please wait! we are publishing your ad ... ");
                 
                 var message = "paymentdone";
                 window.parent.postMessage(message, "*");
    console.log('payment done');
                  
              }
            }
          });
          });
        });
</script>