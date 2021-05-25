@extends('layouts.admin')
@section('title', 'Profile | '.$companyinformation->company_name)
@section('content')
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-4">
            <div class="card card-block p-card">
               <div class="profile-box">
                  <div class="profile-card rounded">
                     <img src="{{asset('public/uploads/employee/'.$data->image)}}" alt="profile-bg" class="avatar-100 rounded d-block mx-auto img-fluid mb-3">
                     <h3 class="font-600 text-white text-center mb-0">{{$data->employee_name}}</h3>
                     <p class="text-white text-center mb-5">{{$data->present_designation}}</p>
                  </div>
                  <div class="pro-content rounded">
                     <div class="d-flex align-items-center mb-3">
                        <div class="p-icon mr-3">
                           <i class="las la-envelope-open-text"></i>
                        </div>
                        <p class="mb-0 eml">{{$data->email}}</p>
                     </div>
                     <div class="d-flex align-items-center mb-3">
                        <div class="p-icon mr-3">
                           <i class="las la-phone"></i>
                        </div>
                        <p class="mb-0">{{$data->mobile_number}}</p>
                     </div>
                     <div class="d-flex align-items-center mb-3">
                        <div class="p-icon mr-3">
                           <i class="las la-map-marked"></i>
                        </div>
                        <p class="mb-0">{{$data->district}}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-8">
            <div class="employee_info">
               <div class="card card-block card-stretch card-height">
                  <div class="card-header bg-header">
                     <div class="header-title">
                        <h4 class="card-title">Personal Details</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <ul class="list-inline p-0 m-0">
                        <li class="mb-3">
                           <div class="d-flex align-items-center">
                              <div class="ml-4">
                                 <p class="mb-0 font-size-16">Father Name: {{$data->father_name}}</p>
                              </div>
                           </div>
                        </li>
                        <li class="mb-3">
                           <div class="d-flex align-items-center">
                              <!-- <div class="badge badge-primary iq-number">2</div> -->
                              <div class="ml-4">
                                 <p class="mb-0 font-size-16">Mother Name: {{$data->mother_name}}</p>
                              </div>
                           </div>
                        </li>
                        <li class="mb-3">
                           <div class="d-flex align-items-center">

                              <div class="ml-4">
                                 <p class="mb-0 font-size-16">Gender: {{$data->gender}}</p>
                              </div>
                           </div>
                        </li>

                        <li class="mb-3">
                           <div class="d-flex align-items-center">

                              <div class="ml-4">
                                 <p class="mb-0 font-size-16">Date of Birth: {{$data->date_of_birth}}</p>
                              </div>
                           </div>
                        </li>
                        <li class="mb-3">
                           <div class="d-flex align-items-center">

                              <div class="ml-4">
                                 <p class="mb-0 font-size-16">Blood Group: {{$data->blood_group}}</p>
                              </div>
                           </div>
                        </li>
                        <li class="mb-3">
                           <div class="d-flex align-items-center">
                              <div class="ml-4">
                                 <p class="mb-0 font-size-16">Religion: {{$data->religion}}</p>
                              </div>
                           </div>
                        </li>
                        <li class="mb-3">
                           <div class="d-flex align-items-center">
                              <div class="ml-4">
                                 <p class="mb-0 font-size-16">Mobile: {{$data->mobile_number}}</p>
                              </div>
                           </div>
                        </li>
                        <li class="mb-3">
                           <div class="d-flex align-items-center">
                              <div class="ml-4">
                                 <p class="mb-0 font-size-16">Alternative Mobile: {{$data->family_mobile_number}}</p>
                              </div>
                           </div>
                        </li>
                        <li class="mb-3">
                           <div class="d-flex align-items-center">
                              <div class="ml-4">
                                 <p class="mb-0 font-size-16">Nationality: {{$data->nationality}}</p>
                              </div>
                           </div>
                        </li>
                        <li class="mb-3">
                           <div class="d-flex align-items-center">
                              <div class="ml-4">
                                 <p class="mb-0 font-size-16">Basic Salary: {{$data->present_salary}}</p>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>


@endsection