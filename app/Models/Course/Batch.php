<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Batch extends Model
{
    protected $table = 'tbl_course_batches';

    public function __construct(){
        parent::__construct();
        $this->setFillable();
    }

    public function setFillable(){
        $this->fillable = [
            'id', 'course_id', 'name', 'type', 'batch_type', 'fast_filling', 'start_date', 'batch_fee', 'created_at', 'updated_at'
        ];
    }

   

    
}
