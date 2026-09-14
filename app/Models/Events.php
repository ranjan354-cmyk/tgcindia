<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Events extends Model
{
    protected $table = 'tbl_events';

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
            'event_date',
            'event_time',
            'conduct_by',
            'is_deleted',
            'created_at',
            'updated_at'
        ];
    }

   

    
}
