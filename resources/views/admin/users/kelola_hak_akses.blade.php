@extends('admin.master')

@section('title', 'Kelola Hak Akses')

@section('main')
<div class="pagetitle">
    <h1><b>KELOLA HAK AKSES</b></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Kelola Hak Akses</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Permisssions (akses) <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-tambah-permission"><i class="bi bi-plus-circle"></i> Baru</button></h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Permission</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Survey Kepuasan Masyarakat</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="aksi">
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-permission" data-bs-permission-id="1" data-bs-permission="kelolaDataLayanan"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-hapus-permission" data-bs-permission-id="1" data-bs-permission="kelolaDataLayanan"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Hasil SKM</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="aksi">
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-permission" data-bs-permission-id="1" data-bs-permission="kelolaDataLayanan"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-hapus-permission" data-bs-permission-id="1" data-bs-permission="kelolaDataLayanan"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Kelola Data Layanan</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="aksi">
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-permission" data-bs-permission-id="1" data-bs-permission="kelolaDataLayanan"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-hapus-permission" data-bs-permission-id="1" data-bs-permission="kelolaDataLayanan"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Roles (peran) <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-tambah-role"><i class="bi bi-plus-circle"></i> Baru</button></h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Super Admin</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="aksi">
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-role" data-bs-role-id="1" data-bs-role="Super Admin"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-hapus-role" data-bs-role-id="1" data-bs-role="Super Admin"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Pengolah Data SKM</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="aksi">
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-role" data-bs-role-id="2" data-bs-role="Admin SKM"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-hapus-role" data-bs-role-id="2" data-bs-role="Admin SKM"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-tambah-permission" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Tambah Permission</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="form-tambah-unit-layanan">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-nama" placeholder="Nama Unit Layanan" aria-describedby="input-nama-validasi">
                            <label for="input-nama">Nama Unit Layanan</label>
                            <div id="input-nama-validasi" class="invalid-feedback"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="reset" class="btn btn-warning btn-sm" form="form-tambah-unit-layanan">Reset</button>
                <button type="submit" class="btn btn-success btn-sm" form="form-tambah-unit-layanan">Simpan</button>
            </div>
        </div>
    </div>
</div><!-- End Modal Tambah Unit Layanan-->

<div class="modal fade" id="modal-edit-unit-layanan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Edit data Unit Layanan</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="form-edit-unit-layanan">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-nama" placeholder="Nama Unit Layanan" aria-describedby="input-nama-validasi">
                            <label for="input-nama">Nama Unit Layanan</label>
                            <div id="input-nama-validasi" class="invalid-feedback"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="reset" class="btn btn-warning btn-sm" form="form-edit-unit-layanan">Reset</button>
                <button type="submit" class="btn btn-success btn-sm" form="form-edit-unit-layanan">Simpan</button>
            </div>
        </div>
    </div>
</div><!-- End Modal Edit Unit Layanan-->

<div class="modal fade" id="modal-hapus-unit-layanan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger text-center"><b>Menghapus unit layanan akan menghapus semua data terkait unit layanan tersebut!</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" id="form-hapus-unit-layanan">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="input-nama" placeholder="Nama Unit Layanan" readonly>
                            <label class="text-danger" for="input-nama">Hapus unit layanan berikut ?</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger btn-sm" form="form-hapus-unit-layanan">Hapus</button>
            </div>
        </div>
    </div>
</div><!-- End Modal Hapus Unit Layanan-->
@endsection

