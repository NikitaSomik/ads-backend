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
            'total_impressions' => (int) $this->resource->total_impressions ?? 0,
            'total_clicks' => (int) $this->resource->total_clicks ?? 0,
        ];
    }
}
