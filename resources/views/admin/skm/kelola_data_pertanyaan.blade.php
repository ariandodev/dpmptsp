@extends('admin.master')

@section('title', 'Kelola Data Layanan')

@section('main')
<div class="pagetitle">
    <h1><b>KELOLA DATA PERTANYAAN</b></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Kelola Data Pertanyaan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Unsur Penilaian <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-tambah-unsur"><i class="bi bi-plus-circle"></i> Baru</button></h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Unsur</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_unsur as $unsur)
                            <tr id="{{ $unsur->id }}">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $unsur->unsur }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="aksi">
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-unsur" data-bs-unsur-id="{{ $unsur->id }}" data-bs-unsur="{{ $unsur->unsur }}"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-hapus-unsur" data-bs-unsur-id="{{ $unsur->id }}" data-bs-unsur="{{ $unsur->unsur }}"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pertanyaan SKM <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-tambah-pertanyaan"><i class="bi bi-plus-circle"></i> Baru</button></h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Pertanyaan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_pertanyaan as $pertanyaan)
                            <tr id="{{ $pertanyaan->id }}">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $pertanyaan->pertanyaan }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="aksi">
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-pertanyaan" data-bs-pertanyaan-id="{{ $pertanyaan->id }}" data-bs-pertanyaan="{{ $pertanyaan->pertanyaan }}" data-bs-unsur-id="{{ $pertanyaan->unsur->id }}" data-bs-unsur="{{ $pertanyaan->unsur->unsur }}" @foreach ($pertanyaan->pilihanJawaban as $jawaban) data-bs-pilihan-jawaban-{{ $jawaban->bobot }}-id="{{ $jawaban->id }}" data-bs-pilihan-jawaban-{{ $jawaban->bobot }}="{{ $jawaban->jawaban }}" @endforeach><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-hapus-pertanyaan" data-bs-pertanyaan-id="{{ $pertanyaan->id }}" data-bs-pertanyaan="{{ $pertanyaan->pertanyaan }}"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-tambah-unsur" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Tambah Unsur Penilaian</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="form-tambah-unsur">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-unsur" placeholder="Unsur Penilaian" name="unsur" aria-describedby="input-unsur-validasi">
                            <label for="input-unsur">Unsur Penilaian</label>
                            <div id="input-unsur-validasi" class="invalid-feedback"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="reset" class="btn btn-warning btn-sm" form="form-tambah-unsur">Reset</button>
                <button type="submit" class="btn btn-success btn-sm" form="form-tambah-unsur">Simpan</button>
            </div>
        </div>
    </div>
</div><!-- End Modal Tambah Unsur Penilaian-->

<div class="modal fade" id="modal-edit-unsur" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Edit Unsur Penilaian</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="form-edit-unsur">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-unsur" placeholder="Unsur Penilaian" name="unsur" aria-describedby="input-unsur-validasi">
                            <label for="input-unsur">Unsur Penilaian</label>
                            <div id="input-unsur-validasi" class="invalid-feedback"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="reset" class="btn btn-warning btn-sm" form="form-edit-unsur">Reset</button>
                <button type="submit" class="btn btn-success btn-sm" form="form-edit-unsur">Simpan</button>
            </div>
        </div>
    </div>
</div><!-- End Modal Edit Unsur Penilaian-->

<div class="modal fade" id="modal-hapus-unsur" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger text-center"><b>Menghapus unsur penilaian akan menghapus semua data terkait unsur tersebut!</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" id="form-hapus-unsur">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-unsur" placeholder="Unsur Penilaian" readonly>
                            <label class="text-danger" for="input-unsur">Hapus Unsur Penilaian berikut ?</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger btn-sm" form="form-hapus-unsur">Hapus</button>
            </div>
        </div>
    </div>
</div><!-- End Modal Hapus Unsur Penilaian-->

