<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Absensi;

class DashboardOverview extends Page
{
    protected static ?string $navigationGroup = 'Laporan';
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static string $view = 'filament.pages.dashboard-overview';

    public $chartData = [];

    public function mount()
    {
        $this->chartData = $this->getChartData();
    }

    private function getChartData()
    {
        return Absensi::query()
            ->selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();
    }
}