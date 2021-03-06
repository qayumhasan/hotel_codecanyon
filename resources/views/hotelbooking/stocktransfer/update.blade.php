@extends('inventory.master')
@section('title', 'Update StockTransfer | '.$seo->meta_title)
@section('content')
@php
date_default_timezone_set("asia/dhaka");
$current = date("Y/m/d");
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Update Stock Transfer</h4>
                        </div>
                        <a href="{{route('admin.stocktransfer.index')}}"><button class="btn btn-sm bg-primary"><i class="ri-add-fill"><span class="pl-1">All Stock Transfer</span></i></button></a>
                    </div>
                </div>
                <form action="{{route('admin.stocktransfer.update')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow-sm shadow-showcase">
                                <div class="card-body">
                                    <div class="row" id="mainfile">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="fname">Invoice No: *</label>
                                                <input type="text" value="{{$edit->invoice_no}}" class="form-control" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="fname">From Center : *</label>
                                                <select name="from_center" class="form-control" placeholder="--select--">
                                                    @foreach($allstock as $stock)
                                                    <option value="{{$stock->id}}" @if($edit->from_center == $stock->id) selected @endif>{{$stock->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('from_center')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="fname">To Center : *</label>
                                                <select name="to_center" class="form-control" placeholder="--select--">
                                                    @foreach($allstock as $stock)
                                                    <option value="{{$stock->id}}" @if($edit->to_center == $stock->id) selected @endif>{{$stock->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('to_center')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="fname">Date: </label>
                                                <input id="datepicker" type="text" class="form-control" name="date" value="{{$edit->date}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow-sm shadow-showcase">
                                <div class="card-body">
                                    <div class="row" id="mainfile">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fname">Item Name: *</label>
                                                <input type="text" id="item_name" name="item_name" class="form-control" list="allitem" placeholder="Item" />
                                                <input type="hidden" id="i_id" name="i_id" />
                                                <datalist id="allitem">
                                                    @foreach($allitem as $item)
                                                    <option value="{{$item->item_name}}">{{$item->item_name}}</option>
                                                    @endforeach
                                                </datalist>
                                                <div style="color:red" id="item_err"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fname">Unit: *</label>
                                                <input type="text" class="form-control" id="unit_name" name="unit_name" placeholder="unit" />
                                                <input type="hidden" class="form-control" id="unit" name="unit" />
                                                <input type="hidden" name="invoice_no" value="{{$edit->invoice_no}}" id="invoice_no" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fname">Qty: </label>
                                                <input type="number" class="form-control qty" id="Qty" name="qty" placeholder="Qty" />
                                                <input type="hidden" class="form-control rate" name="rate" />
                                                <input type="hidden" class="form-control amount" name="amount" />
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <div class="form-group">
                                                <button type="button" class="btn-sm btn-primary" id="addnow">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card shadow-sm shadow-showcase">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">All Item</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row" id="showallitem">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm shadow-showcase">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title"></h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="fname">Naration: *</label>
                                            <textarea class="form-control" name="narration">{{$edit->narration}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="fname">Number Of Item: </label>
                                            <input type="text" class="form-control num_of_item" value="" disabled value="{{$edit->num_of_item}}">
                                            <input type="hidden" name="num_of_item" class="form-control num_of_item" value="{{$edit->num_of_item}}">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="fname">Number Of Quantity: </label>
                                            <input type="number" class="form-control num_of_qty" disabled value="{{$edit->num_of_qty}}">
                                            <input type="hidden" value="{{$edit->id}}" name="id">
                                            <input type="hidden" name="num_of_qty" class="form-control num_of_qty" value="{{$edit->num_of_qty}}">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-sm shadow-showcase">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <button type="submit" class="btn btn-success">Update</button>
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
    </div>
</div>
</div>


<!-- tax include script end -->

<script type="text/javascript">
    $(document).ready(function() {
        $('input[name="item_name"]').on('change', function() {
            var item_name = $(this).val();
            //alert(item_name);

            if (item_name) {
                $.ajax({
                    url: "{{  url('/get/item/all/') }}/" + item_name,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        $('#unit').val(data.unit_name);
                        $('#unit_name').val(data.name);
                        $('#Qty').val(1);
                        $('.rate').val(data.rate);
                        $('.amount').val(data.rate);

                    }
                });
            } else {
                //alert('danger');
            }

        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('input[name="qty"]').on('change', function() {
            var Qty = $('.qty').val();
            var rate = $('.rate').val();
            //alert(rate);

            if (Qty) {
                $('.amount').val(rate * Qty);

            } else {
                //alert('danger');
            }

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#addnow').on('click', function() {

            var item_name = $("#item_name").val();
            var unit = $("#unit").val();
            var unit_name = $("#unit_name").val();
            var Qty = $("#Qty").val();
            var i_id = $("#i_id").val();
            var rate = $(".rate").val();
            var amount = $(".amount").val();
            var invoice_no = $("#invoice_no").val();


            $.ajax({
                type: 'GET',
                url: "{{route('stocktransfer.insert.data')}}",

                data: {
                    item_name: item_name,
                    unit: unit,
                    unit_name: unit_name,
                    Qty: Qty,
                    i_id: i_id,
                    rate: rate,
                    amount: amount,
                    invoice_no: invoice_no
                },

                success: function(data) {

                    $('#item_err').html('');
                    $('#item_name').val("");
                    $('#unit').val("");
                    $('#unit_name').val("");
                    $('#Qty').val("");
                    $("#i_id").val("");
                    $(".rate").val("");
                    $(".amount").val("");
                    alldatashow();
                    totalitem();



                },

                error: function(err) {
                    $('#item_err').html(err.responseJSON.errors.item_name[0]);
                }

            });


        });
    });
</script>


<script>
    function alldatashow() {
        //alert("ok");
        var invoice = $("#invoice_no").val();
        //alert(invoice);
        $.post('{{ url('/get/itemstocktransfer/data/') }}/' + invoice, {
                _token: '{{ csrf_token() }}'
            },
            function(data) {
                $('#showallitem').html(data);

            });

    }

    alldatashow();
</script>
<script>
    function totalitem() {
        //alert("ok");
        var invoice = $("#invoice_no").val();
        //alert(invoice);
        $.post('{{ url('get/totalitem/count/') }}/' + invoice, {
                _token: '{{ csrf_token() }}'
            },
            function(data) {
                //console.log(data);
                $('.num_of_item').val(data.numberofitem);
                $('.num_of_qty').val(data.numberofqty);

            });

    }

    totalitem();
</script>
<script>
    $(document).ready(function() {
        $('input[name="paidamount"]').on('keyup', function() {
            var paidamount = $('.paidamount').val();
            var totalamount = $('.totalamount').val();


            if (paidamount) {
                $('.dueamount').val(totalamount - paidamount);

            } else {
                $('.dueamount').val(totalamount);
            }

        });
    });
</script>

<script>
    function cartDatadelete(el) {

        //alert(el.value);
        $.post('{{route('get.stocktransferitem.delete')}}', {
                _token: '{{ csrf_token() }}',
                item_id: el.value
            },
            function(data) {
                totalitem();
                alldatashow();

                if (data) {
                    //   iziToast.success({  message: 'Delete success ',
                    //                           'position':'topCenter'
                    //                       });
                }


            });



    }
    cartheaderdelete();
</script>
<script>
    function cartdata(el) {

        //alert(el.value)
        $.post('{{route('get.itemstocktransfer.edit')}}', {
                _token: '{{ csrf_token() }}',
                item_id: el.value
            },
            function(data) {
                //$('#addtocartshow').html(data);
                //console.log(data);
                $("#item_name").val(data.item_name);
                $("#i_id").val(data.id);
                $("#unit_name").val(data.unit);
                $(".qty").val(data.qty);
                $(".rate").val(data.rate);
                $(".amount").val(data.amount);


            });
        alldatashow();
        totalamount();

    }
    cartheaderdelete();
</script>
<script>
    $('body').on('keydown', 'input,select,textarea', function(e) {
        var self = $(this),
            form = self.parents('form:eq(0)'),
            focusable, next;
        if (e.keyCode == 13) {
            focusable = form.find('input,a,select,button,textarea').filter(':visible');
            next = focusable.eq(focusable.index(this) + 1);
            if (next.length) {
                next.focus();
            } else {
                form.submit();
            }
            return false;
        }
    });
</script>

@endsection