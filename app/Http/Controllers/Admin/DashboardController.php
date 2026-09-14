<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Enquiry;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\Placement;
use App\Models\Opening;
use App\Models\Events;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller{
    public function index(){
      $this->dashboard();
    }

    public function dashboard(){
      $data['menu'] = "dashboard";
      $data['sub_menu'] = "";
	   $data['categories'] = CourseCategory::WHERE('is_deleted', '0')
                        ->count();
$data['course'] = Course::WHERE('is_deleted', '0')
                        ->count();
						
						$data['testimonial'] = Testimonial::WHERE('is_deleted', '0')
                        ->count();
						
						$data['partner'] = Partner::WHERE('is_deleted', '0')
                        ->count();
						$data['placement'] = Placement::WHERE('is_deleted', '0')
                        ->count();
						$data['opening'] = Opening::WHERE('is_deleted', '0')
                        ->count();
						$data['events'] = Events::WHERE('is_deleted', '0')
                        ->count();
						
						
						$data['enquiry'] = Enquiry::count();
      return view('backend.dashboard', compact("data"));
    }

    

}
