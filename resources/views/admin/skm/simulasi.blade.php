@extends('admin.master')

@section('title', 'Simulasi SKM')

@section('main')
<div class="pagetitle">
    <h1><b>SIMULASI SKM</b></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Simulasi SKM</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Survei Kepuasan Masyarakat (SKM)</h5>
                        <p class="text-center small">Mohon meluangkan waktu Anda untuk mengisi SKM DPMPTSP Kabupaten Pulang Pisau. Hasil SKM akan sangat berguna menjadi acuan bagi kami untuk meningkatkan kualitas pelayanan.</p>
                    </div>
                    <div class="progress">
                        <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%;">0%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 offset-lg-2">
            <form class="row g-3" id="form-skm">
                <div class="card" id="div1">
                    <div class="card-body">
                        <div class="pt-4 pb-2"><h6 class="text-center pb-0 fs-4">I. PROFIL RESPONDEN</h6></div>
                        <p class="text-center small">Diisi sesuai dengan identitas Anda.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="input-jk" class="form-label">Pilih Jenis Kelamin</label>
                                <select class="form-select" id="input-jk" aria-label="Pilih jenis kelamin" aria-describedby="input-jk-validasi">
                                    <option value="">...</option>
                                    @foreach (App\Models\SKM\SKMResponden::opsiKelamin() as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>    
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Jenis Kelamin wajib diisi!</div>
                            </div><br>
                            <div class="col-md-6">
                                <label for="input-usia" class="form-label">Usia (dalam tahun)</label>
                                <select class="form-select" id="input-usia" aria-label="Masukan usia anda" aria-describedby="input-usia-validasi">
                                    <option value="">...</option>
                                    @for ($i = 17; $i < 100; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <div class="invalid-feedback">Data usia wajib diisi!</div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="input-pendidikan" class="form-label">Pendidikan Terakhir</label>
                                <select class="form-select" id="input-pendidikan" aria-label="Pendidikan Terakhir" aria-describedby="input-pendidikan-validasi">
                                    <option value="">...</option>
                                    @foreach (App\Models\SKM\SKMResponden::opsiPendidikan() as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>    
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Pendidikan wajib diisi!</div>
                            </div>
                            <div class="col-md-6">
                                <label for="input-pekerjaan" class="form-label">Pekerjaan</label>
                                <select class="form-select" id="input-pekerjaan" aria-label="Pekerjaan" aria-describedby="input-pekerjaan-validasi">
                                    <option value="">...</option>
                                    @foreach (App\Models\SKM\SKMResponden::opsiPekerjaan() as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>    
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Pekerjaan wajib diisi!</div>
                            </div>
                        </div>
                        <br>
                        <div class="col-12">
                            <label for="input-layanan" class="form-label"><b>Pilih Layanan Yang Ingin/Telah Anda Terima</b></label>
                            <select class="form-select" id="input-layanan" aria-label="Pilih Layanan Yang Ingin/Telah Anda Terima" aria-describedby="input-layanan-validasi">
                                <option selected value="">...</option>
                                @foreach ($all_layanan as $layanan)
                                <option value="{{ $layanan->id }}">{{ $layanan->nama }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Layanan wajib diisi!</div>
                        </div>
                        <br>
                        <div class="col-12 text-center">
                            <div class="d-grid gap-2 d-md-block">
                                <button class="btn btn-success" type="button" id="btn-lanjut">Lanjut</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" id="div2" style="display: none">
                    <div class="card-body">
                        <div class="pt-4 pb-2"><h6 class="text-center pb-0 fs-4">II. PENDAPAT RESPONDEN TENTANG PELAYANAN</h6></div>
                        <p class="text-center small">Pilih salah satu jawaban di setiap pertanyaan berikut dengan sebenar-benarnya.</p>
                        @foreach ($all_pertanyaan as $pertanyaan)
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-md-12" id="pertanyaan">
                                <label id="pesan-error" style="color: red; display: none">Pertanyaan ini wajib dijawab!</label>
                                <label for="pertanyaan-{{ $pertanyaan->id }}" class="form-label">{{ $loop->iteration }}. {{ $pertanyaan->pertanyaan }}</label><br>
                                @foreach ($pertanyaan->pilihanJawaban as $item)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawaban-pertanyaan-{{ $pertanyaan->id }}" id="{{ $pertanyaan->id }}" value="{{ $item->id }}">
                                    <label class="form-check-label" for="{{ $pertanyaan->id }}">{{ $item->jawaban }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="d-grid gap-2 d-md-block">
                                    <button class="btn btn-warning" type="button" id="btn-kembali">Kembali</button>
                                    <button class="btn btn-success" type="button" id="btn-kirim">Kirim</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    // Start code aktifkan sidebar
    (() => {
        let $sidebar = document.querySelector('#sidebar')
        let $currentSidebarParent = $sidebar.querySelector('.skm-links');
        let $currentSidebarParentUl = $currentSidebarParent.nextElementSibling;
        let $currentSidebarChild = $sidebar.querySelector('.admin-skm-simulasi');

        $currentSidebarParent.classList.remove('collapsed');
        $currentSidebarParentUl.classList.add('show');
        $currentSidebarChild.classList.add('active');
    })();
    // End code aktifkan sidebar

    // Start code isi SKM
    (() => {
        // Dapatkan elemen
        let $formSKM = document.querySelector('#form-skm');
        let $div1 = $formSKM.querySelector('#div1');
        let $div2 = $formSKM.querySelector('#div2');
        let $btnLanjut = $formSKM.querySelector('#btn-lanjut');
        let $btnKembali = $formSKM.querySelector('#btn-kembali');
        let $btnKirim = $formSKM.querySelector('#btn-kirim');
        let $progressBar = document.querySelector('#progress-bar');
        let progress = 0;
        
        // Dapatkan elemen di div1
        let $inputJK = $formSKM.querySelector('#input-jk');
        let $inputUsia = $formSKM.querySelector('#input-usia');
        let $inputPendidikan = $formSKM.querySelector('#input-pendidikan');
        let $inputPekerjaan = $formSKM.querySelector('#input-pekerjaan');
        let $inputLayanan = $formSKM.querySelector('#input-layanan');
        let $inputsDiv1 = [$inputJK, $inputUsia, $inputPendidikan, $inputPekerjaan, $inputLayanan];
        let emptyInputDiv1 = 0;
        const survey = {responden: {}, jawaban: {}};
        
        // Action btn-lanjut dari div1
        $btnLanjut.addEventListener('click', () => {
            emptyInputDiv1 = 0;
            for (let i = 0; i < $inputsDiv1.length; i++) {
                if ($inputsDiv1[i].value == '') {
                    $inputsDiv1[i].classList.add('is-invalid');
                    emptyInputDiv1 += 1;
                } else {
                    $inputsDiv1[i].classList.remove('is-invalid');
                    $inputsDiv1[i].classList.add('is-valid');
                    Object.defineProperty(survey.responden, $inputsDiv1[i].id, {value: $inputsDiv1[i].value, enumerable: true, configurable: true});
                }
            }
            if (emptyInputDiv1 < 1) {
                $div1.style.display = 'none';
                $div2.style.display = 'block';
                $progressBar.style.width = '50%';
                $progressBar.textContent = '50%';
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            }
        });

        // Action btn-kembali dari div2
        $btnKembali.addEventListener('click', () => {
            $div1.style.display = 'block';
            $div2.style.display = 'none';
            $progressBar.style.width = '0%';
            $progressBar.textContent = '0%';
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        })

        // Action btn-kirim dari div2
        $btnKirim.addEventListener('click', () => {
            let $semuaPertanyaan = $formSKM.querySelectorAll('#pertanyaan');

            for (let i = 0; i < $semuaPertanyaan.length; i++) {
                let $pesanError = $semuaPertanyaan[i].querySelector('#pesan-error');
                $pesanError.style.display = "none";
                let $inputs = $semuaPertanyaan[i].querySelectorAll('input');
                let unchecked_input = $inputs.length;
                for (let j = 0; j < $inputs.length; j++) {
                    if ($inputs[j].checked == false) {
                        unchecked_input -= 1;
                    } else {
                        Object.defineProperty(survey.jawaban, $inputs[j].id, {value: $inputs[j].value, enumerable: true, configurable: true});
                    }
                }
                if (unchecked_input == 0) {
                    $pesanError.style.display = "block";
                    $pesanError.scrollIntoView({block: "start"});
                    break;
                }
            }
            if (Object.keys(survey.jawaban).length == $semuaPertanyaan.length) {
                isLoading(true);
                axios.post("{{ route('admin.skm.simpanDataSKM') }}", {survey}).then((response) => {
                    console.log(response);
                    Swal.fire({
                        title: 'Survey telah terkirim, terimakasih atas partisipasi Anda!',
                        icon: "success"
                    }).then(() => {
                        // window.location.href = "{{ route('admin.skm.simulasi') }}";
                    });
                }).catch((error) => {
                    console.error(error);
                }).finally(() => {
                    isLoading(false);
                });
            }
        });
    })();
    // End code isi SKM
</script>
@endsection