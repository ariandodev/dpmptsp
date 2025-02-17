<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\SKM\SKMUnsur;
use App\Models\SKM\SKMPertanyaan;
use App\Models\SKM\SKMPilihanJawaban;
use App\Models\SKM\SKMUnitLayanan;
use App\Models\SKM\SKMLayanan;
use App\Models\SKM\SKMResponden;
use App\Models\SKM\SKMHasil;

class SKMCon extends Controller
{
    public function index() {
        // Dapatkan semua data hasil SKM
        $hasil_skm = SKMHasil::with(['layanan', 'pertanyaan', 'pilihanJawaban', 'responden', 'unsur', 'unitLayanan'])->orderBy('id', 'desc')->get();
        
        // Hitung nilai IKM berjalan (rumus hitung sesuai dengan Permenpan No. 14 Tahun 2017)
        $data_per_unsur = $hasil_skm->groupBy('unsur.id');
        foreach ($data_per_unsur as $key => $value) {
            $value->put('jumlah_responden', $value->count('responden'));
            $value->put('nilai_per_unsur', $value->sum('pilihanJawaban.bobot'));
            $value->put('nilai_rerata_per_unsur', round($value['nilai_per_unsur']/$value['jumlah_responden'], 2));
            $value->put('nilai_indeks_per_unsur', round($value['nilai_rerata_per_unsur']/9, 2));
        }
        $nilai_ikm_berjalan = round($data_per_unsur->sum('nilai_indeks_per_unsur')*25, 2);

        // Dapatkan kinerja dan mutu pelayanan berdasarkan nilai ikm
        $kinerja_pelayanan = SKMHasil::getKinerjaMutuPelayanan($nilai_ikm_berjalan)['kinerja'];
        $mutu_pelayanan = SKMHasil::getKinerjaMutuPelayanan($nilai_ikm_berjalan)['mutu'];

        // Dapatkan semua data unit pelayanan
        $all_unit_layanan = SKMUnitLayanan::all();

        // Kembalikan view:
        return view('admin.skm.index', compact('hasil_skm', 'nilai_ikm_berjalan', 'kinerja_pelayanan', 'mutu_pelayanan', 'all_unit_layanan'));
        //return response()->json($data_per_unsur);
    }

    public function kelolaDataLayanan() {
        // Dapatkan semua data unit pelayanan
        $all_unit_layanan = SKMUnitLayanan::all();
        // Dapatkan semua data layanan beserta dengan layanan terkait dengan layanan tersebut
        // dengan menggunakan Eager Loading:
        $all_layanan = SKMLayanan::with('unitLayanan')->orderBy('skm_unit_layanan_id', 'asc')->get();
        // Kembalikan view:
        return view('admin.skm.kelola_data_layanan', compact('all_unit_layanan', 'all_layanan'));
    }

    public function tambahUnitLayanan(Request $request) {
        // Validasi data unit layanan dari post request:
        $validated = $request->validate([
            'nama' => 'required|unique:skm_unit_layanan|max:255',
        ]);
        // Dapatkan data input dari post request:
        $input = $request->all();
        // Simpan data input ke database:
        $response = SKMUnitLayanan::create($input);

        // Kembalikan json (karna request menggunakan ajax):
        return response()->json($response);
    }

    public function updateUnitLayanan(Request $request) {
        // Validasi data unit layanan dari put request:
        $validated = $request->validate([
            'nama' => 'required|unique:skm_unit_layanan|max:255',
        ]);
        // Dapatkan data input dari put request:
        $input = $request->all();
        // Temukan data unit layanan yang akan diupdate:
        $unit_layanan = SKMUnitLayanan::find($input['id']);
        // Update data unit layanan dengan data terbaru dari input:
        $unit_layanan->nama = $input['nama'];
        // Simpan data unit layanan terbaru:
        $response = $unit_layanan->save();
        // Kembalikan json (karna request menggunakan ajax):
        return response()->json($response);
    }

    public function hapusUnitLayanan(Request $request) {
        // Dapatkan data id unit layanan dari delete request:
        $input = $request->id;
        // Hapus unit layanan:
        $response = SKMUnitLayanan::destroy('id', $input);
        // Hapus data layanan yang terkait dengan unit layanan:
        SKMLayanan::where('skm_unit_layanan_id', $input)->delete();
        // Kembalikan json (karna request menggunakan ajax):
        return response()->json($response);
    }

    public function tambahLayanan(Request $request) {
        // Validasi data layanan dari post request:
        $validated = $request->validate([
            'unit_layanan' => 'required|integer',
            'nama' => 'required|unique:skm_layanan|max:255',
        ]);
        // Dapatkan data layanan dari post request:
        $input = $request->all();
        // Simpan data layanan:
        $layanan = SKMLayanan::create([
            'nama' => $input['nama'],
            'skm_unit_layanan_id' => $input['unit_layanan'],
        ]);
        // Kembalikan json (karna request menggunakan ajax):
        return response()->json($layanan);
    }