<div class="modal fade" id="modal-tambah-pertanyaan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Tambah Pertanyaan</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="form-tambah-pertanyaan">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <select class="form-select" id="input-pilih-unsur" aria-label="Pilih Unsur Penilaian" aria-describedby="input-pilih-unsur-validasi">
                                <option selected value="">...</option>
                                @foreach ($all_unsur as $unsur)
                                <option value="{{ $unsur->id }}">{{ $unsur->unsur }}</option>
                                @endforeach
                            </select>
                            <label for="input-pilih-unsur">Pilih Unsur Penilaian</label>
                            <div id="input-pilih-unsur-validasi" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-pertanyaan" placeholder="Pertanyaan" aria-describedby="input-pertanyaan-validasi">
                            <label for="input-pertanyaan">Pertanyaan</label>
                            <div id="input-pertanyaan-validasi" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-pilihan-jawaban-1" placeholder="Pilihan Jawaban Bobot 1" aria-describedby="input-pilihan-jawaban-1-validasi">
                            <label for="input-pilihan-jawaban-1">Pilihan Jawaban (Bobot 1)</label>
                            <div id="input-pilihan-jawaban-1-validasi" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-pilihan-jawaban-2" placeholder="Pilihan Jawaban Bobot 2" aria-describedby="input-pilihan-jawaban-2-validasi">
                            <label for="input-pilihan-jawaban-2">Pilihan Jawaban (Bobot 2)</label>
                            <div id="input-pilihan-jawaban-2-validasi" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-pilihan-jawaban-3" placeholder="Pilihan Jawaban Bobot 3" aria-describedby="input-pilihan-jawaban-3-validasi">
                            <label for="input-pilihan-jawaban-3">Pilihan Jawaban (Bobot 3)</label>
                            <div id="input-pilihan-jawaban-3-validasi" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-pilihan-jawaban-4" placeholder="Pilihan Jawaban Bobot 4" aria-describedby="input-pilihan-jawaban-4-validasi">
                            <label for="input-pilihan-jawaban-4">Pilihan Jawaban (Bobot 4)</label>
                            <div id="input-pilihan-jawaban-4-validasi" class="invalid-feedback"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="reset" class="btn btn-warning btn-sm" form="form-tambah-pertanyaan">Reset</button>
                <button type="submit" id="submit-button" class="btn btn-success btn-sm" form="form-tambah-pertanyaan">Simpan</button>
            </div>
        </div>
    </div>
</div><!-- End Modal Tambah Pertanyaan-->

<div class="modal fade" id="modal-edit-pertanyaan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Tambah Pertanyaan</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="form-edit-pertanyaan">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <select class="form-select" id="input-pilih-unsur" aria-label="Pilih Unsur Penilaian" aria-describedby="input-pilih-unsur-validasi">
                                <option selected value="">...</option>
                                @foreach ($all_unsur as $unsur)
                                <option value="{{ $unsur->id }}">{{ $unsur->unsur }}</option>
                                @endforeach
                            </select>
                            <label for="input-pilih-unsur">Pilih Unsur Penilaian</label>
                            <div id="input-pilih-unsur-validasi" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-pertanyaan" placeholder="Pertanyaan" aria-describedby="input-pertanyaan-validasi">
                            <label for="input-pertanyaan">Pertanyaan</label>
                            <div id="input-pertanyaan-validasi" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-pilihan-jawaban-1" placeholder="Pilihan Jawaban Bobot 1" aria-describedby="input-pilihan-jawaban-1-validasi">
                            <label for="input-pilihan-jawaban-1">Pilihan Jawaban (Bobot 1)</label>
                            <div id="input-pilihan-jawaban-1-validasi" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-pilihan-jawaban-2" placeholder="Pilihan Jawaban Bobot 2" aria-describedby="input-pilihan-jawaban-2-validasi">
                            <label for="input-pilihan-jawaban-2">Pilihan Jawaban (Bobot 2)</label>
                            <div id="input-pilihan-jawaban-2-validasi" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-pilihan-jawaban-3" placeholder="Pilihan Jawaban Bobot 3" aria-describedby="input-pilihan-jawaban-3-validasi">
                            <label for="input-pilihan-jawaban-3">Pilihan Jawaban (Bobot 3)</label>
                            <div id="input-pilihan-jawaban-3-validasi" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-pilihan-jawaban-4" placeholder="Pilihan Jawaban Bobot 4" aria-describedby="input-pilihan-jawaban-4-validasi">
                            <label for="input-pilihan-jawaban-4">Pilihan Jawaban (Bobot 4)</label>
                            <div id="input-pilihan-jawaban-4-validasi" class="invalid-feedback"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="reset" class="btn btn-warning btn-sm" form="form-edit-pertanyaan">Reset</button>
                <button type="submit" id="submit-button" class="btn btn-success btn-sm" form="form-edit-pertanyaan">Simpan</button>
            </div>
        </div>
    </div>
