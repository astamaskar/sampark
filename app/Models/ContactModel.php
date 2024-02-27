<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['mohalla_id', 'name', 'mobile', 'email', 'house_no', 'colony', 'street', 'area', 'city', 'state', 'pin'];

    public function mohalla()
    {
        return $this->belongsTo(MohallaModel::class);
    }
}
