<?php

declare(strict_types=1);

namespace Modules\Ad\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Ad\Models\Ad;
use Modules\Ad\Resources\AdResource;
use Modules\Ad\Resources\AdStatisticResource;
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
    public function statistics(): ApiSuccessResponse
    {
        $statistics = Ad::query()
            ->select([
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(impressions) as total_impressions'),
                DB::raw('SUM(clicks) as total_clicks'),
            ])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return new ApiSuccessResponse(
            data: AdStatisticResource::collection($statistics),
            metaData: ['message' => 'Ads statistics list was successfully fetched.']
        );
    }
}
