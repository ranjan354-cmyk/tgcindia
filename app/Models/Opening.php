<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opening extends Model
{
    protected $table = 'tbl_opening';

    public function __construct(){
        parent::__construct();
        $this->setFillable();
    }

    public function setFillable(){
        $this->fillable = [
            'id',
            'name',
            'slug',
            'id_hash',
            'position',
            'location',
            'is_deleted',
            'created_at',
            'updated_at'
        ];
    }

   

    
}
