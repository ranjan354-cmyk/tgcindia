<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brochure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
class BrochureController extends Controller{
  public function index(){}

  // === Category management --------
  public function view(Request $request){

    $data['menu'] = "brochure";
    $data['sub_menu'] = "";

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
        $page = Brochure::where('name', 'like', '%'.$keyword.'%')
        ->WHERE('is_deleted', '0')
        ->latest()
        ->paginate($r_page);
        $page->appends(['keyword' => $keyword]);
        $page->appends(['r_page' => $r_page]);
    } else {
        $page = Brochure::latest()->WHERE('is_deleted', '0')->paginate($r_page);
        $page->appends(['r_page' => $r_page]);
    }

$course=DB::table('tbl_course')->where('staus', 'Active')->where('is_deleted', 0)->get();
foreach($course as $courseValue){
    $arraycourse[$courseValue->id]=$courseValue->name;
}

$courseCate=DB::table('tbl_course_category')->where('staus', 'Active')->where('is_deleted', 0)->get();
foreach($courseCate as $courseCatevalue){
    $arraycat[$courseCatevalue->id]=$courseCatevalue->name;
}

    return view('backend.brochure.all',compact('data', 'page','arraycat','arraycourse'))->with('i', (request()->input('page', 1) - 1) * $r_page);
  }

  public function add(){
    $data['menu'] = "brochure";
    $data['sub_menu'] = "";

$course=DB::table('tbl_course')->where('staus', 'Active')->where('is_deleted', 0)->get();

$courseCate=DB::table('tbl_course_category')->where('staus', 'Active')->where('is_deleted', 0)->get();
    return view('backend.brochure.add', compact("data","course","courseCate"));
  }

  public function save(Request $request){
    $request->validate([
        'name' => 'required',
    ]);

    // Slug Name--
    if( !empty($request->slug)){
			$url_title = Str::slug($request->slug);
		} else{
			$url_title = Str::slug($request->name);
		}
		$uniqSlug = $this->check_unique('slug',$url_title);

    $page = new Brochure;
    $page->name = $request->name;
    $page->slug = $uniqSlug;
    $page->content = $request->content;
    $page->brochure_cat = $request->catid;
      $page->course_id = $request->brochure_cat;
    if($request->file('image')){
      $file= $request->file('image');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      $page->image = $filename;
    }
    if($request->file('pdf')){
      $file= $request->file('pdf');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      $page->pdf = $filename;
    }
    $page->is_deleted = "0";
    $page->id_hash = "id_hash";

    $page->image_alt = $request->image_alt;
    $page->image_title = $request->image_title;
    $page->image_description = $request->image_description;

    $page->image_alt1 = $request->image_alt1;
    $page->image_title1 = $request->image_title1;
    $page->image_description1 = $request->image_description1;


    $page->save();

    $insertedId = $page->id;

    $pageUpd = Brochure::find($insertedId);
    $pageUpd->id_hash = md5($insertedId);
    $pageUpd->save();

    return redirect()->back()->with('success', 'Brochure has been Save successfully.'); 
  }
  public function removebatch(Request $request){
      $course_id=$request->post('course_id');
      $sql=DB::table('tbl_course_batches')->where('course_id',$course_id)->delete();
       if($sql){
     return back()->with('success','You have successfully removed all batches');    
    }
      
  }
  
  public function updateBulkBrochure(Request $request){
     /// print_r($_POST);
     
   $sqlCourseBrochure = DB::table('tbl_course')->where('pdf_curriculum', '!=', '')->get();
   foreach($sqlCourseBrochure as $sqlCourseBrochureValue){
       
       $name=$sqlCourseBrochureValue->name;
          $slug=$sqlCourseBrochureValue->slug;
             
              $image=$sqlCourseBrochureValue->course_thumbnail;
               $pdf_curriculum=$sqlCourseBrochureValue->pdf_curriculum;
               $id_hash=$sqlCourseBrochureValue->id_hash;
                 $parent=$sqlCourseBrochureValue->parent;
               $id=$sqlCourseBrochureValue->id;
          $checkSql = DB::table('tbl_brochure')->where('course_id', $id)->first();

if (!$checkSql) {
    $sql = DB::table('tbl_brochure')->insert([
        'name'         => $name,
        'slug'         => $slug,
        'image'        => $image,
        'pdf'          => $pdf_curriculum,
        'id_hash'      => $id_hash,
        'is_deleted'   => 0,
        'created_at'   => now(),
        'updated_at'   => now(),
        'brochure_cat' => $parent,
        'course_id'    => $id
    ]);

    
}


   }
if ($sql) {
        return back()->with('success', 'You have successfully assigned brochure');
    }
      
  }
  
  
  public function resetBatch(Request $request){
    $course_id=$request->post('course_id');
    $course_period=$request->post('course_period');
    $course_periodArray=explode(" ",$course_period);
    $duration=$course_periodArray[0];
    $settrack=$request->post('settrack');
    //batch_type
      $sqlBatch=DB::table('tbl_course_batches_new')->get();
      
     // $checkSql=DB::table('tbl_course_batches')->where('course_id',$course_id)->get()->count();
      $checkSql = DB::table('tbl_course_batches')
              ->where('course_id', $course_id)
              ->count();
if($checkSql>0){
    
    return back()->with('success','You have already filled');
}else{
    $course_perioddata=0;
    foreach($sqlBatch as $sqlBatchvalue){
       $name= $sqlBatchvalue->name;
       $type= $sqlBatchvalue->type;
       $batch_type= $sqlBatchvalue->batch_type;
       $start_date= $sqlBatchvalue->start_date;
       $batch_fee= $sqlBatchvalue->batch_fee;
       $fast_filling= $sqlBatchvalue->fast_filling;
       $created_at= $sqlBatchvalue->created_at;
       $updated_at= $sqlBatchvalue->updated_at;
     //  $name= $sqlBatchvalue->name;
     //$crdate=date('Y-m-d h:i:s');
   
           $course_perioddata=$duration." ".$course_periodArray[1];
           
           if($batch_type=='Weekend'){
              $batchname=   "Sat-Sun (".$course_perioddata.")";
           }else{
               
              $batchname=   "Mon-Fri (".$course_perioddata.")";  
           }
         
     if($settrack!=''){
         
         $fastValue=1;
     }else{
         $fastValue=null;
     }
     
     ///$batchname=  "Mon-Fri (6 Months)";
     
  $insertSql=    DB::table('tbl_course_batches')->insert([
    'course_id' => $request->course_id,
    'name' => $batchname,
    'type' => $course_perioddata,
    'batch_type' => $sqlBatchvalue->batch_type,
    'start_date' => $sqlBatchvalue->start_date,
    'batch_fee' => $sqlBatchvalue->batch_fee ?: null,
    
    'fast_filling' => $sqlBatchvalue->fast_filling,
    'batch_duration' =>$fastValue
]);

    }
    if($insertSql){
     return back()->with('success','You have successfully filled');    
    }
}
      
  }
  
  public function viewLocation(Request $request){
       $data['menu'] = "Location";
       $data['sub_menu'] = "";
       $data['location']=DB::table('tbl_location')->get();
      // $data['city']=DB::table('tbl_location')->get();
      
      $sqlcity=DB::table('tbl_city')->get();
      foreach($sqlcity as $cityValue){
         $citydata[$cityValue->id] = $cityValue->city;
      }
      
 $courseNotInCity=DB::select("SELECT course_id FROM `tbl_check_city`");
      foreach($courseNotInCity as $cityValue){
          $cityArray[]=$cityValue->course_id;
          
      }
      
      
$sqlCourse = DB::table('tbl_course')
    ->where('staus', 'Active')
    ->where('is_deleted', '0')
    ->whereNotIn('id', $cityArray)
    ->get();
/// $sqlCourse= DB::table('tbl_course')->where('is_deleted', '0')->where('staus', 'Active')->where('course_type', 'trending')->get();
      foreach($sqlCourse as $courseValue){
         $coursedata[$courseValue->id] = $courseValue->name;
      }
      $getData=[];
    return view('backend.brochure.locationall',compact('data','citydata','coursedata','getData'));
      
  }

