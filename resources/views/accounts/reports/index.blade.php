@extends('accounts.master')
@section('title', 'All Account Transection | '.$companyinformation->company_name)
@section('content')
<script src="{{asset('public/backend')}}/assets/jquery.PrintArea.js"></script>
@php
date_default_timezone_set("asia/dhaka");
$current = date("Y/m/d");
@endphp
<script src="{{asset('public/backend/')}}/divjs/divjs.js"></script>
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between bg-header">
                  <div class="header-title">
                     <h4 class="card-title">DateWise Transection Reports</h4>
                  </div>
               </div>
               <form action="{{route('admin.transection.index')}}" method="POST">
                  <div class="card-header d-flex justify-content-center">
                     @csrf
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="fname">From Date: *</label>
                           <input type="text" id="date" name="formdate" class="form-control noradious datepicker" @if(isset($formdate)) value="{{$formdate}}" @else value="{{$current}}" @endif>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="fname">To Date: *</label>
                           <input type="text" id="date" name="todate" class="form-control noradious datepicker" @if(isset($todate)) value="{{$todate}}" @else value="{{$current}}" @endif>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                     </div>
                  </div>
                  <form>
                  <div class="card-body">
                     <div class="table-responsive printableAreasaveprint">

                        @if(isset($searchdata))
                        <table class="table table-striped table-bordered">
                           <thead class="text-center">
                              <tr>
                                 <th>#</th>
                                 <th>Voucher No</th>
                                 <th>Date</th>
                                 <th>Reference</th>
                                 <th>Cheque Reference</th>
                                 <th>Voucher Amount</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody class="text-center">
                              @foreach($searchdata as $key => $sdata)
                              <tr>
                                 <td>{{++$key}}</td>
                                 <td>{{$sdata->voucher_no}}</td>
                                 <td>{{$sdata->date}}</td>
                                 <td>{{$sdata->reference}}</td>
                                 <td>{{$sdata->cheque_reference}}</td>
                                 @php
                                 $amount=App\Models\AccountTransectionDetails::where('voucher_no',$sdata->voucher_no)->select(['dr_amount','cr_amount'])->first();
                                 @endphp
                                 <td> @if($amount->dr_amount==NULL) {{$amount->cr_amount}} @elseif($amount->cr_amount==NULL) {{$data->dr_amount}} @endif</td>
                                 <td>
                                    <a class="badge bg-success-light mr-2" data-toggle="tooltip" data-placement="top" href="" data-original-title="Print"><i class="la la-print"></i></a>
                                    <a class="badge bg-primary-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/account/transectionhead/edit/'.$sdata->id)}}" data-original-title="Edit"><i class="lar la-edit"></i></a>
                                    <a id="delete" class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/account/transectionhead/delete/'.$sdata->id)}}" data-original-title="Delete"> <i class="la la-trash"></i></a>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                        @else
                        <table id="datatable" class="table data-table table-striped table-bordered">
                           <thead class="text-center">
                              <tr>
                                 <th>#</th>
                                 <th>Voucher No</th>
                                 <th>Date</th>
                                 <th>Voucher Reference</th>
                                 <th>Cheque Reference</th>
                                 <th>Voucher Amount</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody class="text-center">
                              @foreach($alldata as $key => $data)
                              <tr>
                                 <td>{{++$key}}</td>
                                 <td>{{$data->voucher_no}}</td>
                                 <td>{{$data->date}}</td>
                                 <td>{{$data->reference}}</td>
                                 <td>{{$data->cheque_reference}}</td>
                                 @php
                                    $amount=App\Models\AccountTransectionDetails::where('voucher_no',$data->voucher_no)->select(['dr_amount','cr_amount'])->first();
                                 @endphp
                                 <td> @if($amount->dr_amount==NULL) {{$amount->cr_amount}} @elseif($amount->cr_amount==NULL) {{$data->dr_amount}} @endif</td>
                                 <td>
                                    <a class="badge bg-success-light mr-2 print_click" data-id="{{$data->id}}" data-original-title="Print"><i class="la la-print"></i></a>
                                    <a class="badge bg-primary-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/account/transectionhead/edit/'.$data->id)}}" data-original-title="Edit"><i class="lar la-edit"></i></a>
                                    <a id="delete" class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{url('admin/account/transectionhead/delete/'.$data->id)}}" data-original-title="Delete"> <i class="la la-trash"></i></a>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                        @endif
                     </div>
                  </div>
                  <div class="card-body text-center">
                     <a href="#" class="btn btn-success savepritbtn">Print</a>
                  </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(function() {
      $(".savepritbtn").on('click', function() {
         //alert("ok");
         var mode = 'iframe'; //popup
         var close = mode == "popup";
         var options = {
            mode: mode,
            popClose: close
         };
         $("div.printableAreasaveprint").printArea(options);
      });
   });
</script>

<script>
   $(document).ready(function() {
      $('.print_click').on('click', function() {
         var id = $(this).data("id");
         $("#maindata").empty();
         $.ajax({
            type: 'GET',
            url: "{{ route('adminaccount.print.voucheraccount') }}",
            data: {
               id: id,
            },

            success: function(data) {

               $("#maindata").append(data)


               $('#exampleModal').modal('toggle');

            }
         });

      });
   });
</script>

@endsection