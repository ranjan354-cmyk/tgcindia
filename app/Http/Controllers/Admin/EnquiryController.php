<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Enquiry;
use App\Models\Course;

use Illuminate\Support\Str;
use DB;
class EnquiryController extends Controller{



  public function view(Request $request)
  {
      $data['menu'] = "enquiry";
      $data['sub_menu'] = "";
  
      $keyword = $request->input('keyword');
      $data['keyword'] = $keyword;
  
      $r_page = $request->input('r_page', 25);
      $data['r_page'] = $r_page;
  
      $form_type = $request->input('form_type');
      $data['form_type'] = $form_type;

  
   $from_date = $request->input('from_date');
      $data['from_date'] = $from_date;
      
       $to_date = $request->input('to_date');
      $data['to_date'] = $to_date;
  
    //  $query = Enquiry::query();
  $query = Enquiry::query()->orderBy('id', 'desc');
      // Apply form_type filter if it is not empty
      if (!empty($form_type)) {
          $query->where('form_type', $form_type);
      }
  
      // Apply keyword filter
      if (!empty($keyword)) {
          $query->where('name', 'like', '%' . $keyword . '%');
      }
  
    if (!empty($from_date) && !empty($to_date)) {
    $query->whereBetween('updated_at', [
        $from_date . ' 00:00:00',
        $to_date . ' 23:59:59'
    ]);
}
  
  
      // Fetch records with pagination
      $page = $query->latest()->paginate($r_page);
      $page->appends(['keyword' => $keyword, 'r_page' => $r_page, 'form_type' => $form_type]);
  
      return view('backend.enquiry.all', compact('data', 'page', 'form_type'))->with('i', (request()->input('page', 1) - 1) * $r_page);
  }
  
 public function DownloadCurriculum(Request $request){
     
     //  $sqlallCourse=DB::table('tbl_course')->where('staus',1)->where('is_deleted',0)->get();
 
  $sqlallCourse = Course::WHERE('staus', 'Active')->WHERE('is_deleted', '0')->get();
 
  $data['menu'] = "DownloadCurriculum";
      $data['sub_menu'] = "";
  
 


     return view('backend.enquiry.curriculum',compact('sqlallCourse','data'));
     
 }

  
 
  
  
}