    public function updateLayanan(Request $request) {
        // Validasi data  layanan dari put request:
        $validated = $request->validate([
            'unit_layanan' => 'required|integer',
            'nama' => 'required|max:255',
        ]);
        // Dapatkan data input dari put request:
        $input = $request->all();
        // Temukan data layanan yang akan diupdate:
        $layanan = SKMLayanan::find($input['id']);
        // Update data layanan dengan data terbaru dari input:
        $layanan->nama = $input['nama'];
        $layanan->skm_unit_layanan_id = $input['unit_layanan'];
        // Simpan data layanan terbaru:
        $response = $layanan->save();
        // Kembalikan json (karna request menggunakan ajax):
        return response()->json($response);
    }

    public function hapusLayanan(Request $request) {
        // Dapatkan data id layanan dari delete request:
        $input = $request->id;
        // Hapus layanan:
        $response = SKMLayanan::destroy('id', $input);
        // Kembalikan json (karna request menggunakan ajax):
        return response()->json($response);
    }

    public function kelolaDataPertanyaan() {
        // Dapatkan data semua unsur:
        $all_unsur = SKMUnsur::all();
        // Dapatkan semua data pertanyaan beserta dengan unsur dan pilihan jawaban yang terkait dengan pertanyaan tersebut
        // dengan menggunakan Eager Loading:
        $all_pertanyaan = SKMPertanyaan::with(['pilihanJawaban' => function (Builder $query) {
            $query->orderBy('bobot', 'asc');
        },'unsur'])->get();
        // Kembalikan view:
        return view('admin.skm.kelola_data_pertanyaan', compact('all_unsur', 'all_pertanyaan'));
    }

    public function tambahUnsur(Request $request) {
        // Validasi data unsur dari post request:
        $validated = $request->validate([
            'unsur' => 'required|unique:skm_unsur|max:255',
        ]);
        // Dapatkan data input dari post request:
        $input = $request->all();
        // Simpan data input ke database:
        $response = SKMUnsur::create($input);

        // Kembalikan json (karna request menggunakan ajax):
        return response()->json($response);
    }

    public function updateUnsur(Request $request) {
        // Validasi data unsur dari put request:
        $validated = $request->validate([
            'unsur' => 'required|unique:skm_unsur|max:255',
        ]);
        // Dapatkan data input dari put request:
        $input = $request->all();
        // Temukan data unsur yang akan diupdate:
        $unsur = SKMUnsur::find($input['id']);
        // Update data unsur dengan data terbaru dari input:
        $unsur->unsur = $input['unsur'];
        // Simpan data unsur terbaru:
        $response = $unsur->save();
        // Kembalikan json (karna request menggunakan ajax):
        return response()->json($response);
    }

    public function hapusUnsur(Request $request) {
        // Dapatkan data id unsur dari delete request:
        $input = $request->id;
        // Dapatkan data pertanyaan yang terkait dengan unsur:
        $pertanyaan = SKMPertanyaan::where('skm_unsur_id', $input)->first();
        if ($pertanyaan) {
            // Hapus pertanyaan dan pilihan jawaban yang terkait dengan unsur:
            SKMPilihanJawaban::where('skm_pertanyaan_id', $pertanyaan['id'])->delete();
            $pertanyaan->delete();
        }
        // Hapus unsur:
        $response = SKMUnsur::destroy('id', $input);
        // Kembalikan json (karna request menggunakan ajax):
        return response()->json($response);
    }

    public function tambahPertanyaan(Request $request) {
        // Validasi data pertanyaan dari post request:
        $validated = $request->validate([
            'unsur' => 'required|integer',
            'pertanyaan' => 'required',
            'jawaban_1' => 'required',
            'jawaban_2' => 'required',
            'jawaban_3' => 'required',
            'jawaban_4' => 'required',
        ]);
        // Dapatkan data pertanyaan dari post request:
        $input = $request->all();
        // Simpan data pertanyaan:
        $pertanyaan = SKMPertanyaan::create([
            'pertanyaan' => $input['pertanyaan'],
            'skm_unsur_id' => $input['unsur'],
        ]);
        // Simpan data semua pilihan jawaban:
        $jawaban1 = SKMPilihanJawaban::create([
            'jawaban' => $input['jawaban_1'],
            'bobot' => 1,
            'skm_pertanyaan_id' => $pertanyaan['id'],
        ]);
        $jawaban2 = SKMPilihanJawaban::create([
            'jawaban' => $input['jawaban_2'],
            'bobot' => 2,
            'skm_pertanyaan_id' => $pertanyaan['id'],
        ]);
        $jawaban3 = SKMPilihanJawaban::create([
            'jawaban' => $input['jawaban_3'],
            'bobot' => 3,
            'skm_pertanyaan_id' => $pertanyaan['id'],
        ]);
        $jawaban4 = SKMPilihanJawaban::create([
            'jawaban' => $input['jawaban_4'],
            'bobot' => 4,
            'skm_pertanyaan_id' => $pertanyaan['id'],
        ]);
        // Kembalikan json (karna request menggunakan ajax):
        return response()->json($pertanyaan);
    }

