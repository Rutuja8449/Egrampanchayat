@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h3>Update Application Status</h3>
            <hr>
        </div>
        <div class="col-md-6 offset-md-3">
            @include('components.alerts')
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Service Details
                </div>
                <div class="card-body">
                    <form action="/admin/application/updateP" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Application Status</label>
                            <select class="form-control" required name="status">
                                <option value="CREATED">CREATED</option>
                                <option value="PROCCESSING">PROCCESSING</option>
                                <option value="APPROVED">APPROVED</option>
                                <option value="REJECTED">REJECTED</option>
                                <option value="COMPLATED">COMPLATED</option>
                                <option value="DELIVERED">DELIVERED</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Remark</label>
                            <textarea class="form-control" rows="3" required name="remark"></textarea>
                        </div>
                        <input type="hidden" name="id" value="{{ $id }}">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
