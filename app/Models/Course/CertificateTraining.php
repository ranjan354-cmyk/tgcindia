<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CertificateTraining extends Model
{
    protected $table = 'tbl_course_certificate_training';

    public function __construct(){
        parent::__construct();
        $this->setFillable();
    }

    public function setFillable(){
        $this->fillable = [
            'id', 'course_id', 'name', 'description', 'image', 'url_name', 'url_link', 'created_at', 'updated_at'
        ];
    }

   

    
}
