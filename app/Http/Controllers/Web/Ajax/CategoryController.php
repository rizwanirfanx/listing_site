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

namespace App\Http\Controllers\Web\Ajax;

use App\Http\Controllers\Web\Post\CreateOrEdit\Traits\CategoriesTrait;
use App\Http\Controllers\Web\Post\Traits\CustomFieldTrait;
use App\Http\Controllers\Web\FrontController;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends FrontController
{
	use CategoriesTrait, CustomFieldTrait;
	
	/**
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getCategoriesHtml(Request $request)
	{	    
	    
		$languageCode = $request->input('languageCode');
		$catId = $request->input('catId');
		$catId = !empty($catId) ? $catId : null;
		
		// Get categories, parent & children
		$data = $this->categories($catId);
		
		// Get categories list buffer
		$html = getViewContent('post.createOrEdit.inc.category.select', $data);
		
		// Send JSON Response
		$result = [
			'html'        => $html,
			'hasChildren' => $data['hasChildren'],
			'category'    => $data['category'],
			'parent'      => (!empty($data['category']->parent)) ? $data['category']->parent : null,
		];
		
		return response()->json($result, 200, [], JSON_UNESCAPED_UNICODE);
	}
	
	/**
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getCustomFields(Request $request)
	{
		$languageCode = $request->input('languageCode');
		$catId = $request->input('catId');
		$postId = $request->input('postId');
		
		$catId = !empty($catId) ? $catId : null;
		
		// Custom Fields vars
		$errors = $request->input('errors');
		$errors = convertUTF8HtmlToAnsi($errors); // Convert UTF-8 HTML to ANSI
		$errors = stripslashes($errors);
		$errors = collect(json_decode($errors, true));
		// ...
		$oldInput = $request->input('oldInput');
		$oldInput = convertUTF8HtmlToAnsi($oldInput); // Convert UTF-8 HTML to ANSI
		$oldInput = stripslashes($oldInput);
		$oldInput = json_decode($oldInput, true);
		
		// Get the Category's Custom Fields buffer
		$customFields = $this->getCategoryFieldsBuffer($catId, $languageCode, $errors, $oldInput, $postId);
		
		// Get Result's Data
		$data = [
			'customFields' => $customFields,
		];
		
		return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
	}

	public function getsubCategoriesHtml(Request $request)
	{
		//$languageCode = $request->input('languageCode');
		$catId = $request->input('cat');
		$os = $request->input('os');
		
		$cat= \DB::table('categories')
            ->select('id', 'name')
            ->where("parent_id",$catId)
            ->get();
         
         
        if(count($cat)>0)
        {
        // 	if($os == 'desktop')
        // 	{
        	$html = '<select name="sc" id="SubcatSearch" class="form-control selecter">
					<option value="">Sub Category</option>';

// 			}

// 			else
// 			{
// 				$html = '<div class="input-icons">
//                      <i class="fa fa-list-ul icon"> </i> 
//                      <select name="sc" id="SubcatSearch" class=" input-field" style="padding:4px 0px 4px 33px; width:166px">';
// 			}		
			foreach($cat as $category)
	         {
	         	$name = json_decode($category->name);
	         	//$category->name = $name->en;
	         	$html .= '<option value="'.$category->id.'">'.$name->en.'</option>';
	         	
	         }		
	         if($os == 'desktop')
			$html .= '</select>';
			else
			{
				$html .= '</select>';
				$html .= '</div>';

				
			}    

        }
        else
        {	
        	if($os == 'desktop')
        	{
        		$html = '<select name="sc" id="SubcatSearch" class="form-control selecter"><option value="">Sub Category</option></select>'; 
			}
			else
			{
				$html = '<div class="input-icons">
                     <i class="fa fa-list-ul icon"> </i> 
                     <select name="sc" id="SubcatSearch" class=" input-field" style="padding:4px 0px 4px 33px; width:166px"><option value="">Sub Category</option></select></div>';
			} 
        }    
         

		echo $html;
	}
}
