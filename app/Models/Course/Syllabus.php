<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Syllabus extends Model
{
    protected $table = 'tbl_course_syllabus';

    public function __construct(){
        parent::__construct();
        $this->setFillable();
    }

    public function setFillable(){
        $this->fillable = [
            'id', 'course_id', 'name', 'parent', 'type', 'orders_by', 'created_at', 'updated_at'
        ];
    }

   

    
}
