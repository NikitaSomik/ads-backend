<?php

declare(strict_types=1);

namespace Modules\Ad\Services;

use Illuminate\Database\Eloquent\Collection;
use Modules\Ad\Models\Ad;

final class AdStatisticsService implements AdStatisticsServiceInterface
{
    public function getTotalStatistics(): array
    {
        $totalStatistics = Ad::query()
            ->selectRaw('SUM(impressions) as total_impressions, SUM(clicks) as total_clicks')
            ->first();

        return [
            'total_impressions' => (int) ($totalStatistics->total_impressions ?? 0),
            'total_clicks' => (int) ($totalStatistics->total_clicks ?? 0),
        ];
    }

    public function getDailyStatistics(): Collection
    {
        return Ad::query()
            ->selectRaw('DATE(created_at) as date, SUM(impressions) as total_impressions, SUM(clicks) as total_clicks')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();
    }
}
