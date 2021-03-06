@extends('hotelbooking.master')
@section('title', 'Pending Invoice Report | '.$companyinformation->company_name)
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
                            <h4 class="card-title">Pending Invoice Report</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive room_ajax_data">
                            <table id="datatable" class="table data-table table-striped table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>Row</th>
                                        <th>Booking No</th>
                                        <th>Room No</th>
                                        <th>In Date</th>
                                        <th>Guest Name</th>
                                        <th>Out Date</th>
                                        <th>Checkout By</th>
                                        <th>Create Invoice</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($checkouts as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->booking_no}}</td>
                                        <td>{{$row->checkin->room_no ?? ''}}</td>
                                        <td>{{$row->checkin->checkin_date ?? ''}}</td>
                                        <td>{{$row->checkin->guest_name ?? ''}}</td>
                                        <td>{{$row->checkout_date}}</td>
                                        <td>{{$row->user->username ?? ''}}</td>
                                        <td>
                                        <a class="badge bg-primary-light mr-2" data-toggle="tooltip" data-placement="top" href="{{route('admin.pending.invoice.report.create',$row->booking_no)}}" data-original-title="Create Invoice"><i class="lar la-edit"></i></a>
                                        </td>
                                        <td>
                                        <a id="delete" class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" href="{{route('admin.pending.invoice.report.delete',$row->booking_no)}}" data-original-title="Delete"> <i class="la la-trash"></i></a>
                                        </td>
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