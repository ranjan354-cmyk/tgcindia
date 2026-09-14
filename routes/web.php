<?php

use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

//use App\Http\Controllers\Auth\RegisterController;
//use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Services\OpenAIService;

use App\Http\Controllers\DynamicRedirectController;
/*
Route::get('/{slug}', [DynamicRedirectController::class, 'handle'])
    ->where('slug', '^[a-zA-Z0-9\-]+$');
    */
    
   Route::get('/refresh-captcha', function () {
    return captcha_img();
});



/*
 Route::get('/test-ai', function (OpenAIService $openAI) {
    return $openAI->generate("Write 100 words about Laravel.");
});

*/
   Route::middleware(['throttle:10,1', 'recaptcha'])->group(function () {

//Route::middleware(['throttle:2,1'])->group(function () {
Route::post('/give_review', [App\Http\Controllers\EnquiryController::class,'give_review'])->middleware(ProtectAgainstSpam::class);   
Route::post('/home-demopopup-applynow', [App\Http\Controllers\EnquiryController::class,'home_demopopup_applynow'])->middleware(ProtectAgainstSpam::class);   
Route::post('/home-popup-enrollnow', [App\Http\Controllers\EnquiryController::class,'home_popup_enrollnow'])->middleware(ProtectAgainstSpam::class);   
Route::post('/sendOffer', [App\Http\Controllers\EnquiryController::class,'sendOffer_popup'])->middleware(ProtectAgainstSpam::class);   
Route::post('/sendDemo', [App\Http\Controllers\EnquiryController::class,'sendDemo_popup'])->middleware(ProtectAgainstSpam::class);   
//Route::post('/sendDemo', [App\Http\Controllers\EnquiryController::class,'sendDemo_popup']);
Route::post('/sendDemo1', [App\Http\Controllers\EnquiryController::class,'sendDemo_popup1'])->middleware(ProtectAgainstSpam::class);   
Route::post('/submit-drop-query', [App\Http\Controllers\EnquiryController::class,'sendDropQuery'])->middleware(ProtectAgainstSpam::class);   
Route::post('/send-video-link', [App\Http\Controllers\EnquiryController::class,'sendVideoLink'])->middleware(ProtectAgainstSpam::class);   
Route::post('/send-syllabus-pdf', [App\Http\Controllers\EnquiryController::class,'sendSyllbusPdf'])->middleware(ProtectAgainstSpam::class);   
Route::post('/requestcall-back-video', [App\Http\Controllers\EnquiryController::class,'RequestcallBackVideo'])->name('requestcall-back-video')->middleware(ProtectAgainstSpam::class);   
Route::post('/sendDemoNotification', [App\Http\Controllers\EnquiryController::class,'sendDemoNotification'])->middleware(ProtectAgainstSpam::class);   
Route::post('/indexAbout', [App\Http\Controllers\EnquiryController::class,'indexAbout_enquiry_new'])->middleware(ProtectAgainstSpam::class);   
Route::post('/homeGetintouch', [App\Http\Controllers\EnquiryController::class,'homeGetintouch_enquiry'])->middleware(ProtectAgainstSpam::class);   
Route::post('/coursePage', [App\Http\Controllers\EnquiryController::class,'enroll_now_live_online'])->middleware(ProtectAgainstSpam::class);   
//Route::post('/coursePage1', [App\Http\Controllers\EnquiryController::class,'down_curri_live_online'])->middleware(ProtectAgainstSpam::class);
 Route::post('/coursePage1', [App\Http\Controllers\EnquiryController::class, 'down_curri_live_online'])
        ->middleware(ProtectAgainstSpam::class);
Route::post('/coursePage2', [App\Http\Controllers\EnquiryController::class,'classroom_training_live_online'])->middleware(ProtectAgainstSpam::class);   
Route::post('/coursePage3', [App\Http\Controllers\EnquiryController::class,'classroom_training_live_online_enrollnow'])->middleware(ProtectAgainstSpam::class);   
Route::post('/coursePage5', [App\Http\Controllers\EnquiryController::class,'corporate_training_live_online'])->middleware(ProtectAgainstSpam::class);   
Route::post('/coursePage4', [App\Http\Controllers\EnquiryController::class,'batch_requestnow'])->middleware(ProtectAgainstSpam::class);   
Route::post('/coursePage6', [App\Http\Controllers\EnquiryController::class,'career_counselling'])->middleware(ProtectAgainstSpam::class);   
Route::post('/coursePage7', [App\Http\Controllers\EnquiryController::class,'curriculum_enrollnow'])->middleware(ProtectAgainstSpam::class);       
Route::post('/coursePage8', [App\Http\Controllers\EnquiryController::class,'our_learners'])->middleware(ProtectAgainstSpam::class);       
Route::post('/coursePage9', [App\Http\Controllers\EnquiryController::class,'certification_faqs'])->middleware(ProtectAgainstSpam::class);       
Route::post('/coursePage10', [App\Http\Controllers\EnquiryController::class,'press_release'])->middleware(ProtectAgainstSpam::class)->middleware(ProtectAgainstSpam::class);      
Route::post('/coursePage11', [App\Http\Controllers\EnquiryController::class,'certification_getintouch'])->middleware(ProtectAgainstSpam::class);       
Route::post('/coursePage12', [App\Http\Controllers\EnquiryController::class,'sample_certificate'])->middleware(ProtectAgainstSpam::class);       
Route::post('/become-an-instructor', [App\Http\Controllers\EnquiryController::class,'become_an_instructor'])->middleware(ProtectAgainstSpam::class);       
Route::post('/trainer-application', [App\Http\Controllers\EnquiryController::class,'trainer_application'])->middleware(ProtectAgainstSpam::class);       
Route::post('/industrial-training', [App\Http\Controllers\EnquiryController::class,'industrial_training'])->middleware(ProtectAgainstSpam::class);      
Route::post('/enroll-now', [App\Http\Controllers\EnquiryController::class,'enroll_now'])->middleware(ProtectAgainstSpam::class);     
Route::post('/upcoming-applynow', [App\Http\Controllers\EnquiryController::class,'upcoming_applynow'])->middleware(ProtectAgainstSpam::class);      
Route::post('/careers', [App\Http\Controllers\EnquiryController::class,'career_form'])->middleware(ProtectAgainstSpam::class);   
Route::post('/scholarship', [App\Http\Controllers\EnquiryController::class,'scholarship_form'])->middleware(ProtectAgainstSpam::class);    
Route::post('/corporate-training', [App\Http\Controllers\EnquiryController::class,'corporate_training'])->middleware(ProtectAgainstSpam::class);    
Route::post('/contact', [App\Http\Controllers\EnquiryController::class,'contact_form'])->middleware(ProtectAgainstSpam::class);    
Route::post('/gethomecourse', [App\Http\Controllers\HomeController::class,'gethomecourse'])->name('gethomecourse')->middleware(ProtectAgainstSpam::class);  
Route::post('/saveEnroller', [App\Http\Controllers\HomeController::class,'saveEnroller'])->name('saveEnroller')->middleware(ProtectAgainstSpam::class);  


    
});

Route::post('/saveFranchiser', [App\Http\Controllers\HomeController::class,'saveFranchiser'])->name('saveFranchiser'); 
Route::post('/review-answer', [App\Http\Controllers\HomeController::class,'reviewAnswer'])->name('reviewAnswer'); 
Route::get('/scholarship-dashboard/{id}', [App\Http\Controllers\HomeController::class,'scholarshipResult'])->name('scholarshipResult'); 

Route::post('/showvideo', [App\Http\Controllers\HomeController::class,'showvideo'])->name('showvideo');  

Route::post('/save-eligibility-test', [App\Http\Controllers\HomeController::class,'saveEligibilityTest'])->name('save-eligibility-test'); 

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/thank-you.html', [App\Http\Controllers\HomeController::class, 'thankyou'])->name('thankyou');

Route::get('/online-payment', [App\Http\Controllers\HomeController::class, 'onlinePayment'])->name('online-payment');

Route::get('/franchise-opportunities-in-india', [App\Http\Controllers\HomeController::class, 'franchisePage'])->name('franchisePage');

Route::get('/eligibility-test', [App\Http\Controllers\HomeController::class, 'eligibilityTest'])->name('eligibilityTest');
Route::get('/eligibility-test-registration', [App\Http\Controllers\HomeController::class, 'eligibilityTestRegistration'])->name('eligibilityTestRegistration');

Route::post('/save-test-registration', [App\Http\Controllers\HomeController::class, 'saveEligibilityTestRegistration'])->name('saveEligibilityTestRegistration');

Route::post('/pay-online', [App\Http\Controllers\HomeController::class, 'payOnline'])->name('pay-online');
Route::get('/make-payment', [App\Http\Controllers\HomeController::class, 'makePayment'])->name('make-payment');
Route::get('/success-message', [App\Http\Controllers\HomeController::class, 'successMessage'])->name('success-message');
//success-message
Route::post('/payment-success', [App\Http\Controllers\HomeController::class, 'PaymentSuccess'])->name('payment-success');

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('custom-login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('custom-login');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


//Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('user.login');
//Route::post('custom-login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('custom-login');
//Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');




Route::get('courses', [App\Http\Controllers\CoursesController::class, 'courses'])->name('coursesnew');
Route::get('search-courses', [App\Http\Controllers\CoursesController::class, 'searchCourses'])->name('searchCourses');
Route::get('certification-courses.html', [App\Http\Controllers\CoursesController::class, 'certification_courses'])->name('certification_courses');
Route::get('role-based-course-combos.html', [App\Http\Controllers\CoursesController::class, 'role_based_course_combos'])->name('role_based_course_combos');
Route::get('top-university-courses.html', [App\Http\Controllers\CoursesController::class, 'top_university_courses'])->name('top_university_courses');

Route::get('about-us', [App\Http\Controllers\PageController::class, 'about_us'])->name('about_us');
Route::get('culture.html', [App\Http\Controllers\PageController::class, 'culture'])->name('culture');
Route::get('why-tgc.html', [App\Http\Controllers\PageController::class, 'why_tgc'])->name('why_tgc');
Route::get('faculty.html', [App\Http\Controllers\PageController::class, 'faculty'])->name('faculty');
Route::get('facilites.html', [App\Http\Controllers\PageController::class, 'facilites'])->name('facilites');
Route::get('join-us.html', [App\Http\Controllers\PageController::class, 'join_us'])->name('join_us');
Route::get('careers.html', [App\Http\Controllers\PageController::class, 'careers'])->name('careers');
Route::get('student-placement', [App\Http\Controllers\PageController::class, 'student_placement'])->name('student-placement');

Route::get('it-corporate-training.html', [App\Http\Controllers\PageController::class, 'corporate_training'])->name('corporate_training');
Route::get('scholarship.html', [App\Http\Controllers\PageController::class, 'scholarship'])->name('scholarship');
Route::get('placement.html', [App\Http\Controllers\PageController::class, 'placement'])->name('placement');
Route::get('press-release', [App\Http\Controllers\PageController::class, 'press_release'])->name('press_release');
Route::get('frequently-asked-questions.html', [App\Http\Controllers\PageController::class, 'frequently_asked_questions'])->name('frequently_asked_questions');
Route::get('visa-assistance-international-students.html', [App\Http\Controllers\PageController::class, 'visa_assistance_international_students'])->name('visa_assistance_international_students');
Route::get('download-brochure.html', [App\Http\Controllers\PageController::class, 'download_brochure'])->name('download_brochure');
Route::get('student-reviews.html', [App\Http\Controllers\PageController::class, 'student_reviews'])->name('student_reviews');
Route::get('calendar-new-batches.html', [App\Http\Controllers\PageController::class, 'calendar_new_batches'])->name('calendar_new_batches');
Route::get('upcoming-events.html', [App\Http\Controllers\PageController::class, 'upcoming_events'])->name('upcoming_events');
Route::get('enroll-now.html', [App\Http\Controllers\PageController::class, 'enroll_now'])->name('enroll_now');
Route::get('industrial-training.html', [App\Http\Controllers\PageController::class, 'industrial_training'])->name('industrial_training');
Route::get('it-corporate-trainings-in-india.html', [App\Http\Controllers\PageController::class, 'it_corporate_training_in_india'])->name('it_corporate_training_in_india');
Route::get('trainer-application.html', [App\Http\Controllers\PageController::class, 'trainer_application'])->name('trainer_application');
Route::get('become-an-instructor.html', [App\Http\Controllers\PageController::class, 'become_an_instructor'])->name('become_an_instructor');
Route::get('reviews', [App\Http\Controllers\PageController::class, 'reviews'])->name('reviews');
Route::get('reviews/{slug?}', [App\Http\Controllers\PageController::class, 'reviews_category'])->name('reviews_category');
//Route::get('press-release.html', [App\Http\Controllers\PageController::class, 'press_release'])->name('press_release');
Route::get('press/{slug?}', [App\Http\Controllers\PageController::class, 'press_release_details'])->name('press_release_details');
//Route::get('enroll-now/{slug?}', [App\Http\Controllers\PageController::class, 'enroll_now_for_new_batch'])->name('enroll_now_for_new_batch');
Route::get('our-clients.html', [App\Http\Controllers\PageController::class, 'our_clients'])->name('our_clients');
Route::get('get-syllabus-pdf/{id}', [App\Http\Controllers\PageController::class, 'getsyllabuspdf'])->name('getsyllabuspdf');

Route::get('disclaimer.html', [App\Http\Controllers\PageController::class, 'disclaimer'])->name('disclaimer');
Route::get('intellectual-property.html', [App\Http\Controllers\PageController::class, 'intellectual_property'])->name('intellectual_property');
Route::get('course-fee.html', [App\Http\Controllers\PageController::class, 'product_services_details'])->name('product_services_details');
Route::get('process-flow.html', [App\Http\Controllers\PageController::class, 'process_flow_to_purchase'])->name('process_flow_to_purchase');
Route::get('refund-policy.html', [App\Http\Controllers\PageController::class, 'refund_policy'])->name('refund_policy');
Route::get('gallery', [App\Http\Controllers\PageController::class, 'galleryData'])->name('galleryData');

Route::get('privacy-policy.html', [App\Http\Controllers\PageController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('terms-conditions.html', [App\Http\Controllers\PageController::class, 'terms_conditions'])->name('terms_conditions');

Route::get('contact-us', [App\Http\Controllers\PageController::class, 'contact_us'])->name('contact_us');
Route::get('south-delhi-center', [App\Http\Controllers\PageController::class, 'south_delhi_center'])->name('south_delhi_center');
Route::get('east-delhi-center', [App\Http\Controllers\PageController::class, 'east_delhi_center'])->name('east_delhi_center');
Route::get('location', [App\Http\Controllers\PageController::class, 'Seolocation'])->name('location');

Route::get('thanks', [App\Http\Controllers\PageController::class, 'thankslocation'])->name('thanks');
Route::get('blogs', [App\Http\Controllers\PageController::class, 'blogs'])->name('blogs');
Route::get('blog/{any?}', [App\Http\Controllers\CoursesController::class, 'blog_category'])->name('blog_category');
Route::get('blog-details/{slug}', [App\Http\Controllers\CoursesController::class, 'blog_details'])->name('blog_details');



Route::get('course/{any?}', [App\Http\Controllers\CoursesController::class, 'course_details'])->name('course_details');

Route::post('/ajax_get_products', [App\Http\Controllers\CoursesController::class,'ajax_get_products']);

Route::get('location/{id}', [App\Http\Controllers\PageController::class, 'locationDetails'])->name('location-details');





Route::group(['middleware' => 'auth'], function (){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');

    // Category
    Route::get('admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'category'])->name('category');
    Route::get('admin/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'add_category'])->name('admin.add_category');
    Route::post('admin/saveCategory', [App\Http\Controllers\Admin\CategoryController::class, 'saveCategory'])->name('admin.saveCategory');
    Route::get('admin/edit-category/{id?}', [App\Http\Controllers\Admin\CategoryController::class, 'editCategory'])->name('admin.editCategory');
    Route::post('admin/updateCategory', [App\Http\Controllers\Admin\CategoryController::class, 'updateCategory'])->name('admin.updateCategory');
    Route::get('admin/delete-category/{id?}', [App\Http\Controllers\Admin\CategoryController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::get('admin/del_category', [App\Http\Controllers\Admin\CategoryController::class, 'del_category'])->name('admin.del_category');
    Route::get('admin/restore-category/{id?}', [App\Http\Controllers\Admin\CategoryController::class, 'restoreCategory'])->name('admin.restoreCategory');

 Route::get('admin/view-category/{id?}', [App\Http\Controllers\Admin\CategoryController::class, 'ViewCategory'])->name('ViewCategory');

    // Slider
    Route::get('admin/slider', [App\Http\Controllers\Admin\SliderController::class, 'slider']);
    Route::get('admin/add-slider', [App\Http\Controllers\Admin\SliderController::class, 'add']);
    Route::post('admin/saveSlider', [App\Http\Controllers\Admin\SliderController::class, 'save']);
    Route::get('admin/edit-slider/{id?}', [App\Http\Controllers\Admin\SliderController::class, 'edit']);
    Route::post('admin/updateSlider', [App\Http\Controllers\Admin\SliderController::class, 'update']);
    Route::get('admin/delete-slider/{id?}', [App\Http\Controllers\Admin\SliderController::class, 'delete']);


    // Settings
    Route::get('admin/settings', [App\Http\Controllers\Admin\SettingsController::class, 'setting']);
    Route::post('admin/saveSettings', [App\Http\Controllers\Admin\SettingsController::class, 'update']);
    Route::get('admin/general', [App\Http\Controllers\Admin\SettingsController::class, 'general']);
    Route::post('admin/saveGeneral', [App\Http\Controllers\Admin\SettingsController::class, 'general_update']);
     Route::post('admin/general_setting', [App\Http\Controllers\Admin\SettingsController::class, 'general_setting']);
      Route::post('admin/footer_setting', [App\Http\Controllers\Admin\SettingsController::class, 'footer_setting']);
      Route::post('admin/typography_setting', [App\Http\Controllers\Admin\SettingsController::class, 'typography_setting']);
       Route::post('admin/header_setting', [App\Http\Controllers\Admin\SettingsController::class, 'header_setting']);
        Route::post('admin/icons_setting', [App\Http\Controllers\Admin\SettingsController::class, 'icons_setting']);
      
///icons_setting
    // Course Category
    Route::get('admin/course-category', [App\Http\Controllers\Admin\CourseCategoryController::class, 'category'])->name('course_category');
    Route::get('admin/add-course-category', [App\Http\Controllers\Admin\CourseCategoryController::class, 'add_category_course'])->name('course_add_category');
    Route::post('admin/saveCourseCategory', [App\Http\Controllers\Admin\CourseCategoryController::class, 'saveCategory'])->name('course_saveCategory');
     Route::post('admin/savecategoryOrder', [App\Http\Controllers\Admin\CategoryController::class, 'savecategoryOrder'])->name('savecategoryOrder');
    
    
    Route::get('admin/edit-course-category/{id?}', [App\Http\Controllers\Admin\CourseCategoryController::class, 'editCategory'])->name('course_editCategory');
    Route::post('admin/updateCourseCategory', [App\Http\Controllers\Admin\CourseCategoryController::class, 'updateCategory'])->name('course_updateCategory');
    Route::get('admin/delete-course-category/{id?}', [App\Http\Controllers\Admin\CourseCategoryController::class, 'deleteCategory'])->name('course_deleteCategory');
    Route::get('admin/del_course_category', [App\Http\Controllers\Admin\CourseCategoryController::class, 'del_category'])->name('course_del_category');
    Route::get('admin/restore-course-category/{id?}', [App\Http\Controllers\Admin\CourseCategoryController::class, 'restoreCategory'])->name('course_restoreCategory');

    Route::get('admin/category_up/{count?}/{id?}', [App\Http\Controllers\Admin\CourseCategoryController::class, 'category_up'])->name('admin.category_up');

    // Courses
    Route::get('admin/courses', [App\Http\Controllers\Admin\CourseController::class, 'courses'])->name('courses');
        Route::get('admin/popular-courses', [App\Http\Controllers\Admin\CourseController::class, 'popularCourses'])->name('popular-courses');
         Route::get('admin/parentcat/{id}', [App\Http\Controllers\Admin\CourseController::class, 'parentcat'])->name('parentcat');
         Route::get('admin/career-courses', [App\Http\Controllers\Admin\CourseController::class, 'careerCourses'])->name('career-courses');
         Route::get('admin/copy-courses', [App\Http\Controllers\Admin\CourseController::class, 'copyCourses'])->name('copy-courses');
         
          Route::get('admin/remove-redirect-manger/{id}', [App\Http\Controllers\Admin\CourseController::class, 'removeRedirect'])->name('removeRedirect');
         Route::get('admin/redirect-manager-edit/{id}', [App\Http\Controllers\Admin\CourseController::class, 'editRedirect'])->name('editRedirect');
         Route::get('admin/edit-schema/{id}', [App\Http\Controllers\Admin\CourseController::class, 'editschema'])->name('editschema');
        
           Route::post('admin/saveschemacategory', [App\Http\Controllers\Admin\CourseController::class, 'saveschemacategory'])->name('saveschemacategory');
       
          Route::get('admin/remove-schema/{id}', [App\Http\Controllers\Admin\CourseController::class, 'removeschema'])->name('removeschema');
       
    Route::get('admin/add-course', [App\Http\Controllers\Admin\CourseController::class, 'add_course'])->name('add_course');
    Route::post('admin/saveCourse', [App\Http\Controllers\Admin\CourseController::class, 'saveCourse'])->name('saveCourse');
    Route::get('admin/edit-course/{id?}', [App\Http\Controllers\Admin\CourseController::class, 'editCourse'])->name('editCourse');
    Route::post('admin/updateCourse', [App\Http\Controllers\Admin\CourseController::class, 'updateCourse'])->name('updateCourse');
    Route::get('admin/delete-course/{id?}', [App\Http\Controllers\Admin\CourseController::class, 'deleteCourse'])->name('deleteCourse');
    Route::get('admin/del_course', [App\Http\Controllers\Admin\CourseController::class, 'del_course'])->name('del_course');
    Route::get('admin/restore-course/{id?}', [App\Http\Controllers\Admin\CourseController::class, 'restoreCourse'])->name('restoreCourse');
    
    
     Route::get('admin/add-course-location', [App\Http\Controllers\Admin\CourseController::class, 'add_course_location'])->name('add_course_location');
      Route::post('admin/saveCourseLocation', [App\Http\Controllers\Admin\CourseController::class, 'saveCourseLocation'])->name('saveCourseLocation');
      
      Route::post('admin/saveQuestionbank', [App\Http\Controllers\Admin\CourseController::class, 'saveQuestionbank'])->name('saveQuestionbank');
       Route::post('admin/updateQuestionbank', [App\Http\Controllers\Admin\CourseController::class, 'updateQuestionbank'])->name('updateQuestionbank');
       
       Route::get('admin/remove-question/{id}', [App\Http\Controllers\Admin\CourseController::class, 'removeQuestion'])->name('removeQuestion');
        Route::get('admin/update-question/{id}', [App\Http\Controllers\Admin\CourseController::class, 'updateQuestion'])->name('updateQuestion');
        Route::get('admin/question-bank', [App\Http\Controllers\Admin\CourseController::class, 'questionBank'])->name('questionBank');
        
    
    Route::post('admin/getsubcity', [App\Http\Controllers\Admin\CourseController::class, 'getsubcity'])->name('getsubcity');
   
    
      Route::post('admin/saveOrderCourse', [App\Http\Controllers\Admin\CourseController::class, 'saveOrderCourse'])->name('saveOrderCourse');
       Route::post('admin/saveOrderPopCourse', [App\Http\Controllers\Admin\CourseController::class, 'saveOrderPopCourse'])->name('saveOrderPopCourse');
      
       Route::post('admin/saveOrderCareerCourse', [App\Http\Controllers\Admin\CourseController::class, 'saveOrderCareerCourse'])->name('saveOrderCareerCourse');
      Route::post('admin/saveCourseBulkTestimonials', [App\Http\Controllers\Admin\CourseController::class, 'saveCourseBulkTestimonials'])->name('saveCourseBulkTestimonials');
      
      
        Route::post('admin/saveExcludedParent', [App\Http\Controllers\Admin\CourseController::class, 'saveExcludedParent'])->name('saveExcludedParent');
        Route::post('admin/saveCopyParentCourse', [App\Http\Controllers\Admin\CourseController::class, 'saveCopyParentCourse'])->name('saveCopyParentCourse');
         Route::post('admin/uploadsitemap', [App\Http\Controllers\Admin\CourseController::class, 'uploadsitemap'])->name('uploadsitemap');
          Route::post('admin/addredirectmanager', [App\Http\Controllers\Admin\CourseController::class, 'addredirectmanager'])->name('addredirectmanager');
          
           Route::post('admin/saveExcludedCourse', [App\Http\Controllers\Admin\CourseController::class, 'saveExcludedCourse'])->name('saveExcludedCourse');
         
        
      Route::get('admin/video', [App\Http\Controllers\Admin\CourseController::class, 'GetVideo'])->name('GetVideo');
       Route::get('admin/landingpage', [App\Http\Controllers\Admin\CourseController::class, 'landingpage'])->name('landingpage');
       Route::post('admin/updatevideoorder', [App\Http\Controllers\Admin\CourseController::class, 'updatevideoorder'])->name('updatevideoorder');
        Route::post('admin/createlanding', [App\Http\Controllers\Admin\CourseController::class, 'createlanding'])->name('createlanding');
           Route::post('admin/savevideo', [App\Http\Controllers\Admin\CourseController::class, 'savevideo'])->name('savevideo');
     Route::get('admin/gallery', [App\Http\Controllers\Admin\CourseController::class, 'Getgallery'])->name('gallery');
      Route::get('admin/robots-file', [App\Http\Controllers\Admin\CourseController::class, 'Getrobots'])->name('Getrobots');
       Route::get('admin/redirectmanager', [App\Http\Controllers\Admin\CourseController::class, 'redirectmanager'])->name('redirectmanager');
     
     
      Route::get('admin/sitemap-generator', [App\Http\Controllers\Admin\CourseController::class, 'sitemap_generator'])->name('sitemap_generator');
      
      Route::post('admin/updatesitemap', [App\Http\Controllers\Admin\CourseController::class, 'generateSitemap'])->name('updatesitemap');
     
        Route::get('admin/parent-topic-edit/{id}/{catid}', [App\Http\Controllers\Admin\CourseController::class, 'parentTopic'])->name('parentTopic');
    Route::get('admin/parent-handson-edit/{id}/{catid}', [App\Http\Controllers\Admin\CourseController::class, 'parentHandson'])->name('parentHandson');
    
     Route::get('admin/parent-skills-edit/{id}/{catid}', [App\Http\Controllers\Admin\CourseController::class, 'parentSkills'])->name('parentSkills');
   
    
     
          Route::post('admin/saveOrdergallery', [App\Http\Controllers\Admin\CourseController::class, 'saveOrdergallery'])->name('saveOrdergallery');
         Route::post('admin/savegallerycateorder', [App\Http\Controllers\Admin\CourseController::class, 'savegallerycateorder'])->name('savegallerycateorder');
   Route::post('admin/saveParentTopicName', [App\Http\Controllers\Admin\CourseController::class, 'saveParentTopicName'])->name('saveParentTopicName');
  
  
  
          Route::post('admin/savesolutionOrder', [App\Http\Controllers\Admin\CourseController::class, 'savesolutionOrder'])->name('savesolutionOrder');
   Route::post('admin/savesolutionContent', [App\Http\Controllers\Admin\CourseController::class, 'savesolutionContent'])->name('savesolutionContent');
  
  
  
     Route::post('admin/savegallerycat', [App\Http\Controllers\Admin\CourseController::class, 'savegallerycat'])->name('savegallerycat');
         Route::get('admin/gallery-cat', [App\Http\Controllers\Admin\CourseController::class, 'Getcategory'])->name('Getcategory');
          Route::get('admin/remove-gallery-cat/{id?}', [App\Http\Controllers\Admin\CourseController::class, 'delete_gallery_cat'])->name('delete_gallery_cat');
         
       Route::post('admin/savegallery', [App\Http\Controllers\Admin\CourseController::class, 'savegallery'])->name('savegallery');
        Route::post('admin/saveTopicOrderCourse', [App\Http\Controllers\Admin\CourseController::class, 'saveTopicOrderCourse'])->name('saveTopicOrderCourse');
           Route::post('admin/saveTopicOrder', [App\Http\Controllers\Admin\CourseController::class, 'saveTopicOrder'])->name('saveTopicOrder');
        
         Route::post('admin/saveCertificateOrder', [App\Http\Controllers\Admin\CourseController::class, 'saveCertificateOrder'])->name('saveCertificateOrder');
      
        Route::post('admin/saveOrderCourseExcluded', [App\Http\Controllers\Admin\CourseController::class, 'saveOrderCourseExcluded'])->name('saveOrderCourseExcluded');
         Route::post('admin/convertimage', [App\Http\Controllers\Admin\CourseController::class, 'convertimage'])->name('convertimage');
          Route::post('admin/blogOrder', [App\Http\Controllers\Admin\CourseController::class, 'blogOrder'])->name('blogOrder');
            Route::post('admin/reviewsOrder', [App\Http\Controllers\Admin\CourseController::class, 'reviewsOrder'])->name('reviewsOrder');
             Route::post('admin/downloadcsv', [App\Http\Controllers\Admin\SettingsController::class, 'downloadcsv']);
             Route::post('admin/generate-blog', [App\Http\Controllers\Admin\BlogController::class, 'generate'])->name('generate-blog');
  Route::post('admin/UpdateOpenAPI', [App\Http\Controllers\Admin\BlogController::class, 'UpdateOpenAPI'])->name('UpdateOpenAPI');
   // Route::get('admin/course_up/{count?}/{id?co}', [App\Http\Controllers\Admin\CourseController::class, 'course_up'])->name('course_up');
Route::get('admin/course_up/{cat}/{id}', [App\Http\Controllers\Admin\CourseController::class, 'course_up'])->name('course_up');

    Route::get('admin/course-batch/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_batch'])->name('course_batch');
    Route::post('admin/insertBatch', [App\Http\Controllers\Admin\CourseController::class, 'insertBatch'])->name('insertBatch');
    Route::get('admin/course-batch-edit/{id?}/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_batch_edit'])->name('course_batch_edit');
    Route::post('admin/updateBatch', [App\Http\Controllers\Admin\CourseController::class, 'updateBatch'])->name('updateBatch');
    Route::get('admin/delete-batch/{id?}', [App\Http\Controllers\Admin\CourseController::class, 'delete_batch'])->name('delete_batch');
    
    
        Route::get('admin/course-batch-location/{id}', [App\Http\Controllers\Admin\CourseController::class, 'course_batch_location'])->name('course_batch_location');
    
    

    Route::get('admin/course-enroll/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_enroll'])->name('course_enroll');
    Route::post('admin/insertEnroll', [App\Http\Controllers\Admin\CourseController::class, 'insertEnroll'])->name('insertEnroll');
    Route::get('admin/course-enroll-edit/{id?}/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_enroll_edit'])->name('course_enroll_edit');
    Route::post('admin/updateEnroll', [App\Http\Controllers\Admin\CourseController::class, 'updateEnroll'])->name('updateEnroll');
    Route::get('admin/delete-enroll/{id?}/{image?}', [App\Http\Controllers\Admin\CourseController::class, 'delete_enroll'])->name('delete_enroll');

    Route::get('admin/course-training/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_training'])->name('course_training');
    Route::post('admin/insertTraining', [App\Http\Controllers\Admin\CourseController::class, 'insertTraining'])->name('insertTraining');
    Route::get('admin/course-training-edit/{id?}/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_training_edit'])->name('course_training_edit');
    Route::post('admin/updateTraining', [App\Http\Controllers\Admin\CourseController::class, 'updateTraining'])->name('updateTraining');
    Route::get('admin/delete-training/{id?}', [App\Http\Controllers\Admin\CourseController::class, 'delete_training'])->name('delete_training');

    Route::get('admin/course-solutions/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_solutions'])->name('course_solutions');
    Route::post('admin/insertSolutions', [App\Http\Controllers\Admin\CourseController::class, 'insertSolutions'])->name('insertSolutions');
    Route::get('admin/delete-solutions/{id?}', [App\Http\Controllers\Admin\CourseController::class, 'delete_solutions'])->name('delete_solutions');
    Route::get('admin/managetheme', [App\Http\Controllers\Admin\SettingsController::class, 'managetheme']);
    Route::post('admin/themeSave', [App\Http\Controllers\Admin\SettingsController::class, 'themeSave']);
    Route::post('admin/saveFontFamily', [App\Http\Controllers\Admin\SettingsController::class, 'saveFontFamily']);
    Route::post('admin/updateFontFamily', [App\Http\Controllers\Admin\SettingsController::class, 'updateFontFamily']);
    Route::post('admin/removeFontFamily', [App\Http\Controllers\Admin\SettingsController::class, 'removeFontFamily']);
    Route::get('admin/course-certificate/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_certificate'])->name('course_certificate');
    Route::post('admin/insertCertificate', [App\Http\Controllers\Admin\CourseController::class, 'insertCertificate'])->name('insertCertificate');
    Route::get('admin/course-certificate-edit/{id?}/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_certificate_edit'])->name('course_certificate_edit');
    Route::post('admin/updateCertificate', [App\Http\Controllers\Admin\CourseController::class, 'updateCertificate'])->name('updateCertificate');
    Route::get('admin/delete-certificate/{id?}/{image?}', [App\Http\Controllers\Admin\CourseController::class, 'delete_certificate'])->name('delete_certificate');

    Route::get('admin/course-syllabus/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_syllabus'])->name('course_syllabus');
    Route::post('admin/insertSyllabus', [App\Http\Controllers\Admin\CourseController::class, 'insertSyllabus'])->name('insertSyllabus');
      Route::post('admin/insertBulkParent', [App\Http\Controllers\Admin\CourseController::class, 'insertBulkParent'])->name('insertBulkParent');
      Route::get('admin/schema', [App\Http\Controllers\Admin\CourseController::class, 'Getschema'])->name('Getschema');
    
    Route::get('admin/course-syllabus-edit/{id?}/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_syllabus_edit'])->name('course_syllabus_edit');
    Route::post('admin/updateSyllabus', [App\Http\Controllers\Admin\CourseController::class, 'updateSyllabus'])->name('updateSyllabus');
    Route::get('admin/delete-syllabus/{id?}/{image?}', [App\Http\Controllers\Admin\CourseController::class, 'delete_syllabus'])->name('delete_syllabus');

    Route::get('admin/course-faq/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_faq'])->name('course_faq');
    Route::post('admin/insertFaq', [App\Http\Controllers\Admin\CourseController::class, 'insertFaq'])->name('insertFaq');
    Route::get('admin/course-faq-edit/{id?}/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_faq_edit'])->name('course_faq_edit');
    Route::post('admin/updateFaqCourse', [App\Http\Controllers\Admin\CourseController::class, 'updateFaqCourse'])->name('updateFaqCourse');
     Route::post('admin/addschema', [App\Http\Controllers\Admin\CourseController::class, 'addschema'])->name('addschema');
    
    Route::get('admin/delete-faq/{id?}', [App\Http\Controllers\Admin\CourseController::class, 'delete_faq'])->name('delete_faq');
    Route::get('admin/remove-video/{id?}', [App\Http\Controllers\Admin\CourseController::class, 'remove_video'])->name('remove-video');
     Route::get('admin/update-video/{id?}', [App\Http\Controllers\Admin\CourseController::class, 'update_video'])->name('update-video');
   
    
      Route::get('admin/remove-gallery/{id?}', [App\Http\Controllers\Admin\CourseController::class, 'remove_gallery'])->name('remove-gallery');
      
    ///remove-video

    Route::get('admin/course-certificate-training/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_certificate_training'])->name('course_certificate_training');
    Route::post('admin/insertCertificateTraining', [App\Http\Controllers\Admin\CourseController::class, 'insertCertificateTraining'])->name('insertCertificateTraining');
    Route::get('admin/course-certificate-training-edit/{id?}/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_certificate_training_edit'])->name('course_certificate_training_edit');
    Route::post('admin/updateCertificateTraining', [App\Http\Controllers\Admin\CourseController::class, 'updateCertificateTraining'])->name('updateCertificateTraining');
    Route::get('admin/delete-certificate-training/{id?}/{image?}', [App\Http\Controllers\Admin\CourseController::class, 'delete_certificate_training'])->name('delete_certificate_training');

    Route::get('admin/course-testimonial/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_testimonial'])->name('course_testimonial');
    Route::post('admin/insertTestimonial', [App\Http\Controllers\Admin\CourseController::class, 'insertTestimonial'])->name('insertTestimonial');
    Route::get('admin/course-testimonial-edit/{id?}/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_testimonial_edit'])->name('course_testimonial_edit');
    Route::post('admin/updateTestimonialCourse', [App\Http\Controllers\Admin\CourseController::class, 'updateTestimonialCourse'])->name('updateTestimonialCourse');
    Route::get('admin/delete-testimonial-course/{id?}', [App\Http\Controllers\Admin\CourseController::class, 'delete_testimonial'])->name('delete_testimonial');

    Route::get('admin/course-project/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_project']);
    Route::post('admin/insertProject', [App\Http\Controllers\Admin\CourseController::class, 'insertProject']);
    Route::get('admin/course-project-edit/{id?}/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_project_edit']);
    Route::post('admin/updateProject', [App\Http\Controllers\Admin\CourseController::class, 'updateProject']);
    Route::get('admin/delete-project/{id?}/{image?}', [App\Http\Controllers\Admin\CourseController::class, 'delete_project']);

   Route::get('admin/course-heading/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_heading'])->name('course_heading');
    Route::post('admin/updateHeading', [App\Http\Controllers\Admin\CourseController::class, 'updateHeading'])->name('updateHeading');
   
    

    Route::get('admin/course-seo/{id_hash?}', [App\Http\Controllers\Admin\CourseController::class, 'course_seo'])->name('course_seo');
    Route::post('admin/updateSeo', [App\Http\Controllers\Admin\CourseController::class, 'updateSeo'])->name('updateSeo');
    

    


    // Blog Category
    Route::get('admin/blog-category', [App\Http\Controllers\Admin\BlogCategoryController::class, 'category'])->name('admin.category');
    Route::get('admin/add-blog-category', [App\Http\Controllers\Admin\BlogCategoryController::class, 'add_category'])->name('blog.add_category');
    Route::post('admin/saveBlogCategory', [App\Http\Controllers\Admin\BlogCategoryController::class, 'saveCategory'])->name('blog.saveCategory');
    Route::get('admin/edit-blog-category/{id?}', [App\Http\Controllers\Admin\BlogCategoryController::class, 'editCategory'])->name('blog.editCategory');
    Route::post('admin/updateBlogCategory', [App\Http\Controllers\Admin\BlogCategoryController::class, 'updateCategory'])->name('blog.updateCategory');
    Route::get('admin/delete-blog-category/{id?}', [App\Http\Controllers\Admin\BlogCategoryController::class, 'deleteCategory'])->name('blog.deleteCategory');
    Route::get('admin/del_blog_category', [App\Http\Controllers\Admin\BlogCategoryController::class, 'del_category'])->name('blog.del_category');
    Route::get('admin/restore-blog-category/{id?}', [App\Http\Controllers\Admin\BlogCategoryController::class, 'restoreCategory'])->name('blog.restoreCategory');

    Route::get('admin/category_up_blog/{count?}/{id?}', [App\Http\Controllers\Admin\BlogCategoryController::class, 'category_up'])->name('blog.category_up');
    
    


    // Blogs
    Route::get('admin/blogs', [App\Http\Controllers\Admin\BlogController::class, 'blogs'])->name('admin.blogs');
    Route::get('admin/add-blog', [App\Http\Controllers\Admin\BlogController::class, 'add_blog'])->name('add_blog');
    Route::post('admin/saveBlog', [App\Http\Controllers\Admin\BlogController::class, 'saveBlog'])->name('saveBlog');
    Route::get('admin/edit-blog/{id?}', [App\Http\Controllers\Admin\BlogController::class, 'editBlog'])->name('editBlog');
    Route::post('admin/updateBlog', [App\Http\Controllers\Admin\BlogController::class, 'updateBlog'])->name('updateBlog');
    Route::get('admin/delete-blog/{id?}', [App\Http\Controllers\Admin\BlogController::class, 'deleteBlog'])->name('deleteBlog');
    Route::get('admin/del_blog', [App\Http\Controllers\Admin\BlogController::class, 'del_blog'])->name('del_blog');
    Route::get('admin/restore-blog/{id?}', [App\Http\Controllers\Admin\BlogController::class, 'restoreBlog'])->name('restoreBlog');
    Route::get('admin/blog-poular', [App\Http\Controllers\Admin\BlogController::class, 'blogPoular'])->name('blogPoular');
    
    // Coupons
    Route::get('admin/coupons', [App\Http\Controllers\Admin\SalesController::class, 'coupons'])->name('coupons');
    Route::get('admin/add-coupon', [App\Http\Controllers\Admin\SalesController::class, 'add_coupon'])->name('add_coupon');
    Route::post('admin/saveCoupon', [App\Http\Controllers\Admin\SalesController::class, 'saveCoupon'])->name('saveCoupon');
    Route::get('admin/edit-coupon/{id?}', [App\Http\Controllers\Admin\SalesController::class, 'editCoupon'])->name('editCoupon');
    Route::post('admin/updateCoupon', [App\Http\Controllers\Admin\SalesController::class, 'updateCoupon'])->name('updateCoupon');
    Route::get('admin/delete-coupon/{id?}', [App\Http\Controllers\Admin\SalesController::class, 'deleteCoupon'])->name('deleteCoupon');


     //Enquiry
     Route::get('admin/enquiry', [App\Http\Controllers\Admin\EnquiryController::class, 'view']);

      Route::get('admin/DownloadCurriculum', [App\Http\Controllers\Admin\EnquiryController::class, 'DownloadCurriculum']);
    // Testimonial
    Route::get('admin/testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'view']);
    Route::get('admin/add-testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'add']);
    Route::post('admin/saveTestimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'save']);
    Route::get('admin/edit-testimonial/{id?}', [App\Http\Controllers\Admin\TestimonialController::class, 'edit']);
    Route::post('admin/updateTestimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'update']);
    Route::get('admin/delete-testimonial/{id?}', [App\Http\Controllers\Admin\TestimonialController::class, 'delete']);

    // Partner
    Route::get('admin/partner', [App\Http\Controllers\Admin\PartnerController::class, 'view']);
    Route::get('admin/add-partner', [App\Http\Controllers\Admin\PartnerController::class, 'add']);
    Route::post('admin/savePartner', [App\Http\Controllers\Admin\PartnerController::class, 'save']);
    Route::get('admin/edit-partner/{id?}', [App\Http\Controllers\Admin\PartnerController::class, 'edit']);
    Route::post('admin/updatePartner', [App\Http\Controllers\Admin\PartnerController::class, 'update']);
    Route::get('admin/delete-partner/{id?}', [App\Http\Controllers\Admin\PartnerController::class, 'delete']);
    
    
     // Contact Details
    Route::get('admin/contact', [App\Http\Controllers\Admin\ContactController::class, 'view']);
    Route::get('admin/add-contact', [App\Http\Controllers\Admin\ContactController::class, 'add']);
    Route::post('admin/saveContact', [App\Http\Controllers\Admin\ContactController::class, 'save']);
    Route::get('admin/edit-contact/{id?}', [App\Http\Controllers\Admin\ContactController::class, 'edit']);
    Route::post('admin/updateContact', [App\Http\Controllers\Admin\ContactController::class, 'update']);
    Route::get('admin/delete-contact/{id?}', [App\Http\Controllers\Admin\ContactController::class, 'delete']);
    
    

    // Press
    Route::get('admin/press', [App\Http\Controllers\Admin\PressController::class, 'view']);
    Route::get('admin/add-press', [App\Http\Controllers\Admin\PressController::class, 'add']);
    Route::post('admin/savePress', [App\Http\Controllers\Admin\PressController::class, 'save']);
    Route::get('admin/edit-press/{id?}', [App\Http\Controllers\Admin\PressController::class, 'edit']);
    Route::post('admin/updatePress', [App\Http\Controllers\Admin\PressController::class, 'update']);
    Route::get('admin/delete-press/{id?}', [App\Http\Controllers\Admin\PressController::class, 'delete']);

    // Placement
    Route::get('admin/placement', [App\Http\Controllers\Admin\PlacementController::class, 'view']);
    Route::get('admin/add-placement', [App\Http\Controllers\Admin\PlacementController::class, 'add']);
    Route::post('admin/savePlacement', [App\Http\Controllers\Admin\PlacementController::class, 'save']);
    Route::get('admin/edit-placement/{id?}', [App\Http\Controllers\Admin\PlacementController::class, 'edit']);
    Route::pattern('id_hash', '[a-f0-9]{32}[a-zA-Z]?');
    Route::bind('id_hash', function ($v) {return preg_replace('/[a-zA-Z]$/', '', $v);});
    Route::post('admin/updatePlacement', [App\Http\Controllers\Admin\PlacementController::class, 'update']);
    Route::get('admin/delete-placement/{id?}', [App\Http\Controllers\Admin\PlacementController::class, 'delete']);

    // Faq
    Route::get('admin/faq', [App\Http\Controllers\Admin\FaqController::class, 'view']);
    Route::get('admin/add-faq', [App\Http\Controllers\Admin\FaqController::class, 'add']);
    Route::post('admin/saveFaq', [App\Http\Controllers\Admin\FaqController::class, 'save']);
    Route::get('admin/edit-faq/{id?}', [App\Http\Controllers\Admin\FaqController::class, 'edit']);
    Route::post('admin/updateFaq', [App\Http\Controllers\Admin\FaqController::class, 'update']);
    Route::get('admin/delete-faq/{id?}', [App\Http\Controllers\Admin\FaqController::class, 'delete']);

    Route::get('admin/faq_up/{count?}/{id?}', [App\Http\Controllers\Admin\FaqController::class, 'faq_up']);


    // Opening
    Route::get('admin/opening', [App\Http\Controllers\Admin\OpeningController::class, 'view']);
    Route::get('admin/add-opening', [App\Http\Controllers\Admin\OpeningController::class, 'add']);
    Route::post('admin/saveOpening', [App\Http\Controllers\Admin\OpeningController::class, 'save']);
    Route::get('admin/edit-opening/{id?}', [App\Http\Controllers\Admin\OpeningController::class, 'edit']);
    Route::post('admin/updateOpening', [App\Http\Controllers\Admin\OpeningController::class, 'update']);
    Route::get('admin/delete-opening/{id?}', [App\Http\Controllers\Admin\OpeningController::class, 'delete']);
    
     Route::get('admin/studentopening', [App\Http\Controllers\Admin\OpeningController::class, 'student_view']);
     Route::get('admin/add-student-opening', [App\Http\Controllers\Admin\OpeningController::class, 'add_student']);
     Route::post('admin/saveStudentOpening', [App\Http\Controllers\Admin\OpeningController::class, 'saveStudentOpening']);
     Route::get('admin/edit-student-opening/{id?}', [App\Http\Controllers\Admin\OpeningController::class, 'edit_student_opening']);
     Route::get('admin/delete-student-opening/{id?}', [App\Http\Controllers\Admin\OpeningController::class, 'delete_student_opening']);
     
     
    // Reviews Category
    Route::get('admin/review-category', [App\Http\Controllers\Admin\ReviewCategoryController::class, 'category'])->name('review.category');
    Route::get('admin/add-review-category', [App\Http\Controllers\Admin\ReviewCategoryController::class, 'add_category'])->name('review.add_category');
    Route::post('admin/saveReviewCategory', [App\Http\Controllers\Admin\ReviewCategoryController::class, 'saveCategory'])->name('review.saveCategory');
    Route::get('admin/edit-review-category/{id?}', [App\Http\Controllers\Admin\ReviewCategoryController::class, 'editCategory'])->name('editCategory');
    Route::post('admin/updateReviewCategory', [App\Http\Controllers\Admin\ReviewCategoryController::class, 'updateCategory'])->name('updateCategory');
    Route::get('admin/delete-review-category/{id?}', [App\Http\Controllers\Admin\ReviewCategoryController::class, 'deleteCategory'])->name('deleteCategory');
    Route::get('admin/del_review_category', [App\Http\Controllers\Admin\ReviewCategoryController::class, 'del_category'])->name('del_category');
    Route::get('admin/restore-review-category/{id?}', [App\Http\Controllers\Admin\ReviewCategoryController::class, 'restoreCategory'])->name('restoreCategory');

    // Reviews
    Route::get('admin/reviews', [App\Http\Controllers\Admin\ReviewsController::class, 'view']);
    Route::get('admin/add-reviews', [App\Http\Controllers\Admin\ReviewsController::class, 'add']);
    Route::post('admin/saveReviews', [App\Http\Controllers\Admin\ReviewsController::class, 'save']);
    Route::get('admin/edit-reviews/{id?}', [App\Http\Controllers\Admin\ReviewsController::class, 'edit']);
    Route::post('admin/updateReviews', [App\Http\Controllers\Admin\ReviewsController::class, 'update']);
    Route::get('admin/delete-reviews/{id?}', [App\Http\Controllers\Admin\ReviewsController::class, 'delete']);

    // Events
    Route::get('admin/events', [App\Http\Controllers\Admin\EventsController::class, 'view']);
    Route::get('admin/add-events', [App\Http\Controllers\Admin\EventsController::class, 'add']);
    Route::post('admin/saveEvents', [App\Http\Controllers\Admin\EventsController::class, 'save']);
    Route::get('admin/edit-events/{id?}', [App\Http\Controllers\Admin\EventsController::class, 'edit']);
    Route::post('admin/updateEvents', [App\Http\Controllers\Admin\EventsController::class, 'update']);
    Route::get('admin/delete-events/{id?}', [App\Http\Controllers\Admin\EventsController::class, 'delete']);

    // Brochure
    Route::get('admin/brochure', [App\Http\Controllers\Admin\BrochureController::class, 'view']);
    Route::get('admin/add-brochure', [App\Http\Controllers\Admin\BrochureController::class, 'add']);
    Route::post('admin/saveBrochure', [App\Http\Controllers\Admin\BrochureController::class, 'save']);
    Route::get('admin/edit-brochure/{id?}', [App\Http\Controllers\Admin\BrochureController::class, 'edit']);
    Route::post('admin/updateBrochure', [App\Http\Controllers\Admin\BrochureController::class, 'update']);
    Route::get('admin/delete-brochure/{id?}', [App\Http\Controllers\Admin\BrochureController::class, 'delete']);
     Route::post('admin/updateBulkBrochure', [App\Http\Controllers\Admin\BrochureController::class, 'updateBulkBrochure'])->name('updateBulkBrochure');
      Route::get('admin/location', [App\Http\Controllers\Admin\BrochureController::class, 'viewLocation']);
      Route::post('admin/savelocation', [App\Http\Controllers\Admin\BrochureController::class, 'savelocation'])->name('savelocation');
      Route::get('admin/remove-location/{id}', [App\Http\Controllers\Admin\BrochureController::class, 'removeLocation'])->name('removelocation');
         Route::get('admin/edit-location/{id}', [App\Http\Controllers\Admin\BrochureController::class, 'editLocation'])->name('editlocation');
          Route::post('admin/resetbatch', [App\Http\Controllers\Admin\BrochureController::class, 'resetBatch'])->name('resetbatch');
           Route::post('admin/removebatch', [App\Http\Controllers\Admin\BrochureController::class, 'removebatch'])->name('removebatch');
          
});





Route::get('ajax/checkEmail', [App\Http\Controllers\HomeController::class, 'ajax_check_email']);
Route::get('ajax/verifyOtp', [App\Http\Controllers\HomeController::class, 'ajax_verify_email']);

Route::get('{any?}', [App\Http\Controllers\CoursesController::class, 'category'])->name('categorynew');