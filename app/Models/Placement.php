<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Placement extends Model
{
    protected $table = 'tbl_placement';

    public function __construct(){
        parent::__construct();
        $this->setFillable();
    }

    public function setFillable(){
        $this->fillable = [
            'id',
            'image',
            'name',
            'course_name',
            'type',
            'student_to',
            'student_from',
            'id_hash',
            'content',
            'is_deleted',
            'created_at',
            'updated_at'
        ];
    }

   

    
}
