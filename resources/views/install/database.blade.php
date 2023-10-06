@extends('install.layouts.master')

@section('title', trans('messages.database'))

@section('content')

    <h3 class="title-3"><i class="fas fa-database"></i> {{ trans('messages.database_configuration') }}</h3>
    
    <form name="installForm" id="installForm" action="{{ $installUrl . '/database' }}" method="POST">
        {!! csrf_field() !!}
        
        <div class="row">
            <div class="col-md-6">
                @include('install.helpers.form_control', [
                    'type'       => 'text',
                    'label'      => trans('messages.hostname'),
                    'name'       => 'host',
                    'value'      => ($database["host"] ?? ""),
                    'help_class' => 'install',
                    'rules'      => $rules
                ])
            </div>
            <div class="col-md-6">
                @include('install.helpers.form_control', [
                    'type'        => 'text',
					'label'       => trans('messages.port'),
                    'name'        => 'port',
                    'value'       => ($database["port"] ?? "3306"),
                    'placeholder' => '3306',
                    'help_class'  => 'install',
                    'rules'       => $rules
                ])
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                @include('install.helpers.form_control', [
                    'type'       => 'text',
					'label'      => trans('messages.username'),
                    'name'       => 'username',
                    'value'      => ($database["username"] ?? ""),
                    'help_class' => 'install',
                    'rules'      => $rules
                ])
            </div>
            <div class="col-md-6">
                @include('install.helpers.form_control', [
                    'type'       => 'text',
					'label'      => trans('messages.password'),
                    'name'       => 'password',
                    'value'      => ($database["password"] ?? ""),
                    'help_class' => 'install',
                    'rules'      => $rules
                ])
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                @include('install.helpers.form_control', [
                    'type'       => 'text',
                    'label'      => trans('messages.database_name'),
                    'name'       => 'database',
                    'value'      => ($database["database"] ?? ""),
                    'help_class' => 'install',
                    'rules'      => $rules
                ])
            </div>
            <div class="col-md-6">
                	<input type="hidden" name='prefix' value=''>
              
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                @include('install.helpers.form_control', [
                    'type'       => 'text',
					'label'      => trans('messages.socket'),
                    'name'       => 'socket',
                    'value'      => ($database["socket"] ?? ""),
                    'help_class' => 'install',
                    'rules'      => $rules
                ])
            </div>
            <div class="col-md-6">
                &nbsp;
            </div>
        </div>
        
        <hr class="border-0 bg-secondary">
        
        <div class="text-end">
            <button type="submit" class="btn btn-primary">
                {!! trans('messages.save') !!} <i class="fas fa-chevron-right position-right"></i>
            </button>
        </div>
    </form>

@endsection

@section('after_scripts')
    <script type="text/javascript" src="{{ url()->asset('assets/plugins/forms/styling/uniform.min.js') }}"></script>
@endsection
