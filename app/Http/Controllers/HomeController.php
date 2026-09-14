<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Testimonial;
use App\Models\CourseCategory;
use App\Models\Partner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailOtp;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

      public function thankyou()
      {
            $data['menu'] = "";
            $data['sub_menu'] = "";
            $data['meta_title'] = "Home | TGC India";
            $data['meta_keywords'] = "";
            $data['meta_description'] = "";
            $data['cat_show'] = 0;

            return view('frontend.thankyou', compact('data'));
      }
      
        public function ExcludedCourses(){
        
         $courseNotInCity=DB::select("SELECT course_id FROM `tbl_check_city`");
      foreach($courseNotInCity as $cityValue){
          $cityArray[]=$cityValue->course_id;
          
      }
      
      return $cityArray;
    }
      
public function franchisePage(){
    
    //echo "hello";
    
    
      $data['menu'] = "";
            $data['sub_menu'] = "";
            $data['meta_title'] = "Franchise | TGC India";
            $data['meta_keywords'] = "";
            $data['meta_description'] = "";
            $data['cat_show'] = 0;
            
             return view('frontend.pages.become-franchise', compact('data'));

}


  public function eligibilityTest(Request $request){
           $data['menu'] = "";
            $data['sub_menu'] = "";
            $data['meta_title'] = "Eligibility Test System | TGC India";
            $data['meta_keywords'] = "";
            $data['meta_description'] = "";
            $data['cat_show'] = 0;
            $questonData=DB::table('tbl_questions')
    ->orderBy('section_id', 'ASC')
    ->orderBy('order_no', 'ASC')
    ->get();
           
           $dataArray = [];
           $sectionArray=[];

foreach($questonData as $question) {
    $options = DB::table("tbl_options")
        ->where('question_id', $question->id)
        ->orderBy('order_no', 'ASC') // keep options in order
        ->get();


$sectionArray[$question->section_id][]=$question->id;
    $dataArray[] = [
        'question' => $question,
        'options'  => $options
    ];
}

$data['section']=DB::table('tbl_eligibility_section')->get();

//echo "<pre>";
//print_r($sectionArray);
//echo "</pre>";
//die;

       return view('frontend.pages.eligibility-test', compact('data','dataArray','sectionArray'));
      
  }
  
  
  public function reviewAnswer(Request $request){
      
     
    $answer=$request->answer;
    $questionId=$request->questionId;
    $sectionId=$request->sectionId;
    $userid=$request->userid;
    
   // $checkAnswer=DB::table("tbl_attempts_tmp")->where('user_id', $userid)->where('')->get();
   
   $reviewAnswer=DB::table('tbl_answers_review')->insert([
       'attempt_id'=>1,
       'section_id'=>$sectionId,
       'question_id'=>$questionId,
       'option_id'=>$answer,
       'created_at'=>now(),
        'updated_at'=>now(),
       ]);
       
       if($reviewAnswer){
           echo "submitted";
       }
    
    
      
  }
  
  public function scholarshipResult(Request $request,$id){
      
            $data['menu'] = "";
            $data['sub_menu'] = "";
            $data['meta_title'] = "Eligibility Test System | TGC India";
            $data['meta_keywords'] = "";
            $data['meta_description'] = "";
            $data['cat_show'] = 0;
            $resultdetails=DB::table('tbl_attempts')->where('id', $id)->first();
            $user_id=$resultdetails->user_id;
            $userDetails=DB::table('tbl_student_eligibility_register')->where('id', $user_id)->first();
            $data['full_name']=$userDetails->full_name;
            $data['score']=$resultdetails->score;
            $data['total_marks']=$resultdetails->total_marks;
            $data['correct_answers']=$resultdetails->correct_answers;
            $data['wrong_answers']=$resultdetails->wrong_answers;
            $data['unattempted']=$resultdetails->unattempted;
            
              return view('frontend.pages.scholarship-dashboard', compact('data')); 
      
  }
  
  
  
  public function eligibilityTestRegistration(){
      
         $data['menu'] = "";
            $data['sub_menu'] = "";
            $data['meta_title'] = "Eligibility Test System | TGC India";
            $data['meta_keywords'] = "";
            $data['meta_description'] = "";
            $data['cat_show'] = 0;
            
            
             return view('frontend.pages.eligibility-test-registration', compact('data'));
            
            
  }
  
  public function saveEligibilityTestRegistration(Request $request){
      
      DB::table('tbl_student_eligibility_register')->insert([
        'full_name' => $request->full_name,
        'email_id' => $request->email_id,
        'mobile_no' => $request->mobile_no,
        'qualification' => $request->qualification,
        'full_address' => $request->full_address,
        'city' => $request->city,
        'course_interest' => $request->course_interest,
        'created_at' => now(),
        'updated_at'=>now(),
    ]);

    return redirect()->back()->with('success','Registration Submitted Successfully');
      
  }
  
  
  public function saveEligibilityTest(Request $request){
      //echo "<pre>";
      //print_r($_POST);
      //echo "</pre>";
      
      
  $attemptId = DB::table('tbl_attempts')->insertGetId([
    'user_id'    => 1,
    'test_id'    => 1,
    'score'      => 0,
    'created_at' => now(),
    'updated_at' => now()
]);

if ($request->has('question') && is_array($request->question)) {
    foreach ($request->question as $qData) {
        $questionId = $qData['question_id'];

        $selectedOptions = $qData['answer'] ?? [];
        if (!is_array($selectedOptions)) {
            $selectedOptions = [$selectedOptions];
        }

        foreach ($selectedOptions as $optionId) {
            $isCorrect = DB::table('tbl_options')
                           ->where('id', $optionId)
                           ->value('is_correct');

            $isCorrect = $isCorrect ? 1 : 0;

            DB::table('tbl_answers')->insert([
                'attempt_id'  => $attemptId,
                'question_id' => $questionId,
                'option_id'   => $optionId,
                'is_correct'  => $isCorrect,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}

//return response()->json(['success' => true, 'attempt_id' => $attemptId]);

///die;
$totalQuestion = DB::table('tbl_questions')
    ->where('test_id', 1)   
    ->where('topic', 1)     
    ->count();              

$gettotalCorrectAns = DB::table('tbl_answers')
    ->where('attempt_id', $attemptId)
    ->where('is_correct', 1)
    ->count();

$gettotalUnCorrectAns = DB::table('tbl_answers')
    ->where('attempt_id', $attemptId)
    ->where('is_correct', '!=', 1)
    ->count();
    
    
    
    $totalAttemptstudent=$gettotalCorrectAns+$gettotalUnCorrectAns;
    
     $unattempted= $totalQuestion - $totalAttemptstudent;
    
   $total_marks = $totalQuestion * 2;          // total possible marks
$totalCorrectMarks = $gettotalCorrectAns * 2; // marks obtained

$percentageScore = ($totalCorrectMarks / $total_marks) * 100;
$percentageRound = round($percentageScore);

///echo $percentageRound;
   
   
    
 $updateAttemptQuestionScoreCard = DB::table('tbl_attempts')
    ->where('id', $attemptId)
    ->update([
        'total_marks'     => $total_marks,
        'correct_answers' => $gettotalCorrectAns,
        'wrong_answers'   => $gettotalUnCorrectAns,
        'unattempted'     => $unattempted,
        'score'           => $percentageRound,
        'updated_at'      => now()
    ]);

return redirect('https://www.tgcindia.com/scholarship-dashboard/'.$attemptId.'');
      
  }

    public function saveFranchiser(Request $request){
        
      
          $full_name=$request->post('full_name');
          $phone=$request->post('phone');
          $email=$request->post('email');
          $plan=$request->post('plan');
          $location=$request->post('location');
          
      $inserted=  DB::table('tbl_franchise_request')->insert([
    'name' => $full_name,
    'email' => $email,
    'mobile' => $phone,
    'plan' => $plan,
    'city' => $location,
    'create_date' => now(),
    'update_date' => now(),
]);
 
      if ($inserted) {
    return back()->with('message', 'You have successfully submitted');
} else {
    return back()->with('error', 'Something went wrong. Please try again.');
}
        
    }



      public function home()
      {



            $data['menu'] = "";

            $data['sub_menu'] = "";



            $data['meta_title'] = "TGC INDIA | Graphic Design Course in Delhi | Animation & VFX ";

            $data['meta_keywords'] = "";

            $data['meta_description'] = "TGC is a leading training institute in Delhi offering Graphic Design, Web Design, 3D Animation, VFX & Diploma courses to help students build creative careers. Enroll today to start your creative career!";

            $data['cat_show'] = 0;



            $data['slider'] = Slider::where('is_deleted', 0)
                  ->orderBy('order_by', 'asc')
                  ->WHERE('status', 'Active')
                  ->get();

            $data['recent_blogs'] = Blog::where('staus', 'Active')->WHERE('is_deleted', '0')->where('order_by', '!=', '')->orderBy('order_by', 'ASC')->limit(5)->get();
            
            

            $data['testimonial'] = Testimonial::WHERE('is_deleted', '0')->where('order_by', '!=', '')->orderBy('order_by', 'ASC')->get();

            $data['cat_list'] = CourseCategory::where('staus', 'Active')

                  ->WHERE('is_deleted', '0')

                  ->orderBy('orders_by', 'ASC')

                  ->get();

$excludedCourseIds=$this->ExcludedCourses();

            $data['trending-premium'] = Course::where('staus', 'Active')

                  ->WHERE('is_deleted', '0')

                  ->orderBy('orders_by', 'ASC')

                  ->whereRaw("FIND_IN_SET(?, new_category)", ['Trending Courses'])

                  ->WHERE('course_type', 'Premium')
                  ->whereNull('excluded_by')
                  ->limit(12)

                  ->get();
                  // dd($data['trending-premium']);
                  
                //   $data['all'] = Course::where('staus', 'Active')                
                //               ->where('is_deleted', '0')
                //               ->whereRaw("FIND_IN_SET(?, new_category)", ['Trending Courses'])
                //               ->orderBy('orders_by', 'ASC')
                //               ->get();
                
             /*   
                $data['all'] = Course::where('staus', 'Active')
                        ->WHERE('is_deleted', '0')
                        ->whereRaw("FIND_IN_SET(?, new_category)", ['Trending Courses'])
                        ->orderBy('orders_by', 'ASC')
                        ->get();
                        
                        */
                        // dd($data['all']);
                  /*      
                        $data['all'] = Course::where('staus', 'Active')
    ->where('is_deleted', '0')
    ->whereRaw("FIND_IN_SET(?, new_category)", ['Trending Courses'])
    ->orderByRaw("type_course = 2 DESC") // bring type_course = 2 first
    ->orderBy('orders_by', 'ASC')       // then sort by orders_by
    ->get();
    
    */
 /*   
  $data['all'] =DB::select("SELECT * FROM tbl_course
WHERE staus = 'Active'
 
  AND is_deleted = '0'
  AND FIND_IN_SET('Trending Courses', new_category)
ORDER BY orders_by ASC LIMIT 12");
*/

 $data['all'] = DB::table('tbl_course')
    ->where('staus', 'Active')
    ->whereNull('excluded_by')
    ->where('is_deleted', '0')
    ->whereRaw("FIND_IN_SET(?, new_category)", ['Trending Courses'])
    ->orderBy('orders_by', 'asc')
    ->limit(8)
    ->get();

 


            $data['trending-featured'] = Course::where('staus', 'Active')

                  ->WHERE('is_deleted', '0')
                   ->whereNull('excluded_by')

                  ->orderBy('orders_by', 'ASC')
                  ->whereRaw("FIND_IN_SET(?, new_category)", ['Trending Courses'])
                  ->WHERE('course_type', 'Feature')
                  ->limit(6)
                  ->get();

            $data['trending-trending'] = Course::where('staus', 'Active')
                  ->WHERE('is_deleted', '0')
                   ->whereNull('excluded_by')
                  ->orderBy('orders_by', 'ASC')
                  ->whereRaw("FIND_IN_SET(?, new_category)", ['Trending Courses'])
                  ->WHERE('course_type', 'Trending')
                  ->limit(6)
                  ->get();

            $data['trending-comprehensive'] = Course::where('staus', 'Active')
                  ->WHERE('is_deleted', '0')
                   ->whereNull('excluded_by')
                  ->orderBy('orders_by', 'ASC')
                  ->whereRaw("FIND_IN_SET(?, new_category)", ['Trending Courses'])
                  ->WHERE('course_type', 'Comprehensive')
                  ->limit(6)
                  ->get();

            $data['trending-short'] = Course::where('staus', 'Active')
                  ->WHERE('is_deleted', '0')
                   ->whereNull('excluded_by')
                  ->orderBy('orders_by', 'ASC')
                  ->whereRaw("FIND_IN_SET(?, new_category)", ['Trending Courses'])
                  ->WHERE('course_type', 'Short Terms')
                  ->limit(6)
                  ->get();


            $data['popular_course'] = Course::where('staus', 'Active')
                  ->WHERE('is_deleted', '0')
                   ->whereNull('excluded_by')
                  ->orderBy('pop_order_by', 'ASC')
                  ->whereRaw("FIND_IN_SET(?, new_category)", ['Popular courses'])
                  ->limit(6)
                  ->get();


            $data['career_course'] = Course::where('staus', 'Active')
                  ->WHERE('is_deleted', '0')
                    ->whereNull('excluded_by')
                  ->orderBy('cat_order_by', 'ASC')
                  ->whereRaw("FIND_IN_SET(?, new_category)", ['Career Related Programs'])
                  ->limit(6)
                  ->get();
// dd($data['career_course']);
            $data['recent_course'] = Course::where('staus', 'Active')
                  ->WHERE('is_deleted', '0')
                    ->whereNull('excluded_by')
                  ->orderBy('id', 'DESC')
                  ->limit(6)
                  ->get();

            $data['our_partner'] = Partner::WHERE('is_deleted', '0')
                  ->orderBy('id', 'DESC')
                  ->get();
                  
                  $data['video'] = DB::table('tbl_video')
    ->orderBy('order_by', 'asc')
    ->get();

                      $data['placement']=DB::table('tbl_placement')->where('is_deleted', 0)->get(); 
                      
            
  $num1 = rand(1, 10);
    $num2 = rand(1, 10);

    session(['captcha_sum' => $num1 + $num2]);


   
                      
                 
            return view('frontend.home', compact('data','num1','num2'));
      }

public function gethomecourse(Request $request){
    
//print_r($_POST);
  //  die;
  
  $excludedCourseIds=$this->ExcludedCourses();
  
 $data['trending-premium'] = Course::where('staus', 'Active')

                  ->WHERE('is_deleted', '0')

                  ->orderBy('orders_by', 'ASC')

                  ->whereRaw("FIND_IN_SET(?, new_category)", ['Trending Courses'])

                  ->WHERE('course_type', 'Premium')
                  
                  ->whereNull('excluded_by')
                  
                  ->limit(8)

                  ->get();
                  
                  
        
                  
          return view('frontend.coursetemplate',compact('data'));        
                  
                  
    
   }

  public function onlinePayment(Request $request){
      
      $id=$request->get('id');
      
      $sqlenquiryform=DB::table('enquiry_form')->where('id' , $id)->first();
    //  print_r($sqlenquiryform);
      
        $data['menu'] = "";

            $data['sub_menu'] = "";



            $data['meta_title'] = "TGC INDIA | Online Payment";

            $data['meta_keywords'] = "";

            $data['meta_description'] = "TGC is a leading training institute in Delhi offering Graphic Design, Web Design, 3D Animation, VFX & Diploma courses to help students build creative careers. Enroll today to start your creative career!";

            $data['cat_show'] = 0;
            
            
      
    return view('frontend.online-payment',compact('data','sqlenquiryform'));  
      
  }
  
 /* 
  public function payOnline(Request $request){
      
          $data['menu'] = "";

            $data['sub_menu'] = "";



            $data['meta_title'] = "TGC INDIA | Online Payment";

            $data['meta_keywords'] = "";

            $data['meta_description'] = "TGC is a leading training institute in Delhi offering Graphic Design, Web Design, 3D Animation, VFX & Diploma courses to help students build creative careers. Enroll today to start your creative career!";

            $data['cat_show'] = 0;
            
             $name=$request->post('name');
             $email=$request->post('email');
               $phone=$request->post('phone');
                 $amount=$request->post('amount');
                 //$data[]=$name;
                 
                 $arraydata=array('name'=>$name,'email'=>$email,'phone'=>$phone,'amount'=>$amount);
                 
            return redirect('https://www.tgcindia.com/make-payment')->with($arraydata);
            
      
      
  }
  */
  
  
  public function payOnline(Request $request)
{
    // Validate the input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:20',
        'amount' => 'required|numeric|min:1',
    ]);

    // Set metadata if needed (optional for SEO/views)
    $data['menu'] = "";

            $data['sub_menu'] = "";



            $data['meta_title'] = "TGC INDIA | Online Payment";

            $data['meta_keywords'] = "";

            $data['meta_description'] = "TGC is a leading training institute in Delhi offering Graphic Design, Web Design, 3D Animation, VFX & Diploma courses to help students build creative careers. Enroll today to start your creative career!";

            $data['cat_show'] = 0;
            
            
            $name=$request->post('name');
              $email=$request->post('email');
               $enq_id=$request->post('enq_id');
               $phone=$request->post('phone');
                  $amount=$request->post('amount');
             $data['user_details']=array('name'=>$name,'email'=>$email,'phone'=>$phone,'amount'=>$amount,'enq_id'=>$enq_id);

    // Add user payment data to pass to the view
         // $data['paymentData'] = $validated;

    // Return a view that auto-posts data to external payment URL
    return view('frontend.makepayment', compact('data'));
}

public function makePayment(){
    
             $data['menu'] = "";

            $data['sub_menu'] = "";



            $data['meta_title'] = "TGC INDIA | Online Payment";

            $data['meta_keywords'] = "";

            $data['meta_description'] = "TGC is a leading training institute in Delhi offering Graphic Design, Web Design, 3D Animation, VFX & Diploma courses to help students build creative careers. Enroll today to start your creative career!";

            $data['cat_show'] = 0;
            
    return view('frontend.makepayment',compact('data'));
    
}

public function saveEnroller(Request $request){
    
//print_r($_POST);
//die;
    $name_enrollnow=$request->post('name_enrollnow');
    $email_enrollnow=$request->post('email_enrollnow');
    $emrol_ph=$request->post('emrol_ph');
    $dob_enrollnow=$request->post('dob_enrollnow');
    $location_enrollnow=$request->post('location_enrollnow');
      $city_enrollnow=$request->post('city_enrollnow');
       $zipcode_enrollnow=$request->post('zipcode_enrollnow');
        $coursename=$request->post('coursename');
        $doj_enrollnow=$request->post('doj_enrollnow');
        $state_enrollnow=$request->post('state_enrollnow');
         $country_enrollnow=$request->post('country_enrollnow');
         $updated_at=date('Y-m-d h:i:s');
         
    
if($name_enrollnow!='' && $email_enrollnow!='' && $emrol_ph!=''){
$last_insert_id = DB::table('enquiry_form')->insertGetId([
    'name'            => $name_enrollnow,
    'email'           => $email_enrollnow,
    'phone'           => $emrol_ph,
    'updated_at'      => $updated_at,
    'created_at'      => $updated_at,
    'form_type'       => '', // Add actual value if needed
    'location'        => $location_enrollnow,
    'course_interest' => $coursename,
    'dob'             => $dob_enrollnow,
    'city'            => $city_enrollnow,
    'state'           => $state_enrollnow,
    'zipcode'         => $zipcode_enrollnow,
    'doj'             => $doj_enrollnow, // Or provide value
    'country'         => $country_enrollnow, // Add if needed
    'course_name'     => $coursename, // Add if needed
]);
if($last_insert_id!=''){
echo $last_insert_id;
}

}else{
    echo 0;
}
//return redirect()->away('https://www.tgcindia.com/online-payment?id=' . $last_insert_id);

    
}


public function PaymentSuccess(Request $request){
    
 $razorpay_payment_id=$request->post('razorpay_payment_id');
 $enq_id=$request->post('enq_id'); 
 //$email=$request->post('email'); 
  //$phone=$request->post('phone'); 

$sql=DB::update("UPDATE enquiry_form SET razorpay_payment_id='$razorpay_payment_id' WHERE id='$enq_id' ");
if($sql){
return redirect()->away('https://www.tgcindia.com/success-message?id=' . $razorpay_payment_id);
    
}
    
    
}


public function showvideo(Request $request){
    //print_r($_POST);
    
    echo '<video class="testimonial-video" width="1080" height="520" controls>
  <source src="https://www.tgcindia.com/public/uploads/'.$request->url.'" type="video/mp4">
 
</video>';
    
}

public function successMessage(Request $request){
            $data['menu'] = "";

            $data['sub_menu'] = "";



            $data['meta_title'] = "TGC INDIA | Online Payment";

            $data['meta_keywords'] = "";

            $data['meta_description'] = "TGC is a leading training institute in Delhi offering Graphic Design, Web Design, 3D Animation, VFX & Diploma courses to help students build creative careers. Enroll today to start your creative career!";

            $data['cat_show'] = 0;
           $razorpayId= $request->get('id');
    
   return view('frontend.success-message',compact('data','razorpayId'));
    
}

      public function ajax_check_email(Request $request)
      {
            $email = $request->get('email');

           /// $rand = rand('2222', '9999');
           $rand="TGCIndia@!31162";
            $sql = DB::table('users')->WHERE('email', $email)->first();
            if ($sql) {
                  DB::table('users')
                        ->WHERE('id', $sql->id)
                        ->update([
                              'password' => Hash::make($rand),
                              'normal_pass' => $rand
                        ]);

                 
                  $details = [
                        'name' => $sql->name,
                        'otp' => $rand

                  ];
             $emaild="ranjan354@gmail.com";
                
                // $emaild="manojk.tgc@gmail.com";
                 /// Mail::to($emaild)->send(new EmailOtp($details));
                  
                  $data = [
                        'type' => 'Valid',
                        'otp' => $rand
                  ];
            } else {
                  $data = [
                        'type' => 'Invalid',
                        'otp' => ''
                  ];
            }

            return response()->json(['data' => $data]);
      }

      public function ajax_verify_email(Request $request)
      {
            $email = $request->get('email');
            $otp = $request->get('otp');

            $sql = DB::table('users')
                  ->WHERE('email', $email)
                  ->WHERE('normal_pass', $otp)
                  ->first();

            if ($sql) {
                  $data = 'ok';
            } else {
                  $data = 'Invalid';
            }

            return response()->json(['data' => $data]);
      }
}
