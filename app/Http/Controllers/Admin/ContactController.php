<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactController extends Controller {
    public function index() {}

    // === Category management --------
    public function view(Request $request) {
        $data['menu'] = "contact";
        $data['sub_menu'] = "";

        $keyword = $request->input('keyword');
        $data['keyword'] = $keyword;
        $r_page = $request->input('r_page', 25); // Default value set to 25 if not provided
        $data['r_page'] = $r_page;

        $query = Contact::where('is_deleted', '0');

        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        $page = $query->latest()->paginate($r_page);
        $page->appends(['keyword' => $keyword, 'r_page' => $r_page]);

        return view('backend.contact.all', compact('data', 'page'))->with('i', (request()->input('page', 1) - 1) * $r_page);
    }

    public function add() {
        $data['menu'] = "contact";
        $data['sub_menu'] = "";

        return view('backend.contact.add', compact("data"));
    }

    public function save(Request $request) {
        $request->validate([
            'phone_number' => 'required',
        ]);

        $contact = new Contact;
        $contact->phone_number = $request->phone_number;
        $contact->email = $request->email;
        $contact->whatsapp_num = $request->whatsapp_num;
         $contact->course_page_number = $request->course_page_number;
         $contact->offer = $request->offer;
        $contact->is_deleted = "0";
        $contact->id_hash = Str::random(32); // Generate a unique ID hash

        $contact->save();

        $insertedId = $contact->id;

        // Update the hash with a more meaningful hash after inserting
        $contact->id_hash = md5($insertedId);
        $contact->save();

        return redirect()->back()->with('success', 'Contact has been saved successfully.'); 
    }

    // Helper method to ensure unique slug
    public function check_unique1($key, $value, $id = null) {
        $query = Contact::where($key, $value);

        if ($id) {
            $query->where('id', '<>', $id); // Exclude the current record's ID
        }

        $check = $query->first();

        if (!empty($check->id)) {
            $value1 = $value . "-1";
            return $this->check_unique1($key, $value1, $id);
        } else {
            return $value; 
        }
    }

    public function edit($id_hash) {
        $data['menu'] = "contact";
        $data['sub_menu'] = "";

        $page = Contact::where('id_hash', $id_hash)->first();
        return view('backend.contact.edit', compact("data", "page"));
    }

   public function update(Request $request) {
    //   dd($request);
    $request->validate([
        'phone_number' => 'required',
    ]);

    // Generate slug
    $url_title = !empty($request->slug) ? Str::slug($request->slug) : Str::slug($request->name);
    $uniqSlug = $this->check_unique1('slug', $url_title, $request->id);

    // Fetch the contact by ID
    $contact = Contact::find($request->id);

    if (!$contact) {
        return redirect()->back()->with('error', 'Contact not found.');
    }

    // Update contact details
    $contact->phone_number = $request->phone_number;
    $contact->email = $request->email;
    $contact->whatsapp_num = $request->whatsapp_num;
    $contact->course_page_number = $request->course_page_number;
    $contact->offer = $request->offer;
    $contact->day = $request->day;
    $contact->hour = $request->hour;
    $contact->min = $request->min;
    $contact->sec = $request->sec;
    $contact->slug = $uniqSlug;
     if($request->file('image')){
      $file= $request->file('image');
      $filename= date('YmdHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      if(!empty($filename)){
        $contact->image = $filename;
      } else {
        $contact->image = $request->old_image;
      }
      
    }

    $contact->save();

    return redirect()->back()->with('success', 'Contact has been updated successfully.');
}

}
