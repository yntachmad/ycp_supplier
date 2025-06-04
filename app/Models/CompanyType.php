<?php

namespace App\Models;

use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CompanyType extends Model
{
    use SoftDeletes;

    // public static function boot()
    // {
    //     parent::boot();
    //     static::creating(function ($model) {
    //         $user = Auth::user();
    //         $model->created_by = $user->id;
    //         $model->updated_by = $user->id;
    //     });
    //     static::updating(function ($model) {
    //         $user = Auth::user();
    //         $model->updated_by = $user->id;
    //     });
    // }

    protected $guarded = [];

    public function vendors(): HasMany
    {
        return $this->hasMany(Vendor::class);
    }
}
