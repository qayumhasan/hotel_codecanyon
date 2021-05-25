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
                        <div class="d-flex justify-content-center">
                           <div class="social-ic d-inline-flex rounded">
                              <a href="#"><i class="fab fa-facebook-f"></i></a>
                              <a href="#"><i class="fab fa-twitter"></i></a>
                              <a href="#"><i class="fab fa-youtube"></i></a>
                              <a href="#"><i class="fab fa-pinterest-p"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
          
            <div class="col-md-12">
            	
               <div class="card card-block card-stretch card-height">
                  <div class="card-header">
                     <div class="header-title">
                        <h4 class="card-title">Professional Skills</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <ul class="list-inline p-0 mb-0">
                        <li>
                           <div class="d-flex align-items-center justify-content-between mb-4 row">
                              <div class="col-lg-4">
                                 <p class="mb-0 font-size-16">Photoshop</p>
                              </div>
                              <div class="col-lg-8">
                                 <div class="iq-progress-bar bg-primary-light mt-2">
                                    <span class="bg-primary iq-progress progress-1" data-percent="85">
                                       <span class="progress-text-one bg-primary">85%</span>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li>
                           <div class="d-flex align-items-center justify-content-between mb-4 row">
                              <div class="col-lg-4">
                                 <p class="mb-0 font-size-16">Illustrator</p>
                              </div>
                              <div class="col-lg-8">
                                 <div class="iq-progress-bar bg-warning-light mt-2">
                                    <span class="bg-warning iq-progress progress-1" data-percent="65">
                                       <span class="progress-text-one bg-warning">65%</span>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li>
                           <div class="d-flex align-items-center justify-content-between mb-4 row">
                              <div class="col-lg-4">
                                 <p class="mb-0 font-size-16">Adobe XD</p>
                              </div>
                              <div class="col-lg-8">
                                 <div class="iq-progress-bar bg-success-light mt-2">
                                    <span class="bg-success iq-progress progress-1" data-percent="55">
                                       <span class="progress-text-one bg-success">55%</span>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li>
                           <div class="d-flex align-items-center justify-content-between row">
                              <div class="col-lg-4">
                                 <p class="mb-0 font-size-16">Figma</p>
                              </div>
                              <div class="col-lg-8">
                                 <div class="iq-progress-bar bg-info-light mt-2">
                                    <span class="bg-info iq-progress progress-1" data-percent="60">
                                       <span class="progress-text-one bg-info">60%</span>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
          
             </div>
             <!--  -->
           </div>
           <!--  -->
             <div class="col-md-6">
               <div class="card card-block card-stretch card-height">
                  <div class="card-header">
                     <div class="header-title">
                        <h4 class="card-title">Personal Details</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <ul class="list-inline p-0 m-0">
                        <li class="mb-3">
                           <div class="d-flex align-items-center">
                              <!-- <div class="badge badge-primary iq-number">1</div> -->
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
                        <li class="">
                           <div class="d-flex align-items-center">
                              <div class="ml-4">
                                 <p class="mb-0 font-size-16">Family Contact Number: {{$data->family_mobile_number}}</p>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="card card-block card-stretch card-height">
                  <div class="card-header">
                     <div class="header-title">
                        <h4 class="card-title">Contact Information</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <ul class="list-inline p-0 m-0 iq-contact-rest">
                        <li class="mb-3 d-flex">
                           <span><i class="fas fa-map-marker-alt mr-3 font-size-20"></i></span>
                           <p class="mb-0 font-size-16 line-height">{{$data->present_address}}</p>
                        </li>
                        <!-- <li class="mb-3 d-flex">
                           <span><i class="fas fa-phone-volume mr-3 font-size-20"></i></span>
                           <p class="mb-0 font-size-16 line-height"></p>
                        </li> -->
                        <li class="mb-3 d-flex">
                           <span><i class="fas fa-envelope-open mr-3 font-size-20"></i></span>
                           <p class="mb-0 font-size-16 line-height">john@property.com</p>
                        </li>
                        <li class="mb-3 d-flex">
                           <a href="javascript:void(0);" class="d-flex">
                              <i class="fas fa-link  mr-3 font-size-20"></i>
                              <p class="mb-0 font-size-16 line-height">http://www.yourwebsitename.com </p>
                           </a>
                        </li>
                        <li class="d-flex">
                           <span><i class="fas fa-briefcase mr-3 font-size-20"></i></span>
                           <p class="mb-0 font-size-16 line-height">9486 Roberts St.
                              Monroe Township.</p>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
        </div>
    </div>
</div>


@endsection