<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\General;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\Feedback;
use App\Mail\ClientFeedback;

class SettingsController extends Controller{
  public function index(){
    $this->setting();
  }

  // === setting management --------
  public function setting(Request $request){
    $data['menu'] = "settings";
    $data['sub_menu'] = "setting";

    $setting = Settings::WHERE('id', '1')->first();
    return view('backend.setting.view',compact('data', 'setting'));
  }

  
  public function update(Request $request){
    $setting = new Settings;
    $setting = Settings::find($request->id);
    $setting->setting1 = $request->setting1;
    $setting->setting3 = $request->setting3;
    $setting->setting5 = $request->setting5;
    $setting->setting7 = $request->setting7;
    $setting->setting9 = $request->setting9;
    $setting->setting11 = $request->setting11;
    

    if($request->file('setting2')){
      $file= $request->file('setting2');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $setting->setting2 = $filename;
      } else {
        $setting->setting2 = $request->setting2_old;
      }
    }
    if($request->file('setting4')){
      $file= $request->file('setting4');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $setting->setting4 = $filename;
      } else {
        $setting->setting4 = $request->setting4_old;
      }
    }
    if($request->file('setting6')){
      $file= $request->file('setting6');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $setting->setting6 = $filename;
      } else {
        $setting->setting6 = $request->setting6_old;
      }
    }
    if($request->file('setting8')){
      $file= $request->file('setting8');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $setting->setting8 = $filename;
      } else {
        $setting->setting8 = $request->setting8_old;
      }
    }
    if($request->file('setting10')){
      $file= $request->file('setting10');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $setting->setting10 = $filename;
      } else {
        $setting->setting10 = $request->setting10_old;
      }
    }
    if($request->file('setting12')){
      $file= $request->file('setting12');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $setting->setting12 = $filename;
      } else {
        $setting->setting12 = $request->setting12_old;
      }
    }
    if($request->file('setting28')){
      $file= $request->file('setting28');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $setting->setting28 = $filename;
      } else {
        $setting->setting28 = $request->setting28_old;
      }
    }
    if($request->file('setting33')){
      $file= $request->file('setting33');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $setting->setting33 = $filename;
      } else {
        $setting->setting33 = $request->setting33_old;
      }
    }
    if($request->file('setting38')){
      $file= $request->file('setting38');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $setting->setting38 = $filename;
      } else {
        $setting->setting38 = $request->setting38_old;
      }
    }
    if($request->file('setting43')){
      $file= $request->file('setting43');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $setting->setting43 = $filename;
      } else {
        $setting->setting43 = $request->setting43_old;
      }
    }
    if($request->file('setting46')){
      $file= $request->file('setting46');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $setting->setting46 = $filename;
      } else {
        $setting->setting46 = $request->setting46_old;
      }
    }
    if($request->file('setting49')){
      $file= $request->file('setting49');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $setting->setting49 = $filename;
      } else {
        $setting->setting49 = $request->setting49_old;
      }
    }
    if($request->file('setting51')){
      $file= $request->file('setting51');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $setting->setting51 = $filename;
      } else {
        $setting->setting51 = $request->setting51_old;
      }
    }
    if($request->file('setting53')){
      $file= $request->file('setting53');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $setting->setting53 = $filename;
      } else {
        $setting->setting53 = $request->setting53_old;
      }
    }
    if($request->file('setting55')){
      $file= $request->file('setting55');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $setting->setting55 = $filename;
      } else {
        $setting->setting55 = $request->setting55_old;
      }
    }
    
    $setting->save();

    return redirect()->back()->with('success', 'Settings has been Updated successfully.');
  }


public function general_setting(Request $request){
    //print_r($_POST);
     $setting = DB::table('tbl_theme_settings')->first();
    return view('backend.setting.general_theme',compact('setting'));
}
public function footer_setting(Request $request){
    
     $setting = DB::table('tbl_theme_settings')->first();
   
    return view('backend.setting.general_footer_setting',compact('setting'));
}


