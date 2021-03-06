@extends('stock.master')
@section('title', 'Consumption Report| '.$companyinformation->company_name)
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
               <div class="card-header d-flex justify-content-between bg-header">
                  <div class="header-title">
                     <h4 class="card-title">Stock Summary</h4>
                  </div>
                  <span class="float-right mr-2">

                  </span>
               </div>
               <div class="card-body">
                  <form action="{{route('admin.stock.summary')}}" method="post">
                     @csrf
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="fname">Qty:</label>
                              <input type="number" class="form-control" name="qty" value="{{$mainqty}}">

                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="fname">Oparation:</label>
                              <select name="oparation" class="form-control">
                                 <option value="equal_to" @if($oparation=='equal_to' ) selected @endif>Equal To</option>
                                 <option value="greater_then" @if($oparation=='greater_then' ) selected @endif>Greater Then</option>
                                 <option value="greater_then_quel" @if($oparation=='greater_then_quel' ) selected @endif>Greater Then Equal</option>
                                 <option value="less_then" @if($oparation=='less_then' ) selected @endif>Less Then</option>
                                 <option value="less_then_equel" @if($oparation=='less_then_equel' ) selected @endif>Less Then Equal</option>
                              </select>

                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="fname">Stock Center:</label>
                              <select name="Stock_center" class="form-control">
                                 <option value="">--select--</option>
                                 @foreach($allstockcenter->unique('Status') as $center)
                                 <option value="{{$center->Status}}" @if($sstock==$center->Status) selected @endif>{{$center->Status}}</option>
                                 @endforeach
                              </select>
                              @error('Stock_center')
                              <div style="color:red">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-3 mt-4">
                           <div class="form-group">
                              <button class="btn-sm btn-primary">Search</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered">
                        <thead class="text-center">
                           <tr>
                              <th>ItemName</th>
                              <th>Unit</th>
                              <th>Stock</th>
                           </tr>
                        </thead>

                        <tbody class="text-center">
                           @if(isset($newdata))
                           @foreach($newdata as $rdata)

                           @if($oparation=='equal_to')
                           @if($mainqty == $rdata->sum('StockQty'))
                           <tr>
                              <td>{{$rdata->first()->ItemName}}</td>
                              <td>{{$rdata->first()->Unit}}</td>
                              <td>{{$rdata->sum('StockQty')}}</td>

                           </tr>
                           @endif
                           @elseif($oparation == 'greater_then')
                           @if($mainqty < $rdata->sum('StockQty'))
                              <tr>
                                 <td>{{$rdata->first()->ItemName}}</td>
                                 <td>{{$rdata->first()->Unit}}</td>
                                 <td>{{$rdata->sum('StockQty')}}</td>

                              </tr>
                              @endif
                              @elseif($oparation=='greater_then_quel')
                              @if($mainqty <= $rdata->sum('StockQty'))
                                 <tr>
                                    <td>{{$rdata->first()->ItemName}}</td>
                                    <td>{{$rdata->first()->Unit}}</td>
                                    <td>{{$rdata->sum('StockQty')}}</td>

                                 </tr>
                                 @endif
                                 @elseif($oparation=='less_then')
                                 @if($mainqty > $rdata->sum('StockQty'))
                                 <tr>
                                    <td>{{$rdata->first()->ItemName}}</td>
                                    <td>{{$rdata->first()->Unit}}</td>
                                    <td>{{$rdata->sum('StockQty')}}</td>

                                 </tr>
                                 @endif
                                 @elseif($oparation=='less_then_equel')
                                 @if($mainqty >= $rdata->sum('StockQty'))
                                 <tr>
                                    <td>{{$rdata->first()->ItemName}}</td>
                                    <td>{{$rdata->first()->Unit}}</td>
                                    <td>{{$rdata->sum('StockQty')}}</td>

                                 </tr>
                                 @endif
                                 @endif
                                 @endforeach
                                 @endif
                        </tbody>
                        <tfoot>
                           <tr>
                              <td>Report Created at: {{$current}}</td>
                              <td></td>
                              <td>Report Created By: Demo User</td>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
               <div class="text-center">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection