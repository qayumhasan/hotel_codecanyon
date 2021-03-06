@extends('housekipping.master')
@section('title', 'Item Issue Room Wise List | '.$companyinformation->company_name)
@section('content')
@php
date_default_timezone_set("Asia/Dhaka");
$date = date("Y/m/d");
$time = date("h:i");
date_default_timezone_set("Asia/Dhaka");
$current =date("Y/m/d");
$time = date("h:i");
@endphp

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <form id="item_issue_list" action="{{route('admin.housekeeping.distribution.items.issue.room.ajax.list')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-1 col-form-label"><b>From Date:</b></label>
                            <div class="col-sm-2">
                                <input class="form-control datepicker form-control-sm" name="from_date" type="text" value="{{$date}}">
                                <small class="text-danger from_date"></small>
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label"><b>To Date:</b></label>
                            <div class="col-sm-2">
                                <input class="form-control datepicker form-control-sm" name="to_date" type="text" value="{{$date}}">
                                <small class="text-danger to_date"></small>
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label"><b>Room:</b></label>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm" id="select_room_no" name="room_no">
                                    <option disabled selected>---Select A Room-----</option>
                                    @foreach($rooms as $row)
                                    <option value="{{$row->id}}">{{$row->room_no}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            </div>
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
                            <h4 class="card-title">Item Issue Room Wise List</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive room_ajax_data">
                            <table class="table table-bordered" id="old_data">
                                <thead>
                                    <tr>
                                        <th scope="col">Room No</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Remarks</th>
                                    </tr>
                                </thead>
                                @foreach($itemslists as $key=>$value)  
                                <tbody>
                                    <tr>
                                        <th scope="row" class="bg-light">{{$value->first()->room->room_no?? ''}}</th>
                                        <td class="bg-light">{{$value->first()->issue_date}}</td>
                                        <td class="bg-light">{{$value->first()->issuedby->username?? ''}}</td>
                                        <td class="bg-light">{{$value->first()->remarks}}</td>
                                    </tr>
                                    @php
                                        $qtycount = 0;
                                    @endphp
                                    @foreach($value as $row)
                                    <tr>
                                        @if($loop->first)
                                        <th  scope="row">Items - Qty - Unit</th>
                                        @else
                                        <th></th>
                                        @endif
                                        <td>{{$row->items->item_name?? ''}}</td>
                                        <td>{{$row->qty}}</td>
                                        <td>{{$row->unit->name?? ''}}</td>
                                        @php
                                            $qtycount = $qtycount + (int)$row->qty;
                                        @endphp
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="row"></th>
                                        <th scope="row">Total</th>
                                        <td colspan="2">{{$qtycount}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <button type="button" class="btn-sm btn-info savepritbtn">Print </button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#select_room_no").select2({
        placeholder: '----Select Room No----'
    });
</script>

<script>
    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd',
    });
</script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('submit', '#item_issue_list', function(e) {
            e.preventDefault();
            document.querySelector('#old_data').remove();
            var url = $(this).attr('action');
            var type = $(this).attr('method');
            var request = $(this).serialize();
            $.ajax({
                url: url,
                type: type,
                data: request,
                success: function(data) {
                    console.log(data);
                    $('.room_ajax_data').append(data);
                },
                error: function(err) {
                    if (err.responseJSON.errors.to_date) {
                        $('.to_date').html(err.responseJSON.errors.to_date);
                    }

                    if (err.responseJSON.errors.from_date) {
                        $('.from_date').html(err.responseJSON.errors.from_date);
                    }
                }
            });
        });
    });
</script>

@endsection