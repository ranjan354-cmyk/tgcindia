<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Services\BlogGeneratorService;
use DB;

class BlogController extends Controller{
  public function index(){
    $this->blogs();
  }
  
  

  // === Blog management --------
  public function blogs(Request $request){

    $data['menu'] = "blog";
    $data['sub_menu'] = "blog";

    $keyword = $request['keyword'];
    $category = $request['parent'];
    
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
          $categories = Blog::where('name', 'like', '%'.$keyword.'%')
          ->WHERE('is_deleted', '0')
          ->WHERE('parent', $category)
          
          ->paginate($r_page);
          $categories->appends(['keyword' => $keyword]);
          $categories->appends(['r_page' => $r_page]);
          $categories->appends(['category' => $category]);
      } else {
          $categories = Blog::WHERE('is_deleted', '0')
                        
                        ->WHERE('parent', $category)
                        ->paginate($r_page);
          $categories->appends(['r_page' => $r_page]);
          $categories->appends(['category' => $category]);
      }
    }  else {
     if (!empty($keyword)) {
    $categories = Blog::where(function($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
                  ->orWhere('add_date', 'like', '%' . $keyword . '%');
        })
        ->where('is_deleted', '0')  // Correct chaining of conditions
        
        ->paginate($r_page);
    
    // Append all parameters at once
    $categories->appends([
        'keyword' => $keyword,
        'r_page' => $r_page,
        'category' => $category
    ]);
}
 else {
          $categories = Blog::WHERE('is_deleted', '0')
                      
                        ->paginate($r_page);
          $categories->appends(['r_page' => $r_page]);
          $categories->appends(['category' => $category]);
      }
    }
    
    
    $promptaidata=DB::table("tbl_prompt")->first();
     $categories1 = BlogCategory::latest()->WHERE('is_deleted', '0')->WHERE('staus', 'Active')->paginate(1000);

    return view('backend.blogs.view',compact('data', 'categories','categories1','promptaidata'))->with('i', (request()->input('page', 1) - 1) * $r_page);
    
  }

