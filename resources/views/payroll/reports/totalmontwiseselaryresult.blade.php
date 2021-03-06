@extends('payroll.master')
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
                     <h4 class="card-title">Employee Wise Salary</h4>
                  </div>
               </div>
               <form action="{{route('payroll.emloyeemonthwiseselary.reports')}}" method="post">
                  @csrf
                  <div class="card-header">
                     <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Employee Name:</label>
                              <select name="employee_id" class="form-control">
                                 @if($employee_id)
                                 <option value="">--select--</option>
                                 @foreach($allemployee as $employee)
                                 <option value="{{$employee->id}}" @if($employee_id==$employee->id) selected @endif> {{ $employee->employee_name }} </option>
                                 @endforeach
                                 @else
                                 <option value="">--select--</option>
                                 @foreach($allemployee as $employee)
                                 <option value="{{$employee->id}}"> {{ $employee->employee_name }} </option>
                                 @endforeach
                                 @endif

                              </select>
                              @error('employee_id')
                              <div style="color:red">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Year:</label>
                              <select name="year" class="form-control">
                                 @if($year=='all')
                                 <option value="all">All</option>
                                 @foreach(range(date('Y')-5, date('Y')) as $y)
                                 <option value="{{$y}}" @if($year==$y) selected @endif> {{$y}} </option>
                                 @endforeach
                                 @else
                                 <option value="all">All</option>
                                 @foreach(range(date('Y')-5, date('Y')) as $y)
                                 <option value="{{$y}}"> {{$y}} </option>
                                 @endforeach
                                 @endif
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group mt-4">
                              <label for=""></label>
                              <button class="btn btn-primary" type="submit">view</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="datatable" class="table data-table table-striped table-bordered" style="font-size:11px;">
                        <thead class="text-center">
                           <tr>
                              <th>Month</th>
                              <th>Year</th>
                              <th>Employee Id</th>
                              <th>Name</th>
                              <th>Designation</th>
                              <th>Mode Of Payment</th>
                              <th>No.of Working Days</th>
                              <th>Guaranteed Leave</th>
                              <th>Over-Time(Days)</th>
                              <th>Leave</th>
                              <th> Salary</th>
                              <th>Deduct Leave Salary</th>
                              <th>Gross Salary</th>
                           </tr>
                        </thead>
                        <tbody class="text-center">
                           @if($alldata->count() > 0)
                           @foreach($alldata as $data)
                           <tr>
                              <td>{{$data->month}}</td>
                              <td>{{$data->year}}</td>
                              <td>{{$data->employee_user_id}}</td>
                              <td>{{$data->name}}</td>
                              <td>{{$data->designation}}</td>
                              <td>{{$data->mode_of_payment}}</td>
                              <td>{{$data->number_of_working_days}}</td>
                              <td>{{$data->guaranteed_leave}}</td>
                              <td>{{$data->overtime}}</td>
                              <td>{{$data->leave}}</td>
                              <td>{{$data->salary}}</td>
                              <td>{{round($data->salary - $data->gross_salary,2)}}</td>
                              <td>{{ round($data->gross_salary,2) }}</td>
                           </tr>
                           @endforeach
                           @else
                           <p>No Data Found</p>
                           @endif
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="card-header">
                  <div class="row">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection