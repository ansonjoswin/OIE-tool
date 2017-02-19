<!-- resources/views/common/flash.blade.php -->

@if(Session::has('flash_alert'))
    <div class="alert alert-danger">
        {{ Session::get('flash_alert') }}
    </div>
@endif

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
