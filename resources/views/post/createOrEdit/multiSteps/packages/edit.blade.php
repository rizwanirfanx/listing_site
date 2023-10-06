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
								@if (isset($selectedPackage) and !empty($selectedPackage))
									<i class="icon-wallet"></i> {{ t('Payment') }}
								@else
									<i class="icon-tag"></i> {{ t('Pricing') }}
								@endif
							</strong>
							<?php
							try {
								if (auth()->check()) {
									if (auth()->user()->can(\App\Models\Permission::getStaffPermissions())) {
										$postLink = '-&nbsp;<a href="' . \App\Helpers\UrlGen::post($post) . '"
												  class="tooltipHere"
												  title=""
												  data-placement="top"
												  data-toggle="tooltip"
												  data-original-title="' . $post->title . '"
										>' . \Illuminate\Support\Str::limit($post->title, 45) . '</a>';
										
										echo $postLink;
									}
								}
							} catch (\Exception $e) {}
							?>
						</h2>
						
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form" id="postForm" method="POST" action="{{ url()->current() }}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" id="paymentchange" value="0">
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <fieldset>
										
										@if (isset($selectedPackage) and !empty($selectedPackage))
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
												<a id="skipBtn" href="{{ \App\Helpers\UrlGen::post($post) }}" class="btn btn-default btn-lg">
													{{ t('Skip') }}
												</a>
												<span id='btn'>
                                                <button id="submitPostForm" class="btn btn-success btn-lg submitPostForm"> {{ t('Pay') }} </button>
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
			var isCreationFormPage = {{ request()->segment(2) == 'create' ? 'true' : 'false' }};
			$(document).ready(function ()
			{
				/* Show price & Payment Methods */
				var selectedPackage = $('input[name=package_id]:checked').val();
				var packagePrice = getPackagePrice(selectedPackage);
				var packageCurrencySymbol = $('input[name=package_id]:checked').data('currencysymbol');
				var packageCurrencyInLeft = $('input[name=package_id]:checked').data('currencyinleft');
				var paymentMethod = $('#paymentMethodId').find('option:selected').data('name');
				showAmount(packagePrice, packageCurrencySymbol, packageCurrencyInLeft);
				showPaymentSubmitButton(currentPackagePrice, packagePrice, currentPaymentIsActive, paymentMethod, isCreationFormPage);
				
				/* Select a Package */
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
				
				/* Select a Payment Method */
				$('#paymentMethodId').on('change', function () {
					paymentMethod = $(this).find('option:selected').data('name');
					showPaymentSubmitButton(currentPackagePrice, packagePrice, currentPaymentIsActive, paymentMethod, isCreationFormPage);
				});
				
				/* Form Default Submission */
				$('#submitPostForm').on('click', function (e) {
					e.preventDefault();
					
					if (packagePrice <= 0) {
						$('#postForm').submit();
					}
					
					return false;
				});
			});
        
        @endif


        function changeprice(event,price,packge_id)
        {
        	var final_price =  price*event.value;
        	$('.payable-amount').html(final_price);
        	$('#duration').val(event.value);
        	
        	paymentMethod = $('#paymentMethodId').find('option:selected').data('name');
        	$('#paymentchange').val(final_price);
        	showPaymentSubmitButton(currentPackagePrice, final_price, currentPaymentIsActive, paymentMethod, isCreationFormPage);
        	
        }
		/* Show or Hide the Payment Submit Button */
		/* NOTE: Prevent Package's Downgrading */
		/* Hide the 'Skip' button if Package price > 0 */
		function showPaymentSubmitButton(currentPackagePrice, packagePrice, currentPaymentIsActive, paymentMethod, isCreationFormPage = true)
		{
		    let walletby={{ $wallet }};
			let submitBtn = $('#submitPostForm');
			let submitBtnLabel = {
				'pay': '{{ t('Pay') }}',
				'submit': '{{ t('submit') }}',
			};
			var paymentchange=$('#paymentchange').val();
			
			if(paymentMethod=='wallet' && packagePrice> 0 ){
                   
                    if(walletby<packagePrice){
                        
                        text='<span style="color:red">Payable Amount= '+packagePrice+'   You are unable to pay please <b><a href="/account/my-wallet">topup</a></b> your wallet</span>';
                        $('#checkbalance').html(text);
                        
                        $('#btn').html('');
                   
                    }else{
                       
                        if(paymentchange>walletby){
                            
                            text='<span style="color:red">Payable Amount= '+paymentchange+'   You are unable to pay please <b><a href="/account/my-wallet">topup</a></b> your wallet</span>';
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
