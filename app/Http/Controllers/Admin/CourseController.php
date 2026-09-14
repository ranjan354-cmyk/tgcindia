<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;

use App\Models\Course\Batch;
use App\Models\Course\Certificate;
use App\Models\Course\CertificateTraining;
use App\Models\Course\CourseProject;
use App\Models\Course\CourseHeading;
use App\Models\Course\Enroll;
use App\Models\Course\Faq;
use App\Models\Course\Solution;
use App\Models\Course\Syllabus;
use App\Models\Course\Testimonial;
use App\Models\Course\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Crawler\Crawler;

use Illuminate\Support\Facades\File;

use ZipArchive;



class CourseController extends Controller{
  public function index(){
    $this->courses();
  }

  // === Course management --------
  public function courses(Request $request){

    $data['menu'] = "course";
    $data['sub_menu'] = "course";

    $keyword = $request['keyword'];
    $category = $request['category'];
    $data['keyword'] = $keyword;
    $data['category'] = $category;
    $r_page = $request['r_page'];
    if(!empty($r_page)){
      $r_page = $r_page;
      $data['r_page'] = $r_page;
    } else {
      $r_page = 25;
      $data['r_page'] = 25;
    }


    if(!empty($category)){
      if(!empty($keyword)){
          $categories = Course::where('name', 'like', '%'.$keyword.'%')
          ->WHERE('is_deleted', '0')
          ->WHERE('parent', $category)
          ->orderBy('orders_by', 'ASC')
          ->paginate($r_page);
          $categories->appends(['keyword' => $keyword]);
          $categories->appends(['r_page' => $r_page]);
          $categories->appends(['category' => $category]);
      } else {
          $categories = Course::WHERE('is_deleted', '0')
                        ->orderBy('orders_by', 'ASC')
                        ->WHERE('parent', $category)
                        ->paginate($r_page);
          $categories->appends(['r_page' => $r_page]);
          $categories->appends(['category' => $category]);
      }
    } else {
     if (!empty($keyword)) {
    $categories = Course::where(function($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
                  ->orWhere('add_date', 'like', '%' . $keyword . '%');
        })
        ->where('is_deleted', '0')  // Correct chaining of conditions
        ->orderBy('orders_by', 'ASC')
        ->paginate($r_page);
    
    // Append all parameters at once
    $categories->appends([
        'keyword' => $keyword,
        'r_page' => $r_page,
        'category' => $category
    ]);
}
 else {
          $categories = Course::WHERE('is_deleted', '0')
                        ->orderBy('orders_by', 'ASC')
                        ->paginate($r_page);
          $categories->appends(['r_page' => $r_page]);
          $categories->appends(['category' => $category]);
      }
    }
    

    

    $categoryList = CourseCategory::WHERE('is_deleted', '0')->orderBy('orders_by', 'ASC')->get();
    
    $excludedData=DB::table('tbl_check_city')->get();
    
    foreach($excludedData as $excludedDataValue){
        $excludedDataAll[]=$excludedDataValue->course_id;
    }

    return view('backend.courses.view',compact('data', 'categories', 'categoryList','excludedDataAll'))->with('i', (request()->input('page', 1) - 1) * $r_page);
  }
  
  public function savesolutionOrder(Request $request){
      $srno=$request->srno;
      $id=$request->id;
      $sql=DB::update("UPDATE tbl_course_solution SET order_by='$srno' WHERE id='$id' ");
      
  }
  
  
  public function questionBank(){
     // echo "hello";
     
      $data['menu'] = "questionbank";
    $data['sub_menu'] = "questionbank";

    $categories = CourseCategory::WHERE('is_deleted', '0')->orderBy('orders_by', 'ASC')->get();
    
     $data['question_bank']=DB::table('tbl_questions')->where('status', 1)->get();
     $data['question_section']=DB::table('tbl_eligibility_section')->where('status', 1)->get();
   
    foreach($data['question_section'] as $sectionValue){
        $sectiname[$sectionValue->id]=$sectionValue->section_name."-".$sectionValue->name;
    }
     
     
   
     $data['question_test']=DB::table('tbl_tests')->where('status', 1)->get();
    return view('backend.courses.question-bank', compact("data", "categories","sectiname"));
     
  }
  
  public function saveQuestionbank(Request $request){
    
    
 
   $test=$request->test;
  $section=$request->section;
  $correctIndexes = $request->correct_option; // array of correct indexes
   $Option1=$request->Option1;   
   $question=$request->question;
   $marks=$request->marks;
   
  $getLastId = DB::table('tbl_questions')
    ->orderBy('id', 'desc')
    ->first();
$lastQuestionId = $getLastId->order_no;
$insertedid=$lastQuestionId+1;
  $inserQuestionLastId = DB::table('tbl_questions')->insertGetId([
    'section_id' => $section,
    'test_id'    => $test,
    'question'   => $question,
    'marks'      => $marks,
    'status'     => 1,
    'order_no'=>$insertedid,
    'create_at'  => now(),
    'update_at'  => now(),
]);




// Convert to 0-based index
// $correctIndex = $correct_option1 - 1;
$siNo=0;
foreach ($Option1 as $index => $OptionValue) {
    
 
$siNo++;
  $sql=  DB::table('tbl_options')->insert([
        'question_id' => $inserQuestionLastId,
        'option_text' => $OptionValue,
        'is_correct'  => in_array($index, $correctIndexes) ? 1 : 0,
         'order_no'=>$siNo,
        'created_at'  => now(),
        'updated_at'  => now(),
    ]);

}
   
    if($sql)  {
        return redirect()->back()->with('success', 'Question created successfully.'); 
    }
      
  }
  
  
  public function updateQuestionbank(Request $request)
{
 

      $question_id   = $request->id;
     
  
  
    $test          = $request->test;
    $section       = $request->section;
    $question      = $request->question;
    $marks         = $request->marks;
    $Option1       = $request->Option1;
   $correctIndexes = $request->correct_option; // array of correct indexes

    
    
    
 DB::table('tbl_questions')
    ->where('id', $question_id)
    ->update([
    'section_id' => $section,
    'test_id'    => $test,
    'question'   => $question,
    'marks'      => $marks,
    'status'     => 1,
   
    'create_at'  => now(),
    'update_at'  => now(),
]);


    // 3️⃣ Delete old options (simple approach)
    DB::table('tbl_options')->where('question_id', $question_id)->delete();

    // 4️⃣ Insert updated options
    $insertData = [];
$siNo=0;
    foreach ($Option1 as $index => $optionValue) {
        $siNo++;
        $insertData[] = [
            'question_id' => $question_id,
            'option_text' => $optionValue,
            'is_correct'  => in_array($index, $correctIndexes) ? 1 : 0,
            'order_no'=>$siNo,
            'created_at'  => now(),
            'updated_at'  => now(),
        ];
    }

    DB::table('tbl_options')->insert($insertData);

    return back()->with('success', 'Question updated successfully!');
}
  
  public function updateQuestion(Request $request,$id){
      
       $data['menu'] = "questionbank";
    $data['sub_menu'] = "questionbank";

    $categories = CourseCategory::WHERE('is_deleted', '0')->orderBy('orders_by', 'ASC')->get();
    
     $data['question_bank']=DB::table('tbl_questions')->where('status', 1)->where('id', $id)->first();
     $data['question_option']=DB::table('tbl_options')->where('question_id', $id)->orderBy('order_no', 'ASC')->get();
     
     $data['question_section']=DB::table('tbl_eligibility_section')->where('status', 1)->get();
   
    foreach($data['question_section'] as $sectionValue){
        $sectiname[$sectionValue->id]=$sectionValue->section_name."-".$sectionValue->name;
    }
     
     
   
     $data['question_test']=DB::table('tbl_tests')->where('status', 1)->get();
    return view('backend.courses.question-bank-view', compact("data", "categories","sectiname"));
      
  }
  
  
  
  public function removeQuestion(Request $request,$id){
      
     $sqlRemoveQuestion=DB::table('tbl_questions')->where('id', $id)->delete();
     $delOption=DB::table('tbl_options')->where('question_id', $id)->delete();
     if($delOption){
         
          return redirect()->back()->with('success', 'Question removed successfully.'); 
     }
     
      
  }
  
  public function saveExcludedCourse(){
      $allDataExcludedId=DB::table('tbl_check_city')->get();
      
    foreach($allDataExcludedId as $allDataExcludedIdValue){
        
        $course_id =$allDataExcludedIdValue->course_id;
        $updateexcluded_by=DB::table("tbl_course")->where('id', $course_id)->update(['excluded_by'=>1]);
        
        
    }
    if($updateexcluded_by){
        echo "updated data! ";
    }
      
  }
  
  public function Getrobots(Request $request){
      
        $data['menu'] = "popularcourses";
        $data['sub_menu'] = "popularcourses";
    
    return view('backend.courses.robots', compact('data'));
    
      
  }
  
  public function redirectmanager(Request $request){
      
        $data['menu'] = "redirectmanager";
        $data['sub_menu'] = "redirectmanager";
        $data['redirect']=DB::table('tbl_redirect_url')->get();
    
    return view('backend.courses.redirectmanager', compact('data'));
    
      
  }
  
  public function Getschema(Request $request){
         $data['menu'] = "schema";
        $data['sub_menu'] = "schema";
        $data['redirect']=DB::table('tbl_schema')->get();
        $data['schema_category'] =DB::table('tbl_schema_category')->get();
         $data['page_category'] =DB::table('tbl_page_schema')->orderBy('id', 'ASC')->get();
    return view('backend.courses.schema', compact('data'));
       
      
  }
  
