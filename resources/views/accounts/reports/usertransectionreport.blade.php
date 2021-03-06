@extends('accounts.master')
@section('title', 'All Account Transection | '.$seo->meta_title)
@section('content')
<script src="{{asset('public/backend')}}/assets/jquery.PrintArea.js"></script>
<script src="{{asset('public/backend/')}}/divjs/divjs.js"></script>
@php
date_default_timezone_set("asia/dhaka");
$current = date("Y/m/d");
@endphp
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between bg-header">
                  <div class="header-title">
                     <h4 class="card-title">User Transection Reports</h4>
                  </div>
               </div>
               <form action="{{route('admin.account.reports.userTransection')}}" method="POST">
                  <div class="card-header d-flex justify-content-center row">
                     @csrf
                     <div class="col-md-2">
                        <div class="form-group">
                           <label for="fname">From Date:</label>
                           <input type="text" id="formdate" style="color:#f1dddd" name="formdate" class="formdate form-control noradious datepicker" @if(isset($formdate)) value="{{$formdate}}" style="color:#000" @else value="{{$current}}" @endif>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <label for="fname">To Date:</label>
                           <input type="text" id="todate" style="color:#f1dddd" name="todate" class="todate form-control noradious datepicker" @if(isset($to_date)) value="{{$to_date}}" style="color:#000" @else value="{{$current}}" @endif>

                        </div>
                     </div>
                     <div class="col-md-1">
                        <div class="form-group mt-4">
                           <input type="checkbox" class="" id="no_date" name="no_date" value="1">
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="fname">User Name: *</label>
                           <select name="username_name" id="employee_report" class="form-control noradious">
                              <option value="">--select--</option>
                              @foreach($alluser as $user)
                              <option value="{{$user->id}}" @if(isset($username_id)) @if($username_id==$user->id) selected @endif @endif>{{$user->name}}</option>
                              @endforeach
                           </select>
                           @error('username_name')
                           <div style="color:red">{{ $message }}</div>
                           @enderror
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
                                 <th>Voucher NO</th>
                                 <th>User</th>
                                 <th>Voucher Type</th>
                                 <th>Remarks</th>
                                 <th>Date</th>
                                 <th>TransectionAmount</th>
                                 <th>ActionType</th>

                              </tr>
                           </thead>
                           <tbody class="text-center">

                              @foreach($searchdata as $key => $sdata)
                              <tr>
                                 <td>{{++$key}}</td>
                                 <td>{{$sdata->VoucherNO}}</td>
                                 <td>{{$sdata->UserID}}</td>
                                 <td>{{$sdata->VoucherType}}</td>
                                 <td>{{$sdata->Remarks}}</td>
                                 <td>{{$sdata->Date}}</td>
                                 <td>{{$sdata->TransectionAmount}}</td>

                                 <td>{{$sdata->ActionType}}</td>

                              </tr>

                              @endforeach
                           </tbody>
                           <tfoot>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                              </tr>
                           </tfoot>
                        </table>
                        @else
                        <table id="datatable" class="table data-table table-striped table-bordered">
                           <thead class="text-center">
                              <tr>
                                 <th>#</th>
                                 <th>Voucher NO</th>
                                 <th>User</th>
                                 <th>Voucher Type</th>
                                 <th>Remarks</th>
                                 <th>Date</th>
                                 <th>TransectionAmount</th>

                                 <th>ActionType</th>

                              </tr>
                           </thead>
                           <tbody class="text-center">
                              @foreach($alldata as $key => $data)
                              <tr>
                                 <td>{{++$key}}</td>
                                 <td>{{$data->VoucherNO}}</td>
                                 <td>{{$data->UserID}}</td>
                                 <td>{{$data->VoucherType}}</td>
                                 <td>{{$data->Remarks}}</td>
                                 <td>{{$data->Date}}</td>
                                 <td>{{$data->TransectionAmount}}</td>
                                 <td>{{$data->ActionType}}</td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                        @endif
                     </div>
                  </div>
                  @if(isset($searchdata))
                  <div class="card-body text-center">
                     <a href="#" class="btn btn-success savepritbtn">Print</a>
                  </div>
                  @endif
            </div>
         </div>
      </div>
   </div>
</div>

<script>
   $(function() {
      $(".savepritbtn").on('click', function() {

         var mode = 'iframe'; 
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
<script>
   $(document).ready(function() {
      $('#no_date').on('click', function(e) {

         if (e.target.checked) {
            document.getElementById("formdate").style.color = "#000";
            document.getElementById("todate").style.color = "#000";
         } else {
            document.getElementById("formdate").style.color = "#f1dddd";
            document.getElementById("todate").style.color = "#f1dddd";
         }


      });
   });
</script>

@endsection