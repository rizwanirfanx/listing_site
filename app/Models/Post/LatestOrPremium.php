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

namespace App\Models\Post;

use App\Models\Package;
use App\Models\Payment;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait LatestOrPremium
{
	/**
	 * Get Latest or Sponsored Posts
	 *
	 * @param int $limit
	 * @param string $type
	 * @param null $defaultOrder
	 * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
	 */
	public static function getLatestOrSponsored($limit = 20, $type = 'latest', $defaultOrder = 'random')
	{
		$posts = Post::query();
		
		$tablesPrefix = DB::getTablePrefix();
		$postsTable = (new Post())->getTable();
		$paymentsTable = (new Payment())->getTable();
		$packagesTable = (new Package())->getTable();
		
		// Select fields
		$select = [
			$postsTable . '.id',
			'country_code',
			'category_id',
			'post_type_id',
			'title',
			$postsTable . '.price',
			$postsTable . '.phone',
			'city_id',
			'featured',
			$postsTable . '.created_at',
			'reviewed',
			'verified_email',
			'verified_phone',
			'tPackage.lft',
		];
		
		// GroupBy fields
		$groupBy = [
			$postsTable . '.id',
		];
		
		$orderBy = [
			$tablesPrefix . $postsTable . '.created_at DESC',
		];
		
		// If the MySQL strict mode is activated, ...
		// Append all the non-calculated fields available in the 'SELECT' in 'GROUP BY' to prevent error related to 'only_full_group_by'
		if (env('DB_MODE_STRICT')) {
			$groupBy = $select;
		}
		
		if (is_array($select) && count($select) > 0) {
			foreach ($select as $column) {
				$posts->addSelect($column);
			}
		}
		
		// Price conversion (For the Currency Exchange plugin)
		$posts->addSelect(DB::raw('(' . DB::getTablePrefix() . $postsTable . '.price * ?) AS calculatedPrice'));
		$posts->addBinding(config('selectedCurrency.rate', 1), 'select');
		
		// Default Filters
		$posts->currentCountry()->verified()->unarchived();
		if (config('settings.single.posts_review_activation')) {
			$posts->reviewed();
		}
		
		// Relations
		$posts->with('category')->has('category');
		$posts->with('postType');
		$posts->with('latestPayment', function ($query) {
			$query->with('package');
		});
		$posts->with('savedByLoggedUser');
		
		// latestPayment (Can be used in orderBy)
		$tmpLatestPayment = DB::table($paymentsTable, 'lp')
			->select(DB::raw('MAX(' . $tablesPrefix . 'lp.id) as lpId'), 'lp.post_id')
			->where('lp.active', 1)
			->groupBy('lp.post_id');
		
		if ($type == 'sponsored') {
			$posts->joinSub($tmpLatestPayment, 'tmpLp', function ($join) use ($postsTable) {
				$join->on('tmpLp.post_id', '=', $postsTable . '.id')->where('featured', 1);
			});
			$posts->join($paymentsTable . ' as latestPayment', 'latestPayment.id', '=', 'tmpLp.lpId');
			$posts->join($packagesTable . ' as tPackage', 'tPackage.id', '=', 'latestPayment.package_id');
			
			// Priority to the Premium Ads
			// Push the Package Position order onto the beginning of an array
			$orderBy = Arr::prepend($orderBy, $tablesPrefix. 'tPackage.lft DESC');
			
			
		} else {
		    
		   
			
			$posts->leftJoinSub($tmpLatestPayment, 'tmpLp', function ($join) use ($postsTable) {
				$join->on('tmpLp.post_id', '=', $postsTable.'.id')->where('featured', 1);
			});
			$posts->leftJoin($paymentsTable . ' as latestPayment', 'latestPayment.id', '=', 'tmpLp.lpId');
			$posts->leftJoin($packagesTable . ' as tPackage', 'tPackage.id', '=', 'latestPayment.package_id');
		}
		$posts->with('city')->has('city');
		$posts->with('pictures');
		
		// Set GROUP BY
		if (is_array($groupBy) && count($groupBy) > 0) {
			// Get valid columns name
			$groupBy = collect($groupBy)->map(function ($value, $key) use ($tablesPrefix) {
				if (Str::contains($value, '.')) {
					$value = $tablesPrefix . $value;
				}
				
				return $value;
			})->toArray();
			
			$posts->groupByRaw(implode(', ', $groupBy));
		}
		
		// Set ORDER BY
		if (is_array($orderBy) && count($orderBy) > 0) {
			$posts->orderByRaw(implode(', ', $orderBy));
		}
		
		// Get the Results
		$posts = $posts->take((int)$limit)->get();
		
		// Order By Home Section Settings
		if ($posts->count() > 0) {
			if ($defaultOrder == 'random') {
				$posts = $posts->shuffle();
			}
		}
		
		return $posts;
	}



	public static function getpackagetypepost($limit = 20, $type = 2, $catid=null, $parentcat=null, $cityID=null, $defaultOrder = 'random')
	{   
	   // DB::enableQueryLog();
		$posts = Post::query();
		
		$tablesPrefix = DB::getTablePrefix();
		$postsTable = (new Post())->getTable();
		$paymentsTable = (new Payment())->getTable();
		$packagesTable = (new Package())->getTable();
		
		// Select fields
		$select = [
			$postsTable . '.id',
			'country_code',
			'category_id',
			'post_type_id',
			'title',
			$postsTable . '.price',
			$postsTable . '.phone',
			'city_id',
			'featured',
			$postsTable . '.created_at',
			'reviewed',
			'verified_email',
			'verified_phone',
			'tPackage.lft',
		];
		
		// GroupBy fields
		$groupBy = [
			$postsTable . '.id',
		];
		
		$orderBy = [
			$tablesPrefix . $postsTable . '.created_at DESC',
		];
		
		// If the MySQL strict mode is activated, ...
		// Append all the non-calculated fields available in the 'SELECT' in 'GROUP BY' to prevent error related to 'only_full_group_by'
		if (env('DB_MODE_STRICT')) {
			$groupBy = $select;
		}
		
		if (is_array($select) && count($select) > 0) {
			foreach ($select as $column) {
				$posts->addSelect($column);
			}
		}
		
		
		if($type == 4)
		{
			$temtype[] = $type;
			$temtype[] = 33;
			$temtype[] = 35;
			
		}
		
		else if($type == 5)
		{   
		  //  print_r($type);
		  //  die('here');
			$temtype[] = $type;
			$temtype[] = 34;
			$temtype[] = 35;
 		//	$temtype[] = 33;
		}
		else
			$temtype[] = $type;
			

            
			// latestPayment (Can be used in orderBy)
		$tmpLatestPayment = DB::table($paymentsTable, 'lp')
			->select(DB::raw('MAX(' . $tablesPrefix . 'lp.id) as lpId'), 'lp.post_id')
			->where('lp.active', 1)
			->whereIn('lp.package_id',$temtype)
			->groupBy('lp.post_id');


            
            
            // echo  ' cat id' .$catid.'<br>';
            //  echo 'parent id' .    $parentcat;
            //  die('herer');
            
            //    type explain
            //  gallery add   (4)
            //  top pole positiono  add   (5)
            //  VIp Lounch  add   (2)
            
		// Relations
		// if($type != 2)
		// {
// 			if($catid)
// 			 $posts->where(['category_id'=>$catid]);
			if($parentcat)
			{   
			    if($catid)
			    $posts->where(['category_id'=>$catid]);

				$posts->orwhere(['category_id'=>$parentcat]);
				 if($type == 2)
				  {	
						$list = Category::where('parent_id', $parentcat)->get();
						if($list->count() > 0)
						{	
							$child = array();	
							foreach ($list as $key => $cat)
								$child[] = $cat->id;
							
							$posts->orwhereIn('category_id',$child);
						}
				 }
			}
			
			else
			{   
			  
				$list = Category::where('parent_id', $catid)->get();
				if($list->count() > 0)
				{	
					$child = array();	
					foreach ($list as $key => $cat)
						$child[] = $cat->id;
					
					$child[] = $catid;
				// 	echo "<pre>";
				// 	print_r($child);
				// 	die();
				
					$posts->whereIn('category_id',$child);
					
				// 	$posts->orwhereIn('category_id',$child);
				}
				
			}
			
			if($cityID)
			$posts->orwhere(['city_id'=>$cityID]);
		// }	
				



		
		$posts->with('latestPayment', function ($query) {
			$query->with('package');
		});

		
			$posts->joinSub($tmpLatestPayment, 'tmpLp', function ($join) use ($postsTable) {
				$join->on('tmpLp.post_id', '=', $postsTable . '.id')->where('featured', 1);
			});
			$posts->join($paymentsTable . ' as latestPayment', 'latestPayment.id', '=', 'tmpLp.lpId');
			$posts->join($packagesTable . ' as tPackage', 'tPackage.id', '=', 'latestPayment.package_id');



			$posts->with('city')->has('city');

			//$posts->join($packagesTable . ' as tPackage', 'tPackage.id', '=', $postsTable.'.package_id');
			
			// Priority to the Premium Ads
			// Push the Package Position order onto the beginning of an array
			$orderBy = Arr::prepend($orderBy, $tablesPrefix. 'tPackage.lft DESC');
		

		
		// Set ORDER BY
		if (is_array($orderBy) && count($orderBy) > 0) {
			$posts->orderByRaw(implode(', ', $orderBy));
		}
		
		// Get the Results
		$posts = $posts->take((int)$limit)->get();
		
// 		$query = DB::getQueryLog();
        
//         echo "<pre>";
//         print_r($query);
//         die();
		// Order By Home Section Settings
		if ($posts->count() > 0) {
			if ($defaultOrder == 'random') {
				$posts = $posts->shuffle();
			}
		}
		
		return $posts;
	}
}
