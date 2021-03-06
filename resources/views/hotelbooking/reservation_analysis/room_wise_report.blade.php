@extends('hotelbooking.master')
@section('title', 'Reservation Analysis Report | '.$companyinformation->company_name)
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
                            <h4 class="card-title">Reservation Room Wise Analysis</h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive room_ajax_data">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Rooms</th>
                                        <th scope="col">Total No Of Booking</th>
                                        <th scope="col">Total Night</th>
                                        <th scope="col">Avg. Night/Booking</th>
                                        <th scope="col">Total Guests</th>
                                        <th scope="col">Accom. Revenue</th>
                                        <th scope="col">Avg. Nights</th>
                                        <th scope="col">Avg. Booking</th>
                                        <th scope="col">Total Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $booking_number = 0;
                                    $total_night = 0;
                                    $avgnight = 0;
                                    $no_of_guest = 0;
                                    $accumo_revenue = 0;
                                    $avg_night = 0;
                                    $avg_booking = 0;
                                    $total_revenue = 0;
                                    @endphp
                                    @if(count($rooms) > 0)
                                    @foreach($rooms as $row)
                                    <tr>
                                        <td>{{$row->room_no}}</td>
                                        <td>{{$row->NumberOfBooking}}</td>
                                        <td>{{$row->NumberOfNight}}</td>
                                        @if($row->NumberOfNight != 0)
                                        <td>{{round($row->NumberOfNight / $row->NumberOfBooking,2)}}</td>
                                        @else
                                        <td>0</td>
                                        @endif
                                        <td>{{$row->numberofguest}}</td>
                                        <td>{{$row->totalrevenues}}</td>
                                        @if($row->NumberOfNight != 0)
                                        <td>{{round($row->totalrevenues/$row->NumberOfNight,2)}}</td>
                                        @else
                                        <td>0</td>
                                        @endif
                                        @if($row->NumberOfBooking != 0)
                                        <td>{{round($row->totalrevenues/$row->NumberOfBooking,2)}}</td>
                                        @else
                                        <td>0</td>
                                        @endif
                                        <td>{{$row->totalrevenues}}</td>
                                    </tr>
                                    @php
                                    $booking_number = $booking_number + $row->NumberOfBooking;
                                    $total_night = $total_night + $row->NumberOfNight;
                                    if($row->NumberOfNight !=0){
                                    $avgnight = $avgnight + round($row->NumberOfNight / $row->NumberOfBooking,2);
                                    }else{
                                    $avgnight = $avgnight + 0;
                                    }
                                    $no_of_guest = $no_of_guest + $row->numberofguest;
                                    $accumo_revenue = $accumo_revenue + $row->totalrevenues;
                                    if($row->NumberOfNight !=0){
                                    $avg_night = $avg_night + round($row->totalrevenues/$row->NumberOfNight,2);
                                    }else{
                                    $avg_night = $avg_night + 0;
                                    }
                                    if($row->NumberOfBooking !=0){
                                    $avg_booking = $avg_booking + round($row->totalrevenues/$row->NumberOfBooking,2);
                                    }else{
                                    $avg_booking = $avg_booking + 0;
                                    }
                                    $total_revenue = $total_revenue + $row->totalrevenues;
                                    @endphp
                                    @endforeach
                                    @endif
                                    <tr>
                                        <th>Total</th>
                                        <th>{{$booking_number}}</th>
                                        <th>{{$total_night}}</th>
                                        <th>{{$avgnight}}</th>
                                        <th>{{$no_of_guest}}</th>
                                        <th>{!!$currency->symbol ?? ' '!!} {{$accumo_revenue}}</th>
                                        <th>{{$avg_night}}</th>
                                        <th>{{$avg_booking}}</th>
                                        <th>{!!$currency->symbol ?? ' '!!} {{$total_revenue}}</th>
                                    </tr>
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
@endsection
