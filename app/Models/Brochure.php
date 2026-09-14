<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brochure extends Model
{
    protected $table = 'tbl_brochure';

    public function __construct(){
        parent::__construct();
        $this->setFillable();
    }

    public function setFillable(){
        $this->fillable = [
            'id',
            'name',
            'id_hash',
            'image',
            'pdf',
            'content',
            'is_deleted',
            'created_at',
            'updated_at'
        ];
    }

   

    
}
