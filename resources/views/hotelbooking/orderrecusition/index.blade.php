@extends('inventory.master')
@section('title', 'All Order Recusition|'.$companyinformation->company_name)
@section('content')
 <div class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between bg-header">
                     <div class="header-title">
                        <h4 class="card-title">All Item</h4>
                     </div>
                     <span class="float-right mr-2">
                        <a href="{{route('admin.ordercusition.create')}}" class="btn btn-sm bg-primary">
                           <i class="ri-add-fill"><span class="pl-1">Add Order</span></i>
                        </a>
                     </span>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered" >
                           <thead class="text-center">
                              <tr>
                                 <th>#</th>
                                 <th>Invoice No</th>
                                 <th>Date</th>
                                 <th>Number OF Qty</th>
                                 <th>Remarks</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody class="text-center">
                              @foreach($alldata as $key => $data)
                              <tr>
                                 <td>{{++$key}}</td>
                                 <td>{{$data->invoice_no}}</td>
                                 <td>{{$data->date}}</td>
                                 <td>{{$data->num_of_qty}}</td>
                                 <td>{{$data->remarks}}</td>
                                 <td>
                                   <a class="badge bg-primary-light mr-2"  data-toggle="tooltip" data-placement="top" href="{{url('admin/ordercusition/edit/'.$data->id)}}" data-original-title="Edit"><i class="lar la-edit"></i></a>
                                   <a id="delete" class="badge bg-danger-light mr-2"  data-toggle="tooltip" data-placement="top" href="{{url('admin/ordercusition/delete/'.$data->id)}}" data-original-title="Delete"> <i class="la la-trash"></i></a>
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