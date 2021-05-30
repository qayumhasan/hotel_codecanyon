@extends('layouts.login')
@section('contents')
<div class="row align-items-center justify-content-center h-100">
   <div class="col-12">
      <div class="row align-items-center">
         <div class="col-md-6 offset-md-3">
            <div class="card p-5">
               <h3 class="mb-4">Sign In</h3>
               <form action="{{route('admin.login')}}" method="post">
                  @csrf
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="floating-label form-group">
                           <input name="email" class="floating-input form-control" type="text" placeholder=" ">
                           <label>Email</label>
                           @error('email')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-12 mt-2">
                        <div class="floating-label form-group">
                           <input name="password" class="floating-input form-control" type="password" placeholder=" ">
                           <label>Password</label>
                           @error('password')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="custom-control custom-checkbox mb-3">
                           <input type="checkbox" name="remember_me" class="custom-control-input" id="customCheck1">
                           <label class="custom-control-label" for="customCheck1">Remember Me</label>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <a href="{{url('admin/forget/password')}}" class="text-primary float-right">Forgot Password?</a>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Sign In</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection