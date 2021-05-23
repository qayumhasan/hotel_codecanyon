<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountCategory;
use App\Models\AccountMainCategory;
use App\Models\AccountTransectionHead;
use Illuminate\Http\Request;
use DB;

class AccountsController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }
    //home 
    public function home(){

        $totalcategores = AccountCategory::where('is_active',1)->where('is_deleted',0)->count();
        $totalmaincategores = AccountMainCategory::where('is_active',1)->where('is_deleted',0)->count();
        $totalChartofAccounts = DB::table('vchart_of_accounts')->where('is_active',1)->where('is_deleted',0)->count();
        $totalTransitions = AccountTransectionHead::where('is_active',1)->where('is_deleted',0)->count();
        return view('accounts.home.index',compact('totalcategores','totalmaincategores','totalChartofAccounts','totalTransitions'));
    }
}
