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
                     <h4 class="card-title">All Employee</h4>
                  </div>
               </div>
               <form action="{{route('payroll.employee.selary.create')}}" method="post">
                  @csrf
                  <div class="card-header">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Month:</label>
                              {{date('F')}}
                              <select name="month" class="form-control">
                                 <option value="January" @if(date('F')=='January' ) selected @endif>January</option>
                                 <option value="February" @if(date('F')=='February' ) selected @endif>February</option>
                                 <option value="March" @if(date('F')=='March' ) selected @endif>March</option>
                                 <option value="April" @if(date('F')=='April' ) selected @endif>April</option>
                                 <option value="May" @if(date('F')=='May' ) selected @endif>May</option>
                                 <option value="June" @if(date('F')=='June' ) selected @endif>June</option>
                                 <option value="July" @if(date('F')=='July' ) selected @endif>July</option>
                                 <option value="August" @if(date('F')=='August' ) selected @endif>August</option>
                                 <option value="September" @if(date('F')=='September' ) selected @endif>September</option>
                                 <option value="Octobar" @if(date('F')=='Octobar' ) selected @endif>Octobar</option>
                                 <option value="November" @if(date('F')=='November' ) selected @endif>November</option>
                                 <option value="December" @if(date('F')=='December' ) selected @endif>December</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Year:</label>
                              <select name="year" class="form-control">
                                 @foreach(range(date('Y')-5, date('Y')) as $y)
                                 <option value="{{$y}}" @if(date('Y')==$y)selected @endif> {{$y}} </option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Generate Date:</label>
                              <input type="text" name="date" class="form-control datepicker" id="exampleInputEmail1" value="{{$current}}">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered" style="font-size:11px;">
                           <thead class="text-center">
                              <tr>
                                 <th>Profile</th>
                                 <th>Employee Id</th>
                                 <th>Name</th>
                                 <th>Department</th>
                                 <th>Designation</th>
                                 <th>Mode Of Payment</th>
                                 <th>Total Days</th>
                                 <th>No.of Working Days</th>
                                 <th>Guaranteed Leave</th>
                                 <th>Over-Time(Days)</th>
                                 <th>Leave</th>
                              </tr>
                           </thead>
                           <tbody class="text-center">
                              @foreach($allemployee as $key => $data)
                              <tr>
                                 <input type="hidden" name="id[]" value="{{$data->id}}">
                                 <td>
                                    <img src="{{asset('public/uploads/employee/'.$data->image)}}" height="35px">
                                 </td>
                                 <td>{{$data->employee_id}}
                                    <input type="hidden" name="employee_user_id[]" value="{{$data->employee_id}}">
                                    <input type="hidden" name="name[]" value="{{$data->employee_name}}">
                                    <input type="hidden" name="designation[]" value="{{$data->present_designation}}">
                                 </td>
                                 <td>{{$data->employee_name}}</td>
                                 <td>{{$data->employee_type}}</td>
                                 <td>{{$data->present_designation}}</td>
                                 <td>
                                    <select class="form-control" name="mode_of_payment[]" style="margin:0 auto;">
                                       <option value="212-28-0040-0072">ACCOUNTS PAYABLE - SALARY & ALLOWANCE</option>
                                    </select>
                                 </td>
                                 <td><input type="hidden" id="totaldays{{$data->id}}" name="totaldays[]" value="30">
                                    30
                                 </td>
                                 <input type="hidden" name="salary[]" value="{{$data->present_salary}}">
                                 <td><input type="number" name="working_days[]" class="form-control wdays working_days{{$data->id}}" id="{{$data->id}}" style="margin:0 auto;" value="0"></td>
                                 <td><input type="number" name="guaranteed_leave[]" class="form-control guaranteed guaranteed_leave{{$data->id}}" id="{{$data->id}}" style="margin:0 auto;" value="0"></td>
                                 <td><input type="number" name="overtime[]" class="form-control overtime over_time{{$data->id}}" id="{{$data->id}}" style="margin:0 auto;" value="0"></td>
                                 <td>
                                    <span id="leave{{$data->id}}" class="leave"> </span>
                                    <input type="hidden" name="leave_days[]" class="leavval{{$data->id}}" id="leavval{{$data->id}}" value="0">
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="card-header">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <button type="submit" class="btn btn-success">Submit</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function() {
      $('.wdays').on('keyup', function(e) {
         var id = e.target.id;
         var totaldays = $('#totaldays' + id).val();
         var workingdays = $('.working_days' + id).val();
         var leave = totaldays - workingdays;
         var leavedata = $('#leave' + id).html(leave);
         $('#leavval' + id).val(leave);
      });
      $('.guaranteed').on('keyup', function(e) {
         //alert("ok");
         var id = e.target.id;
         var granted_val = $(this).val();
         var workingdays = $('.working_days' + id).val();
         var totaldays = $('#totaldays' + id).val();
         var mainleaeve = totaldays - workingdays;
         var newleaveval = mainleaeve - granted_val;
         $('#leave' + id).html(newleaveval);
         $('#leavval' + id).val(newleaveval);
      });
      $('.overtime').on('keyup', function(e) {
         var id = e.target.id;
         var workingdays = $('.working_days' + id).val();
         var totaldays = $('#totaldays' + id).val();
         var granted_val = $('.guaranteed_leave' + id).val();
         var present = parseInt(workingdays) + parseInt(granted_val);
         var mainovertime = parseInt(totaldays) - parseInt(present);
         var over_time = $(this).val();
         var mainov = parseInt(mainovertime) - parseInt(over_time);
         //alert(mainov);
         $('#leave' + id).html(mainov);
         $('#leavval' + id).val(mainov);

      });
   });
</script>
@endsection