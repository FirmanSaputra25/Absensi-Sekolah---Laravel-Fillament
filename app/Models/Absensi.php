<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    protected $fillable = ['murid_id', 'tanggal', 'status', 'kelas'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function murid()
    {
        return $this->belongsTo(Murid::class, 'murid_id');
    }
    public function collection()
    {
        return Absensi::select('id', 'murid_id', 'tanggal', 'status')->get();
    }
    public function headings(): array
    {
        return ['ID', 'Nama Murid', 'Tanggal', 'Status'];
    }
}