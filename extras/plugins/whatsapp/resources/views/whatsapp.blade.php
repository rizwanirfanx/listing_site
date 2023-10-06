<div class="row payment-plugin" id="whatsappPayment" style="display: none;">
    <div class="col-md-10 col-sm-12 box-center center mt-4 mb-0">
        <div class="row">
            
            <div class="col-xl-12 text-center">
                <img class="img-fluid" style="width: 25vh;height: auto;" src="{{ url('images/payment-whatsapp.png') }}" title="{{ trans('paypal::messages.Payment with Whatsapp') }}">
            </div>
            
            <!-- ... -->
        
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
            checkPaymentMethodForwhatsapp(paymentMethod, packagePrice);
            
            $('#paymentMethodId').on('change', function () {
                paymentMethod = $(this).find('option:selected').data('name');
                checkPaymentMethodForwhatsapp(paymentMethod, packagePrice);
            });
            $('.package-selection').on('click', function () {
                selectedPackage = $(this).val();
                packagePrice = getPackagePrice(selectedPackage);
                paymentMethod = $('#paymentMethodId').find('option:selected').data('name');
                checkPaymentMethodForwhatsapp(paymentMethod, packagePrice);
            });
    
            /* Send Payment Request */
            $('#submitPostForm').on('click', function (e)
            {
                e.preventDefault();
        
                paymentMethod = $('#paymentMethodId').find('option:selected').data('name');
                var selectedPackageName = $('input[name="package_id"]:checked').attr('data-name');

                if (paymentMethod != 'whatsapp' || packagePrice <= 0) {
                    return false;
                }
    
                $('#postForm').submit();
                
                var number = "{{$paymentMethod->phone_number}}";
                var url = 'https://api.whatsapp.com/send?phone='+number+'&text=I am interested in your ad Packages I posted recently my ad with Package Plan please approve my ad which i posted on Zecanto with selected package '+selectedPackageName;

                window.open(url, '_blank');
                
                /* Prevent form from submitting */
                return false;
            });
        });

        function checkPaymentMethodForwhatsapp(paymentMethod, packagePrice)
        {
            if (paymentMethod == 'whatsapp' && packagePrice > 0) {
                $('#whatsappPayment').show();
            } else {
                $('#whatsappPayment').hide();
            }
        }
    </script>
@endsection
