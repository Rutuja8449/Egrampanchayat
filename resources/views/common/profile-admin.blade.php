@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>User Profile</h3>
            <hr>
        </div>
        <div class="col-md-6 offset-md-3">
            @include('components.alerts')
            <div class="card">
                <div class="card-header">
                    My Details
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" value="{{ $user->name }}" class="form-control" name="name" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" value="{{ $user->address }}" class="form-control" name="address" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contact</label>
                        <input type="number" value="{{ $user->contact }}" class="form-control" name="contact" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <input type="text" value="{{ $user->role }}" class="form-control" name="role" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" value="{{ $user->email }}" class="form-control" name="email" readonly>
                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection
