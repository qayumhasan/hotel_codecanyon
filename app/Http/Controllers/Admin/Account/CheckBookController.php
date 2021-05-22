<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChartOfAccount;
use App\Models\CheckBookEntry;
use App\Models\CheckBookTransection;
use Carbon\Carbon;
use Auth;

class CheckBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    // create
    public function create()
    {
        $year = Carbon::now()->format('Y');
        $date = Carbon::now()->format('d');
        $bookhead = CheckBookTransection::orderBy('id', 'DESC')->first();
        if ($bookhead) {
            $book_id = $year . $date . $bookhead->id;
        } else {
            $book_id = $year . $date . '0';
        }
        $allbankaccount = ChartOfAccount::where('subcategoryone_id', 18)->get();
        return view('accounts.checkbook.create', compact('allbankaccount', 'book_id'));
    }
    // get all checkentry
    public function getallcheckentry($bank_code)
    {
        $year = Carbon::now()->format('Y');
        $date = Carbon::now()->format('d');
        $bookhead = CheckBookTransection::orderBy('id', 'DESC')->first();
        if ($bookhead) {
            $book_id = $year . $date . $bookhead->id;
        } else {
            $book_id = $year . $date . '0';
        }
        $bookig_id = CheckBookTransection::select(['id'])->first();
        return view('accounts.checkbook.ajax.allchequeentry', compact('bank_code', 'book_id'));
    }

    // chekcbooktransectioninsert
    public function chekcbooktransectioninsert(Request $request)
    {
        $account_code = $request->account_code;
        $book_id = $request->book_id;

        $iqty = $request->check_qty;
        $start = $request->start_id;
        $endid = $start + $iqty;

        for ($asif = $start; $asif < $endid; ++$asif) {
            $insert = CheckBookTransection::insert([
                'account_code' => $request->account_code,
                'book_id' => $book_id,
                'check_number' => $asif,
                'status' => 'B',
                'created_at' => Carbon::now()->toDateTimeString(),
                'entry_by' => Auth::user()->id,
                'is_active' => 0,
            ]);
        }
        $insert = CheckBookEntry::insert([
            'account_code' => $request->account_code,
            'book_id' => $request->book_id,
            'check_qty' => $request->check_qty,
            'reg_date' => $request->reg_date,
            'start_id' => $request->start_id,
            'remarks' => $request->remarks,
            'created_at' => Carbon::now()->toDateTimeString(),
            'entry_by' => Auth::user()->id,
            'is_active' => 0,
        ]);
        if ($insert) {
            return response("ok");
        }
    }

    // chekcbooktransectionshow
    public function chekcbooktransectionshow(Request $request)
    {
        $bank_code = $request->account_code;
        $iqty = $request->check_qty;
        $start = $request->start_id;
        $endid = $start + $iqty;
        return view('accounts.checkbook.ajax.alldatatable', compact('bank_code', 'iqty', 'start', 'endid'));
    }

    // getbankallstatus
    public function getbankallstatus($bank_code)
    {
        $allbankin = CheckBookEntry::where('account_code', $bank_code)->get();
        return view('accounts.checkbook.ajax.showaxistionbook', compact('allbankin'));
    }

    // getshowstatusdata
    public function getshowstatusdata($status_show_book_id)
    {
        $alldata = CheckBookTransection::where('book_id', $status_show_book_id)->get();
        return view('accounts.checkbook.ajax.alldatashowaxistionbook', compact('alldata'));
    }
}
