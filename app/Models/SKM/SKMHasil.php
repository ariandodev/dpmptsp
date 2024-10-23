<?php

namespace App\Models\SKM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SKMHasil extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skm_hasil';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'skm_pertanyaan_id',
        'skm_pilihan_jawaban_id',
        'skm_responden_id',
        'skm_layanan_id',
        'skm_unsur_id',
        'skm_unit_layanan_id'
    ];

    /**
     * Dapatkan data pertanyaan yang terkait dengan hasil
     */
    public function pertanyaan(): BelongsTo {
        return $this->belongsTo(SKMPertanyaan::class, 'skm_pertanyaan_id');
    }

    /**
     * Dapatkan data pilihan jawaban yang terkait dengan hasil
     */
    public function pilihanJawaban(): BelongsTo {
        return $this->belongsTo(SKMPilihanJawaban::class, 'skm_pilihan_jawaban_id');
    }

    /**
     * Dapatkan data responden yang terkait dengan hasil
     */
    public function responden(): BelongsTo {
        return $this->belongsTo(SKMResponden::class, 'skm_responden_id');
    }

    /**
     * Dapatkan data layanan yang terkait dengan hasil
     */
    public function layanan(): BelongsTo {
        return $this->belongsTo(SKMLayanan::class, 'skm_layanan_id');
    }

    /**
     * Dapatkan data unsur yang terkait dengan hasil
     */
    public function unsur(): BelongsTo {
        return $this->belongsTo(SKMUnsur::class, 'skm_unsur_id');
    }

    /**
     * Dapatkan data unit layanan yang terkait dengan hasil
     */
    public function unitLayanan(): BelongsTo {
        return $this->belongsTo(SKMUnitLayanan::class, 'skm_unit_layanan_id');
    }

    //  Fungsi statis untuk mendapatkan kinerja dan mutu pelayanan berdasarkan nilai IKM
    public static function getKinerjaMutuPelayanan ($nilai_ikm) {
        $kinerja = 'Data tidak tersedia';
        $mutu = 'Data tidak tersedia';
        switch ($nilai_ikm) {
            case ($nilai_ikm >= 25.00 && $nilai_ikm <= 64.99):
                $kinerja = 'Tidak Baik';
                $mutu = 'D';
                break;
            case ($nilai_ikm >= 65.00 && $nilai_ikm <= 76.60):
                $kinerja = 'Kurang Baik';
                $mutu = 'C';
                break;
            case ($nilai_ikm >= 76.61 && $nilai_ikm <= 88.30):
                $kinerja = 'Baik';
                $mutu = 'B';
                break;
            case ($nilai_ikm >= 88.31 && $nilai_ikm <= 100.00):
                $kinerja = 'Sangat Baik';
                $mutu = 'A';
                break;
        }

        return compact(['kinerja', 'mutu']);
    }
}
