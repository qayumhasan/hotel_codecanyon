@extends('hotelbooking.master')
@section('title', 'Guest Arrival Summery | '.$companyinformation->company_name)
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
                <div class="card printableAreasaveprint">
                    <div class="card-header d-flex justify-content-between bg-header">
                        <div class="header-title">
                            <h4 class="card-title">Guest Arrival Summery</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive room_ajax_data">
                            <table id="datatable" class="table data-table table-striped table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>Row</th>
                                        <th>Guest</th>
                                        <th>Source</th>
                                        <th>Arrived From</th>
                                        <th>Duration of Stay</th>
                                        <th>Arrival</th>
                                        <th>Departure On</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($checkins as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->guest_name}}</td>
                                        <td>{{$row->vehicle_type}}</td>
                                        <td>{{$row->city}}</td>
                                        <td>{{$row->additional_room_day}}</td>
                                        <td>{{$row->checkin_date}}</td>
                                        <td>{{$row->checkout->checkout_date ?? ''}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
<script>
    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd',
    });

</script>

<script>
    $("#select_room_no").select2({
        placeholder: '----Select Room No----'
    });
</script>

@endsection