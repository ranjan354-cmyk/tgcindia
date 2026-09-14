<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventsController extends Controller{
  public function index(){}

  // === Category management --------
  public function view(Request $request){

    $data['menu'] = "events";
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
        $page = Events::where('name', 'like', '%'.$keyword.'%')
        ->WHERE('is_deleted', '0')
        ->latest()
        ->paginate($r_page);
        $page->appends(['keyword' => $keyword]);
        $page->appends(['r_page' => $r_page]);
    } else {
        $page = Events::latest()->WHERE('is_deleted', '0')->paginate($r_page);
        $page->appends(['r_page' => $r_page]);
    }

    return view('backend.events.all',compact('data', 'page'))->with('i', (request()->input('page', 1) - 1) * $r_page);
  }

  public function add(){
    $data['menu'] = "events";
    $data['sub_menu'] = "";

    return view('backend.events.add', compact("data"));
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

    $page = new Events;
    $page->name = $request->name;
    $page->slug = $uniqSlug;
    $page->event_date = $request->event_date;
    $page->event_time = $request->event_time;
    $page->conduct_by = $request->conduct_by;
     $page->description = $request->content;
    $page->is_deleted = "0";
    $page->id_hash = "id_hash";
    
        
  
    
    
    $page->save();

    $insertedId = $page->id;

    $pageUpd = Events::find($insertedId);
    $pageUpd->id_hash = md5($insertedId);
    $pageUpd->save();

    return redirect()->back()->with('success', 'Events has been Save successfully.'); 
  }

  public function check_unique($key, $value){
    $check = Events::WHERE($key, $value)
            ->first();
    if( !empty($check->id) ){
        $value1 = $value . "1";
        return $this->check_unique($key, $value1);
    } else {
        return $value; 
    }
  }

  public function edit($id_hash){
      $data['menu'] = "events";
      $data['sub_menu'] = "";

      $page = Events::where('id_hash', $id_hash)->first();
      return view('backend.events.edit', compact("data", "page"));
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

    $page = new Events;
    $page = Events::find($request->id);
    $page->name = $request->name;
    $page->slug = $uniqSlug;
    $page->event_date = $request->event_date;
    $page->event_time = $request->event_time;
     $page->description = $request->content;
    $page->conduct_by = $request->conduct_by;
 
    
        
      if($request->file('thumbnail')){
      $file= $request->file('thumbnail');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $page->thumbnail = $filename;
      } else {
        $page->thumbnail = $request->old_thumbnail;
      }
      
    }
    $page->save();

    return redirect()->back()->with('success', 'Events has been Updated successfully.');
  }

  public function check_unique1($key, $value, $id){
    $check = Events::WHERE($key, $value)
            ->where('id', '!=' , $id)->first();
    if( !empty($check->id) ){
        $value1 = $value . "1";
        return $this->check_unique1($key, $value1, $id);
    } else {
        return $value; 
    }
  }

  public function delete($id){
    $pageUpd = Events::find($id);
    $pageUpd->is_deleted = 1;
    $pageUpd->save();
    return redirect()->back()->with('success', 'Events has been Deleted successfully.');
  }
  
}
