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

                                <form action="{{ route('devices.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mx-auto w-50 mt-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>

                                    <div class="mx-auto w-50 mt-3">
                                        <label for="serial">Serial</label>
                                        <input type="text" name="serial" id="serial" class="form-control">
                                    </div>


                                    <div class="mx-auto w-50 mt-3">
                                        <label for="model">Model</label>
                                        <input type="text" name="model" id="model" class="form-control">
                                    </div>

                                    <div class="mx-auto w-50 mt-3">
                                        <label for="img">Img</label>
                                        <input type="file" name="img" id="img" class="form-control">
                                    </div>

                                    <div class="mx-auto w-50 mt-3">
                                        <label for="is_active">Is Active</label>
                                        <select name="is_active" id="is_active" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="mx-auto w-50 mt-3">
                                        <label for="desctibe">Describe</label>
                                        <textarea name="describe" id="describe" class="form-control"></textarea>
                                    </div>



                                    <div class="d-flex justify-content-center mt-3">
                                        <a href="{{ route('devices.index') }}" class="btn btn-warning me-2">Về trang
                                            list</a>
                                        <button type="submit" class="btn btn-success">Save</button>
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
