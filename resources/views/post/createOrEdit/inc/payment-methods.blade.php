<?php $paymentMethodIdError = (isset($errors) and $errors->has('payment_method_id')) ? ' is-invalid' : ''; ?>
<div class="form-group mb-0">
	<div class="col-md-10 col-sm-12 p-0">

		<?php
// 		echo "<pre>";
// 			print_r($paymentMethods);
// 			die();
			?>


		<select class="form-control selecter{{ $paymentMethodIdError }}" name="payment_method_id" id="paymentMethodId">
			@foreach ($paymentMethods as $paymentMethod)
				@if (view()->exists('payment::' . $paymentMethod->name) && $paymentMethod->id!=2)
					<option value="{{ $paymentMethod->id }}"
							data-name="{{ $paymentMethod->name }}"
							{{ (old('payment_method_id', $currentPaymentMethodId)==$paymentMethod->id) ? 'selected="selected"' : '' }}
					>
						@if ($paymentMethod->name == 'offlinepayment')
							{{ trans('offlinepayment::messages.Offline Payment') }}
						@else
							{{ $paymentMethod->display_name }}
						@endif
					</option>
				@endif
			@endforeach
			<option value="5" data-name="wallet"> My Wallet </option>
		</select>
	</div>
</div>