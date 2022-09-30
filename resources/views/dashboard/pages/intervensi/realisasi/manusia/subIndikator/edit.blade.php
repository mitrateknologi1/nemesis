@extends('dashboard.layouts.main')

@section('title')
    Ubah Laporan Realisasi Intervensi Manusia
@endsection

@section('titlePanelHeader')
    Ubah Laporan Realisasi Intervensi Manusia | <span style="text-decoration: underline">Laporan Tanggal:
        {{ Carbon\Carbon::parse($realisasiIntervensiManusia->created_at)->translatedFormat('j F Y') }}</span>
@endsection

@section('subTitlePanelHeader')
    {{ $realisasiIntervensiManusia->perencanaanManusia->sub_indikator }}
@endsection

@section('buttonPanelHeader')
    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-round"><i class="fas fa-arrow-left mr-1"></i>
        Kembali</a>
@endsection

@push('styles')
    <style>
        #tabelLokasiTerealisasi_wrapper .dataTables_filter {
            width: 100% !important;
            margin-bottom: 10px !important;
            text-align: center !important;
        }
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Form Laporan Realisasi Intervensi Manusia</div>
                    </div>
                </div>
                <div class="card-body pt-1">
                    @if ($realisasiIntervensiManusia->status == 2)
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger mt-3 font-weight-bold" role="alert">Alasan Ditolak: <span
                                        class="text-danger">{{ $realisasiIntervensiManusia->alasan_ditolak }}</span></div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            @component('dashboard.components.forms.realisasiManusia',
                                [
                                    'action' => route('realisasi-intervensi-manusia.update', $realisasiIntervensiManusia->id),
                                    'realisasiIntervensiManusia' => $realisasiIntervensiManusia,
                                    'listPerencanaan' => $listPerencanaan,
                                    'opdTerkaitManusia' => $opdTerkaitManusia,
                                    'opd' => $opd,
                                    'desa' => $desa,
                                    'penduduk' => $pendudukRealisasiManusia,
                                    'maxDokumen' => $realisasiIntervensiManusia->dokumenRealisasiManusia()->count(),
                                    'method' => 'PUT',
                                    'submitLabel' => 'Perbarui Data',
                                    'submitIcon' => '<i class="fas fa-save"></i> ',
                                ])
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#nav-realisasi').addClass('active');
        $('#nav-realisasi .collapse').addClass('show');
        $('#nav-realisasi .collapse #li-manusia-2').addClass('active');
    </script>
@endpush
