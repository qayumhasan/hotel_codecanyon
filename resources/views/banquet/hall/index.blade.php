@extends('banquet.master')
@section('title', 'All Venue | '.$companyinformation->company_name)
@section('content')
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between bg-header">
                  <div class="header-title">
                     <h4 class="card-title">All Venue</h4>
                  </div>
                  <span class="float-right mr-2">
                     <a href="{{route('admin.hall.create')}}" class="btn btn-sm bg-primary">
                        <i class="ri-add-fill"><span class="pl-1">Add Venue</span></i>
                     </a>
                  </span>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="datatable" class="table data-table table-striped table-bordered">
                        <thead class="text-center">
                           <tr>
                              <th>Venue Name</th>
                              <th>Mobile</th>
                              <th>Address</th>
                              <th>status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody class="text-center">
                           @foreach($allvenue as $data)
                           <tr>

                              <td>{{$data->venue_name}}</td>
                              <td>{{$data->mobile}}</td>
                              <td>{{$data->address}}</td>
                              <td>
                                 @if($data->is_active==1)
                                 <span class=" btn-success btn-sm">Active</span>
                                 @else
                                 <span class=" btn-danger btn-sm">Deactive</span>
                                 @endif
                              </td>
                              <td>
                                 @if($data->is_active==1)
                                 <a class="badge bg-success-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/hall/deactive/'.$data->id)}}" data-original-title="Active"><i class="la la-thumbs-up"></i></a>
                                 @else
                                 <a class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/hall/active/'.$data->id)}}" data-original-title="Deactive"><i class="la la-thumbs-down"></i></a>
                                 @endif
                                 <a class="badge bg-primary-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/hall/edit/'.$data->id)}}" data-original-title="Edit"><i class="lar la-edit"></i></a>
                                 <a id="delete" class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/hall/delete/'.$data->id)}}" data-original-title="Delete"> <i class="la la-trash"></i></a>
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