@extends('layouts.admin')
@section('title', 'Update Branch| '.$seo->meta_title)
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between bg-header">
                        <div class="header-title">
                            <h4 class="card-title">Update Branch</h4>
                        </div>
                       <a href="{{route('admin.branch.index')}}"><button  class="btn btn-sm bg-primary"><i class="ri-add-fill"><span class="pl-1">All Branch</span></i></button></a>
                    </div>
                </div>
                <form action="{{route('admin.branch.update')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm shadow-showcase">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fname">Branch ID: *</label>
                                            <input type="text" class="form-control form-control-sm" id="fname" name="branch_id" placeholder="Branch ID" value="{{$data->branch_id}}"/>
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                            @error('branch_id')
                                                <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fname">Branch Name: *</label>
                                            <input type="text" class="form-control form-control-sm" name="branch_name" placeholder="Branch Name" value="{{$data->branch_name}}"/>
                                            @error('branch_name')
                                                <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fname">Mobile: *</label>
                                            <input type="text" class="form-control form-control-sm" name="mobile" placeholder="Mobile" value="{{$data->mobile}}"/>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fname">Email: *</label>
                                            <input type="text" class="form-control form-control-sm" name="email" placeholder="Email" value="{{$data->email}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fname">Web Address: *</label>
                                            <input type="text" class="form-control form-control-sm" name="web_address" placeholder="Web Address" value="{{$data->web_address}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="lname">Address: *</label>
                                           <textarea name="address" class="form-control form-control-sm" cols="30" rows="5">{{$data->address}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                    <h4 class="card-title mt-4">Publish</h4>
                                        <div class="custom-control custom-radio custom-radio-color-checked custom-control">
                                            <input type="radio" name="is_active" id="customRadio-1" class="custom-control-input bg-primary" value="1" @if($data->is_active==1) checked @endif>
                                            <label class="custom-control-label" for="customRadio-1"> Active </label>
                                        </div>
                                        <div class="custom-control custom-radio custom-radio-color-checked custom-control mt-1">
                                            <input type="radio" name="is_active" id="customRadio-2" name="customRadio-10" class="custom-control-input bg-warning" value="0" @if($data->is_active==0) checked @endif>
                                            <label class="custom-control-label" for="customRadio-2"> Deactive </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="file-upload-form" class="uploader-file">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection