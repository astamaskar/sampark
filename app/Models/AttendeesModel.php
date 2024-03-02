<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendeesModel extends Model
{
    protected $table = 'attendees';
    protected $primaryKey = 'id';
    protected $allowedFields = ['karyakarta_id', 'nagar_id', 'basti_id', 'dayitva_id'];

    public function byBasti($bastiId)
    {
        return $this->where('basti_id', $bastiId)->findAll();
    }

    public function byDayitva($dayitvaId)
    {
        return $this->where('dayitva_id', $dayitvaId)->findAll();
    }

    public function byNagar($nagarId)
    {
        return $this->where('nagar_id', $nagarId)->findAll();
    }
}
