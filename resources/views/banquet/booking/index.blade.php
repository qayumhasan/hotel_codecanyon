@extends('banquet.master')
@section('title', 'All Banquet | '.$seo->meta_title)
@section('content')
@php
date_default_timezone_set("asia/dhaka");
$current = date("Y/m/d");
@endphp
 <div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">All Banquet</h4>
                  </div>
                  <span class="float-right mr-2">
                     <a href="{{route('admin.hall.create')}}" class="btn btn-sm bg-primary">
                        <i class="ri-add-fill"><span class="pl-1">Add Banquet</span></i>
                     </a>
                  </span>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="datatable" class="table data-table table-striped table-bordered" >
                        <thead class="text-center">
                           <tr>
                              <th>Booking No</th>
                              <th>Name</th>
                              <th>Mobile</th>
                              <th>Date</th>
                              <th>Total Amount</th>
                              <th>status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody class="text-center">
                           @foreach($allbanquet as $data)
                           <tr>
                              <td>{{$data->booking_no}}</td>
                              <td>{{$data->guest_name}}</td>
                              <td>{{$data->mobile}}</td>
                              <td>{{$data->booking_date}}</td>
                              <td>{{$data->total_net_amount}}</td>
                              <td>
                              @if($data->is_active==1)
                              <span class=" btn-success btn-sm">Active</span>
                              @else
                              <span class=" btn-danger btn-sm">Deactive</span>
                              @endif
                              </td>
                              <td>
                                 @if($data->is_active==1)
                                 <a class="badge bg-success-light mr-2"  data-toggle="tooltip" data-placement="top"  href="{{url('admin/banquet/deactive/'.$data->id)}}" data-original-title="Active"><i class="la la-thumbs-up"></i></a>
                                 @else
                                 <a class="badge bg-danger-light mr-2"  data-toggle="tooltip" data-placement="top" href="{{url('admin/banquet/active/'.$data->id)}}" data-original-title="Deactive"><i class="la la-thumbs-down"></i></a>
                                 @endif
                                 <a class="badge bg-primary-light mr-2"  data-toggle="tooltip" data-placement="top" href="{{url('admin/banquet/edit/'.$data->id)}}" data-original-title="Edit"><i class="lar la-edit"></i></a>
                                 <a id="delete" class="badge bg-danger-light mr-2"  data-toggle="tooltip" data-placement="top" href="{{url('admin/banquet/delete/'.$data->id)}}" data-original-title="Delete"> <i class="la la-trash"></i></a>
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