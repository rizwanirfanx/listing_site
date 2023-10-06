<!-- <div class="row payment-plugin" id="whatsappPayment" style="display: none;">
    <div class="col-md-10 col-sm-12 box-center center mt-4 mb-0">
        <div class="row">
            
            <div class="col-xl-12 text-center">
                <img class="img-fluid" style="width: 25vh;height: auto;" src="{{ url('images/paypal/payment-whatsapp.png') }}" title="{{ trans('paypal::messages.Payment with Paypal') }}">
            </div>
            
           
        
        </div>
    </div>
</div> -->


<div class="row payment-plugin" id="stripePayment" style="display: none;">
   <div class="col-md-10 col-sm-12 box-center center mt-4 mb-0">
      <div class="row">
         <div class="col-xl-12 text-center">
            <img class="img-fluid" src="{{ url('images/stripe/payment.png') }}" title="Payment with Stripe">
         </div>
         <div class="col-xl-12 mt-3">
            <!-- CREDIT CARD FORM STARTS HERE -->
            <div class="card card-default credit-card-box">
               <div class="card-header">
                  <h3 class="panel-title">
                     Card Details
                  </h3>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="mb-3 form-field-box">
                           <label class="col-form-label" for="stripeCardNumber">Card Number</label>
                           <div class="input-group">
                              <input type="tel" class="form-control" name="stripeCardNumber" placeholder="Valid Card Number"  autocomplete="cc-number" maxlength="16" required="">
                              <span class="input-group-text">
                              <i class="fa fa-credit-card"></i>
                              </span>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-12">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="mb-3 form-field-box">
                                 <label class="col-form-label" for="stripeCardExpiry"><span class="hidden-xs">Expiration</span><span class="visible-xs-inline">Exp.</span> Date</label>
                                 <input type="tel" class="form-control" onkeyup="addSlashes(this)" name="stripeCardExpiry" id="stripeCardExpiry" maxlength="7" placeholder="MM / YYYY" autocomplete="cc-exp" required="">
                              </div>
                           </div>
                           <div class="col-md-6 float-end">
                              <div class="mb-3 form-field-box">
                                 <label class="col-form-label" for="stripeCardCVC">CV Code</label>
                                 <input type="tel" class="form-control" name="stripeCardCVC" placeholder="CVC" autocomplete="cc-csc" maxlength="3" required="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="stripePaymentErrors" style="display:none;">
                        <div class="col-xs-12">
                           <p class="payment-errors"></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- CREDIT CARD FORM ENDS HERE -->
         </div>
      </div>
   </div>
</div>

@section('after_scripts')
    @parent
    <script>
        $(document).ready(function ()
        {

        


            var selectedPackage = $('input[name=package_id]:checked').val();
            var packagePrice = getPackagePrice(selectedPackage);
            var paymentMethod = $('#paymentMethodId').find('option:selected').data('name');
    
            /* Check Payment Method */
            checkPaymentMethodForstripe(paymentMethod, packagePrice);
            
            $('#paymentMethodId').on('change', function () {
                paymentMethod = $(this).find('option:selected').data('name');
                checkPaymentMethodForstripe(paymentMethod, packagePrice);
            });
            $('.package-selection').on('click', function () {
                selectedPackage = $(this).val();
                packagePrice = getPackagePrice(selectedPackage);
                paymentMethod = $('#paymentMethodId').find('option:selected').data('name');
                checkPaymentMethodForstripe(paymentMethod, packagePrice);
            });
    
            /* Send Payment Request */
            $('#submitPostForm').on('click', function (e)
            {
                e.preventDefault();
        
                paymentMethod = $('#paymentMethodId').find('option:selected').data('name');
                
                if (paymentMethod != 'stripe' || packagePrice <= 0) {
                    return false;
                }
    
                $('#postForm').submit();
        
                /* Prevent form from submitting */
                return false;
            });
        });

        function checkPaymentMethodForstripe(paymentMethod, packagePrice)
        {
            if (paymentMethod == 'stripe' && packagePrice > 0) {
                $('#stripePayment').show();
            } else {
                $('#stripePayment').hide();
            }
        }

         function addSlashes() {
         var expire_date = document.getElementById('stripeCardExpiry').value;
            if(expire_date.length == 2){
          document.getElementById('stripeCardExpiry').value = expire_date +'/';
      }
         }



    </script>
@endsection
