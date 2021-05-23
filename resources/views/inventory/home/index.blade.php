@extends('inventory.master')
@section('content')
@php
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
                              <h6 class="text-white">Total Items</h6>
                              <h3 class="text-white">{{$totalItems}}</h3>
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
                           <h4 class="card-title">Purchase Overview</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </div


@endsection

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Purchase Overview"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>