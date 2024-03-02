<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryakartaModel extends Model
{
    protected $table = 'karyakarta';
    protected $primaryKey = 'id';
    protected $allowedFields = ['basti_id', 'name', 'mobile', 'dayitva_id'];

    public function byBasti($bastiId)
    {
        return $this->where('basti_id', $bastiId)->findAll();
    }

    public function byDayitva($dayitvaId)
    {
        return $this->where('dayitva_id', $dayitvaId)->findAll();
    }
}
