@extends('dashboard.layouts.main')

@section('title')
    Tambah Laporan Realisasi Intervensi Hewan
@endsection

@section('titlePanelHeader')
    Tambah Laporan Realisasi Intervensi Hewan
@endsection

@section('subTitlePanelHeader')
    {{ $rencanaIntervensiHewan->sub_indikator }}
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
                        <div class="card-title">Form Laporan Realisasi Intervensi Hewan</div>
                    </div>
                </div>
                <div class="card-body pt-1">
                    <div class="row">
                        <div class="col">
                            @component('dashboard.components.forms.realisasiHewan',
                                [
                                    'action' => route('realisasi-intervensi-hewan.store'),
                                    'rencanaIntervensiHewan' => $rencanaIntervensiHewan,
                                    'countSisaAnggaran' => $countSisaAnggaran,
                                    'desa' => $desa,
                                    'lokasiArr' => $lokasiPerencanaanHewanArr,
                                    'dataMap' => $dataMap,
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
    <div class="row">
        <div class="col-md-4 order-md-2">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Lokasi Yang Belum Terealisasi</div>
                    </div>
                </div>
                <div class="card-body px-2">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="tabelLokasiTerealisasi" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr class="text-center fw-bold">
                                    <th>No</th>
                                    <th>Nama Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rencanaIntervensiHewan->lokasiPerencanaanHewan->whereNull('realisasi_hewan_id') as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $item->lokasiHewan->nama }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Titik Koordinat Yang Belum Terealisasi</div>
                    </div>
                </div>
                <div class="card-body px-2">
                    <div id="peta"></div>
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
