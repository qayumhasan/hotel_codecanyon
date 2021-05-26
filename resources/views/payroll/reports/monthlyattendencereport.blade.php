@extends('payroll.master')
@section('content')
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between bg-header">
                  <div class="header-title">
                     <h4 class="card-title">Month Wise Attendence Report</h4>
                  </div>
               </div>
               <form action="{{route('payroll.monthly.attendence')}}" method="post">
                  @csrf
                  <div class="card-header">
                     <div class="row">
                        <div class="col-md-3">
                              <div class="form-group">
                              <label for="exampleInputEmail1">Year:</label>
                              <select name="year" class="form-control">
                                 @foreach(range(date('Y')-5, date('Y')) as $y)
                                    <option value="{{$y}}" @if(date('Y')==$y)selected @endif > {{$y}} </option>     
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
                     <table id="datatable" class="table data-table table-striped table-bordered" style="font-size:11px;" >
                        <thead class="text-center">
                           <tr>
                              <th>Employee</th>
                              <th>Jan</th>
                              <th>Feb</th>
                              <th>March</th>
                              <th>Apr</th>
                              <th>May</th>
                              <th>Jun</th>
                              <th>Jul</th>
                              <th>Aug</th>
                              <th>Sep</th>
                              <th>Oct</th>
                              <th>Nov</th>
                              <th>Dec</th>
                           </tr>
                        </thead>
                        <tbody class="text-center">

                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="card-header">
                  <div class="row"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection