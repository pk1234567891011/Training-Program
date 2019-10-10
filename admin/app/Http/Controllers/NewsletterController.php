<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsletterSubscriber;
use Maatwebsite\Excel\Facades\Excel;
class NewsletterController extends Controller
{
    public function chkSubscriber(Request $request){
        if($request->ajax()){
            $data=$request->all();
            $subscriberCount=NewsletterSubscriber::where('email',$data['subscriber_email'])->count();
            if($subscriberCount>0){
               echo "exists";
                
            }
        }
    }
    public function addSubscriber(Request $request){
        if($request->ajax()){
            $data=$request->all();
           

            $subscriberCount=NewsletterSubscriber::where('email',$data['subscriber_email'])->count();
            if($subscriberCount>0){
               echo "exists";
                
            }
            else{
                $newsletter=new NewsletterSubscriber();
                $newsletter->email=$data['subscriber_email'];
                $newsletter->status=1;
                $newsletter->save();
                echo "Saved";

            }
        }
    }
    public function viewNewsletterSubscribers(){
        $newsletter=NewsletterSubscriber::all();
        return view('newsletter.view',compact('newsletter'));
    }
    public function updateNewsletterSubscribers($id,$status){
        $newsletter=NewsletterSubscriber::where('id',$id)->update(['status'=>$status]);
        return redirect()->back()->with('flash_message_success',"Status has been updated");
    }
    public function deleteNewsletterSubscribers($id){
       NewsletterSubscriber::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success',"Newsletter Email has been deleted");
    }
    public function exportNewsletterSubscribers(){
       $subscriberData= NewsletterSubscriber::select('id','email','created_at')->where('status',1)->get();
      
        return Excel::create('subscriber'.rand(),function($excel) use ($subscriberData){
            $excel->sheet('Mysheet',function($sheet) use ($subscriberData){
                $sheet->fromArray($subscriberData);
            });
        })->download('xlsx');
     }
}
