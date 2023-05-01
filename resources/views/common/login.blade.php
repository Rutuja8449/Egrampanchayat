@extends('layouts.common')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @include('components.alerts')
            <div class="card">
                <div class="card-header">
                    Login Please
                </div>
                <form action="/login" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
