<?php

namespace App\Models;

use CodeIgniter\Model;

class MohallaModel extends Model
{
    protected $table = 'mohalla';
    protected $primaryKey = 'id';
    protected $allowedFields = ['basti_id', 'name'];

    public function basti()
    {
        return $this->belongsTo(BastiModel::class);
    }

    public function contacts()
    {
        return $this->hasMany(ContactModel::class);
    }
}
