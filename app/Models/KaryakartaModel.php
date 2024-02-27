<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryakartaModel extends Model
{
    protected $table = 'karyakarta';
    protected $primaryKey = 'id';
    protected $allowedFields = ['basti_id', 'name', 'mobile', 'dayitva_id'];
}
