@extends('layouts.common')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @include('components.alerts')
            <div class="card">
                <div class="card-header">
                    Register Please
                </div>

                <form action="/register" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contact</label>
                            <input type="number" class="form-control" name="contact" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-control" name="role" id="role">
                                <option value="USER"> USER </option>
                                <option value="ADMIN"> ADMIN </option>
                                <option value="STAFF"> STAFF </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select class="form-control" name="gender" id="role">
                                <option value="MALE"> MALE </option>
                                <option value="FEMALE"> FEMALE </option>
                                <option value="OTHER"> OTHER </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Birth date</label>
                            <input type="date" class="form-control" name="birth_date" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Birth place</label>
                            <input type="text" class="form-control" name="birth_place" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mother name</label>
                            <input type="text" class="form-control" name="mother_name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Father name</label>
                            <input type="text" class="form-control" name="father_name" required>
                        </div>
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
