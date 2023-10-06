<?php
/**
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
 */

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Api\Base\ApiResponseTrait;
use App\Http\Requests\ForgotPasswordRequest;
use App\Helpers\Auth\Traits\SendsPasswordResetEmails;
use App\Helpers\Auth\Traits\SendsPasswordResetSms;
use App\Http\Controllers\Web\FrontController;
use Torann\LaravelMetaTags\Facades\MetaTag;

class ForgotPasswordController extends FrontController
{
	use SendsPasswordResetEmails, SendsPasswordResetSms, ApiResponseTrait;
	
	protected $redirectTo = '/account';
	
	/**
	 * PasswordController constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->middleware('guest');
	}
	
	// -------------------------------------------------------
	// Laravel overwrites for loading LaraClassified views
	// -------------------------------------------------------
	
	/**
	 * Display the form to request a password reset link.
	 *
	 * @return mixed
	 */
	public function showLinkRequestForm()
	{
		// Meta Tags
		MetaTag::set('title', getMetaTag('title', 'password'));
		MetaTag::set('description', strip_tags(getMetaTag('description', 'password')));
		MetaTag::set('keywords', getMetaTag('keywords', 'password'));
		
		return appView('auth.passwords.email');
	}
	
	/**
	 * Send a reset link to the given user.
	 *
	 * @param ForgotPasswordRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function sendResetLink(ForgotPasswordRequest $request)
	{
		// Call API endpoint
		$endpoint = '/auth/password/email';
		$data = makeApiRequest('post', $endpoint, $request->all());
		
		// Parsing the API's response
		$message = !empty(data_get($data, 'message')) ? data_get($data, 'message') : 'Unknown Error.';
		
		return (data_get($data, 'isSuccessful') && data_get($data, 'success'))
			? redirect()->back()->with(['status' => $message])
			: redirect()->back()
				->withInput($request->only('email'))
				->withErrors(['email' => $message]);
	}
}
