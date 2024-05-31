@extends('layouts.master')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Brand</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Brand
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
                            <div class="card-header">
                                <div class="card-title">Tạo mới</div>
                            </div>

                            <div class="card-body">
                                @if (\Session::has('msg'))
                                    <div class="alert alert-success">
                                        {{ \Session::get('msg') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('devices.update', $device) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mx-auto w-50 mt-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $device->name }}">
                                    </div>

                                    <div class="mx-auto w-50 mt-3">
                                        <label for="serial">Serial</label>
                                        <input type="text" name="serial" id="serial" class="form-control"
                                            value="{{ $device->serial }}">
                                    </div>


                                    <div class="mx-auto w-50 mt-3">
                                        <label for="model">Model</label>
                                        <input type="text" name="model" id="model" class="form-control"
                                            value="{{ $device->model }}">
                                    </div>

                                    <div class="mx-auto w-50 mt-3">
                                        <label for="img">Img</label>
                                        <input type="file" name="img" id="img" class="form-control">
                                        <img src="{{ \Storage::url($device->img) }}" alt="" width="100px">
                                    </div>

                                    <div class="mx-auto w-50 mt-3">
                                        <label for="is_active">Is Active</label>
                                        <select name="is_active" id="is_active" class="form-control">
                                            <option @if ($device->is_active) selected @endif value="1">Active
                                            </option>
                                            <option @if ($device->is_active) selected @endif value="0">
                                                Inactive</option>
                                        </select>
                                    </div>

                                    <div class="mx-auto w-50 mt-3">
                                        <label for="describe">Describe</label>
                                        <textarea name="describe" id="describe" class="form-control" value="{{ $device->describe }}"></textarea>
                                    </div>



                                    <div class="d-flex justify-content-center mt-3">
                                        <a href="{{ route('devices.index') }}" class="btn btn-warning me-2">Về trang
                                            list</a>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
