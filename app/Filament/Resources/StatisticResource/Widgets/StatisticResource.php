<?php

namespace App\Filament\Resources\StatisticResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatisticResource extends BaseWidget
{
    /**
     * Demo Data
     */
    public function getVal()
    {
        return rand(14, 344);
    }
    public function getChart()
    {
        return [rand(0, 20),rand(0, 20),rand(0, 20),rand(0, 20),rand(0, 20)];
    }

    protected function getCards(): array
    {
        return [
            Card::make("Total Visits",$this->getVal())
            ->chart($this->getChart())
            ->color('success')
            ->url('/admin/posts'),

            Card::make("Total Visits",$this->getVal())
            ->chart($this->getChart())
            ->color('danger')
            ->url('/admin/posts'),

            Card::make("Total Visits",$this->getVal())
            ->chart($this->getChart())
            ->color('warning')
            ->url('/admin/posts'),
        ];
    }
}
