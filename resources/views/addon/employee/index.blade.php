@extends('layouts.admin')
@section('title', 'All Employee | '.$seo->meta_title)
@section('content')
 <div class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">All Employee</h4>
                     </div>
                     <span class="float-right mr-2">
                        <a href="{{route('admin.employee.create')}}" class="btn btn-sm bg-primary">
                           <i class="ri-add-fill"><span class="pl-1">Add New</span></i>
                        </a>
                     </span>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered" >
                           <thead>
                              <tr>
                                 <th>Employee Id</th>
                                 <th>Name</th>
                                 <th>Phone</th>
                                 <th>Email</th>
                                 <th>Image</th>
                                 <th>Manage</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($allemployee as $data)
                              <tr>
                                 <td>{{$data->employee_id}}</td>
                                 <td>{{$data->employee_name}}</td>
                                 <td>{{$data->mobile_number}}</td>
                                 <td>{{$data->email}}</td>
                                 <td>
                                    <img src="{{asset('public/uploads/employee/'.$data->image)}}" height="25px">
                                 </td>
                                 <td>
                                   <a class="badge bg-primary-light mr-2" href="{{url('admin/employee/edit/'.$data->id)}}"> <i class="lar la-edit"></i></a>
                                   <a id="delete" class="badge bg-danger-light mr-2" href="{{url('admin/employee/delete/'.$data->id)}}"> <i class="la la-trash"></i></a> 
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