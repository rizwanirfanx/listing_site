<?php

namespace extras\plugins\stripe;

use App\Helpers\Number;
use App\Models\Post;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Helpers\Payment;
use App\Models\Package;
use Omnipay\Omnipay;
use Cartalyst\Stripe\Stripe as StripePayment;

class Stripe extends Payment
{

	

	/**
	 * Send Payment
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\Post $post
	 * @param array $resData
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Exception
	 */
	public static function sendPayment(Request $request, Post $post, $resData = [])
	{

		// Set the right URLs
		parent::setRightUrls($resData);
		
		// Get the Package
		$package = Package::find($request->input('package_id'));
		
		// Don't make a payment if 'price' = 0 or null
		if (empty($package) || $package->price <= 0) {
			return redirect(parent::$uri['previousUrl'] . '?error=package')->withInput();
		}
		
		// API Parameters
		$providerParams = [
			'cancelUrl'   => parent::$uri['paymentCancelUrl'],
			'returnUrl'   => parent::$uri['paymentReturnUrl'],
			'name'        => $package->name,
			'description' => $package->name,
			'amount'      => Number::toFloat($package->price),
			'currency'    => $package->currency_code,
		];
		

		// Local Parameters
		$localParams = [
			'payment_method_id' => $request->input('payment_method_id'),
			'post_id'           => $post->id,
			'package_id'        => $package->id,
		];
		$localParams = array_merge($localParams, $providerParams);
		
		// Try to make the Payment
		try {

			$gateway = Omnipay::create('Stripe');
			$gateway->setApiKey(config('payment.stripe.secret'));


			$card_date = $request->input('stripeCardExpiry');
			

			$monthyear = explode('/',$card_date);

			$gatwaystripe = StripePayment::make(config('payment.stripe.secret')); 

			$token = $gatwaystripe->tokens()->create([
			    'card' => [
			    'number' => $request->input('stripeCardNumber'),
			    'exp_month' => $monthyear[0],
			    'exp_year' => $monthyear[1],
			    'cvc' => $request->input('stripeCardCVC')
			    ],
			]);

			$usdPrice = Number::toFloat(round($package->price,2))/168.70;

			$response = $gatwaystripe->charges()->create([
				"source" => $token['id'],
			    'currency' => 'USD',
			    'amount'   => round($usdPrice,2),
			]);


			// echo $response['id'];
			// echo "<pre>";
			// print_r($response);
			// die('herer');

			// Save the Transaction ID at the Provider
			$localParams['transaction_id'] = $response['id'];
			
			// Save local parameters into session
			session()->put('params', $localParams);
			
			// Payment by Credit Card when Card info are provide from the form.
			if (isset($response['paid']) && $response['paid'] == 1) {
				// Apply actions after successful Payment
				return self::paymentConfirmationActions($localParams, $post);
				
			} 
			else {
				
					// Apply actions when Payment failed
					return parent::paymentFailureActions($post, $response->getMessage());
				
			}
		} catch (\Exception $e) {
			
			// Apply actions when API failed
			return parent::paymentApiErrorActions($post, $e);
			
		}
	}
	
	/**
	 * @param $params
	 * @param $post
	 * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Exception
	 */
	
	
	/**
	 * @return array
	 */
	public static function getOptions()
	{
		$options = [];
		
		$paymentMethod = PaymentMethod::active()->where('name', 'stripe')->first();
		if (!empty($paymentMethod)) {
			$options[] = (object)[
				'name'     => mb_ucfirst(trans('admin.settings')),
				'url'      => admin_url('payment_methods/' . $paymentMethod->id . '/edit'),
				'btnClass' => 'btn-info',
			];
		}
		
		return $options;
	}
	
	/**
	 * @return bool
	 */
	public static function installed()
	{
		$paymentMethod = PaymentMethod::active()->where('name', 'stripe')->first();
		if (empty($paymentMethod)) {
			return false;
		}
		
		return true;
	}
	
	/**
	 * @return bool
	 */
	public static function install()
	{
		// Remove the plugin entry
		self::uninstall();
		
		// Plugin data
		$data = [
			'id'                => 3,
			'name'              => 'stripe',
			'display_name'      => 'Credit/Debit Card',
			'description'       => 'Payment with Credit/Debit Card',
			'has_ccbox'         => 0,
			'is_compatible_api' => 0,
			'countries'         => null,
			'lft'               => 0,
			'rgt'               => 0,
			'depth'             => 1,
			'active'            => 1,
		];
		
		try {
			// Create plugin data
			$paymentMethod = PaymentMethod::create($data);
			if (empty($paymentMethod)) {
				return false;
			}
		} catch (\Exception $e) {
			return false;
		}
		
		return true;
	}
	
	/**
	 * @return bool
	 */
	public static function uninstall()
	{
		$paymentMethod = PaymentMethod::where('name', 'stripe')->first();
		if (!empty($paymentMethod)) {
			$deleted = $paymentMethod->delete();
			if ($deleted > 0) {
				return true;
			}
		}
		
		return false;
	}


}