  public function saveschemacategory(Request $request){
      
      $catid=$request->id;
    $categoryList=DB::table('tbl_schema_type')->where('category_id', $catid)->get();
    foreach($categoryList as $categoryListValue){
       echo '<input type="checkbox" name="schematype[]"><label style="    margin-top: 45px;
    margin-inline: 3px;" onclick="getSchema('.$categoryListValue->id.')">'.$categoryListValue->schema_type.'</label>'; 
        
    }
    
  }
  
  public function addschema(Request $request){
   //  print_r($_POST);
     $schema=$request->schema_keyword;
     $id=($request->id)??'';
    if ($id) {
    $sql = DB::update(
        "UPDATE tbl_schema SET schema_keyword = ?, update_date = NOW() WHERE id = ?",
        [$schema, $id]
    );
} else {
    $sql = DB::insert(
        "INSERT INTO tbl_schema (schema_keyword, create_date, update_date) VALUES (?, NOW(), NOW())",
        [$schema]
    );
}
      if($sql){
      return redirect()->back()->with('success', 'Schema added successfully.');   
}
  }
  
  
  public function addredirectmanager(Request $request){
      $redirect_type=$request->redirect_type;
      $redirect_from=$request->redirect_from;
      $redirect_to=$request->redirect_to;
      $id=($request->id)??'';
      if($id!=''){
          
       $sql = DB::update("
    UPDATE tbl_redirect_url 
    SET redirect_from = ?, redirect_to = ?, redirect_type = ?
    WHERE id = ?",
    [$redirect_from, $redirect_to, $redirect_type, $id]
);   
      }else{
     $sql = DB::insert("
    INSERT INTO tbl_redirect_url (
        redirect_from, redirect_to, created_at, updated_at, redirect_type
    ) VALUES (?, ?, NOW(), NOW(), ?)",
    [$redirect_from, $redirect_to, $redirect_type]
);
}
if($sql){
      return redirect()->back()->with('success', 'redirect url created successfully.');   
}

  }
  
  public function removeRedirect(Request $request,$id){
     //echo $id; 
     
     $sql=DB::table('tbl_redirect_url')->where('id', $id)->delete();
    if($sql){
      return redirect()->back()->with('success', 'redirect url removed successfully.');   
}  
  }
  
  public function editRedirect(Request $request,$id){
     $data['menu'] = "redirectmanager";
        $data['sub_menu'] = "redirectmanager";
        $data['redirectdata']=DB::table('tbl_redirect_url')->where('id', $id)->first();
      $data['redirect']=DB::table('tbl_redirect_url')->get();
    return view('backend.courses.redirectmanager', compact('data'));
    
      
  }
  
   public function parentcat(Request $request,$id){
     // echo $id;
      //die;
        $data['menu'] = "parentcat";
        $data['sub_menu'] = "parentcat";
    // $data['parentcat'] = "parentcat";
    
    
  //$sqlCat=DB::selectOne("SELECT id FROM `tbl_course` WHERE id_hash='$id' ");
   $idmain=$id;
   
   $data['cat']=DB::select("SELECT * FROM `tbl_course_syllabus` WHERE course_id='$idmain'  AND parent=0  ORDER BY `orders_by` ASC");
    
    return view('backend.courses.parentcat', compact('data'));
    
      
  }
  
  
  
  public function uploadsitemap(Request $request){
    
    ///print_r($_FILES);  
    
   if ($request->file('robotstxt')) {
    $file = $request->file('robotstxt');
    
    // Force the filename to be "robots.txt"
    $filename =    $file->getClientOriginalName();

    // Move the file to the public root directory
    $file->move(base_path(), $filename);

    // Optionally store the filename or status in the database
  //  $category->robotstxt = $filename;
}
      return redirect()->back()->with('success', 'Robots uploaded successfully.');   
    
  }
  
  public function popularCourses(){
       $data['menu'] = "popularcourses";
    $data['sub_menu'] = "popularcourses";
    
     $courseNotInCity=DB::select("SELECT course_id FROM `tbl_check_city`");
      foreach($courseNotInCity as $cityValue){
          $cityArray[]=$cityValue->course_id;
          
      }
    $excludedCourseIds=$cityArray;
   $data['popular_course'] = Course::where('staus', 'Active')
                  ->WHERE('is_deleted', '0')
                   ->whereNotIn('id', $excludedCourseIds)
                  ->orderBy('pop_order_by', 'ASC')
                  ->whereRaw("FIND_IN_SET(?, new_category)", ['Popular courses'])
                 
                  ->get();
  
  return view('backend.courses.popular-courses', compact('data'));
  }
  
   public function careerCourses(){
       $data['menu'] = "careercourses";
    $data['sub_menu'] = "careercourses";
    
     $courseNotInCity=DB::select("SELECT course_id FROM `tbl_check_city`");
      foreach($courseNotInCity as $cityValue){
          $cityArray[]=$cityValue->course_id;
          
      }
    $excludedCourseIds=$cityArray;
     $data['career_course'] = Course::where('staus', 'Active')
                  ->WHERE('is_deleted', '0')
                   ->whereNotIn('id', $excludedCourseIds)
                  ->orderBy('cat_order_by', 'ASC')
                  ->whereRaw("FIND_IN_SET(?, new_category)", ['Career Related Programs'])
                 
                  ->get();
  
  return view('backend.courses.career-courses', compact('data'));
  }
  
  
  public function copyCourses(){
      
        $data['menu'] = "copycourses";
        $data['sub_menu'] = "copycourses";
        
        
         $data['career_course'] = Course::where('staus', 'Active')
                   ->WHERE('is_deleted', '0')
                   ->where('excluded_by', 1)
                  ->orderBy('id', 'DESC')
                  ->get();
  
  return view('backend.courses.copy-courses', compact('data'));
    
        
  }
  
  public function saveOrderPopCourse(Request $request){
      
     // print_r($_POST);
     $srno=$request->srno;
      $id=$request->id;
      $sql=DB::update("UPDATE tbl_course SET pop_order_by='$srno' WHERE id='$id' ");
      if($sql){
          echo 1;
      }else{
          echo 0;
      }
      
  }
  
  public function saveCourseBulkTestimonials(Request $request){
     $course_id=$request->id;
     $parent_id=$request->cat_id;
    $arrayCourseId=[];
    $getcourseidSql=DB::table('tbl_course')->where('parent', $parent_id)->where('staus', 'Active')->where('is_deleted', 0)->get();
    
    
    foreach($getcourseidSql as $getcourseidSqlValue){
        $arrayCourseId[]=$getcourseidSqlValue->id;
        
    }
    
    
    
    
$getallcoursesTestimonial = DB::table('tbl_course_testimonial')
    ->whereIn('course_id', $arrayCourseId)
    ->get();
    $sql='';
    if($getallcoursesTestimonial!=''){
foreach ($getallcoursesTestimonial as $testimonial) {
 $checkExistUser = DB::table('tbl_course_testimonial')
    ->where('name', $testimonial->name)->where('course_id', $course_id)
    ->exists();

if ($checkExistUser!='') {
    
}else{
  $sql=  DB::table('tbl_course_testimonial')->insert([
        'course_id'         => $course_id ?? null,
        'name'              => $testimonial->name ?? '',
        'heading'           => $testimonial->heading ?? '',
        'description'       => $testimonial->description ?? '',
        'image'             => $testimonial->image ?? '',
        'video_link'        => $testimonial->video_link ?? '',
        'created_at'        => now(),
        'updated_at'        => now(),
        'image_alt'         => $testimonial->image_alt ?? '',
        'image_title'       => $testimonial->image_title ?? '',
        'image_description' => $testimonial->image_description ?? '',
        'gender'            => $testimonial->gender ?? '',
    ]);
    
    } 
    
}

   
 if($sql){
      return redirect()->back()->with('success', 'Testimonial has been Save successfully added.'); 

 }  
    }else{
      return redirect()->back()->with('success', 'Testimonial data not founded.');   
    }
      
  }
  public function saveOrderCareerCourse(Request $request){
      
     // print_r($_POST);
     $srno=$request->srno;
      $id=$request->id;
      $sql=DB::update("UPDATE tbl_course SET cat_order_by='$srno' WHERE id='$id' ");
      if($sql){
          echo 1;
      }else{
          echo 0;
      }
      
  }
  
  
  public function removeschema(Request $request,$id){
    $sql=DB::table('tbl_schema')->where('id', $id)->delete();
     if($sql){
  return redirect()->back()->with('success', 'schema has been removed successfully.'); 
 }
  }
  public function editschema(Request $request,$id){
   ///echo  $id;
     $data['menu'] = "schema";
        $data['sub_menu'] = "schema";
        $data['redirectdata']=DB::table('tbl_schema')->where('id', $id)->first();
      $data['redirect']=DB::table('tbl_schema')->get();
    return view('backend.courses.schema', compact('data'));
      
  }
  
  
  public function insertBulkParent(Request $request){
      $course_id=$request->post('course_id');
      $topic=$request->post('topic');
      $type="Topics";
      $arrayData=explode("_",$topic);
      $i=0;
      $orders_by_hm = null; // or 0 if not nullable
      $created_at=date('Y-m-d h:i:s');
     foreach($arrayData as $arrayDataValue){
         $i++;
     $topicInsert= DB::insert("
    INSERT INTO tbl_course_syllabus
    (course_id, name, parent, type, orders_by, orders_by_hm, created_at, updated_at)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
    [
        $course_id,
        $arrayDataValue,
        0,
        $type,
        $i,
        $orders_by_hm, // now null
        now(), // Laravel helper for current datetime
        now()
    ]
);


      }
     if($topicInsert){
  return redirect()->back()->with('success', 'Parent Topic has been Save successfully.'); 
 }
      
  }
  
