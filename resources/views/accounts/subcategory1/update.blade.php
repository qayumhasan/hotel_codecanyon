@extends('accounts.master')
@section('title', 'Account SubCategoryone Update| '.$companyinformation->company_name)
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
                                    <h4 class="card-title">Account SubCategoryone Content</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.account.subcategoryone.update')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">SubCategory Name:*</label>
                                                <input type="text" class="form-control" name="subcategory_nameone" placeholder="SubCategory Name" value="{{ $edit->subcategory_nameone }}" />
                                                <input type="hidden" name="id" value="{{$edit->id}}">
                                                @error('subcategory_nameone')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Main Category Name: *</label>
                                                <select class="form-control" name="maincategory">
                                                    <option value="">--select--</option>
                                                    @foreach($allmaincategory as $category)
                                                    <option value="{{$category->id}}" @if($edit->maincategory_id==$category->id) selected @endif>{{$category->maincategory_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('maincategory')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Status: *</label>
                                                <select class="form-control" name="is_active">
                                                    <option value="1" @if($edit->is_active==1) selected @endif>Active</option>
                                                    <option value="0" @if($edit->is_active==0) selected @endif>Deactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 text-center mt-4">
                                            <div id="file-upload-form" class="uploader-file">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card shadow-sm shadow-showcase">
                            <div class="card-body m-0 p-0">
                                <div class="row">
                                    <div class="col-md-12 p-0">
                                        <div class="card m-0">
                                            <div class="card-header d-flex justify-content-between bg-header">
                                                <div class="header-title">
                                                    <h4 class="card-title">All Account SubCategory</h4>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="datatable" class="table data-table table-striped table-bordered">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th>SubCategory Name</th>
                                                                <th>SubCategory Code</th>
                                                                <th>MainCategory Code</th>
                                                                <th>MainCategory Name</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center">
                                                            @foreach($allsubcategory as $data)
                                                            <tr>
                                                                <td>{{$data->subcategory_nameone}}</td>
                                                                <td>{{$data->subcategory_codeone}}</td>
                                                                <td>{{$data->maincategory_code}}</td>
                                                                <td>{{$data->maincategory_name}}</td>

                                                                <td>
                                                                    @if($data->is_active==1)
                                                                    <span class="btn btn-success btn-sm">Active<span>
                                                                    @else
                                                                    <span class="btn btn-danger btn-sm">Deactive<span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($data->is_active==1)
                                                                    <a class="badge bg-success-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/account/subcategoryone/deactive/'.$data->id)}}" data-original-title="Active"><i class="la la-thumbs-up"></i></a>
                                                                    @else
                                                                    <a class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/account/subcategoryone/active/'.$data->id)}}" data-original-title="Deactive"><i class="la la-thumbs-down"></i></a>
                                                                    @endif
                                                                    <a class="badge bg-primary-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/account/subcategoryone/edit/'.$data->id)}}" data-original-title="Edit"><i class="lar la-edit"></i></a>
                                                                    <!-- <a id="delete" class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/accounts/subcategoryone/delete/'.$data->id)}}" data-original-title="Delete"> <i class="la la-trash"></i></a> -->
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