<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'kelas', 'is_active']; // Tambahkan ini
    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'murid_id');
    }
}