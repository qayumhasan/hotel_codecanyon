<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use App\Models\ItemEntry;
use App\Models\PurchaseHead;
use App\Models\PurchaseOrderHead;
use App\Models\StockCenter;
use Illuminate\Http\Request;

class InventoryManageController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    // inventory
    public function index(){
        $totalItems = ItemEntry::where('is_active',1)->where('is_deleted',0)->count();
        $stockCenters = StockCenter::where('is_active',1)->where('is_deleted',0)->count();
        $totalpurchases = PurchaseHead::count();
        $purchaseOrders = PurchaseOrderHead::where('is_active',1)->where('is_deleted',0)->count();
        $dataPoints = array(
            array("label"=> "Items", "y"=> $totalItems),
            array("label"=> "Stock Centers", "y"=> $stockCenters),
            array("label"=> "Purchases", "y"=> $totalpurchases),
            array("label"=> "Purchase Orders", "y"=> $purchaseOrders),
        );
        return view('inventory.home.index',compact('totalItems','stockCenters','totalpurchases','purchaseOrders','dataPoints'));
    }
}
