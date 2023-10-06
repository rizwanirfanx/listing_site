@extends('admin::layouts.master')
@section('header')
	<div class="row page-titles">
		<div class="col-md-6 col-12 align-self-center">
			<h2 class="mb-0">
				Wallet
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

   
            	<div class="row page-titles">
		<div class="col-md-6 col-12 align-self-center">
			<h2 class="mb-0">
				<span class="text-capitalize">pages</span>
				<small id="tableInfo">Showing 1 to 5 of 5 entries</small>
			</h2>
		</div>
		<div class="col-md-6 col-12 align-self-center d-none d-md-block">
			<ol class="breadcrumb mb-0 p-0 bg-transparent float-right">
				<li class="breadcrumb-item"><a href="https://pk.findmassagecenter.com/admin">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="https://pk.findmassagecenter.com/admin/pages" class="text-capitalize">pages</a></li>
				<li class="breadcrumb-item active">List</li>
			</ol>
		</div>
	</div>
	            	<div class="row">
		<div class="col-12">
			
						<div class="card mb-0 rounded">
				<div class="card-body">
					<h3 class="card-title"><i class="fa fa-question-circle"></i> Help</h3>
					<p class="card-text">
						To translate this list you have to select a language by clicking on the dropdown button <a class="btn btn-xs btn-primary dropdown-toggle dropdown-toggle-split text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle</span></a> icon located at the right of each <a class="btn btn-xs btn-primary text-white"><i class="far fa-edit"></i> Edit</a> button.
													&nbsp;Translatable fields can be identified by the <i class="fas fa-flag-checkered"></i> icon before or after their label in the form.
											</p>
				</div>
			</div>
						
			<div class="card rounded">
				
				<div class="card-header with-border">
					<a href="{{ asset('admin/addindex') }}" class="btn btn-primary shadow ladda-button" data-style="zoom-in">
		<span class="ladda-label">
            <i class="fas fa-plus"></i> Add Money
        </span>
    </a>
	  		  		<a href="https://pk.findmassagecenter.com/admin/pages/reorder" class="btn btn-secondary shadow ladda-button" data-style="zoom-in">
		  <span class="ladda-label">
              <i class="fas fa-arrows-alt" aria-hidden="true"></i> Manage Emails
          </span>
      </a>
		  		  					<button id="bulkDeleteBtn" class="btn btn-danger shadow"><i class="fas fa-times"></i> Delete Selected Items</button>
			  						<div id="datatable_button_stack" class="pull-right text-right"></div>
				</div>
				
				
									<div class="card-body">
						<nav class="navbar navbar-expand-lg navbar-filters mb-0 pb-0 pt-0">
	<!-- Brand and toggle get grouped for better mobile display -->
	<a class="nav-item d-none d-lg-block">
		<span class="fas fa-filter"></span>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle filters">
		<i class="fas fa-filter"></i> Filters
	</button>
	
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<!-- THE ACTUAL FILTERS -->
							<li filter-name="name" filter-type="text" class="dropdown ">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Name <span class="caret"></span></a>
	<div class="dropdown-menu pt-0 pb-0">
		<div class="form-group backpack-filter mb-0">
			<div class="input-group">
				<input class="form-control pull-right" id="text-filter-name" type="text">
				<div class="input-group-append">
					<span class="input-group-text">
						<a class="text-filter-name-clear-button" href=""><i class="fa fa-times"></i></a>
					</span>
				</div>
			</div>
		</div>
	</div>
</li>









							<li filter-name="status" filter-type="dropdown" class="nav-item dropdown ">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		Status <span class="caret"></span>
	</a>
    <ul class="dropdown-menu">
		<a class="dropdown-item" parameter="status" dropdownkey="" href="">-</a>
		<div role="separator" class="dropdown-divider"></div>
														<li class="dropdown-item ">
						<a parameter="status" href="" key="1">Activated</a>
					</li>
																<li class="dropdown-item ">
						<a parameter="status" href="" key="2">Unactivated</a>
					</li>
									    </ul>
  </li>

<li>
				<a href="#" id="remove_filters_button" class="nav-link invisible">
					<i class="fa fa-eraser"></i> Remove filters
				</a>
			</li>
		</ul>
	</div>
</nav>



					</div>
								
				<div class="card-body">
					
					<form id="bulkActionForm" action="https://pk.findmassagecenter.com/admin/pages/bulk_delete" method="POST">
						<input type="hidden" name="_token" value="A05PkPVyEmxKYrcMXVbSReHuBvX7CEzRKQatwBNA">
						
						<div id="crudTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
						    <div class="col-sm-12 col-md-6">
						        <div class="dataTables_length" id="crudTable_length"><label><select name="crudTable_length" aria-controls="crudTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option><option value="250">250</option><option value="500">500</option></select> records per page</label></div></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
						            <table id="crudTable" class="table table-bordered table-striped display dt-responsive nowrap dataTable dtr-inline" width="100%" role="grid" aria-describedby="crudTable_info" style="width: 100%;">
							<thead>
							<tr role="row"><th data-orderable="true" class="sorting" tabindex="0" aria-controls="crudTable" rowspan="1" colspan="1" style="width: 281px;" aria-label="
										Name
									: activate to sort column ascending">
										URL
									</th><th data-orderable="true" class="sorting" tabindex="0" aria-controls="crudTable" rowspan="1" colspan="1" style="width: 105px;" aria-label="
										Active
									: activate to sort column ascending">
										Status
									</th>
									<th data-orderable="false" class="sorting_disabled" rowspan="1" colspan="1" style="width: 119px;" aria-label="Actions">Actions</th>
									</tr>
							</thead>
	
							<tbody>
							

</td>
<?php 
//print_r($data);
foreach($data as $key=> $val){

?>

<td><?php echo $val['url']; ?>
	</td>
	
	<td>
	<?php echo $val['status'] ?>
	  	</td>
	  	
</tr>
<?php } ?>
</tbody>
	
							<tfoot>
							<tr><<th rowspan="1" colspan="1">Email</th><th rowspan="1" colspan="1">Actions</th></tr>
							</tfoot>
						</table></div></div>
						
					</form>

				</div>

								
        	</div>
    	</div>
	</div>
        </div>
        
        
        <footer class="footer">
            <div class="row">
                <div class="col-md-6 text-left">
                    Version 9.0.0
                </div>
                                    <div class="col-md-6 text-right">
                                                    Powered by Zecanto
                                            </div>
                            </div>
        </footer>
            
@endsection