  public function saveOrderCourse(Request $request){
    
     $order_id=$request->post('id');
     $srno=$request->post('srno');
    
 $update=DB::insert("UPDATE tbl_course SET orders_by='$order_id' WHERE id_hash='$srno'"); 
 
 if($update){
     echo 1;   
 }else{
     echo 0;
 }
     
     
      
  }
  
  
  public function blogOrder(Request $request){
  
     $id=$request->id;
     $srno=$request->srno;
     
   
    $updated = DB::table('tbl_blog')
        ->where('id', $id)
        ->update(['order_by' => $srno]);
      
      
  }
  
  
   public function reviewsOrder(Request $request){
  
     $id=$request->id;
     $srno=$request->srno;
     
   
    $updated = DB::table('tbl_testimonial')
        ->where('id', $id)
        ->update(['order_by' => $srno]);
      
      
  }
  
  public function convertimage(Request $request){
      
//$sqlConvertImages = DB::table('tbl_blog')->orderby('id')->desc()->limit(4)->get();
   $sqlConvertImages = DB::table('tbl_blog')
    ->orderBy('id', 'asc')
    
    ->get();
  $updateImage='';
    foreach ($sqlConvertImages as $blog) {
        
        $imagename=$blog->image;
        $id=$blog->id;
        $extension =pathinfo($imagename, PATHINFO_EXTENSION);
         if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
        // Generate new webp file name
         $newName = pathinfo($imagename, PATHINFO_FILENAME) . '.webp';
         //$updaateImage=DB::update("UPDATE tbl_blog SET image='$newName' WHERE id='$id'");
           $updateImage = DB::update("UPDATE tbl_blog SET image = ? WHERE id = ?", [$newName, $id]);

            echo $updateImage ? 1 : 0;
          if($updateImage){
             echo 1; 
           }else{
             echo 0;
         }
        
         }
        
        
    
}

      
  }

  public function add_course(){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";

    $categories = CourseCategory::WHERE('is_deleted', '0')->orderBy('orders_by', 'ASC')->get();

    return view('backend.courses.add', compact("data", "categories"));
  }


public function add_course_location(){
    $data['menu'] = "courselocation";
    $data['sub_menu'] = "courselocation";

    $categories = CourseCategory::WHERE('is_deleted', '0')->orderBy('orders_by', 'ASC')->get();

    return view('backend.courses.add-location', compact("data", "categories"));
  }


   public function saveOrderCourseExcluded(Request $request){
       
     
        $id=$request->post('id');
        $valueId=$request->post('valueId');
       $checkExist = DB::table('tbl_check_city')->where('course_id', $id)->count();

        if($checkExist>0){
             if($valueId==0){
           DB::table('tbl_check_city')->where('course_id', $id)->delete();     
             }
        }else{
            
             
       $excludedCourses=DB::insert("INSERT INTO tbl_check_city(course_id)VALUES('$id')");
            
        if($excludedCourses){
            echo 1;
        }else{
            echo 0;
        }
        }
   }



  public function saveCourse(Request $request){
    $request->validate([
        'name' => 'required',
    ]);

    // Check If Already Name Exists ---
    $uniqSlug = $this->check_unique_name('name',$request->name, $request->parent);
    if($uniqSlug == false){
      return redirect()->back()->with('error', 'Course Name Already Available. So can not Add Course!!!'); 
      die();
    }

    // Slug Name--
    if( !empty($request->slug)){
			$url_title = Str::slug($request->slug);
		} else{
			$url_title = Str::slug($request->name);
		}
		$uniqSlug = $this->check_unique('slug',$url_title);

    $category = new Course;
    $category->name = $request->name;
     $category->display_name = $request->display_name;
    $category->parent = $request->parent;
    $category->staus = $request->status;
    $category->reviews = $request->reviews;
    $category->no_review = $request->no_review;
    $category->content = $request->content;
    $category->add_date = $request->add_date;
    $category->video_link = $request->video_link;
    $category->short_content = $request->short_content;
     $category->heading1 = $request->heading1;
      $category->heading1 = $request->heading1;
      $category->h2_tags = $request->h2_tags;
    $category->course_category = $request->course_category;
    $category->course_type = $request->course_type;
    $category->course_based = $request->course_based;
    $category->type_course = $request->type_course;
    $category->new_category = implode(',', $request->home_page); 
    $category->slug = $uniqSlug;
    $category->is_deleted = "0";
    if($request->file('image')){
      $file= $request->file('image');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      $category->image = $filename;
    }
    $category->save();

    $insertedId = $category->id;

    $catUpd = Course::find($insertedId);
    $catUpd->id_hash = md5($insertedId);
    $catUpd->orders_by = $insertedId;
    $catUpd->save();

    /*
    // Batch Insert
    $batch = new Batch;
    $batch->course_id = $insertedId;
    $batch->save();
    */

    return redirect(url('admin/course-batch/'.md5($insertedId)))->with('success', 'Course has been Save successfully.'); 
  }

public function saveCourseLocation(Request $request){
  
  
   if($request->file('image')){
      $file= $request->file('image');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
     /// $category->image = $filename;
    }
  
   $insertedId=  DB::table('tbl_location')->insertGetId([
        'name'         => $request->name ?? null,
        'display_name'              => $request->display_name ?? '',
        'parent'           => $request->parent ?? '',
        'staus'       => $request->status ?? '',
        'reviews'             => $request->no_review ?? '',
        'no_review'        => $testimonial->video_link ?? '',
        'content'        => $request->content,
        'add_date'        => $request->add_date,
        'video_link'         => $request->video_link ?? '',
        'short_content'       =>$request->short_content ?? '',
        'heading1' => $request->heading1 ?? '',
        'heading2'            => $request->heading2 ?? '',
         'video_link'         => $request->video_link ?? null,
          'course_category'         => $request->course_category ?? null,
           'course_type'         => $request->course_type ?? null,
            'course_based'         => $request->course_based ?? null,
             'type_course'         => $request->type_course ?? null,
              'new_category'         => $request->new_category ?? null,
               'slug'         => $request->slug ?? null,
                'image'         => $filename ?? null,
                'is_deleted'=>0,
    ]);
  
  
  
    return redirect(url('admin/course-batch-location/'.$insertedId))->with('success', 'Course has been Save successfully.'); 

}


 public function course_batch_location($id_hash, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $id_hash;

  //  $category = Course::where('id_hash', $id_hash)->first();
    
    
  $category=  DB::selectOne("SELECT * FROM `tbl_location` WHERE `id` = '$id_hash' ");
  
  
    $batch = DB::table('tbl_course_batches_location')->where('course_id', $category->id)->orderBy('id', 'DESC')->paginate(25);
    return view('backend.courses.course_batch_location', compact("data", "category", "batch"));
  }


  public function check_unique($key, $value){
      $check = Course::WHERE($key, $value)
              ->first();
      if( !empty($check->id) ){
          $value1 = $value . "1";
          return $this->check_unique($key, $value1);
      } else {
          return $value; 
      }
  }

  public function check_unique_name($key, $value, $parent){
    $check = Course::WHERE($key, $value)
            ->WHERE('parent', $parent)->first();
    if( !empty($check->id) ){
        return false;
    } else {
        return true; 
    }
  }

  public function editCourse($id_hash){
      $data['menu'] = "course";
      $data['sub_menu'] = "course";

    //  $category = Course::where('id_hash', $id_hash)->first();
    
     $excludedData=DB::table('tbl_check_city')->get();
    
    foreach($excludedData as $excludedDataValue){
        $excludedDataAll[]=$excludedDataValue->course_id;
    }
    
    //$excludedCourse=DB::selectOne("SELECT * FROM tbl_course WHERE id IN($excludedDataAll) ");
    
   
                    
            

    
     $category=  DB::selectOne("SELECT * FROM `tbl_course` WHERE `id_hash` LIKE '%$id_hash%' ");
      $data['id_hash'] = $category->id_hash;
      $categories = CourseCategory::latest()->WHERE('is_deleted', '0')->WHERE('staus', 'Active')->paginate(1000);
      $catid=$category->parent;
       $excludedCourse = DB::table('tbl_course')
                    ->whereIn('id', $excludedDataAll)->where('parent', $catid)
                    ->get();
      
       $getcourse=DB::table('tbl_course')->where('parent', $catid)->where('staus', 'Active')->where('is_deleted', 0)->whereNull('excluded_by')->get();
       
       $cityList=DB::table("tbl_city")->get();
    
      return view('backend.courses.edit', compact("data", "category", "categories","excludedCourse","getcourse","cityList"));
  }
public function saveExcludedParent(Request $request){
   /// print_r($_POST);
    $course_id=$request->post('course_id');
   $child_course=$request->post('child_course');
   foreach($child_course as $child_coursevalue){
      $updatesql=DB::update("UPDATE tbl_check_city SET parent_id='$course_id' WHERE course_id='$child_coursevalue' "); 
       
   }
   if($updatesql){
      return redirect()->back()->with('success', 'Course has been assigned successfully.');
   }
   
    
}

public function getsubcity(Request $request){
  
   $city_id=$request->id;
 
  if($city_id==10982){
      $subcitySql=DB::table('tbl_city')->get();
  foreach($subcitySql as $cityValue){
      echo "<option value='".$cityValue->city."' >".$cityValue->city."</option>";
      
      
  }
      
  }else{
  $subcitySql = DB::table('tbl_subcity')
    ->where('city_id', $city_id)
    ->get();

  foreach($subcitySql as $cityValue){
      echo "<option value='".$cityValue->sub_city."' >".$cityValue->sub_city."</option>";
      
      
  }
  }
  
    
}



