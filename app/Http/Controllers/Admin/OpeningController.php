<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Opening;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
class OpeningController extends Controller{
  public function index(){}

  // === Category management --------
  public function view(Request $request){

    $data['menu'] = "opening";
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
        $page = Opening::where('name', 'like', '%'.$keyword.'%')
        ->WHERE('is_deleted', '0')
        ->latest()
        ->paginate($r_page);
        $page->appends(['keyword' => $keyword]);
        $page->appends(['r_page' => $r_page]);
    } else {
        $page = Opening::latest()->WHERE('is_deleted', '0')->paginate($r_page);
        $page->appends(['r_page' => $r_page]);
    }

    return view('backend.opening.all',compact('data', 'page'))->with('i', (request()->input('page', 1) - 1) * $r_page);
  }
  
  
  public function student_view(Request $request){
   
       $data['menu'] = "studentopening";
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
    



    $query = DB::table("tbl_student_career")
    ->where('is_deleted', '0');

if (!empty($keyword)) {
    $query->where('name', 'like', '%' . $keyword . '%');
}

$page = $query->latest()->paginate($r_page)
    ->appends([
        'keyword' => $keyword,
        'r_page'  => $r_page
    ]);

    return view('backend.opening.student-all',compact('data', 'page'))->with('i', (request()->input('page', 1) - 1) * $r_page);
  }

public function add_student(){
     $data['menu'] = "studentopening";
    $data['sub_menu'] = "";

    return view('backend.opening.add-student-opening', compact("data"));
    
}


  public function add(){
    $data['menu'] = "opening";
    $data['sub_menu'] = "";

    return view('backend.opening.add', compact("data"));
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

    $page = new Opening;
    $page->name = $request->name;
    $page->slug = $uniqSlug;
    $page->position = $request->position;
    $page->location = $request->location;
       $page->description = $request->content;
    $page->is_deleted = "0";
    $page->id_hash = "id_hash";
    $page->save();

    $insertedId = $page->id;

    $pageUpd = Opening::find($insertedId);
    $pageUpd->id_hash = md5($insertedId);
    $pageUpd->save();

    return redirect()->back()->with('success', 'Opening has been Save successfully.'); 
  }

public function saveStudentOpening(Request $request){
    $request->validate([
        'name' => 'required',
    ]);

if( !empty($request->slug)){
			$url_title = Str::slug($request->slug);
		} else{
			$url_title = Str::slug($request->name);
		}
		$uniqSlug = $this->check_unique('slug',$url_title);
    if( !empty($request->id)){
        
          DB::table('tbl_student_career')
        ->where('id', $request->id)
        ->update([
            'name'        => $request->name,
            'slug'        => $uniqSlug,
            'position'    => $request->position,
            'location'    => $request->location,
            'description' => $request->content,
            'updated_at'  => now()
        ]);
        
        
        
    }else{
    
		

  $insertedId = DB::table('tbl_student_career')->insertGetId([
    'name'        => $request->name,
    'slug'        => $uniqSlug,
    'position'    => $request->position,
    'location'    => $request->location,
    'description' => $request->content,
    'is_deleted'  => 0,
    'created_at'  => now(),
    'updated_at'  => now()
]);

DB::table('tbl_student_career')
    ->where('id', $insertedId)
    ->update([
        'id_hash' => md5($insertedId),
        'updated_at' => now()
    ]);
    } 
    
    
    
    

    return redirect()->back()->with('success', 'Opening has been Save successfully.'); 
  }



 public function delete_student_opening($id){
    $pageUpd = DB::table('tbl_student_career')->where('id', $id)->delete();
   
    return redirect()->back()->with('success', 'Opening has been Deleted successfully.');
  }



  public function check_unique($key, $value){
    $check = Opening::WHERE($key, $value)
            ->first();
    if( !empty($check->id) ){
        $value1 = $value . "1";
        return $this->check_unique($key, $value1);
    } else {
        return $value; 
    }
  }

  public function edit($id_hash){
      $data['menu'] = "opening";
      $data['sub_menu'] = "";

      $page = Opening::where('id_hash', $id_hash)->first();
      return view('backend.opening.edit', compact("data", "page"));
  }
public function edit_student_opening($id_hash){
      $data['menu'] = "studentopening";
      $data['sub_menu'] = "";

      $page = DB::table("tbl_student_career")->where('id', $id_hash)->first();
      return view('backend.opening.add-student-opening', compact("data", "page"));
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
///$content=$request->content;
    $page = new Opening;
    $page = Opening::find($request->id);
    $page->name = $request->name;
    $page->position = $request->position;
    $page->slug = $uniqSlug;
    $page->location = $request->location;
       $page->description = $request->content;
    $page->save();

    return redirect()->back()->with('success', 'Opening has been Updated successfully.');
  }

  public function check_unique1($key, $value, $id){
    $check = Opening::WHERE($key, $value)
            ->where('id', '!=' , $id)->first();
    if( !empty($check->id) ){
        $value1 = $value . "1";
        return $this->check_unique1($key, $value1, $id);
    } else {
        return $value; 
    }
  }

  public function delete($id){
    $pageUpd = Opening::find($id);
    $pageUpd->is_deleted = 1;
    $pageUpd->save();
    return redirect()->back()->with('success', 'Opening has been Deleted successfully.');
  }
  
}
