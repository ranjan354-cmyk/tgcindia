<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Course\Batch;
use App\Models\Course\Certificate;
use App\Models\Course\CourseProject;
use App\Models\Course\Enroll;
use App\Models\Course\Faq;
use App\Models\Course\Solution;
use App\Models\Course\Syllabus;
use App\Models\Course\Testimonial;
use App\Models\Course\Training;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class CoursesController extends Controller{
    private function mappedRedirect(Request $request)
    {
        $redirect = DB::table('tbl_redirect_url')
            ->where('redirect_from', $request->fullUrl())
            ->first();

        return $redirect
            ? redirect()->to($redirect->redirect_to, 301)
            : null;
    }

    public function courses(Request $request){

      $keywords = $request->get('keywords');
      $data['keywords'] = $request->get('keywords');

      $data['menu'] = "";
      $data['sub_menu'] = "";
      $data['cat_show'] = 1;

      $data['meta_title'] = "Courses | TGC India";
      $data['meta_keywords'] = "";
      $data['meta_description'] = "";

      $data['slider'] = Slider::all()->WHERE('is_deleted', '0');
      $category = CourseCategory::WHERE('staus', 'Active')
                  ->WHERE('is_deleted', '0')
                  ->orderBy('orders_by', 'ASC')
                  ->get();
      
      $data['courseCount'] = Course::WHERE('staus', 'Active')
                            ->WHERE('is_deleted', '0');
      if(!empty($keywords)){
        $data['courseCount'] = $data['courseCount']->where('name', 'like',  '%'.$keywords.'%');
      }
      $data['courseCount'] = $data['courseCount']->count();
                            
                          
                            
      $data['course'] = Course::WHERE('staus', 'Active')
                ->WHERE('is_deleted', '0')->whereNull('excluded_by')->orderBy('orders_by', 'ASC');
      if(!empty($keywords)){
        $data['course'] = $data['course']->where('name', 'like',  '%'.$keywords.'%');
      }
      $data['course'] = $data['course']->paginate(30);
      $data['course']->appends(['keywords' => $keywords]);

      return view('frontend.course.courses',compact('data', 'category'));
    }
    
    
    
    
    
    
public function searchCourses(Request $request) {
    $keywords = $request->get('keywords');
    
    $courses = Course::where('staus', 'Active')
                ->where('is_deleted', '0');
    
    if (!empty($keywords)) {
        $courses = $courses->where('name', 'like', '%'.$keywords.'%');
    }

    // Limit results to 5
    $courses = $courses->take(10)->get();

    return response()->json(['courses' => $courses]);
}


    
    public function ExcludedCourses(){
        
         $courseNotInCity=DB::select("SELECT course_id FROM `tbl_check_city`");
      foreach($courseNotInCity as $cityValue){
          $cityArray[]=$cityValue->course_id;
          
      }
      
      return $cityArray;
    }
    
    
  
    

   public function category(Request $request, $slug = null)
    {
      if ($redirect = $this->mappedRedirect($request)) {
          return $redirect;
      }

    //   dd($request);
      $type = $request->get('type');

      $data['menu'] = "";
      $data['sub_menu'] = "";
      $data['cat_show'] = 1;

      $data['slug'] = $slug;
      $data['type'] = $type;

      $categoryList = CourseCategory::WHERE('staus', 'Active')
                  ->WHERE('is_deleted', '0')
                  ->orderBy('orders_by', 'ASC')
                  ->get();

     
      $category = CourseCategory::WHERE('slug', $slug)->first();

      if($category){

        $data['meta_title'] = $category->meta_title;
        $data['meta_keywords'] = $category->meta_keywords;
        $data['meta_description'] = $category->meta_description;

        $data['course'] = Course::WHERE('is_deleted', '0')
                  ->where('parent', $category->id)
                   ->whereNull('excluded_by')
                  ->where('staus', 'Active')
                    ->orderBy('category_order', 'ASC');
        if(!empty($type)){
          $data['course'] = $data['course']->where('course_based', $type);
        }
        $data['course'] = $data['course']->paginate(30);
        $data['course']->appends(['type' => $type]);

        $data['courseCount'] = Course::WHERE('is_deleted', '0')
                  //->where('parent', $category->id)
                  ->where('staus', 'Active');
        if(!empty($type)){
          //$data['courseCount'] = $data['courseCount']->where('course_based', $type);
        }
        $data['courseCount'] = $data['courseCount']->count();
        $data['courseCount'] = ($data['courseCount'] + 100);

        return view('frontend.course.category',compact('data', 'category', 'categoryList'));
      }  else {
        $data['meta_title'] = "Page Not Found | TGC India";
        $data['meta_keywords'] = "Page Not Found";
        $data['meta_description'] = "Page Not Found";
        
       // $blog = Course::where('tbl_blog', $slug)->first();
         $blog=DB::table('tbl_blog')->where('slug', $slug)->first();
if ($blog) {
    return redirect('/blog-details/' . $blog->slug);
} else {
    
  $url = url()->full();

$redirect = DB::table('tbl_redirect_url')
    ->where('redirect_from', $url)
    ->first();

if ($redirect) {
    return redirect($redirect->redirect_to); // 302 default
} else {
    return redirect('/');
}
    
    
}

       // return view('frontend.page_not_found',compact('data'));
      }

    }

    public function course_details($slug = null)
    {
        if ($redirect = $this->mappedRedirect(request())) {
            return $redirect;
        }

        if (!$slug) {
            return redirect('/');
        }

        $cacheKey = 'course-page:v1:' . sha1($slug);
        $payload = Cache::remember($cacheKey, now()->addHour(), function () use ($slug) {
            $courses = Course::where('slug', $slug)->first();

            if (!$courses) {
                return null;
            }

            $data = [
                'menu' => '',
                'sub_menu' => '',
                'cat_show' => 0,
                'meta_title' => $courses->meta_title,
                'meta_keywords' => $courses->meta_keywords,
                'meta_description' => $courses->meta_description,
                'canonical' => $courses->canonical,
                'cat_name' => CourseCategory::where('id', $courses->parent)->first(),
                'course_batch' => Batch::where('course_id', $courses->id)->orderBy('start_date', 'ASC')->get(),
                'course_enroll' => Enroll::where('course_id', $courses->id)->orderBy('id', 'DESC')->get(),
                'course_training' => Training::where('course_id', $courses->id)->orderBy('id', 'DESC')->get(),
                'course_solution' => Solution::where('course_id', $courses->id)->orderBy('order_by', 'ASC')->get(),
                'course_certificate' => Certificate::where('course_id', $courses->id)->orderBy('order_by', 'ASC')->get(),
                'course_syllabus' => Syllabus::where('course_id', $courses->id)->where('parent', 0)->orderBy('orders_by', 'asc')->get(),
                'course_faq' => Faq::where('course_id', $courses->id)->whereRaw("FIND_IN_SET('description', new_faq) > 0")->orderBy('id', 'DESC')->get(),
                'course_faq1' => Faq::where('course_id', $courses->id)->whereRaw("FIND_IN_SET('Certification', new_faq) > 0")->orderBy('id', 'DESC')->get(),
                'course_faq2' => Faq::where('course_id', $courses->id)->whereRaw("FIND_IN_SET('CertificationFAQs', new_faq) > 0")->orderBy('id', 'DESC')->get(),
                'course_testimonials' => Testimonial::where('course_id', $courses->id)->orderBy('id', 'DESC')->get(),
                'course_testimonials2' => DB::table('tbl_reviews')->where('course_category', $courses->parent)->where('is_deleted', 0)->orderBy('id', 'DESC')->limit(4)->get(),
                'recent_blogs' => Blog::where('staus', 'Active')->where('is_deleted', '0')->orderBy('id', 'DESC')->limit(10)->get(),
                'course_project' => CourseProject::where('course_id', $courses->id)->get(),
                'category_course' => Course::where('staus', 'Active')->where('is_deleted', '0')->where('parent', $courses->parent)->whereNull('excluded_by')->orderBy('id', 'DESC')->limit(10)->get(),
                'recent_course' => Course::where('staus', 'Active')->where('is_deleted', '0')->whereNull('excluded_by')->orderBy('id', 'DESC')->limit(10)->get(),
                'trending-course' => Course::where('staus', 'Active')->where('is_deleted', '0')->whereNull('excluded_by')->where('course_category', 'trending')->orderBy('id', 'DESC')->limit(24)->get(),
            ];

            $data1 = [
                'course_project1' => CourseProject::where('course_id', $courses->id)->first(),
            ];

            $certificate = DB::table('tbl_course_heading')->where('course_id', $courses->id)->first();

            return compact('courses', 'data', 'data1', 'certificate');
        });

        if (!$payload) {
            $redirect = DB::table('tbl_redirect_url')->where('redirect_from', url()->full())->first();
            return $redirect ? redirect($redirect->redirect_to) : redirect('/');
        }

        $courses = $payload['courses'];
        $data = $payload['data'];
        $data1 = $payload['data1'];
        $certificate = $payload['certificate'];
        $titleName = ucwords(str_replace('-', ' ', $slug));

        $redirecturl = DB::table('tbl_redirect_url')->where('redirect_from', url()->full())->first();
        if ($redirecturl) {
            return redirect($redirecturl->redirect_to);
        }

        return view('frontend.course.course_details', compact('data', 'data1', 'courses', 'certificate', 'titleName'));
    }

  public function blog_details(Request $request, $slug = null)
    {
        if ($redirect = $this->mappedRedirect($request)) {
            return $redirect;
        }

        if($slug){
     
      $data['menu'] = "";
      $data['sub_menu'] = "";
      $data['cat_show'] = 0;

      

      $blog = Blog::WHERE('slug', $slug)->first();
      if($blog){
      $data['blog_category'] = BlogCategory::WHERE('staus', 'Active')->WHERE('is_deleted', '0')->get();
      
      $data['trending_course'] = Course::WHERE('staus', 'Active')->WHERE('is_deleted', '0')->limit(10)->get();
      

      $data['meta_title'] = $blog->meta_title;
      $data['meta_keywords'] = $blog->meta_keywords;
      $data['meta_description'] = $blog->meta_description;

      $data['recent_blogs'] = Blog::where('staus', 'Active')->WHERE('is_deleted', '0')->limit(10)->orderBy('id', 'DESC')->get();

      return view('frontend.blog_details',compact('data', 'blog'));
      }
        }else{
          return redirect()->back();   
        }
    }

public function blog_category(Request $request, $slug = null) {
      $data['menu'] = "";
      $data['sub_menu'] = "";
      $data['cat_show'] = 0;
if($slug){
      $data['popular_blogs'] = Blog::where('staus', 'Active')->WHERE('is_deleted', '0')->WHERE('popular', 1)->orderBy('id', 'DESC')->paginate(48);
      $data['popular_blogs_count'] = Blog::where('staus', 'Active')->WHERE('is_deleted', '0')->WHERE('popular', 1)->orderBy('id', 'DESC')->count();

      $blogCategory = BlogCategory::WHERE('slug', $slug)->first();
      if($blogCategory){
      $blogs = Blog::WHERE('staus', 'Active')->WHERE('is_deleted', '0')->WHERE('parent', $blogCategory->id)->paginate(30);
      $data['trending_course'] = Course::WHERE('staus', 'Active')->WHERE('is_deleted', '0')->get();

      $data['meta_title'] = $blogCategory->meta_title;
      $data['meta_keywords'] = $blogCategory->meta_keywords;
      $data['meta_description'] = $blogCategory->meta_description;

      $data['recent_blogs'] = Blog::where('staus', 'Active')->WHERE('is_deleted', '0')->orderBy('id', 'DESC')->get();

      return view('frontend.pages.blog_category',compact('data', 'blogCategory', 'blogs'));
}


}else{
    return redirect()->back();
}
      
    }


    public function certification_courses(){

      $data['menu'] = "";
      $data['sub_menu'] = "";
      $data['cat_show'] = 1;

      $data['meta_title'] = "Courses | TGC India";
      $data['meta_keywords'] = "";
      $data['meta_description'] = "";

      $data['slider'] = Slider::all()->WHERE('is_deleted', '0');
      $category = CourseCategory::WHERE('staus', 'Active')
                  ->WHERE('is_deleted', '0')
                  ->orderBy('orders_by', 'ASC')
                  ->get();
      $data['courseCount'] = Course::WHERE('staus', 'Active')
                              ->WHERE('is_deleted', '0')
                              ->WHERE('course_based', 'Certification Course')
                              ->count();
      $data['course'] = Course::WHERE('staus', 'Active')
                        ->WHERE('is_deleted', '0')
                        ->WHERE('course_based', 'Certification Course')
                        ->paginate(20);

      return view('frontend.course.certification_courses',compact('data', 'category'));
    }


    public function role_based_course_combos(){

      $data['menu'] = "";
      $data['sub_menu'] = "";
      $data['cat_show'] = 1;

      $data['meta_title'] = "Courses | TGC India";
      $data['meta_keywords'] = "";
      $data['meta_description'] = "";

      $data['slider'] = Slider::all()->WHERE('is_deleted', '0');
      $category = CourseCategory::WHERE('staus', 'Active')
                                ->WHERE('is_deleted', '0')
                                ->orderBy('orders_by', 'ASC')
                                ->get();
      
      $data['courseCount'] = Course::WHERE('staus', 'Active')
                              ->WHERE('is_deleted', '0')
                              ->WHERE('course_based', 'Role Based Course')
                              ->count();
      $data['course'] = Course::WHERE('staus', 'Active')
                        ->WHERE('is_deleted', '0')
                        ->WHERE('course_based', 'Role Based Course')
                        ->paginate(20);

      return view('frontend.course.role_based_course_combos',compact('data', 'category'));
    }

    public function top_university_courses(){

      $data['menu'] = "";
      $data['sub_menu'] = "";
      $data['cat_show'] = 1;

      $data['meta_title'] = "Courses | TGC India";
      $data['meta_keywords'] = "";
      $data['meta_description'] = "";

      $data['slider'] = Slider::all()->WHERE('is_deleted', '0');
      $category = CourseCategory::WHERE('staus', 'Active')
                  ->WHERE('is_deleted', '0')
                  ->orderBy('orders_by', 'ASC')
                  ->get();
      
      $data['courseCount'] = Course::WHERE('staus', 'Active')
                              ->WHERE('is_deleted', '0')
                              ->WHERE('course_based', 'Top Universties Course')
                              ->count();
      $data['course'] = Course::WHERE('staus', 'Active')
                        ->WHERE('is_deleted', '0')
                        ->WHERE('course_based', 'Top Universties Course')
                        ->paginate(20);

      return view('frontend.course.top_university_courses',compact('data', 'category'));
    }

    public function ajax_get_products(Request $request){
      $course = Course::WHERE('staus', 'Active')
                        ->WHERE('is_deleted', '0')
                        ->WHERE('parent', $request->category)
                        ->paginate(30);

      foreach($course as $cours){
        echo '<li><a href="'.url("course/".$cours->slug).'">'.$cours->name.'</a></li>';
      }

    }


}