<?php

namespace App\Http\Controllers\Admin;
use App\Models\mywallet;
use App\Models\user;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Redirect;
use DB;

class MywalletController extends Controller
{
    public function index()
    {
        //
        // print_r(mywallet::get());
        // die();
        $userids=mywallet::join('users','users.id','=','mywallets.user_id')->select('user_id','email')->distinct()->get()->toArray();
        $data['data']=[];
        foreach($userids as $key=>$val){
            // $data['data'][$key]=mywallet::join('users','users.id','=','mywallets.user_id')->select('email')->where('user_id','=',$val)->distinct()->get();
            // print_r($val['email']);
            $data['data'][$key]['email']=$val['email'];
            $data['data'][$key]['price']=mywallet::join('users','users.id','=','mywallets.user_id')->where('user_id','=',$val['user_id'])->sum('price');
        }
        
        // $data=DB::table('users')
        //     ->select('email','price')
        //     ->distinct()->sum('price')->get()->toArray();
        // echo "<pre>";
        // print_r($data);
        // die();
        return view('vendor.admin.mywallet.index',$data);
    }
    public function add()
    {
        $users['users']=user::get()->toArray();
         return view('vendor.admin.mywallet.add',$users);
    }
    public function store(Request $request)
    {
        
      //echo  Payment::where('post_id',5754)->update(['active' => 1]);
      
         $email_id=$_REQUEST['email'];
      $user_data= user::where('id','=',$email_id)->get()->toArray()[0];
      $id=$user_data['id'];
      $email=$user_data['email'];
    //     print_r($id);
    //   die(); 
        $pricein=$_REQUEST['pricein'];
         $return=mywallet::create(['price' => $pricein,'user_id'=>$id,'type'=>'Top up','desc'=>"congratulations for top up your account balance of $pricein in $email email"]);
         
        
        return Redirect::back()->withErrors(['msg' => 'The Message']);
    }
}

