@extends('banquet.master')
@section('content')
@php
date_default_timezone_set("Asia/Dhaka");
$current = date("Y/m/d");
$caldate = date("Y-m-d");
@endphp
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Advance Booking Calender</h4>
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
 $( document ).ready(function() {   
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'get',
            url: "{{ route('admin.get.banquet.data') }}",
            data:$('#search_calender').serializeArray(),

            success: function(data) {
                
                console.log(data);

                var initialLocaleCode = 'en';
                var localeSelectorEl = document.getElementById('locale-selector');
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                    },
                    initialDate: '{{$caldate}}',
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