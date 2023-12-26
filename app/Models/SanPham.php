<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    public $timestamps = false;
    protected $table = 'sanpham';
    protected $fillable = ['IDSP', 'TenSP','Gia','MoTa','imgSP','imgSP1','imgSP2','IDNCC','IDLSP','IDNSX'];
    protected $keyType = 'string';
    public function getKeyName()
    {
        return 'IDSP';
    }
}
