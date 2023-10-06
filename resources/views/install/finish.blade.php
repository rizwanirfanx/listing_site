@extends('install.layouts.master')

@section('title', trans('messages.cron_jobs'))

@section('content')
    
    <h3 class="title-3 text-success">
        <i class="far fa-check-circle"></i> Congratulations, you've successfully installed Your Classifier (Classified Ads Web Application)
    </h3>
    
    Remember that all your configurations were saved in <strong class="text-bold">[APP_ROOT]/.env</strong> file. You can change it when needed.
	<br><br>
    Now, you can go to your Admin Panel with link:
    <a class="text-bold" href="{{ admin_url('login') }}">{{ admin_url() }}</a>.
    Visit your website: <a class="text-bold" href="{{ url('/') }}" target="_blank">{{ url('/') }}</a>
	<br><br>
    If you facing any issue, please visit our <a class="text-bold" href="https://support.bedigit.com" target="_blank">Help Center</a>.
    <br><br>
    Thank you for choosing YourClassifier. - <a class="text-bold" href="https://yourclassifier.com" target="_blank">yourclassifier.com</a>
    <div class="clearfix"></div>
    <br />
    
@endsection

@section('after_scripts')
@endsection
