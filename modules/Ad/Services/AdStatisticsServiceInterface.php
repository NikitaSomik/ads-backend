<?php

declare(strict_types=1);

namespace Modules\Ad\Services;

use Illuminate\Support\Collection;

interface AdStatisticsServiceInterface
{
    public function getTotalStatistics(): array;

    public function getDailyStatistics(): Collection;
}
