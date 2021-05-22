@extends('accounts.master')
@section('title', 'Check Book| '.$seo->meta_title)
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
          
       
            <div class="col-md-12">
              
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Cheque Book</h4>
                        </div>
                    </div>
                </div>
                <form action="{{route('admin.transection.create')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm shadow-showcase">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Bank Name:</label>
                                            <div class="col-sm-10">
                                                <select name="bank_code" id="bank_code" class="form-control">
                                                    @foreach($allbankaccount as $bank)
                                                    <option value="{{$bank->id}}">{{$bank->desription_of_account}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                        <button type="button" id="show_existing_book" class="btn btn-info">Show Existring Book</button>
                                        <button type="button" id="add_new_book" class="btn btn-info">Add New Book</button>
                                     </div>
                                </div>
                            </div>
                         </div>
                        <div class="card shadow-sm shadow-showcase">
                            <div class="card-body">
                                <div class="row" id="allcheckbook">
                                
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                                <div class="row" id="showalldata">
                                
                                </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                       
                    </div>
                </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
     $("#bank_code").on('change', function(){
        $("#showalldata").html("");
           
       
    });
 });
</script>  
<script type="text/javascript">
  $(document).ready(function() {
     $("#add_new_book").on('click', function(){
        var bank_code= $("#bank_code").val();

        if(bank_code) {
             $.ajax({
                 url: "{{  url('/get/account/checkbook/entry/') }}/"+bank_code,
                 type:"GET",
                
                 success:function(data) {
                    $("#showalldata").html("");
                    $("#allcheckbook").html(data);
                     
                }
             });
         } else {
           
         }
            
           
       
    });
 });
</script>  
<script type="text/javascript">
  $(document).ready(function() {
     $("#show_existing_book").on('click', function(){
        var bank_code= $("#bank_code").val();
     
        if(bank_code) {
             $.ajax({
                 url: "{{  url('/get/account/status/bankentry/all') }}/"+bank_code,
                 type:"GET",
                
                 success:function(data) {
                   
                    $("#allcheckbook").html(data);
                     
                }
             });
         } else {
           
         }
            
           
       
    });
 });
</script> 


    
@endsection
