<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuMua extends Model
{
    public $timestamps = false;
    protected $table = 'chitietphieumua';
    protected $fillable = ['IDCTPM', 'IDPM','IDSP','SoLuong','DonGia'];
    protected $primaryKey = 'IDCTPM';
    // protected $keyType = 'string';
    // public function getKeyName()
    // {
    //     return 'IDCTPM';
    // }
}
