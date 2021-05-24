@extends('accounts.master')
@section('title', 'All Account Transection | '.$seo->meta_title)
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset('public/backend')}}/assets/jquery.PrintArea.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
</script>
<script src="{{asset('public/backend/')}}/divjs/divjs.js"></script>
<style>
   .form-control {
      height: 32px;
      wodth: 50%;
   }
</style>
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
                     <h4 class="card-title">Account Transaction(Receipt and Payment)</h4>
                  </div>
                  <span class="float-right mr-2">

                  </span>
               </div>
               <form action="{{route('admin.account.reports.accountreceiptandpayment')}}" method="POST">
                  <div class="card-header d-flex justify-content-center row">

                     @csrf

                     <div class="col-md-2">
                        <div class="form-group">
                           <label for="fname">From Date:</label>
                           <input type="text" id="formdate" name="formdate" class="formdate form-control noradious datepicker" @if(isset($formdate)) value="{{$formdate}}" @else value="{{$current}}" @endif>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <label for="fname">To Date:</label>
                           <input type="text" id="todate" name="todate" class="todate form-control noradious datepicker" @if(isset($todate)) value="{{$todate}}" @else value="{{$current}}" @endif>

                        </div>
                     </div>
                     <div class="col-md-2">
                        <button type="submit" class="btn btn-success mt-4">Search</button>
                     </div>
                  </div>
                  <form>
                     <div class="card-body">
                        <div class="table-responsive printableAreasaveprint">
                           <div class="row">
                              <div class="col-md-6">
                                 <table class="table table-striped table-bordered" style="font-size:12px;">
                                    <thead class="text-center">
                                       <tr>

                                          <th>Head Of Account(Receipt)</th>
                                          <th>Amount</th>
                                       </tr>
                                    </thead>
                                    <tbody class="text-center">
                                       @php
                                       $amountdd=0;
                                       $ttotal=0;
                                       @endphp
                                       @foreach($creadit_amount as $key => $camount)
                                       <tr>
                                          <td>{{$key}}</td>
                                          @php

                                          foreach( $camount as $cdam){
                                          $amountdd= $amountdd + $cdam->dr_amount;
                                          }

                                          @endphp
                                          <td> {{ $amountdd}}</td>
                                       </tr>

                                       @php
                                       $ttotal=$ttotal + $amountdd;
                                       @endphp

                                       @endforeach

                                    </tbody>
                                    <tfoot>

                                       <tr class="text-right">
                                          <td>Total:</td>
                                          <td class="text-center">{{$ttotal}}</td>
                                       </tr>
                                       <tr class="text-right">
                                          <td>Opening Balance:</td>
                                          <td class="text-center">{{$caamount}}</td>
                                       </tr>
                                       <tr class="text-right">
                                          <td>Total Balance:</td>
                                          @php
                                          $closingbalance=$caamount + $ttotal;
                                          @endphp
                                          <td class="text-center">{{ $caamount + $ttotal}}</td>
                                       </tr>
                                       <tfoot>
                                 </table>
                              </div>
                              <div class="col-md-6">
                                 <table class="table table-striped table-bordered" style="font-size:12px;">
                                    <thead class="text-center">
                                       <tr>
                                          <th>Head Of Account(Payment)</th>
                                          <th>Amount</th>
                                       </tr>
                                    </thead>
                                    <tbody class="text-center">
                                       @php
                                       $amount=0;
                                       $total=0;
                                       @endphp
                                       @foreach($davit_amount as $key => $damount)
                                       <tr>

                                          <td>{{$key}}</td>
                                          @php
                                          foreach( $damount as $ddam){
                                          $amount= $amount + $ddam->cr_amount;
                                          }
                                          @endphp
                                          <td> {{ $amount}}</td>
                                       </tr>
                                       @php
                                       $total=$total + $amount;
                                       @endphp

                                       @endforeach
                                    </tbody>
                                    <tfoot>

                                       <tr class="text-right">
                                          <td>Total:</td>
                                          <td class="text-center">{{$total}}</td>
                                       </tr>

                                       <tr class="text-right">
                                          <td>Closing Balance:</td>

                                          <td class="text-center">{{ $tbalance=$closingbalance - $total}}</td>
                                       </tr>
                                       <tr class="text-right">
                                          <td>Total Balance:</td>
                                          <td class="text-center">{{ $tbalance + $total}}</td>
                                       </tr>
                                       <tfoot>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                     @if(isset($searchdata))
                     <div class="card-body text-center">
                        <a class="btn btn-success savepritbtn">Print</a>
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
<script>

</script>

@endsection