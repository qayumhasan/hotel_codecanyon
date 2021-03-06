@extends('housekipping.master')
@section('title', 'Item Department Issue | '.$companyinformation->company_name)
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
    <form id="get_issue_to_room_data" action="{{route('admin.housekeeping.department.item.store')}}" method="post">
    @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-header">
                            <div class="header-title">
                                <h4 class="card-title">Issue To Department</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-1 col-form-label"><b>Issue Date:</b></label>
                                <div class="col-sm-4">
                                    <input class="form-control form-control-sm datepicker" name="issue_date" id="issuedate" type="text" required value="{{$date}}">
                                    <small class="text-danger issue_date"></small>
                                </div>

                                <label for="inputPassword" class="col-sm-2 col-form-label text-right"><b>Department:</b></label>
                                <div class="col-sm-3">
                                    <select class="form-control form-control-sm" required id="select_room_no" name="department_id">
                                    @foreach($departments as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                    </select>
                                    <small class="text-danger room_no"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card-header d-flex justify-content-between border bg-header">
                                    <div class="header-title">
                                        <h4 class="card-title">Issue To Room</h4>
                                    </div>
                                </div>
                                <div class="card border-righ border-bottom border-left p-5">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Item Name</label>
                                        <select class="form-control form-control-sm" id="item_name">
                                            @foreach($items as $row)
                                            <option value="{{$row->id}}">{{$row->item_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Quantity</label>
                                        <input type="number" class="form-control form-control-sm" id="item_qty" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Item Unit</label>
                                        <select class="form-control form-control-sm" id="item_unit">
                                            <option disabled selected>--Select Unit---</option>
                                            @foreach($units as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" id="add_to_grid" class="btn btn-primary mx-auto">Add To Grid</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 ">
                                <div class="card-header d-flex justify-content-between border bg-header">
                                    <div class="header-title">
                                        <h4 class="card-title">Issue To Room Items</h4>
                                    </div>
                                </div>
                                <div class="card border-righ border-bottom border-left p-2 ">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Item Code</th>
                                                <th scope="col">Item Name</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Unit Name</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="add_item_issue">
                                           <tr id="itemalert">
                                                <td class="text-center border border-danger pt-4 text-danger" colspan="5">Please add some item!</td>
                                           </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card border-righ border-bottom border-left p-2">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Narration</label>
                                        <textarea class="form-control form-control-sm" id="exampleFormControlTextarea1" rows="2" name="remarks"></textarea>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-primary mx-auto" id="itemsubmit">Save Items</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#select_room_no').select2();
    });
    $('#itemalert').hide();
</script>
<script>
    var items = document.querySelector('#item_name');
    items.addEventListener('change', (event) => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'get',
            url: "{{ url('/admin/get/item/section') }}/"+event.target.value,   
            success: function(data) {
                $('#item_unit').val(data).selected;
            }
        });
    });
</script>

<script>
    var items = (function() {
        function getElement() {
            return {
                itemname: document.querySelector('#item_name'),
                itmeqty: document.querySelector('#item_qty'),
                itemunit: document.querySelector('#item_unit'),
                additem: document.querySelector('#add_item_issue'),
            }
        }
        return {
            element: getElement(),
        }
    })();
    document.querySelector('#add_to_grid').addEventListener('click', function(e) {
        function getAllValue() {
            return {
                itemname: items.element.itemname.selectedOptions[0].innerHTML,
                itemnameid: items.element.itemname.value,
                itmeqty: items.element.itmeqty.value,
                itemunitid: items.element.itemunit.value,
                itemunit: items.element.itemunit.selectedOptions[0].innerHTML,
            }
        }
        if (getAllValue().itmeqty == '' || getAllValue().itmeqty == 0) {
            iziToast.success({
                title: 'Sorry',
                message: 'Quantity Field Must Not be empty!',
                position:'topCenter'
            });
        } else {
            var html = '<tr class="insertItem"><th scope="row"><input type="hidden" name="order_id" value="{{rand(100,999)}}"><input type="hidden" name="item_name[]" value="%itemnameval%"/><input type="hidden" name="item_qty[]" value="%itemqty%"/><input type="hidden" name="item_unit[]" value="%itemunitval%"/>{{rand(100,999)}}</th><td>%itemname%</td><td>%qty%</td><td>%unitname%</td><td><span onclick="deleteItem(this)" class="deletebtn"><i class="fa fa-trash" aria-hidden="true"></i></span></td></tr>';
            var newhtml = html.replace('%itemname%', getAllValue().itemname);
            var newhtml = newhtml.replace('%qty%', getAllValue().itmeqty);
            var newhtml = newhtml.replace('%unitname%', getAllValue().itemunit);
            var newhtml = newhtml.replace('%itemnameval%', getAllValue().itemnameid);
            var newhtml = newhtml.replace('%itemqty%', getAllValue().itmeqty);
            var newhtml = newhtml.replace('%itemqty%', getAllValue().itmeqty);
            var newhtml = newhtml.replace('%itemunitval%', getAllValue().itemunitid);
            items.element.additem.insertAdjacentHTML('afterend', newhtml);
            $('#itemalert').hide();
            $('#item_name').val('');
            $('#item_qty').val('');
            $('#item_unit').val('');
        }
    });

 function deleteItem(el){
    el.closest('.insertItem').remove();
 }

</script>

<script>
    var formdata = document.querySelector('#get_issue_to_room_data');
    var itemsubmit = document.querySelector('#itemsubmit');    
    itemsubmit.addEventListener('click',function(e){
        var insertItem = document.querySelector('.insertItem');
        var issuedate = document.querySelector('#issuedate');
        var select_room_no = document.querySelector('#select_room_no');
            if(insertItem == null){
            $('#itemalert').show();
            }else if(issuedate.value == ''){
                issuedate.focus();
                document.querySelector('.issue_date').innerHTML = 'Issue Date Can not be null!'
            }else if(select_room_no.value == ''){
                select_room_no.focus();
                document.querySelector('.room_no').innerHTML = 'Please select a Room!'
            }
            else{
                formdata.submit();
            }
    })
</script>
@endsection