    public function updatePertanyaan(Request $request) {
        // Validasi data pertanyaan dari put request:
        $validated = $request->validate([
            'unsur' => 'required|integer',
            'pertanyaan' => 'required',
            'jawaban_1' => 'required',
            'jawaban_2' => 'required',
            'jawaban_3' => 'required',
            'jawaban_4' => 'required',
        ]);
        // Dapatkan data pertanyaan dari put request:
        $input = $request->all();
        // Update data pertanyaan:
        $pertanyaan = SKMPertanyaan::find($input['id_pertanyaan']);
        $pertanyaan->pertanyaan = $input['pertanyaan'];
        $pertanyaan->skm_unsur_id = $input['unsur'];
        $pertanyaan->save();
        // Update data semua pilihan jawaban:
        $jawaban1 = SKMPilihanJawaban::find($input['id_jawaban_1']);
        $jawaban1->jawaban = $input['jawaban_1'];
        $jawaban1->save();
        $jawaban2 = SKMPilihanJawaban::find($input['id_jawaban_2']);
        $jawaban2->jawaban = $input['jawaban_2'];
        $jawaban2->save();
        $jawaban3 = SKMPilihanJawaban::find($input['id_jawaban_3']);
        $jawaban3->jawaban = $input['jawaban_3'];
        $jawaban3->save();
        $jawaban4 = SKMPilihanJawaban::find($input['id_jawaban_4']);
        $jawaban4->jawaban = $input['jawaban_4'];
        $jawaban4->save();
        // Kembalikan json (karna request menggunakan ajax):
        return response()->json($pertanyaan);
    }

    public function hapusPertanyaan(Request $request) {
        // Dapatkan id pertanyaan dari delete request:
        $input = $request->id;
        // Hapus pilihan jawaban pertanyaan yang terkait dengan pertanyaan:
        SKMPilihanJawaban::where('skm_pertanyaan_id', $input)->delete();
        // Hapus pertanyaan:
        $response = SKMPertanyaan::destroy($input);
        // Kembalikan json (karna request menggunakan ajax):
        return response()->json($response);
    }

    public function simulasi() {
        // Dapatkan semua data layanan beserta dengan layanan terkait dengan layanan tersebut
        // dengan menggunakan Eager Loading:
        $all_layanan = SKMLayanan::with('unitLayanan')->orderBy('skm_unit_layanan_id', 'asc')->get();
        // Dapatkan semua data pertanyaan beserta dengan unsur dan pilihan jawaban yang terkait dengan pertanyaan tersebut
        // dengan menggunakan Eager Loading:
        $all_pertanyaan = SKMPertanyaan::with(['pilihanJawaban' => function (Builder $query) {
            $query->orderBy('bobot', 'asc');
        },'unsur'])->get();
        // Set rentang max pilihan usia
        $usia = 100;
        // Kembalikan view:
        return view('admin.skm.simulasi', compact('all_layanan', 'all_pertanyaan'));
    }

    public function simpanDataSKM(Request $request) {
        // Dapatkan data survey dari post request:
        $input = $request->all();
        // Dapatkan semua data pertanyaan 
        $all_pertanyaan = SKMPertanyaan::all();

        // Simpan data responden
        $responden = SKMResponden::create([
            'jenis_kelamin' => $input['survey']['responden']['input-jk'],
            'usia' => $input['survey']['responden']['input-usia'],
            'pendidikan' => $input['survey']['responden']['input-pendidikan'],
            'pekerjaan' => $input['survey']['responden']['input-pekerjaan']
        ]);

        // Temukan data layanan
        $layanan = SKMLayanan::find($input['survey']['responden']['input-layanan']);

        // Simpan data jawaban jika semua pertanyaan terjawab
        if (count($input["survey"]["jawaban"]) == count($all_pertanyaan)) {
            foreach ($input["survey"]["jawaban"] as $key => $value) {
                // Temukan data pertanyaan 
                $pertanyaan = SKMPertanyaan::find($key);
                // Simpan data SKM
                SKMHasil::create([
                    'skm_pertanyaan_id' => $pertanyaan['id'],
                    'skm_pilihan_jawaban_id' => $value,
                    'skm_responden_id' => $responden['id'],
                    'skm_layanan_id' => $layanan['id'],
                    'skm_unsur_id' => $pertanyaan['skm_unsur_id'],
                    'skm_unit_layanan_id' => $layanan['skm_unit_layanan_id']
                ]);
            }
        }
        // Kembalikan json (karna request menggunakan ajax):
        return response()->json('OK');
    }

    public function hapusHasilSKM(Request $request) {
        // Dapatkan id data hasil survey dari delete request:
        $input = $request->id;
        // Cek keberadaan data di database
        $hasil_skm = SKMHasil::find($input);
        // Hapus semua jawaban pertanyaan terkait berdasarkan id responden agar tidak terjadi kejanggalan data
        // mengingat responden wajib menjawab semua pertanyaan:
        if ($hasil_skm) {
            SKMHasil::where('skm_responden_id', $hasil_skm['skm_responden_id'])->delete();
        }
        // Kembalikan json (karna request menggunakan ajax):
        return response()->json($hasil_skm);
    }
    
    public function buatLaporanSKM(Request $request) {
        $input = $request->all();
        $hasil_skm = SKMHasil::with(['layanan', 'pertanyaan', 'pilihanJawaban', 'responden', 'unsur', 'unitLayanan'])->orderBy('id', 'asc')->get();
        
        $input_unit_layanan = $input['input-unit-layanan'];
        $input_awal_periode = $input['input-awal-periode'];
        $input_akhir_periode = $input['input-akhir-periode'];

        // Dapatkan data unit layanan berdasarkan input
        $unit_layanan = SKMUnitLayanan::find($input_unit_layanan);

        // Filter data berdasarkan unit layanan jika unit layanan ditemukan
        if($unit_layanan) {
            $hasil_skm = $hasil_skm->where('skm_unit_layanan_id', $unit_layanan['id']);
        } 

        // Set nama unit layanan menjadi 'DPMPTSP' jika data unit layanan tidak ditemukan
        if (empty($unit_layanan)) {
            $unit_layanan = ['nama' => 'DPMPTSP'];
        }

        // Filter data berdasarkan input-awal-periode
        if ($input_awal_periode) {
            $hasil_skm = $hasil_skm->where('created_at', '>=', $input_awal_periode);
        } else {
            $input_awal_periode = '-';
        }

        // Filter data berdasarkan input-akhir-periode
        if ($input_akhir_periode) {
            $hasil_skm = $hasil_skm->where('created_at', '<=', $input_akhir_periode);
        } else {
            $input_akhir_periode = '-';
        }

        // Return pemberitahuan jika setelah filter data berdasarkan awal periode dan/ atau akhir periode 
        // tidak ditemukan
        if (count($hasil_skm) < 1) {
            return response()->json('Data tidak ditemukan'); 
        }

        // Hitung nilai IKM berdasarkan hasil filter (rumus hitung sesuai dengan Permenpan No. 14 Tahun 2017)
        $data_per_unsur = $hasil_skm->groupBy('unsur.unsur');
        foreach ($data_per_unsur as $key => $value) {
            $value->put('jumlah_responden', $value->count('responden'));
            $value->put('nilai_per_unsur', $value->sum('pilihanJawaban.bobot'));
            $value->put('nilai_rerata_per_unsur', round($value['nilai_per_unsur']/$value['jumlah_responden'], 2));
            $value->put('nilai_indeks_per_unsur', round($value['nilai_rerata_per_unsur']/9, 2));
        }
        $nilai_ikm = round($data_per_unsur->sum('nilai_indeks_per_unsur')*25, 2);

        // Dapatkan kinerja dan mutu pelayanan berdasarkan nilai ikm
        $kinerja_pelayanan = SKMHasil::getKinerjaMutuPelayanan($nilai_ikm)['kinerja'];
        $mutu_pelayanan = SKMHasil::getKinerjaMutuPelayanan($nilai_ikm)['mutu'];

        // Buat data hasil SKM per responden
        $data_per_responden = $hasil_skm->groupBy('skm_responden_id');

        // Kembalikan view
        return view('admin.skm.laporan', compact('data_per_unsur', 'data_per_responden', 'nilai_ikm', 'kinerja_pelayanan', 'mutu_pelayanan', 'unit_layanan', 'input_awal_periode', 'input_akhir_periode'));
        
        //return response()->json(compact('data_per_unsur', 'data_per_responden','nilai_ikm', 'kinerja_pelayanan', 'mutu_pelayanan'));
    }
}
