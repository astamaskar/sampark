<?php

namespace App\Models;

use CodeIgniter\Model;

class NagarModel extends Model
{
    protected $table = 'nagar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];



}
