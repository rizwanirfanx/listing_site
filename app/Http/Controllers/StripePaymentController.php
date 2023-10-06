<?php

namespace App\Http\Controllers;
     
use Illuminate\Http\Request;
use Session;
use App\Models\mywallet;
use Stripe;
     
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request,$id)
    {
        return view('stripe',compact('id'));
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
         
        $cardexpirymonth = $request->cardexpirymonth;
        $cardexpiryyear = $request->cardexpiryyear;
        $cardnumber = $request->cardnumber;
        $cardcvc = $request->cardcvc;
        $price = $request->price;
        $name = auth()->user()->name;
        $email= auth()->user()->email;
        $user_id= auth()->user()->id;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
         $customer = \Stripe\Customer::create(array(
		'name' => $name,
        'email' => $email
        ));  

	
         $payDetails=Stripe\Charge::create ([
                "amount" => $price*100,
                "currency" => "PKR",
                "source" => $request->stripeToken,
                'receipt_email'=>$email,
                "description" => "Wallet Purchased Paymnet." 
        ]);
        
        $paymenyResponse = $payDetails->jsonSerialize();
// 	dd($paymenyResponse);
    // check whether the payment is successful
    if($paymenyResponse['amount_refunded'] == 0 && empty($paymenyResponse['failure_code']) && $paymenyResponse['paid'] == 1 && $paymenyResponse['captured'] == 1){
        
		// transaction details 
        $amountPaid = $paymenyResponse['amount'];
        $balanceTransaction = $paymenyResponse['balance_transaction'];
        $paidCurrency = $paymenyResponse['currency'];
        $paymentStatus = $paymenyResponse['status'];
        $paymentDate = date("Y-m-d H:i:s");   

        mywallet::create(['price' => $price,'user_id'=>$user_id,'type'=>'Top Up','desc'=>"congratulations for top up your account balance of $price in $email  email "]);        
        Session::flash('success', 'Payment successful!');
    }else{
        Session::flash('success', 'Sorry Your Payment is not a successfully!');
        //die();
    }
        //Session::flash('success', 'Payment successful!');
          //dd($request);    
        return redirect('/stripe/'.$price);
    }
}