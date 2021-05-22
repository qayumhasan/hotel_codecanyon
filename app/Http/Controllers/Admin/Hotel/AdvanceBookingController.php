<?php

namespace App\Http\Controllers\Admin\Hotel;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvanceBooking as ResourcesAdvanceBooking;
use App\Http\Resources\DayByDayCalenderCollection;
use App\Models\AdvanceBooking;
use App\Models\Checkin;
use App\Models\Guest;
use App\Models\Room;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdvanceBookingController extends Controller
{
    /**
     * Check is Admin is login.
     */


    public function __construct(){
    	$this->middleware('admin');
    }

    /**
     * Show Advance Booking Form.
     * @return \Illuminate\View\View
     */

    public function showAdvanceBookingForm()
    {
        $roomtypes = RoomType::all();
        $guests = Guest::orderBy('id','desc')->get();
        return view('hotelbooking.advancebooking.create', compact('roomtypes', 'guests'));
    }

     /**
     * Show advance booking get room.
     * @return Illuminate\Foundation\respones;
     */


    public function advanceBookingGetRoom($id)
    {

        $rooms = Room::where('room_type', $id)->with('roomtype')->get();
        return response()->json($rooms);
    }

     /**
     * Advance Booking Guest Name store.
     * @return Illuminate\Foundation\respones;
     */


    public function guestNameStore(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'print_name' => 'required',
            'mobile' => 'required',
            'guest_name' => 'required',
            'gender' => 'required',
            'city' => 'required',
        ]);

        $insert=Guest::insertGetId([
            'title'=>$request->title,
            'guest_name'=>$request->guest_name,
            'print_name'=>$request->print_name,
            'gender'=>$request->gender,
            'city'=>$request->city,
            'company_name'=>$request->company_name,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
            'account_head'=>"Accounts Receivable-Clients",
            'account_head_code'=>"18-16-0024-20132",
            'entry_by'=>Auth::user()->id,
        ]);

        $update=Guest::where('id', $insert)->update([
            'guest_id'=>'guest-'.$insert,
        ]);
        
        if($insert){
            $guests = Guest::where('is_active',1)->orderBy('id', 'desc')->where('is_deleted',0)->get();
            return response()->json([
                'guests'=>$guests,
                'id'=>$insert,
            ]);
        }

        
    }

     /**
     * Advance Booking create.
     */

    public function advanceBookingStore(Request $request)
    {
        if(!$request->room){
            $notification=array(
                'messege'=>'Please!Select A Room!!',
                'alert-type'=>'success'
                );
            return redirect()->back()->with($notification);
        }
        $request->validate([
            'room' => 'required',
            'booked_date' => 'required',
            'checkindate' => 'required',
            'checkintime' => 'required',
            'checkoutdate' => 'required',
            'checkouttime' => 'required',
            'guest_name' => 'required',
            'room_type' => 'required',
            'no_of_room' => 'required',
        ]);

        $validator = Validator::make($request->all(), [
            'room' => 'required',
            'booked_date' => 'required',
            'checkindate' => 'required',
            'checkintime' => 'required',
            'checkoutdate' => 'required',
            'checkouttime' => 'required',
            'guest_name' => 'required',
            'room_type' => 'required',
            'no_of_room' => 'required',
        ]);

        if ($validator->fails()) {
            $notification=array(
                'messege'=>'Advance Booking Fails. Something is Missing!',
                'alert-type'=>'success'
                );
            return redirect()->back()->with($notification);
        }




        foreach ($request->room as $row) {


            $booking = new AdvanceBooking();
            $booking->booking_id = $request->booking_id;
            $booking->booked_by = auth()->user()->id;
            $booking->booking_date = $request->booked_date;
            $booking->checkindate = $request->checkindate;
            $booking->checkintime = $request->checkintime;
            $booking->checkoutdate = $request->checkoutdate;
            $booking->checkouttime = $request->checkouttime;
            $booking->guest_id = $request->guest_name;
            $booking->room_type = $request->room_type;
            $booking->no_of_rooms = $request->no_of_room;
            $booking->room_id = $row;
            $booking->year = (int)date('Y');


            $room = Room::findOrFail($row);
            if ($room) {
                $booking->tariff = $room->tariff;
            }


            $booking->thru_agent = $request->thru_agent;
            $booking->booking_source = $request->find_us;
            $booking->remarks = $request->remarks;
            $booking->is_active = $request->is_active;
            $booking->entry_by = auth()->user()->id;
            $booking->entry_date = Carbon::now();
            $booking->save();
        }

        $notification=array(
            'messege'=>'Advance Booking Create Successfully!',
            'alert-type'=>'success'
            );
        return redirect()->back()->with($notification);
    }


    
     /**
     * Advance Booking check if room already checked.
     */

    public function advanceBookingCheck(Request $request, $id)
    {
        
        

        $checkindate = $request->checkin;

        $checkindate = str_replace('/', '-', $checkindate);
        $newcheckindate = strtotime($checkindate);
        $checkindate = date('Y-m-d', $newcheckindate);


        $checkoutdate = $request->checkout;
        $checkoutdate = str_replace('/', '-', $checkoutdate);
        $newcheckoutdate = strtotime($checkoutdate);
        $checkoutdate = date('Y-m-d', $newcheckoutdate);

        $checkin = Checkin::where('room_id', $id)->whereBetween('exp_checkin_date', [$checkindate, $checkoutdate])->first();

        $advancebooking = AdvanceBooking::where('room_id',$id)->whereBetween('checkoutdate', [$request->checkin, $request->checkout])->first();
      

        if ($checkin || $advancebooking) {
            if(isset($checkin->checkin_date)){
                $checkin = $checkin->checkin_date;
            }else if(isset($advancebooking->checkindate)){
                $checkin = $advancebooking->checkindate;
            }

            if(isset($checkin->exp_checkin_date)){
                $checkout = $checkin->exp_checkin_date;
            }else if(isset($advancebooking->checkoutdate)){
                $checkout = $advancebooking->checkoutdate;
            }
            return response()->json([
                'checkindate' => $checkin,
                'checkoutdate' => $checkout,
            ]);
        }
    }

    
     /**
     * Showing Advance Booking Report Page.
     */

    public function showAdvanceBookingReportPage()
    {
        
        $advances = AdvanceBooking::where('is_deleted',0)->orderBy('id', 'DESC')->get();
        return view('hotelbooking.advancebooking.report.report', compact('advances'));
    }

    
     /**
     * Showing Advance Booking Report Edit.
     */

    public function showAdvanceBookingReportEdit($id)
    {
        $roomtypes = RoomType::all();
        $guests = Guest::orderBy('id','desc')->get();
        $advancebooking =AdvanceBooking::findOrFail($id);
        return view('hotelbooking.advancebooking.report.edit', compact('advancebooking','roomtypes','guests'));
    }

    /**
     * Showing Advance Booking Report Update.
     */


    public function showAdvanceBookingReportUpdate (Request $request ,$id)
    {

        $request->validate([
            'room' => 'required',
            'booked_date' => 'required',
            'checkindate' => 'required',
            'checkintime' => 'required',
            'checkoutdate' => 'required',
            'checkouttime' => 'required',
            'guest_name' => 'required',
            'room_type' => 'required',
            'no_of_room' => 'required',
        ]);

        if(!$request->room){
            $notification=array(
                'messege'=>'Please!Select A Room!!',
                'alert-type'=>'success'
                );
            return redirect()->back()->with($notification);
        }

        $advancebooking = AdvanceBooking::findOrFail($id);

        if(!in_array($advancebooking->room_id,$request->room)){
         
            $advancebooking->delete();
        }

        foreach ($request->room as $row) {
            

            if($advancebooking->room_id == $row){
                $advancebooking->booking_id = $request->booking_id;
                $advancebooking->booked_by = auth()->user()->id;
                $advancebooking->booking_date = $request->booked_date;
                $advancebooking->checkindate = $request->checkindate;
                $advancebooking->checkintime = $request->checkintime;
                $advancebooking->checkoutdate = $request->checkoutdate;
                $advancebooking->checkouttime = $request->checkouttime;
                $advancebooking->guest_id = $request->guest_name;
                $advancebooking->room_type = $request->room_type;
                $advancebooking->no_of_rooms = $request->no_of_room;
                $advancebooking->year = (int)date('Y');
    
    
                // $room = Room::findOrFail($row);
                // if ($room) {
                //     $advancebooking->tariff = $room->tariff;
                // }
    
    
                $advancebooking->thru_agent = $request->thru_agent;
                $advancebooking->booking_source = $request->find_us;
                $advancebooking->remarks = $request->remarks;
                $advancebooking->is_active = $request->is_active;
                $advancebooking->updated_by = auth()->user()->id;
                $advancebooking->updated_date = Carbon::now();

                $advancebooking->save();

            }else{
            $advancebooking = new AdvanceBooking();
            $advancebooking->booking_id = $request->booking_id;
            $advancebooking->booked_by = auth()->user()->id;
            $advancebooking->booking_date = $request->booked_date;
            $advancebooking->checkindate = $request->checkindate;
            $advancebooking->checkintime = $request->checkintime;
            $advancebooking->checkoutdate = $request->checkoutdate;
            $advancebooking->checkouttime = $request->checkouttime;
            $advancebooking->guest_id = $request->guest_name;
            $advancebooking->room_type = $request->room_type;
            $advancebooking->no_of_rooms = $request->no_of_room;
            $advancebooking->room_id = $row;
            $advancebooking->year = (int)date('Y');
    
    
                $room = Room::findOrFail($row);
                if ($room) {
                $advancebooking->tariff = $room->tariff;
                }
    
    
            $advancebooking->thru_agent = $request->thru_agent;
            $advancebooking->booking_source = $request->find_us;
            $advancebooking->remarks = $request->remarks;
            $advancebooking->is_active = $request->is_active;
            $advancebooking->updated_by = auth()->user()->id;
            $advancebooking->updated_date = Carbon::now();

            $advancebooking->save();

            }
        }

        $notification=array(
            'messege'=>'Advance Booking Updated Successfully!',
            'alert-type'=>'success'
            );
        return redirect()->route('admin.advance.booking.report')->with($notification);

    }

     /**
     * Delete Advance Booking Report.
     */

    public function deleteAdvanceBookingReport ($id)
    {
        $advancebooking = AdvanceBooking::findOrFail($id);
        $advancebooking->delete();
        
        $notification=array(
            'messege'=>'Advance Booking Deleted Successfully!',
            'alert-type'=>'success'
            );
        return redirect()->route('admin.advance.booking.report')->with($notification);
    }

    /**
     * Change Advance Booking report status.
     */


    public function statusAdvanceBookingReport ($id)
    {
       
        $advancebooking = AdvanceBooking::findOrFail($id);
        if($advancebooking->is_active == 1){
            $advancebooking->is_active = 0;
            $advancebooking->save();
        }else if($advancebooking->is_active == 0){
            $advancebooking->is_active = 1;
            $advancebooking->save();
        }
        
        $notification=array(
            'messege'=>'Advance Booking Status Changed Successfully!',
            'alert-type'=>'success'
            );
        return redirect()->route('admin.advance.booking.report')->with($notification);
    }

     /**
     * Advance Booking Calender wise report.
     */


    public function advanceBookingCalender()
    {
        $roomtypes = RoomType::where('is_active',1)->where('is_deleted',0)->get();
        return view('hotelbooking.advancebooking.report.calender',compact('roomtypes'));
    }

    
     /**
     * Get Advance Booking Report data.
     */

    public function getadvanceBookingReport(Request $request)
    {
    
        $advancebooking = AdvanceBooking::where('room_type',$request->room_type)->where('year',$request->year)->get();
        return new ResourcesAdvanceBooking($advancebooking);
    }

       
     /**
     * advance booking room show.
     */

    public function advanceBookingRoom($id)
    {
        $advancebooking = AdvanceBooking::findOrFail($id);
        return view('hotelbooking.advancebooking.report.booking_show',compact('advancebooking'));
    }

    /**
     * advance booking calender day by day wise Report.
     */

    public function advanceBookingCalenderDaybyDay()
    {
        
        $roomtypes = RoomType::where('is_active',1)->where('is_deleted',0)->get();
        return view('hotelbooking.advancebooking.report.daybydaycalender',compact('roomtypes'));
    }

     /**
     * advance booking  day by day wise Report.
     */

    public function getadvanceBookingReportDayByDay(Request $request)
    {
        $advancebooking = AdvanceBooking::where('room_type',$request->room_type)->where('year',$request->year)->get();
        return new DayByDayCalenderCollection($advancebooking);
    }
}
