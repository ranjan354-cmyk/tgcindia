<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseCategoryController extends Controller{
  public function index(){
    $this->category();
  }

  // === Category management --------
  public function category(Request $request){

    $data['menu'] = "course";
    $data['sub_menu'] = "category";

    $keyword = $request['keyword'];
    $data['keyword'] = $keyword;
    $r_page = $request['r_page'];
    if(!empty($r_page)){
      $data['r_page'] = $r_page;
    } else {
      $r_page = 25;
      $data['r_page'] = 25;
    }

   if (!empty($keyword)) {
    $categories = CourseCategory::where(function($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
                  ->orWhere('created_at', 'like', '%' . $keyword . '%');
        })
        ->where('is_deleted', '0')
        ->orderBy('orders_by', 'ASC')
        ->paginate($r_page);
    
    // Append both keyword and r_page at once
    $categories->appends([
        'keyword' => $keyword,
        'r_page' => $r_page
    ]);
}
else {
        $categories = CourseCategory::WHERE('is_deleted', '0')->orderBy('orders_by', 'ASC')->paginate($r_page);
        $categories->appends(['r_page' => $r_page]);
    }

    return view('backend.course.category',compact('data', 'categories'))->with('i', (request()->input('page', 1) - 1) * $r_page);
  }

  public function add_category_course(){
    $data['menu'] = "course";
    $data['sub_menu'] = "category";

    $categories = CourseCategory::latest()->WHERE('is_deleted', '0')->WHERE('staus', 'Active')->paginate(1000);

    return view('backend.course.add_category', compact("data", "categories"));
  }

  public function saveCategory(Request $request){
    $request->validate([
        'name' => 'required',
    ]);

    // Check If Already Name Exists ---
    $uniqSlug = $this->check_unique_name('name',$request->name, $request->parent);
    if($uniqSlug == false){
      return redirect()->back()->with('error', 'Category Name Already Available. So can not Add Category!!!'); 
      die();
    }

    // Slug Name--
    if( !empty($request->slug)){
			$url_title = Str::slug($request->slug);
		} else{
			$url_title = Str::slug($request->name);
		}
		$uniqSlug = $this->check_unique('slug',$url_title);

    $category = new CourseCategory;
    $category->name = $request->name;
    $category->parent = $request->parent;
    $category->staus = $request->status;
    $category->icon = $request->icon;
    $category->slug = $uniqSlug;
    $category->is_deleted = "0";
    if($request->file('image')){
      $file= $request->file('image');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      $category->image = $filename;
    }
    
     if($request->file('blog_image')){
      $file= $request->file('blog_image');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      $category->blog_image = $filename;
    }
     if($request->file('masterimage')){
      $file= $request->file('masterimage');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      $category->masterimage = $filename;
    }

    $category->orders_by = $request->orders_by;
    $category->title = $request->title;
     $category->blog_name = $request->blog_name;
      $category->blog_course = $request->blog_course;
       $category->blog_hour = $request->blog_hour;
        $category->blog_learners = $request->blog_learners;
        $category->blog_link = $request->blog_link;
    $category->meta_title = $request->meta_title;
    $category->meta_keywords = $request->meta_keywords;
    $category->meta_description = $request->meta_description;

    $category->image_alt = $request->image_alt;
    $category->image_title = $request->image_title;
    $category->image_description = $request->image_description;
    $category->canonical = $request->canonical;
    $category->mastercontent = $request->mastercontent;
    $category->mastertitle = $request->mastertitle;

    $category->save();

    $insertedId = $category->id;

    $catUpd = CourseCategory::find($insertedId);
    $catUpd->id_hash = md5($insertedId);
    $catUpd->save();

    return redirect()->back()->with('success', 'Category has been Save successfully.'); 
  }

  public function check_unique($key, $value){
      $check = CourseCategory::WHERE($key, $value)
              ->first();
      if( !empty($check->id) ){
          $value1 = $value . "1";
          return $this->check_unique($key, $value1);
      } else {
          return $value; 
      }
  }

  public function check_unique_name($key, $value, $parent){
    $check = CourseCategory::WHERE($key, $value)
            ->WHERE('parent', $parent)->first();
    if( !empty($check->id) ){
        return false;
    } else {
        return true; 
    }
  }

  public function editCategory($id_hash){
      $data['menu'] = "course";
      $data['sub_menu'] = "category";

      $category = CourseCategory::where('id_hash', $id_hash)->first();
      $categories = CourseCategory::latest()->WHERE('is_deleted', '0')->WHERE('staus', 'Active')->paginate(1000);
      return view('backend.course.edit_category', compact("data", "category", "categories"));
  }

  public function updateCategory(Request $request){
    $request->validate([
        'name' => 'required',
    ]);

    // Check If Already Name Exists ---
    $uniqSlug = $this->check_unique_name1('name',$request->name, $request->parent,$request->id);
    if($uniqSlug == false){
      return redirect()->back()->with('error', 'Category Name Already Available. So can not Add Category!!!'); 
      die();
    }
    
    // Slug Name--
    if( !empty($request->slug)){
			$url_title = Str::slug($request->slug);
		} else{
			$url_title = Str::slug($request->name);
		}
    $uniqSlug = $this->check_unique1('slug',$url_title,$request->id);

    $category = new CourseCategory;
    $category = CourseCategory::find($request->id);
    $category->name = $request->name;
    $category->parent = $request->parent;
    $category->staus = $request->status;
    $category->icon = $request->icon;
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
    
     if($request->file('blog_image')){
      $file= $request->file('blog_image');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $category->blog_image = $filename;
      } else {
        $category->blog_image = $request->old_blog_image;
      }
      
    }
     if($request->file('masterimage')){
      $file= $request->file('masterimage');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $category->masterimage = $filename;
      } else {
        $category->masterimage = $request->old_masterimage;
      }
      
    }

    $category->orders_by = $request->orders_by;
    
      $category->title = $request->title;
     $category->blog_name = $request->blog_name;
      $category->blog_course = $request->blog_course;
       $category->blog_hour = $request->blog_hour;
        $category->blog_learners = $request->blog_learners;
        $category->blog_link = $request->blog_link;
    $category->meta_title = $request->meta_title;
    $category->meta_keywords = $request->meta_keywords;
    $category->meta_description = $request->meta_description;

    $category->image_alt = $request->image_alt;
    $category->image_title = $request->image_title;
    $category->image_description = $request->image_description;
    $category->canonical = $request->canonical;
       $category->mastercontent = $request->mastercontent;
    $category->mastertitle = $request->mastertitle;
    
    $category->save();

    return redirect()->back()->with('success', 'Category has been Updated successfully.');
  }

  public function check_unique1($key, $value, $id){
    $check = CourseCategory::WHERE($key, $value)
            ->where('id', '!=' , $id)->first();
    if( !empty($check->id) ){
        $value1 = $value . "1";
        return $this->check_unique1($key, $value1, $id);
    } else {
        return $value; 
    }
  }
  public function check_unique_name1($key, $value, $parent, $id){
    $check = CourseCategory::WHERE($key, $value)
            ->where('id', '!=' , $id)
            ->WHERE('parent', $parent)->first();
    if( !empty($check->id) ){
        return false;
    } else {
        return true; 
    }
  }

  public function deleteCategory($id){
    $catUpd = CourseCategory::find($id);
    $catUpd->is_deleted = 1;
    $catUpd->save();
    return redirect()->back()->with('success', 'Category has been Deleted successfully.');
  }

  public function del_category(Request $request){

    $data['menu'] = "course";
    $data['sub_menu'] = "del_course_category";

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
        $categories = CourseCategory::where('name', 'like', '%'.$keyword.'%')
        ->WHERE('is_deleted', '1')
        ->latest()
        ->paginate($r_page);
        $categories->appends(['keyword' => $keyword]);
        $categories->appends(['r_page' => $r_page]);
    } else {
        $categories = CourseCategory::latest()->WHERE('is_deleted', '1')->paginate($r_page);
        $categories->appends(['r_page' => $r_page]);
    }

    return view('backend.course.category_del',compact('data', 'categories'))->with('i', (request()->input('page', 1) - 1) * $r_page);
  }

  public function restoreCategory($id){
    $catUpd = CourseCategory::find($id);
    $catUpd->is_deleted = 0;
    $catUpd->save();
    return redirect()->back()->with('success', 'Category has been Restore successfully.');
  }


  // ==== Up Down
  public function category_up($count, $id){
    $category = new CourseCategory;
    $category = CourseCategory::find($id);
    $category->orders_by = $count;
    $category->save();

    return redirect()->back()->with('success', 'Category Order has been Updated successfully.');
  }

}
