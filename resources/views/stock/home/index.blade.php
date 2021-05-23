@extends('stock.master')
@section('content')
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-6 col-lg-3">
            <div class="card card-block card-stretch card-height bg-primary rounded">
               <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                     <div class="icon iq-icon-box rounded iq-bg-primary rounded shadow" data-wow-delay="0.2s"> <i class="las la-users"></i>
                     </div>
                     <div class="iq-text">
                        <h6 class="text-white">Total Physical Stocks</h6>
                        <h3 class="text-white">{{$physicalstocks}}</h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3">
            <div class="card card-block card-stretch card-height bg-warning rounded">
               <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                     <div class="icon iq-icon-box rounded iq-bg-warning rounded shadow" data-wow-delay="0.2s"> <i class="lab la-product-hunt"></i>
                     </div>
                     <div class="iq-text">
                        <h6 class="text-white">Stock Center</h6>
                        <h3 class="text-white">{{$stockCenters}}</h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3">
            <div class="card card-block card-stretch card-height bg-success rounded">
               <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                     <div class="icon iq-icon-box rounded iq-bg-success rounded shadow" data-wow-delay="0.2s"> <i class="las la-user-tie"></i>
                     </div>
                     <div class="iq-text">
                        <h6 class="text-white">Purchase</h6>
                        <h3 class="text-white">{{$totalpurchases}}</h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3">
            <div class="card card-block card-stretch card-height bg-danger rounded">
               <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                     <div class="icon iq-icon-box rounded iq-bg-danger rounded shadow" data-wow-delay="0.2s"> <i class="lab la-buffer"></i>
                     </div>
                     <div class="iq-text">
                        <h6 class="text-white">Purchase Order</h6>
                        <h3 class="text-white">{{$purchaseOrders}}</h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-12">
            <div class="card card-block card-stretch card-height">
               <div class="card-header border-none">
                  <div class="header-title">
                     <h4 class="card-title">Overview</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div id="layout-1-chart-06">
                  
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   
</div>
<script>
$(document).ready(function(){
   if (jQuery("#layout-1-chart-06").length) {
  var options = {
          series: [{
          name: 'Total Purchase',
          data: [{{$physicalstocks}},{{$stockCenters}},{{$totalpurchases}},{{$purchaseOrders}}]
        }],
          chart: {
          type: 'bar',
          height: 310
        },
    colors: ['#05bbc9','#876cfe'],

        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '25%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Physical Stocks', 'Stock Cente', 'Purchase', 'Purchase Order'],
        },
      yaxis: {
        show: true,
        labels: {
          minWidth: 20,
          maxWidth: 20
        }
      },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

    var chart = new ApexCharts(document.querySelector("#layout-1-chart-06"), options);
        chart.render();
}
});

</script>
@endsection