@extends('dashboard.layouts.main')

@section('title')
    Realisasi Intervensi Manusia
@endsection

@section('titlePanelHeader')
    Laporan Realisasi Intervensi Manusia
@endsection

@section('subTitlePanelHeader')
    {{ $realisasi_intervensi_manusia->perencanaanManusia->sub_indikator }}
@endsection

@section('buttonPanelHeader')
    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-round"><i class="fas fa-arrow-left mr-1"></i>
        Kembali</a>
@endsection

@push('styles')
    <style>
        #peta {
            height: 600px;
            margin-top: 0px;
        }
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Info Detail</div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-bordered">
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Laporan:
                            <span
                                class="font-weight-bold">{{ Carbon\Carbon::parse($realisasi_intervensi_manusia->created_at)->translatedFormat('j F Y') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Sub Indikator:<span
                                class="font-weight-bold">{{ $realisasi_intervensi_manusia->perencanaanManusia->sub_indikator }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Jumlah Penduduk:<span
                                class="font-weight-bold">
                                {{ $realisasi_intervensi_manusia->pendudukRealisasiManusia->count() }}
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">OPD Pembuat:<span
                                class="font-weight-bold">{{ $realisasi_intervensi_manusia->perencanaanManusia->opd->nama }}</span>
                        </li>
                        @if ($realisasi_intervensi_manusia->perencanaanManusia->opdTerkaitManusia->count() > 0)
                            <li class="list-group-item d-flex justify-content-between align-items-center">OPD Terkait
                                ({{ $realisasi_intervensi_manusia->perencanaanManusia->opdTerkaitManusia->count() }}):<span
                                    class="font-weight-bold">
                                    <ul>
                                        @foreach ($realisasi_intervensi_manusia->perencanaanManusia->opdTerkaitManusia as $item)
                                            <li class="d-flex justify-content-end align-items-end">
                                                {{ $item->opd->nama . ' ' }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">Nilai
                            Anggaran:<span class="font-weight-bold"><span>Rp. </span>
                                <span
                                    class="rupiah">{{ $realisasi_intervensi_manusia->perencanaanManusia->nilai_pembiayaan }}</span></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Sumber Dana:<span
                                class="font-weight-bold">{{ $realisasi_intervensi_manusia->perencanaanManusia->sumberDana->nama }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Status:
                            @if ($realisasi_intervensi_manusia->status == 1)
                                <span class="font-weight-bold badge badge-success">Disetujui</span>
                            @elseif($realisasi_intervensi_manusia->status == 2)
                                <span class="font-weight-bold badge badge-danger">Ditolak</span>
                            @else
                                <span class="font-weight-bold badge badge-warning">Menunggu Konfirmasi</span>
                            @endif
                        </li>
                        @if ($realisasi_intervensi_manusia->status == 2)
                            <li class="list-group-item d-flex justify-content-between align-items-center">Alasan Ditolak:
                                <span
                                    class="font-weight-bold text-danger">{{ $realisasi_intervensi_manusia->alasan_ditolak }}</span>
                            </li>
                        @endif
                        @if ($realisasi_intervensi_manusia->status != 0)
                            <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal
                                Konfirmasi:<span
                                    class="font-weight-bold">{{ Carbon\Carbon::parse($realisasi_intervensi_manusia->tanggal_konfirmasi)->translatedFormat('j F Y') }}</span>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">List Dokumen Laporan Realisasi</div>

                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-bordered">
                        @forelse ($realisasi_intervensi_manusia->dokumenRealisasiManusia as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $item->nama }}
                                <a href="{{ Storage::url('uploads/dokumen/realisasi/manusia/' . $item->file) }}"
                                    target="_blank" class="badge badge-primary" data-toggle="tooltip" data-placement="top"
                                    title="Download">
                                    <i class="fas fa-download"></i>

                                </a>
                            </li>
                        @empty
                            <h5 class="text-center">Tidak Ada Dokumen</h5>
                        @endforelse

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Penduduk Realisasi Intervensi Manusia</div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="tabelLokasiTerealisasi" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr class="text-center fw-bold">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Desa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataPendudukRealisasi as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $item->penduduk->nama }}</td>
                                        <td class="text-center">{{ $item->penduduk->nik }}</td>
                                        <td class="text-center">{{ $item->penduduk->desa->nama }}</td>
                                        <td class="text-center"><button type="button"
                                                class="btn btn-primary btn-rounded btn-sm mr-1" id="btn-lihat"
                                                value="{{ $item->penduduk->id }}"><i class="far fa-eye"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if ($realisasi_intervensi_manusia->status == 0 && Auth::user()->role == 'Admin')
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Konfirmasi Laporan Realisasi</div>

                        </div>
                    </div>
                    <div class="card-body pt-0">
                        @component('dashboard.components.forms.confirm',
                            [
                                'action' => url('realisasi-intervensi-manusia/konfirmasi/' . $realisasi_intervensi_manusia->id),
                            ])
                        @endcomponent
                    </div>
                </div>
            </div>
        @endif
    </div>

    @component('dashboard.components.modals.detailPenduduk')
    @endcomponent

@endsection

@push('scripts')
    <script>
        $('#nav-realisasi').addClass('active');
        $('#nav-realisasi .collapse').addClass('show');
        $('#nav-realisasi .collapse #li-manusia-2').addClass('active');

        var tableLokasiRealisasi = $('#tabelLokasiTerealisasi').DataTable({});
    </script>
@endpush
