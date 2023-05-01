@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h3>Services Master</h3>
            <hr>
        </div>
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Create Service
                </div>
                <div class="card-body">
                    @include('components.alerts')
                    <form action="/admin/service/create" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Service Title</label>
                            <input type="text" class="form-control" required name="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Service Description</label>
                            <textarea class="form-control" rows="3" required name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Form Design</label>
                            <textarea id="textEditor" class="form-control" rows="3" name="textEditor"></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-12">
            <h3>Available Services</h3>
            <hr>
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="display table table-bordered">
                        <thead>
                            <tr class="table-primary">
                                <th>#ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Delete</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a class="btn btn-outline-danger"
                                            href="/admin/service/delete/{{ $item->id }}">DELETE</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-success"
                                            href="/admin/service/updateIndex/{{ $item->id }}">UPDATE</a>
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
