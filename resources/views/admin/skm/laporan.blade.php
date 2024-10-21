<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <title>DPMPTSP - Laporan SKM</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    
    <!-- Favicons -->
    <link href="{{ asset('NiceAdmin/assets/img/favicon-pemda.png') }}" rel="icon">
    <link href="{{ asset('NiceAdmin/assets/img/apple-touch-icon-pemda.png') }}" rel="apple-touch-icon">
    
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <!-- Vendor CSS Files -->
    <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('NiceAdmin/assets/vendor/datatables/datatables.min.css') }}">
    
    <!-- Template Main CSS File -->
    <link href="{{ asset('NiceAdmin/assets/css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * {
            scroll-margin-top: 100px;
        }
    </style>
</head>

<body>
    <div class="loading-overlay" id="full-page-loader">
        <div class="loader-text"></div>
    </div>

    <div class="card">
        <div class="card-body">
            <br>
            <table class="table table-bordered" id="tabel-laporan-skm" style="font-size: 14px; vertical-align: middle">
                <thead style="vertical-align: middle;">
                    <tr style="text-align: center">
                        <th colspan="10"><b>Laporan SKM {{ $unit_layanan }}</b></th>
                    </tr>
                    <tr>
                        <th colspan="1">Periode SKM</th>
                        <th colspan="9">{{ $awal_periode }} s.d. {{ $akhir_periode }}</th>
                    </tr>
                    <tr style="text-align: center">
                        <th rowspan="2">No. Responden</th>
                        <th colspan="9">Nilai Unsur Penilaian</th>
                    </tr>
                    <tr style="text-align: center">
                        @foreach ($data_per_unsur as $key => $item)
                        <th>{{ $key }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_per_responden as $item)
                    <tr style="text-align: center">
                        <td>{{ $loop->iteration }}</td>
                        @foreach ($item as $jawaban)
                        <td>{{ $jawaban->jawaban->bobot }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                    <tr style="text-align: center">
                        <td><b>Jumlah Nilai</b></td>
                        @foreach ($data_per_unsur as $key => $item)
                        <td><b>{{ $item['nilai_per_unsur'] }}</b></td>
                        @endforeach
                    </tr>
                    <tr style="text-align: center">
                        <td><b>Nilai Rata-rata</b></td>
                        @foreach ($data_per_unsur as $key => $item)
                        <td><b>{{ $item['nilai_rerata_per_unsur'] }}</b></td>
                        @endforeach
                    </tr>
                    <tr style="text-align: center">
                        <td><b>Nilai Indeks</b></td>
                        @foreach ($data_per_unsur as $key => $item)
                        <td><b>{{ $item['nilai_indeks_per_unsur'] }}</b></td>
                        @endforeach
                    </tr>
                </tbody>
                <tfoot>
                    <tr style="text-align: center">
                        <td colspan="1"><b>Indeks Kepuasan Masyarakat</b></td>
                        <td colspan="9"><b>{{ $nilai_ikm }} ({{ $mutu_pelayanan }})</b></td>
                    </tr>
                    <tr style="text-align: center">
                        <td colspan="1"><b>Kinerja Pelayanan</b></td>
                        <td colspan="9"><b>{{ $kinerja_pelayanan }}</b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
        
    <!-- Vendor JS Files -->
    <script src="{{ asset('NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/datatables/datatables.min.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('NiceAdmin/assets/js/main.js') }}"></script>
    <script>
        function isLoading(state) {
            let $loader = document.querySelector('#full-page-loader');
            if(state) {
                $loader.classList.add('is-active');
            } else {
                $loader.classList.remove('is-active');
            }
        }

        window.addEventListener('load', () => {
        //Start config datatable
        new DataTable('#tabel-laporan-skm', {
            layout: {
                topStart: 'buttons'
            },
            buttons: [
                { extend: 'excel', className: 'btn btn-success btn-sm', text: '<i class="bi bi-download"></i> Excel' }
            ],
            paging: false,
            ordering:  false,
            searching: false
        });
        //Start config datatable 
        });
    </script>
</body>
</html>