@extends('hotelbooking.master')
@section('title', 'Create RoomType | '.$companyinformation->company_name)
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card m-0">
                    <div class="card-header d-flex justify-content-between bg-header">
                        <div class="header-title">
                            <h4 class="card-title">Update RoomType</h4>
                        </div>
                       <a href="{{route('admin.rooomtype.create')}}"><button  class="btn btn-sm bg-primary"><i class="ri-add-fill"><span class="pl-1">Add RoomType</span></i></button></a>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow-sm shadow-showcase">
                            <div class="card-body">
                            <form action="{{route('admin.roomtype.update')}}" method="POST">
                                 @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Room Type: *</label>
                                                <input type="text" class="form-control" name="room_type" placeholder="Room Type" value="{{$edit->room_type}}"/>
                                                <input type="hidden" name="id" value="{{$edit->id}}"/>
                                                @error('name')
                                                    <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Price: *</label>
                                                <input type="text" class="form-control" name="price" placeholder="Price" value="{{$edit->price}}"/>
                                                @error('name')
                                                    <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Branch Name: *</label>
                                                <select class="form-control" name="branch_id">
                                                    @foreach($allbranch as $branch)
                                                        <option value="{{$branch->id}}"@if($edit->branch_id == $branch->id) selected @endif>{{$branch->branch_name}}</option>
                                                    @endforeach
                                                </select>
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Block: *</label>
                                                <input type="text" class="form-control" name="block" placeholder="Block" value="{{$edit->block}}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Status: *</label>
                                                <select class="form-control" name="is_active">
                                                    <option value="1" @if($edit->is_active == 1) selected @endif>Active</option>
                                                    <option value="0" @if($edit->is_active == 0) selected @endif>Deactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 text-center">
                                            <div id="file-upload-form" class="uploader-file">
                                                <button type="submit" class="btn btn-primary mt-4">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card shadow-sm shadow-showcase">
                        
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                     <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="header-title">
                                                <h4 class="card-title">All Floor</h4>
                                            </div>
                                            <span class="float-right mr-2">
                                            </span>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="datatable" class="table data-table table-striped table-bordered" >
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>RoomType</th>
                                                        <th>Price</th>
                                                        <th>Block</th>
                                                        <th>Branch Name</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                 @foreach($allroomtype as $key => $data)
                                                    <tr>
                                                        <td>{{++$key}}</td>
                                                        <td>{{$data->room_type}}</td>
                                                        <td>{{$data->price}}</td>
                                                        <td>{{$data->block}}</td>
                                                        <td>{{$data->branch->branch_name ?? ''}}</td>
                                                        <td>
                                                        @if($data->is_active==1)
                                                        <span class="btn btn-success btn-sm">Active<span>
                                                        @else
                                                        <span class="btn btn-danger btn-sm">Deactive<span>
                                                        @endif
                                                        </td>
                                                        <td>
                                                        @if($data->is_active==1)
                                                        <a class="badge bg-success-light mr-2"  data-toggle="tooltip" data-placement="top"  href="{{url('admin/roomtype/deactive/'.$data->id)}}" data-original-title="Active"><i class="la la-thumbs-up"></i></a>
                                                        @else
                                                            <a class="badge bg-danger-light mr-2"  data-toggle="tooltip" data-placement="top" href="{{url('admin/roomtype/active/'.$data->id)}}" data-original-title="Deactive"><i class="la la-thumbs-down"></i></a>
                                                        @endif
                                                        <a class="badge bg-primary-light mr-2"  data-toggle="tooltip" data-placement="top" href="{{url('admin/roomtype/edit/'.$data->id)}}" data-original-title="Edit"><i class="lar la-edit"></i></a>
                                                        <a id="delete" class="badge bg-danger-light mr-2"  data-toggle="tooltip" data-placement="top" href="{{url('admin/roomtype/delete/'.$data->id)}}" data-original-title="Delete"> <i class="la la-trash"></i></a>
                                                        
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