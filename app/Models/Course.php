<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    protected $table = 'tbl_course';

    public function __construct(){
        parent::__construct();
        $this->setFillable();
    }

    public function setFillable(){
        $this->fillable = [
            'id',
            'name',
            'slug',
            'image',
            'reviews',
            'add_date',
            'no_review',
            'content',
            'course_based',
            'course_category',
            'course_type',
            'short_content',
            'video_link',
            'meta_title',
            'meta_keywords',
            'meta_description'
        ];
    }

   

    
}
