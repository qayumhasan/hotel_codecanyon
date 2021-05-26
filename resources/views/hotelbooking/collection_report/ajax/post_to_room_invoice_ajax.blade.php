<div class="invoice-card printfood">
    <div class="invoice-title">
        <div id="main-title">
            <h4>INVOICE</h4>
            <span># {{$postToRooms->invoice_no}}</span>
        </div>
        <span id="date">Bill Date :{{$postToRooms->payment_date}}</span>
        <span id="date">Table No: {{$postToRooms->orderDetail->tableName->table_no ?? ''}}</span>
        <span id="date">Waiter: {{$postToRooms->orderDetail->waiter->employee_name ?? ''}}</span>
        <span id="date">Mode Of Payment: Post To Room</span>
    </div>

    <div class="invoice-details">
        <table class="invoice-table">
            <thead>
                <tr>
                    <td>PRODUCT</td>
                    <td>UNIT</td>
                    <td>Rate</td>
                    <td>Amount</td>
                </tr>
            </thead>

            <tbody>
            @php
                $totalfoodbill = 0;
            @endphp
            @if(count($postToRooms->orderDetails) >0)
            @foreach($postToRooms->orderDetails as $row)
               <tr>
                    <td>{{$row->item->item_name ?? ''}}</td>
                    <td>{{$row->qty}}</td>
                    <td>{{$row->rate}}</td>
                    <td class="text-right">{{$row->qty * $row->rate}}</td>
               </tr>
               @php
               $totalfoodbill = $totalfoodbill +$row->qty * $row->rate; 
               @endphp

            @endforeach
            @endif
                
                <tr class="calc-row border-top border-secondary">
                    <td colspan="3">Bill Amount</td>
                    <td>$ {{$totalfoodbill}}</td>
                </tr>


        <!-- tax info -->

            @if(count($postToRooms->taxheads) >0)
            @foreach($postToRooms->taxheads as $row)
               <tr>
                    <td>{{$row->effect}} : {{$row->taxdetails->tax_description ?? ''}} - {{$row->TaxRate}} On {{$row->Calculation}}</td>

                    <td colspan="3" class="text-right">{{$row->amount}}</td>
                    
               </tr>
               <tr style="border-top: 1px dashed;">
                    <th colspan="3" class="text-right">Total Amount:   </th>
                    <td class="text-right">{{$postToRooms->gross_amount}}</td>
               </tr>
            @endforeach
            @endif  
            </tbody>
        </table>
    </div>
</div>
<div class="invoice-footer">
        <button type="button" class="btn btn-sm btn-outline-secondary mr-4" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-sm btn-outline-primary printbtn">Print</button>
    </div>



<script>
        $(function () {
            $(".printbtn").on('click', function () {
                
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("div.printfood").printArea(options);
            });
        });
   </script>