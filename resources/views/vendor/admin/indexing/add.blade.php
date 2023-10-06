@extends('admin::layouts.master')

@section('after_styles')


 
  <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}">

@endsection

@section('after_scripts')


<script src="{{ asset('js/bootstrap-select.js') }}"></script>
@endsection
@section('header')

	
	
	<div class="row page-titles">
		<div class="col-md-6 col-12 align-self-center">
			<h2 class="mb-0">
			API Indexing
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
            {!! Form::open(array('url' => 'admin/indexingadd', 'method' => 'post')) !!}
            @csrf
            <div class="card border-top border-primary">
                
                <div class="card-header">
                    <h3 class="mb-0"></h3>
                </div>
                <div class="card-body">
                    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">Url</label>
      <textarea name='url' class="form-control" required></textarea>
     
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Status</label>
      
        <select class="selectpicker form-control" id="number" required name='status' data-container="body" data-live-search="true" title="Select Status" data-hide-disabled="true">
           <option value="URL_UPDATED">Updated</option>
           <option value="URL_DELETED">Deleted</option>
           
             
        </select>
    
    </div>
   
  </div>
  
  <button type="submit" class="btn btn-primary">Add Indexing</button>
                </div>
                <div class="card-footer">
                    
                </div>
                
            </div>
            {!! Form::close() !!}
@endsection
