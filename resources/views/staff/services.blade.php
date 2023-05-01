@extends('layouts.staff')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <h3>Available Services</h3>
            <hr>
            <div class="card">
                <div class="card-body">
                    @include('components.alerts')
                    <table id="datatable" class="display table table-bordered">
                        <thead>
                            <tr class="table-primary">
                                <th>#ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Published On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