public function UpdateOpenAPI(Request $request){
    
   $Tone=$request->Tone;
    $Prompt=$request->Prompt;
     $Length=$request->Length;
         
   
   $updateSql = DB::update(
    "UPDATE tbl_prompt SET tone = ?, Prompt = ?, Length = ? WHERE id = ?",
    [$Tone, $Prompt, $Length, 1]
);
if($updateSql){
    echo '<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong>You have successfully submitted.
</div>';
}else{
    echo "Something went wrong";
}
    
}


 public function generate(Request $request, 
    BlogGeneratorService $blogService)
{
    
   
    $request->validate([
        'topic' => 'required|string|max:255',
    ]);
   
    $blogData = $blogService->generate($request->topic);
    
    
    if (!empty($blogData['content'])) {
        $blogData['content'] = preg_replace([
            '/<\s*html[^>]*>/i',
            '/<\s*\/\s*html>/i',
            '/<\s*head[^>]*>.*?<\s*\/\s*head>/is', // remove head section completely
            '/<\s*body[^>]*>/i',
            '/<\s*\/\s*body>/i'
        ], '', $blogData['content']);

        $blogData['content'] = trim($blogData['content']);
    }

    
    $seoTitle = $blogData['title'] ?? $request->topic;
    
    $blogData['content'] = preg_replace('/```[a-z]*\s*/i', '', $blogData['content']);
  $blogData['content'] = str_replace('```', '', $blogData['content']);
   $blogData['content'] = trim($blogData['content']);
     $seoDescription = Str::limit(strip_tags($blogData['content'] ?? ''), 160);
    

   if (!empty($blogData['content_html'])) {
    $dom = new \DOMDocument();
    libxml_use_internal_errors(true);

    $dom->loadHTML($blogData['content_html']); // safe now
    libxml_clear_errors();

    $head = $dom->getElementsByTagName('head')->item(0);
    if ($head) {
        // Title
        $titleTag = $head->getElementsByTagName('title')->item(0);
        if ($titleTag) {
            $seoTitle = $titleTag->textContent;
        }

        // Meta description
        $metaTags = $head->getElementsByTagName('meta');
        foreach ($metaTags as $meta) {
            if (strtolower($meta->getAttribute('name')) === 'description') {
                $seoDescription = $meta->getAttribute('content');
                break;
            }
        }
    }
}

    
    $uniqSlug = $this->check_unique_name('name', $request->topic, $request->parent);
    if (!$uniqSlug) {
        return redirect()->back()->with('error', 'Blog Name Already Available. Cannot Add Blog!');
    }

    $url_title = Str::slug($seoTitle);
    $uniqSlug = $this->check_unique('slug', $url_title);

    
    $blog = new Blog();
    $blog->name = $seoTitle;
    $blog->parent = $request->parent ?? null;
    $blog->staus = "Active";
    $blog->add_date = $request->add_date ?? now();
    $blog->added_by = "TGC Jaipur";
    $blog->content = $blogData['content'] ?? $request->content;
    $blog->tags = $request->tags ?? null;
    $blog->short_content = $request->short_content ?? null;
    $blog->view = $request->view ?? 0;
    $blog->slug = $uniqSlug;
    $blog->is_deleted = 0;

    
    if ($request->file('image')) {
        $file = $request->file('image');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);
        $blog->image = $filename;
    } elseif (!empty($blogData['featured_image'])) {
        $blog->image = $blogData['featured_image'];
    }

 
  
  
    $blog->meta_title = $request->meta_title ?? $seoTitle;
    $blog->meta_keywords = $request->meta_keywords ?? null;
    $blog->meta_description = $request->meta_description ?? $seoDescription;

    $blog->image_alt = $request->image_alt ?? $seoTitle;
    $blog->image_title = $request->image_title ?? $seoTitle;
    $blog->image_description = $request->image_description ?? null;
    $blog->canonical = $request->canonical ?? null;

    $blog->save();

    
    $blog->id_hash = md5($blog->id);
    $blog->save();

    return redirect()->back()->with('success', 'Blog has been saved successfully!');
}






  public function add_blog(){
    $data['menu'] = "blog";
    $data['sub_menu'] = "blog";

    $categories = BlogCategory::latest()->WHERE('is_deleted', '0')->WHERE('staus', 'Active')->paginate(1000);
    

    return view('backend.blogs.add', compact("data", "categories"));
  }

  
  
  
  public function saveBlog(Request $request){
    $request->validate([
        'name' => 'required',
    ]);

    // Check If Already Name Exists ---
    $uniqSlug = $this->check_unique_name('name',$request->name, $request->parent);
    if($uniqSlug == false){
      return redirect()->back()->with('error', 'Blog Name Already Available. So can not Add Blog!!!'); 
      die();
    }

    // Slug Name--
    if( !empty($request->slug)){
			$url_title = Str::slug($request->slug);
		} else{
			$url_title = Str::slug($request->name);
		}
		$uniqSlug = $this->check_unique('slug',$url_title);

    $category = new Blog;
    $category->name = $request->name;
    $category->parent = $request->parent;
    $category->staus = $request->status;
    $category->add_date = $request->add_date;
    $category->added_by = $request->added_by;
    $category->content = $request->content;
    $category->tags = $request->tags;
    $category->short_content = $request->short_content;
    $category->view = $request->view;
    $category->slug = $uniqSlug;
    $category->is_deleted = "0";
    if($request->file('image')){
      $file= $request->file('image');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      $category->image = $filename;
    }

    $category->meta_title = $request->meta_title;
    $category->meta_keywords = $request->meta_keywords;
    $category->meta_description = $request->meta_description;

    $category->image_alt = $request->image_alt;
    $category->image_title = $request->image_title;
    $category->image_description = $request->image_description;
    $category->canonical = $request->canonical;

    $category->save();

    $insertedId = $category->id;

    $catUpd = Blog::find($insertedId);
    $catUpd->id_hash = md5($insertedId);
    $catUpd->save();

 $link = url('/blog-details/'.$uniqSlug.' ');

return redirect()->back()->with(
    'success',
    'Blog has been saved successfully. <a href="'.$link.'" target="_blank">View page</a>'
);

      
  }

  public function check_unique($key, $value){
      $check = Blog::WHERE($key, $value)
              ->first();
      if( !empty($check->id) ){
          $value1 = $value . "1";
          return $this->check_unique($key, $value1);
      } else {
          return $value; 
      }
  }

  public function check_unique_name($key, $value, $parent){
    $check = Blog::WHERE($key, $value)
            ->WHERE('parent', $parent)->first();
    if( !empty($check->id) ){
        return false;
    } else {
        return true; 
    }
  }

  public function editBlog($id_hash){
      $data['menu'] = "blog";
      $data['sub_menu'] = "blog";

      $category = Blog::where('id_hash', $id_hash)->first();
      $categories = BlogCategory::latest()->WHERE('is_deleted', '0')->WHERE('staus', 'Active')->paginate(1000);
      return view('backend.blogs.edit', compact("data", "category", "categories"));
  }

  public function updateBlog(Request $request){
    $request->validate([
        'name' => 'required',
    ]);

    // Check If Already Name Exists ---
    $uniqSlug = $this->check_unique_name1('name',$request->name, $request->parent,$request->id);
    if($uniqSlug == false){
      return redirect()->back()->with('error', 'Blog Name Already Available. So can not Add Blog!!!'); 
      die();
    }
    
    // Slug Name--
    if( !empty($request->slug)){
			$url_title = Str::slug($request->slug);
		} else{
			$url_title = Str::slug($request->name);
		}
    $uniqSlug = $this->check_unique1('slug',$url_title,$request->id);

    $category = new Blog;
    $category = Blog::find($request->id);
    $category->name = $request->name;
    $category->parent = $request->parent;
    $category->staus = $request->status;
    $category->add_date = $request->add_date;
    $category->content = $request->content;
    $category->added_by = $request->added_by;
    $category->tags = $request->tags;
    $category->short_content = $request->short_content;
     $category->view = $request->view;
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

    $category->meta_title = $request->meta_title;
    $category->meta_keywords = $request->meta_keywords;
    $category->meta_description = $request->meta_description;

    $category->image_alt = $request->image_alt;
    $category->image_title = $request->image_title;
    $category->image_description = $request->image_description;
    $category->canonical = $request->canonical;
    
    $category->save();

   
    
    
    $link = url('/blog-details/'.$uniqSlug.' ');

return redirect()->back()->with(
    'success',
    'Blog has been Updated successfully. <a href="'.$link.'" target="_blank">View page</a>'
);
    
    
  }

  public function check_unique1($key, $value, $id){
    $check = Blog::WHERE($key, $value)
            ->where('id', '!=' , $id)->first();
    if( !empty($check->id) ){
        $value1 = $value . "1";
        return $this->check_unique1($key, $value1, $id);
    } else {
        return $value; 
    }
  }
  public function check_unique_name1($key, $value, $parent, $id){
    $check = Blog::WHERE($key, $value)
            ->where('id', '!=' , $id)
            ->WHERE('parent', $parent)->first();
    if( !empty($check->id) ){
        return false;
    } else {
        return true; 
    }
  }

  public function deleteBlog($id){
    $catUpd = Blog::find($id);
    $catUpd->is_deleted = 1;
    $catUpd->save();
    return redirect()->back()->with('success', 'Blog has been Deleted successfully.');
  }

  public function del_blog(Request $request){

    $data['menu'] = "blog";
    $data['sub_menu'] = "del_blog";

    $keyword = $request['keyword'];
    $data['keyword'] = $keyword;
    $r_page = $request['r_page'];
    if(!empty($r_page)){
      $data['r_page'] = $r_page;
    } else {
      $r_page = 25;
      $data['r_page'] = 25;
    }

    if(!empty($keyword)){
        $categories = Blog::where('name', 'like', '%'.$keyword.'%')
        ->WHERE('is_deleted', '1')
        ->latest()
        ->paginate($r_page);
        $categories->appends(['keyword' => $keyword]);
        $categories->appends(['r_page' => $r_page]);
    } else {
        $categories = Blog::latest()->WHERE('is_deleted', '1')->paginate($r_page);
        $categories->appends(['r_page' => $r_page]);
    }

    return view('backend.blogs.del',compact('data', 'categories'))->with('i', (request()->input('page', 1) - 1) * $r_page);
  }

  public function restoreBlog($id){
    $catUpd = Blog::find($id);
    $catUpd->is_deleted = 0;
    $catUpd->save();
    return redirect()->back()->with('success', 'Blog has been Restore successfully.');
  }



  public function blogPoular(Request $request){
    $id = $request->get('id');
    $popular = $request->get('popular');


    $catUpd = Blog::find($id);
    $catUpd->popular = $popular;
    $catUpd->save();
    return redirect()->back()->with('success', 'Blog has been Updated Successfully.');


  }
}


