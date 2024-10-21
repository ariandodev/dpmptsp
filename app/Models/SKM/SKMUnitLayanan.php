<?php

namespace App\Models\SKM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SKMUnitLayanan extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skm_unit_layanan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'logo_url'
    ];

    /**
     * Get the layanan for the unit layanan.
     */
    public function layanan(): HasMany {
        return $this->hasMany(SKMLayanan::class, 'skm_unit_layanan_id');
    }
}
