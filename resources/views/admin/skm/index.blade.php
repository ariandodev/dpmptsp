@extends('admin.master')

@section('title', 'Hasil SKM')

@section('css')
    <link rel="stylesheet" href="{{ asset('NiceAdmin/assets/vendor/datatables/datatables.min.css') }}">
@endsection

@section('main')
<div class="pagetitle">
    <h1><b>HASIL SKM</b></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Hasil SKM</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Hasil Penilaian SKM MPP (Ongoing):</h2>
                    <h3 class="text-center"><b>Nilai IKM: {{ $nilai_ikm_berjalan }}, Mutu Pelayanan: {{ $mutu_pelayanan }}, Kinerja Pelayanan: {{ $kinerja_pelayanan }}</b></h3>
                    <br>
                    <form id="form-laporan" method="POST" action="{{ route('admin.skm.buatLaporanSKM') }}">
                        @csrf
                        <p>Buat Laporan SKM dengan mengisi kolom-kolom berikut sebagai parameter (opsional)</p>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="input-unit-layanan" class="form-label">Pilih Unit Layanan</label>
                                <select class="form-select" id="input-unit-layanan" name="input-unit-layanan">
                                    <option value="">Semua (MPP)</option>
                                    @foreach ($all_unit_layanan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="input-awal-periode" class="form-label">Awal Periode SKM</label>
                                <input type="date" class="form-control" id="input-awal-periode" name="input-awal-periode">
                            </div>
                            <div class="col-md-4">
                                <label for="input-akhir-periode" class="form-label">Akhir Periode SKM</label>
                                <input type="date" class="form-control" id="input-akhir-periode" name="input-akhir-periode">
                            </div>
                        </div>
                        <br>
                        <div class="col-12 text-center">
                            <div class="d-grid gap-2 d-md-block">
                                <button class="btn btn-primary btn-sm" type="submit"><i class="bi bi-file-text"></i> Buat Laporan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Hasil SKM</h5>
                    <table class="table" id="tabel-hasil-skm" style="font-size: 14px">
                        <thead style="vertical-align: middle;">
                            <tr>
                                <th>#</th>
                                <th>Unit Layanan</th>
                                <th>Layanan</th>
                                <th>Unsur Penilaian</th>
                                <th>Tanggapan Responden</th>
                                <th>Bobot Tanggapan</th>
                                <th>Usia Responden</th>
                                <th>Jenis Kelamin Responden</th>
                                <th>Pekerjaan Responden</th>
                                <th>Pendidikan Responden</th>
                                <th>Waktu Survey</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hasil_skm as $item)
                            <tr @if ($item->jawaban->bobot == 4) class="table-info" @elseif ($item->jawaban->bobot == 3) class="table-primary" @elseif ($item->jawaban->bobot == 2) class="table-warning" @elseif ($item->jawaban->bobot == 1) class="table-danger" @endif>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->layanan->unitLayanan->nama }}</td>
                                <td>{{ $item->layanan->nama }}</td>
                                <td>{{ $item->pertanyaan->unsur->unsur }}</td>
                                <td>{{ $item->jawaban->jawaban }}</td>
                                <td>{{ $item->jawaban->bobot }}</td>
                                <td>{{ $item->responden->usia }}</td>
                                <td>{{ $item->responden->jenis_kelamin }}</td>
                                <td>{{ $item->responden->pekerjaan }}</td>
                                <td>{{ $item->responden->pendidikan }}</td>
                                <td>{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at, 'Asia/Jakarta')->toDateString() }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="aksi">
                                        <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
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
@endsection

@section('js')
<script src="{{ asset('NiceAdmin/assets/vendor/datatables/datatables.min.js') }}"></script>
<script>
    (() => {
        let $sidebar = document.querySelector('#sidebar')
        let $currentSidebarParent = $sidebar.querySelector('.skm-links');
        let $currentSidebarParentUl = $currentSidebarParent.nextElementSibling;
        let $currentSidebarChild = $sidebar.querySelector('.admin-skm');

        $currentSidebarParent.classList.remove('collapsed');
        $currentSidebarParentUl.classList.add('show');
        $currentSidebarChild.classList.add('active');
    })();

    window.addEventListener('load', () => {
        // Start config datatable
        new DataTable('#tabel-hasil-skm', {
            layout: {
                topStart: 'buttons'
            },
            buttons: [
                { extend: 'excel', className: 'btn btn-success btn-sm', text: '<i class="bi bi-download"></i> Excel' }
            ],
            scrollY: 600,
            ordering:  false,
            language: {
                info: 'Halaman _PAGE_ dari _PAGES_',
                infoEmpty: 'Data tidak ditemukan',
                infoFiltered: '(Difilter dari _MAX_ total jumlah data)',
                lengthMenu: 'Menampilkan _MENU_ data perhalaman',
                zeroRecords: 'Data tidak ditemukan',
                search: 'Cari'
            },
        });
        // Start config datatable
    });
</script>
@endsection