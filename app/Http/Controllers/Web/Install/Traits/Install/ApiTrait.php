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

namespace App\Http\Controllers\Web\Install\Traits\Install;

use App\Helpers\Curl;
use App\Helpers\Ip;
use PulkitJalan\GeoIP\Facades\GeoIP;
use App\Helpers\Cookie;
use Illuminate\Support\Facades\Http;


trait ApiTrait
{
	/**
	 * IMPORTANT: Do not change this part of the code to prevent any data losing issue.
	 *
	 * @param $purchaseCode
	 * @return false|mixed|string
	 */
	private function purchaseCodeChecker($purchaseCode)
	{
		$data = [];
		$endpoint = getPurchaseCodeApiEndpoint($purchaseCode, config('larapen.core.itemId'));
		try {
			/*
			 * Make the request and wait for 30 seconds for response.
			 * If it does not receive one, wait 5000 milliseconds (5 seconds), and then try again.
			 * Keep trying up to 2 times, and finally give up and throw an exception.
			 */
			$response = Http::withoutVerifying()->timeout(30)->retry(2, 5000)->get($endpoint)->throw();
			$data = $response->json();
		} catch (\Throwable $e) {
			$endpoint = (str_starts_with($endpoint, 'https:'))
				? str_replace('https:', 'http:', $endpoint)
				: str_replace('http:', 'https:', $endpoint);
			
			try {
				$response = Http::withoutVerifying()->timeout(30)->retry(2, 5000)->get($endpoint)->throw();
				$data = $response->json();
			} catch (\Throwable $e) {
// 				$data['message'] = getCurlHttpError($e);
 				$data['message'] = "getCurlHttpError Response";
			}
		}
		
		return $data;
	}
	
	/**
	 * @return mixed|null
	 */
	private static function getCountryCodeFromIPAddr()
	{
		if (isset($_COOKIE['ip_country_code'])) {
			$countryCode = $_COOKIE['ip_country_code'];
		} else {
			// Localize the user's country
			try {
				$ipAddr = Ip::get();
				
				GeoIP::setIp($ipAddr);
				$countryCode = GeoIP::getCountryCode();
				
				if (!is_string($countryCode) or strlen($countryCode) != 2) {
					return null;
				}
			} catch (\Exception $e) {
				return null;
			}
			
			// Set data in cookie
			if (isset($_COOKIE['ip_country_code'])) {
				unset($_COOKIE['ip_country_code']);
			}
			setcookie('ip_country_code', $countryCode);
		}
		
		return $countryCode;
	}
}
