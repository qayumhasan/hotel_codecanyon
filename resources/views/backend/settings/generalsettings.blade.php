@extends('layouts.admin')
@section('title', 'General Settings | '.$companyinformation->company_name)
@section('content')
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body p-0">
                  <div class="iq-edit-list usr-edit">
                     <ul class="iq-edit-profile d-flex nav nav-pills">
                        <li class="col-md-2 p-0">
                           @if(Session::has('soft_success'))
                           <a class="nav-link" data-toggle="pill" href="#app-settings">App Settings</a>
                           @elseif(Session::has('logo_success'))
                           <a class="nav-link" data-toggle="pill" href="#app-settings">App Settings</a>
                           @elseif(Session::has('social_success'))
                           <a class="nav-link" data-toggle="pill" href="#app-settings">App Settings</a>
                           @elseif(Session::has('seo_success'))
                           <a class="nav-link" data-toggle="pill" href="#app-settings">App Settings</a>
                           @else
                           <a class="nav-link active" data-toggle="pill" href="#app-settings">App Settings</a>
                           @endif
                        </li>
                        <li class="col-md-2 p-0">
                           @if(Session::has('soft_success'))
                           <a class="nav-link" data-toggle="pill" href="#logo-settings">
                              Logo Settings
                           </a>
                           @elseif(Session::has('logo_success'))
                           <a class="nav-link active" data-toggle="pill" href="#logo-settings">
                              Logo Settings
                           </a>
                           @elseif(Session::has('social_success'))
                           <a class="nav-link" data-toggle="pill" href="#logo-settings">
                              Logo Settings
                           </a>
                           @elseif(Session::has('seo_success'))
                           <a class="nav-link" data-toggle="pill" href="#logo-settings">
                              Logo Settings
                           </a>
                           @else
                           <a class="nav-link" data-toggle="pill" href="#logo-settings">
                              Logo Settings
                           </a>
                           @endif
                        </li>
                        <li class="col-md-2 p-0">
                           @if(Session::has('soft_success'))
                           <a class="nav-link active" data-toggle="pill" href="#mail-settings">
                              Mail Settings
                           </a>
                           @elseif(Session::has('logo_success'))
                           <a class="nav-link" data-toggle="pill" href="#mail-settings">
                              Mail Settings
                           </a>
                           @elseif(Session::has('social_success'))
                           <a class="nav-link" data-toggle="pill" href="#mail-settings">
                              Mail Settings
                           </a>
                           @elseif(Session::has('seo_success'))
                           <a class="nav-link" data-toggle="pill" href="#mail-settings">
                              Mail Settings
                           </a>
                           @else
                           <a class="nav-link" data-toggle="pill" href="#mail-settings">
                              Mail Settings
                           </a>
                           @endif
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-12">
            <div class="iq-edit-list-data">
               <div class="tab-content">
                  @if(Session::has('soft_success'))
                  <div class="tab-pane fade" id="app-settings" role="tabpanel">
                     @elseif(Session::has('logo_success'))
                     <div class="tab-pane fade" id="app-settings" role="tabpanel">
                        @elseif(Session::has('social_success'))
                        <div class="tab-pane fade" id="app-settings" role="tabpanel">
                           @elseif(Session::has('seo_success'))
                           <div class="tab-pane fade" id="app-settings" role="tabpanel">
                              @else
                              <div class="tab-pane fade active show" id="app-settings" role="tabpanel">
                                 @endif
                                 <!-- app settings area start from here -->
                                 <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                       <div class="iq-header-title">
                                          <h4 class="card-title">App Information</h4>
                                       </div>
                                    </div>
                                    <div class="card-body">
                                       <form action="{{route('admin.settings.general.update')}}" method="post">
                                          @csrf
                                          <div class=" row align-items-center">
                                             <div class="form-group col-sm-6">
                                                <label for="fname">App Name :</label>
                                                <input type="text" class="form-control" name="company_name" id="fname" placeholder="Company Name" value="{{$companyinformation->company_name}}">
                                                <input type="hidden" name="id" value="{{$companyinformation->id}}">
                                             </div>

                                             <div class="form-group col-sm-6">
                                                <label for="lname">Mobile Number :</label>
                                                <input type="text" class="form-control" name="mobile" id="lname" placeholder="Mobile Number" value="{{$companyinformation->mobile}}">
                                             </div>
                                             <div class="form-group col-sm-6">
                                                <label for="uname">Email Id :</label>
                                                <input type="text" class="form-control" name="email" id="uname" placeholder="Email Id" value="{{$companyinformation->email}}">
                                             </div>
                                             <div class="form-group col-sm-6">
                                                <label for="uname">Fax :</label>
                                                <input type="text" class="form-control" name="fax" id="uname" placeholder="Fax" value="{{$companyinformation->fax}}">
                                             </div>
                                             <div class="form-group col-sm-6">
                                                <label for="cname">Address :</label>
                                                <textarea class="form-control" name="address" placeholder="Address">{{$companyinformation->address}}</textarea>
                                             </div>
                                          </div>
                                          <button type="submit" class="btn btn-primary mr-2">Update</button>
                                       </form>
                                    </div>
                                 </div>
                                 <!-- app settings area end here -->
                              </div>
                              @if(Session::has('soft_success'))
                              <div class="tab-pane fade" id="logo-settings" role="tabpanel">
                                 @elseif(Session::has('logo_success'))
                                 <div class="tab-pane fade active show" id="logo-settings" role="tabpanel">
                                    @elseif(Session::has('social_success'))
                                    <div class="tab-pane fade" id="logo-settings" role="tabpanel">
                                       @elseif(Session::has('seo_success'))
                                       <div class="tab-pane fade" id="logo-settings" role="tabpanel">
                                          @else
                                          <div class="tab-pane fade" id="logo-settings" role="tabpanel">
                                             @endif
                                             <!-- Logo settings area start from here -->
                                             <div class="card">
                                                <div class="card-header d-flex justify-content-between">
                                                   <div class="iq-header-title">
                                                      <h4 class="card-title">Logo</h4>
                                                   </div>
                                                </div>
                                                <div class="card-body">
                                                   <form action="{{route('admin.settings.logo.update')}}" method="post" enctype="multipart/form-data">
                                                      @csrf
                                                      <div class="form-group row">
                                                         <div class="col-md-4">
                                                            <input type="hidden" name="id" value="{{$logo->id}}">
                                                            <input type="file" class="custom-file-input" id="customFile" name="logo">
                                                            <label class="custom-file-label" for="customFile">Logo
                                                               (250px*60px)</label>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <img src="{{asset('public/uploads/logo/'.$logo->logo)}}" height="50px">
                                                            <input type="hidden" name="old_logo" value="{{$logo->logo}}">
                                                         </div>
                                                      </div>
                                                      <div class="form-group row">
                                                         <div class="col-md-4">
                                                            <input type="file" class="custom-file-input" id="customFile" name="favicon">
                                                            <label class="custom-file-label" for="customFile">Fav Icon
                                                               (16px*16px)</label>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <img src="{{asset('public/uploads/logo/'.$logo->favicon)}}" height="20px">
                                                            <input type="hidden" name="old_fav" value="{{$logo->favicon}}">
                                                         </div>
                                                      </div>
                                                      <div class="form-group row">
                                                         <button type="submit" class="btn btn-primary mr-2">Update</button>
                                                      </div>
                                                   </form>
                                                </div>
                                             </div>
                                             <!-- Logo settings area end here -->
                                          </div>
                                          @if(Session::has('soft_success'))
                                          <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                                             @elseif(Session::has('logo_success'))
                                             <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                                                @elseif(Session::has('social_success'))
                                                <div class="tab-pane fade active show" id="emailandsms" role="tabpanel">
                                                   @elseif(Session::has('seo_success'))
                                                   <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                                                      @else
                                                      <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                                                         @endif
                                                      </div>
                                                      @if(Session::has('soft_success'))
                                                      <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                                                         @elseif(Session::has('logo_success'))
                                                         <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                                                            @elseif(Session::has('social_success'))
                                                            <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                                                               @elseif(Session::has('seo_success'))
                                                               <div class="tab-pane fade active show" id="manage-contact" role="tabpanel">
                                                                  @else
                                                                  <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                                                                     @endif
                                                                  </div>
                                                                  @if(Session::has('soft_success'))
                                                                  <div class="tab-pane fade active show" id="mail-settings" role="tabpanel">
                                                                     @elseif(Session::has('logo_success'))
                                                                     <div class="tab-pane fade" id="mail-settings" role="tabpanel">
                                                                        @elseif(Session::has('social_success'))
                                                                        <div class="tab-pane fade" id="mail-settings" role="tabpanel">
                                                                           @elseif(Session::has('seo_success'))
                                                                           <div class="tab-pane fade" id="mail-settings" role="tabpanel">
                                                                              @else
                                                                              <div class="tab-pane fade" id="mail-settings" role="tabpanel">
                                                                                 @endif
                                                                                 <!-- Mail setting area start from here -->
                                                                                 <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                       <div class="card">
                                                                                          <div class="card-header d-flex justify-content-between">
                                                                                             <div class="iq-header-title">
                                                                                                <h4 class="card-title">
                                                                                                   Smtp</h4>
                                                                                             </div>
                                                                                          </div>
                                                                                          <div class="card-body">
                                                                                             <form action="{{route('admin.Smtp.update')}}" method="post">
                                                                                                @csrf
                                                                                                <div class=" row align-items-center">
                                                                                                   <div class="form-group col-sm-6">
                                                                                                      <label for="lname">Mail
                                                                                                         Host :</label>
                                                                                                      <input type="hidden" name="types[]" value="MAIL_HOST">
                                                                                                      <input type="text" class="form-control" name="MAIL_HOST" placeholder="Mail Host" value="{{ env('MAIL_HOST') }}">
                                                                                                   </div>
                                                                                                   <div class="form-group col-sm-6">
                                                                                                      <label for="uname">Mail
                                                                                                         Port :</label>
                                                                                                      <input type="hidden" name="types[]" value="MAIL_PORT">
                                                                                                      <input type="text" class="form-control" name="MAIL_PORT" value="{{ env('MAIL_PORT') }}" placeholder="Mail Port" required>
                                                                                                   </div>
                                                                                                   <div class="form-group col-sm-6">
                                                                                                      <label for="uname">Mail
                                                                                                         UserName
                                                                                                         :</label>
                                                                                                      <input type="hidden" name="types[]" value="MAIL_USERNAME">
                                                                                                      <input type="text" class="form-control" name="MAIL_USERNAME" value="{{ env('MAIL_USERNAME') }}" placeholder="Mail UserName" required>
                                                                                                   </div>
                                                                                                   <div class="form-group col-sm-6">
                                                                                                      <label for="cname">Mail
                                                                                                         Password
                                                                                                         :</label>
                                                                                                      <input type="hidden" name="types[]" value="MAIL_PASSWORD">
                                                                                                      <input type="text" class="form-control" name="MAIL_PASSWORD" value="{{ env('MAIL_PASSWORD') }}" placeholder="Mail Password" required>
                                                                                                   </div>
                                                                                                   <div class="form-group col-sm-6">
                                                                                                      <label for="cname">Mail
                                                                                                         Encryption
                                                                                                         :</label>
                                                                                                      <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">
                                                                                                      <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="{{ env('MAIL_ENCRYPTION') }}" placeholder="Mail Encription" required>
                                                                                                   </div>
                                                                                                   <div class="form-group col-sm-6">
                                                                                                      <label for="cname">Mail
                                                                                                         Form Name
                                                                                                         :</label>
                                                                                                      <input type="hidden" name="types[]" value="MAIL_FROM_NAME">
                                                                                                      <input type="text" class="form-control" name="MAIL_FROM_NAME" value="{{ env('MAIL_FROM_NAME') }}" placeholder="Mail Form Name" required>
                                                                                                   </div>
                                                                                                   <div class="form-group col-sm-6">
                                                                                                      <label for="cname">Mail
                                                                                                         Form Address
                                                                                                         :</label>
                                                                                                      <input type="hidden" name="types[]" value="MAIL_FROM_ADDRESS">
                                                                                                      <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" value="{{ env('MAIL_FROM_ADDRESS') }}" placeholder="Mail Form Address" required>
                                                                                                   </div>
                                                                                                </div>
                                                                                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                                                                             </form>
                                                                                          </div>
                                                                                       </div>
                                                                                    </div>
                                                                                 </div>
                                                                                 <!-- Mail setting area end here -->
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            @endsection