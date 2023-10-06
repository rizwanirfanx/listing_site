<?php

namespace App\Http\Controllers\Web\Account;
use App\Models\mywallet;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class mywalletController extends AccountBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id=auth()->user()->id;
        $mywallets['mywallets']=mywallet::where('user_id','=',$user_id)->orderby('id','Desc')->get()->toArray();
        $mywallets['total']=mywallet::where('user_id','=',$user_id)->sum('price');
        // dd(PaymentMethod::get()->toArray());
        $phone=PaymentMethod::select('phone_number')->where('id','=',5)->get()->toArray();
        if(count($phone)){
          $mywallets['phone']= $phone[0]['phone_number']; 
        }else{
            $mywallets['phone']='';
        }
        
       
        return view('account.mywallet',$mywallets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function cardstript()
    {
        //
         return view('account.stripe-card');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mywallet  $mywallet
     * @return \Illuminate\Http\Response
     */
    public function show(mywallet $mywallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mywallet  $mywallet
     * @return \Illuminate\Http\Response
     */
    public function edit(mywallet $mywallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mywallet  $mywallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mywallet $mywallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mywallet  $mywallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(mywallet $mywallet)
    {
        //
    }
}
