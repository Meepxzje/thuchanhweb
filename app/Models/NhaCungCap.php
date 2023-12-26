<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    public $timestamps = false;
    protected $table = 'nhacungcap';
    protected $fillable = ['IDNCC', 'TenNCC'];
    protected $keyType = 'string';
    public function getKeyName()
    {
        return 'IDNCC';
    }
}
