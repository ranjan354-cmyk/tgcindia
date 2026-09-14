<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reviews extends Model
{
    protected $table = 'tbl_reviews';

    public function __construct(){
        parent::__construct();
        $this->setFillable();
    }

    public function setFillable(){
        $this->fillable = [
            'id',
            'image',
            'name',
            'slug',
            'heading',
            'added_on',
            'no_reviews',
            'content',
            'type',
            'id_hash',
            'is_deleted',
            'created_at',
            'updated_at'
        ];
    }

   

    
}