public function savelocation(Request $request){
  //  print_r($_POST);
  $course=$request->post('course');
  @$id=$request->post('id');
  $city=$request->post('city');
    $crdate=date('Y-m-d h:i:s');
  if($city!=''){
 // $cityname=DB::table
  
  $slug=$request->post('slug');

  if(@$id!=''){
       $sql= DB::insert("UPDATE tbl_location SET course_id='$course',city_id='$city',slug='$slug' WHERE id='$id' ");

  }else{
      $newslug='';
      
      foreach($city as $cityValue){  
           foreach($course as $courseValue){  
          $arrarCoursesdata[$cityValue][]=$courseValue;
           }
      }
    //  echo "<pre>";
    //  print_r($arrarCourses);
     //  echo "</pre>";
     // die;
    foreach($arrarCoursesdata as $key=> $arrarCourses){  
       // print_r($cityValue);
       // die;
        foreach($arrarCourses as $cityValue){
        $cityNameSql=DB::table('tbl_city')->where('id' , $key)->first();
      $cityname = isset($cityNameSql->city) ? strtolower($cityNameSql->city) : null;
////Online course in prefix
     $getCourseName=DB::table('tbl_course')->where('id' , $cityValue)->first();

$slugNewUpdate= strtolower($getCourseName->name);

//$slug = strtolower($input);

// Step 2: Replace slashes and dots with space
$slugNewUpdate = str_replace(['/', '.'], ' ', $slugNewUpdate);

// Step 3: Replace multiple spaces with single space
$slugNewUpdate = preg_replace('/\s+/', ' ', $slugNewUpdate);

// Step 4: Trim and replace spaces with dashes
$slugNewUpdate = str_replace(' ', '-', trim($slugNewUpdate));
       $newslug=$slugNewUpdate."-".$cityname;
        //  echo "INSERT INTO tbl_location(course_id,city_id,slug,updated_at,created_at)VALUES('$cityValue','$key','$newslug','$crdate','$crdate')";
        
      //  die;
        
 $sql= DB::insert("INSERT INTO tbl_location(course_id,city_id,slug,updated_at,created_at)VALUES('$cityValue','$key','$newslug','$crdate','$crdate')");
}
    }  
    
  }
if($sql){
    return back()->with('success','You have successfully submitted');
}
  }else{
      foreach($course as $courseValue){
           $getCourseName=DB::table('tbl_course')->where('id' , $courseValue)->first();

$slugNewUpdate= strtolower($getCourseName->name);
       //   $slugNewUpdate= strtolower($courseValue);

//$slug = strtolower($input);

// Step 2: Replace slashes and dots with space
$slugNewUpdate = str_replace(['/', '.'], ' ', $slugNewUpdate);

// Step 3: Replace multiple spaces with single space
$slugNewUpdate = preg_replace('/\s+/', ' ', $slugNewUpdate);

// Step 4: Trim and replace spaces with dashes
$slugNewUpdate = str_replace(' ', '-', trim($slugNewUpdate));
   $slugline="online-course-in-".$slugNewUpdate;   
   
   
    $sql= DB::insert("INSERT INTO tbl_location(course_id,slug,updated_at,created_at)VALUES('$courseValue','$slugline','$crdate','$crdate')");




      }
      
      if($sql){
    return back()->with('success','You have successfully submitted');
}
      
  } 
    
}

