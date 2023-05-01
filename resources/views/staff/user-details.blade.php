@extends('layouts.staff')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @include('components.alerts')
            <div class="card">
                <div class="card-header">
                    Applicant Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Name</label>
                            <input type="text" value="{{ $user->name }}" class="form-control" name="name" readonly>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Address</label>
                            <input type="text" value="{{ $user->address }}" class="form-control" name="address" readonly>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Contact</label>
                            <input type="number" value="{{ $user->contact }}" class="form-control" name="contact" readonly>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Email address</label>
                            <input type="email" value="{{ $user->email }}" class="form-control" name="email" readonly>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Role</label>
                            <input type="text" value="{{ $user->role }}" class="form-control" name="role" readonly>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Gender</label>
                            <input type="text" value="{{ $user->gender }}" class="form-control" name="gender" readonly>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Birth date</label>
                            <input type="text" value="{{ $user->birth_date }}" class="form-control" name="gender"
                                readonly>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Birth place</label>
                            <input type="text" value="{{ $user->birth_place }}" class="form-control" name="gender"
                                readonly>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Mother name</label>
                            <input type="text" value="{{ $user->mother_name }}" class="form-control" name="gender"
                                readonly>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Father name</label>
                            <input type="text" value="{{ $user->father_name }}" class="form-control" name="gender"
                                readonly>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection
