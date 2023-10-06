<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Indxing;
use Redirect;
use DB;
class IndxingController extends Controller
{
    //
    public function index()
    {
       
        $data=Indxing::get()->toArray();
       
        return view('vendor.admin.indexing.index',compact('data'));
    }
     public function add()
    {
        
         return view('vendor.admin.indexing.add');
    }
    public function store(Request $request)
    {
      
         $status=$_REQUEST['status'];
     
        $url=$_REQUEST['url'];
         $return=Indxing::create(['url' => $url,'status'=>$status]);
         
        
        return Redirect::back()->withErrors(['msg' => 'The Message']);
    }
}
