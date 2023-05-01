@extends('layouts.user')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <h3>Applied Applications</h3>
            <hr>
            <div class="card">
                <div class="card-body">
                    @include('components.alerts')
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


                                <th>Print</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->tracking_id }}</td>
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
                                        @if ($item->status == 'COMPLATED')
                                            <a href="/user/certificate/{{ $item->id }}" class="btn btn-outline-primary">
                                                SHOW </a>
                                        @endif
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
