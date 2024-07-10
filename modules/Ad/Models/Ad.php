<?php

declare(strict_types=1);

namespace Modules\Ad\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Ad\Database\Factories\AdFactory;

class Ad extends Model
{
    use HasFactory;

    protected static function newFactory(): AdFactory|Factory
    {
        return new AdFactory();
    }
}
