<?php

namespace App\Models\SKM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SKMUnsur extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skm_unsur';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unsur'
    ];

    /**
     * Get the pertanyaan for the unsur.
     */
    public function layanan(): HasMany {
        return $this->hasMany(SKMPertanyaan::class, 'skm_unsur_id');
    }
}
