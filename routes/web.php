<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\BulkSmsController;
use App\Http\Controllers\Admin\Hotel\HotelManageController;
use App\Http\Controllers\Admin\Hotel\BranchController;
use App\Http\Controllers\Admin\Hotel\FloorController;
use App\Http\Controllers\Admin\Hotel\RoomTypeController;
use App\Http\Controllers\Admin\Hotel\CollectionReportController;
use App\Http\Controllers\Admin\Hotel\RoomController;
use App\Http\Controllers\Admin\Hotel\UnitMasterController;
use App\Http\Controllers\Admin\Hotel\MenuCategoryController;
use App\Http\Controllers\Admin\Hotel\StockCenterController;
use App\Http\Controllers\Admin\Hotel\ItemEntryController;
use App\Http\Controllers\Admin\Hotel\OrderRequisitionController;
use App\Http\Controllers\Admin\Hotel\CheckingController;
use App\Http\Controllers\Admin\Hotel\SupplierController;
use App\Http\Controllers\Admin\Hotel\PurchaseController;
use App\Http\Controllers\Admin\Hotel\TaxSettingController;
use App\Http\Controllers\Admin\Hotel\ReservationAnalysisReportControler;
use App\Http\Controllers\Admin\Hotel\ArrivalDepartureReportController;
use App\Http\Controllers\Admin\Hotel\StockTransferController;
use App\Http\Controllers\Admin\Hotel\PurchaseOrderController;
use App\Http\Controllers\Admin\Hotel\HouseKeepingReportController;
use App\Http\Controllers\Admin\Inventory\InventoryManageController;
use App\Http\Controllers\Admin\Inventory\ReportController;
use App\Http\Controllers\Admin\Hotel\VoucherController;
use App\Http\Controllers\Admin\Hotel\CheckinUpdateController;
use App\Http\Controllers\Admin\Hotel\OccupancyController;
use App\Http\Controllers\Admin\Hotel\AdvanceBookingController;
use App\Http\Controllers\Admin\Hotel\RestaurantTableController;
use App\Http\Controllers\Admin\Hotel\HotelServiceController;
use App\Http\Controllers\Admin\Stock\PhysicalStockController;
use App\Http\Controllers\Admin\Stock\StockReportController;
use App\Http\Controllers\Admin\UserRoleController;

use App\Http\Controllers\Admin\FoodAndBeverage\FoodAndBeverageController;
use App\Http\Controllers\Admin\Banquet\BanquetController;
use App\Http\Controllers\Admin\Banquet\HallController;
use App\Http\Controllers\Admin\Banquet\BookingforController;
use App\Http\Controllers\Admin\Banquet\MenutypeController;
use App\Http\Controllers\Admin\Banquet\BanquetBookingController;
use App\Http\Controllers\Admin\Banquet\BanquetReportController;
// payroll
use App\Http\Controllers\Admin\Payroll\PayrollController;
use App\Http\Controllers\Admin\Payroll\EmployeeSelaryController;
use App\Http\Controllers\Admin\AddonManagerController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\MediaManagerController;
use App\Http\Controllers\Admin\DepartmentController;

