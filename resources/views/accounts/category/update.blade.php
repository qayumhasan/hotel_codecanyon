@extends('accounts.master')
@section('title', 'Account Category Update| '.$seo->meta_title)
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Update Account Category</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow-sm shadow-showcase">
                            <div class="card-header d-flex justify-content-between asif">
                                <div class="header-title">
                                    <h4 class="card-title">Account Category Content</h4>
                                </div>
                            </div>
                            <div class="card-body">
                            <form action="{{route('admin.account.category.update')}}" method="POST">
                                 @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">Category Name:*</label>
                                                <input type="text" class="form-control" name="category_name" placeholder="Category Name" value="{{$edit->category_name}}"/>
                                                <input type="hidden" name="id" value="{{$edit->id}}"/>
                                                @error('category_name')
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
                                        <div class="col-md-8 text-center">
                                            <div id="file-upload-form" class="uploader-file">
                                                <button type="submit" class="btn btn-success">Update</button>
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
                                                <h4 class="card-title">All Account Category</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="datatable" class="table data-table table-striped table-bordered" >
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>Category Code</th>
                                                        <th>Category Name</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @foreach($allcategory as $key => $data)
                                                        <tr>
                                                            <td>{{$data->category_code}}</td>
                                                            <td>{{$data->category_name}}</td>
                                                            <td>
                                                            @if($data->is_active==1)
                                                            <span class="btn btn-success btn-sm">Active<span>
                                                            @else
                                                            <span class="btn btn-danger btn-sm">Deactive<span>
                                                            @endif
                                                            </td>
                                                            <td>
                                                            @if($data->is_active==1)
                                                            <a class="badge bg-success-light mr-2"  data-toggle="tooltip" data-placement="top"  href="{{url('admin/account/category/deactive/'.$data->id)}}" data-original-title="Active"><i class="la la-thumbs-up"></i></a>
                                                            @else
                                                                <a class="badge bg-danger-light mr-2"  data-toggle="tooltip" data-placement="top" href="{{url('admin/account/category/active/'.$data->id)}}" data-original-title="Deactive"><i class="la la-thumbs-down"></i></a>
                                                            @endif
                                                            <a class="badge bg-primary-light mr-2"  data-toggle="tooltip" data-placement="top" href="{{url('admin/account/category/edit/'.$data->id)}}" data-original-title="Edit"><i class="lar la-edit"></i></a>
                                                
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
    $('body').on('keydown','input,select,textarea',function(e){
    var self=$(this)
    ,form=self.parents('form:eq(0)')
    ,focusable
    ,next
    ;
    if(e.keyCode==13){
    focusable=form.find('input,a,select,button,textarea').filter(':visible');
    next=focusable.eq(focusable.index(this)+1);
    if (next.length){
    next.focus();
    } else{
    form.submit();
    }
    return false;
    }
    });
</script>
@endsection