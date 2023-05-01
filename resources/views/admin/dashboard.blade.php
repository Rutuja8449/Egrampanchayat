@extends('layouts.admin')

@section('content')
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="image_container w-100">
                <img src="{{ URL::asset('/images/undraw_lives_matter_38lv.svg') }}" alt="profile Pic" height="100%"
                    width="100%">

                <h1>Welcome to {{ env('APP_NAME') }}</h1>
            </div>
        </div>
    </div>
@endsection
