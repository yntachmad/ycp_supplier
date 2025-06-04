<?php

namespace App\Models;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vendor extends Model
{
    use SoftDeletes;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $user = Auth::user();
            $model->created_by = $user->id;
            $model->updated_by = $user->id;
        });
        static::updating(function ($model) {
            $user = Auth::user();
            $model->updated_by = $user->id;
        });
    }

    protected $guarded = [];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function classification(): BelongsTo
    {
        return $this->belongsTo(Classification::class);
    }
    public function Subclassification(): BelongsTo
    {
        return $this->belongsTo(SubClassification::class);
    }

    public function TypeCompany(): BelongsTo
    {
        return $this->BelongsTo(CompanyType::class);

    }
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }

    protected $casts = [
        'legal_document' => 'array',
        'type_company_id' => 'array',
        'tax_register' => 'boolean',
        'Terms_condition' => 'boolean',
    ];
}
