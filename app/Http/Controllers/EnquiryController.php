<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Models\Enquiry;
use App\Mail\Feedback;
use App\Mail\ClientFeedback;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Rules\NoSpam;
use Jaybizzle\CrawlerDetect\CrawlerDetect;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Http;

class EnquiryController extends Controller{
    
    
    
     public function give_review(Request $request)
    {
       
      $validator = $request->validate([
        'name'=>'required',
        'course'=>'required',
        'review'=>'required',
        'desigination'=>'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
    ]);
   
     $blogId = DB::table('tbl_course_testimonial')->insertGetId([
        'name' => $request->name,
        'heading' => $request->desigination,
        'description' => $request->review,
        'course_id' => $request->course,
        'video_link'=>'#',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);

    $inserted = DB::table('tbl_course_testimonial')->where('id', $blogId)->update(['image' => $filename]);
    }

    if($inserted)
           {
            return back()->with('success', 'Posted successfully.');
           }else{
            return back()->withErrors(['error' => 'Insertion Failed.'])->withInput();
           }
    }

    
    public function sendDropQuery(Request $request){
         $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}
        $page_url=$request->post('page_url');
        $form_type=$request->post('form_type');
        $query=$request->post('query');
        $phone_our_learners=$request->post('phone_our_learners');
        $email=$request->post('email');
        $crdate=date('Y-m-d h:i:s');
        if($email!='' && $phone_our_learners!=''){
      $sql=  DB::insert("INSERT INTO enquiry_form(email,phone,updated_at,created_at,form_type,message,page_url)VALUES('$email','$phone_our_learners','$crdate','$crdate','$form_type','$query','$page_url')");
       if($sql){
           
            $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
             'page_url' =>  $request->post('page_url'),
            
            'email' =>  $request->post('email'),

            'phone' =>  $request->post('phone_our_learners'),

            'message' =>  $request->post('query'),
          
        ];
     $this->sendMailAll($request['email'],$request['email'],$details);
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success21', 'Your Query Send Successfully. We will get back soon!!!!');

           return redirect(url('/thanks'));
           
           
       } 
        }
       
       
    }
    
    
    public function sendVideoLink(Request $request){
        
        
    $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}


       $page_url=$request->post('page_url');
          $form_type=$request->post('form_type');
         $email_request=$request->post('email_request');
          $phone_career=$request->post('phone_career');
          if($phone_career!='' && $email_request!=''){
         $sql= DB::insert("INSERT INTO enquiry_form(email,phone,form_type,page_url)VALUES('$email_request','$phone_career','$form_type','$page_url')");
         $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
             'page_url' =>  $request->post('page_url'),
            
            'email' =>  $request->post('email_request'),

            'phone' =>  $request->post('phone_career'),
            

           
          
        ];
        if ($sql) {
            
              $this->sendMailAll($request['email_request'],$request['email_request'],$details);
    return redirect()->away('https://www.youtube.com/@tgcanimation');
}

}
    }
    
    
    
    
    
    public function home_demopopup_applynow(Request $request){
        // dd($request)
        
        $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}


        $request->validate([

            'name_home_demopopup_applynow'=>'required',
            'email_home_demopopup_applynow'=>'required|email',
            'phone_home_demopopup_applynow'=>'required',
            
        ],[
            'name_home_demopopup_applynow.required' => 'The name field is required.',
            'email_home_demopopup_applynow.required' => 'The email field is required.',
            'email_home_demopopup_applynow.email' => 'The email must be a valid email address.',
            'phone_home_demopopup_applynow.required' => 'The phone field is required.',
            
           
        ]);

          
            
        $enquiry = new Enquiry;
        $enquiry->name = $request['name_home_demopopup_applynow'];
        $enquiry->email = $request['email_home_demopopup_applynow'];
        $enquiry->phone =  $request->input('phone_home_demopopup_applynow');
        $enquiry->form_type = $request['form_type'];
         $enquiry->page_url = $request['course_popup_url'];
        $enquiry->save();
        
        

        $details=[
            'title'=>$request['form_type']." TGC India Leadttt form",
            'name' =>  $enquiry->name,
            'email'=> $enquiry->email,
            'phone'=> $enquiry->phone,
            'url'=> $enquiry->page_url,
           
        ];
      //  Mail::to('ravindrafeednow@gmail.com')->send(new Feedback($details));
    
        
        // return redirect()->back()->with('success_demopopup', 'Your Query Send Successfully. We will get back soon!!!!');
         return redirect(url('/thanks'));
    }


 public function sendDemoNotification(Request $request){
     
     
        $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}


     $mobile=$request->post('phone');
      $url=$request->post('url');
           $device=$request->post('device');
         $sql=  DB::insert("INSERT INTO enquiry_form(phone,page_url,form_type)VALUES('$mobile','$url','footer_notification')");
         
           $details=[
                'title'=>"Your Enquiry Form footer Notification",
                 'page_url'=>$url,
                 'form_type'=>'Footer Notification',
                'phone'=>'Your Phone: '.$mobile,
               
            ];
            
           
         if ($sql) {
   $recipients =$this->getReceiptMail();
//$userEmail="ravindrafeednow@gmail.com";
    Mail::to($recipients)->send(new Feedback($details));
    
  
    return redirect(url('/thanks'));
}

 }
    
        public function home_popup_enrollnow(Request $request){
           $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
            
             // Honeypot check
       if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
      }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}


    
            $request->validate([
    
                'name_popoenrollnow'=>'required',
                'email_popoenrollnow'=>'required|email',
                'phone_popoenrollnow'=>'required',
                
            ],[
                'name_popoenrollnow.required' => 'The name field is required.',
                'email_popoenrollnow.required' => 'The email field is required.',
                'email_popoenrollnow.email' => 'The email must be a valid email address.',
                'phone_popoenrollnow.required' => 'The phone field is required.',
                
               
            ]);
    
              
                
            $enquiry = new Enquiry;
            $enquiry->name = $request['name_popoenrollnow'];
            $enquiry->email = $request['email_popoenrollnow'];
            $enquiry->phone =  $request->input('phone_popoenrollnow');
            $enquiry->form_type = $request['form_type'];
            $enquiry->page_url = $request['popup_page_url'];
            $enquiry->save();
    
            $details=[
                'title'=>$request['form_type']." TGC India Lead form",
                'name' =>  $enquiry->name,
                'email'=> $enquiry->email,
                'phone'=>$enquiry->phone,
                 'url'=>$enquiry->page_url,
               
            ];
     $Clientdetails=[
                
                'name'=>$request['name_popoenrollnow'],
               
            ];
    $recipients =$this->getReceiptMail();
    $userEmail=$request['email_popoenrollnow'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
        
            
            // return redirect()->back()->with('success_popoenrollnow', 'Your Query Send Successfully. We will get back soon!!!!');
             return redirect(url('/thanks'));
        }
public function getReceiptMail(){
    ///'info@tgcindia.com',
    $recipients = [
        'info@tgcindia.com',
        'tgcanimation@gmail.com',
         'ravindrafeednow@gmail.com',
        'ranjan354@gmail.com',
    ];
    
    return $recipients;
}
   

    public function sendOffer_popup(Request $request){
        
        
        $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
        
        
         // Honeypot check
         if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
      }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}



        $request->validate([

            'name_home_offerpopup'=>'required',
            'email_home_offerpopup'=>'required|email',
            'phone_home_offerpopup'=>'required',
            
        ],[
            'name_home_offerpopup.required' => 'The name field is required.',
            'email_home_offerpopup.required' => 'The email field is required.',
            'email_home_offerpopup.email' => 'The email must be a valid email address.',
            'phone_home_offerpopup.required' => 'The phone field is required.',
            
           
        ]);

          
            
        $enquiry = new Enquiry;
        $enquiry->name = $request['name_home_offerpopup'];
        $enquiry->email = $request['email_home_offerpopup'];
        $enquiry->phone =  $request->input('phone_home_offerpopup');
        $enquiry->form_type = $request['form_type'];
        $enquiry->page_url = $request['page_url'];
        $enquiry->save();


$converted = str_replace('_', ' ', $request['form_type']);
$form_type = ucwords($converted);
        $details=[
            'title'=>$form_type." TGC India Lead form",
            'name' =>  $enquiry->name,
            'email'=> $enquiry->email,
            'phone'=>$enquiry->phone,
             'url'=>$enquiry->page_url,
           
        ];
        
          $Clientdetails=[
                
                'name'=>$request['name_home_offerpopup'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_home_offerpopup'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
    
    
        // //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        
        // return redirect()->back()->with('success_offer', 'Your Query Send Successfully. We will get back soon!!!!');
         return redirect(url('/thanks'));
    }
    
    public function sendDemo_popup(Request $request){
        $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
        
             // Honeypot check
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}

        $request->validate([

            'name_demopopup'=>'required',
            'email_demopopup'=>'required|email',
            'phone_demopopup'=>'required',
            
        ],[
            'name_demopopup.required' => 'The name field is required.',
            'email_demopopup.required' => 'The email field is required.',
            'email_demopopup.email' => 'The email must be a valid email address.',
            'phone_demopopup.required' => 'The phone field is required.',
           
            
           
        ]);

          
            
        $enquiry = new Enquiry;
        $enquiry->name = $request['name_demopopup'];
        $enquiry->email = $request['email_demopopup'];
        $enquiry->phone = $request->input('phone_demopopup');
        $enquiry->form_type = $request['form_type'];
         $enquiry->page_url = $request['home_demo_url'];
        $enquiry->save();

        $details=[
            'title'=>$request['form_type']." TGC India Lead form",
            'name' =>  $enquiry->name,
            'email'=> $enquiry->email,
            'phone'=> $enquiry->phone,
            'page_url'=> $enquiry->page_url,
           
        ];
        
        $Clientdetails=[
                
                'name'=>$request['name_demopopup'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_demopopup'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
    
        // //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        
        // return redirect()->back()->with('success', 'Your Query Send Successfully. We will get back soon!!!!');
         return redirect(url('/thanks'));
    }

    public function sendDemo_popup1(Request $request){
        
        $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    } 
        
         // Honeypot check
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}

        

        
        $request->validate([

            'name_demopopup_home'=>'required',
            'email_demopopup_home'=>'required|email',
            'phone_demopopup_home'=>'required',
            
        ],[
            'name_demopopup_home.required' => 'The name field is required.',
            'email_demopopup_home.required' => 'The email field is required.',
            'email_demopopup_home.email' => 'The email must be a valid email address.',
            'phone_demopopup_home.required' => 'The phone field is required.',
           
            
           
        ]);

          
            
        $enquiry = new Enquiry;
        $enquiry->name = $request['name_demopopup_home'];
        $enquiry->email = $request['email_demopopup_home'];
        $enquiry->phone = $request->input('phone_demopopup_home');
        $enquiry->form_type = $request['form_type'];
        
       $enquiry->page_url = $request['home_demo_url'];
        $enquiry->save();
        

        $details=[
            'title'=>$request['form_type']." TGC India Lead form",
            'name' =>  $enquiry->name,
            'email'=> $enquiry->email,
            'phone'=> $enquiry->phone,
             'url'=> $enquiry->page_url,
           
        ];
        
          $Clientdetails=[
                
                'name'=>$request['name_demopopup_home'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_demopopup_home'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
    
       // Mail::to('ravindrafeednow@gmail.com')->send(new Feedback($details));
    
        
        // return redirect()->back()->with('success1', 'Your Query Send Successfully. We will get back soon!!!!');
         return redirect(url('/thanks'));
    }


    public function indexAbout_enquiry(Request $request)
    {
        
        
         $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    
       $request->validate([
    'name_aboutenquiry'     => 'required',
    'email_aboutenquiry'    => 'required|email',
    'phone_aboutenquiry'    => 'required',
    'subject_aboutenquiry'  => 'required',
    'message_aboutenquiry'  => ['required', new NoSpam], // Add NoSpam rule here
], [
    'name_aboutenquiry.required'     => 'The name field is required.',
    'email_aboutenquiry.required'    => 'The email field is required.',
    'email_aboutenquiry.email'       => 'The email must be a valid email address.',
    'phone_aboutenquiry.required'    => 'The phone field is required.',
    'subject_aboutenquiry.required'  => 'The subject field is required.',
    'message_aboutenquiry.required'  => 'The message field is required.',
]);

    
        $enquiry = new Enquiry;
        $enquiry->name = $request['name_aboutenquiry'];
        $enquiry->email = $request['email_aboutenquiry'];
        $enquiry->phone = $request['phone_aboutenquiry'];
        $enquiry->subject = $request['subject_aboutenquiry'];
        $enquiry->message = $request['message_aboutenquiry'];
        $enquiry->form_type = $request['form_type'];
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
            'name' =>  $enquiry->name,
            'email' =>  $enquiry->email,
            'phone' =>  $enquiry->phone,
            'subject' =>  $enquiry->subject,
            'message' =>  $enquiry->message,
        ];
        
        
          $Clientdetails=[
                
                'name'=>$request['name_aboutenquiry'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_aboutenquiry'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
        // //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
       
        // return redirect()->back()->with('success2', 'Your Query Send Successfully. We will get back soon!!!!');
         return redirect(url('/thanks'));
    }
    

    public function indexAbout_enquiry_new(Request $request)
    {
         $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
        
           // Honeypot check
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}

        

       $request->validate([
    'name_aboutenquiry' => 'required',
    'email_aboutenquiry' => 'required|email',
    'phone_aboutenquiry' => 'required',
    'subject_aboutenquiry' => 'required',
    'message_aboutenquiry' => ['required', new NoSpam], // <--- added NoSpam here
],[
    'name_aboutenquiry.required' => 'The name field is required.',
    'email_aboutenquiry.required' => 'The email field is required.',
    'email_aboutenquiry.email' => 'The email must be a valid email address.',
    'phone_aboutenquiry.required' => 'The phone field is required.',
    'subject_aboutenquiry.required' => 'The subject field is required.',
    'message_aboutenquiry.required' => 'The message field is required.',
]);
        $enquiry = new Enquiry;
           $enquiry->page_url = $request['page_url'];
        $enquiry->name = $request['name_aboutenquiry'];
        $enquiry->email = $request['email_aboutenquiry'];
        $enquiry->phone = $request['phone_aboutenquiry'];
        $enquiry->subject = $request['subject_aboutenquiry'];
        $enquiry->message = $request['message_aboutenquiry'];
        $enquiry->form_type = $request['form_type'];
          $enquiry->page_url = $request['page_url'];
        
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
            'name' => $enquiry->name,
            'email' =>  $enquiry->email,
            'phone' => $enquiry->phone,
            'subject' =>  $enquiry->subject,
            'message' =>  $enquiry->message,
            'url' =>  $enquiry->page_url,
        ];
    
     
     
      $Clientdetails=[
                
                'name'=>$request['name_aboutenquiry'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_aboutenquiry'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));

           //Mail::to('st765191@gmail.com')->send(new Feedback($details));

        return redirect(url('/thanks'));

    
      
    }

    public function homeGetintouch_enquiry(Request $request)
    {
        
         $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
        
        // Honeypot check
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}


  
        $request->validate([
            'get_in_touch_name' => 'required',
            'get_in_touch_email' => 'required|email',
            'get_in_touch_phone' => 'required'
           
        ]);
    
      
    
        $enquiry = new Enquiry;
        $enquiry->name = $request['get_in_touch_name'];
        $enquiry->email = $request['get_in_touch_email'];
        $enquiry->phone = $request['get_in_touch_phone'];
         $enquiry->page_url = $request['form_footer_url'];
        
     
        $enquiry->form_type = $request['form_type'];
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
            'name' => $enquiry->get_in_touch_name,
            'email' => $enquiry->get_in_touch_email,
            'phone' =>  $enquiry->get_in_touch_phone,
             'url' =>  $enquiry->page_url
            
        ];
    
    
      
      $Clientdetails=[
                
                'name'=>$request['get_in_touch_name'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['get_in_touch_email'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success3', 'Your Query Send Successfully. We will get back soon!!!!');
         return redirect(url('/thanks'));
    }
    


    public function enroll_now_live_online(Request $request)
    {
        
         $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
        
          // Honeypot check
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}

       
        $request->validate([
            
            'email_course_enquiry' => 'required|email',
            'phone_course_enquiry' => 'required'
           
        ],[
            'email_course_enquiry.required' => 'The email field is required.',
            'email_course_enquiry.email' => 'The email must be a valid email address.',
            'phone_course_enquiry.required' => 'The phone field is required.',
            
           
        ]);
    
        $enquiry = new Enquiry;
      
        $enquiry->email = $request['email_course_enquiry'];
        $enquiry->phone = $request['phone_course_enquiry'];
     
      $enquiry->page_url = $request['course_url1'];
        $enquiry->form_type = $request['form_type'];
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
            
            'email' =>  $enquiry->email,
            'phone' =>  $enquiry->phone,
             'url' =>  $enquiry->page_url,
            
        ];
        
        $Clientdetails=[
                
                'name'=>$request['email_course_enquiry'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_course_enquiry'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success4', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }
    
   
    public function down_curri_live_online(Request $request)
    {
        
           $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    
    
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }
    
    
    
     // 4️⃣ Rate limit (IP based)
    $key = 'curri:' . $request->ip();
    if (RateLimiter::tooManyAttempts($key, 3)) {
        return back()->withErrors(['spam' => 'Too many attempts'])->withInput();
    }
    RateLimiter::hit($key, 60);
    

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}

$request->validate([
    'email_course_down' => 'required|email:rfc,dns|max:100',
    'phone_course_down' => [
        'required',
        'regex:/^[6-9]\d{9}$/',   // valid Indian mobile
        new NoSpam,
    ],
], [
    'email_course_down.required' => 'The email field is required.',
    'email_course_down.email'    => 'Please enter a valid email address.',
    'phone_course_down.required' => 'The phone field is required.',
    'phone_course_down.regex'    => 'Please enter a valid mobile number.',
]);

/*
$response = Http::asForm()->post(
    'https://www.google.com/recaptcha/api/siteverify',
    [
        'secret'   => config('services.nocaptcha.secret'),
        'response' => $request->recaptcha_token,
        'remoteip' => $request->ip(),
    ]
);




if (!$response->ok() || !$response['success']) {
    return back()->withErrors([
        'captcha' => 'Captcha verification failed.'
    ])->withInput();
}

$score = $response['score'] ?? 0;

if ($score < 0.5) {
    return back()->withErrors([
        'captcha' => 'Suspicious activity detected.'
    ])->withInput();
}

*/

//dd($response->json());
//die;

///\Log::info('Recaptcha response', $response->json());

/*
$email = $request->email_course_down;

$existsLast24Hours = DB::table('enquiry_form')
    ->where('email', $email)
    ->where('created_at', '>=', now()->subHours(24))
    ->exists();

if ($existsLast24Hours) {
    return back()
        ->withErrors([
            'email_course_down' => 'You have already submitted this form in the last 24 hours.'
        ])
        ->withInput();
}


*/
          $enquiry = new Enquiry;
      
        $enquiry->email = $request['email_course_down'];
        $enquiry->phone = $request['phone_course_down'];
      $enquiry->page_url = $request['page_url'];
        $enquiry->form_type = $request['form_type'];
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
            
            'email' =>  $enquiry->email,
            'phone' =>  $enquiry->phone,
             'url' =>  $enquiry->page_url
            
        ];
        
         
        $Clientdetails=[
                
                'name'=>$request['email_course_down'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_course_down'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    $pdfRequest = $request['pdf_curriculum'] ?? null;
          // return redirect()->back()->with('success5', 'Your Query Send Successfully. We will get back soon!!!!');
          if($pdfRequest!=''){
              return redirect(url('public/uploads/'.$pdfRequest));
              
          }else{
          
        return redirect(url('/thanks'));
          }
    }
    
    
    
    
    
    public function sendSyllbusPdf(Request $request){
        
       $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
       
        // Honeypot check
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}

       $course_id=$request->post('course_id');
       $form_type=$request->post('form_type');
        $page_url=$request->post('page_url');
         $email_certification_getintouch=$request->post('email_certification_getintouch');
          $phone_certification_getintouch=$request->post('phone_certification_getintouch');
          if($email_certification_getintouch!='' && $phone_certification_getintouch!=''){
          $sql=DB::insert("INSERT INTO enquiry_form(email,phone,form_type,page_url)VALUES('$email_certification_getintouch','$phone_certification_getintouch','$form_type','$page_url')");
     $details=[
             
                
                'email'=>$request['email_certification_getintouch'],
                  'phone' => $request['phone_certification_getintouch'],
                  'url' => $page_url,
               
            ];
            
    
      if($sql){
            $this->sendMailAll($request['email_certification_getintouch'],$request['email_certification_getintouch'],$details);
            //if($request->post('pdf_curriculum')!=''){
           return redirect('https://www.tgcindia.com/get-syllabus-pdf/' . $request->post('course_id'));

           // }else{
            //  return redirect(url('/thank-you.html'));  
           // }
          
      }
          }
  
    }
    
    
    
    public function classroom_training_live_online(Request $request)
 {
    
   
     $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    
    
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}


        $request->validate([
            'phone_enroll' => 'required'
        ],

        [
            'phone_enroll.required' => 'The phone field is required.',
       
    ]);

        $enquiry = new Enquiry;
        $enquiry->phone = $request->input('phone_enroll');
        $enquiry->form_type = $request->input('form_type');
         $enquiry->page_url = $request->input('course_get_free_url');
        
        $enquiry->save();

        $details = [
            'title' => $request->input('form_type')." TGC India Lead form",
            'phone' =>  $enquiry->phone,
            'URL' =>  $enquiry->page_url,
        ];


 
            
         $recipients =$this->getReceiptMail();
   // $userEmail=$request['email_course_down'];
    Mail::to($recipients)->send(new Feedback($details));
    
   // Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success6', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }

    
    public function classroom_training_live_online_enrollnow(Request $request)
    {
       $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    
    
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}

        $request->validate([
            
            
            'email_classroom_enrollnow' => 'required|email',
            'phone_classroom_enrollnow' => 'required'
           
        ],[
            'email_classroom_enrollnow.required' => 'The email field is required.',
            'email_classroom_enrollnow.email' => 'The email must be a valid email address.',
            'phone_classroom_enrollnow.required' => 'The phone field is required.',
            
           
        ]);
    
        $enquiry = new Enquiry;
      
        $enquiry->email = $request['email_classroom_enrollnow'];
        $enquiry->phone = $request['phone_classroom_enrollnow'];
        $batch = $request->placehere;
        
        $enquiry->form_type = $request['form_type'];
         $enquiry->page_url = $request['course_url2'];
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
            
            'email' =>  $enquiry->email,
            'phone' =>  $enquiry->phone,
            'batch' =>  $batch,
             'url' =>  $enquiry->page_url,
            
        ];
    
    
      $Clientdetails=[
                
                'name'=>$request['email_classroom_enrollnow'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_classroom_enrollnow'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success7', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/enroll-now.html'));
    }
    
    public function batch_requestnow(Request $request)
    {
        
         $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    
    
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}

        // dd($request);
        $request->validate([
            
            'name_batch' =>'required',
            'email_batch' => 'required|email',
            'phone_batch' => 'required'
           
        ],[
            'name_batch.required' => 'The name field is required.',
            'email_batch.required' => 'The email field is required.',
            'email_batch.email' => 'The email must be a valid email address.',
            'phone_batch.required' => 'The phone field is required.',
            
           
        ]);
    
        $enquiry = new Enquiry;
        $enquiry->name = $request['name_batch'];
        $enquiry->email = $request['email_batch'];
        $enquiry->phone = $request['phone_batch'];
        $enquiry->page_url = $request['page4_url'];
     
        $enquiry->form_type = $request['form_type'];
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
            'name' => $enquiry->name,
            'email' => $enquiry->email,
            'phone' =>  $enquiry->phone,
            'url' =>  $enquiry->page_url
            
        ];
    
    
     $Clientdetails=[
                
                'name'=>$request['name_batch'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_batch'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success8', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }

    public function corporate_training_live_online(Request $request)
    {
        $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }


  // Honeypot check
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}

      $request->validate([
    'name_batch' => ['required'],
    'email_batch' => ['required', 'email'],
    'phone_batch' => ['required'],
    'company_name_batch' => ['required'],
    'training_batch' => ['required'],
    'message_batch' => ['required', new NoSpam],
], [
    'name_batch.required' => 'The name field is required.',
    'email_batch.required' => 'The email field is required.',
    'email_batch.email' => 'The email must be a valid email address.',
    'phone_batch.required' => 'The phone field is required.',
    'company_name_batch.required' => 'The company name field is required.',
    'training_batch.required' => 'The training field is required.',
    'message_batch.required' => 'The message field is required.',
    // Optional: Custom message for the NoSpam rule
    'message_batch' => 'Your message appears to be spam. Please revise it.',
]);

    
        $enquiry = new Enquiry;
        $enquiry->name = $request['name_batch'];
        $enquiry->email = $request['email_batch'];
        $enquiry->phone = $request['phone_batch'];
        $enquiry->company_name = $request['company_name_batch'];
        $enquiry->training = $request['training_batch'];
        $enquiry->message = $request['message_batch'];
        $enquiry->form_type = $request['form_type'];
        $enquiry->page_url = $request['page_url'];
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
            'name' =>  $enquiry->name,
            'company_name' =>  $enquiry->company_name,
            'training' =>  $enquiry->training,
            'email' =>  $enquiry->email,
            'phone' =>  $enquiry->phone,
            'message' =>  $enquiry->message,
             'url' =>  $enquiry->page_url,
            
        ];
    
    
    
      $Clientdetails=[
                
                'name'=>$request['name_batch'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_batch'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success9', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }

    public function career_counselling (Request $request)
    {
       $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
        
            // Honeypot check
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}

        
        $request->validate([
            
          
            'email_career' => 'required|email',
            'phone_career' => 'required'
         
        ],[
            
            'email_career.required' => 'The email field is required.',
            'email_career.email' => 'The email must be a valid email address.',
            'phone_career.required' => 'The phone field is required.',
            
           
        ]);
    
        $enquiry = new Enquiry;

        $enquiry->email = $request['email_career'];
        $enquiry->phone =  $request->input('phone_career');
        $enquiry->form_type = $request['form_type'];
        $enquiry->page_url = $request['page6_url'];
     
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
            'email' =>  $enquiry->email,
            'phone' =>  $enquiry->phone,
             'url' =>  $enquiry->page_url,
        
        ];
    
    
     $Clientdetails=[
                
                'name'=>$request['email_career'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_career'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success10', 'Your Query Send Successfully. We will get back soon!!!!');
         return redirect(url('/thanks'));
    }


public function RequestcallBackVideo(Request $request){
    
   $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
     // Honeypot check
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}

   
    $page_url=$request->post('page_url');
          $form_type=$request->post('form_type');
        
          $phone_career=$request->post('phone_career');
          if($phone_career!=''){
         $sql= DB::insert("INSERT INTO enquiry_form(phone,form_type,page_url)VALUES('$phone_career','$form_type','$page_url')");
         $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
             'page_url' =>  $request->post('page_url'),
            
           

            'phone' =>  $request->post('phone_career'),
            

           
          
        ];
        if ($sql) {
            
            ///  $this->sendMailAll($request['email_request'],$request['email_request'],$details);
    return redirect()->away('https://www.youtube.com/@tgcanimation');
}
}
}

    public function curriculum_enrollnow (Request $request)

    {
          $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    
    
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}

        $request->validate([
            
          
            'email_curriculum' => 'required|email',
            'phone_curriculum' => 'required'
         
        ],[
            
            'email_curriculum.required' => 'The email field is required.',
            'email_curriculum.email' => 'The email must be a valid email address.',
            'phone_curriculum.required' => 'The phone field is required.',
            
           
        ]);
    
        $enquiry = new Enquiry;

        $enquiry->email = $request['email_curriculum'];
        $enquiry->phone = $request['phone_curriculum'];
        $enquiry->form_type = $request['form_type'];
        $enquiry->page_url = $request['page7_url'];
     
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
            'email' =>  $enquiry->email,
            'phone' =>  $enquiry->phone,
              'URL' =>  $enquiry->page_url,
        
        ];
    
     $Clientdetails=[
                
                'name'=>$request['email_curriculum'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_curriculum'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success11', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }

    
    public function our_learners (Request $request)

    {
   
    $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    
    
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}

        $request->validate([
            
          
            'email_our_learners' => 'required|email',
            'phone_our_learners' => 'required'
         
        ],[
            
            'email_our_learners.required' => 'The email field is required.',
            'email_our_learners.email' => 'The email must be a valid email address.',
            'phone_our_learners.required' => 'The phone field is required.',
          
           
        ]);
    
        $enquiry = new Enquiry;

        $enquiry->email = $request['email_our_learners'];
        $enquiry->phone = $request['phone_our_learners'];
        $enquiry->form_type = $request['form_type'];
        $enquiry->page_url = $request['course_url3'];
     
        $enquiry->save();
    
        $details = [
            'title' =>$request['form_type']." TGC India Lead form",
        
            'email' =>  $enquiry->email,
            'phone' => $enquiry->phone,
             'URL' => $enquiry->page_url,
        
        ];
    
    
     $Clientdetails=[
                
                'name'=>$request['email_our_learners'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_our_learners'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success12', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }

    public function certification_faqs(Request $request)

    {
        $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
        
        
    // Honeypot check
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}

        $request->validate([
            
          
            'email_certification' => 'required|email',
            'phone_certification' => 'required'
         
        ],[
            
            'email_certification.required' => 'The email field is required.',
            'email_certification.email' => 'The email must be a valid email address.',
            'phone_certification.required' => 'The phone field is required.',
            
           
        ]);
    
        $enquiry = new Enquiry;

        $enquiry->email = $request['email_certification'];
        $enquiry->phone = $request['phone_certification'];
        $enquiry->form_type = $request['form_type'];
//page_url
         $enquiry->page_url = $request['page_url'];
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
            'email' =>  $enquiry->email,
            'phone' =>  $enquiry->phone,
             'url' =>  $enquiry->page_url,
        
        ];
        
        
         $Clientdetails=[
                
                'name'=>$request['email_certification'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_certification'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success12', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }


    public function certification_getintouch(Request $request)

    {
         $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
        
         // Honeypot check
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}

        $request->validate([
            
          
            'email_certification_getintouch' => 'required|email',
            'phone_certification_getintouch' => 'required'
         
        ],[
            'email_certification_getintouch.required' => 'The email field is required.',
            'email_certification_getintouch.email' => 'The email must be a valid email address.',
            'phone_certification_getintouch.required' => 'The phone field is required.',
            
           
        ]);
    
        $enquiry = new Enquiry;

        $enquiry->email = $request['email_certification_getintouch'];
        $enquiry->phone = $request['phone_certification_getintouch'];
        $enquiry->form_type = $request['form_type'];
        $enquiry->page_url = $request['page_url11'];
     
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
            'email' =>  $enquiry->email,
            'phone' =>  $enquiry->phone,
            'url' =>  $enquiry->page_url,
        
        ];
    
    
    
      $Clientdetails=[
                
                'name'=>$request['email_certification_getintouch'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_certification_getintouch'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success_getintouch', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }

    public function sample_certificate(Request $request)

    {
       $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
        
         // Honeypot check
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}

        $request->validate([
            
             'name_sample_certificate' => 'required',
            'email_sample_certificate' => 'required|email',
            'phone_sample_certificate' => 'required'
         
        ],[
            'name_sample_certificate.required' => 'The name field is required.',
            'email_sample_certificate.required' => 'The email field is required.',
            'email_sample_certificate.email' => 'The email must be a valid email address.',
            'phone_sample_certificate.required' => 'The phone field is required.',
            
           
        ]);
    
        $enquiry = new Enquiry;

        $enquiry->name = $request['name_sample_certificate'];
        $enquiry->email = $request['email_sample_certificate'];
        $enquiry->phone = $request['phone_sample_certificate'];
        $enquiry->form_type = $request['form_type'];
        $enquiry->page_url = $request['page_url'];
     
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
            'name' =>  $enquiry->name,
            'email' => $enquiry->email,
            'phone' =>  $enquiry->phone,
            'page_url' =>  $enquiry->page_url,
        
        ];
    
    
    
     $Clientdetails=[
                
                'name'=>$request['name_sample_certificate'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_sample_certificate'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
    
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success_sampleCertificate', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }
    
    public function press_release(Request $request)

    {
        
         $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
        
        if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
} 
        
        
       
        
        
        $request->validate([
    'name' => ['required', new NoSpam],
    'email' => ['required', 'email'],
    'phone' => ['required'],
    'location' => ['required'],
    'course_interest' => ['required'],
    'message' => ['required', new NoSpam],
]);
    
    
        $enquiry = new Enquiry;

        
        $enquiry->name = $request['name'];
        $enquiry->email = $request['email'];
        $enquiry->phone = $request['phone'];
        $enquiry->location = $request['location'];
        $enquiry->course_interest = $request['course_interest'];
        $enquiry->message = $request['message'];
        $enquiry->form_type = $request['form_type'];
        $enquiry->from = $request['from'];
        $enquiry->from_title = $request['from_title'];

      $enquiry->page_url = $request['page_url'];
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
            'name' =>  $enquiry->name,
            'email' =>  $enquiry->email,
            'phone' =>  $enquiry->phone,
            'location' =>  $enquiry->location,
            'course_interest' =>  $enquiry->course_interest,
            'message' =>  $enquiry->message,
             'url' =>  $enquiry->page_url,
        
        ];
        
        
          $Clientdetails=[
                
                'name'=>$request['name'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
    
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success13', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }


    public function upcoming_applynow(Request $request)

    {
       
        $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
       
       
        if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
} 
        
        $request->validate([
           
            
            'name_upcoming' => 'required',
            'email_upcoming' => 'required|email',
            'phone_upcoming' => 'required'

         
        ]);
    
        $enquiry = new Enquiry;

        
        $enquiry->name = $request['name_upcoming'];
        $enquiry->email = $request['email_upcoming'];
        $enquiry->phone = $request['phone_upcoming'];
        $enquiry->form_type = $request['form_type'];
        $enquiry->from = $request['from'];
        $enquiry->from_title = $request['from_title'];

      $enquiry->page_url = $request['page_url'];
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
            'name' =>  $enquiry->name,
            'email' =>  $enquiry->email,
            'phone' =>  $enquiry->phone,
             'url' =>  $enquiry->page_url
        
        ];
    
    
     $Clientdetails=[
                
                'name'=>$request['name_upcoming'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_upcoming'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success_upcoming', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }

    public function become_an_instructor(Request $request)

    {
        $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
} 
    
        $request->validate([
            
            'fname_instructor' => 'required',
            'lname_instructor' => 'required',
            'email_instructor' => 'required|email',
            'phone_instructor' => 'required',
            'course_interest_instructor' => 'required',
            'linkedin_instructor' => 'required',
            'about_course_instructor' => 'required',
            'message_instructor' => 'required' 

         
        ]);
    
        $enquiry = new Enquiry;

        $enquiry->fname = $request['fname_instructor'];
        $enquiry->lname = $request['lname_instructor'];
        $enquiry->email = $request['email_instructor'];
        $enquiry->phone = $request['phone_instructor'];
        $enquiry->course_interest = $request['course_interest_instructor'];
        $enquiry->linkedin = $request['linkedin_instructor'];
        $enquiry->about_course = $request['about_course_instructor'];
        $enquiry->message = $request['message_instructor'];
        $enquiry->form_type = $request['form_type'];
  $enquiry->page_url = $request['page_url'];
     
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
            'fname' =>  $enquiry->fname,
            'lname' =>  $enquiry->lname,
            'email' =>  $enquiry->email,
            'phone' =>  $enquiry->phone,
            'course_interest' =>  $enquiry->course_interest,
            'linkedin' =>  $enquiry->linkedin,
            'about_course' =>  $enquiry->about_course,
            'message' =>  $enquiry->message,
             'url' =>  $enquiry->page_url
        
        ];
        
        
         $Clientdetails=[
                
                'name'=>$request['fname_instructor'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_instructor'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success14', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }
    public function trainer_application(Request $request)

    {
       $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    
    
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
} 
    
    
        $request->validate([
            
            'name' => 'required',
            'position' => 'required',
           'email' => 'required|email|valid_email_domain',
            'phone' => 'required',
            'keyskill' => 'required',
            'time_availability' => 'required',
            'company_name' => 'required',
            'message' => 'required' 

         
        ]);
    
        $enquiry = new Enquiry;

        $enquiry->name = $request['name'];
        $enquiry->position = $request['position'];
        $enquiry->email = $request['email'];
        $enquiry->phone = $request['phone'];
        $enquiry->keyskill = $request['keyskill'];
        $enquiry->time_availability = $request['time_availability'];
        $enquiry->company_name = $request['company_name'];
        $enquiry->message = $request['message'];
        $enquiry->form_type = $request['form_type'];

     
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
            'name' =>  $enquiry->name,
            'position' =>  $enquiry->position,
            'email' =>  $enquiry->email,
            'phone' =>  $enquiry->phone,
            'keyskill' =>  $enquiry->keyskill,
            'time_availability' =>  $enquiry->time_availability,
            'company_name' =>  $enquiry->company_name,
            'message' =>  $enquiry->message
        
        ];
    
    
    
     
         $Clientdetails=[
                
                'name'=>$request['name'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success15', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }

    public function industrial_training(Request $request)

    {
         $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    
    
        $request->validate([
            
            'name' => 'required',
            
            'email' => 'required|email|valid_email_domain',

            'phone' => 'required'
           

         
        ]);
    
        $enquiry = new Enquiry;

        $enquiry->name = $request['name'];
     
        $enquiry->email = $request['email'];

        $enquiry->phone = $request['phone'];
  
        $enquiry->form_type = $request['form_type'];

        $enquiry->from = $request['from'];
        
        $enquiry->from_title = $request['from_title'];

     
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
            'name' =>  $enquiry->name,
            
            'email' =>  $enquiry->email,

            'phone' =>  $enquiry->phone
          
        ];
        
        
        
          $Clientdetails=[
                
                'name'=>$request['name'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success16', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }

    public function enroll_now(Request $request)

    {
         $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    
    
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
} 


    
        $request->validate([
            'name_enrollnow' => 'required',
            'email_enrollnow' => 'required|email',
            'phone_enrollnow' => 'required',
            'number_enrollnow' => 'required',
            'dob_enrollnow' => 'required',
            'location_enrollnow' => 'required',
            'city_enrollnow' => 'required', 
            'state_enrollnow' => 'required', 
            'zipcode_enrollnow' => 'required', 
            'country_enrollnow' => 'required', 
            'doj_enrollnow' => 'required' 
        ], [
            'name_enrollnow.required' => 'The name field is required.',
            'email_enrollnow.required' => 'The email field is required.',
            'email_enrollnow.email' => 'The email must be a valid email address.',
            'phone_enrollnow.required' => 'The phone field is required.',
            'number_enrollnow.required' => 'The mobile field is required.',
            'dob_enrollnow.required' => 'The dob field is required.',
            'location_enrollnow.required' => 'The location field is required.',
            'city_enrollnow.required' => 'The city field is required.',
            'state_enrollnow.required' => 'The state field is required.',
            'zipcode_enrollnow.required' => 'The zipcode field is required.',
            'country_enrollnow.required' => 'The country field is required.',
            'doj_enrollnow.required' => 'The date of joining field is required.'
        ]);
        
    
        $enquiry = new Enquiry;

        $enquiry->name = $request['name_enrollnow'];
        $enquiry->email = $request['email_enrollnow'];
        $enquiry->phone = $request['phone_enrollnow'];
        $enquiry->number = $request['number_enrollnow'];
        $enquiry->dob = $request['dob_enrollnow'];
        $enquiry->location = $request['location_enrollnow'];
        $enquiry->city = $request['city_enrollnow'];
        $enquiry->state = $request['state_enrollnow'];
        $enquiry->zipcode = $request['zipcode_enrollnow'];
        $enquiry->country = $request['country_enrollnow'];
        $enquiry->doj = $request['doj_enrollnow'];
        $enquiry->form_type = $request['form_type'];
        $enquiry->course_name = $request['course_name'];
        $enquiry->start_date = $request['start_date'];

     
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
            'name' =>  $enquiry->name,
            'email' =>  $enquiry->email,
            'phone' =>  $enquiry->phone,
            'number' =>  $enquiry->number,
            'dob' =>  $enquiry->dob,
            'location' =>  $enquiry->location,
            'city' =>  $enquiry->city,
            'state' =>  $enquiry->state,
            'zipcode' =>  $enquiry->zipcode,
            'country' =>  $enquiry->country,
            'doj' =>  $enquiry->doj,
        
        ];
    
            $Clientdetails=[
                
                'name'=>$request['name_enrollnow'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email_enrollnow'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success17', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }

    public function career_form(Request $request)

    {
       
       
        $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    
    
        if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}
    
    
    
    
     $request->validate([
        'name' => ['required', new NoSpam],
        'email' => ['required', 'email'],
        'phone' => ['required'],
        'message' => ['required', new NoSpam],
    ]);

/*
        $request->validate([
            
            'name' => 'required',
            
           'email' => 'required|email|valid_email_domain',

            'phone' => 'required',

            'message' => 'required'
           

         
        ]);
        
        */
    
        $enquiry = new Enquiry;

        $enquiry->name = $request['name'];
     
        $enquiry->email = $request['email'];

        $enquiry->phone = $request['phone'];

        $enquiry->message = $request['message'];
  
        $enquiry->form_type = $request['form_type'];

        $enquiry->from = $request['from'];
        
        $enquiry->from_title = $request['from_title'];

     
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
            'name' => $enquiry->name,
            
            'email' =>  $enquiry->email,

            'phone' =>  $enquiry->phone,

            'message' =>  $enquiry->message
          
        ];
        
        
          $Clientdetails=[
                
                'name'=>$request['name'],
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$request['email'];
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails));
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success18', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }


    public function scholarship_form(Request $request)

    {
         $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
        $request->validate([
            
            
            'title' => 'required',

            'name' => 'required',
            
            'email' => 'required|email|valid_email_domain',

            'phone' => 'required',

            'education' => 'required',

            'college_name' => 'required',

            'technology' => 'required'
           

         
        ]);
    
        $enquiry = new Enquiry;

        $enquiry->title = $request['title'];

        $enquiry->name = $request['name'];
     
        $enquiry->email = $request['email'];

        $enquiry->phone = $request['phone'];

        $enquiry->education = $request['education'];

        $enquiry->college_name = $request['college_name'];

        $enquiry->technology = $request['technology'];
  
        $enquiry->form_type = $request['form_type'];

        $enquiry->from = $request['from'];
        
        $enquiry->from_title = $request['from_title'];

      $enquiry->page_url = $request['page_url'];
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
            'name' =>  $enquiry->name,
            
            'email' =>  $enquiry->email,

            'phone' =>  $enquiry->phone,

            'education' =>  $enquiry->education,

            'college_name' =>  $enquiry->college_name,

            'technology' =>  $enquiry->technology,
            'url' =>  $enquiry->page_url
          
        ];
    
    
    
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success19', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }
    
    
    public function sendMailAll($name,$email,$details){
            $Clientdetails=[
                
                'name'=>$name,
               
            ];
            
         $recipients =$this->getReceiptMail();
    $userEmail=$email;
    Mail::to($recipients)->send(new Feedback($details));
    
    Mail::to($userEmail)->send(new ClientFeedback($Clientdetails)); 
        
        
    }

    public function corporate_training(Request $request)

    {
        $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    } 
        
      $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    // Honeypot check
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}
        $request->validate([
            
            'name' => 'required',
            
            'email' => 'required|email|valid_email_domain',

            'phone' => 'required',

            'training' => 'required',

            'company_name' => 'required',

            'message' => 'required'
           

         
        ]);
    
        $enquiry = new Enquiry;

        $enquiry->name = $request['name'];
     
        $enquiry->email = $request['email'];

        $enquiry->phone = $request['phone'];

        $enquiry->training = $request['training'];

        $enquiry->company_name = $request['company_name'];

        $enquiry->message = $request['message'];
  
        $enquiry->form_type = $request['form_type'];

        $enquiry->from = $request['from'];
        
        $enquiry->from_title = $request['from_title'];
  $enquiry->page_url = $request['page_url'];
     
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
            'name' =>  $enquiry->name,
            
            'email' =>  $enquiry->email,

            'phone' =>  $enquiry->phone,

            'training' =>  $enquiry->training,

            'company_name' =>  $enquiry->company_name,

            'message' =>  $enquiry->message,
             'url' =>  $enquiry->page_url
          
        ];
    $this->sendMailAll($request['name'],$request['email'],$details);
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success20', 'Your Query Send Successfully. We will get back soon!!!!');
        return redirect(url('/thanks'));
    }

    public function contact_form(Request $request)

    {
        $agent = new Agent();

    if ($agent->isRobot()) {
       
        return back();
    }  
        
        
       $crawlerDetect = new CrawlerDetect();
    if ($crawlerDetect->isCrawler()) {
        return response()->json(['error' => 'Bot detected'], 403);
    }
    
        
        
        
      $userAgent = $request->header('User-Agent');

    if (
        !$userAgent || 
        preg_match('/bot|crawl|spider|curl|wget|python|httpclient|scrapy|postman/i', $userAgent)
    ) {
       return back()->withErrors(['error' => 'Suspicious activity detected.']);
       }

        
        
        
        
        
        // Honeypot check
    if ($request->filled('website')) {
        return back()->withErrors(['spam' => 'Spam detected.'])->withInput();
    }

    if (now()->timestamp - (int)$request->input('form_start') < 5) {
    return back()->withErrors(['spam' => 'Form submitted too quickly.'])->withInput();
}




        $request->validate([
        'name'    => ['required', new NoSpam],
        'email'   => ['required', 'email', 'valid_email_domain'],
        'phone'   => ['required'],
        'message' => ['required', new NoSpam],
      

         
    ]);
    
    
    
        $enquiry = new Enquiry;

        $enquiry->name = $request['name'];
     
        $enquiry->email = $request['email'];

        $enquiry->phone = $request['phone'];

        $enquiry->message = $request['message'];
  
        $enquiry->form_type = $request['form_type'];

        $enquiry->from = $request['from'];
        
        $enquiry->from_title = $request['from_title'];

         $enquiry->page_url = $request['page_url'];
        $enquiry->save();
    
        $details = [
            'title' => $request['form_type']." TGC India Lead form",
        
            'name' =>  $enquiry->name,
            
            'email' =>  $enquiry->email,

            'phone' =>  $enquiry->phone,

            'message' =>  $enquiry->message,
             'url' =>  $enquiry->page_url,
          
        ];
     $this->sendMailAll($request['name'],$request['email'],$details);
        //Mail::to('st765191@gmail.com')->send(new Feedback($details));
    
        // return redirect()->back()->with('success21', 'Your Query Send Successfully. We will get back soon!!!!');
       
           return redirect(url('/thanks'));

        
    }

}