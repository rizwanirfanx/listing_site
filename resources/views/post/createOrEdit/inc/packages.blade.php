@if (isset($packages, $paymentMethods) && $packages->count() > 0 && $paymentMethods->count() > 0)
	<div class="well pb-0">
		<h3><i class="icon-certificate icon-color-1"></i> {{ t('Premium Ad') }} </h3>
		<p>
			{{ t('premium_plans_hint') }}
		</p>
		<?php $packageIdError = (isset($errors) && $errors->has('package_id')) ? ' is-invalid' : ''; ?>
		<div class="form-group mb-0">
			<table id="packagesTable" class="table table-hover checkboxtable mb-0">
				@foreach ($packages as $package)
					<?php
					$packageStatus = '';
					$badge = '';
					if (isset($currentPackageId, $currentPackagePrice, $currentPaymentIsActive)) {
						// Prevent Package's Downgrading
						if ($currentPackagePrice > $package->price) {
							$packageStatus = ' disabled';
							$badge = ' <span class="badge badge-danger">' . t('Not available') . '</span>';
						} elseif ($currentPackagePrice == $package->price) {
							$badge = '';
						} else {
							if ($package->price > 0) {
								$badge = ' <span class="badge badge-success">' . t('Upgrade') . '</span>';
							}
						}
						if ($currentPackageId == $package->id) {
							$badge = ' <span class="badge badge-secondary">' . t('Current') . '</span>';
							if ($currentPaymentIsActive == 0) {
								$badge .= ' <span class="badge badge-warning">' . t('Payment pending') . '</span>';
							}
						}
					} else {
						if ($package->price > 0) {
							$badge = ' <span class="badge badge-success">' . t('Upgrade') . '</span>';
						}
					}
					$ids = [35,34,1];
					?>
					<tr>
						<td class="text-left align-middle p-3">
							<div class="form-check">
								<input class="form-check-input package-selection{{ $packageIdError }}"
									   type="radio"
									   name="package_id"
									   id="packageId-{{ $package->id }}"
									   value="{{ $package->id }}"
									   data-name="{{ $package->name }}"
									   data-currencysymbol="{{ $package->currency->symbol }}"
									   data-currencyinleft="{{ $package->currency->in_left }}"
										{{ (old('package_id', isset($currentPackageId) ? $currentPackageId : 0)==$package->id) ? ' checked' : (($package->price==0) ? ' checked' : '') }} {{
										$packageStatus }}
								>
								<label class="form-check-label mb-0{{ $packageIdError }}">
									<strong class="tooltipHere"
											title=""
											data-placement="right"
											data-toggle="tooltip"
											data-original-title="{!! $package->description_string !!}"
									>{!! $package->name . $badge !!} </strong>
								</label>
							</div>
						</td>
						<td class="text-right align-middle p-3">

							@if(!in_array($package->id, $ids))
							<select  disabled="disabled" id="change_option_{{$package->id}}" class="change_package form-control" onchange="changeprice(this,{{$package->price}},{{$package->id}});">
                                           <!--  <option value="1">Select Duration</option> -->
                                            <option value="1">Weeks 1</option>
                                            <option value="2">Weeks 2</option>
                                            <option value="3">Weeks 3</option>
                                            <option value="4">Weeks 4</option>
                                            <option value="5">Weeks 5</option>
                                        </select>
                            @elseif($package->id == 34 || $package->id == 35)
                            <b>1 Month</b>
                            @endif



						</td>

						<td class="text-right align-middle p-3">
							<p id="price-{{ $package->id }}" class="mb-0">
								@if ($package->currency->in_left == 1)
									<span class="price-currency">{!! $package->currency->symbol !!}</span>
								@endif
								<span class="price-int">{{ $package->price }}</span>
								@if ($package->currency->in_left == 0)
									<span class="price-currency">{!! $package->currency->symbol !!}</span>
								@endif
							</p>
						</td>
					</tr>
				@endforeach
				<input type="hidden" id="duration" name="duration">
				<tr>
					<td class="text-left align-middle p-3">
						@includeFirst([
							config('larapen.core.customizedViewPath') . 'post.createOrEdit.inc.payment-methods',
							'post.createOrEdit.inc.payment-methods'
						])
					</td>
					<td class="text-right align-middle p-3">
						<p class="mb-0">
							<strong>
								{{ t('Payable Amount') }}:
								<span class="price-currency amount-currency currency-in-left" style="display: none;"></span>
								<span class="payable-amount">0</span>
								<span class="price-currency amount-currency currency-in-right" style="display: none;"></span>
							</strong>
						</p>
					</td>
				</tr>
			
			</table>
		</div>
	</div>
	
	@includeFirst([
		config('larapen.core.customizedViewPath') . 'post.createOrEdit.inc.payment-methods.plugins',
		'post.createOrEdit.inc.payment-methods.plugins'
	])

@endif