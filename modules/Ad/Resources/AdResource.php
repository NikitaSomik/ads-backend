<?php

declare(strict_types=1);

namespace Modules\Ad\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'impressions' => $this->resource->impressions,
            'clicks' => $this->resource->clicks,
            'created_at' => $this->resource->created_at,
        ];
    }
}
