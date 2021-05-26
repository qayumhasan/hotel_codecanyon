@extends('hotelbooking.master')
@section('title', 'Day By Day Report | '.$companyinformation->company_name)
@section('content')
@php
date_default_timezone_set("Asia/Dhaka");
$current =date("Y-m-d");
@endphp

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between bg-header">
                        <div class="header-title">
                            <h4 class="card-title">Searching Room By Room Type</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        @php
                        $firstYear = (int)date('Y')-20;
                        $lastYear = $firstYear + 20;

                        @endphp
                        <form id="search_calender">

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-1 col-form-label">Room Type</label>
                                <div class="col-sm-4">
                                    <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="room_type">
                                        <option selected disabled>--Room Type---</option>
                                        @foreach($roomtypes as $row)
                                            <option value="{{$row->id}}">{{$row->room_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="inputPassword" class="col-sm-1 col-form-label">Year</label>
                                <div class="col-sm-4">
                                    <select class="form-control form-control-sm" id="exampleFormControlSelect2" name="year">
                                        
                                        @for($i=$firstYear;$i<=$lastYear;$i++) <option {{(int)date('Y') == $i ?'selected':''}} value="{{$i}}">{{$i}}</option>
                                     @endfor
                                    </select>
                                </div>
                                <button type="button" id="searchbtn" class=" col-sm-2 btn btn-primary">Search</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between  bg-header">
                        <div class="header-title">
                            <h4 class="card-title">Advance Booking Day By Day Calender</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id='top'>

                            Locales:
                            <select id='locale-selector'></select>

                        </div>

                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var searchbtn = document.querySelector('#searchbtn');
    searchbtn.addEventListener('click', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'get',
            url: "{{ url('/admin/advance/report/daybyday/') }}",
            data:$('#search_calender').serializeArray(),
            success: function(data) {
                var initialLocaleCode = 'en';
                var localeSelectorEl = document.getElementById('locale-selector');
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                    },
                    initialDate: '{{$current}}',
                    locale: initialLocaleCode,
                    buttonIcons: false, // show the prev/next text
                    weekNumbers: true,
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    dayMaxEvents: true, // allow "more" link when too many events
                    events:data.data,
                });
                calendar.render();
                // build the locale selector's options
                calendar.getAvailableLocaleCodes().forEach(function(localeCode) {
                    var optionEl = document.createElement('option');
                    optionEl.value = localeCode;
                    optionEl.selected = localeCode == initialLocaleCode;
                    optionEl.innerText = localeCode;
                    localeSelectorEl.appendChild(optionEl);
                });
                // when the selected option changes, dynamically change the calendar option
                localeSelectorEl.addEventListener('change', function() {
                    if (this.value) {
                        calendar.setOption('locale', this.value);
                    }
                });
            }
        });
    });
</script>
@endsection