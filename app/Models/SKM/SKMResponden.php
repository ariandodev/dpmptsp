<?php

namespace App\Models\SKM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SKMResponden extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skm_responden';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jenis_kelamin',
        'usia',
        'pendidikan',
        'pekerjaan'
    ];

    /**
     * Get the jawaban pertanyaan for the responden.
     */
    public function hasil(): HasMany {
        return $this->hasMany(SKMJawabanPertanyaan::class, 'skm_responden_id');
    }

    /**
     * Opsi kelamin
     */
    public static function opsiKelamin() {
        return array(
            'L' => 'Laki-laki',
            'P' => 'Perempuan',
        );
    }

    /**
     * Opsi pendidikan
     */
    public static function opsiPendidikan() {
        return array(
            'Tidak Berpendidikan Formal' => 'Tidak Berpendidikan Formal',
            'SD' => 'SD Sederajat',
            'SMP' => 'SMP Sederajat',
            'SMA' => 'SMA Sederajat',
            'D3' => 'D3 Sederajat',
            'S1' => 'S1 Sederajat',
            'S2' => 'S2 Sederajat',
            'S3' => 'S3 Sederajat'
        );
    }

    /**
     * Opsi pekerjaan
     */
    public static function opsiPekerjaan() {
        return array(
            'Wiraswasta' =>'Wiraswasta/Wirausaha',
            'Swasta' => 'Karyawan Swasta', 
            'ASN' => 'ASN',
            'TNI' => 'TNI',
            'Polri' => 'Polri',
            'Pelajar' => 'Pelajar/Mahasiswa',
            'Tidak Bekerja' => 'Tidak Bekerja'
        );
    }
}
