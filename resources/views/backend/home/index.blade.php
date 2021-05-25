@extends('layouts.admin')
@section('title', 'Dashboard | '.$seo->meta_title)
@section('content')
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 mb-3">
            <div class="d-flex align-items-center justify-content-between welcome-content">
               <div class="navbar-breadcrumb">
                  <h4 class="mb-0">Welcome To Dashboard</h4>
               </div>
            </div>
         </div>
         <!--  -->
         <div class="col-md-6 col-lg-3">
            <div class="card card-block card-stretch card-height bg-success rounded">
               <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                     <div class="icon iq-icon-box rounded iq-bg-success rounded shadow" data-wow-delay="0.2s"> <i class="fa fa-bed" aria-hidden="true"></i>
                     </div>
                     <div class="iq-text">
                        <h6 class="text-white">Available Room</h6>
                        <h3 class="text-white">{{$availableRoom}}</h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-md-6 col-lg-3">
            <div class="card card-block card-stretch card-height bg-primary rounded">
               <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                     <div class="icon iq-icon-box rounded iq-bg-primary rounded shadow" data-wow-delay="0.2s"> <i class="fa fa-bed" aria-hidden="true"></i>
                     </div>
                     <div class="iq-text">
                        <h6 class="text-white">Housekeeping Room</h6>
                        <h3 class="text-white">{{$houseKippingRoom}}</h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3">
            <div class="card card-block card-stretch card-height bg-warning rounded">
               <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                     <div class="icon iq-icon-box rounded iq-bg-warning rounded shadow" data-wow-delay="0.2s"> <i class="fa fa-bed" aria-hidden="true"></i>
                     </div>
                     <div class="iq-text">
                        <h6 class="text-white">Maintenance Room</h6>
                        <h3 class="text-white">{{$maintanceRoom}}</h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3">
            <div class="card card-block card-stretch card-height bg-danger rounded">
               <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                     <div class="icon iq-icon-box rounded iq-bg-danger rounded shadow" data-wow-delay="0.2s"><i class="fa fa-bed" aria-hidden="true"></i>
                     </div>
                     <div class="iq-text">
                        <h6 class="text-white">Booking Room</h6>
                        <h3 class="text-white">{{$bookingRoom}}</h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--  -->
         <div class="col-md-6 col-lg-3">
            <div class="card card-block card-stretch card-height">
               <div class="card-body bg-primary-light rounded">
                  <div class="d-flex align-items-center justify-content-between">
                     <div class="rounded iq-card-icon bg-primary"><i class="fa fa-users" aria-hidden="true"></i>
                     </div>
                     <div class="text-right">
                        <h2 class="mb-0"><span class="counter">{{$employee}}</span></h2>
                        <h5 class="">Employee</h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3">
            <div class="card card-block card-stretch card-height">
               <div class="card-body bg-warning-light rounded">
                  <div class="d-flex align-items-center justify-content-between">
                     <div class="rounded iq-card-icon bg-warning"><i class="fa fa-user" aria-hidden="true"></i>
                     </div>
                     <div class="text-right">
                        <h2 class="mb-0"><span class="counter">{{$user}}</span></h2>
                        <h5 class="">User</h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3">
            <div class="card card-block card-stretch card-height">
               <div class="card-body bg-danger-light rounded">
                  <div class="d-flex align-items-center justify-content-between">
                     <div class="rounded iq-card-icon bg-danger"><i class="fa fa-user-circle" aria-hidden="true"></i>
                     </div>
                     <div class="text-right">
                        <h2 class="mb-0"><span class="counter">{{$supplier}}</span></h2>
                        <h5 class="">Supplier</h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3">
            <div class="card card-block card-stretch card-height">
               <div class="card-body bg-info-light rounded">
                  <div class="d-flex align-items-center justify-content-between">
                     <div class="rounded iq-card-icon bg-info"><i class="fa fa-user-secret" aria-hidden="true"></i>
                     </div>
                     <div class="text-right">
                        <h2 class="mb-0"><span class="counter">{{$guest}}</span></h2>
                        <h5 class="">Guest</h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!--  -->


         <div class="col-lg-12 d-flex flex-wrap">
            <div class="card card-block card-stretch card-height rounded">
               <div class="card-body">
                  <div class="row">
                     <div class="col-lg-12 mb-2 d-flex justify-content-between">
                        <h5 class="card-title">Latest Checkin</h5>
                     </div>
                     <div class="col-lg-12 mt-3 p-3">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th scope="col">SL</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">Phone/Mobile</th>
                                 <th scope="col">Checkin Date</th>
                                 <th scope="col">Expt. Checkout Date</th>
                              </tr>
                           </thead>
                           <tbody>
                           @foreach($checkins as $row)
                              <tr>
                                 <th scope="row">{{$loop->iteration}}</th>
                                 <td>{{$row->guest_name}}</td>
                                 <td>{{$row->mobile}}</td>
                                 <td>{{ \Carbon\Carbon::parse($row->checkin_date)->format('d M Y') }}</td>
                                 <td>{{ \Carbon\Carbon::parse($row->exp_checkin_date)->format('d M Y') }}</td>
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
      <!-- Page end  -->
   </div>
</div>
@endsection