@extends('dashboard.layouts.main')

@section('title')
    Dashboard
@endsection

@section('titlePanelHeader')
    Dashboard
@endsection

@section('subTitlePanelHeader')
    <p style="font-size: 15px">Tahun :
        @php
            if ($tahun != '' && $tahun != 'Semua') {
                echo $tahun;
            } else {
                echo 'Semua';
            }
        @endphp
    </p>
@endsection

@section('buttonPanelHeader')
    <button class="btn btn-secondary btn-round" data-toggle="modal" data-target="#modal-filter"><i class="fas fa-filter"></i>
        Filter</button>
@endsection

@push('styles')
    <style>
        .circles-text {
            font-size: 15px;
        }
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                @if (!(
                    $totalMenungguKonfirmasiPerencanaanKeong == 0 &&
                    $totalMenungguKonfirmasiPerencanaanManusia == 0 &&
                    $totalMenungguKonfirmasiPerencanaanHewan == 0 &&
                    $totalMenungguKonfirmasiRealisasiKeong == 0 &&
                    $totalMenungguKonfirmasiRealisasiManusia == 0 &&
                    $totalMenungguKonfirmasiRealisasiManusia == 0 &&
                    $totalPerencanaanKeongTidakTerselesaikan == 0 &&
                    $totalPerencanaanManusiaTidakTerselesaikan == 0 &&
                    $totalPerencanaanHewanTidakTerselesaikan == 0
                ))
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <div class="card-title fw-bold text-primary"><i class="icon-bell"></i> Pemberitahuan
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-secondary {{ $totalPerencanaanKeongTidakTerselesaikan == 0 ? 'd-none' : '' }}"
                                    role="alert">
                                    <div class="row">
                                        <div class="col-10 pr-0">
                                            <span>
                                                <b>Perencanaan Habitat Keong:</b> Terdapat
                                                <b>{{ $totalPerencanaanKeongTidakTerselesaikan }}</b>
                                                perencanaan yang
                                                {{ Auth::user()->role == 'OPD'
                                                    ? ' belum diselesaikan pada tahun sebelumnya dan belum ditambahkan alasan mengapa tidak di selesaikan. Silahkan tambahkan alasan mengapa tidak menyelesaikannya'
                                                    : ' memberikan informasi mengenai alasan mengapa tidak menyelesaikan perencanaan tersebut pada tahun sebelumnya' }}.
                                            </span>
                                        </div>
                                        <div class="col-2 d-flex align-items-center pl-0">
                                            <a href="{{ url('rencana-intervensi-keong') }}"
                                                class="badge badge-secondary float-right"><i class="fas fa-info-circle"></i>
                                                Lihat
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-secondary {{ $totalPerencanaanManusiaTidakTerselesaikan == 0 ? 'd-none' : '' }}"
                                    role="alert">
                                    <div class="row">
                                        <div class="col-10 pr-0">
                                            <span>
                                                <b>Perencanaan Manusia:</b> Terdapat
                                                <b>{{ $totalPerencanaanManusiaTidakTerselesaikan }}</b>
                                                perencanaan yang
                                                {{ Auth::user()->role == 'OPD'
                                                    ? ' belum diselesaikan pada tahun sebelumnya dan belum ditambahkan alasan mengapa tidak di selesaikan. Silahkan tambahkan alasan mengapa tidak menyelesaikannya'
                                                    : ' memberikan informasi mengenai alasan mengapa tidak menyelesaikan perencanaan tersebut pada tahun sebelumnya' }}.
                                            </span>
                                        </div>
                                        <div class="col-2 d-flex align-items-center pl-0">
                                            <a href="{{ url('rencana-intervensi-manusia') }}"
                                                class="badge badge-secondary float-right"><i class="fas fa-info-circle"></i>
                                                Lihat
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-secondary {{ $totalPerencanaanHewanTidakTerselesaikan == 0 ? 'd-none' : '' }}"
                                    role="alert">
                                    <div class="row">
                                        <div class="col-10 pr-0">
                                            <span>
                                                <b>Perencanaan Lokasi Hewan Ternak:</b> Terdapat
                                                <b>{{ $totalPerencanaanHewanTidakTerselesaikan }}</b>
                                                perencanaan yang
                                                {{ Auth::user()->role == 'OPD'
                                                    ? ' belum diselesaikan pada tahun sebelumnya dan belum ditambahkan alasan mengapa tidak di selesaikan. Silahkan tambahkan alasan mengapa tidak menyelesaikannya'
                                                    : ' memberikan informasi mengenai alasan mengapa tidak menyelesaikan perencanaan tersebut pada tahun sebelumnya' }}.
                                            </span>
                                        </div>
                                        <div class="col-2 d-flex align-items-center pl-0">
                                            <a href="{{ url('rencana-intervensi-hewan') }}"
                                                class="badge badge-secondary float-right"><i class="fas fa-info-circle"></i>
                                                Lihat
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} {{ $totalMenungguKonfirmasiPerencanaanKeong == 0 ? 'd-none' : '' }}"
                                    role="alert">
                                    <div class="row">
                                        <div class="col-10 pr-0">
                                            <span>
                                                <b>Perencanaan Habitat Keong:</b> Terdapat
                                                <b>{{ $totalMenungguKonfirmasiPerencanaanKeong }}</b>
                                                perencanaan yang
                                                {{ Auth::user()->role == 'OPD' ? 'ditolak' : 'menunggu konfirmasi' }}.
                                                {{ Auth::user()->role == 'OPD' ? 'Silahkan ubah data tersebut dan kemudian perbarui datanya.' : '' }}
                                            </span>
                                        </div>
                                        <div class="col-2 d-flex align-items-center pl-0">
                                            <a href="{{ url('rencana-intervensi-keong') }}"
                                                class="badge badge-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} float-right"><i
                                                    class="fas fa-info-circle"></i>
                                                Lihat
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} {{ $totalMenungguKonfirmasiPerencanaanManusia == 0 ? 'd-none' : '' }}"
                                    role="alert">
                                    <div class="row">
                                        <div class="col-md-10 pr-0">
                                            <span>
                                                <b>Perencanaan Manusia:</b> Terdapat
                                                <b>{{ $totalMenungguKonfirmasiPerencanaanManusia }}</b>
                                                perencanaan yang
                                                {{ Auth::user()->role == 'OPD' ? 'ditolak' : 'menunggu konfirmasi' }}.
                                                {{ Auth::user()->role == 'OPD' ? 'Silahkan ubah data tersebut dan kemudian perbarui datanya.' : '' }}
                                            </span>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center pl-0">
                                            <a href="{{ url('rencana-intervensi-manusia') }}"
                                                class="badge badge-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} float-right"><i
                                                    class="fas fa-info-circle"></i>
                                                Lihat
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} {{ $totalMenungguKonfirmasiPerencanaanHewan == 0 ? 'd-none' : '' }}"
                                    role="alert">
                                    <div class="row">
                                        <div class="col-md-10 pr-0">
                                            <span>
                                                <b>Perencanaan Lokasi Hewan Ternak:</b> Terdapat
                                                <b>{{ $totalMenungguKonfirmasiPerencanaanHewan }}</b>
                                                perencanaan yang
                                                {{ Auth::user()->role == 'OPD' ? 'ditolak' : 'menunggu konfirmasi' }}.
                                                {{ Auth::user()->role == 'OPD' ? 'Silahkan ubah data tersebut dan kemudian perbarui datanya.' : '' }}
                                            </span>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center pl-0">
                                            <a href="{{ url('rencana-intervensi-hewan') }}"
                                                class="badge badge-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} float-right"><i
                                                    class="fas fa-info-circle"></i>
                                                Lihat
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} {{ $totalMenungguKonfirmasiRealisasiKeong == 0 ? 'd-none' : '' }}"
                                    role="alert">
                                    <div class="row">
                                        <div class="col-md-10 pr-0">
                                            <span>
                                                <b>Realisasi Habitat Keong:</b> Terdapat
                                                <b>{{ $totalMenungguKonfirmasiRealisasiKeong }}</b>
                                                laporan realisasi yang
                                                {{ Auth::user()->role == 'OPD' ? 'ditolak' : 'menunggu konfirmasi' }}.
                                                {{ Auth::user()->role == 'OPD' ? 'Silahkan ubah data tersebut dan kemudian perbarui datanya.' : '' }}
                                            </span>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center pl-0">
                                            <a href="{{ url('realisasi-intervensi-keong') }}"
                                                class="badge badge-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} float-right"><i
                                                    class="fas fa-info-circle"></i>
                                                Lihat
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} {{ $totalMenungguKonfirmasiRealisasiManusia == 0 ? 'd-none' : '' }}"
                                    role="alert">
                                    <div class="row">
                                        <div class="col-md-10 pr-0">
                                            <span>
                                                <b>Realisasi Manusia:</b> Terdapat
                                                <b>{{ $totalMenungguKonfirmasiRealisasiManusia }}</b>
                                                laporan realisasi yang
                                                {{ Auth::user()->role == 'OPD' ? 'ditolak' : 'menunggu konfirmasi' }}.
                                                {{ Auth::user()->role == 'OPD' ? 'Silahkan ubah data tersebut dan kemudian perbarui datanya.' : '' }}
                                            </span>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center pl-0">
                                            <a href="{{ url('realisasi-intervensi-manusia') }}"
                                                class="badge badge-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} float-right"><i
                                                    class="fas fa-info-circle"></i>
                                                Lihat
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} {{ $totalMenungguKonfirmasiRealisasiHewan == 0 ? 'd-none' : '' }}"
                                    role="alert">
                                    <div class="row">
                                        <div class="col-md-10 pr-0">
                                            <span>
                                                <b>Realisasi Lokasi Hewan Ternak:</b> Terdapat
                                                <b>{{ $totalMenungguKonfirmasiRealisasiHewan }}</b>
                                                laporan realisasi yang
                                                {{ Auth::user()->role == 'OPD' ? 'ditolak' : 'menunggu konfirmasi' }}.
                                                {{ Auth::user()->role == 'OPD' ? 'Silahkan ubah data tersebut dan kemudian perbarui datanya.' : '' }}
                                            </span>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center pl-0">
                                            <a href="{{ url('realisasi-intervensi-hewan') }}"
                                                class="badge badge-{{ Auth::user()->role == 'OPD' ? 'danger' : 'warning' }} float-right"><i
                                                    class="fas fa-info-circle"></i>
                                                Lihat
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @component('dashboard.components.dashboard.intervensi',
                    [
                        'intervensi' => $intervensi,
                        'tabelKeong' => $tabelKeong,
                        'tabelManusia' => $tabelManusia,
                        'tabelHewan' => $tabelHewan,
                        'tabelSemua' => $tabelSemua,
                    ])
                @endcomponent

                @component('dashboard.components.dashboard.anggaran',
                    [
                        'anggaranPerencanaan' => $anggaranPerencanaan,
                        'penggunaanAnggaran' => $penggunaanAnggaran,
                        'daftarSumberDana' => $daftarSumberDana,
                        'tabelAnggaranKeong' => $tabelAnggaranKeong,
                        'tabelAnggaranManusia' => $tabelAnggaranManusia,
                        'tabelAnggaranHewan' => $tabelAnggaranHewan,
                        'tabelAnggaranSemua' => $tabelAnggaranSemua,
                    ])
                @endcomponent

            </div>

        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title fw-bold">Lokasi</div>
                                {{-- <div class="card-tools">
                            @component('dashboard.components.buttons.export')
                            @endcomponent
                        </div> --}}
                            </div>
                        </div>
                        <div class="card-body px-4">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-success card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="far fa-map"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Desa</p>
                                                        <h4 class="card-title">{{ $lokasi['desa'] }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-secondary card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-map-pin"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Habitat Keong</p>
                                                        <h4 class="card-title">{{ $lokasi['lokasiKeong'] }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-info card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-paw"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Lokasi Hewan Ternak</p>
                                                        <h4 class="card-title">{{ $lokasi['lokasiHewan'] }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title fw-bold">Total Hewan Ternak</div>
                                {{-- <div class="card-tools">
                            @component('dashboard.components.buttons.export')
                            @endcomponent
                        </div> --}}
                            </div>
                        </div>
                        <div class="card-body px-4">
                            <div class="row">
                                @php
                                    $arrayWarna = ['success', 'danger', 'primary', 'warning', 'info'];
                                @endphp
                                @foreach ($totalHewan as $hewan)
                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div
                                            class="card card-stats card-{{ $arrayWarna[$loop->index % count($arrayWarna)] }} card-round">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="icon-big text-center">
                                                            <i class="fas fa-paw"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-8 col-stats">
                                                        <div class="numbers">
                                                            <p class="card-category">{{ $hewan['nama_hewan'] }}</p>
                                                            <h4 class="card-title">{{ $hewan['jumlah'] }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title fw-bold">Total Data</div>
                                {{-- <div class="card-tools">
                            @component('dashboard.components.buttons.export')
                            @endcomponent
                        </div> --}}
                            </div>
                        </div>
                        <div class="card-body px-4">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-danger card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-users"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Penduduk</p>
                                                        <h4 class="card-title">{{ $totalData['penduduk'] }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-warning card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-school"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Sekolah</p>
                                                        <h4 class="card-title">{{ $totalData['sekolah'] }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-info card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-graduation-cap"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Siswa Sekolah</p>
                                                        <h4 class="card-title">{{ $totalData['siswaSekolah'] }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card card-stats card-success card-round">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-building"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">OPD</p>
                                                        <h4 class="card-title">{{ $totalData['opd'] }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <form action="" method="GET">
        <div class="modal fade" id="modal-filter" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filter Dashboard</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @component('dashboard.components.formElements.select',
                            [
                                'label' => 'Tahun',
                                'id' => 'tahun',
                                'name' => 'tahun',
                                'class' => 'select2',
                                'wajib' => '<sup class="text-danger">*</sup>',
                            ])
                            @slot('options')
                                <option value="Semua">Semua</option>
                                @foreach ($daftarTahun as $tahun)
                                    <option value="{{ $tahun }}" {{ ($_GET['tahun'] ?? '') == $tahun ? 'selected' : '' }}>
                                        {{ $tahun }}</option>
                                @endforeach
                            @endslot
                        @endcomponent
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-border" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        $('#tab-semua').click(function() {
            $('#form-export-intervensi').attr('action', "{{ url('/dashboard/export/intervensi/semua') }}");
        })

        $('#tab-keong').click(function() {
            $('#form-export-intervensi').attr('action', "{{ url('/dashboard/export/intervensi/keong') }}");
        })

        $('#tab-manusia').click(function() {
            $('#form-export-intervensi').attr('action', "{{ url('/dashboard/export/intervensi/manusia') }}");
        })

        $('#tab-hewan').click(function() {
            $('#form-export-intervensi').attr('action', "{{ url('/dashboard/export/intervensi/hewan') }}");
        })

        $('#tab-anggaran-semua').click(function() {
            $('#form-export-anggaran').attr('action', "{{ url('/dashboard/export/anggaran/semua') }}");
        })

        $('#tab-anggaran-keong').click(function() {
            $('#form-export-anggaran').attr('action', "{{ url('/dashboard/export/anggaran/keong') }}");
        })

        $('#tab-anggaran-manusia').click(function() {
            $('#form-export-anggaran').attr('action', "{{ url('/dashboard/export/anggaran/manusia') }}");
        })

        $('#tab-anggaran-hewan').click(function() {
            $('#form-export-anggaran').attr('action', "{{ url('/dashboard/export/anggaran/hewan') }}");
        })
    </script>

    <script>
        $('.select2').select2({
            placeholder: "Semua",
            theme: "bootstrap",
            width: '100%'
        })
    </script>

    <script>
        $('.circles-text').css('font-size', '15px');
        $('.circles-text').css('font-weight', 'bold');
        $('#nav-dashboard').addClass('active');
    </script>
@endpush
