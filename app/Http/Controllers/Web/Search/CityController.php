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

namespace App\Http\Controllers\Web\Search;

use App\Helpers\Search\PostQueries;
use Torann\LaravelMetaTags\Facades\MetaTag;
use App\Models\Post;

class CityController extends BaseController
{
	public $isCitySearch = true;
	
	/**
	 * City URL
	 * Pattern: (countryCode/)free-ads/city-slug/ID
	 *
	 * @param $countryCode
	 * @param $citySlug
	 * @param null $cityId
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index($countryCode, $citySlug, $cityId = null)
	{
		// Check if City is found
		if (empty($this->city)) {
			abort(404, t('city_not_found'));
		}
		
	    
		// Search
		$data = (new PostQueries($this->preSearch))->fetch();
		
		$galleryadd = Post::getpackagetypepost(20, 4, null, null, $this->city['id']);
		$top_pole_add = Post::getpackagetypepost(20, 5, null, null, $this->city['id']);
		
		$viplonch = Post::getpackagetypepost(20, 2, null, null, $this->city['id']);
        
        if(count($galleryadd)>0)
		$data['galleryadd'] = $galleryadd;
		if(count($top_pole_add)>0)
		$data['top_pole_add'] = $top_pole_add;
		
		if(count($viplonch)>0)
		$data['vip_lounch_add'] = $viplonch;
		
		
		// Get Titles
		$bcTab = $this->getBreadcrumb();
		$htmlTitle = $this->getHtmlTitle();
		view()->share('bcTab', $bcTab);
		view()->share('htmlTitle', $htmlTitle);
		
		// Meta Tags
		$title = $this->getTitle();
		$description = t('ads_in_location', ['location' => $this->city->name])
			. ', ' . config('country.name')
			. '. ' . t('looking_for_product_or_service')
			. ' - ' . $this->city->name
			. ', ' . config('country.name');
		
		MetaTag::set('title', $title);
		MetaTag::set('description', $description);
		
		return appView('search.results', $data);
	}
}
