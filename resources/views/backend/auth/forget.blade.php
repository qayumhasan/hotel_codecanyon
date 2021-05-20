@extends('layouts.login')
@section('contents')
<div class="row align-items-center justify-content-center h-100">
   <div class="col-12">
      <div class="row align-items-center">
         <div class="col-md-6 offset-md-3">
            <div class="card p-5">
               <h3 class="mb-2">Reset Password</h3>
               <form action="{{ route('admin.password.email') }}" method="post">
                  @csrf
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="floating-label form-group">
                           <input class="floating-input form-control" name="email" type="email" placeholder=" " required>
                           <label>Email</label>
                        </div>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Reset</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection