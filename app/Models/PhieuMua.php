<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuMua extends Model
{
    public $timestamps = false;
    protected $table = 'phieumua';
    protected $fillable = ['IDPM', 'HoTen','DiaChi','SDT','email','TrangThai'];
    protected $keyType = 'string';
    public function getKeyName()
    {
        return 'IDPM';
    }
}
