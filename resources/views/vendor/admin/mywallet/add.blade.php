@extends('admin::layouts.master')

@section('after_styles')


 
  <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}">

@endsection

@section('after_scripts')


<script src="{{ asset('js/bootstrap-select.js') }}"></script>

<script>
// function createOptions(number) {
//   var options = [], _options;

//   for (var i = 0; i < number; i++) {
//     var option = '<option value="' + i + '">Option ' + i + '</option>';
//     options.push(option);
//   }

//   _options = options.join('');
  
//   $('#number')[0].innerHTML = _options;
//   $('#number-multiple')[0].innerHTML = _options;

//   $('#number2')[0].innerHTML = _options;
//   $('#number2-multiple')[0].innerHTML = _options;
// }

// var mySelect = $('#first-disabled2');

// createOptions(4);

// $('#special').on('click', function () {
//   mySelect.find('option:selected').prop('disabled', true);
//   mySelect.selectpicker('refresh');
// });

// $('#special2').on('click', function () {
//   mySelect.find('option:disabled').prop('disabled', false);
//   mySelect.selectpicker('refresh');
// });

// $('#basic2').selectpicker({
//   liveSearch: true,
//   maxOptions: 1
// });
</script>
@endsection
@section('header')

	
	
	<div class="row page-titles">
		<div class="col-md-6 col-12 align-self-center">
			<h2 class="mb-0">
				My Wallet
			</h2>
		</div>
		<div class="col-md-6 col-12 align-self-center d-none d-md-block">
			<ol class="breadcrumb mb-0 p-0 bg-transparent float-right">
				<li class="breadcrumb-item"><a href="{{ admin_url() }}">{{ trans('admin.dashboard') }}</a></li>
				<li class="breadcrumb-item active">{{ trans('admin.backup') }}</li>
			</ol>
		</div>
	</div>
@endsection

@section('content')
@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
            {!! Form::open(array('url' => 'admin/store', 'method' => 'post')) !!}
            @csrf
            <div class="card border-top border-primary">
                
                <div class="card-header">
                    <h3 class="mb-0"></h3>
                </div>
                <div class="card-body">
                    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      
        <select class="selectpicker form-control" id="number" required name='email' data-container="body" data-live-search="true" title="Select Email" data-hide-disabled="true">
            <?php foreach($users as $key=> $value){?>
             <option value="<?php echo $value['id'] ?>"><?php echo $value['email'] ?></option>
            <?php } ?>
           
             
        </select>
    
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Price</label>
      <input type="text" name='pricein' class="form-control" required id="inputPassword4" placeholder="price In">
    </div>
  </div>
  <!--<div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>-->
  <button type="submit" class="btn btn-primary">Add Amount</button>
                </div>
                <div class="card-footer">
                    
                </div>
                
            </div>
            {!! Form::close() !!}
@endsection