public function saveCopyParentCourse(Request $request){
     $course_id=$request->post('course_id');
     $subcity=$request->post('subcity');
     
  
     
     $courseSql=DB::table('tbl_course')->where('id', $course_id)->first();
     $coursename=$courseSql->name;
     
       foreach ($subcity as $subcityValue) {
    $subcitynameurl = Str::slug($subcityValue);   // because $subcityValue is a string
    $finalSlug = Str::slug($coursename . '-' . $subcitynameurl);
     $name=$coursename." in "." ".$subcityValue;
    // Now use $finalSlug


            
 $sql = DB::insert("
    INSERT INTO tbl_course (
        name, slug, id_hash, parent, staus, created_at, add_date, updated_at,
        is_deleted, image, reviews, no_review, content, short_content,
        heading1, heading2, video_link, course_category, course_type,
        course_based, meta_title, meta_keywords, meta_description,
        orders_by, online_offline, image_alt, image_title, image_description,
        canonical, type_course, new_category, pdf_curriculum,
        display_name, course_benifits, course_thumbnail,
        cat_order_by, pop_order_by, category_order
    )
    SELECT
        ?,
        ?,              
        NULL,           
        parent,
        staus,
        NOW(),
        add_date,
        NOW(),
        is_deleted,
        image,
        reviews,
        no_review,
        content,
        short_content,
        heading1,
        heading2,
        video_link,
        course_category,
        course_type,
        course_based,
        meta_title,
        meta_keywords,
        meta_description,
        orders_by,
        online_offline,
        image_alt,
        image_title,
        image_description,
        canonical,
        type_course,
        new_category,
        pdf_curriculum,
        display_name,
        course_benifits,
        course_thumbnail,
        cat_order_by,
        pop_order_by,
        category_order
    FROM tbl_course
    WHERE id = ?
", [$name,$finalSlug, $course_id]);


$newCourseId = DB::getPdo()->lastInsertId();

$getlastid = DB::table('tbl_course')
    ->orderBy('id', 'desc')
    ->offset(1)
    ->limit(1)
    ->first();
    
$secondLastId = $getlastid->orders_by + 1;

DB::table('tbl_course')
    ->where('id', $newCourseId)
    ->update([
        'id_hash' => md5($newCourseId),'orders_by' =>$secondLastId,'excluded_by'=>1
    ]);
DB::table("tbl_check_city")->insert(['course_id'=>$newCourseId,'parent_id'=>$course_id]);

}


     if($sql){
      return redirect()->back()->with('success', 'Course has been copied successfully.');
   }
     
    
    
    
}




  public function updateCourse(Request $request){
    //   dd($request);
    $request->validate([
        'name' => 'required',
    ]);

    // Check If Already Name Exists ---
    $uniqSlug = $this->check_unique_name1('name',$request->name, $request->parent,$request->id);
    if($uniqSlug == false){
      return redirect()->back()->with('error', 'Course Name Already Available. So can not Add Course!!!'); 
      die();
    }
    
    // Slug Name--
    if( !empty($request->slug)){
			$url_title = Str::slug($request->slug);
		} else{
			$url_title = Str::slug($request->name);
		}
    $uniqSlug = $this->check_unique1('slug',$url_title,$request->id);
    

    $category = new Course;
    $category = Course::find($request->id);
    $category->name = $request->name;
      $category->orders_by = $request->orders_by;
    
     $category->display_name = $request->display_name;
    $category->parent = $request->parent;
    $category->staus = $request->status;
    $category->reviews = $request->reviews;
    $category->content = $request->content;
    $category->add_date = $request->add_date;
    $category->no_review = $request->no_review;
    $category->video_link = $request->video_link;
    $category->short_content = $request->short_content;
    
      $category->heading1 = $request->heading1;
      $category->heading2 = $request->heading2;
       $category->h2_tags = $request->h2_tags;
    $category->course_category = $request->course_category;
    $category->course_type = $request->course_type;
    $category->course_based = $request->course_based;
    $category->type_course = $request->type_course;
    $category->new_category = implode(',', $request->home_page); 
      
    $category->slug = $uniqSlug;
    
    
    if($request->file('image')){
      $file= $request->file('image');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $category->image = $filename;
      } else {
        $category->image = $request->old_image;
      }
      
    }
    
    
    
        if($request->file('pdf_curriculum')){
      $file= $request->file('pdf_curriculum');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $category->pdf_curriculum = $filename;
      } else {
        $category->pdf_curriculum = $request->old_pdf_curriculum;
      }
      
    }
    
    
    
       if($request->file('course_thumbnail')){
      $file= $request->file('course_thumbnail');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $category->course_thumbnail = $filename;
      } else {
        $category->course_thumbnail = $request->old_course_thumbnail;
      }
      
    }
    
    
    
    
    $category->save();

    return redirect(url('admin/course-batch/'.md5($request->id)))->with('success', 'Course has been Save successfully.'); 
  }

  public function check_unique1($key, $value, $id){
    $check = Course::WHERE($key, $value)
            ->where('id', '!=' , $id)->first();
    if( !empty($check->id) ){
        $value1 = $value . "1";
        return $this->check_unique1($key, $value1, $id);
    } else {
        return $value; 
    }
  }
  public function check_unique_name1($key, $value, $parent, $id){
    $check = Course::WHERE($key, $value)
            ->where('id', '!=' , $id)
            ->WHERE('parent', $parent)->first();
    if( !empty($check->id) ){
        return false;
    } else {
        return true; 
    }
  }

  public function deleteCourse($id){
    $catUpd = Course::find($id);
    $catUpd->is_deleted = 1;
    $catUpd->save();
    return redirect()->back()->with('success', 'Course has been Deleted successfully.');
  }

  public function del_course(Request $request){

    $data['menu'] = "course";
    $data['sub_menu'] = "del_course";

    $keyword = $request['keyword'];
    $data['keyword'] = $keyword;
    $r_page = $request['r_page'];
    if(!empty($r_page)){
      $r_page = $r_page;
      $data['r_page'] = $r_page;
    } else {
      $r_page = 25;
      $data['r_page'] = 25;
    }

    if(!empty($keyword)){
        $categories = Course::where('name', 'like', '%'.$keyword.'%')
        ->WHERE('is_deleted', '1')
        ->latest()
        ->paginate($r_page);
        $categories->appends(['keyword' => $keyword]);
        $categories->appends(['r_page' => $r_page]);
    } else {
        $categories = Course::latest()->WHERE('is_deleted', '1')->paginate($r_page);
        $categories->appends(['r_page' => $r_page]);
    }

    return view('backend.courses.del',compact('data', 'categories'))->with('i', (request()->input('page', 1) - 1) * $r_page);
  }

  public function restoreCourse($id){
    $catUpd = Course::find($id);
    $catUpd->is_deleted = 0;
    $catUpd->save();
    return redirect()->back()->with('success', 'Course has been Restore successfully.');
  }


  // ==== Up Down
  public function course_up($count, $id){
    $category = new Course;
    $category = Course::find($id);
    $category->orders_by = $count;
    $category->save();

    return redirect()->back()->with('success', 'Course Order has been Updated successfully.');
  }

  // ==== Batch ----

  public function course_batch($id_hash, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $id_hash;

  //  $category = Course::where('id_hash', $id_hash)->first();
    
    
  $category=  DB::selectOne("SELECT * FROM `tbl_course` WHERE `id_hash` LIKE '%$id_hash%' ");
  
  
    $batch = Batch::where('course_id', $category->id)->orderBy('id', 'DESC')->paginate(25);
    return view('backend.courses.course_batch', compact("data", "category", "batch"));
  }

  public function insertBatch(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  
  $batch = new Batch;
  $batch->course_id = $request->id;
  $batch->name = $request->name;
  $batch->type = $request->type;
  $batch->batch_type = $request->batch_type;
  $batch->start_date = $request->start_date;
  $batch->batch_fee = $request->batch_fee;
  $batch->fast_filling = $request->fast_filling;
  $batch->save();

  return redirect()->back()->with('success', 'Course Bach has been Save successfully.'); 
  }

  public function course_batch_edit($id, $course_id, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $course_id;

    $category = Course::where('id', $course_id)->first();
    $batch = Batch::where('id', $id)->first();
    return view('backend.courses.course_batch_edit', compact("data", "category", "batch"));
  }

  public function updateBatch(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  
  $batch = Batch::find($request->id);
  $batch->name = $request->name;
  $batch->type = $request->type;
  $batch->batch_type = $request->batch_type;
  $batch->start_date = $request->start_date;
  $batch->batch_fee = $request->batch_fee;
  $batch->fast_filling = $request->fast_filling;
  $batch->save();

  return redirect(url('admin/course-batch/'.$request->id_hash))->with('success', 'Course Bach has been Update successfully.'); 
  }

  public function delete_batch($id){

    $batch = Batch::find($id);
    if ($batch) {
      $batch->delete();
    }

    return redirect()->back()->with('success', 'Course Bach has been Delete successfully.'); 
  }

  // ==== Batch #END ----



  // ==== Enroll ----

  public function course_enroll($id_hash, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $id_hash;

    //$category = Course::where('id_hash', $id_hash)->first();
     $category=  DB::selectOne("SELECT * FROM `tbl_course` WHERE `id_hash` LIKE '%$id_hash%' ");
    $enroll = Enroll::where('course_id', $category->id)->orderBy('id', 'DESC')->paginate(25);
    return view('backend.courses.course_enroll', compact("data", "category", "enroll"));
  }

  public function insertEnroll(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  
  $enroll = new Enroll;
  $enroll->course_id = $request->id;
  $enroll->name = $request->name;
  $enroll->description = $request->description;
  if($request->file('image')){
    $file= $request->file('image');
    $filename= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('uploads'), $filename);
    $enroll->image = $filename;
  }

  $enroll->image_alt = $request->image_alt;
  $enroll->image_title = $request->image_title;
  $enroll->image_description = $request->image_description;

  $enroll->save();

  return redirect()->back()->with('success', 'Course Bach has been Save successfully.'); 
  }

  public function delete_enroll($id, $image){

    $path = 'public/uploads/'.$image;
    if (file_exists($path)) {
      if (unlink($path)) {
          echo 'File deleted successfully.';
      } else {
          echo 'Unable to delete the file.';
      }
    } else {
      echo 'File does not exist.';
    }

    $enroll = Enroll::find($id);
    if ($enroll) {
      $enroll->delete();
    }



    return redirect()->back()->with('success', 'Course Enroll has been Delete successfully.'); 
  }



  public function course_enroll_edit($id, $course_id, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $course_id;

    $category = Course::where('id', $course_id)->first();
    $enroll = Enroll::where('id', $id)->first();
    return view('backend.courses.course_enroll_edit', compact("data", "category", "enroll"));
  }

  public function updateEnroll(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  
  $enroll = Enroll::find($request->id);
  $enroll->name = $request->name;
  $enroll->description = $request->description;
  if($request->file('image')){
    $file= $request->file('image');
    $filename= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('uploads'), $filename);
    $enroll->image = $filename;
  }

  $enroll->image_alt = $request->image_alt;
  $enroll->image_title = $request->image_title;
  $enroll->image_description = $request->image_description;

  $enroll->save();

  return redirect(url('admin/course-enroll/'.$request->id_hash))->with('success', 'Course Enroll has been Update successfully.'); 
  }

  // ==== Enroll #END ----


  // ==== Training ----

  public function course_training($id_hash, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $id_hash;

    //$category = Course::where('id_hash', $id_hash)->first();
     $category=  DB::selectOne("SELECT * FROM `tbl_course` WHERE `id_hash` LIKE '%$id_hash%' ");
    $training = Training::where('course_id', $category->id)->orderBy('id', 'DESC')->paginate(25);
    return view('backend.courses.course_training', compact("data", "category", "training"));
  }

  public function insertTraining(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  $cid=$request->id;
 $crddesc=  $request->short_desc;
  $sqlupdate=DB::update("UPDATE tbl_course SET course_benifits='$crddesc' WHERE id='$cid' ");
  $training = new Training;
  $training->course_id = $request->id;
  $training->name = $request->name;
 /// $training->course_benifits = $request->short_desc;
 /*
 
  if($request->file('annual_salary')){
    $file= $request->file('annual_salary');
    $filename= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('uploads'), $filename);
    $training->annual_salary = $filename;
  }
  */
  
  if($request->file('hiring_company')){
    $file= $request->file('hiring_company');
    $filename= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('uploads'), $filename);
    $training->hiring_company = $filename;
  }


  $training->image_alt = $request->image_alt;
  $training->image_title = $request->image_title;
  $training->image_description = $request->image_description;
  $training->image_alt1 = $request->image_alt1;
  $training->image_title1 = $request->image_title1;
  $training->image_description1 = $request->image_description1;

  $training->save();

  return redirect()->back()->with('success', 'Course Training has been Save successfully.'); 
  }


  public function course_training_edit($id, $course_id, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $course_id;

    $category = Course::where('id', $course_id)->first();
    $training = Training::where('id', $id)->first();
    return view('backend.courses.course_training_edit', compact("data", "category", "training"));
  }

  public function updateTraining(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  
  $training = Training::find($request->id);
  $training->name = $request->name;
  
$cid = $request->course_id;
$crddesc = $request->short_desc;

$sqlupdate = DB::update("UPDATE tbl_course SET course_benifits = ? WHERE id = ?", [$crddesc, $cid]);

  if($request->file('annual_salary')){
    $file= $request->file('annual_salary');
    $filename= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('uploads'), $filename);
    $training->annual_salary = $filename;
  }
  if($request->file('hiring_company')){
    $file= $request->file('hiring_company');
    $filename= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('uploads'), $filename);
    $training->hiring_company = $filename;
  }


  $training->image_alt = $request->image_alt;
  $training->image_title = $request->image_title;
  $training->image_description = $request->image_description;
  $training->image_alt1 = $request->image_alt1;
  $training->image_title1 = $request->image_title1;
  $training->image_description1 = $request->image_description1;

  $training->save();

  return redirect(url('admin/course-training/'.$request->id_hash))->with('success', 'Course Training has been Update successfully.'); 
  }

  public function delete_training($id){
/*
    $path = 'public/uploads/'.$image;
    if (file_exists($path)) {
      if (unlink($path)) {
          echo 'File deleted successfully.';
      } else {
          echo 'Unable to delete the file.';
      }
    } else {
      echo 'File does not exist.';
    }

    $path1 = 'public/uploads/'.$s_image;
    if (file_exists($path1)) {
      if (unlink($path1)) {
          echo 'File deleted successfully.';
      } else {
          echo 'Unable to delete the file.';
      }
    } else {
      echo 'File does not exist.';
    }
*/
    $training = Training::find($id);
    if ($training) {
   $sql=   $training->delete();
    }
if($sql){


    return redirect()->back()->with('success', 'Course Training has been Delete successfully.'); 
}
  }
  
  public function savevideo(Request $request){
     ///print_r($_POST); 
     
     $sr_no=$request->sr_no;
      $name=$request->name;
         $filename=$request->image;
    /*
      if($request->file('image')){
    $file= $request->file('image');
    $filename= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('uploads'), $filename);
   
  }
  */
  
   if($request->file('imagenew')){
    $file= $request->file('imagenew');
    $filenamenew= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('uploads'), $filenamenew);
   
  }else{
      $filenamenew="";
  }
  $id=$request->id;
  if($id==''){
$sql = DB::insert(
    "INSERT INTO tbl_video (course_name, video, order_by, image, created_at, updated_at)
     VALUES (?, ?, ?, ?, NOW(), NOW())",
    [$name, $filename, $sr_no, $filenamenew]
);
}else{
    if($filenamenew!=''){
   $sql = DB::table('tbl_video')
    ->where('id', $id)
    ->update([
        'course_name' => $name,
        'video'       => $filename,
        'order_by'    => $sr_no,
        'image'       => $filenamenew,
        'updated_at'  => now(),
    ]);
    }else{
    $sql = DB::table('tbl_video')
    ->where('id', $id)
    ->update([
        'course_name' => $name,
        'video'       => $filename,
        'order_by'    => $sr_no,
       
        'updated_at'  => now(),
    ]);    
    }
 
}
   if($sql){
  return redirect()->back()->with('success', 'Video has been Save successfully saved.'); 
}
  }
  
  public function landingpage(Request $request){
    $data['menu'] = "landingpage";
    $data['sub_menu'] = "landingpage";
   // $Videosql=DB::table('tbl_video')->orderBy('order_by','ASC')->get();
     return view('backend.courses.landingpage',compact('data')); 
      
  }
  
