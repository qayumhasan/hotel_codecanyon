@extends('layouts.admin')
@section('title', 'Create Floor| '.$companyinformation->company_name)
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
                                    <h4 class="card-title">Add Floor</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.floor.store')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Floor Name: *</label>
                                                <input type="text" class="form-control form-control-sm" name="name" placeholder="Floor Name" required />
                                                @error('name')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Branch Name: *</label>
                                                <select class="form-control form-control-sm" name="branch_id">
                                                    @foreach($branch as $allbranch)
                                                    <option value="{{$allbranch->id}}">{{$allbranch->branch_name}}</option>
                                                    @endforeach
                                                </select>
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
                                        <div class="col-md-8 text-center">
                                            <div id="file-upload-form" class="uploader-file">
                                                <button type="submit" class="btn btn-primary mt-4">Add Floor</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card shadow-sm shadow-showcase">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between bg-header">
                                                <div class="header-title">
                                                    <h4 class="card-title">All Floor</h4>
                                                </div>
                                                <span class="float-right mr-2">
                                                </span>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="datatable" class="table data-table table-striped table-bordered">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Floor Name</th>
                                                                <th>Branch Name</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center">
                                                            @foreach($allfloor as $key => $data)
                                                            <tr>
                                                                <td>{{++$key}}</td>
                                                                <td>{{$data->name}}</td>
                                                                <td>{{$data->branch->branch_name}}</td>
                                                                <td>
                                                                    @if($data->is_active==1)
                                                                    <span class="btn btn-success btn-sm">Active<span>
                                                                            @else
                                                                            <span class="btn btn-danger btn-sm">Deactive<span>
                                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($data->is_active==1)
                                                                    <a class="badge bg-success-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/floor/deactive/'.$data->id)}}" data-original-title="Active"><i class="la la-thumbs-up"></i></a>
                                                                    @else
                                                                    <a class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/floor/active/'.$data->id)}}" data-original-title="Deactive"><i class="la la-thumbs-down"></i></a>
                                                                    @endif
                                                                    <a class="badge bg-primary-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/floor/edit/'.$data->id)}}" data-original-title="Edit"><i class="lar la-edit"></i></a>
                                                                    <a id="delete" class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/floor/delete/'.$data->id)}}" data-original-title="Delete"> <i class="la la-trash"></i></a>
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
    @section('scripts')
    <script>
        $('body').on('keydown', 'input,select,textarea', function(e) {
            var self = $(this),
                form = self.parents('form:eq(0)'),
                focusable, next;
            if (e.keyCode == 13) {
                focusable = form.find('input,a,select,button,textarea').filter(':visible');
                next = focusable.eq(focusable.index(this) + 1);
                if (next.length) {
                    next.focus();
                } else {
                    form.submit();
                }
                return false;
            }
        });
    </script>
    @endsection