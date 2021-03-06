@extends('restaurant.chui.master')
@section('title', 'All Room | '.$seo->meta_title)
@section('content')
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between bg-header">
                  <div class="header-title">
                     <h4 class="card-title">All Table</h4>
                  </div>
                  <span class="float-right mr-2">
                     <a href="{{route('admin.restaurnat.table.create')}}" class="btn btn-sm bg-primary">
                        <i class="ri-add-fill"><span class="pl-1">Add Table</span></i>
                     </a>
                  </span>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="datatable" class="table data-table table-striped table-bordered">
                        <thead class="text-center">
                           <tr>
                              <th>Table No</th>
                              <th>Branch Name</th>
                              <th>Table Type</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody class="text-center">
                           @foreach($tables as $data)
                           <tr>
                              <td>{{$data->table_no}}</td>
                              <td>{{$data->branch->branch_name ?? ''}}</td>
                              <td>{{$data->tableType->table_type}}</td>
                              <td>
                                 @if($data->is_active==1)
                                 <span class="btn btn-success btn-sm">Active<span>
                                       @else
                                       <span class="btn btn-danger btn-sm">Deactive<span>
                                             @endif

                              </td>



                              <td>
                                 @if($data->is_active==1)
                                 <a class="badge bg-success-light mr-2" data-toggle="tooltip" data-placement="top" href="{{route('admin.restaurnat.table.status',$data->id)}}" data-original-title="Active"><i class="la la-thumbs-up"></i></a>
                                 @else
                                 <a class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{route('admin.restaurnat.table.status',$data->id)}}" data-original-title="Deactive"><i class="la la-thumbs-down"></i></a>
                                 @endif
                                 <a class="badge bg-primary-light mr-2" data-toggle="tooltip" data-placement="top" href="{{route('admin.restaurnat.table.edit',$data->id)}}" data-original-title="Edit"><i class="lar la-edit"></i></a>
                                 <a id="delete" class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{route('admin.restaurnat.table.delete',$data->id)}}" data-original-title="Delete"> <i class="la la-trash"></i></a>
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
@endsection