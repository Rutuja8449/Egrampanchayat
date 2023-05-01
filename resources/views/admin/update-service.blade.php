@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h3>Update Service</h3>
            <hr>
        </div>
        <div class="col-md-6 offset-md-3">
            @include('components.alerts')
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Service Details
                </div>
                <div class="card-body">
                    <form action="/admin/service/update" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Service Title</label>
                            <input type="text" class="form-control" value="{{ $service->title }}" required
                                name="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Service Description</label>
                            <textarea class="form-control" rows="3" required name="description">{{ $service->description }}</textarea>
                        </div>
                        <input type="hidden" name="id" value="{{ $service->id }}">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
