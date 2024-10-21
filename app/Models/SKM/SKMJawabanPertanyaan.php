<?php

namespace App\Models\SKM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SKMJawabanPertanyaan extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skm_jawaban_pertanyaan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'skm_pertanyaan_id',
        'skm_pilihan_jawaban_id',
        'skm_responden_id',
        'skm_layanan_id'
    ];

    /**
     * Get the pertanyaan that owns the jawaban.
     */
    public function pertanyaan(): BelongsTo {
        return $this->belongsTo(SKMPertanyaan::class, 'skm_pertanyaan_id');
    }

    /**
     * Get the pilihan jawaban that owns the jawaban.
     */
    public function jawaban(): BelongsTo {
        return $this->belongsTo(SKMPilihanJawaban::class, 'skm_pilihan_jawaban_id');
    }

    /**
     * Get the responden that owns the jawaban.
     */
    public function responden(): BelongsTo {
        return $this->belongsTo(SKMResponden::class, 'skm_responden_id');
    }

    /**
     * Get the layanan that owns the jawaban.
     */
    public function layanan(): BelongsTo {
        return $this->belongsTo(SKMLayanan::class, 'skm_layanan_id');
    }
}
