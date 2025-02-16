<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsensiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Absensi::with('murid')
            ->get()
            ->map(function ($absensi) {
                return [
                    'Nama Murid' => $absensi->murid->name ?? '',
                    'Kelas' => $absensi->murid->kelas ?? '',
                    'Tanggal' => $absensi->tanggal,
                    'Status' => $absensi->status,
                ];
            });
    }

    public function headings(): array
    {
        return ['Nama Murid', 'Kelas', 'Tanggal', 'Status'];
    }
}