@extends('housekipping.master')
@section('title', 'House Keeping Report | '.$seo->meta_title)
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
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <label for="inputPassword" class="col-sm-2 col-form-label text-right">Search By Room Type :</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm" id="room_type">
                                <option selected disabled>---Room Type----</option>
                                @foreach($roomtypes as $row)
                                <option value="{{$row->id}}">{{$row->room_type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card printableAreasaveprint">
                    <div class="card-header d-flex justify-content-between bg-header">
                        <div class="header-title">
                            <h4 class="card-title">All House Keeping Report</h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive room_ajax_data">
                            <table class="table table-striped table-bordered room_simple_data">
                                <thead class="text-center">
                                    <tr>
                                        <th>Room</th>
                                        <th>Room Type</th>
                                        <th>Status</th>
                                        <th>Availability</th>
                                        <th>Last Log</th>
                                        <th>Log Date</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @if(count($rooms) > 0)
                                    @foreach($rooms as $room)
                                    <tr>
                                        <td>{{$room->room_no}}</td>
                                        <td>{{$room->roomtype->room_type?? ''}}</td>
                                        <td>{{$room->housekeepingreport->keeping_status?? ''}}</td>
                                        @if($room->room_status == 3)
                                        <td class="bg_red">Booked</td>
                                        @elseif($room->room_status == 2)
                                        <td class="bg-navyblue">House Keeping</td>
                                        @elseif($room->room_status == 1)
                                        <td class="bg-green">Available</td>
                                        @elseif($room->room_status == 4)
                                        <td class="bg-yellow">Maintenance</td>
                                        @endif
                                        <td>{{$room->housekeepingreport->remarks?? ''}}</td>
                                        <td>{{$room->housekeepingreport->log_date ?? ''}}</td>
                                        <td>{{$room->housekeepingreport->keeping_name?? ''}}</td>
                                        <td>
                                            <a class="badge bg-primary-light mr-2 editmodal" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$room}}"><i class="lar la-edit"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- preloader area start -->
                        <section id="preloader">
                            <div class="preloader">
                                <h2>Loading</h2>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">House Keeping Update new</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.housekepping.update')}}" method="post">
                @csrf
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Room No:</label>
                        <div class="col-sm-10">
                            <b id="room_no"></b>
                            <input type="hidden" required name="room_id" id="room_id">
                            <input type="hidden" required name="housekeeping_id" id="housekeeping_id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-6">
                            <input type="text" required class="form-control form-control-sm" id="datepickernew" name="keeping_date" id="keeping_date" value="{{$date}}">
                        </div>
                        <div class="col-sm-4">
                            <input type="time" required class="form-control form-control-sm" name="keeping_time" id="keeping_time" value="{{$time}}">
                        </div>
                    </div>

                    @php
                  $employee = App\Models\Employee::all();
                 @endphp

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Updated By</label>
                        <div class="col-sm-8">
                            <select required class="form-control form-control-sm" id="updatedby" name="kepping_name">
                            @foreach($employee as $row)
                                <option value="{{$row->employee_name}}">{{$row->employee_name}}</option>
                            @endforeach

                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select required class="form-control form-control-sm" id="status" name="kepping_status">
                                <option value="Dirty">Dirty</option>
                                <option value="Cleanded">Cleanded</option>
                                <option value="Repair">Repair</option>
                                <option value="Inspect">Inspect</option>

                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Remarks</label>
                        <div class="col-sm-8">
                            <textarea required rows="3" name="last_log" id="remarks" class="form-control form-control-sm"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.preloader').hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('change', '#room_type', function(e) {
            var id = e.target.value;
            $('.preloader').show();
            $('.room_simple_data').hide();
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/housekepping/ajax/list') }}/" + id,
                success: function(data) {
                    $('.preloader').hide();
                    $('.room_ajax_data').append(data);

                },

            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(".editmodal").click(function() {
            var modal = $(this)
            var data = modal.data('whatever');
            console.log(data.housekeeping);
            document.getElementById('room_no').innerHTML = data.room_no;
            document.getElementById('room_id').value = data.id;
            document.getElementById('housekeeping_id').value = data.housekeepingreport.id;
            document.getElementById('keeping_date').value = data.housekeepingreport.log_date;
            document.getElementById('keeping_time').value = data.housekeepingreport.log_time;
            document.getElementById('remarks').value = data.housekeepingreport.remarks;
            $('#updatedby').val(data.housekeepingreport.keeping_name).selected;
            $('#status').val(data.housekeepingreport.keeping_status).selected;
        });
    });
</script>

@endsection