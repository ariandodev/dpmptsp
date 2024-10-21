<?php

namespace App\Models\SKM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SKMPilihanJawaban extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skm_pilihan_jawaban';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jawaban',
        'bobot',
        'skm_pertanyaan_id'
    ];

    /**
     * Get the jawaban pertanyaan for the pilihan jawaban.
     */
    public function jawabanPertanyaan(): HasMany {
        return $this->hasMany(SKMJawabanPertanyaan::class, 'skm_pilihan_jawaban_id');
    }

    /**
     * Get the pertanyaan that owns the pertanyaan.
     */
    public function pertanyaan(): BelongsTo {
        return $this->belongsTo(SKMPertanyaan::class, 'skm_pertanyaan_id');
    }
}
