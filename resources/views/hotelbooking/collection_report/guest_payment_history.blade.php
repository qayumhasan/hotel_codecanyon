@extends('hotelbooking.master')
@section('title', 'Guest Payment History | '.$companyinformation->company_name)
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-1 col-form-label"><b>Guest:</b></label>
                            <div class="col-sm-5">
                                <select class="form-control form-control-sm guest_name select_room_no" id="guest_name select_room_no">
                                    <option disabled selected>---- Select A Guest Name ----</option>
                                    @foreach($guests as $row)
                                    <option value="{{$row->id}}">{{$row->guest_name}}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger from_date"></small>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="row printableAreasaveprint">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between bg-header">
                        <div class="header-title">
                            <h4 class="card-title">Guest Payment History</h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive guest_ajax_data">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Guest Name</th>
                                        <th scope="col">Done By</th>
                                        <th scope="col">Debt</th>
                                        <th scope="col">Paid</th>
                                        <th scope="col">Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($checkinguests as $row)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$row->checkin_date}}</td>
                                        <td>{{$row->guest_name}}</td>
                                        <td>{{$row->admin->username ?? ''}}</td>
                                        <td>{{round($row->gross_amount ?? '',2)}}</td>
                                        <td>{{$row->voucher_amount}}</td>
                                        <td>{{round($row->outstanding_amount,2)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- preloader area start -->
                        <section id="preloader">
                            <div class="preloader">
                                <h3 class="text-center">Loading</h3>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <button type="button" class="btn-sm btn-info savepritbtn">Print</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

<script>
    $(document).ready(function(){
        $('.preloader').hide();
        $('.guest_name').change(function(e){
            $('.guest_ajax_data').empty();
                var guestID = e.currentTarget.value;
                $.ajax({
                type: 'GET',
                url: "{{ route('admin.guest.payment.history.ajax') }}",
                data: {
                    guestid:guestID,
                },
                success: function(data) {
                    $('.preloader').hide();
                    $('.guest_ajax_data').append(data);
                }
            });
        })
    });
</script>
<script>
    $(document).ready(function(){
        $(".select_room_no").select2({
        placeholder: '----Select Room No----'
    });
    });
</script>
@endsection