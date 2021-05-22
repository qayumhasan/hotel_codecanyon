<div class="col-md-12">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>#</th>
                        <th>Invoice No</th>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Unit</th>
                        <th>Qty</th>
                        <th>Amount</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                    @php
                    $alldata=App\Models\PurchaseHead::where('invoice_no',$invoice)->latest()->get();
                    $singlecount=App\Models\PurchaseHead::where('invoice_no',$invoice)->count();
                    $allqty=App\Models\PurchaseHead::where('invoice_no',$invoice)->sum('qty');

                    $allamount=App\Models\PurchaseHead::where('invoice_no',$invoice)->sum('amount');
                    @endphp
                    @foreach($alldata as $key => $data)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$data->invoice_no}}</td>
                        <td>{{$data->item_id}}</td>
                        <td>{{$data->item_name}}</td>
                        <td>{{$data->unit}}</td>
                        <td>{{$data->qty}}</td>
                        <td>{{$data->amount}}</td>
                        <td>

                            <button type="button" onclick="cartdata(this)" data-toggle="tooltip" title="" class="editcat badge bg-primary-light" value="{{$data->id}}" data-original-title="Remove"><i class="lar la-edit"></i></button>
                            <button type="button" onclick="cartDatadelete(this)" data-toggle="tooltip" title="" class="badge bg-danger-light" value="{{$data->id}}" data-original-title="Remove"><i class="la la-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
                <tfoot class="text-center">
                    <tr>
                        <input type="hidden" value="{{$allamount}}" name="calculateamount" class="calculateamount">
                        <td colspan="6" class="text-right">Gross Amount:</td>
                        <td colspan="2" class="text-left">{{$allamount}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</div>
<div class="col-md-12">
    <div class="card-body">
        <div class="row">

        </div>
    </div>
</div>