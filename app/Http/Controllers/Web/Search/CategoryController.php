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
use Illuminate\Support\Str;
use Torann\LaravelMetaTags\Facades\MetaTag;
use App\Models\Post;
use Auth;
use App\Models\Indxing;
use Google_Client;
use Google;
use Google_Service_Indexing;
use Google_Service_Indexing_UrlNotification;
class CategoryController extends BaseController
{
	public $isCatSearch = true;
	
	/**
	 * Category URL
	 * Pattern: (countryCode/)category/category-slug
	 * Pattern: (countryCode/)category/parent-category-slug/category-slug
	 *
	 * @param $countryCode
	 * @param $catSlug
	 * @param null $subCatSlug
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
	 */
	public function index($countryCode, $catSlug, $subCatSlug = null)
	{
	   
		
		$indxings=Indxing::get()->toArray();
		$urls=[];
		foreach($indxings as $key=>$value){
		   $url=$value['url'];
		   $status=$value['status'];
		$urls[$url]   = $status;
		}
	
try {
  $googleClient = new Google\Client();
  
  // Add here location to the JSON key file that you created and downloaded earlier.
  $googleClient->setAuthConfig('locantoasia-374416-7aea4fcefa6f.json');
 //$googleClient->setAuthConfig('indexapi-374413-39f04d61b9ec.json');
  
  
  
  $googleClient->setScopes( Google_Service_Indexing::INDEXING );  
  $googleClient->setUseBatch( true );
  $googleIndexingService = new Google_Service_Indexing( $googleClient );

 $service = new Google_Service_Indexing( $googleClient );
  $batch = $service->createBatch();

  $postBody = new Google_Service_Indexing_UrlNotification();


  // Use URL_UPDATED for new or updated pages.
  // Use URL_DELETED for deleted pages.
//   $urlNotification = new Google_Service_Indexing_UrlNotification([
//     'url' => "https://wiretuts.com/connect-playstation-3-controller-to-pc-with-vigem-and-x360ce",
//     'type' => 'URL_UPDATED'
//   ]);

//  $result = $googleIndexingService->urlNotifications->publish( $urlNotification );
  
   foreach($urls as $url => $type)
  {
    $postBody->setUrl( $url );
    $postBody->setType( $type );
    $batch->add( $service->urlNotifications->publish( $postBody ) );
  }
  $results = $batch->execute();
 //dd($results);

} 
catch (\Exception $e) {
   // dd('asdsd');
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}


		// Search
		$data = (new PostQueries($this->preSearch))->fetch();
//dd($data);
		// Get Titles
		$bcTab = $this->getBreadcrumb();
		$htmlTitle = $this->getHtmlTitle();
		view()->share('bcTab', $bcTab);
		view()->share('htmlTitle', $htmlTitle);
		
		// SEO
		$title = $this->getTitle();
		if (isset($this->cat->description) && !empty($this->cat->description)) {
			$description = Str::limit($this->cat->description, 200);
		} else 
		{
			$description = Str::limit(t('ads_category_in_location', [
					'category' => $this->cat->name,
					'location' => config('country.name'),
				]) . '. ' . t('looking_for_product_or_service') . ' - ' . config('country.name'), 200);
		}
		


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

        if (!Auth::check() && $subcategoryId==null) {
			abort(404, t('category_not_found'));
		}
		

// 		echo "<pre>";
// 		print_r($this->cat['id']);
// 		echo "<br>";
// 		print_r($this->cat['parent_id']);
// 		die('herer');
		
		$galleryadd = Post::getpackagetypepost(50, 4, $categoryId, $subcategoryId);
		$top_pole_add = Post::getpackagetypepost(20, 5, $categoryId, $subcategoryId);
		$vip_lounch_add = Post::getpackagetypepost(20, 2, $categoryId, $subcategoryId);

// 		echo "<pre>";
//         print_r(count($galleryadd));
//         die();
        
		$data['vip_lounch_add'] = $vip_lounch_add;
		
		$data['galleryadd'] = $galleryadd;
		if(count($top_pole_add)>0)
		$data['top_pole_add'] = $top_pole_add;
		$data['cat_details'] = $this->preSearch['cat'];
        
        if($this->cat['meta_title'])
			$title = $this->cat['meta_title'];
		if($this->cat['meta_description'])
			MetaTag::set('keywords', $this->cat['meta_description']);

		// Meta Tags
		MetaTag::set('title', $title);
		MetaTag::set('description', $description);
		
		// Open Graph
		$this->og->title($title)->description($description)->type('website');
		if ($data['count']->get('all') > 0) {
			if ($this->og->has('image')) {
				$this->og->forget('image')->forget('image:width')->forget('image:height');
			}
		}
		view()->share('og', $this->og);
//dd($data);
		return appView('search.results', $data);
	}
}
