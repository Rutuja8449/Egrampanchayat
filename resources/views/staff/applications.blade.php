@extends('layouts.admin')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <h3>Applied Applications</h3>
            <hr>
            <div class="card">
                @include('components.alerts')
                <div class="card-body">
                    <table id="datatable" class="display table table-bordered">
                        <thead>
                            <tr class="table-primary">
                                <th>#ID</th>
                                <th>Track ID</th>
                                <th>Service</th>
                                <th>Status</th>
                                <th>Remark</th>
                                <th>Created On</th>
                                <th>Updated On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><a
                                            href="/staff/user-details/{{ $item->user_id }}">{{ Str::upper($item->tracking_id) }}</a>
                                    </td>
                                    <td><?php foreach ($services as $service) {
                                        if ($item->service_id == $service->id) {
                                            echo $service->title;
                                        }
                                    } ?></td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->remark ? $item->remark : '-' }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="/staff/application/update/{{ $item->id }}"
                                            class="btn btn-outline-primary">UPDATE</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
