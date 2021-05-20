<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscrive;
use App\Models\ContactMessage;
use App\Models\MailSend;
use Mail;
use App\Mail\SendMail;
use Carbon\Carbon;
use Session;

class EmailController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }
    //
    public function index(){
    	$subscrivemail = Subscrive::get();
    	$allmail = ContactMessage::where('is_deleted',0)->OrderBy('id','DESC')->get();
    	$newmessage=ContactMessage::where('is_deleted',0)->where('is_seen',0)->count();
    	$alldeleted = ContactMessage::where('is_deleted',1)->OrderBy('id','DESC')->get();
    	$allstarted = ContactMessage::where('starred',1)->where('is_deleted',0)->OrderBy('id','DESC')->get();

    	$allsendmail = MailSend::OrderBy('id','DESC')->get();
    	return view('backend.email.allmail',compact('allsendmail','subscrivemail','allmail','newmessage','alldeleted','allstarted'));
    }
   
    // started
    public function started($dataid,$val){
    	if($val==0){
    		$update=ContactMessage::where('id',$dataid)->update([
    		'starred'=>1,
    		]);
    		return response("1");
    	}else{
    		$update=ContactMessage::where('id',$dataid)->update([
    		'starred'=>0,
    		]);
    		return response("o");
   		}

    }

    public function view($val){
    	//return "ok";
    	$update=ContactMessage::where('id',$val)->update([
    		'is_seen'=>1,
    		]);
    	return response("");
    }

    public function delete($id){
    	$delete=ContactMessage::where('id',$id)->delete();
    	if($delete){
          Session::flash('trashsuccess');
        	$notification = array(
              'messege' => 'Mail delete Success!',
              'alert-type' =>'success'
          	);
          	return redirect()->back()->with($notification);
        }else{
        	$notification = array(
              'messege' => 'Mail delete Faild!',
              'alert-type' =>'error'
          	);
          	return redirect()->back()->with($notification);
        }
    }
    // individual
    public function individualemail($val){
    	//return $val;
    	$data=ContactMessage::where('id',$val)->select(['email'])->first();
    	return json_encode($data);

    }
    //
    public function sendmaildelete($id){
    	$delete=MailSend::where('id',$id)->delete();
    	if($delete){
          Session::flash('sendmailsuccess');
        	$notification = array(
              'messege' => 'Mail delete Success!',
              'alert-type' =>'success'
          	);
          	return redirect()->back()->with($notification);
        }else{
        	$notification = array(
              'messege' => 'Mail delete Faild!',
              'alert-type' =>'error'
          	);
          	return redirect()->back()->with($notification);
        }
    }
}
