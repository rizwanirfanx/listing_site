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

@section('wizard')
    @includeFirst([config('larapen.core.customizedViewPath') . 'post.createOrEdit.multiSteps.inc.wizard', 'post.createOrEdit.multiSteps.inc.wizard'])
@endsection

@section('content')
	@includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
    <div class="main-container">
        <div class="container">
            <div class="row">
    
                @includeFirst([config('larapen.core.customizedViewPath') . 'post.inc.notification', 'post.inc.notification'])
                
                <div class="col-md-12 page-content">
                    <div class="inner-box">
						
                        <h2 class="title-2">
							<strong>
								@if (isset($selectedPackage) && !empty($selectedPackage))
									<i class="icon-wallet"></i> {{ t('Payment') }}
								@else
									<i class="icon-tag"></i> {{ t('Pricing') }}
								@endif
							</strong>
						</h2>
						
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form" id="postForm" method="POST" action="{{ url()->current() }}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" id="paymentchange" value="0">
                                    <fieldset>
										<input type='hidden' name='pricehidden' class='pricehidden'>
										@if (isset($selectedPackage) && !empty($selectedPackage))
											<?php $currentPackagePrice = $selectedPackage->price; ?>
											@includeFirst([
												config('larapen.core.customizedViewPath') . 'post.createOrEdit.inc.packages.selected',
												'post.createOrEdit.inc.packages.selected'
											])
										@else
											@includeFirst([
												config('larapen.core.customizedViewPath') . 'post.createOrEdit.inc.packages',
												'post.createOrEdit.inc.packages'
											])
                                        @endif
                                      
											<div class="row payment-plugin" id="wallet" style="display:none"> <div class="col-md-10 col-sm-12 box-center center mt-4 mb-0"> <div class="row"> <div class="col-xl-12 text-center"> <img class="img-fluid" style="width: 25vh;height: auto;" src="{{ asset('images/wallet.webp') }} " title="paypal::messages.Payment with Wallet"> </div> </div> 
											<div id="textstrp">
											   
											</div>
										
											
											<h4 style="text-align:center">Your Balance is <span style="color:green;"><b>Rs <?php echo $wallet; ?></b></span></h4>
										<div id="checkbalance" style="text-align:center"></div>
										
											</div></div>
											
                                        <!-- Button  -->
                                        <div class="form-group">
                                            <div class="col-md-12 text-center mt-4">
												<a href="{{ url('posts/create/photos') }}" class="btn btn-default btn-lg">
													{{ t('Previous') }}
												</a>
												
												
												<span id='btn'>
												    <button  id="submitPostForm" class="btn btn-success btn-lg submitPostForm"> {{ t("Pay") }} </button>
												</span>
                                                
                                                
                                            </div>
                                        </div>
                                    
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.page-content -->
            </div>
        </div>
    </div>
    
    
@endsection

@section('after_styles')
@endsection