public function createlanding(Request $request){
     $request->validate([
        'folder_file' => 'required|file|mimes:zip|max:10240',
    ]);

    $file = $request->file('folder_file');

    $folderName = Str::slug(
        pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
    );

    // =========================
    // PATH OUTSIDE PUBLIC
    // =========================
    $testingPath = base_path('ad');              // /project/testing
    $zipPath = $testingPath . '/' . $folderName . '.zip';
    $extractPath = $testingPath . '/' . $folderName;

    // Ensure /testing exists
    if (!File::exists($testingPath)) {
        File::makeDirectory($testingPath, 0755, true);
    }

    // Prevent overwrite
    if (File::exists($extractPath)) {
        return back()->withErrors('Landing page already exists.');
    }

    // Move ZIP
    $file->move($testingPath, $folderName . '.zip');

    // Create extract folder
    File::makeDirectory($extractPath, 0755, true);

    // Unzip
    $zip = new ZipArchive;

    if ($zip->open($zipPath) !== true) {
        return back()->withErrors('Unable to unzip the file.');
    }

    // ZIP Slip protection
    for ($i = 0; $i < $zip->numFiles; $i++) {
        if (str_contains($zip->getNameIndex($i), '..')) {
            $zip->close();
            File::delete($zipPath);
            return back()->withErrors('Invalid ZIP structure.');
        }
    }

    $zip->extractTo($extractPath);
    $zip->close();

    // Remove ZIP
    File::delete($zipPath);

    return redirect()->to('/testing/'.$folderName.'/')
        ->with('success', 'Landing page created successfully!');
}


  
  public function savegallery(Request $request){
      
      $k=0;
      $cate_id=$request->cate_id;
 foreach ($request->file('image') as $file) {
     $originalName = $file->getClientOriginalName();
    
     $explodearry=explode(".",$originalName);
     $k++;
   
        $filename = date('YmdHi') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        
        $sql=DB::table('tbl_gallery')->insert([
    'image' => $filename, 'cate_id'=>$cate_id
]);
       
    }
     if($sql){
  return redirect()->back()->with('success', 'image has been Save successfully saved.'); 
}
      
      
  }
  
  public function update_video($id){
  
  $sqldata=DB::table("tbl_video")->where('id', $id)->first();
    
       $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $Videosql=DB::table('tbl_video')->orderBy('order_by','ASC')->get();
    
    
    return view('backend.courses.allvideo',compact('data','Videosql','sqldata'));
      
  }
  
  public function GetVideo(){
       $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $Videosql=DB::table('tbl_video')->orderBy('order_by','ASC')->get();
    
    
    return view('backend.courses.allvideo',compact('data','Videosql'));
  }
  function updatevideoorder(Request $request){
   
     $id=$request->id;
     $value=$request->value;
     $sql=DB::update("UPDATE tbl_video SET order_by='$value' WHERE id='$id' ");
      
  }
  
    public function Getgallery(){
          $data['menu'] = "Gallery";
    $data['sub_menu'] = "Gallery";
    $Videosql=DB::table('tbl_gallery')->get();
    
    $data['category']=DB::table('tbl_festival')->get();
    foreach($data['category'] as $catename){
        $datacatename[$catename->id]=$catename->name;
    }
  
    return view('backend.courses.allgallery',compact('data','Videosql','datacatename'));
        
    }
    
      public function Getcategory(){
          $id= ($_GET['id'])??'';
          
          $data['menu'] = "Gallerycat";
    $data['sub_menu'] = "Gallerycat";
    $Videosql=DB::table('tbl_festival')->get();
    
    $data['category']=DB::table('tbl_festival')->orderBy('order_by', 'ASC')->first();
   if($id!=''){
        $data['categoryview']=DB::table('tbl_festival')->where('id', $id)->orderBy('order_by', 'ASC')->get();
       
   }
  
    return view('backend.courses.allgallerycat',compact('data','Videosql'));
        
    }
    
    public function savegallerycat(Request $request){
        
      //  print_r($_POST);
      //  die;
      $name=$request->catname;
       $title=$request->title;
        $orderby=$request->orderby;
        $id=($request->id)??'';
        if($id==''){
   $sql=  DB::table('tbl_festival')->insert([
    'name'      => $name,
    'title'     => $title,
    'order_by'  => $orderby,
    'create_at' => now()
]);
}else{
$sql = DB::table('tbl_festival')
    ->where('id', $id) 
    ->update([
        'name'      => $name,
        'title'     => $title,
        'order_by'  => $orderby,
        'create_at' => now()
    ]);  
}

if($sql){
    return redirect()->back()->with('success', 'Category has been  successfully added.'); 
  
    
}
    }


