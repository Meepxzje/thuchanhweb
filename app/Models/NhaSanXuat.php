<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
    public $timestamps = false;
    protected $table = 'nhasanxuat';
    protected $fillable = ['IDNSX', 'TenNSX','DiaChiNSX','imgNSX'];
    // protected $primaryKey = 'IDNSX';
    protected $keyType = 'string';
    public function getKeyName()
    {
        return 'IDNSX';
    }
}
