<?php

namespace App\Filament\Widgets;

use App\Models\Enquiry;
use App\Models\Post;
use App\Models\Team;
use App\Models\Testimony;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Post', Post::count()),
            Stat::make('Testimonies', Testimony::count()),
            Stat::make('Our Team', Team::count()),
            Stat::make('Enquiries', Enquiry::count()),
        ];
    }
}
