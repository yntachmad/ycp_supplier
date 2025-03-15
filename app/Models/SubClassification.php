<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubClassification extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function classification(): BelongsTo
    {
        return $this->belongsTo(Classification::class);
    }
}
