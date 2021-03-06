@extends('hotelbooking.master')
@section('title', 'Daily Collection Report | '.$companyinformation->company_name)
@section('content')
@php
date_default_timezone_set("Asia/Dhaka");
$date = date("Y/m/d");
$time = date("h:i");
@endphp
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <form id="clean_duration_search">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-1 col-form-label"><b>From Date:</b></label>
                            <div class="col-sm-2">
                                <input class="form-control form-control-sm" id="datepickerdaly" name="from_date" type="text" value="{{$date}}">
                                <small class="text-danger from_date"></small>
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label"><b>To Date:</b></label>
                            <div class="col-sm-2">
                                <input class="form-control datepickernew form-control-sm" name="to_date" type="text" value="{{$date}}">
                                <small class="text-danger to_date"></small>
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label"><b>Cashier:</b></label>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm" name="employee">
                                    <option selected disabled>---Select A Employee---</option>
                                    @foreach($employees as $row)
                                    <option value="{{$row->id}}">{{$row->username}}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger employee"></small>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary mb-2">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card printableAreasaveprint">
                    <div class="card-header d-flex justify-content-between bg-header">
                        <div class="header-title">
                            <h4 class="card-title">Daily Collection Report</h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive room_ajax_data">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="row">SL</th>
                                        <th>Date</th>
                                        <th>Number</th>
                                        <th>Guest</th>
                                        <th>Room</th>
                                        <th>Mode</th>
                                        <th>Cashier</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($collectionreports) > 0)
                                    @foreach($collectionreports as $row)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$row->TransectionDate}}</td>
                                        <td>{{$row->voucherNo}}</td>
                                        <td>{{$row->guest_name}}</td>
                                        <td>{{$row->room_no}}</td>
                                        <td>{{$row->voucher_type}}</td>
                                        <td>{{$row->admin->username ?? '' }}</td>
                                        <td>{!!$currency->symbol ?? ' '!!} {{abs($row->TransectionAmount)}}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="9" class="text-center">No Data Found!</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- preloader area start -->
                        <section id="preloader">
                            <div class="preloader">
                                <h3 class="text-center">Loading</h3>
                            </div>
                        </section>
                        <!-- preloader area end -->
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
    $('.datepicker').datepicker({
        format: 'mm-dd-yyyy',
    });
</script>
<script>
    $("#select_room_no").select2({
        placeholder: '----Select Room No----'
    });
</script>
<script>
    $(document).ready(function() {
        $('.preloader').hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('submit', '#clean_duration_search', function(e) {
            e.preventDefault();
            $('.preloader').show();
            $('.room_simple_data').hide();
            $('.room_ajax_data').empty();
            $.ajax({
                type: 'GET',
                url: "{{ route('admin.daily.collection.ajax.report') }}",
                data: $('#clean_duration_search').serializeArray(),
                success: function(data) {
                    $('.preloader').hide();
                    $('.room_ajax_data').append(data);
                },
                error: function(err) {
                    $('.preloader').hide();
                    if (err.responseJSON.errors.employee) {
                        $('.employee').html(err.responseJSON.errors.employee[0]);
                    }
                    if (err.responseJSON.errors.to_date) {
                        $('.to_date').html(err.responseJSON.errors.to_date[0]);
                    }
                    if (err.responseJSON.errors.from_date) {
                        $('.from_date').html(err.responseJSON.errors.from_date[0]);
                    }
                }
            });
        });
    });
</script>
@endsection