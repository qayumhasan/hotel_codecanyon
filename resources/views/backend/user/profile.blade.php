@extends('layouts.admin')
@section('title', 'Profile | '.$companyinformation->company_name)
@section('content')
 <div class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="offset-lg-4 col-lg-4">
               <div class="card card-block p-card">
                  <div class="profile-box">
                     <div class="profile-card rounded">
                        <img src="{{asset('public/uploads/admin/'.$data->profile_photo_path	)}}" alt="profile-bg" class="avatar-100 rounded d-block mx-auto img-fluid mb-3">
                        <h3 class="font-600 text-white text-center mb-0">{{$data->name}}</h3>
                        <p class="text-white text-center mb-5">{{$data->userRole->role_name ?? ' '}}</p>
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
                           <p class="mb-0">{{$data->phone}}</p>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                           <div class="p-icon mr-3">
                              <i class="las la-map-marked"></i>
                           </div>
                           <p class="mb-0">{{$data->address}}</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </div>
    </div>
</div>


@endsection