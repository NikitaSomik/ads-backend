<?php

declare(strict_types=1);

namespace Modules\Ad\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdStatisticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'date' => $this->resource->date,
            'total_impressions' => $this->resource->total_impressions,
            'total_clicks' => $this->resource->total_clicks,
        ];
    }
}
