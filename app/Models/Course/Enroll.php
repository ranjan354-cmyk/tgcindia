<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enroll extends Model
{
    protected $table = 'tbl_course_enroll';

    public function __construct(){
        parent::__construct();
        $this->setFillable();
    }

    public function setFillable(){
        $this->fillable = [
            'id', 'course_id', 'name', 'description', 'image', 'created_at', 'updated_at'
        ];
    }

   

    
}
