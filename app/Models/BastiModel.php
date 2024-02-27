<?php

namespace App\Models;

use CodeIgniter\Model;

class BastiModel extends Model
{
    protected $table = 'basti';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nagar_id', 'name'];


}