@section('js')
<script>
    // Aktifkan sidebar
    (() => {
        let $sidebar = document.querySelector('#sidebar')
        let $currentSidebarParent = $sidebar.querySelector('.users-links');
        let $currentSidebarParentUl = $currentSidebarParent.nextElementSibling;
        let $currentSidebarChild = $sidebar.querySelector('.admin-users-kelola-hak-akses');
    
        $currentSidebarParent.classList.remove('collapsed');
        $currentSidebarParentUl.classList.add('show');
        $currentSidebarChild.classList.add('active');
    })();

    window.addEventListener('load', () => {
        // Start code tambah unit layanan
        // (() => {
        //     let $formTambahUitLayanan = document.getElementById('form-tambah-unit-layanan');
        //     $formTambahUitLayanan.addEventListener('submit', async (event) => {
        //         event.preventDefault();
        //         isLoading(true);
        //         // Elemen input dan validasi
        //         let $inputNama = $formTambahUitLayanan.querySelector('#input-nama');
        //         let $inputNamaValidasi = $formTambahUitLayanan.querySelector('#input-nama-validasi');
        //         // Data input
        //         let nama = $inputNama.value;
        //         try {
        //             await axios.post("{{ route('admin.skm.tambahUnitLayanan') }}", {nama}).then((response) => {
        //                 console.log(response);
        //                 Swal.fire({
        //                     title: 'Unit Layanan "' + response.data.nama + '" berhasil ditambahkan',
        //                     icon: "success"
        //                 }).then(() => {
        //                     window.location.href = "{{ route('admin.skm.kelolaDataLayanan') }}";
        //                 });
        //             }).finally(() => {
        //                 isLoading(false);
        //             });
        //         } catch (error) {
        //             console.error(error);
        //             if (error.response.data.errors) {
        //                 $inputNamaValidasi.innerHTML = error.response.data.errors['nama'];
        //                 $inputNama.classList.add('is-invalid');
        //             }
        //         }
        //     });
        // })();
        // End code tambah unit

        // Start code edit unit
        // (() => {
        //     let $modalEditUnitLayanan = document.getElementById('modal-edit-unit-layanan');
        //     let $formEditUnitLayanan = $modalEditUnitLayanan.querySelector('#form-edit-unit-layanan');
        //     $modalEditUnitLayanan.addEventListener('show.bs.modal', function (event) {
        //         // Ambil data dari atribut data-bs-*
        //         let button = event.relatedTarget;
        //         let unit_layanan = button.getAttribute('data-bs-unit-layanan');
        //         let unit_layanan_id = button.getAttribute('data-bs-unit-layanan-id');
        //         // Dapat melakukan panggilan ajax untuk mengisi data di modal jika diperlukan.
        //         // Elemen input dan validasi
        //         let $inputNama = $formEditUnitLayanan.querySelector('#input-nama');
        //         let $inputNamaValidasi = $formEditUnitLayanan.querySelector('#input-nama-validasi');
        //         // Isi data elemen
        //         $inputNama.value = unit_layanan;
        //         // Update data melalui ajax saat disubmit
        //         $formEditUnitLayanan.addEventListener('submit', async (event) => {
        //             isLoading(true);
        //             event.preventDefault();
        //             try {
        //                 await axios.put("{{ route('admin.skm.updateUnitLayanan') }}", {
        //                     id: unit_layanan_id,
        //                     nama: $inputNama.value,
        //                 }).then((response) => {
        //                     Swal.fire({
        //                         title: 'Unit layanan "' + $inputNama.value + '" berhasil diperbarui',
        //                         icon: "success",
        //                     }).then(() => {
        //                         window.location.href = "{{ route('admin.skm.kelolaDataLayanan') }}";
        //                     });
        //                 }).finally(() => {
        //                     isLoading(false);
        //                 });
        //             } catch (error) {
        //                 if (error.response.data.errors) {
        //                     $inputNama.classList.add('is-invalid');
        //                     $inputNamaValidasi.innerHTML = error.response.data.errors['nama'];
        //                 }
        //             }
        //         });
        //     });
        // })();
        // End code edit unit layanan

        // Start code hapus unit layanan
        // (() => {
        //     let $modalHapusUnitLayanan = document.getElementById('modal-hapus-unit-layanan');
        //     let $formHapusUnitLayanan = $modalHapusUnitLayanan.querySelector('#form-hapus-unit-layanan');
        //     $modalHapusUnitLayanan.addEventListener('show.bs.modal', function (event) {
        //         let button = event.relatedTarget;
        //         let unit_layanan = button.getAttribute('data-bs-unit-layanan');
        //         let unit_layanan_id = button.getAttribute('data-bs-unit-layanan-id');

        //         $formHapusUnitLayanan.querySelector('#input-nama').value = unit_layanan;

        //         $formHapusUnitLayanan.addEventListener('submit', async (event) => {
        //             event.preventDefault();
        //             isLoading(true);
        //             try {
        //                 await axios.delete("{{ route('admin.skm.hapusUnitLayanan') }}", {
        //                     data: {
        //                         id: unit_layanan_id,
        //                         nama: unit_layanan,
        //                     }
        //                 }).then((response) => {
        //                     console.log(response);
        //                     Swal.fire({
        //                         title: 'Unit layanan "' + unit_layanan + '" berhasil dihapus',
        //                         icon: "success"
        //                     }).then(() => {
        //                         window.location.href = "{{ route('admin.skm.kelolaDataLayanan') }}";
        //                     });
        //                 }).finally(() => {
        //                     isLoading(false);
        //                 });
        //             } catch (error) {
        //                 console.error(error);
        //             }
        //         });
        //     });
        // })();
        // End code hapus unit layanan

        // Start code tambah layanan
        // (() => {
        //     let $formTambahLayanan = document.getElementById('form-tambah-layanan');
        //     $formTambahLayanan.addEventListener('submit', async (event) => {
        //         event.preventDefault();
        //         isLoading(true);
        //         // Elemen input dan validasi
        //         let $inputPilihUnitLayanan = $formTambahLayanan.querySelector('#input-pilih-unit-layanan');
        //         let $inputPilihUnitLayananValidasi = $formTambahLayanan.querySelector('#input-pilih-unit-layanan-validasi');
        //         let $inputNama = $formTambahLayanan.querySelector('#input-nama');
        //         let $inputNamaValidasi = $formTambahLayanan.querySelector('#input-nama-validasi');
        //         // Reset status validasi form
        //         $inputPilihUnitLayanan.classList.remove('is-invalid');
        //         $inputPilihUnitLayanan.classList.add('is-valid');
        //         $inputNama.classList.remove('is-invalid');
        //         $inputNama.classList.add('is-valid');
        //         // Data yang diinput
        //         let unit_layanan = $inputPilihUnitLayanan.value;
        //         let nama = $inputNama.value;
        //         try {
        //             await axios.post("{{ route('admin.skm.tambahLayanan') }}", {unit_layanan, nama}).then((response) => {
        //                 Swal.fire({
        //                     title: 'Data Layanan "' + response.data.nama + '" berhasil ditambahkan',
        //                     icon: "success"
        //                 }).then(() => {
        //                     window.location.href = "{{ route('admin.skm.kelolaDataLayanan') }}";
        //                 });
        //             }).finally(() => {
        //                 isLoading(false);
        //             });
        //         } catch (error) {
        //             if (error.response.data.errors) {
        //                 if ('unit_layanan' in error.response.data.errors) {
        //                     $inputPilihUnitLayanan.classList.add('is-invalid');
        //                     $inputPilihUnitLayananValidasi.innerHTML = error.response.data.errors['unit_layanan'];
        //                 };
        //                 if ('nama' in error.response.data.errors) {
        //                     $inputNama.classList.add('is-invalid');
        //                     $inputNamaValidasi.innerHTML = error.response.data.errors['nama'];
        //                 };
        //             };
        //         }
        //     });
        // })();
        // End code tambah layanan

        // Start code edit layanan
        // (() => {
        //     let $modalEditLayanan = document.getElementById('modal-edit-layanan');
        //     let $formEditlayanan = $modalEditLayanan.querySelector('#form-edit-layanan');
        //     $modalEditLayanan.addEventListener('show.bs.modal', function (event) {
        //         // Ambil data dari atribut data-bs-*
        //         let button = event.relatedTarget;
        //         let layanan = button.getAttribute('data-bs-layanan');
        //         let layanan_id = button.getAttribute('data-bs-layanan-id');
        //         let unit_layanan = button.getAttribute('data-bs-unit-layanan');
        //         let unit_layanan_id = button.getAttribute('data-bs-unit-layanan-id');
        //         // Dapat melakukan panggilan ajax untuk mengisi data di modal jika diperlukan.
        //         // Elemen input dan validasi
        //         let $inputPilihUnitLayanan = $formEditlayanan.querySelector('#input-pilih-unit-layanan');
        //         let $inputPilihUnitLayananValidasi = $formEditlayanan.querySelector('#input-pilih-unit-layanan-validasi');
        //         let $inputNama = $formEditlayanan.querySelector('#input-nama');
        //         let $inputNamaValidasi = $formEditlayanan.querySelector('#input-nama-validasi');
        //         // Ganti judul modal
        //         $modalEditLayanan.querySelector('.modal-title').innerHTML = 'Edit layanan "<b>' + layanan + '</b>"';
        //         // Isi data elemen
        //         $inputPilihUnitLayanan.value = unit_layanan_id;
        //         $inputNama.value = layanan;
        //         // Update data melalui ajax saat disubmit
        //         $formEditlayanan.addEventListener('submit', async (event) => {
        //             event.preventDefault();
        //             isLoading(true);
        //             // Reset status validasi form
        //             $inputPilihUnitLayanan.classList.remove('is-invalid');
        //             $inputPilihUnitLayanan.classList.add('is-valid');
        //             $inputNama.classList.remove('is-invalid');
        //             $inputNama.classList.add('is-valid');
        //             try {
        //                 await axios.put("{{ route('admin.skm.updateLayanan') }}", {
        //                     id: layanan_id,
        //                     nama: $inputNama.value,
        //                     unit_layanan: $inputPilihUnitLayanan.value,
        //                 }).then((response) => {
        //                     Swal.fire({
        //                         title: 'Layanan "' + $inputNama.value + '" berhasil diperbarui',
        //                         icon: "success"
        //                     }).then(() => {
        //                         window.location.href = "{{ route('admin.skm.kelolaDataLayanan') }}";
        //                     });
        //                 }).finally(() => {
        //                     isLoading(false);
        //                 });
        //             } catch (error) {
        //                 if (error.response.data.errors) {
        //                     if ('unit_layanan' in error.response.data.errors) {
        //                         $inputPilihUnitLayanan.classList.add('is-invalid');
        //                         $inputPilihUnitLayananValidasi.innerHTML = error.response.data.errors['unit_layanan'];
        //                     };
        //                     if ('nama' in error.response.data.errors) {
        //                         $inputNama.classList.add('is-invalid');
        //                         $inputNamaValidasi.innerHTML = error.response.data.errors['nama'];
        //                     };
        //                 };
        //             }
        //         });
        //     });
        // })();
        // End code edit layanan

        // Start code hapus unit layanan
        // (() => {
        //     let $modalHapusLayanan = document.getElementById('modal-hapus-layanan');
        //     let $formHapusLayanan = $modalHapusLayanan.querySelector('#form-hapus-layanan');
        //     $modalHapusLayanan.addEventListener('show.bs.modal', function (event) {
        //         let button = event.relatedTarget;
        //         let layanan = button.getAttribute('data-bs-layanan');
        //         let layanan_id = button.getAttribute('data-bs-layanan-id');

        //         $formHapusLayanan.querySelector('#input-nama').value = layanan;

        //         $formHapusLayanan.addEventListener('submit', async (event) => {
        //             event.preventDefault();
        //             isLoading(true);
        //             try {
        //                 await axios.delete("{{ route('admin.skm.hapusLayanan') }}", {
        //                     data: {
        //                         id: layanan_id,
        //                         nama: layanan,
        //                     }
        //                 }).then((response) => {
        //                     Swal.fire({
        //                         title: 'Layanan "' + layanan + '" berhasil dihapus',
        //                         icon: "success"
        //                     }).then(() => {
        //                         window.location.href = "{{ route('admin.skm.kelolaDataLayanan') }}";
        //                     });
        //                 }).finally(() => {
        //                     isLoading(false);
        //                 });
        //             } catch (error) {
        //                 console.error(error);
        //             }
        //         });
        //     });
        // })();
        // End code hapus layanan
    });
</script>
@endsection