<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Absensi;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiExport;
use Filament\Tables\Actions\Action;
use App\Filament\Resources\LaporanKehadiranResource\Pages;
use Illuminate\Database\Eloquent\Builder;

class LaporanKehadiranResource extends Resource
{
    protected static ?string $model = Absensi::class;
    protected static ?string $navigationGroup = 'Laporan';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('murid.name')->label('Nama Murid')->sortable(),
                TextColumn::make('murid.kelas')->label('Kelas')->sortable(),
                TextColumn::make('tanggal')->label('Tanggal')->date(),
                TextColumn::make('status')->label('Status')->sortable(),
            ])
            ->filters([
                Filter::make('tanggal')
                    ->label('Filter Tanggal')
                    ->form([DatePicker::make('tanggal')])
                    ->query(fn(Builder $query, $data) => $query->when($data['tanggal'], fn($query) => $query->whereDate('tanggal', $data['tanggal']))),

                SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'Hadir' => 'Hadir',
                        'Sakit' => 'Sakit',
                        'Izin' => 'Izin',
                        'Alfa' => 'Alfa',
                    ])
                    ->query(fn(Builder $query, $data) => $query->when($data['status'], fn($query) => $query->where('status', $data['status']))),

                SelectFilter::make('murid.kelas')
                    ->label('Filter Kelas')
                    ->options([
                        '10 IPA' => '10 IPA',
                        '10 IPS' => '10 IPS',
                        '11 IPA' => '11 IPA',
                        '11 IPS' => '11 IPS',
                        '12 IPA' => '12 IPA',
                        '12 IPS' => '12 IPS',
                    ])
                    ->query(fn(Builder $query, $data) => $query->when($data['murid.kelas'], fn($query) => $query->whereHas('murid', fn($q) => $q->where('kelas', $data['murid.kelas'])))),
            ])
            ->actions([
                Action::make('export')
                    ->label('Export Excel')
                    ->button()
                    ->action(function ($data) {
                        return Excel::download(new AbsensiExport($data), 'laporan-absensi.xlsx');
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporanKehadirans::route('/'),
        ];
    }
}