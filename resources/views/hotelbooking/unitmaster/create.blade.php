@extends('inventory.master')
@section('title', 'Create Unit | '.$seo->meta_title)
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow-sm shadow-showcase">
                            <div class="card-header d-flex justify-content-between bg-header">
                                <div class="header-title">
                                    <h4 class="card-title">Unit Content</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.unit.store')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Unit Name: *</label>
                                                <input type="text" class="form-control" name="name" placeholder="Unit Name" />
                                                @error('name')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Status: *</label>
                                                <select class="form-control" name="is_active">
                                                    <option value="1">Active</option>
                                                    <option value="0">Deactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 text-center mt-4">
                                            <div id="file-upload-form" class="uploader-file">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card shadow-sm shadow-showcase m-0">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-12 p-0">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between bg-header">
                                                <div class="header-title">
                                                    <h4 class="card-title">All Unit</h4>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="datatable" class="table data-table table-striped table-bordered">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Unit Name</th>

                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center">
                                                            @foreach($allunit as $key => $data)
                                                            <tr>
                                                                <td>{{++$key}}</td>
                                                                <td>{{$data->name}}</td>
                                                                <td>
                                                                    @if($data->is_active==1)
                                                                        <span class="btn btn-success btn-sm">Active<span>
                                                                    @else
                                                                        <span class="btn btn-danger btn-sm">Deactive<span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($data->is_active==1)
                                                                    <a class="badge bg-success-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/unit/deactive/'.$data->id)}}" data-original-title="Active"><i class="la la-thumbs-up"></i></a>
                                                                    @else
                                                                    <a class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/unit/active/'.$data->id)}}" data-original-title="Deactive"><i class="la la-thumbs-down"></i></a>
                                                                    @endif
                                                                    <a class="badge bg-primary-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/unit/edit/'.$data->id)}}" data-original-title="Edit"><i class="lar la-edit"></i></a>
                                                                    <a id="delete" class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/unit/delete/'.$data->id)}}" data-original-title="Delete"> <i class="la la-trash"></i></a>

                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection