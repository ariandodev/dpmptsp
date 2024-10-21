<?php

namespace App\Models\SKM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SKMLayanan extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skm_layanan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'skm_unit_layanan_id'
    ];

    /**
     * Get the unit layanan that owns the layanan.
     */
    public function unitLayanan(): BelongsTo {
        return $this->belongsTo(SKMUnitLayanan::class, 'skm_unit_layanan_id');
    }
}
