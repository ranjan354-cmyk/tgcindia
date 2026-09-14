<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TorMorten\Eventy\Facades\Eventy;

class Admin extends Model
{
    protected $table = 'tbl_admin';

    public function __construct(){
        parent::__construct();
        $this->setFillable();
    }

    public function setFillable(){
        $this->fillable = Eventy::filter('tbl_admin_fillable', [
            'id', 'id_hash', 'name', 'email', 'user_id','user_pass','add_date', 'update_date', 'status'
        ]);
    }

   

    
}