</div><!-- End Modal Edit Pertanyaan-->

<div class="modal fade" id="modal-hapus-pertanyaan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger text-center"><b>Menghapus pertanyaan akan menghapus semua data terkait pertanyaan tersebut!</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" id="form-hapus-pertanyaan">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-pertanyaan" placeholder="Pertanyaan" readonly>
                            <label class="text-danger" for="input-unsur">Hapus Pertanyaan berikut ?</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger btn-sm" form="form-hapus-pertanyaan">Hapus</button>
            </div>
        </div>
    </div>
</div><!-- End Modal Hapus Pertanyaan-->
@endsection

@section('js')
<script>
    // Aktifkan sidebar
    (() => {
        let $sidebar = document.querySelector('#sidebar')
        let $currentSidebarParent = $sidebar.querySelector('.skm-links');
        let $currentSidebarParentUl = $currentSidebarParent.nextElementSibling;
        let $currentSidebarChild = $sidebar.querySelector('.admin-skm-kelola-data-pertanyaan');
        
        $currentSidebarParent.classList.remove('collapsed');
        $currentSidebarParentUl.classList.add('show');
        $currentSidebarChild.classList.add('active');
    })();

    window.addEventListener('load', () => {
        // Start code tambah unsur
        (() => {
            let $formTambahUnsur = document.getElementById('form-tambah-unsur');
            $formTambahUnsur.addEventListener('submit', async (event) => {
                event.preventDefault();
                isLoading(true);
                // Elemen input dan validasi
                let $inputUnsur = $formTambahUnsur.querySelector('#input-unsur');
                let $inputUnsurValidasi = $formTambahUnsur.querySelector('#input-unsur-validasi');
                // Data input
                let unsur = $inputUnsur.value;
                try {
                    await axios.post("{{ route('admin.skm.tambahUnsur') }}", {unsur}).then((response) => {
                        console.log(response);
                        Swal.fire({
                            title: 'Unsur "' + response.data.unsur + '" berhasil ditambahkan',
                            icon: "success"
                        }).then(() => {
                            window.location.href = "{{ route('admin.skm.kelolaDataPertanyaan') }}";
                        });
                    }).finally(() => {
                        isLoading(false);
                    });
                } catch (error) {
                    console.error(error);
                    if (error.response.data.errors) {
                        $inputUnsurValidasi.innerHTML = error.response.data.errors['unsur'];
                        $inputUnsur.classList.add('is-invalid');
                    }
                }
            });
        })();
        // End code tambah unsur

        // Start code edit unsur
        (() => {
            let $modalEditUnsur = document.getElementById('modal-edit-unsur');
            let $formEditUnsur = $modalEditUnsur.querySelector('#form-edit-unsur');
            $modalEditUnsur.addEventListener('show.bs.modal', function (event) {
                // Ambil data dari atribut data-bs-*
                let button = event.relatedTarget;
                let unsur = button.getAttribute('data-bs-unsur');
                let unsur_id = button.getAttribute('data-bs-unsur-id');
                // Dapat melakukan panggilan ajax untuk mengisi data di modal jika diperlukan.
                // Elemen input dan validasi
                let $inputUnsur = $formEditUnsur.querySelector('#input-unsur');
                let $inputUnsurValidasi = $formEditUnsur.querySelector('#input-unsur-validasi');
                // Ganti judul modal
                $modalEditUnsur.querySelector('.modal-title').innerHTML = 'Edit unsur "<b>' + unsur + '</b>"';
                // Isi data elemen
                $inputUnsur.value = unsur;
                // Update data melalui ajax saat disubmit
                $formEditUnsur.addEventListener('submit', async (event) => {
                    isLoading(true);
                    event.preventDefault();
                    try {
                        await axios.put("{{ route('admin.skm.updateUnsur') }}", {
                            id: unsur_id,
                            unsur: $inputUnsur.value,
                        }).then((response) => {
                            Swal.fire({
                                title: 'Unsur "' + $inputUnsur.value + '" berhasil diperbarui',
                                icon: "success"
                            }).then(() => {
                                window.location.href = "{{ route('admin.skm.kelolaDataPertanyaan') }}";
                            });
                        }).finally(() => {
                            isLoading(false);
                        });
                    } catch (error) {
                        $inputUnsur.classList.add('is-invalid');
                        if (error.response.data.errors) {
                            $inputUnsurValidasi.innerHTML = error.response.data.errors['unsur'];
                        }
                    }
                });
            });
        })();
        // End code edit unsur

        // Start code hapus unsur
        (() => {
            let $modalHapusUnsur = document.getElementById('modal-hapus-unsur');
            let $formHapusUnsur = $modalHapusUnsur.querySelector('#form-hapus-unsur');
            $modalHapusUnsur.addEventListener('show.bs.modal', function (event) {
                let button = event.relatedTarget;
                let unsur = button.getAttribute('data-bs-unsur');
                let unsur_id = button.getAttribute('data-bs-unsur-id');

                $formHapusUnsur.querySelector('#input-unsur').value = unsur;

                $formHapusUnsur.addEventListener('submit', async (event) => {
                    event.preventDefault();
                    isLoading(true);
                    try {
                        await axios.delete("{{ route('admin.skm.hapusUnsur') }}", {
                            data: {
                                id: unsur_id,
                                unsur: unsur,
                            }
                        }).then((response) => {
                            console.log(response);
                            Swal.fire({
                                title: 'Unsur "' + unsur + '" berhasil dihapus',
                                icon: "success"
                            }).then(() => {
                                window.location.href = "{{ route('admin.skm.kelolaDataPertanyaan') }}";
                            });
                        }).finally(() => {
                            isLoading(false);
                        });
                    } catch (error) {
                        console.error(error);
                    }
                });
            });
        })();
        // End code hapus unsur

        // Start code tambah pertanyaan
        (() => {
            let $formTambahPertanyaan = document.getElementById('form-tambah-pertanyaan');
            $formTambahPertanyaan.addEventListener('submit', async (event) => {
                event.preventDefault();
                isLoading(true);
                // Elemen input dan validasi
                let $inputPilihUnsur = $formTambahPertanyaan.querySelector('#input-pilih-unsur');
                let $inputPilihUnsurValidasi = $formTambahPertanyaan.querySelector('#input-pilih-unsur-validasi');
                let $inputPertanyaan = $formTambahPertanyaan.querySelector('#input-pertanyaan');
                let $inputPertanyaanValidasi = $formTambahPertanyaan.querySelector('#input-pertanyaan-validasi');
                let $inputPilihanJawaban1 = $formTambahPertanyaan.querySelector('#input-pilihan-jawaban-1');
                let $inputPilihanJawaban1Validasi = $formTambahPertanyaan.querySelector('#input-pilihan-jawaban-1-validasi');
                let $inputPilihanJawaban2 = $formTambahPertanyaan.querySelector('#input-pilihan-jawaban-2');
                let $inputPilihanJawaban2Validasi = $formTambahPertanyaan.querySelector('#input-pilihan-jawaban-2-validasi');
                let $inputPilihanJawaban3 = $formTambahPertanyaan.querySelector('#input-pilihan-jawaban-3');
                let $inputPilihanJawaban3Validasi = $formTambahPertanyaan.querySelector('#input-pilihan-jawaban-3-validasi');
                let $inputPilihanJawaban4 = $formTambahPertanyaan.querySelector('#input-pilihan-jawaban-4');
                let $inputPilihanJawaban4Validasi = $formTambahPertanyaan.querySelector('#input-pilihan-jawaban-4-validasi');

                // Reset status validasi form
                $inputPilihUnsur.classList.remove('is-invalid');
                $inputPilihUnsur.classList.add('is-valid');
                $inputPertanyaan.classList.remove('is-invalid');
                $inputPertanyaan.classList.add('is-valid');
                $inputPilihanJawaban1.classList.remove('is-invalid');
                $inputPilihanJawaban1.classList.add('is-valid');
                $inputPilihanJawaban2.classList.remove('is-invalid');
                $inputPilihanJawaban2.classList.add('is-valid');
                $inputPilihanJawaban3.classList.remove('is-invalid');
                $inputPilihanJawaban3.classList.add('is-valid');
                $inputPilihanJawaban4.classList.remove('is-invalid');
                $inputPilihanJawaban4.classList.add('is-valid');
                
                // Data yang diinput
                let unsur = $inputPilihUnsur.value;
                let pertanyaan = $inputPertanyaan.value;
                let jawaban_1 = $inputPilihanJawaban1.value;
                let jawaban_2 = $inputPilihanJawaban2.value;
                let jawaban_3 = $inputPilihanJawaban3.value;
                let jawaban_4 = $inputPilihanJawaban4.value;
                try {
                    await axios.post("{{ route('admin.skm.tambahPertanyaan') }}", {unsur, pertanyaan, jawaban_1, jawaban_2, jawaban_3, jawaban_4}).then((response) => {
                        console.log(response);
                        Swal.fire({
                            title: 'Data pertanyaan "' + response.data.pertanyaan + '" berhasil ditambahkan',
                            icon: "success"
                        }).then(() => {
                            window.location.href = "{{ route('admin.skm.kelolaDataPertanyaan') }}";
                        });
                    }).finally(() => {
                        isLoading(false);
                    });
                } catch (error) {
                    console.log(error.response.data.errors)
                    if (error.response.data.errors) {
                        if ('unsur' in error.response.data.errors) {
                            $inputPilihUnsur.classList.add('is-invalid');
                            $inputPilihUnsurValidasi.innerHTML = error.response.data.errors['unsur'];
                        };
                        if ('pertanyaan' in error.response.data.errors) {
                            $inputPertanyaan.classList.add('is-invalid');
                            $inputPertanyaanValidasi.innerHTML = error.response.data.errors['pertanyaan'];
                        };
                        if ('jawaban_1' in error.response.data.errors) {
                            $inputPilihanJawaban1.classList.add('is-invalid');
                            $inputPilihanJawaban1Validasi.innerHTML = error.response.data.errors['jawaban_1'];
                        };
                        if ('jawaban_2' in error.response.data.errors) {
                            $inputPilihanJawaban2.classList.add('is-invalid');
                            $inputPilihanJawaban2Validasi.innerHTML = error.response.data.errors['jawaban_2'];
                        };
                        if ('jawaban_3' in error.response.data.errors) {
                            $inputPilihanJawaban3.classList.add('is-invalid');
                            $inputPilihanJawaban3Validasi.innerHTML = error.response.data.errors['jawaban_3'];
                        };
                        if ('jawaban_4' in error.response.data.errors) {
                            $inputPilihanJawaban4.classList.add('is-invalid');
                            $inputPilihanJawaban4Validasi.innerHTML = error.response.data.errors['jawaban_4'];
                        };
                    };
                }
            });
        })();
        // End code tambah pertanyaan

        // Start code edit pertanyaan
        (() => {
            let $modalEditPertanyaan = document.getElementById('modal-edit-pertanyaan');
            let $formEditPertanyaan = $modalEditPertanyaan.querySelector('#form-edit-pertanyaan');
            $modalEditPertanyaan.addEventListener('show.bs.modal', function (event) {
                // Ambil data dari atribut data-bs-*
                let button = event.relatedTarget;
                let pertanyaan = button.getAttribute('data-bs-pertanyaan');
                let pertanyaan_id = button.getAttribute('data-bs-pertanyaan-id');
                let unsur = button.getAttribute('data-bs-unsur');
                let unsur_id = button.getAttribute('data-bs-unsur-id');
                let jawaban_1 = button.getAttribute('data-bs-pilihan-jawaban-1');
                let jawaban_1_id = button.getAttribute('data-bs-pilihan-jawaban-1-id');
                let jawaban_2 = button.getAttribute('data-bs-pilihan-jawaban-2');
                let jawaban_2_id = button.getAttribute('data-bs-pilihan-jawaban-2-id');
                let jawaban_3 = button.getAttribute('data-bs-pilihan-jawaban-3');
                let jawaban_3_id = button.getAttribute('data-bs-pilihan-jawaban-3-id');
                let jawaban_4 = button.getAttribute('data-bs-pilihan-jawaban-4');
                let jawaban_4_id = button.getAttribute('data-bs-pilihan-jawaban-4-id');
                // Dapat melakukan panggilan ajax untuk mengisi data di modal jika diperlukan.
                // Elemen input dan validasi
                let $inputPilihUnsur = $formEditPertanyaan.querySelector('#input-pilih-unsur');
                let $inputPilihUnsurValidasi = $formEditPertanyaan.querySelector('#input-pilih-unsur-validasi');
                let $inputPertanyaan = $formEditPertanyaan.querySelector('#input-pertanyaan');
                let $inputPertanyaanValidasi = $formEditPertanyaan.querySelector('#input-pertanyaan-validasi');
                let $inputPilihanJawaban1 = $formEditPertanyaan.querySelector('#input-pilihan-jawaban-1');
                let $inputPilihanJawaban1Validasi = $formEditPertanyaan.querySelector('#input-pilihan-jawaban-1-validasi');
                let $inputPilihanJawaban2 = $formEditPertanyaan.querySelector('#input-pilihan-jawaban-2');
                let $inputPilihanJawaban2Validasi = $formEditPertanyaan.querySelector('#input-pilihan-jawaban-2-validasi');
                let $inputPilihanJawaban3 = $formEditPertanyaan.querySelector('#input-pilihan-jawaban-3');
                let $inputPilihanJawaban3Validasi = $formEditPertanyaan.querySelector('#input-pilihan-jawaban-3-validasi');
                let $inputPilihanJawaban4 = $formEditPertanyaan.querySelector('#input-pilihan-jawaban-4');
                let $inputPilihanJawaban4Validasi = $formEditPertanyaan.querySelector('#input-pilihan-jawaban-4-validasi');
                // Ganti judul modal
                $modalEditPertanyaan.querySelector('.modal-title').innerHTML = 'Edit pertanyaan "<b>' + pertanyaan + '</b>"';
                // Isi data elemen
                $inputPilihUnsur.value = unsur_id;
                $inputPertanyaan.value = pertanyaan;
                $inputPilihanJawaban1.value = jawaban_1;
                $inputPilihanJawaban2.value = jawaban_2;
                $inputPilihanJawaban3.value = jawaban_3;
                $inputPilihanJawaban4.value = jawaban_4;
                // Update data melalui ajax saat disubmit
                $formEditPertanyaan.addEventListener('submit', async (event) => {
                    isLoading(true);
                    // Reset status validasi form
                    $inputPilihUnsur.classList.remove('is-invalid');
                    $inputPilihUnsur.classList.add('is-valid');
                    $inputPertanyaan.classList.remove('is-invalid');
                    $inputPertanyaan.classList.add('is-valid');
                    $inputPilihanJawaban1.classList.remove('is-invalid');
                    $inputPilihanJawaban1.classList.add('is-valid');
                    $inputPilihanJawaban2.classList.remove('is-invalid');
                    $inputPilihanJawaban2.classList.add('is-valid');
                    $inputPilihanJawaban3.classList.remove('is-invalid');
                    $inputPilihanJawaban3.classList.add('is-valid');
                    $inputPilihanJawaban4.classList.remove('is-invalid');
                    $inputPilihanJawaban4.classList.add('is-valid');
                    event.preventDefault();
                    try {
                        await axios.put("{{ route('admin.skm.updatePertanyaan') }}", {
                            id_pertanyaan: pertanyaan_id,
                            id_unsur: unsur_id,
                            id_jawaban_1: jawaban_1_id,
                            id_jawaban_2: jawaban_2_id,
                            id_jawaban_3: jawaban_3_id,
                            id_jawaban_4: jawaban_4_id,
                            pertanyaan: $inputPertanyaan.value,
                            unsur: $inputPilihUnsur.value,
                            jawaban_1: $inputPilihanJawaban1.value,
                            jawaban_2: $inputPilihanJawaban2.value,
                            jawaban_3: $inputPilihanJawaban3.value,
                            jawaban_4: $inputPilihanJawaban4.value,
                        }).then((response) => {
                            console.log(response);
                            Swal.fire({
                                title: 'Pertanyaan "' + $inputPertanyaan.value + '" berhasil diperbarui',
                                icon: "success"
                            }).then(() => {
                                window.location.href = "{{ route('admin.skm.kelolaDataPertanyaan') }}";
                            });
                        }).finally(() => {
                            isLoading(false);
                        });
                    } catch (error) {
                        console.log(error.response.data.errors)
                    if (error.response.data.errors) {
                        if ('unsur' in error.response.data.errors) {
                            $inputPilihUnsur.classList.add('is-invalid');
                            $inputPilihUnsurValidasi.innerHTML = error.response.data.errors['unsur'];
                        };
                        if ('pertanyaan' in error.response.data.errors) {
                            $inputPertanyaan.classList.add('is-invalid');
                            $inputPertanyaanValidasi.innerHTML = error.response.data.errors['pertanyaan'];
                        };
                        if ('jawaban_1' in error.response.data.errors) {
                            $inputPilihanJawaban1.classList.add('is-invalid');
                            $inputPilihanJawaban1Validasi.innerHTML = error.response.data.errors['jawaban_1'];
                        };
                        if ('jawaban_2' in error.response.data.errors) {
                            $inputPilihanJawaban2.classList.add('is-invalid');
                            $inputPilihanJawaban2Validasi.innerHTML = error.response.data.errors['jawaban_2'];
                        };
                        if ('jawaban_3' in error.response.data.errors) {
                            $inputPilihanJawaban3.classList.add('is-invalid');
                            $inputPilihanJawaban3Validasi.innerHTML = error.response.data.errors['jawaban_3'];
                        };
                        if ('jawaban_4' in error.response.data.errors) {
                            $inputPilihanJawaban4.classList.add('is-invalid');
                            $inputPilihanJawaban4Validasi.innerHTML = error.response.data.errors['jawaban_4'];
                        };
                    };
                    }
                });
            });
        })();
        // End code edit pertanyaan
        
        // Start code hapus pertanyaan
        (() => {
            let $modalHapusPertanyaan = document.getElementById('modal-hapus-pertanyaan');
            let $formHapusPertanyaan = $modalHapusPertanyaan.querySelector('#form-hapus-pertanyaan');
            $modalHapusPertanyaan.addEventListener('show.bs.modal', function (event) {
                let button = event.relatedTarget;
                let pertanyaan = button.getAttribute('data-bs-pertanyaan');
                let pertanyaan_id = button.getAttribute('data-bs-pertanyaan-id');

                $formHapusPertanyaan.querySelector('#input-pertanyaan').value = pertanyaan;

                $formHapusPertanyaan.addEventListener('submit', async (event) => {
                    event.preventDefault();
                    isLoading(true);
                    try {
                        await axios.delete("{{ route('admin.skm.hapusPertanyaan') }}", {
                            data: {
                                id: pertanyaan_id,
                                pertanyaan: pertanyaan,
                            }
                        }).then((response) => {
                            console.log(response);
                            Swal.fire({
                                title: 'Pertanyaan "' + pertanyaan + '" berhasil dihapus',
                                icon: "success"
                            }).then(() => {
                                window.location.href = "{{ route('admin.skm.kelolaDataPertanyaan') }}";
                            });
                        }).finally(() => {
                            isLoading(false);
                        });
                    } catch (error) {
                        console.error(error);
                    }
                });
            });
        })();
        // End code hapus pertanyaan
    });
</script>
@endsection