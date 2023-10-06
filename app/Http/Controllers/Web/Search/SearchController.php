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

class SearchController extends BaseController
{
	public $isIndexSearch = true;
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{

		view()->share('isIndexSearch', $this->isIndexSearch);
		
		// Search
		// echo "<pre>";
		// print_r($this->preSearch['cat']);
		// die();

		 
		$data = (new PostQueries($this->preSearch))->fetch();
//dd($data);
// 		echo "<pre>";
// 		print_r($data);
// 		die('herere');

		if(isset($this->cat))
		{
			$categoryId = $this->cat['id'];
			$subcategoryId = $this->cat['parent_id'];
		}
		else
		{
			$categoryId = null;
			$subcategoryId = null;


		}

		$galleryadd = Post::getpackagetypepost(20, 4, $categoryId, $subcategoryId);
		$top_pole_add = Post::getpackagetypepost(20, 5, $categoryId, $subcategoryId);
		$viplonch = Post::getpackagetypepost(20, 2,$categoryId, $subcategoryId);
        
        // echo "<pre>";
        // print_r($top_pole_add);
        // die();

		//dd($galleryadd);
		$data['galleryadd'] = $galleryadd;
		if(count($top_pole_add)>0)
		$data['top_pole_add'] = $top_pole_add;

		if(count($viplonch)>0)
		$data['vip_lounch_add'] = $viplonch;

		$data['cat_details'] = $this->preSearch['cat'];


		// echo "<pre>";
		// print_r($data);
		//  die('here');

		// Get Titles
		$title = $this->getTitle();
		$this->getBreadcrumb();
		$this->getHtmlTitle();
		
		// Meta Tags
		MetaTag::set('title', $title);
		MetaTag::set('description', $title);
// 		echo "<pre>";
// 		print_r($data);
// 		die();
// dd($data);
		return appView('search.results', $data);
	}
}
