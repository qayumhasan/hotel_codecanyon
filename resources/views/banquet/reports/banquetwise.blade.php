@extends('banquet.master')
@section('title', 'All Banquet | '.$companyinformation->company_name)
@section('content')
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between bg-header">
                  <div class="header-title">
                     <h4 class="card-title">All Banquet Wise</h4>
                  </div>
                  <span class="float-right mr-2">
                     <a href="{{route('admin.hall.create')}}" class="btn btn-sm bg-primary">
                        <i class="ri-add-fill"><span class="pl-1">Add Banquet</span></i>
                     </a>
                  </span>
               </div>
               <form action="{{route('admin.banquet.banquetwise')}}" method="POST">
                  <div class="card-header d-flex justify-content-center">
                     @csrf
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="fname">All Banquet: *</label>
                           <select name="banquet_vanue" id="" class="form-control">
                              @foreach($banquet as $bquet)
                              <option value="{{$bquet->id}}" @if(isset($venue_id)) @if($venue_id==$bquet->id) selected @endif @endif>{{$bquet->venue_name}}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <button type="submit" class="btn btn-success">Search</button>
                     </div>
                  </div>
                  <form>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered">
                           <thead class="text-center">
                              <tr>
                                 <th>Booking No</th>
                                 <th>Venue</th>
                                 <th>Name</th>
                                 <th>Mobile</th>
                                 <th>Date</th>
                                 <th>status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody class="text-center">
                              @if(isset($searchdata))
                              @foreach($searchdata as $data)
                              <tr>
                                 <td>{{$data->booking_no}}</td>
                                 <td>{{$data->venue->venue_name}}</td>
                                 <td>{{$data->guest_name}}</td>
                                 <td>{{$data->mobile}}</td>
                                 <td>{{ date("Y-m-d",strtotime($data->booking_date)) }}</td>
                                 <td>
                                    @if($data->is_active==1)
                                    <span class=" btn-success btn-sm">Active</span>
                                    @else
                                    <span class=" btn-danger btn-sm">Deactive</span>
                                    @endif
                                 </td>
                                 <td>
                                    @if($data->is_active==1)
                                    <a class="badge bg-success-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/banquet/deactive/'.$data->id)}}" data-original-title="Active"><i class="la la-thumbs-up"></i></a>
                                    @else
                                    <a class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/banquet/active/'.$data->id)}}" data-original-title="Deactive"><i class="la la-thumbs-down"></i></a>
                                    @endif
                                    <a class="badge bg-primary-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/banquet/edit/'.$data->id)}}" data-original-title="Edit"><i class="lar la-edit"></i></a>
                                    <a id="delete" class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/banquet/delete/'.$data->id)}}" data-original-title="Delete"> <i class="la la-trash"></i></a>
                                 </td>
                              </tr>
                              @endforeach
                              @else
                              @foreach($allbanquet as $data)
                              <tr>
                                 <td>{{$data->booking_no}}</td>
                                 <td>{{$data->venue->venue_name}}</td>
                                 <td>{{$data->guest_name}}</td>
                                 <td>{{$data->mobile}}</td>
                                 <td>{{$data->booking_date}}</td>
                                 <td>
                                    @if($data->is_active==1)
                                    <span class=" btn-success btn-sm">Active</span>
                                    @else
                                    <span class=" btn-danger btn-sm">Deactive</span>
                                    @endif
                                 </td>
                                 <td>
                                    @if($data->is_active==1)
                                    <a class="badge bg-success-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/banquet/deactive/'.$data->id)}}" data-original-title="Active"><i class="la la-thumbs-up"></i></a>
                                    @else
                                    <a class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/banquet/active/'.$data->id)}}" data-original-title="Deactive"><i class="la la-thumbs-down"></i></a>
                                    @endif
                                    <a class="badge bg-primary-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/banquet/edit/'.$data->id)}}" data-original-title="Edit"><i class="lar la-edit"></i></a>
                                    <a id="delete" class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/banquet/delete/'.$data->id)}}" data-original-title="Delete"> <i class="la la-trash"></i></a>
                                 </td>
                              </tr>
                              @endforeach
                              @endif
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