@section('after_scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js"></script>
    @if (file_exists(public_path() . '/assets/plugins/forms/validation/localization/messages_'.config('app.locale').'.min.js'))
        <script src="{{ url('/assets/plugins/forms/validation/localization/messages_'.config('app.locale').'.min.js') }}" type="text/javascript"></script>
    @endif

    <script>
   
        @if (isset($packages) && isset($paymentMethods) && $packages->count() > 0 && $paymentMethods->count() > 0)
			
			var currentPackagePrice = {{ isset($currentPackagePrice) ? $currentPackagePrice : 0 }};
			var currentPaymentIsActive = {{ isset($currentPaymentIsActive) ? $currentPaymentIsActive : 0 }};
			var isCreationFormPage = true;
			$(document).ready(function ()
			{
				var selectedPackage = $('input[name=package_id]:checked').val();
				
				var packagePrice = getPackagePrice(selectedPackage);

				var packageCurrencySymbol = $('input[name=package_id]:checked').data('currencysymbol');
				var packageCurrencyInLeft = $('input[name=package_id]:checked').data('currencyinleft');
				var paymentMethod = $('#paymentMethodId').find('option:selected').data('name');
				showAmount(packagePrice, packageCurrencySymbol, packageCurrencyInLeft);
				showPaymentSubmitButton(currentPackagePrice, packagePrice, currentPaymentIsActive, paymentMethod, isCreationFormPage);
				
				$('.package-selection').click(function () {
					selectedPackage = $(this).val();
				
					$('.change_package').prop("disabled", true);
					$('#change_option_'+selectedPackage).prop("disabled", false);
					$('#duration').val(1);
					packagePrice = getPackagePrice(selectedPackage);
					packageCurrencySymbol = $(this).data('currencysymbol');
					packageCurrencyInLeft = $(this).data('currencyinleft');
					showAmount(packagePrice, packageCurrencySymbol, packageCurrencyInLeft);


					showPaymentSubmitButton(currentPackagePrice, packagePrice, currentPaymentIsActive, paymentMethod, isCreationFormPage);
				});
				

				$('#paymentMethodId').on('change', function () {
					paymentMethod = $(this).find('option:selected').data('name');
					showPaymentSubmitButton(currentPackagePrice, packagePrice, currentPaymentIsActive, paymentMethod, isCreationFormPage);
					 
				});
				
				$('#submitPostForm').on('click', function (e) {
					e.preventDefault();
					
					if (packagePrice <= 0) {
					   
						$('#postForm').submit();
					}
					
					return false;
				});
				
			});
        	


        @endif
var phone = "{{ $phone }}";
var email = "{{ auth()->user()->email }}";
$("a#addmoney").click(function(){
	var whatsapp = "https://wa.me/"+phone+"/?text=Hi, I want to top up my wallet account of Rs "+ package +" On "+email+" At Locanto Asia";
	window.location.href = whatsapp;
});
        function changeprice(event,price,packge_id)
        {
        	var final_price =  price*event.value;
            paymentMethod = $('#paymentMethodId').find('option:selected').data('name');
        	$('#duration').val(event.value);
        	$('.payable-amount').html(final_price);
        	$('#paymentchange').val(final_price);
        	showPaymentSubmitButton(currentPackagePrice, final_price, currentPaymentIsActive, paymentMethod, isCreationFormPage);
        }

		function showPaymentSubmitButton(currentPackagePrice, packagePrice, currentPaymentIsActive, paymentMethod, isCreationFormPage = true)
		{

		    let walletby={{ $wallet }};
			let submitBtn = $('#submitPostForm');
			let submitBtnLabel = {
				'pay': '{{ t('Pay') }}',
				'submit': '{{ t('submit') }}',
			};
			var paymentchange=$('#paymentchange').val();
			console.log('test');
		    console.log(paymentMethod);
		    console.log(packagePrice);
		    console.log(walletby);
		    	
			if(paymentMethod=='wallet' && packagePrice> 0 ){
                   
                    if(walletby<packagePrice){
                       
                        wha='https://wa.me/'+phone+'/?text=Hi%2C+I+want+to+top+up+my+wallet+account+of+Rs+'+ packagePrice +'++On++'+email+' At+Locanto+Asia';
                        text='<span style="color:red">Payable Amount= '+packagePrice+'   You are unable to pay please <b><a href='+wha+'>topup</a></b> your wallet</span>';
                        $('#checkbalance').html(text);
                        $('#btn').html('');
                   
                    }else{
                        if(paymentchange>walletby){
                             wha='https://wa.me/'+phone+'/?text=Hi%2C+I+want+to+top+up+my+wallet+account+of+Rs+'+ packagePrice +'++On++'+email+' At+Locanto+Asia';
                            text='<span style="color:red">Payable Amount= '+paymentchange+'   You are unable to pay please <b><a href='+wha+'>topup</a></b> your wallet</span>';
                             $('#checkbalance').html(text);
                             $('#btn').html('');
                        }else{
                             $('#btn').html('<input type="submit" id="testsubmit" value="Pay" class="btn btn-success btn-lg" >');
                             $('#checkbalance').html('');
                        }
                       
                        
                       
                    }
                        $('input[name="stripeCardNumber"]').val(' ');
                        $('input[name="stripeCardExpiry"]').val(' ');
                        $('input[name="stripeCardCVC"]').val(' ');
                        
                        
               $('#wallet').show();
           }else{
               $('#btn').html('<button  id="submitPostForm" class="btn btn-success btn-lg submitPostForm"> {{ t("Pay") }} </button>');
               
               $('input[name="stripeCardNumber"]').val(' ');
                     $('input[name="stripeCardExpiry"]').val(' ');
                      $('input[name="stripeCardCVC"]').val(' ');
               $('#wallet').hide();
           }
                   
			let skipBtn = $('#skipBtn');
			
			if (packagePrice > 0) {
				submitBtn.html(submitBtnLabel.pay).show();
				skipBtn.hide();
				
				if (currentPackagePrice > packagePrice) {
					submitBtn.hide().html(submitBtnLabel.submit);
				}
				if (currentPackagePrice == packagePrice) {
				   
					if (paymentMethod == 'offlinepayment') {
						if (!isCreationFormPage && currentPaymentIsActive != 1) {
							submitBtn.hide().html(submitBtnLabel.submit);
							skipBtn.show();
						}
					}
				}
			} else {
				skipBtn.show();
				submitBtn.html(submitBtnLabel.submit);
			}
		}
    </script>
@endsection
