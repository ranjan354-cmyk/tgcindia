<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Coupon;
use App\Models\Upload_pre;
use App\Models\PrescriptionMedician;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller{
  public function index(){
    $this->orders();
  }

  // === Order management --------
  public function orders(Request $request){

    $data['menu'] = "sale";
    $data['sub_menu'] = "order";

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
        $orders = Orders::where('order_id', 'like', '%'.$keyword.'%')
        ->orwhere('name', 'like', '%'.$keyword.'%')
        ->orwhere('phone', 'like', '%'.$keyword.'%')
        ->orwhere('email', 'like', '%'.$keyword.'%')
        ->orwhere('address', 'like', '%'.$keyword.'%')
        ->orwhere('city', 'like', '%'.$keyword.'%')
        ->orwhere('state', 'like', '%'.$keyword.'%')
        ->latest()
        ->paginate($r_page);
        $orders->appends(['keyword' => $keyword]);
        $orders->appends(['r_page' => $r_page]);
    } else {
        $orders = Orders::latest()->paginate($r_page);
        $orders->appends(['r_page' => $r_page]);
    }

    return view('backend.sales.order',compact('data', 'orders'))->with('i', (request()->input('page', 1) - 1) * $r_page);
  }

  public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);
    
        $category = Orders::find($id);
    
        if (!$category) {
            return back()->with('error', 'status not found.');
        }
    
        $category->status = $request->status;
        $category->remarks = $request->remarks;
        $updated = $category->save();
    
        if ($updated) {
            return back()->with('success', 'updated successfully.');
        } else {
            return back()->with('error', 'Updation failed.');
        }
    }

    public function update_prescription(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);
    
        $category = Upload_pre::find($id);
    
        if (!$category) {
            return back()->with('error', 'status not found.');
        }
    
        $category->status = $request->status;
        $category->remarks = $request->remarks;
        $updated = $category->save();
    
        if ($updated) {
            return back()->with('success', 'updated successfully.');
        } else {
            return back()->with('error', 'Updation failed.');
        }
    }


    public function return(Request $request){

      $data['menu'] = "sale";
      $data['sub_menu'] = "return";
  
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
          $orders = Orders::where('order_id', 'like', '%'.$keyword.'%')
          ->orwhere('name', 'like', '%'.$keyword.'%')
          ->orwhere('phone', 'like', '%'.$keyword.'%')
          ->orwhere('email', 'like', '%'.$keyword.'%')
          ->orwhere('address', 'like', '%'.$keyword.'%')
          ->orwhere('city', 'like', '%'.$keyword.'%')
          ->orwhere('state', 'like', '%'.$keyword.'%')
          ->latest()
          ->where('status', 5)
          ->paginate($r_page);
          $orders->appends(['keyword' => $keyword]);
          $orders->appends(['r_page' => $r_page]);
      } else {
          $orders = Orders::latest()->where('status', 5)->paginate($r_page);
          $orders->appends(['r_page' => $r_page]);
      }
  
      return view('backend.sales.order',compact('data', 'orders'))->with('i', (request()->input('page', 1) - 1) * $r_page);
    }

  // === Coupon management --------
  public function coupons(Request $request){

    $data['menu'] = "sale";
    $data['sub_menu'] = "coupon";

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
        $categories = Coupon::where('name', 'like', '%'.$keyword.'%')
        ->WHERE('is_deleted', '0')
        ->latest()
        ->paginate($r_page);
        $categories->appends(['keyword' => $keyword]);
        $categories->appends(['r_page' => $r_page]);
    } else {
        $categories = Coupon::latest()->WHERE('is_deleted', '0')->paginate($r_page);
        $categories->appends(['r_page' => $r_page]);
    }

    return view('backend.coupon.view',compact('data', 'categories'))->with('i', (request()->input('page', 1) - 1) * $r_page);
  }

  public function add_coupon(){
    $data['menu'] = "sale";
    $data['sub_menu'] = "coupon";
    return view('backend.coupon.add', compact("data"));
  }

  public function saveCoupon(Request $request){
    $request->validate([
        'name' => 'required',
    ]);

    $coupon = new Coupon;
    $coupon->name = $request->name;
    $coupon->start_date = $request->start_date;
    $coupon->end_date = $request->end_date;
    $coupon->coupon_type = $request->coupon_type;
    $coupon->amount = $request->amount;
    $coupon->is_deleted = "0";
    $coupon->save();

    return redirect()->back()->with('success', 'Coupon has been Save successfully.'); 
  }

  public function editCoupon($id_hash){
      $data['menu'] = "sale";
      $data['sub_menu'] = "coupon";

      $category = Coupon::where('id', $id_hash)->first();
      return view('backend.coupon.edit', compact("data", "category"));
  }

  public function updateCoupon(Request $request){
    $request->validate([
        'name' => 'required',
    ]);
    
    $coupon = new Coupon;
    $coupon = Coupon::find($request->id);
    $coupon->name = $request->name;
    $coupon->start_date = $request->start_date;
    $coupon->end_date = $request->end_date;
    $coupon->coupon_type = $request->coupon_type;
    $coupon->amount = $request->amount;
    $coupon->save();

    return redirect()->back()->with('success', 'Coupon has been Updated successfully.');
  }

  
  public function deleteCoupon($id){
    $coupon = Coupon::find($id);
    $coupon->delete();
    return redirect()->back()->with('success', 'Coupon has been Deleted successfully.');
  }


  // Prescription Management ---------
  public function prescription(Request $request){

    $data['menu'] = "sale";
    $data['sub_menu'] = "prescription";

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
        $categories = Upload_pre::where('name', 'like', '%'.$keyword.'%')
        ->latest()
        ->paginate($r_page);
        $categories->appends(['keyword' => $keyword]);
        $categories->appends(['r_page' => $r_page]);
    } else {
        $categories = Upload_pre::latest()->paginate($r_page);
        $categories->appends(['r_page' => $r_page]);
    }

    return view('backend.prescription.view',compact('data', 'categories'))->with('i', (request()->input('page', 1) - 1) * $r_page);
  }

  public function savePrescription(Request $request){
    $request->validate([
      'name' => 'required',
      'phone' => 'required',
      'email' => 'required'
  ]);

  // Check User With Phone No...
  $user = DB::table('tbl_user_end')->where('phone', $request->phone)->count();
  
  if($user > 0 ){
      
  } else {
    DB::table('tbl_user_end')->insert(
      [
        'name' => $request->name, 
        'email' => $request->email, 
        'phone' => $request->phone, 
        'password' => md5(123), 
        'dob' => "",
        'blood_group' => "",
        'gender' => "", 
        'status' => 'Active'
      ]
    );
  }
  

  $userId = DB::table('tbl_user_end')->where('phone', $request->phone)->first();
  $userIds = $userId->id;

  $coupon = new Upload_pre;
  $coupon->name = $request->name;
  $coupon->email = $request->email;
  $coupon->phone = $request->phone;
  $coupon->address = $request->address;
  $coupon->pincode = $request->pincode;
  $coupon->landmark = $request->landmark;
  $coupon->city = $request->city;
  $coupon->state = $request->state;
  $coupon->user_id = $userIds;
  $coupon->image = "default.jpg";
  $coupon->save();

  return redirect()->back()->with('success', 'Prescription has been Save successfully.'); 
  }

  public function editPrescription($id, Request $request){
    $data['menu'] = "sale";
    $data['sub_menu'] = "prescription";
    $data['pres_id'] = $id;

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
        $datas = PrescriptionMedician::where('name', 'like', '%'.$keyword.'%')
        ->WHERE('pres_id', $id)
        ->latest()
        ->where('is_deleted', 0)
        ->paginate($r_page);
        $datas->appends(['keyword' => $keyword]);
        $datas->appends(['r_page' => $r_page]);
    } else {
        $datas = PrescriptionMedician::latest()->WHERE('pres_id', $id)->where('is_deleted', 0)->paginate($r_page);
        $datas->appends(['r_page' => $r_page]);
    }

    $category = Upload_pre::where('id', $id)->first();
    return view('backend.prescription.medicain', compact('data', 'datas'))->with('i', (request()->input('page', 1) - 1) * $r_page);
  }


  public function saveMedician(Request $request){
    $request->validate([
        'name' => 'required',
    ]);

    $size = new PrescriptionMedician;
    $size->name = $request->name;
    $size->status = $request->status;
    $size->pres_id = $request->pres_id;
    $size->description = $request->description;
    $size->is_deleted = 0;
    $size->save();

    return redirect()->back()->with('success', 'Medician has been Save successfully.'); 
  }

  public function editMedician($id){
    $data['menu'] = "sale";
    $data['sub_menu'] = "prescription";

    $salt = PrescriptionMedician::where('id', $id)->first();
    return view('backend.prescription.edit_medician', compact("data", "salt"));
  }

  public function updateMedician(Request $request){
    $request->validate([
        'name' => 'required',
    ]);

    $size = new PrescriptionMedician;
    $size = PrescriptionMedician::find($request->id);
    $size->name = $request->name;
    $size->description = $request->description;
    $size->status = $request->status;
    $size->save();

    return redirect()->back()->with('success', 'Medician has been Updated successfully.');
  }

  public function deleteMedician($id){
    $size = new PrescriptionMedician;
    $size = PrescriptionMedician::find($id);
    $size->is_deleted = 1;
    $size->save();
    return redirect()->back()->with('success', 'Medician has been Deleted successfully.');
  }

  public function del_medician(Request $request){

    $data['menu'] = "sale";
    $data['sub_menu'] = "prescription";

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
        $datas = PrescriptionMedician::where('name', 'like', '%'.$keyword.'%')
        ->latest()
        ->where('is_deleted', 1)
        ->paginate($r_page);
        $datas->appends(['keyword' => $keyword]);
        $datas->appends(['r_page' => $r_page]);
    } else {
        $datas = PrescriptionMedician::latest()->where('is_deleted', 1)->paginate($r_page);
        $datas->appends(['r_page' => $r_page]);
    }

    return view('backend.prescription.del_medician',compact('data', 'datas'))->with('i', (request()->input('page', 1) - 1) * $r_page);
  }

  public function restoreMedician($id){
    $size = new PrescriptionMedician;
    $size = PrescriptionMedician::find($id);
    $size->is_deleted = 0;
    $size->save();
    return redirect()->back()->with('success', 'Medician has been Restore successfully.');
  }


  public function add_prescription(){
    $data['menu'] = "sale";
    $data['sub_menu'] = "prescription";
    return view('backend.prescription.add', compact("data"));
  }
  
}
