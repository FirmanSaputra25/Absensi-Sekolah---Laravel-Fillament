<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsensiExport implements FromCollection, WithHeadings
{
    protected $records;

    public function __construct($records)
    {
        $this->records = $records;
    }

    public function collection()
    {
        return $this->records->map(function ($absensi) {
            return [
                'Nama Murid' => $absensi->murid->name ?? '-',
                'Kelas' => $absensi->murid->kelas ?? '-',
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