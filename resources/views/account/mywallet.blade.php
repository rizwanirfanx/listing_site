{{--
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
--}}


@extends('layouts.master')

@section('content')
	
	<style>


.top_up_overlay__values{
    font-size: 20px;
    text-align: center;
    padding-top: 50px;
	padding-bottom: 50px;
    font-weight: bold;
    color: #666;
    box-shadow: 0px 0px 20px -10px rgb(0 0 0 / 45%);
    cursor: pointer;
}

@media (max-width:768px){
	.xs-hidden {display:none!important;}
	.pad{
	padding:0px 20%;
}
}

@media (max-width:768px){
	.btn-primary {font-size:12px;}
	.btn-success {font-size:12px;}
	
}


input.masked,
.shell span {
  font-size: 16px;
  font-family: monospace;
  padding-right: 10px;
  background-color: transparent;
  text-transform: uppercase; }
   .waicons {width:50px;}
  .weicons {width:50px;}
  .caicons {width:147px;}
@media(max-width:768px){
    
    .top_up_overlay__values {
    font-size: 11px !important;
    padding-top: 23px !important;
    padding-bottom: 18px !important;
    }
    
    .expl {font-size:10px !important;}
        .waicons {width:30px;}
  .weicons {width:30px;}
  .caicons {width:89px;}
}

</style>
	@includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
	<div class="main-container">
		<div class="container">
			<div class="row">
				
				@if (session()->has('flash_notification'))
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-12">
								@include('flash::message')
							</div>
						</div>
					</div>
				@endif
				
				<div class="col-md-3 page-sidebar">
					@includeFirst([config('larapen.core.customizedViewPath') . 'account.inc.sidebar', 'account.inc.sidebar'])
				</div>
				<!--/.page-sidebar-->

				<div class="col-md-9 page-content">
					<div class="inner-box">
						<h2 class="title-2"><i class="icon-money"></i> My Wallet</h2>
						<p>Get the most out of Your Classified by adding money to your Wallet. It’s easy to use and offers a faster way to get Premium Features.</p>
						<div style="clear:both"></div>
						
													    						    
						<h3 style="font-size:16px">All Cards</h3>
						<div class="table-responsive">
							<h3>No Cards Found.</h3><table class="table table-bordered">
								<thead>
								<tr>
									<th>Brand</th>
									<th>Card Number</th>
									<th>Expiry</th>
									<th>Status</th>
									<th>Delete</th>
								
								</tr>
								</thead>
								<tbody>

															    
							    								</tbody>
							</table>
							
						</div>
						
					
						<br>
						<div class="row">
						<div class="col-md-8 xs-hidden">
						<h3>Wallet Transactions</h3>
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
								<tr>
									<th><span>ID</span></th>
									<th>Type</th>
									<th>Description</th>
									<th>Price</th>
									<th>Date</th>
								
								</tr>
								</thead>
								<tbody>
								    <?php foreach($mywallets as $key=> $value){?>
								    <tr>
								        <td><?php echo $key+1; ?></td>
								        <td><?php echo $value['type']; ?></td>
								        <td><?php echo $value['desc']; ?></td>
								        <td><?php echo $value['price']; ?></td>
								        
								        <td><?php echo date('Y-m-d',strtotime($value['created_at'])); ?></td>
								    </tr>
								    <?php } ?>
								</tbody>
							</table>
							
						</div>
						
						<nav aria-label="">
							
						</nav>
						</div>
						<!-- Button trigger modal -->


						<div class="col-md-3 col-sm-12 col-xs-12 pad" data-bs-toggle="modal" data-target="#myModal">
						<div class="alert alert-success" style="text-align:center">My Balance <br> <span id="ub" style="font-size:19px;font-weight:bold">Rs <?php echo $total?></span></div>
						<a type="button" class="" data-toggle="modal" data-target="#myModal">
						<div style="background-color:white;border:2px solid blue; cursor: pointer;">
						    
						<img style="padding:20%" src="https://static.pk.locanto.asia/assets/210401_154916/images/bg/icons/sprites/desktop/main/sprite_bg.svg#top_up">
						
  <div style="text-align:center"><h4>Upload Money</h4></div>
						</div>
</a>
						
						
						</div>
						
						<a href="{{ asset('account/transactions') }}" style="margin:10px 10px;" class="btn btn-default btn-block d-xs-block d-md-none"><i class="fa fa-arrow-right"></i> View All Transactions</a>
					</div>
						
						
						<div style="clear:both"></div>
					
					</div>
				</div>
			</div>
		</div>
	</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered">

    <!-- Modal content-->
    <div class="modal-content">
      <!--<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> -->
      <div class="modal-body">
	  
	  <img src="{{ imgUrl(config('settings.app.logo'), 'logo') }}" width="150">
	  <img src="https://pk.oobben.com/public/images/wallet.webp" width="80" style=" position: absolute;
    right: 42px;
    top: -30px;">
	<div style="text-align:center;margin-top:5px">
        <h4 ><b>My Wallet</b></h4>
		<p>Select how much you would like to add to your Wallet.