public function saveOrdergallery(Request $request){
  $id=$request->id;
  $srno=$request->srno;
  
  $sqlupdate=DB::table('tbl_gallery')->where('id', $id)->update(['order_by'=>$srno]);
  if($sqlupdate){
      echo 1;
  }
  
    
}

public function savegallerycateorder(Request $request){
    $id=$request->id;
    $srno=$request->srno;
    $update=DB::table('tbl_festival')->where('id', $id)->update(['order_by'=>$srno]);
    
    if($update){
    echo 1;    
    }
    
   
    
}


public function sitemap_generator(){
    
       $data['menu'] = "sitemap";
    $data['sub_menu'] = "sitemap";
    
      return view('backend.courses.sitemap',compact('data'));
}

 public function generateSitemap()
    {
        try {
            SitemapGenerator::create(config('app.url'))
                ->writeToFile(base_path('sitemap.xml'));

            return back()->with('success', 'Sitemap generated successfully!');
        } catch (\Exception $e) {
            // Catch any errors
            return back()->with('error', 'Error generating sitemap: ' . $e->getMessage());
        }
    }
  // ==== Training #END ----


  // ==== Solutions ----
  
    public function remove_gallery(Request $request,$id){
    //  echo $id;
    
    $removesql=DB::table('tbl_gallery')->where('id', $id)->delete();
   if($removesql){
  return redirect()->back()->with('success', 'Video remove has been  successfully.'); 
}
      
  }
    public function delete_gallery_cat(Request $request,$id){
    //  echo $id;
    
    $removesql=DB::table('tbl_festival')->where('id', $id)->delete();
   if($removesql){
  return redirect()->back()->with('success', 'category  has been  successfully remove.'); 
}
      
  }
  
  
  public function savesolutionContent(Request $request){
      $srno=$request->srno;
      $id=$request->id;
      $sql=DB::update("UPDATE tbl_course_solution SET name='$srno' WHERE id='$id'");
      
  }
  
  
  public function remove_video(Request $request,$id){
    //  echo $id;
    
    $removesql=DB::table('tbl_video')->where('id', $id)->delete();
   if($removesql){
  return redirect()->back()->with('success', 'Video remove has been  successfully.'); 
}
      
  }

  public function course_solutions($id_hash, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $id_hash;

    //$category = Course::where('id_hash', $id_hash)->first();
     $category=  DB::selectOne("SELECT * FROM `tbl_course` WHERE `id_hash` LIKE '%$id_hash%' ");
    $solutions = Solution::where('course_id', $category->id)->orderBy('order_by', 'ASC')->paginate(25);
    return view('backend.courses.course_solutions', compact("data", "category", "solutions"));
  }

  public function insertSolutions(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  
  

   $solutions = new Solution;
  
  $namedata=explode("_",$request->name);
  
 // print_r($namedata);
 // die;
 $course_id=$request->id;
  foreach($namedata as $namedatavalue){
      
   
 //$solutions->course_id = $request->id;
 //$solutions->name = $namedatavalue;
  //$solutions->save();  
  
 $sql = DB::insert(
    "INSERT INTO tbl_course_solution (course_id, name, created_at, updated_at) VALUES (?, ?, now(), now())",
    [$course_id, $namedatavalue]
);

  }
  
 // print_r($namedata);
//  die;
 // $solutions = new Solution;
 // $solutions->course_id = $request->id;
 //$solutions->name = $request->name;
 // $solutions->save();
if($sql){
  return redirect()->back()->with('success', 'Course Solutions has been Save successfully.'); 
}
  }

  public function delete_solutions($id){

    $solutions = Solution::find($id);
    if ($solutions) {
      $solutions->delete();
    }



    return redirect()->back()->with('success', 'Course Solutions has been Delete successfully.'); 
  }
  
  
  
  public function saveTopicOrderCourse(Request $request){
    
     $id=$request->post('id');
     $srno=$request->post('srno');
     $sql=DB::update("UPDATE tbl_course_syllabus SET orders_by='$id' WHERE id='$srno' ");
     
     if($sql){
         echo 1;
         
     }else{
         echo 0;
     }
      
      
  }
  
  
   public function saveTopicOrder(Request $request){
    
     $id=$request->post('id');
     $srno=$request->post('srno');
     $sql=DB::update("UPDATE tbl_course_syllabus SET orders_by='$id' WHERE id='$srno' ");
     
     if($sql){
         echo 1;
         
     }else{
         echo 0;
     }
      
      
  }
    
  public function saveParentTopicName(Request $request){
    
     $id=$request->post('id');
     $srno=$request->post('srno');
     $sql=DB::update("UPDATE tbl_course_syllabus SET name='$id' WHERE id='$srno' ");
     
     if($sql){
         echo 1;
         
     }else{
         echo 0;
     }
      
      
  }
  

   public function parentTopic(Request $request,$id,$course_id){
     // echo $id;
      //die;
        $data['menu'] = "topics";
        $data['sub_menu'] = "topics";
    // $data['parentcat'] = "parentcat";
 // $sqlCat=DB::selectOne("SELECT id FROM `tbl_course` WHERE id_hash='$id' ");
  // $idmain=$sqlCat->id;
   
   $data['cat']=DB::select("SELECT * FROM `tbl_course_syllabus` WHERE course_id='$course_id'  AND parent='$id' AND type='Topics'  ORDER BY `orders_by` ASC");
    
    return view('backend.courses.parenttopic', compact('data'));
    
      
  }
  
     public function parentHandson(Request $request,$id,$course_id){
     // echo $id;
      //die;
        $data['menu'] = "topics";
        $data['sub_menu'] = "topics";
    // $data['parentcat'] = "parentcat";
 // $sqlCat=DB::selectOne("SELECT id FROM `tbl_course` WHERE id_hash='$id' ");
  // $idmain=$sqlCat->id;
   
   $data['cat']=DB::select("SELECT * FROM `tbl_course_syllabus` WHERE course_id='$course_id'  AND parent='$id' AND type='Hand On'  ORDER BY `orders_by` ASC");
    
    return view('backend.courses.parentHandOn', compact('data'));
    
      
  }
  
       public function parentSkills(Request $request,$id,$course_id){
     // echo $id;
      //die;
        $data['menu'] = "topics";
        $data['sub_menu'] = "topics";
    // $data['parentcat'] = "parentcat";
 // $sqlCat=DB::selectOne("SELECT id FROM `tbl_course` WHERE id_hash='$id' ");
  // $idmain=$sqlCat->id;
   
   $data['cat']=DB::select("SELECT * FROM `tbl_course_syllabus` WHERE course_id='$course_id'  AND parent='$id' AND type='Skills'  ORDER BY `orders_by` ASC");
    
    return view('backend.courses.parentskills', compact('data'));
    
      
  }
  
  
  public function saveCertificateOrder(Request $request){
     // print_r($_POST);
     
     $id=$request->post('id');
     $srno=$request->post('srno');
     $sql=DB::update("UPDATE tbl_course_certificate SET order_by='$id' WHERE id='$srno' ");
     
     if($sql){
         echo 1;
         
     }else{
         echo 0;
     }
      
  }

  // ==== Solutions #END ----

  // ==== Certificate ----

  public function course_certificate($id_hash, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $id_hash;

    //$category = Course::where('id_hash', $id_hash)->first();
     $category=  DB::selectOne("SELECT * FROM `tbl_course` WHERE `id_hash` LIKE '%$id_hash%' ");
    $certificate = Certificate::where('course_id', $category->id)->orderBy('order_by', 'ASC')->paginate(25);
    return view('backend.courses.course_certificate', compact("data", "category", "certificate"));
  }

  public function insertCertificate(Request $request){
      
   
   
  
  
 // $certificate = new Certificate;
  //$certificate->course_id = $request->id;
 // $certificate->name = $request->name;
  /*
   $request->validate([
    'image' => 'required|image|dimensions:max_width=160,max_height=70',
]);
  
 */ 




$k=0;
 foreach ($request->file('image') as $file) {
     $originalName = $file->getClientOriginalName();
    
     $explodearry=explode(".",$originalName);
     $k++;
   //  echo $explodearry[0];
     
   
        $certificate = new Certificate;
        $certificate->course_id         = $request->id;
        $certificate->name              = $explodearry[0];
         $certificate->order_by              = $k;
        $certificate->image_alt         = $request->image_alt ?? '';
        $certificate->image_title       = $request->image_title ?? '';
        $certificate->image_description = $request->image_description ?? '';

        // Save image
        $filename = date('YmdHi') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $certificate->image = $filename;
         
        $certificate->save();
    }

  //$certificate->image_alt = $request->image_alt;
  //$certificate->image_title = $request->image_title;
 // $certificate->image_description = $request->image_description;

 /// $certificate->save();

  return redirect()->back()->with('success', 'Course Certificate has been Save successfully.'); 
  }


  public function course_certificate_edit($id, $course_id, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $course_id;

    $category = Course::where('id', $course_id)->first();
    $certificate = Certificate::where('id', $id)->first();
    return view('backend.courses.course_certificate_edit', compact("data", "category", "certificate"));
  }

  public function updateCertificate(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  
  $certificate = Certificate::find($request->id);
  $certificate->name = $request->name;
  
   $request->validate([
    'image' => 'required|image|dimensions:max_width=160,max_height=70',
]);
  

  if($request->file('image')){
    $file= $request->file('image');
    $filename= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('uploads'), $filename);
    $certificate->image = $filename;
  }

  $certificate->image_alt = $request->image_alt;
  $certificate->image_title = $request->image_title;
  $certificate->image_description = $request->image_description;

  $certificate->save();

  return redirect(url('admin/course-certificate/'.$request->id_hash))->with('success', 'Course Certificate has been Update successfully.'); 
  }

  public function delete_certificate($id, $image){

    $path = 'public/uploads/'.$image;
    if (file_exists($path)) {
      if (unlink($path)) {
          echo 'File deleted successfully.';
      } else {
          echo 'Unable to delete the file.';
      }
    } else {
      echo 'File does not exist.';
    }

    $certificate = Certificate::find($id);
    if ($certificate) {
      $certificate->delete();
    }



    return redirect()->back()->with('success', 'Course Certificate has been Delete successfully.'); 
  }

  // ==== Certificate #END ----


  // ==== Syllabus ----

  public function course_syllabus($id_hash, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $id_hash;
 
 $category=  DB::selectOne("SELECT * FROM `tbl_course` WHERE `id_hash` LIKE '%$id_hash%' ");
   // $category = Course::where('id_hash', $id_hash)->first();
    $syllabus = Syllabus::where('course_id', $category->id)->orderBy('id', 'DESC')->paginate(25);
    
       $data['course_id'] = $category->id;
       
    $syllabusParent = Syllabus::where('course_id', $category->id)->WHERE('parent', 0)->orderBy('name', 'ASC')->get();
    return view('backend.courses.course_syllabus', compact("data", "category", "syllabus", "syllabusParent"));
  }

 public function insertSyllabus(Request $request){
      
      
    $request->validate([
      'name' => 'required',
  ]);
  $orders_by_hm = null; // or 0 if not nullable
  $topicName=$request->post('name');
  $arrayData=explode("_",$topicName);
  $i=0;
       foreach($arrayData as $arrayDataValue){
         $i++;
     $topicInsert= DB::insert("
    INSERT INTO tbl_course_syllabus
    (course_id, name, parent, type, orders_by, orders_by_hm, created_at, updated_at)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
    [
       $request->id,
        $arrayDataValue,
        $request->parent,
        $request->type,
        $i,
        $orders_by_hm, // now null
        now(), // Laravel helper for current datetime
        now()
    ]
);


      }
  
 /* 
  $syllabus = new Syllabus;
  $syllabus->course_id = $request->id;
  $syllabus->name = $request->name;
  $syllabus->parent = $request->parent;
  $syllabus->type = $request->type;
  $syllabus->orders_by = $request->orders_by;
  $syllabus->orders_by_hm = $request->orders_by_hm;
  $syllabus->save();
  
  */
if($topicInsert){
  return redirect()->back()->with('success', 'Course Syllabus has been Save successfully.'); 
 }
  }



  public function course_syllabus_edit($id,$course_id, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $course_id;

    $category = Course::where('id', $course_id)->first();
    $syllabus = Syllabus::where('id', $id)->first();
    $syllabusParent = Syllabus::where('course_id', $category->id)->WHERE('parent', 0)->orderBy('name', 'ASC')->get();
    return view('backend.courses.course_syllabus_edit', compact("data", "category", "syllabus", "syllabusParent"));
  }

  public function updateSyllabus(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  
  $syllabus = Syllabus::find($request->id);
  $syllabus->name = $request->name;
  $syllabus->parent = $request->parent;
  $syllabus->type = $request->type;
  $syllabus->orders_by = $request->orders_by;
  $syllabus->orders_by_hm = $request->orders_by_hm;
  $syllabus->save();

  return redirect(url('admin/course-syllabus/'.$request->id_hash))->with('success', 'Course Syllabus has been Save successfully.'); 
  }

  public function delete_syllabus($id){

    $syllabusP = Syllabus::where('parent', $id)->get();
   
    if ($syllabusP) {
      foreach($syllabusP as $row){
        $syllabus = Syllabus::find($row->id);
        if ($syllabus) {
          $syllabus->delete();
        }
      } 
    }

    $syllabus = Syllabus::find($id);
    if ($syllabus) {
      $syllabus->delete();
    }

    



    return redirect()->back()->with('success', 'Course Syllabus has been Delete successfully.'); 
  }

  // ==== Syllabus #END ----


  // ==== Faq ----

  public function course_faq($id_hash, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $id_hash;

    //$category = Course::where('id_hash', $id_hash)->first();
     $category=  DB::selectOne("SELECT * FROM `tbl_course` WHERE `id_hash` LIKE '%$id_hash%' ");
    $faq = Faq::where('course_id', $category->id)->orderBy('id', 'DESC')->paginate(25);
    return view('backend.courses.course_faq', compact("data", "category", "faq"));
  }

  public function insertFaq(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  
  $faq = new Faq;
  $faq->course_id = $request->id;
  $faq->name = $request->name;
  $faq->description = $request->description;
  $faq->faq_for = $request->faq_for;

  if ($request->has('new_faq')) {
    $faq->new_faq = implode(',', $request->input('new_faq')); 
} else {
    $faq->new_faq = ''; 
} 

  $faq->save();

  return redirect()->back()->with('success', 'Course Faq has been Save successfully.'); 
  }


  public function course_faq_edit($id, $course_id, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $course_id;

    $category = Course::where('id', $course_id)->first();
    $faq = Faq::where('id', $id)->first();
    return view('backend.courses.course_faq_edit', compact("data", "category", "faq"));
  }

  public function updateFaqCourse(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  
  $faq = Faq::find($request->id);
  $faq->name = $request->name;
  $faq->description = $request->description;
  $faq->faq_for = $request->faq_for;

  if ($request->has('new_faq')) {
    $faq->new_faq = implode(',', $request->input('new_faq'));
}
  $faq->save();

  return redirect(url('admin/course-faq/'.$request->id_hash))->with('success', 'Course Faq has been Update successfully.'); 
  }

  public function delete_faq($id){


    $faq = Faq::find($id);
    if ($faq) {
      $faq->delete();
    }

    



    return redirect()->back()->with('success', 'Course Faq has been Delete successfully.'); 
  }

  // ==== Faq #END ----


  // ==== Certificate Training ----

  public function course_certificate_training($id_hash, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $id_hash;

    $category = Course::where('id_hash', $id_hash)->first();
    $certificate = CertificateTraining::where('course_id', $category->id)->orderBy('id', 'DESC')->paginate(25);
    return view('backend.courses.course_certificate_training', compact("data", "category", "certificate"));
  }

  public function insertCertificateTraining(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  
  $certificate = new CertificateTraining;
  $certificate->course_id = $request->id;
  $certificate->name = $request->name;
  $certificate->url_name = $request->url_name;
  $certificate->url_link = $request->url_link;
  $certificate->description = $request->description;

  if($request->file('image')){
    $file= $request->file('image');
    $filename= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('uploads'), $filename);
    $certificate->image = $filename;
  }

  $certificate->image_alt = $request->image_alt;
  $certificate->image_title = $request->image_title;
  $certificate->image_description = $request->image_description;

  $certificate->save();

  return redirect()->back()->with('success', 'Course Certificate has been Save successfully.'); 
  }


  public function course_certificate_training_edit($id, $course_id, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $course_id;

    $category = Course::where('id', $course_id)->first();
    $certificate = CertificateTraining::where('id', $id)->first();
    return view('backend.courses.course_certificate_training_edit', compact("data", "category", "certificate"));
  }

  public function updateCertificateTraining(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  
  $certificate = CertificateTraining::find($request->id);
  $certificate->name = $request->name;
  $certificate->url_name = $request->url_name;
  $certificate->url_link = $request->url_link;
  $certificate->description = $request->description;

  if($request->file('image')){
    $file= $request->file('image');
    $filename= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('uploads'), $filename);
    $certificate->image = $filename;
  }

  $certificate->image_alt = $request->image_alt;
  $certificate->image_title = $request->image_title;
  $certificate->image_description = $request->image_description;

  $certificate->save();

  return redirect(url('admin/course-certificate-training/'.$request->id_hash))->with('success', 'Course Certificate has been Update successfully.'); 
  }

  public function delete_certificate_training($id, $image){

    $path = 'public/uploads/'.$image;
    if (file_exists($path)) {
      if (unlink($path)) {
          echo 'File deleted successfully.';
      } else {
          echo 'Unable to delete the file.';
      }
    } else {
      echo 'File does not exist.';
    }

    $certificate = CertificateTraining::find($id);
    if ($certificate) {
      $certificate->delete();
    }



    return redirect()->back()->with('success', 'Course Certificate Training has been Delete successfully.'); 
  }

  // ==== Certificate Training #END ----


  // ==== Testimonials Training ----

  public function course_testimonial($id_hash, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $id_hash;
 $category=  DB::selectOne("SELECT * FROM `tbl_course` WHERE `id_hash` LIKE '%$id_hash%' ");
    //$category = Course::where('id_hash', $id_hash)->first();
    $certificate = Testimonial::where('course_id', $category->id)->orderBy('id', 'DESC')->paginate(25);
    return view('backend.courses.course_testimonial', compact("data", "category", "certificate"));
  }

  public function insertTestimonial(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  
  $certificate = new Testimonial;
  $certificate->course_id = $request->id;
  $certificate->name = $request->name;
  $certificate->heading = $request->heading;
  $certificate->video_link = $request->video_link;
  $certificate->description = $request->description;

  if($request->file('image')){
    $file= $request->file('image');
    $filename= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('uploads'), $filename);
    $certificate->image = $filename;
  }

  $certificate->image_alt = $request->image_alt;
  $certificate->image_title = $request->image_title;
  $certificate->image_description = $request->image_description;
 
  $certificate->save();

  return redirect()->back()->with('success', 'Course Testimonial has been Save successfully.'); 
  }


  public function course_testimonial_edit($id, $id_hash, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $id_hash;

    $category = Course::where('id', $id_hash)->first();
    $certificate = Testimonial::where('id', $id)->first();
    return view('backend.courses.course_testimonial_edit', compact("data", "category", "certificate"));
  }

  public function updateTestimonialCourse(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  
  $certificate = Testimonial::find($request->id);
  $certificate->name = $request->name;
  $certificate->heading = $request->heading;
  $certificate->video_link = $request->video_link;
  $certificate->description = $request->description;

  if($request->file('image')){
    $file= $request->file('image');
    $filename= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('uploads'), $filename);
    $certificate->image = $filename;
  }

  $certificate->image_alt = $request->image_alt;
  $certificate->image_title = $request->image_title;
  $certificate->image_description = $request->image_description;
 
  $certificate->save();

  return redirect(url('admin/course-testimonial/'.$request->id_hash))->with('success', 'Course Testimonial has been Save successfully.'); 
  }

  public function delete_testimonial($id){
/*
    $path = 'public/uploads/'.$image;
    if (file_exists($path)) {
      if (unlink($path)) {
          echo 'File deleted successfully.';
      } else {
          echo 'Unable to delete the file.';
      }
    } else {
      echo 'File does not exist.';
    }
*/
    $certificate = Testimonial::find($id);
    if ($certificate) {
      $certificate->delete();
    }



    return redirect()->back()->with('success', 'Course Certificate Training has been Delete successfully.'); 
  }


  // ==== Testimonials #END ----



  // ==== Project ----

  public function course_project($id_hash, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $id_hash;

   // $category = Course::where('id_hash', $id_hash)->first();
    $category=  DB::selectOne("SELECT * FROM `tbl_course` WHERE `id_hash` LIKE '%$id_hash%' ");
    $certificate = CourseProject::where('course_id', $category->id)->orderBy('id', 'DESC')->paginate(25);
    return view('backend.courses.course_project', compact("data", "category", "certificate"));
  }

  public function insertProject(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  
  $certificate = new CourseProject();
  $certificate->course_id = $request->id;
  $certificate->name = $request->name;
  $certificate->url_name = $request->url_name;
  $certificate->url_link = $request->url_link;
  $certificate->description = $request->description;

  if($request->file('image')){
    $file= $request->file('image');
    $filename= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('uploads'), $filename);
    $certificate->image = $filename;
  }

  $certificate->image_alt = $request->image_alt;
  $certificate->image_title = $request->image_title;
  $certificate->image_description = $request->image_description;

  $certificate->save();

  return redirect()->back()->with('success', 'Course Certificate has been Save successfully.'); 
  }


  public function course_project_edit($id, $course_id, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $course_id;

    $category = Course::where('id', $course_id)->first();
    $certificate = CourseProject::where('id', $id)->first();
    return view('backend.courses.course_project_edit', compact("data", "category", "certificate"));
  }

  public function updateProject(Request $request){
    $request->validate([
      'name' => 'required',
  ]);
  
  $certificate = CourseProject::find($request->id);
  $certificate->name = $request->name;
  $certificate->url_name = $request->url_name;
  $certificate->url_link = $request->url_link;
  $certificate->description = $request->description;

  if($request->file('image')){
    $file= $request->file('image');
    $filename= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('uploads'), $filename);
    $certificate->image = $filename;
  }

  $certificate->image_alt = $request->image_alt;
  $certificate->image_title = $request->image_title;
  $certificate->image_description = $request->image_description;

  $certificate->save();

  return redirect(url('admin/course-project/'.$request->id_hash))->with('success', 'Course Certificates has been Update successfully.'); 
  }

  public function delete_project($id, $image){

    $path = 'public/uploads/'.$image;
    if (file_exists($path)) {
      if (unlink($path)) {
          echo 'File deleted successfully.';
      } else {
          echo 'Unable to delete the file.';
      }
    } else {
      echo 'File does not exist.';
    }

    $certificate = CourseProject::find($id);
    if ($certificate) {
      $certificate->delete();
    }



    return redirect()->back()->with('success', 'Course Project has been Delete successfully.'); 
  }

  // ==== Project #END ----
  
  
  
              //=== Heading #START
              
            
              public function course_heading($id_hash, Request $request){
                $data['menu'] = "course";
                $data['sub_menu'] = "course";
                $data['id_hash'] = $id_hash;
            
            //    $category = Course::where('id_hash', $id_hash)->first();
                
             
 $category=  DB::selectOne("SELECT * FROM `tbl_course` WHERE `id_hash` LIKE '%$id_hash%' ");
                
                $certificate1 = CourseHeading::where('course_id', $category->id)->orderBy('id', 'DESC')->first();
                if($certificate1){
                    $certificate = $certificate1;
                } else{
                    $certificate = "";
                }
                return view('backend.courses.course_heading', compact("data", "category", "certificate"));
              }
              
 

            
              public function updateHeading(Request $request){
              
                $request->validate([
                    'heading1' => 'required',
                ]);

                $exist = CourseHeading::WHERE('id', $request->id)->first();
                if($exist){
                           $certificate = CourseHeading::find($request->id);
                           
                            $certificate->heading1 = $request->heading1;
                            $certificate->heading2 = $request->heading2;
                            $certificate->heading3 = $request->heading3;
                            $certificate->heading4 = $request->heading4;
                            $certificate->heading5 = $request->heading5;
                            $certificate->heading6 = $request->heading6;
                            $certificate->heading7 = $request->heading7;
                            $certificate->heading8 = $request->heading8;
                            $certificate->heading9 = $request->heading9;
                            $certificate->heading10 = $request->heading10;
                            $certificate->heading11 = $request->heading11;
                            $certificate->heading12 = $request->heading12;
                            $certificate->heading13 = $request->heading13;
                            $certificate->heading14 = $request->heading14;
                            $certificate->heading15 = $request->heading15;
                         if($request->file('pdf')){
                            $file= $request->file('pdf');
                            $filename= date('YmdHi').$file->getClientOriginalName();
                            $file-> move(public_path('uploads'), $filename);
                            $certificate->pdf = $filename;
                          }
                          $certificate->save();
                        } else{

                             $certificate = new CourseHeading();
                              $certificate->course_id = $request->course_id;
                            $certificate->heading1 = $request->heading1;
                            $certificate->heading2 = $request->heading2;
                            $certificate->heading3 = $request->heading3;
                            $certificate->heading4 = $request->heading4;
                            $certificate->heading5 = $request->heading5;
                            $certificate->heading6 = $request->heading6;
                            $certificate->heading7 = $request->heading7;
                            $certificate->heading8 = $request->heading8;
                            $certificate->heading9 = $request->heading9;
                            $certificate->heading10 = $request->heading10;
                            $certificate->heading11 = $request->heading11;
                            $certificate->heading12 = $request->heading12;
                            $certificate->heading13 = $request->heading13;
                            $certificate->heading14 = $request->heading14;
                            $certificate->heading15 = $request->heading15;
                            if($request->file('pdf')){
                            $file= $request->file('pdf');
                            $filename= date('YmdHi').$file->getClientOriginalName();
                            $file-> move(public_path('uploads'), $filename);
                            $certificate->pdf = $filename;
                          }
                
                  $certificate->save();
                }
              
              
                 
                
                  return redirect(url('admin/course-heading/'.md5($request->course_id)))->with('success', 'Course Certificates has been Update successfully.'); 
                  }
              
              
            
              // ==== Heading  #END ----
  


  // ==== SEO Training ----

  public function course_seo($id_hash, Request $request){
    $data['menu'] = "course";
    $data['sub_menu'] = "course";
    $data['id_hash'] = $id_hash;

   // $category = Course::where('id_hash', $id_hash)->first();
    $category=  DB::selectOne("SELECT * FROM `tbl_course` WHERE `id_hash` LIKE '%$id_hash%' ");
    $certificate = Testimonial::where('course_id', $category->id)->orderBy('id', 'DESC')->paginate(25);
    return view('backend.courses.course_seo', compact("data", "category", "certificate"));
  }

  public function updateSeo(Request $request){
    $request->validate([
        'meta_title' => 'required',
    ]);
  
    $category = new Course;
    $category = Course::find($request->id);
    $category->orders_by = $request->orders_by;
    $category->online_offline = $request->online_offline;
    $category->meta_title = $request->meta_title;
    $category->meta_keywords = $request->meta_keywords;
    $category->meta_description = $request->meta_description;

    $category->image_alt = $request->image_alt;
    $category->image_title = $request->image_title;
    $category->image_description = $request->image_description;
    $category->canonical = $request->canonical;
    $category->save();

    return redirect()->back()->with('success', 'Course SEO has been Save successfully.'); 
  }

  // ==== SEO #END ----


}
