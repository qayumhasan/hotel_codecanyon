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
                     <h4 class="card-title">Salary Details</h4>
                  </div>
               </div>
               <form action="{{route('payroll.salarydetails.reports')}}" method="post">
                  @csrf
                  <div class="card-header">
                     <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Month:</label>
                              <select name="month" class="form-control">
                                 <option value="January" @if($month=='January' ) selected @endif>January</option>
                                 <option value="February" @if($month=='February' ) selected @endif>February</option>
                                 <option value="March" @if($month=='March' ) selected @endif>March</option>
                                 <option value="April" @if($month=='April' ) selected @endif>April</option>
                                 <option value="May" @if($month=='May' ) selected @endif>May</option>
                                 <option value="June" @if($month=='June' ) selected @endif>June</option>
                                 <option value="July" @if($month=='July' ) selected @endif>July</option>
                                 <option value="August" @if($month=='August' ) selected @endif>August</option>
                                 <option value="September" @if($month=='September' ) selected @endif>September</option>
                                 <option value="Octobar" @if($month=='Octobar' ) selected @endif>Octobar</option>
                                 <option value="November" @if($month=='November' ) selected @endif>November</option>
                                 <option value="December" @if($month=='December' ) selected @endif>December</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Year:</label>
                              <select name="year" class="form-control">
                                 @foreach(range(date('Y')-5, date('Y')) as $y)
                                 <option value="{{$y}}" @if($year==$y)selected @endif> {{$y}} </option>
                                 @endforeach
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
                              <th>Employee Id</th>
                              <th>Name</th>
                              <th>Designation</th>
                              <th>Net Salary</th>
                           </tr>
                        </thead>
                        <tbody class="text-center">
                           @foreach($alldata as $data)
                           <tr>
                              <td>{{$data->employee_user_id}}</td>
                              <td>{{$data->name}}</td>
                              <td>{{$data->designation}}</td>
                              <td>{{$data->gross_salary}}</td>
                           </tr>
                           @endforeach
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