</p></div>
<div class="row" style="padding:10px">
<div class="col-md-6 col-6 col-sm-6 col-xs-6 top_up_overlay__values 1000 " price="1,000">
Rs 1,000
</div>

<div class="col-md-6 col-6 col-sm-6 col-xs-6 top_up_overlay__values 3000" price="3,000">
Rs 3,000
</div>

<div class="col-md-6 col-6 col-sm-6 col-xs-6 top_up_overlay__values 5000" price="5,000">
Rs 5,000
</div>

<div class="col-md-6 col-6 col-sm-6 col-xs-6 top_up_overlay__values 10000" price="10,000">
Rs 10,000
</div>
</div>
<div id='custominput'>
    
</div>
<div style="text-align:center">
    <input type="checkbox" id="custom">You Choose Custom Value Click Check Box
      </div>
      <div style="text-align:center">
<p class="text-info">Money uploaded to your Wallet is non-refundable.</p>
 <input type="checkbox" id="terms"> I hereby accept the Your Classified Terms of Use.
      </div>
	  </div>
	  <input id="totalamount" type="hidden" name="totalamount" value="">
<input id="pid" type="hidden" name="pid" value="">
<input id="subcats" type="hidden" name="subcats" >
<input id="is_paid" type="hidden" name="is_paid" value="paid">
<input id="paidtype" type="hidden" name="paidtype" value="">
<input id="user_id" type="hidden" name="user_id" value="">
<input id="pname" type="hidden" name="pname" value="">
<input id="whatsapptext" type="hidden" name="whatsapptext">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
        		<button id="addmoney" type="button" class="btn btn-primary" >Add Money</button>
						<button id="cardmoney" type="button" class="btn btn-success">Add Via Credit/Debit Card</button>  
				
		</div
		</div class="modal-footer">
		<div id="paycard" style="margin: 0px auto; width: 70%; display: none;">
		<div id="" class="text-center loading23"><img src="https://pk.oobben.com/public/assets/img/loading.gif"></div>
            <iframe id="iframe" style="width:100%;height: 253px;border: aliceblue;" src=""></iframe>
		</div>
		
		
    
    
      </div>
    </div>

  </div>
</div>
	
<!-- Modal -->
<!--
<div class="modal fade" id="myModall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
      <img src="https://pk.oobben.com/storage/app/logo/thumb-500x100-logo-5fd713aaa71fa.png" width="150">
	  <img src="https://pk.oobben.com/public/images/wallet.webp" width="80" style=" position: absolute;
    right: 42px;
    top: -30px;">
	<div style="text-align:center;margin-top:5px">
        <h4 ><b>My Wallet</b></h4>
		<p>Select how much you would like to add to your Wallet.
</p></div>
<div class="row" style="padding:10px">
<div class="col-md-6 col-6 col-sm-6 col-xs-6 top_up_overlay__values 1000 " price="1,000">
Rs 1,000
</div>

<div class="col-md-6 col-6 col-sm-6 col-xs-6 top_up_overlay__values 3000" price="3,000">
Rs 3,000
</div>

<div class="col-md-6 col-6 col-sm-6 col-xs-6 top_up_overlay__values 5000" price="5,000">
Rs 5,000
</div>

<div class="col-md-6 col-6 col-sm-6 col-xs-6 top_up_overlay__values 10000" price="10,000">
Rs 10,000
</div>
</div>
<div style="text-align:center">
<p class="text-info">Money uploaded to your Wallet is non-refundable.</p>
 <input type="checkbox" id="terms"> I hereby accept the Oobben Terms of Use.
      </div>
      </div>
      <input id="totalamount" type="hidden" name="totalamount" value="">
<input id="pid" type="hidden" name="pid" value="">
<input id="subcats" type="hidden" name="subcats" >
<input id="is_paid" type="hidden" name="is_paid" value="paid">
<input id="paidtype" type="hidden" name="paidtype" value="">
<input id="user_id" type="hidden" name="user_id" value="29390">
<input id="pname" type="hidden" name="pname" value="">
<input id="whatsapptext" type="hidden" name="whatsapptext">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
        		<button id="addmoney" type="button" class="btn btn-primary" style="font-size:16px;">Add Money</button>
						<button id="cardmoney" type="button" class="btn btn-success" style="font-size:16px;">Add Via Credit/Debit Card</button>  
				
		
		<div id="paycard" style="margin:0 auto;width: 70%;">
		<div id="" class="text-center loading23"><img src="https://pk.oobben.com/public/assets/img/loading.gif"></div>
<iframe id="iframe" style="width:100%;height: 176px;" src=""></iframe>
		</div>
		
		
    
    
      </div>
    </div>
  </div>
</div>
	
-->

<!-- Modal -->
@endsection

