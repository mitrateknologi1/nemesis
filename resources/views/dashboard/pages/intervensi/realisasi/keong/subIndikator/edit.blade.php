@extends('dashboard.layouts.main')

@section('title')
    Ubah Laporan Realisasi Intervensi Habitat Keong
@endsection

@section('titlePanelHeader')
    Ubah Laporan Realisasi Intervensi Habitat Keong | <span style="text-decoration: underline">Laporan Tanggal:
        {{ Carbon\Carbon::parse($realisasiIntervensiKeong->created_at)->translatedFormat('j F Y') }}</span>
@endsection

@section('subTitlePanelHeader')
    {{ $realisasiIntervensiKeong->perencanaanKeong->sub_indikator }}
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
                        <div class="card-title">Form Laporan Realisasi Intervensi Habitat Keong</div>
                    </div>
                </div>
                <div class="card-body pt-1">
                    @if ($realisasiIntervensiKeong->status == 2)
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger mt-3 font-weight-bold" role="alert">Alasan Ditolak: <span
                                        class="text-danger">{{ $realisasiIntervensiKeong->alasan_ditolak }}</span></div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            @component('dashboard.components.forms.realisasiKeong',
                                [
                                    'action' => route('realisasi-intervensi-keong.update', $realisasiIntervensiKeong->id),
                                    'realisasiIntervensiKeong' => $realisasiIntervensiKeong,
                                    'listPerencanaan' => $listPerencanaan,
                                    'opdTerkaitKeong' => $opdTerkaitKeong,
                                    'opd' => $opd,
                                    'desa' => $desa,
                                    'lokasi' => $lokasiRealisasiKeong,
                                    'maxDokumen' => $realisasiIntervensiKeong->dokumenRealisasiKeong()->count(),
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
        $('#nav-realisasi .collapse #li-keong-2').addClass('active');

        var tableLokasiRealisasi = $('#tabelLokasiTerealisasi').DataTable({
            "dom": "ftip",
            "bPaginate": false,
        });
    </script>
@endpush
