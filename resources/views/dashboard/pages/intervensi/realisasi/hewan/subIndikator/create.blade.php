@extends('dashboard.layouts.main')

@section('title')
    Tambah Laporan Realisasi Intervensi Lokasi Hewan Ternak
@endsection

@section('titlePanelHeader')
    Tambah Laporan Realisasi Intervensi Lokasi Hewan Ternak
@endsection

@section('subTitlePanelHeader')
    {{-- {{ $rencanaIntervensiHewan->sub_indikator }} --}}
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
                        <div class="card-title">Form Laporan Realisasi Intervensi Lokasi Hewan Ternak</div>
                    </div>
                </div>
                <div class="card-body pt-1">
                    <div class="row">
                        <div class="col">
                            @component('dashboard.components.forms.realisasiHewan',
                                [
                                    'action' => route('realisasi-intervensi-hewan.store'),
                                    'desa' => $desa,
                                    'opd' => $opd,
                                    'listPerencanaan' => $listPerencanaan,
                                    'method' => 'POST',
                                    'submitLabel' => 'Kirim Data',
                                    'submitIcon' => '<i class="fas fa-paper-plane"></i> ',
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
        $('#nav-realisasi .collapse #li-hewan-2').addClass('active');

        var tableLokasiRealisasi = $('#tabelLokasiTerealisasi').DataTable({
            "dom": "ftip",
            "bPaginate": false,
        });
    </script>
@endpush
