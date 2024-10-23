<?php

namespace App\Models\SKM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SKMPertanyaan extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skm_pertanyaan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pertanyaan',
        'skm_unsur_id'
    ];

    /**
     * Get the unsur that owns the pertanyaan.
     */
    public function unsur(): BelongsTo {
        return $this->belongsTo(SKMUnsur::class, 'skm_unsur_id');
    }

    /**
     * Get the jawaban pertanyaan for the pertanyaan.
     */
    public function hasil(): HasMany {
        return $this->hasMany(SKMHasil::class, 'skm_pertanyaan_id');
    }

    /**
     * Get the pilihan jawaban pertanyaan for the pertanyaan.
     */
    public function pilihanJawaban(): HasMany {
        return $this->hasMany(SKMPilihanJawaban::class, 'skm_pertanyaan_id');
    }
}
