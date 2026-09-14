<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    protected $table = 'tbl_partner';

    public function __construct(){
        parent::__construct();
        $this->setFillable();
    }

    public function setFillable(){
        $this->fillable = [
            'id',
            'image',
            'name',
            'id_hash',
            'url',
            'is_deleted',
            'created_at',
            'updated_at'
        ];
    }

   

    
}
