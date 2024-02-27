<?php

namespace App\Models;

use CodeIgniter\Model;

class DayitvaModel extends Model
{
    protected $table = 'dayitva';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];



}
