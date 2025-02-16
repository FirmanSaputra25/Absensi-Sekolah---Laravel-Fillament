<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AbsensiResource\Pages;
use App\Models\Absensi;
use App\Models\Murid;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Get;

class AbsensiResource extends Resource
{
    protected static ?string $model = Absensi::class;
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Select::make('murid_id')
                    ->label('Nama Murid')
                    ->relationship('murid', 'name')
                    ->required()
                    ->reactive() // Agar kelas otomatis berubah saat murid dipilih
                    ->afterStateUpdated(
                        fn(Get $get, callable $set) =>
                        $set('kelas', Murid::find($get('murid_id'))?->kelas)
                    ),
                DatePicker::make('tanggal') // Tambahkan ini
                    ->label('Tanggal')
                    ->required()
                    ->default(now()->toDateString()), // Set default tanggal ke hari ini
                Select::make('kelas')
                    ->label('Kelas')
                    ->options(Murid::pluck('kelas', 'kelas')->unique()->toArray()) // Ambil daftar kelas unik dari murid
                    ->disabled() // Tidak bisa diubah manual
                    ->required(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'Hadir' => 'Hadir',
                        'Sakit' => 'Sakit',
                        'Izin' => 'Izin',
                        'Alfa' => 'Alfa',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('murid.name')->label('Nama Murid')->sortable()->searchable(),
                TextColumn::make('murid.kelas')->label('Kelas')->sortable()->searchable(),
                TextColumn::make('tanggal')->label('Tanggal')->date(),
                TextColumn::make('status')->label('Status')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kelas')
                    ->label('Filter Kelas')
                    ->relationship('murid', 'kelas')
                    ->options([
                        '10 IPA' => '10 IPA',
                        '10 IPS' => '10 IPS',
                        '11 IPA' => '11 IPA',
                        '11 IPS' => '11 IPS',
                        '12 IPA' => '12 IPA',
                        '12 IPS' => '12 IPS',
                    ]),

                Tables\Filters\SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'Hadir' => 'Hadir',
                        'Sakit' => 'Sakit',
                        'Izin' => 'Izin',
                        'Alfa' => 'Alfa',
                    ]),

                Tables\Filters\TernaryFilter::make('tanggal')
                    ->label('Filter Hari Ini')
                    ->trueLabel('Hari Ini')
                    ->falseLabel('Semua')
                    ->queries(
                        true: fn($query) => $query->whereDate('tanggal', now()->toDateString()),
                        false: fn($query) => $query
                    ),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make(),
            ]);
    }


    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbsensis::route('/'),
            'create' => Pages\CreateAbsensi::route('/create'),
            'edit' => Pages\EditAbsensi::route('/{record}/edit'),
        ];
    }
}