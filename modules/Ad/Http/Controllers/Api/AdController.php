<?php

declare(strict_types=1);

namespace Modules\Ad\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Ad\Models\Ad;
use Modules\Ad\Resources\AdResource;
use Modules\Ad\Resources\AdStatisticResource;
use Modules\Ad\Services\AdStatisticsServiceInterface;
use Modules\Shared\Responses\Api\ApiSuccessResponse;

class AdController extends Controller
{
    /**
     * Get all ads.
     */
    public function index(): ApiSuccessResponse
    {
        $ads = Ad::query()->get();

        return new ApiSuccessResponse(
            data: AdResource::collection($ads),
            metaData: ['message' => 'Ads list was successfully fetched.']
        );
    }

    /**
     * Get ads statistics.
     */
    public function statistics(AdStatisticsServiceInterface $adStatisticsService): ApiSuccessResponse
    {
        $responseData = [
            ...$adStatisticsService->getTotalStatistics(),
            'daily_statistics' => AdStatisticResource::collection($adStatisticsService->getDailyStatistics()),
        ];

        return new ApiSuccessResponse(
            data: $responseData,
            metaData: ['message' => 'Ads statistics list was successfully fetched.']
        );
    }
}