public function typography_setting(Request $request){
    
     $setting = DB::table('tbl_theme_settings')->first();
     $fontfamily = DB::table('tbl_font_family')->get();
        $fontweight = DB::table('tbl_font_weight')->orderBy('font_weight_value', 'ASC')->get();
    return view('backend.setting.typography_setting',compact('setting','fontfamily','fontweight'));
}


 public function managetheme(Request $request){
    $data['menu'] = "managetheme";
    $data['sub_menu'] = "managetheme";
$font_family = DB::table('tbl_font_family')->get();
    $setting = DB::table('tbl_theme_settings')->first();
    return view('backend.setting.theme',compact('data', 'setting','font_family'));
  }
  
  public function updateFontFamily(Request $request){
   //   print_r($_POST);
   
   $sqlUpdate=DB::table('tbl_font_family')->where('id', $request->id)->update(['font_name'=>$request->value]);
   
       if($sqlUpdate){
        echo '<div class="alert alert-success">
  <strong>Success!</strong> You have successfully updated.
</div>';
    }else{
        echo "Something went wrong!";
    }
  }
  
  public function removeFontFamily(Request $request){
     // print_r($_POST);
     
     $reomeSql=DB::table("tbl_font_family")->where('id', $request->id)->delete();
     if($reomeSql){
         echo '<div class="alert alert-success">
  <strong>Success!</strong> You have successfully removed.
</div>';
     }
      
  }
  
  public function saveFontFamily(Request $request){
    //  print_r($_POST);
    $sqlinsert=DB::table("tbl_font_family")->insert(['font_name'=>$request->font_family]);
    if($sqlinsert){
        echo '<div class="alert alert-success">
  <strong>Success!</strong> You have successfully added.
</div>';
    }else{
        echo "Something went wrong!";
    }
    
  }
  
  public function header_setting(Request $request){
      $data['menu'] = "managetheme";
    $data['sub_menu'] = "managetheme";

    $setting = DB::table('tbl_theme_settings')->first();
    return view('backend.setting.header_setting',compact('data', 'setting'));
  }
  
  public function icons_setting(Request $request){
      $data['menu'] = "managetheme";
    $data['sub_menu'] = "managetheme";

    $setting = DB::table('tbl_theme_settings')->first();
    return view('backend.setting.icons_setting',compact('data', 'setting'));
  }
  
  

