@extends('inventory.master')
@section('title', 'Stock TypeWise|'.$companyinformation->company_name)
@section('content')
<script src="{{asset('public/backend')}}/printThis.js"></script>
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between bg-header">
                  <div class="header-title">
                     <h4 class="card-title">StockType Wise Product Purchase Report:<span style="font-size:12px"> {{$maindate}}</span></h4>
                  </div>
               </div>
               <div class="card-body" id="selector">
                  <form action="{{route('admin.stockwise.create')}}" method="post">
                     @csrf
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group row">
                              <label for="" class="col-md-3">Stock Type</label>
                              <select name="stock_id" class="form-control col-md-5" style="font-size:12px">
                                 <option value="">--All-</option>
                                 @foreach($allstockcenter as $stock)
                                 <option value="{{$stock->id}}">{{$stock->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group row">
                              <label for="" class="col-md-3">Form Date</label>
                              <input type="text" name="formdate" class="form-control col-md-5 datepicker" value="{{$current}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group row">
                              <label for="" class="col-md-3">To Date</label>
                              <input type="text" name="todate" class="form-control col-md-5 datepicker" value="{{$current}}">
                           </div>
                        </div>
                        <div class="col-md-1">
                           <div class="form-group">
                              <button class="btn-sm btn-primary">Search</button>
                           </div>
                        </div>
                     </div>
                  </form>
                  <br>
                  <div class="table-responsive" id="printarea">
                     <table class="table table-striped table-bordered">
                        <thead class="text-center">
                           <tr>
                              <th>SNo.</th>
                              <th>Item Name</th>
                              <th>Unit</th>
                              <th>Qty</th>
                              <th>Rate</th>
                              <th>Amount</th>

                           </tr>
                        </thead>
                        <tbody class="text-center">
                           @foreach($allstockcenter as $stock)
                           @php
                           $check=App\Models\Purchase::where('stock_center',$stock->id)->orderBy('id','DESC')->first();
                           @endphp
                           @if($check)
                           <tr>
                              <th>{{ $stock->name}}</th>
                           </tr>
                           @php
                           $itemall=App\Models\Purchase::where('stock_center',$stock->id)->orderBy('id','DESC')->get();
                           $total_amount=0;
                           @endphp
                           @foreach($itemall as $item)
                           @php
                           $mainitem=App\Models\PurchaseHead::where('invoice_no',$item->invoice_no)->orderBy('id','DESC')->get();

                           @endphp
                           @foreach($mainitem as $val => $maini)
                           <tr>
                              <td></td>
                              <td>{{ $maini->item_name }}</td>
                              <td>{{ $maini->unit }}</td>
                              <td>{{ $maini->qty }}</td>
                              <td>{{ $maini->rate }}</td>
                              <td>{{ $maini->amount }}</td>
                           </tr>
                           @php
                           $total_amount = $total_amount + $maini->amount;
                           @endphp
                           @endforeach
                           @endforeach
                           <tr>
                              <th colspan="6">Total:{{$total_amount}} Tk</th>
                           </tr>

                           @endif
                           @endforeach
                        </tbody>
                     </table>

                     <br>
                     <br>

                  </div>
                  <div class="row ">
                     <div class="col-md-6 text-left">
                        <p>Report Created On: {{$maindate}}</p>
                     </div>
                     <div class="col-md-6 text-right">
                        <p>Created By: {{Auth::user()->name}}</p>
                     </div>
                  </div>
                  <div class="row text-center">
                     <div class="col-md-12">
                        <button type="button" class="btn-sm btn-info printPage">Print</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection