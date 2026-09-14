<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    protected $table = 'tbl_course_faq';

    public function __construct(){
        parent::__construct();
        $this->setFillable();
    }

    public function setFillable(){
        $this->fillable = [
            'id', 'course_id', 'name', 'description', 'faq_for', 'created_at', 'updated_at'
        ];
    }

   

    
}
