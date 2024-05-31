@extends('layouts.master')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Device</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Device
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header" style="display:flex; justify-content: space-between">
                                <div class="card-title">Danh sách</div>
                                <a href="{{ route('devices.create') }}" class="btn btn-success">Thêm mới</a>
                            </div>

                            <div class="card-body">
                                @if (\Session::has('msg'))
                                    <div class="alert alert-success">
                                        {{ \Session::get('msg') }}
                                    </div>
                                @endif

                                <table class="table">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Serial</th>
                                        <th>Model</th>
                                        <th>Image</th>
                                        <th>Is_active</th>
                                        <th>Action</th>
                                    </tr>

                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->serial }}</td>
                                            <td>{{ $item->model }}</td>
                                            <td>
                                                <img src="{{ \Storage::url($item->img) }}" alt="" width="100px">
                                            </td>
                                            <td>
                                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                                            </td>
                                            <td>
                                                <a href="{{ route('devices.edit', $item) }}"
                                                    class="btn btn-primary">Edit</a>

                                                <form action="{{ route('devices.destroy', $item) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        onclick="return confirm('You are sure You want to delete it?')"
                                                        class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>

                                {{ $data->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