Route::get('/', function () {
    return redirect('admin/login');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// admin routes start
Route::get('admin', [AdminController::class, 'Select'])->name('admin.dashboard');
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.main.dashboard');
Route::get(md5('admin/user/create/'), [AdminController::class, 'create'])->name('admin.user.create');
Route::post('admin/user/create/', [AdminController::class, 'register'])->name('admin.user.register');
Route::get(md5('admin/user'), [AdminController::class, 'alluser'])->name('admin.user');
Route::get('admin/logout', [AdminController::class, 'AdminLogOut'])->name('admin.logout');
Route::get('admin/user/profile/{id}', [AdminController::class, 'profile']);
Route::get('/get/useremployee/all/{employee_id}', [AdminController::class, 'employee']);
Route::get('admin/user/edit/{id}', [AdminController::class, 'edit']);
Route::post('admin/user/update', [AdminController::class, 'update'])->name('admin.user.update');
Route::get('admin/user/view/{id}', [AdminController::class, 'view']);
Route::get('admin/user/delete/{id}', [AdminController::class, 'delete']);
Route::get('admin/user/deactive/{id}', [AdminController::class, 'deactive']);
Route::get('admin/user/active/{id}', [AdminController::class, 'active']);
Route::get(md5('admin/user/password/change'), [AdminController::class, 'passwordchange'])->name('password.chamge');
Route::post(md5('admin/user/password/submit'), [AdminController::class, 'passwordchangesubmit'])->name('admin.passchange.submit');

Route::get('admin/orderrecusition/manage', [AdminController::class, 'OrderRecusitionmanage'])->name('admin.orderrecusition.manage');
Route::get('admin/orderrecusition/onprocessing/{id}', [AdminController::class, 'onprocessing']);
Route::get('admin/orderrecusition/onapprove/{id}', [AdminController::class, 'onapprove']);
// email controller
Route::get(md5('admin/email'), [EmailController::class, 'index'])->name('admin.email');
Route::get(md5('admin/compose/email'), [EmailController::class, 'composemail'])->name('admin.compose.email');
Route::post(md5('admin/email/send'), [EmailController::class, 'composemailsend'])->name('admin.email.send');
Route::get('admin/email/softdelete/{id}', [EmailController::class, 'mailsoftdelete']);
Route::get('admin/email/delete/{id}', [EmailController::class, 'delete']);
Route::get('/get/started/change/{dataid}/{val}', [EmailController::class, 'started']);
Route::get('/get/started/uncheked/change/{dataid}/{val}', [EmailController::class, 'unstarted']);
Route::get('/get/view/email/{val}', [EmailController::class, 'view']);
Route::get('/get/individual/email/{val}', [EmailController::class, 'individualemail']);
Route::get('admin/sendemail/delete/{id}', [EmailController::class, 'sendmaildelete']);
//admin login controller
Route::get('admin/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('admin/forget/password', [LoginController::class, 'forget']);
Route::post('admin/forget/email/submit', [LoginController::class, 'emailsubmit'])->name('admin.password.email');
Route::get('admin/forget/email/{email}', [LoginController::class, 'forgetemail'])->name('admin.auth.adminverification');
Route::post('admin/forget/verification/code', [LoginController::class, 'checkverification'])->name('admin.verification.code');
Route::get('admin/forget/reset/password/{email}', [LoginController::class, 'forgetresetpassword'])->name('admin.forget.resetpass');
Route::post('admin/forget/reset/password/submit', [LoginController::class, 'forgetresetpasswordsubmit'])->name('admin.password.set');
// settings controller
Route::get(md5('admin/settings/general'), [SettingsController::class, 'Index'])->name('admin.settings.general');
Route::post(md5('admin/settings/general/update'), [SettingsController::class, 'Update'])->name('admin.settings.general.update');
Route::post(md5('admin/settings/logo/update'), [SettingsController::class, 'LogoUpdate'])->name('admin.settings.logo.update');
Route::post(md5('admin/settings/socialmedia/update'), [SettingsController::class, 'SocialMediaUpdate'])->name('admin.settings.socialmedia.update');
Route::post(md5('admin/settings/seo/update'), [SettingsController::class, 'SeoUpdate'])->name('admin.settings.seo.update');
Route::post(md5('admin/settings/sms/update'), [SettingsController::class, 'SmsUpdate'])->name('admin.sms.update');
Route::post(md5('admin/settings/smtp/update'), [SettingsController::class, 'SmtpUpdate'])->name('admin.Smtp.update');
Route::get(md5('admin/settings/check'), [SettingsController::class, 'CheckFilemana'])->name('admin.filemanager.check');
// employee controller
Route::get(md5('admin/employee/index'), [EmployeeController::class, 'index'])->name('admin.employee.index');
Route::get(md5('admin/employee/create'), [EmployeeController::class, 'create'])->name('admin.employee.create');
Route::get('admin/employee/view/{id}', [EmployeeController::class, 'view']);
Route::get('admin/employee/edit/{id}', [EmployeeController::class, 'edit']);
Route::post('admin/employee/store', [EmployeeController::class, 'store'])->name('admin.employee.store');
Route::post('admin/employee/update', [EmployeeController::class, 'update'])->name('admin.employee.update');
Route::get('admin/employee/delete/{id}', [EmployeeController::class, 'delete']);
Route::get('/get/policestation/all/{district}', [EmployeeController::class, 'getpolicestation']);
// bulk sms Controller
Route::get('admin/bulksms/create', [BulkSmsController::class, 'create'])->name('admin.bulksms.create');
Route::post('admin/bulksms/send', [BulkSmsController::class, 'store'])->name('admin.bulksms.send');
// hotel section ------------------------------------------------------------------------------------------------------------------------
// hotel manage controller
Route::get(md5('admin/hotel'), [HotelManageController::class, 'index'])->name('admin.hotel');
// branch controller
Route::get(md5('admin/branch/index'), [BranchController::class, 'index'])->name('admin.branch.index');
Route::get('admin/branch/create', [BranchController::class, 'create'])->name('admin.branch.create');
Route::post(md5('admin/branch/store'), [BranchController::class, 'store'])->name('admin.branch.store');
Route::get('admin/branch/active/{id}', [BranchController::class, 'active']);
Route::get('admin/branch/deactive/{id}', [BranchController::class, 'deactive']);
Route::get('admin/branch/delete/{id}', [BranchController::class, 'delete']);
Route::get('admin/branch/edit/{id}', [BranchController::class, 'edit']);
Route::post(md5('admin/branch/update'), [BranchController::class, 'update'])->name('admin.branch.update');
// floor controller
Route::get(md5('admin/floor/create'), [FloorController::class, 'create'])->name('admin.floor.create');
Route::post('admin/floor/store', [FloorController::class, 'store'])->name('admin.floor.store');
Route::get('admin/floor/active/{id}', [FloorController::class, 'active']);
Route::get('admin/floor/deactive/{id}', [FloorController::class, 'deactive']);
Route::get('admin/floor/delete/{id}', [FloorController::class, 'delete']);
Route::get('admin/floor/edit/{id}', [FloorController::class, 'edit']);
Route::post(md5('admin/floor/update'), [FloorController::class, 'update'])->name('admin.floor.update');
// roomtype controller
Route::get(md5('admin/roomtype/create'), [RoomTypeController::class, 'create'])->name('admin.rooomtype.create');
Route::post(md5('admin/roomtype/store'), [RoomTypeController::class, 'store'])->name('admin.roomtype.store');
Route::get('admin/roomtype/active/{id}', [RoomTypeController::class, 'active']);
Route::get('admin/roomtype/deactive/{id}', [RoomTypeController::class, 'deactive']);
Route::get('admin/roomtype/delete/{id}', [RoomTypeController::class, 'delete']);
Route::get('admin/roomtype/edit/{id}', [RoomTypeController::class, 'edit']);
Route::post(md5('admin/roomtype/update'), [RoomTypeController::class, 'update'])->name('admin.roomtype.update');
// room controller
Route::get(md5('admin/room/create'), [RoomController::class, 'create'])->name('admin.room.create');
Route::get(md5('admin/room/index'), [RoomController::class, 'index'])->name('admin.room.index');
Route::get('/get/roomsetup/all/{branch}', [RoomController::class, 'getbranchdata']);
Route::get('/get/floorsetup/all/{branch}', [RoomController::class, 'getfloordata']);
Route::get('/get/pricesetup/all/{roomtype}', [RoomController::class, 'getpricedata']);
Route::post(md5('admin/room/store'), [RoomController::class, 'store'])->name('admin.room.store');

Route::get('admin/room/active/{id}', [RoomController::class, 'active']);
Route::get('admin/room/deactive/{id}', [RoomController::class, 'deactive']);
Route::get('admin/room/delete/{id}', [RoomController::class, 'delete']);
Route::get('admin/room/edit/{id}', [RoomController::class, 'edit']);
Route::post(md5('admin/room/update'), [RoomController::class, 'update'])->name('admin.room.update');

// unit master table
Route::get(md5('admin/unit/create'), [UnitMasterController::class, 'create'])->name('admin.unit.create');
Route::post(md5('admin/unit/store'), [UnitMasterController::class, 'store'])->name('admin.unit.store');
Route::get('admin/unit/active/{id}', [UnitMasterController::class, 'active']);
Route::get('admin/unit/deactive/{id}', [UnitMasterController::class, 'deactive']);
Route::get('admin/unit/delete/{id}', [UnitMasterController::class, 'delete']);
Route::get('admin/unit/edit/{id}', [UnitMasterController::class, 'edit']);
Route::post(md5('admin/unit/update'), [UnitMasterController::class, 'update'])->name('admin.unit.update');
// menu category
Route::get(md5('admin/menucategory/create'), [MenuCategoryController::class, 'create'])->name('admin.menucategory.create');
Route::post(md5('admin/menucategory/store'), [MenuCategoryController::class, 'store'])->name('admin.menucategory.store');
Route::get('admin/menucategory/active/{id}', [MenuCategoryController::class, 'active']);
Route::get('admin/menucategory/deactive/{id}', [MenuCategoryController::class, 'deactive']);
Route::get('admin/menucategory/delete/{id}', [MenuCategoryController::class, 'delete']);
Route::get('admin/menucategory/edit/{id}', [MenuCategoryController::class, 'edit']);
Route::post(md5('admin/menucategory/update'), [MenuCategoryController::class, 'update'])->name('admin.menucategory.update');
// stockcenter controller
Route::get(md5('admin/stockcenter/create'), [StockCenterController::class, 'create'])->name('admin.stockcenter.create');
Route::post(md5('admin/stockcenter/store'), [StockCenterController::class, 'store'])->name('admin.stockcenter.store');
Route::get('admin/stockcenter/active/{id}', [StockCenterController::class, 'active']);
Route::get('admin/stockcenter/deactive/{id}', [StockCenterController::class, 'deactive']);
Route::get('admin/stockcenter/delete/{id}', [StockCenterController::class, 'delete']);
Route::get('admin/stockcenter/edit/{id}', [StockCenterController::class, 'edit']);
Route::post(md5('admin/stockcenter/update'), [StockCenterController::class, 'update'])->name('admin.stockcenter.update');
// item entry controller
Route::get(md5('admin/itementry/create'), [ItemEntryController::class, 'create'])->name('admin.itementry.create');
Route::get(md5('admin/itementry/index'), [ItemEntryController::class, 'index'])->name('admin.itementry.index');
Route::post(md5('admin/itementry/store'), [ItemEntryController::class, 'store'])->name('admin.itementry.store');
Route::get('admin/itementry/active/{id}', [ItemEntryController::class, 'active']);
Route::get('admin/itementry/deactive/{id}', [ItemEntryController::class, 'deactive']);
Route::get('admin/itementry/delete/{id}', [ItemEntryController::class, 'delete']);
Route::get('admin/itementry/edit/{id}', [ItemEntryController::class, 'edit']);
Route::post(md5('admin/itementry/update'), [ItemEntryController::class, 'update'])->name('admin.itementry.update');

// order recusition
Route::get(md5('admin/ordercusition/create'), [OrderRequisitionController::class, 'create'])->name('admin.ordercusition.create');
Route::get(md5('admin/ordercusition/index'), [OrderRequisitionController::class, 'index'])->name('admin.ordercusition.index');
Route::get('/get/item/all/orderrecu/{item_name}', [OrderRequisitionController::class, 'getitemnew']);
Route::post('/get/item/showlol/{invoice}', [OrderRequisitionController::class, 'allrecuitem']);
Route::post('/get/totalqty/orderrequ/{invoice}', [OrderRequisitionController::class, 'allqtyorrequ']);


Route::post('/get/item/delete/', [OrderRequisitionController::class, 'itemdelete'])->name('get.item.delete');
Route::get('/get/item/insert/lol', [OrderRequisitionController::class, 'iteminsert']);
Route::post('/get/item/order/submit/lol', [OrderRequisitionController::class, 'ordersubmit']);
Route::post('/get/oderrecusition/edit/', [OrderRequisitionController::class, 'orderedit'])->name('get.item.edit');
Route::get('admin/ordercusition/edit/{id}', [OrderRequisitionController::class, 'edit']);
Route::post('admin/ordercusition/update', [OrderRequisitionController::class, 'orderupdate'])->name('admin.ordercusition.update');
Route::get('admin/ordercusition/delete/{id}', [OrderRequisitionController::class, 'orderdelete']);


Route::get(md5('admin/supplier/create'), [SupplierController::class, 'create'])->name('admin.supplier.create');
Route::post(md5('admin/supplier/store'), [SupplierController::class, 'store'])->name('admin.supplier.store');
Route::get(md5('admin/supplier/index'), [SupplierController::class, 'index'])->name('admin.supplier.index');
Route::get('admin/supplier/active/{id}', [SupplierController::class, 'active']);
Route::get('admin/supplier/deactive/{id}', [SupplierController::class, 'deactive']);
Route::get('admin/supplier/delete/{id}', [SupplierController::class, 'delete']);
Route::get('admin/supplier/edit/{id}', [SupplierController::class, 'edit']);
Route::post(md5('admin/supplier/update'), [SupplierController::class, 'update'])->name('admin.supplier.update');
// purchase
Route::get(md5('admin/purchase/create'), [PurchaseController::class, 'create'])->name('admin.purchase.create');
Route::post(md5('admin/purchase/insert'), [PurchaseController::class, 'insert'])->name('admin.purchase.insert');
Route::post('admin/purchase/update/{id}', [PurchaseController::class, 'update'])->name('admin.purchase.update');
Route::get(md5('admin/purchase/index'), [PurchaseController::class, 'index'])->name('admin.purchase.index');
Route::get('admin/purchase/active/{id}', [PurchaseController::class, 'active']);
Route::get('admin/purchase/deactive/{id}', [PurchaseController::class, 'deactive']);
Route::get('admin/purchase/delete/{id}', [PurchaseController::class, 'delete']);
Route::get('admin/purchase/edit/{id}', [PurchaseController::class, 'edit']);
Route::post('get/tax/edit/', [PurchaseController::class, 'taxedit'])->name('get.taxitem.edit');
Route::get(md5('get/itempurchase/insert'), [PurchaseController::class, 'itempurchase'])->name('itempurchese.insert.data');
Route::post('get/itempurchase/data/{invoice}', [PurchaseController::class, 'allitemdata']);
Route::post('get/itempurchase/delete/', [PurchaseController::class, 'itempurchasedelete'])->name('get.purchaseitem.delete');
Route::post('get/itempurchase/edit/', [PurchaseController::class, 'purchaseedit'])->name('get.itempurchase.edit');
Route::get('get/tax/data/{tax}', [PurchaseController::class, 'gettax']);
Route::get('get/tax/insert/', [PurchaseController::class, 'taxinsert'])->name('tax.insert.data');
Route::post('get/alltax/data/{invoice}', [PurchaseController::class, 'alltaxinclude']);
Route::post('get/tax/delete/', [PurchaseController::class, 'taxdatadelete'])->name('get.taxdata.delete');
Route::post('get/total/amount/{invoice}', [PurchaseController::class, 'gettotalamount']);
Route::post('get/supplier/modal/insert', [PurchaseController::class, 'supllymodalinsert'])->name('supplier.modalinsert.data');

Route::get('get/allsupplier/supplier', [PurchaseController::class, 'getallsupplier']);
Route::post('get/iteminsert/ajaxdata/', [PurchaseController::class, 'itemajxinsert'])->name('itementery.modalinsert.data');
Route::get('get/allitem/item/', [PurchaseController::class, 'getallpurchaseitem']);

// stock tranfer
Route::get(md5('admin/stocktransfer/create'), [StockTransferController::class, 'create'])->name('admin.stocktransfer.create');
Route::post(md5('admin/stocktransfer/insert'), [StockTransferController::class, 'insert'])->name('admin.stocktransfer.insert');
Route::get(md5('admin/stocktransfer/index'), [StockTransferController::class, 'index'])->name('admin.stocktransfer.index');
Route::get('admin/stocktransfer/edit/{id}', [StockTransferController::class, 'edit']);
Route::get('admin/stocktransfer/delete/{id}', [StockTransferController::class, 'delete']);
Route::post(md5('admin/stocktransfer/update'), [StockTransferController::class, 'update'])->name('admin.stocktransfer.update');
Route::get(md5('get/stocktransfer/stockinsert'), [StockTransferController::class, 'stockinsert'])->name('stocktransfer.insert.data');
Route::post('/get/itemstocktransfer/data/{invoice}', [StockTransferController::class, 'getstocktitem']);
Route::post('get/totalitem/count/{invoice}', [StockTransferController::class, 'getstockitem']);
Route::post('get/totalitem/stocktranfer/', [StockTransferController::class, 'getstocktransdelete'])->name('get.stocktransferitem.delete');
Route::post('get/totalitem/stocktranfer/edit', [StockTransferController::class, 'getstocktransedit'])->name('get.itemstocktransfer.edit');

Route::get('/get/stockcenter/select/by/fromstock/{fromstock_name}', [StockTransferController::class, 'getfromstockName']);

// purchase order
Route::get(md5('admin/purchaseorder/create'), [PurchaseOrderController::class, 'create'])->name('admin.purchaseorder.create');
Route::get(md5('admin/purchaseorderajax/insert'), [PurchaseOrderController::class, 'purchaseorderinsert'])->name('purchaseorder.insert.data');
Route::post('/get/purchaseorrder/data/{invoice}', [PurchaseOrderController::class, 'getpurchaseorder']);
Route::post(md5('admin/purchaseorderajax/edit'), [PurchaseOrderController::class, 'getpurchaseorderedit'])->name('get.purchaseorder.edit');
Route::post(md5('admin/purchaseorderajax/delete'), [PurchaseOrderController::class, 'getpurchaseorderdelete'])->name('get.purchaseorder.delete');
Route::post('get/purchaseorder/count/{invoice}', [PurchaseOrderController::class, 'getpurchaseordercount']);
Route::post(md5('admin/purchaseorder/insert'), [PurchaseOrderController::class, 'insert'])->name('admin.purchaseorder.insert');
Route::get(md5('admin/purchaseorder/index'), [PurchaseOrderController::class, 'index'])->name('admin.purchaseorder.index');
Route::get('admin/purchaseorder/delete/{id}', [PurchaseOrderController::class, 'delete']);
Route::get('admin/purchaseorder/edit/{id}', [PurchaseOrderController::class, 'edit']);
Route::post('admin/purchaseorder/update/{id}', [PurchaseOrderController::class, 'update'])->name('admin.purchaseorder.update');

// report controller
Route::get(md5('admin/inventory/home'), [InventoryManageController::class, 'index'])->name('admin.inventory.home');
// daily purchase report
Route::get(md5('admin/dailypurchase/index'), [ReportController::class, 'dailypurchase'])->name('admin.dailypurchase.create');
Route::post(md5('admin/dailypurchase/index'), [ReportController::class, 'dailypurchasesearch'])->name('admin.dailypurchase.create');
// // Stockwise purchase report
Route::get(md5('admin/stockwise/purchase/create'), [ReportController::class, 'stockwise'])->name('admin.stockwise.create');
Route::post(md5('admin/stockwise/purchase/create'), [ReportController::class, 'stockwisesearch'])->name('admin.stockwise.create');
// 
Route::get(md5('admin/categorywise/purchase/create'), [ReportController::class, 'categorywisereport'])->name('admin.categorywise.report');
Route::post(md5('admin/categorywise/purchase/create'), [ReportController::class, 'categoriwise'])->name('admin.categorywise.report');

Route::get(md5('admin/supplierwise/purchase/create'), [ReportController::class, 'supplierwisereport'])->name('admin.supplierwise.report');
Route::post(md5('admin/supplierwise/purchase/create'), [ReportController::class, 'supplierwise'])->name('admin.supplierwise.report');

// datewise
Route::get(md5('admin/datewise/purchase/create'), [ReportController::class, 'datewisereport'])->name('admin.datewise.report');

// food and beverage
Route::get(md5('admin/foodandbeverage/index'), [FoodAndBeverageController::class, 'index'])->name('admin.foodandbeverage.create');
Route::get('/get/checkin/data/{checkin_id}', [FoodAndBeverageController::class, 'getcheckindata']);
Route::get('/kot/insert/data', [FoodAndBeverageController::class, 'kotinsert'])->name('kot.insert.data');
Route::get('/kot/getinsert/data/{booking_no}', [FoodAndBeverageController::class, 'getkotinsertdata']);

Route::get('/get/allkotdetails/data/{checkin_id}', [FoodAndBeverageController::class, 'getkotdetails']);
Route::post('/get/allkotdetails/data/edit', [FoodAndBeverageController::class, 'getkotedit'])->name('get.kotitem.edit');
Route::post('/get/allkotdetails/data/delete', [FoodAndBeverageController::class, 'getkotdelete'])->name('get.kotitem.delete');
Route::post('admin/kitchenorder/insert', [FoodAndBeverageController::class, 'finalinsert'])->name('kot.final.insert');
// billing
Route::get('/get/kotall/data/{checkin_id}', [FoodAndBeverageController::class, 'getkotdataall']);
Route::get('/get/billingqty/update', [FoodAndBeverageController::class, 'billingqtyupdate'])->name('billing.quantity.update');
Route::get('/get/billingstatus/update', [FoodAndBeverageController::class, 'billingstatusupdate'])->name('billing.status.update');
Route::get('/get/billingstatus/update/save/print', [FoodAndBeverageController::class, 'billingstatussaveandprint'])->name('billingprint.status.update');

// history
Route::post('/get/kotsub/data/delete', [FoodAndBeverageController::class, 'kotsubdelete'])->name('get.subkot.delete');
Route::post('/get/kotsubhitory/data/delete', [FoodAndBeverageController::class, 'kotsubhitorydelete'])->name('get.subkothitory.delete');
Route::get('/get/kothistory/data/{checkin_id}', [FoodAndBeverageController::class, 'getkothistory']);
Route::get('/get/singlehistory/invoice/{checkin_id}', [FoodAndBeverageController::class, 'getsinglehistoryprint']);
Route::get('/get/doublehistory/invoice/{kot_id}', [FoodAndBeverageController::class, 'getdoublehistoryprint']);

Route::get('admin/foodandbeverage/pending/order', [FoodAndBeverageController::class, 'pendingorder'])->name('admin.foodandbeverage.pending');
Route::get('admin/foodandbeverage/compareOrder', [FoodAndBeverageController::class, 'compareOrder'])->name('admin.foodandbeverage.compareOrder');
Route::get('admin/foodandbeverage/kothistory', [FoodAndBeverageController::class, 'kothistoryordercom'])->name('admin.foodandbeverage.kothistory');

// -----------------------------------------------------------Banquet-------------------------------------------------------------------------------------------------------------
Route::get('admin/banquet/index', [BanquetController::class, 'index'])->name('admin.banquet.dashboard');
Route::get('admin/get/banquet', [BanquetController::class, 'getBanqueet'])->name('admin.get.banquet.data');
// BanquetBookingController
Route::get('admin/banquet/booking/create', [BanquetBookingController::class, 'create'])->name('admin.banquet.create');
Route::post('admin/banquet/booking/update/{id}', [BanquetBookingController::class, 'update'])->name('admin.banquet.update');
Route::get('admin/banquet/booking/index', [BanquetBookingController::class, 'index'])->name('admin.banquet.index');
Route::get('admin/banquet/active/{id}', [BanquetBookingController::class, 'active']);
Route::get('admin/banquet/deactive/{id}', [BanquetBookingController::class, 'deactive']);
Route::get('admin/banquet/delete/{id}', [BanquetBookingController::class, 'delete']);
Route::get('admin/banquet/edit/{id}', [BanquetBookingController::class, 'edit']);

// payroll controller ----------------------------------------------------------------------------------------------------------------------------
Route::get('admin/payroll/index', [PayrollController::class, 'index'])->name('admin.payroll.index');
Route::get('admin/payroll/allemployee', [PayrollController::class, 'allemployee'])->name('admin.payroll.allemployee');
Route::get('admin/payroll/employee/selary', [EmployeeSelaryController::class, 'index'])->name('admin.payroll.employee.selary');
Route::post('admin/payroll/employee/selary/create', [EmployeeSelaryController::class, 'store'])->name('payroll.employee.selary.create');
Route::post('admin/payroll/employee/selary/update', [EmployeeSelaryController::class, 'update'])->name('payroll.employee.selary.update');

Route::get('admin/payroll/employee/allcreateselary/', [EmployeeSelaryController::class, 'allcreateselary'])->name('payroll.employee.allcreateselary');
Route::get('admin/allemployee/selary/edit/{month}/{year}', [EmployeeSelaryController::class, 'allemplyesalaryedit']);
// month wise selary 
Route::get('admin/payroll/monthwise/employeesalary', [EmployeeSelaryController::class, 'monthwiseselary'])->name('payroll.monthwiseselary.reports');
Route::post('admin/payroll/monthwise/employeesalary', [EmployeeSelaryController::class, 'monthwiseselarygenerate'])->name('payroll.monthwiseselary.reports');
//employee wise report
Route::get('admin/payroll/employeewise/monthlysalary', [EmployeeSelaryController::class, 'employeetotalmonthselary'])->name('payroll.emloyeemonthwiseselary.reports');
Route::post('admin/payroll/employeewise/monthlysalary', [EmployeeSelaryController::class, 'employeetotalmonthselarygenerate'])->name('payroll.emloyeemonthwiseselary.reports');
// salary details
Route::get('admin/payroll/salary/details', [EmployeeSelaryController::class, 'selarydetails'])->name('payroll.salarydetails.reports');
Route::post('admin/payroll/salary/details', [EmployeeSelaryController::class, 'selarydetailsresult'])->name('payroll.salarydetails.reports');
// employee attendence 
Route::get('admin/payroll/employeewise/attendence/report', [EmployeeSelaryController::class, 'employeewiseattendence'])->name('payroll.employeewise.attendence');
Route::post('admin/payroll/employeewise/attendence/report', [EmployeeSelaryController::class, 'employeewiseattendenceresult'])->name('payroll.employeewise.attendence');
// monthly attendence report
Route::get('admin/payroll/monthy/attendence/report', [EmployeeSelaryController::class, 'monthlyattendence'])->name('payroll.monthly.attendence');
Route::post('admin/payroll/monthy/attendence/report', [EmployeeSelaryController::class, 'monthlyattendenceresult'])->name('payroll.monthly.attendence');
Route::get('/get/monthwise/salary/print/{id}', [EmployeeSelaryController::class, 'monthwiseselaryprint']);



// physical stock center
Route::get('admin/physicalstock/dashboard', [PhysicalStockController::class, 'dashboard'])->name('admin.physicalstock.dashboard');
Route::get('admin/physicalstock/create', [PhysicalStockController::class, 'create'])->name('admin.physicalstock.create');
// physical details insert
Route::get('get/physical/stock/details/insert', [PhysicalStockController::class, 'physicaldetailsinsert'])->name('physicalstock.details.insert');
Route::post('admin/physicalstock/store', [PhysicalStockController::class, 'physicalstore'])->name('admin.physicalstock.store');
Route::get('/get/physicalitem/stock/all/{id}', [PhysicalStockController::class, 'getphysicalitem']);
Route::post('/get/physicalstckitem/all/{invoice_no}', [PhysicalStockController::class, 'getallphysicalitem']);
Route::post('/get/physicalstckitem/delete', [PhysicalStockController::class, 'getallphysicalitemdelete'])->name('get.phycalstock.delete');
Route::post('/get/physicalstckitem/edit', [PhysicalStockController::class, 'getallphysicalitemedit'])->name('get.physicalstockitem.edit');
Route::post('get/physicalstckitem/qty/{invoice_no}', [PhysicalStockController::class, 'getallphysicalitemeqty']);
Route::get('admin/physicalstock/index', [PhysicalStockController::class, 'allphysicalstore'])->name('admin.physicalstock.index');
Route::get('admin/physicalstock/active/{id}', [PhysicalStockController::class, 'active']);
Route::get('admin/physicalstock/deactive/{id}', [PhysicalStockController::class, 'deactive']);
Route::get('admin/physicalstock/delete/{id}', [PhysicalStockController::class, 'delete']);
Route::get('admin/physicalstock/edit/{id}', [PhysicalStockController::class, 'edit']);
Route::post('admin/physicalstock/update', [PhysicalStockController::class, 'update'])->name('admin.physicalstock.update');
// reports
Route::get('admin/stock/dailytransfer/reports', [StockReportController::class, 'dailytransfer'])->name('admin.stock.daillytransfer.report');
Route::get('admin/stock/dailytransfer/reports/submit', [StockReportController::class, 'dailytransferresult'])->name('admin.stock.daillytransfer.reportresult');

Route::get('admin/stock/itemwise/report', [StockReportController::class, 'itemwisestock'])->name('admin.stock.itemwise');
Route::get('admin/stock/itemwise/reportresult', [StockReportController::class, 'itemwisestockresult'])->name('admin.stock.itemwiseresult');
Route::get('admin/stock/stockcenter/report', [StockReportController::class, 'stockcentersreport'])->name('admin.stock.stockcentersreport');
Route::post('admin/stock/stockcenter/report', [StockReportController::class, 'stockcenterreportresult'])->name('admin.stock.stockcentersreport');
Route::get('admin/stock/stockavailability/item', [StockReportController::class, 'stockavailabilityitem'])->name('admin.stockavailability.itemwise');
Route::post('admin/stock/stockavailability/item', [StockReportController::class, 'stockavailabilityitemresult'])->name('admin.stockavailability.itemwise');

Route::get('admin/stock/stockledger/item', [StockReportController::class, 'stockledger'])->name('admin.stockledger.itemwise');
Route::post('admin/stock/stockledger/item', [StockReportController::class, 'stockledgerresult'])->name('admin.stockledger.itemwise');

Route::get('admin/stock/categorywise/report', [StockReportController::class, 'CategoryWiseStock'])->name('admin.stockledger.categorywise');
Route::post('admin/stock/categorywise/report', [StockReportController::class, 'CategoryWiseStockReport'])->name('admin.stockledger.categorywise');

Route::get('admin/stock/consumption/report', [StockReportController::class, 'ConsumptionReport'])->name('admin.stock.ConsumptionReport');
Route::post('admin/stock/consumption/report', [StockReportController::class, 'ConsumptionReportResult'])->name('admin.stock.ConsumptionReport');
// stock summary
Route::get('admin/stock/summary/report', [StockReportController::class, 'StockSummary'])->name('admin.stock.summary');
Route::post('admin/stock/summary/report', [StockReportController::class, 'StockSummaryreport'])->name('admin.stock.summary');
Route::get('admin/stock/minlevel/report', [StockReportController::class, 'StockMinLevelReport'])->name('admin.StockMinLevel.report');
Route::post('admin/stock/minlevel/report', [StockReportController::class, 'StockMinLevelReportResult'])->name('admin.StockMinLevel.report');






Route::get('get/menutype/price', [BanquetBookingController::class, 'getmenutypeprice'])->name('get.menutype.price');
Route::get('get/geusttype/price', [BanquetBookingController::class, 'getgeusttypeprice'])->name('get.geust_type.price');
Route::get('get/banquet/item/insert', [BanquetBookingController::class, 'bunquetinsert'])->name('bunquet.insertitem.data');
Route::post('get/banquetitem/all/{booking_no}', [BanquetBookingController::class, 'allbunquetitem']);
Route::post('get/banquetitem/delete/', [BanquetBookingController::class, 'bunquetitemdelete'])->name("get.banquetitem.delete");
Route::post('get/banquetitem/edit/', [BanquetBookingController::class, 'bunquetitemedit'])->name("get.banquetitem.edit");
Route::get('get/taxinsert/insert/', [BanquetBookingController::class, 'banquettaxinsert'])->name("bunquet.inserttax.data");
Route::get('get/banquet/taxitem/', [BanquetBookingController::class, 'banquettaxall'])->name("get.banquettax.all");
Route::post('get/banquettax/all/{booking_no}', [BanquetBookingController::class, 'gettaxbanquet']);
Route::post('get/banquettax/delete', [BanquetBookingController::class, 'gettaxbanquetdelete'])->name('get.banquettax.delete');
Route::post('get/banquettax/edit', [BanquetBookingController::class, 'gettaxbanquetedit'])->name('get.banquettax.edit');
Route::get('get/banquettax/categorywise/item', [BanquetBookingController::class, 'getcategoryitem'])->name('get.banquet.categorytype');
Route::get('get/banquettax/categorywise/item/insert', [BanquetBookingController::class, 'cateiteminsert'])->name('bunquet.cateiteminsert.data');
Route::post('get/allcateitem/all/{booking_no}', [BanquetBookingController::class, 'getallcateitembanquet']);
Route::post('get/allcateitem/delete', [BanquetBookingController::class, 'getallcateitemdelete'])->name('get.categoryitemdelete.delete');
Route::post('admin/banquet/insert', [BanquetBookingController::class, 'banquetinsert'])->name('admin.banquet.store');
Route::post('get/allamount/banquet/', [BanquetBookingController::class, 'getallamountsection'])->name('get.banquet.allamount');
Route::get('admin/banquet/payment/voucher/{bunquet_id}', [BanquetBookingController::class, 'banquetpayment'])->name('admin.banquet.payment');
// banquet reports

Route::get('admin/banquet/dalily/reports', [BanquetReportController::class, 'dailyreports'])->name('admin.banquet.dalilyreports');
Route::post('admin/banquet/dalily/reports', [BanquetReportController::class, 'dailyreportssearch'])->name('admin.banquet.dalilyreports');
// banquet wise report
Route::get('admin/banquet/banquetwise/reports', [BanquetReportController::class, 'banquetwise'])->name('admin.banquet.banquetwise');
Route::post('admin/banquet/banquetwise/reports', [BanquetReportController::class, 'banquetwisesearch'])->name('admin.banquet.banquetwise');

Route::get('admin/banquet/printdetails', [BanquetReportController::class, 'printdetais'])->name('admin.banquet.printdetais');
Route::post('admin/banquet/printdetails', [BanquetReportController::class, 'printdetaisresult'])->name('admin.banquet.printdetais');

Route::get('admin/banquet/alltransection', [BanquetReportController::class, 'alltransection'])->name('admin.banquet.alltransection');

Route::get('/get/banquet/alldata/data/{chid}', [BanquetReportController::class, 'getprintbanquet']);







// hallcontroller
Route::get(md5('admin/hall/create'), [HallController::class, 'create'])->name('admin.hall.create');
Route::post(md5('admin/hall/create'), [HallController::class, 'store'])->name('admin.hall.create');
Route::post(md5('admin/hall/update'), [HallController::class, 'update'])->name('admin.hall.update');
Route::get(md5('admin/hall/index'), [HallController::class, 'index'])->name('admin.hall.index');
Route::get('admin/hall/active/{id}', [HallController::class, 'active']);
Route::get('admin/hall/deactive/{id}', [HallController::class, 'deactive']);
Route::get('admin/hall/delete/{id}', [HallController::class, 'delete']);
Route::get('admin/hall/edit/{id}', [HallController::class, 'edit']);
// booking for
Route::get(md5('admin/bookingfor/create'), [BookingforController::class, 'create'])->name('admin.bookingfor.create');
Route::post(md5('admin/bookingfor/create'), [BookingforController::class, 'store'])->name('admin.bookingfor.create');
Route::get('admin/bookingfor/active/{id}', [BookingforController::class, 'active']);
Route::get('admin/bookingfor/deactive/{id}', [BookingforController::class, 'deactive']);
Route::get('admin/bookingfor/delete/{id}', [BookingforController::class, 'delete']);
Route::get('admin/bookingfor/edit/{id}', [BookingforController::class, 'edit']);
// menutype
Route::get(md5('admin/menutype/create'), [MenutypeController::class, 'create'])->name('admin.menutype.create');
Route::post(md5('admin/menutype/create'), [MenutypeController::class, 'store'])->name('admin.menutype.create');
Route::get('admin/menutype/active/{id}', [MenutypeController::class, 'active']);
Route::get('admin/menutype/deactive/{id}', [MenutypeController::class, 'deactive']);
Route::get('admin/menutype/delete/{id}', [MenutypeController::class, 'delete']);
Route::get('admin/menutype/edit/{id}', [MenutypeController::class, 'edit']);



// -----------------------------------------------------------------Banquet end------------------------------------------------------------------------------------------------

// setting area start here
Route::middleware(['admin'])->prefix(md5('admin/tax'))->group(function () {
    Route::get('/', [TaxSettingController::class, 'index'])->name('admin.tax.index');
    Route::post('/store', [TaxSettingController::class, 'store'])->name('admin.tax.store');
    Route::get('/delete/{id}', [TaxSettingController::class, 'delete'])->name('admin.taxsetting.delete');
    Route::get('/status/{id}', [TaxSettingController::class, 'status'])->name('admin.taxsetting.status');
    Route::get('/edit/{id}', [TaxSettingController::class, 'edit'])->name('admin.taxsetting.edit');
    Route::post('/update/{id}', [TaxSettingController::class, 'update'])->name('admin.tax.update'); 
});

// checking area start from here

Route::middleware(['admin'])->prefix(md5('admin/check-in'))->group(function () {
    Route::get('/{id}', [CheckingController::class, 'index'])->name('admin.checking.index');
    Route::get('/get/hostel', [CheckingController::class, 'getRoom'])->name('admin.get.hotel');
    Route::post('/checkin/store', [CheckingController::class, 'store'])->name('admin.checkin.store');


    Route::get('/report/show', [CheckingController::class, 'checkinReport'])->name('admin.checkin.report');
    Route::get('/report/edit/{id?}', [CheckingController::class, 'checkinEdit'])->name('admin.checkin.edit');

    Route::post('/service/store', [CheckingController::class, 'serviceStore'])->name('admin.checkin.service.add');
    Route::post('/service/update', [CheckingController::class, 'serviceUpdate'])->name('admin.checkin.service.update');

    Route::get('/get/service/{id}', [CheckingController::class, 'getService'])->name('admin.checkin.get.service');

    Route::get('/get/delete/service/{id}', [CheckingController::class, 'deleteService'])->name('admin.checkin.get.delete.service');

    Route::get('/get/deleted/service/{id}', [CheckingController::class, 'deletedService'])->name('admin.checkin.get.deleted.service');

    Route::get('/get/deleted/service/{id}', [CheckingController::class, 'deletedService'])->name('admin.checkin.get.deleted.service');

    Route::get('/get/view/service/{id}', [CheckingController::class, 'viewService'])->name('admin.checkin.get.view.service');

    Route::get('/print/service/{id}', [CheckingController::class, 'printService'])->name('admin.print.service');
    Route::post('/history/search', [CheckingController::class, 'historySearch'])->name('admin.checkin.history.search');
    
    
});

Route::get('/admin/service/categores/{id}', [CheckingController::class, 'ServiceCategores']);
Route::get('admin/checkin/room/history/{id}', [CheckingController::class, 'checkinhistory']);






// change amount

Route::get('admin/change/roomtarif/groupbooking/{id}', [HotelServiceController::class, 'changetariff']);
Route::post('admin/change/roomtarif/groupbooking/submit', [HotelServiceController::class, 'changetariffsubmit']);
//  change amount end

Route::get('admin/change/masterroom/groupbooking/{id}', [HotelServiceController::class, 'ChangeRoomMaster']);
Route::post('admin/change/masterroom/groupbooking/submit', [HotelServiceController::class, 'ChangeRoomMasterSubmit']);

Route::get('/get/addroom/tariff/{room_id}', [HotelServiceController::class, 'getprice']);

Route::get('admin/change/room/groupbooking/{id}', [HotelServiceController::class, 'ChangeRoomGroupBooking']);
Route::post('admin/change/room/groupbooking/submit', [HotelServiceController::class, 'ChangeRoomGroupBookingSubmit']);

Route::get('admin/addroom/existingbooking/{id}', [HotelServiceController::class, 'addroom']);
Route::post('admin/addroom/existingbooking/submit', [HotelServiceController::class, 'addroomsubmit']);

Route::get('admin/singlecheckout/ingroupbooking/{id}', [HotelServiceController::class, 'SingleCheckoutGroupbooking']);
Route::post('admin/singlecheckout/ingroupbooking/request', [HotelServiceController::class, 'SingleCheckoutRequest']);


// end

Route::middleware(['admin'])->prefix(md5('admin/voucher'))->group(function () {
    Route::get('/create/{booking_no}', [VoucherController::class, 'create'])->name('admin.voucher.create');
    Route::get('/show/voucher/{booking_no}', [VoucherController::class, 'showvoucher'])->name('admin.checkin.show.voucher');

    Route::get('/checkout/voucher/{booking_no}', [VoucherController::class, 'showCheckoutvoucher'])->name('admin.checkout.show.voucher');

    Route::get('/checkout/refund/{booking_no}', [VoucherController::class, 'refundCheckoutVoucher'])->name('admin.checkout.refund.voucher');

    Route::get('/list/voucher/{booking_no}', [VoucherController::class, 'listVoucher'])->name('admin.checkin.list.voucher');

    Route::get('/edit/voucher/page/{id}/{booking_no}', [VoucherController::class, 'editVoucherPage'])->name('admin.checkin.edit.voucher.page');

    Route::get('/edit/{id}', [VoucherController::class, 'editVoucher'])->name('admin.checkout.invoice_edit');

    Route::get('/print/{id}', [VoucherController::class, 'printVoucher'])->name('admin.checkout.invoice_print');

    Route::post('/update/{id}', [VoucherController::class, 'updateCheckoutVoucher'])->name('admin.checkout.voucher.update');

    Route::post('/voucher/{booking_no}', [VoucherController::class, 'submitVoucher'])->name('admin.checkin.voucher.submit');

    Route::post('/checkout/voucher/{booking_no}', [VoucherController::class, 'submitCheckoutVoucher'])->name('admin.checkout.voucher.submit');

    Route::post('/checkout/refund/{booking_no}', [VoucherController::class, 'submitCheckoutRefund'])->name('admin.checkout.refund.submit');

    Route::post('/voucher/update/{id}', [VoucherController::class, 'updateVoucher'])->name('admin.checkin.voucher.update');

    Route::get('/delete/voucher/list/{booking_no}', [VoucherController::class, 'deleteVoucherList'])->name('admin.checkin.delete.voucher.list');

    Route::get('/delete/voucher/{id}', [VoucherController::class, 'deleteVoucher'])->name('admin.checkin.delete.voucher');

    Route::get('/list/view/{booking_no}', [VoucherController::class, 'listVoucherView'])->name('admin.checkin.list.voucher.view');
});

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/room/change/{id}', [CheckinUpdateController::class, 'getNewRoomtarif']);
    Route::post('/room/change', [CheckinUpdateController::class, 'roomChange'])->name('admin.room.change');
    Route::post('/guest/update/{id}', [CheckinUpdateController::class, 'guestUpdate'])->name('admin.guest.update');
    Route::get('/edit/book-in/{id}', [CheckinUpdateController::class, 'editBookingShow'])->name('admin.edit.booking');
    Route::post('/edit/book-in/update/{id}', [CheckinUpdateController::class, 'bookingUpdate'])->name('admin.bookin.update');
    Route::post('/edit/tariff/update/{id}', [CheckinUpdateController::class, 'tariffUpdate'])->name('admin.tarif.update');
    Route::get('/delete/booking/{id}', [CheckinUpdateController::class, 'deleteBooking'])->name('admin.delete.booking');
});


Route::middleware(['admin'])->prefix('admin/advance/booking')->group(function () {
    Route::get('/', [AdvanceBookingController::class, 'showAdvanceBookingForm'])->name('admin.advance.booking');
    Route::get('/get/room/{id}', [AdvanceBookingController::class, 'advanceBookingGetRoom']);
    Route::post('/guest/name/store', [AdvanceBookingController::class, 'guestNameStore'])->name('admin.guest.name.store');
    
    Route::post('/advance/booking/store', [AdvanceBookingController::class, 'advanceBookingStore'])->name('admin.advance.booking.store');
    Route::get('/check/{id}', [AdvanceBookingController::class, 'advanceBookingCheck']);

});



Route::middleware(['admin'])->prefix('admin/advance/report')->group(function () {
    Route::get('/', [AdvanceBookingController::class, 'showAdvanceBookingReportPage'])->name('admin.advance.booking.report');
    
    Route::get('/edit/{id}', [AdvanceBookingController::class, 'showAdvanceBookingReportEdit'])->name('admin.advance.booking.report.edit');
    Route::post('/update/{id}', [AdvanceBookingController::class, 'showAdvanceBookingReportUpdate'])->name('admin.advance.booking.update');
    Route::get('/delete/{id}', [AdvanceBookingController::class, 'deleteAdvanceBookingReport'])->name('admin.advance.booking.delete');
    Route::get('/status/{id}', [AdvanceBookingController::class, 'statusAdvanceBookingReport'])->name('admin.advance.booking.status');
    Route::get('/calender', [AdvanceBookingController::class, 'advanceBookingCalender'])->name('admin.advance.booking.calender');
    Route::get('/get', [AdvanceBookingController::class, 'getadvanceBookingReport']);
    Route::get('/daybyday', [AdvanceBookingController::class, 'getadvanceBookingReportDayByDay']);
    Route::get('/get/room/{id}', [AdvanceBookingController::class, 'advanceBookingRoom'])->name('admin.advance.booking.room');
    Route::get('/day/by/day', [AdvanceBookingController::class, 'advanceBookingCalenderDaybyDay'])->name('admin.advance.booking.calender.daybyday');
    

});


Route::middleware(['admin'])->prefix('admin/department')->group(function () {

    Route::get('/list', [DepartmentController::class, 'departmentList'])->name('admin.department.list');
    Route::post('/store', [DepartmentController::class, 'departmentStore'])->name('admin.department.store');
    Route::get('/status/{id}', [DepartmentController::class, 'departmentStatus'])->name('admin.department.status');
    Route::get('/delete/{id}', [DepartmentController::class, 'departmentDelete'])->name('admin.department.delete');
    Route::post('/update', [DepartmentController::class, 'departmentUpdate'])->name('admin.department.update');
});
















// hotel section end --------------------------------------------------------------------------------------------------------------------

// frontend controller
Route::get('account', [FrontendController::class, 'index'])->name('customar.account');

// Addon Section start from here

Route::get('/addon/manager',[AddonManagerController::class, 'index'])->name('admin.addon.manager');
Route::post('/addon/install',[AddonManagerController::class, 'store'])->name('admin.addon.install');
Route::post('/addon/status',[AddonManagerController::class, 'status'])->name('admin.addon.status');
Route::get('/addon/delete/{id}',[AddonManagerController::class, 'delete'])->name('admin.addon.delete');

// Pages area start


Route::prefix(md5('restaurant/type'))->group(function(){
    Route::get('/',[RestaurantTableController::class,'create'])->name('admin.restaurnat.table.type.create');
    Route::post('/store',[RestaurantTableController::class,'store'])->name('admin.restaurnat.table.type.store');
    Route::get('/status/{id}',[RestaurantTableController::class,'statusChange'])->name('admin.restaurnat.table.type.status');
    Route::get('/delete/{id}',[RestaurantTableController::class,'tableTypeDelete'])->name('admin.restaurnat.table.type.delete');
    Route::get('/edit/{id}',[RestaurantTableController::class,'tableTypeEdit'])->name('admin.restaurnat.table.type.edit');
    Route::post('/update/{id}',[RestaurantTableController::class,'tableTypeUpdate'])->name('admin.restaurnat.table.type.update');
});


Route::prefix(md5('restaurant/table'))->group(function(){
    Route::get('/create',[RestaurantTableController::class,'tableCreate'])->name('admin.restaurnat.table.create');
    Route::post('/store',[RestaurantTableController::class,'tableStore'])->name('admin.restaurnat.table.store');
    Route::get('/',[RestaurantTableController::class,'tableList'])->name('admin.restaurnat.table');
    Route::get('/status/{id}',[RestaurantTableController::class,'tableStatusChange'])->name('admin.restaurnat.table.status');
    Route::get('/edit/{id}',[RestaurantTableController::class,'tableEdit'])->name('admin.restaurnat.table.edit');
    Route::post('/update/{id}',[RestaurantTableController::class,'tableUpdate'])->name('admin.restaurnat.table.update');
    Route::get('/delete/{id}',[RestaurantTableController::class,'tableDelete'])->name('admin.restaurnat.table.delete');
});


Route::prefix(md5('admin/booking/checkout'))->group(function(){
    Route::get('/{id}',[CheckingController::class,'bookingCheckout'])->name('admin.booking.checkout');
    Route::post('/get/data',[CheckingController::class,'bookingCheckoutGetData'])->name('admin.checkout.get.data');
    Route::post('/checkout/store',[CheckingController::class,'bookingCheckoutStore'])->name('admin.checkout.store');

    Route::get('/at/aglance/{id}',[CheckingController::class,'bookingAtAGlance'])->name('admin.chickin.at.glance');

    Route::get('/checkout/invoice/page/{booking_no}',[CheckingController::class,'checkOutInvoice'])->name('admin.checkout.invoice.page');

    Route::post('/get/tax/value',[CheckingController::class,'getTaxValue'])->name('admin.checkout.invoice.get.tax.data');

    Route::post('/get/tax/amount',[CheckingController::class,'calculateTaxAmount'])->name('admin.checkout.invoice.get.tax.amount');

    Route::post('/tax/edit',[CheckingController::class,'editTaxData'])->name('admin.checkout.invoice.tax.data.edit');


    Route::post('/get/gross/amount',[CheckingController::class,'calculateGrossAmount'])->name('admin.checkout.invoice.get.gross.amount');

    Route::post('/invoice/store',[CheckingController::class,'checkoutInvoiceStore'])->name('admin.checkout.invoice.store');
    Route::get('/voucher/store/{booking_no}',[CheckingController::class,'checkoutVoucerCreate'])->name('admin.checkout.voucher.store');

    Route::post('/voucher/store',[VoucherController::class,'submitVoucher'])->name('admin.transection.checkout.create');

});



Route::middleware(['admin'])->prefix(md5('admin/occupancey'))->group(function () {
    Route::get('/report', [OccupancyController::class, 'inhouseGuestReport'])->name('admin.occupancey.report');
    Route::get('/expected/checkout/report', [OccupancyController::class, 'expCheckoutReport'])->name('admin.expected.checkout.report');
});

Route::middleware(['admin'])->prefix('admin/')->group(function () {
    Route::get('/occupancy/report', [OccupancyController::class, 'occupancyReport'])->name('admin.expected.occupancy.report');
    Route::get('/occupancy/report/icon', [OccupancyController::class, 'occupancyReportIcon'])->name('admin.expected.occupancy.report.icon');

   

  
});


Route::middleware(['admin'])->prefix(md5('admin/arrival/departure/'))->group(function(){
    Route::get('/checkin/report',[ArrivalDepartureReportController::class,'checkinReport'])->name('admin.arrival.departure.checkin.report');
    Route::get('/checkout/report',[ArrivalDepartureReportController::class,'checkoutReport'])->name('admin.arrival.departure.checkout.report');
    Route::get('/guest/report',[ArrivalDepartureReportController::class,'guestReport'])->name('admin.arrival.departure.guest.report');
    Route::get('/pending/invoice/report', [ArrivalDepartureReportController::class, 'pendingInvoiceReport'])->name('admin.arrival.departure.pending.invoice.report');

    Route::get('/pending/invoice/report/delete/{booking_no}', [ArrivalDepartureReportController::class, 'pendingInvoiceReportDelete'])->name('admin.pending.invoice.report.delete');

    Route::get('/pending/invoice/{id}', [ArrivalDepartureReportController::class, 'pendingInvoiceReportCreate'])->name('admin.pending.invoice.report.create');
});


Route::middleware(['admin'])->prefix(md5('admin/housekeeping'))->group(function(){
    Route::get('/extra/service/report',[HouseKeepingReportController::class,'extraServiceReport'])->name('admin.houseKeeping.extra.service.report');

    Route::get('/day/wise/report',[HouseKeepingReportController::class,'dayWiseReport'])->name('admin.houseKeeping.day.wise.report');

    Route::get('/room/wise/report',[HouseKeepingReportController::class,'roomWiseHousekeeping'])->name('admin.houseKeeping.room.wise.report');

    Route::get('/employee/wise/report',[HouseKeepingReportController::class,'employeeWiseHousekeeping'])->name('admin.houseKeeping.employee.wise.report');
});


Route::middleware(['admin'])->prefix(md5('admin/reservation/analysis'))->group(function(){
    Route::get('/room/report',[ReservationAnalysisReportControler::class,'roomwiseReport'])->name('admin.reservation.analysis.room.report');

    Route::get('/room/type/report',[ReservationAnalysisReportControler::class,'roomtypewiseReport'])->name('admin.reservation.analysis.room.type.report');
});


Route::middleware(['admin'])->prefix(md5('admin/collection/report'))->group(function(){

    Route::get('/daily/collection',[CollectionReportController::class,'dailyCollection'])->name('admin.daily.collection.report');
    Route::get('/daily/ajax/collection',[CollectionReportController::class,'dailyCollectionAjaxReport'])->name('admin.daily.collection.ajax.report');

    Route::get('/guest/payment/history',[CollectionReportController::class,'guestPaymentHistory'])->name('admin.guest.payment.history');

    Route::get('/ajax/guest/payment/history/',[CollectionReportController::class,'ajaxGuestPaymentHistory'])->name('admin.guest.payment.history.ajax');

    
    // Route::get('/guest/payment/details',[CollectionReportController::class,'paymentDetails'])->name('admin.payment.details');

});

Route::middleware(['admin'])->prefix(md5('admin/invoice/summary'))->group(function(){
    Route::get('/list',[CollectionReportController::class,'invoiceSummaryList'])->name('admin.invoice.summary.report');
    Route::get('/ajax/list',[CollectionReportController::class,'invoiceSummaryAjaxList'])->name('admin.invoice.summery.ajax.report');
});

Route::middleware(['admin'])->prefix(md5('admin/post/to/room'))->group(function(){
    Route::get('/list',[CollectionReportController::class,'postToRoomList'])->name('admin.post.to.room.report');
    Route::get('/invoice/{id}',[CollectionReportController::class,'postToRoomInvoice'])->name('admin.post.to.room.invoice.print');
    Route::post('/post/to/room',[CollectionReportController::class,'postToRoomAjaxList'])->name('admin.post.to.room.ajax.report');
});


Route::middleware((['admin']))->prefix(md5('admin/currency'))->group(function(){
   Route::get('/',[CurrencyController::class,'index'])->name('currency');
   Route::post('/store',[CurrencyController::class,'store'])->name('admin.currency.store');
   Route::get('/status/{id}',[CurrencyController::class,'status'])->name('admin.currency.status');
   Route::post('/update',[CurrencyController::class,'update'])->name('admin.currency.update');
   Route::get('/delete/{id}',[CurrencyController::class,'delete'])->name('admin.currency.delete');
});
Route::get('/page',[MediaManagerController::class, 'insert'])->name('page');
Route::post('/media',[MediaManagerController::class, 'mediaManager'])->name('admin.media.file.upload');
Route::post('/get/image',[MediaManagerController::class, 'getImage'])->name('admin.media.file.use');
Route::get('/show/image',[MediaManagerController::class, 'showImage'])->name('admin.media.file.show');
Route::get('/media/manager/pagination/{id}',[MediaManagerController::class, 'showPaginationImage'])->name('admin.media.manager.pagination');
Route::get('admin/media/manager/delete/{id}',[MediaManagerController::class, 'mediaDelete']);
Route::get('test',[MediaManagerController::class, 'test']);
Route::get('admin/checkout/invoice/tax/data/delete/{id}',[CheckingController::class,'deleteTaxData']);
Route::get('admin/checkin/get/guest/info/{id}',[CheckingController::class,'guestInfo']);
Route::get('/admin/service/list/{id}',[CheckingController::class,'serviceList']);
Route::get('/admin/guest/details/{id}',[CheckingController::class,'guestCheckinDetails']);
Route::get('/admin/guest/name/list',[CheckingController::class,'guestNameList'])->name('admin.guest.name.list');
Route::get('admin/userrole/manage',[UserRoleController::class,'index'])->name('admin.userrole.permissionnew');
Route::post('admin/userrole/manage/update',[UserRoleController::class,'update'])->name('admin.userrole.permission');

// admin Inventory manage controller