public function removeLocation(Request $request,$id){
  
  $sql=  DB::table('tbl_location')->where('id',$id)->delete();
if($sql){
    return back()->with('success','You have successfully removed');
}
  
    
}

public function editLocation(Request $request,$id){
    $getData=DB::table('tbl_location')->where('id',$id)->first();
    //return view('backend.brochure.locationall',compact('getData'));
    
      $data['menu'] = "Location";
       $data['sub_menu'] = "";
       $data['location']=DB::table('tbl_location')->get();
      // $data['city']=DB::table('tbl_location')->get();
      
      $sqlcity=DB::table('tbl_city')->get();
      foreach($sqlcity as $cityValue){
         $citydata[$cityValue->id] = $cityValue->city;
      }
      

 $sqlCourse=DB::table('tbl_course')->get();
      foreach($sqlCourse as $courseValue){
         $coursedata[$courseValue->id] = $courseValue->name;
      }
      
    return view('backend.brochure.locationall',compact('data','citydata','coursedata','getData'));
    
}

  public function check_unique($key, $value){
    $check = Brochure::WHERE($key, $value)
            ->first();
    if( !empty($check->id) ){
        $value1 = $value . "1";
        return $this->check_unique($key, $value1);
    } else {
        return $value; 
    }
  }

  public function edit($id_hash){
      $data['menu'] = "brochure";
      $data['sub_menu'] = "";

      $page = Brochure::where('id_hash', $id_hash)->first();
      $courseCate=DB::table('tbl_course_category')->where('staus', 'Active')->where('is_deleted', 0)->get();
      $course=DB::table('tbl_course')->where('staus', 'Active')->where('is_deleted', 0)->get();
      
      return view('backend.brochure.edit', compact("data", "page","course","courseCate"));
  }

  public function update(Request $request){
    $request->validate([
        'name' => 'required',
    ]);

    // Slug Name--
    if( !empty($request->slug)){
			$url_title = Str::slug($request->slug);
		} else{
			$url_title = Str::slug($request->name);
		}
    $uniqSlug = $this->check_unique1('slug',$url_title,$request->id);

    $page = new Brochure;
    $page = Brochure::find($request->id);
    $page->name = $request->name;
    $page->slug = $uniqSlug;
    $page->content = $request->content;
     $page->brochure_cat = $request->catid;
      $page->course_id = $request->brochure_cat;
    if($request->file('image')){
      $file= $request->file('image');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      $page->image = $filename;
    }
    if($request->file('pdf')){
      $file= $request->file('pdf');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      $page->pdf = $filename;
    }

    $page->image_alt = $request->image_alt;
    $page->image_title = $request->image_title;
    $page->image_description = $request->image_description;

    $page->image_alt1 = $request->image_alt1;
    $page->image_title1 = $request->image_title1;
    $page->image_description1 = $request->image_description1;
    
    $page->save();

    return redirect()->back()->with('success', 'Brochure has been Updated successfully.');
  }

  public function check_unique1($key, $value, $id){
    $check = Brochure::WHERE($key, $value)
            ->where('id', '!=' , $id)->first();
    if( !empty($check->id) ){
        $value1 = $value . "1";
        return $this->check_unique1($key, $value1, $id);
    } else {
        return $value; 
    }
  }

  public function delete($id){
    $pageUpd = Brochure::find($id);
    $pageUpd->is_deleted = 1;
    $pageUpd->save();
    return redirect()->back()->with('success', 'Brochure has been Deleted successfully.');
  }
  
}
