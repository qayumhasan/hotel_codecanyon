@extends('housekipping.master')
@section('title', 'In House Guest | '.$companyinformation->company_name)
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card printableAreasaveprint">
                    <div class="card-header d-flex justify-content-between bg-header">
                        <div class="header-title">
                            <h4 class="card-title">All In House Guest</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>Booking No</th>
                                        <th>Room no</th>
                                        <th>Guest</th>
                                        <th>Company</th>
                                        <th>City</th>
                                        <th>Total Pax</th>
                                        <th>In Date</th>
                                        <th>Exp.Out Date</th>
                                        <th>Checkin By</th>
                                        
                                    </tr>
                                </thead>
                                <tfoot class="text-center">
                                    <tr>
                                        <th>Booking No</th>
                                        <th>Room no</th>
                                        <th>Guest</th>
                                        <th>Company</th>
                                        <th>City</th>
                                        <th>Total Pax</th>
                                        <th>In Date</th>
                                        <th>Exp.Out Date</th>
                                        <th>Checkin By</th>         
                                    </tr>
                                </tfoot>
                                <tbody class="text-center">
                                    @foreach($inhouseguest as $row)
                                    <tr>
                                        <td>{{$row->checkin->booking_no ?? ''}}</td>
                                        <td>{{$row->checkin->room_no ?? ''}}</td>
                                        <td>{{$row->checkin->guest_name?? ''}}</td>
                                        <td>{{$row->checkin->company_name?? '' }}</td>
                                        <td>{{$row->checkin->city?? ''}}</td>
                                        <td>{{$row->checkin->number_of_person?? ''}}</td>
                                        <td>{{$row->checkin->checkin_date?? ''}}</td>
                                        <td>{{$row->checkin->exp_checkin_date?? ''}}</td>
                                        <td>{{$row->checkin->user->username ?? ''}}</td>
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
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#datatable thead th').each(function() {
            var title = $('#datatable thead th').eq($(this).index()).text();
            if (title != 'Action') {
                $(this).html('<input class="search_area form-control form-control-sm" type="text" placeholder="' + title + '" />');
            }
        });
        // DataTable
        var table = $('#datatable').DataTable({
            paging: true,
            bFilter: false,
            ordering: false,
            searching: true,
            // dom: 't',
            initComplete: function() {
                // Apply the search
                this.api().columns().every(function() {
                    var that = this;

                    $('input', this.header()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            }
        });

    });
</script>
@endsection