@section('after_styles')
	<style>
		.action-td p {
			margin-bottom: 5px;
		}
	</style>
@endsection

@section('after_scripts')
	<script src="{{ url('assets/js/footable.js?v=2-0-1') }}" type="text/javascript"></script>
	<script src="{{ url('assets/js/footable.filter.js?v=2-0-1') }}" type="text/javascript"></script>
	<script>
	    
$("#tranferdetails").hide();
$("div#paycard").hide();
$("button#addmoney").attr('disabled', true);
$("button#cardmoney").attr('disabled', true);
var email = "{{ auth()->user()->email }}";
var userid = "{{ auth()->user()->id }}";
var package = 0;
$("div.1000").click(function(){
	$(this).attr('style', 'background-color:#337ebf;color:white');
	$("div.3000").attr('style', 'background-color:white;color:black');
	$("div.5000").attr('style', 'background-color:white;color:black');
	$("div.10000").attr('style', 'background-color:white;color:black');
	package = 1000;
});

$("div.3000").click(function(){
	$(this).attr('style', 'background-color:#337ebf;color:white');
	$("div.1000").attr('style', 'background-color:white;color:black');
	$("div.5000").attr('style', 'background-color:white;color:black');
	$("div.10000").attr('style', 'background-color:white;color:black');
	package = 3000;
		$("div#paycard").hide();
});

$("div.5000").click(function(){
	$(this).attr('style', 'background-color:#337ebf;color:white');
	$("div.1000").attr('style', 'background-color:white;color:black');
	$("div.3000").attr('style', 'background-color:white;color:black');
	$("div.10000").attr('style', 'background-color:white;color:black');
	package = 5000;
		$("div#paycard").hide();
});

$("div.10000").click(function(){
	$(this).attr('style', 'background-color:#337ebf;color:white');
	$("div.1000").attr('style', 'background-color:white;color:black');
	$("div.3000").attr('style', 'background-color:white;color:black');
	$("div.5000").attr('style', 'background-color:white;color:black');
	package = 10000;
	$("div#paycard").hide();
});


$("input#terms, div.1000, div.3000 , div.5000 , div.10000").click(function(){

	if($("input#terms").is(":checked") && package != ''){
		$("button#cardmoney").attr('disabled', false);
		$("button#addmoney").attr('disabled', false);
	} else {
		$("button#addmoney").attr('disabled', true);
		$("button#cardmoney").attr('disabled', true);
	}
});
$("input#custom").click(function(){

    if($("input#custom").is(":checked")){
        $("div.1000").attr('style', 'background-color:white;color:black');
	$("div.3000").attr('style', 'background-color:white;color:black');
	$("div.5000").attr('style', 'background-color:white;color:black');
	$("div.10000").attr('style', 'background-color:white;color:black');
        custom=" <input type='text' name='pakage_price' placeholder='RS :' id='pakage_price' class='form-control col-lg-4' style='margin:auto' onkeyup='pakage_price()'/>";
	} else {
	    package = 0;
    	if($("input#terms").is(":checked") && package != ''){
    		$("button#cardmoney").attr('disabled', false);
    		$("button#addmoney").attr('disabled', false);
    	} else {
    		$("button#addmoney").attr('disabled', true);
    		$("button#cardmoney").attr('disabled', true);
    	}
	    custom="";
	}
$('#custominput').html(custom);
});
function pakage_price(){
    package = $('#pakage_price').val();

   	$("div#paycard").hide();
}


var phone = "<?php echo $phone?>";

$("button#addmoney").click(function(){
	var whatsapp = "https://wa.me/"+phone+"/?text=Hi, I want to top up my wallet account of Rs "+ package +" On "+email+" At Your Classified";
	window.location.href = whatsapp;
});
	    
	   
$("button#cardmoney").click(function(){

  

    $("div#paycard").show();
    
    
    $("button#cardpaybtn").text("Pay Now Rs "+ package);
	
	var url  = "/stripe/"+package;
	$("input#is_paid").val("yes");
	$("iframe#iframe").attr("src", url);
	setTimeout(function(){
			$("div.loading23").hide();
	},700)
	
	
});

$("#uc").click(function(){

	$("#userinfo").html("Loading...");
var useremail = $("input#emailt").val();

if(useremail == '') {return false;}


});
$("#closebtn").click(function(){
	window. location. reload();
	
});

	
	
	window.addEventListener('message', function(event) {
	    console.log(event.data);
    if(event.data == 'paymentdone') {
		var userid = "29479";
		console.log(package);
	$.post("https://pk.oobben.com/account/addb",{userid:userid,balance:package, is_paid:'yes'}, function(data){
		console.log(data);
		if(data == 'success'){
			window.location.href = "https://pk.oobben.com/account/my-wallet";
		} else {$("#res").html("Error! we found an error please try again later. "); $("div#stripeloader").empty(); $("div#loading").hide();}
	});
	}
  });
  	    
	</script>

@endsection