public function themeSave(Request $request){
    
   // print_r($_POST);
   // die;
 
   $setting = DB::table('tbl_theme_settings')->first();

  $sql= DB::table('tbl_theme_settings')
    ->where('id', 1)
    ->update([
        'theme_bg'        => $request->theme_bg ?? $setting->theme_bg,
        'theme_foter_bg'        => $request->theme_foter_bg ??  $setting->theme_foter_bg,
         'theme_font'        => $request->theme_font ??  $setting->theme_font,
          'theme_topbar'        => $request->theme_topbar ??  $setting->theme_topbar,
            'theme_header'        => $request->theme_header ??  $setting->theme_header,
             'theme_icon'        => $request->theme_icon ??  $setting->theme_icon,
              'status'        => $request->status ??  $setting->status,
              'theme_font_weight'=>$request->theme_font_weight ??  $setting->theme_font_weight,
              
              'heading_font_family'=>$request->heading_font_family ??  $setting->heading_font_family,
              'heading_font_size'=>$request->heading_font_size ??  $setting->heading_font_size,
              'heading_font_space'=>$request->heading_font_space ??  $setting->heading_font_space,
              'heading_font_weight'=>$request->heading_font_weight ??  $setting->heading_font_weight,
              'sub_heading_font'=>$request->sub_heading_font ??  $setting->sub_heading_font,
              'sub_heading_font_weight'=>$request->sub_heading_font_weight ??  $setting->sub_heading_font_weight,
              'sub_heading_font_size'=>$request->sub_heading_font_size ??  $setting->sub_heading_font_size,
              'sub_heading_font_space'=>$request->sub_heading_font_space ??  $setting->sub_heading_font_space,
              'pragaraph_font_size'=>$request->pragaraph_font_size ??  $setting->pragaraph_font_size,
               'paragraph_space'=>$request->paragraph_space ??  $setting->paragraph_space,
    ]);
    
    
    
    
   if($sql){
     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Theme settings updated successfully!
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>' ;
  }
    
}
  





  
public function downloadcsv(Request $request)
{
    $folderPath = public_path('exports');


    if (!File::exists($folderPath)) {
        File::makeDirectory($folderPath, 0755, true);
    }


   $from_date = $request->from_date;
   $to_date = $request->to_date;
    $fileName = 'enquiry_form_' . date('Y-m-d_H-i-s') . '.csv';
    $filePath = $folderPath . '/' . $fileName;

    $file = fopen($filePath, 'w');

 
    fputcsv($file, [
        'ID',
        'First Name',
        'Last Name',
        'Name',
        'Email',
        'Phone',
        'Number',
        'Course Name',
        'Technology',
        'Course Interest',
        'Training',
        'Location',
        'City',
        'State',
        'Country',
        'Zipcode',
        'Education',
        'College Name',
        'Company Name',
        'Position',
        'Key Skill',
        'Time Availability',
        'DOB',
        'DOJ',
        'Start Date',
        'Form Type',
        'Subject',
        'Message',
        'Page URL',
        'Created At'
    ]);

   
    DB::table('enquiry_form')
        ->whereNull('is_deleted') 
        ->whereBetween('created_at', [$from_date, $to_date])
         ->orderBy('id', 'desc')
        ->chunk(1000, function ($rows) use ($file) {

            foreach ($rows as $row) {
                fputcsv($file, [
                    $row->id ?? '',
                    $row->fname ?? '',
                    $row->lname ?? '',
                    $row->name ?? '',
                    $row->email ?? '',
                    $row->phone ?? '',
                    $row->number ?? '',
                    $row->course_name ?? '',
                    $row->technology ?? '',
                    $row->course_interest ?? '',
                    $row->training ?? '',
                    $row->location ?? '',
                    $row->city ?? '',
                    $row->state ?? '',
                    $row->country ?? '',
                    $row->zipcode ?? '',
                    $row->education ?? '',
                    $row->college_name ?? '',
                    $row->company_name ?? '',
                    $row->position ?? '',
                    $row->keyskill ?? '',
                    $row->time_availability ?? '',
                    $row->dob ?? '',
                    $row->doj ?? '',
                    $row->start_date ?? '',
                    $row->form_type ?? '',
                    $row->subject ?? '',
                    $row->message ?? '',
                    $row->page_url ?? '',
                    $row->created_at ?? ''
                ]);
            }
        });

    fclose($file);
  try {

    $fileUrl = "https://www.tgcindia.com/public/exports/" . $fileName;

    $details = [
        'url' => $fileUrl,
    ];

    Mail::to([
         'ravindrafeednow@gmail.com',
        'ranjan354@gmail.com',
    ])->send(new Feedback($details));

    //dd('Mail Sent');
    return redirect()->back()->with('success', 'CSV Generated Successfully and sent to mail.');

} catch (\Exception $e) {

    dd($e->getMessage());

}


    
}




  // === General management --------
  public function general(Request $request){
    $data['menu'] = "settings";
    $data['sub_menu'] = "setting_gen";

    $setting = General::WHERE('id', '1')->first();
    return view('backend.setting.general',compact('data', 'setting'));
  }

  
  public function general_update(Request $request){
    $setting = new General;
    $setting = General::find($request->id);
    $setting->setting1 = $request->setting1;
    $setting->setting2 = $request->setting2;
    $setting->setting3 = $request->setting3;
    $setting->setting4 = $request->setting4;
    $setting->setting5 = $request->setting5;
    $setting->setting6 = $request->setting6;
    $setting->setting7 = $request->setting7;
    $setting->setting8 = $request->setting8;
    $setting->setting9 = $request->setting9;
    $setting->setting10 = $request->setting10;
    
    if($request->file('setting11')){
      $file= $request->file('setting11');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $setting->setting11 = $filename;
      } else {
        $setting->setting11 = $request->setting11_old;
      }
    }
    
    $setting->save();

    return redirect()->back()->with('success', 'General Settings has been Updated successfully.');
  }

  
}
