@if (Session::has('success'))
    <div class="alert alert-success mx-2">
        {{ Session::get('success') }}
        @php
            Session::forget('success');
        @endphp
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger mx-2">
        {{ Session::get('error') }}
        @php
            Session::forget('error');
        @endphp
    </div>
@endif
@if (Session::has('warning'))
    <div class="alert alert-warning mx-2">
        {{ Session::get('warning') }}
        @php
            Session::forget('warning');
        @endphp
    </div>
@endif
