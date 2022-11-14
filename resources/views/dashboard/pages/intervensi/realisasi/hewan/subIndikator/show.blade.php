@extends('dashboard.layouts.main')

@section('title')
    Realisasi Intervensi Lokasi Hewan Ternak
@endsection

@section('titlePanelHeader')
    Laporan Realisasi Intervensi Lokasi Hewan Ternak
@endsection

@section('subTitlePanelHeader')
    {{ $realisasi_intervensi_hewan->perencanaanHewan->sub_indikator }}
@endsection

@section('buttonPanelHeader')
    <a href="{{ url('/realisasi-intervensi-hewan') }}" class="btn btn-secondary btn-round mr-2"><i
            class="fas fa-arrow-left mr-1"></i>
        Kembali</a>
@endsection

@push('styles')
    <style>
        #peta {
            height: 600px;
            margin-top: 0px;
        }

        #tabelLokasi_wrapper .dataTables_filter {
            width: 100% !important;
            margin-bottom: 10px !important;
            text-align: center !important;
        }

        .select2-container {
            width: 100% !important;
            padding: 0;
        }
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Info Detail</div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-bordered">
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal Pelaporan:
                            <span
                                class="font-weight-bold">{{ Carbon\Carbon::parse($realisasi_intervensi_hewan->created_at)->translatedFormat('j F Y') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Sub Indikator:<span
                                class="font-weight-bold">{{ $realisasi_intervensi_hewan->perencanaanHewan->sub_indikator }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Jumlah Titik
                            Lokasi:<span
                                class="font-weight-bold">{{ $realisasi_intervensi_hewan->lokasiRealisasiHewan->count() }}
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">OPD Pembuat:<span
                                class="font-weight-bold">{{ $realisasi_intervensi_hewan->perencanaanHewan->opd->nama }}</span>
                        </li>
                        @if ($realisasi_intervensi_hewan->perencanaanHewan->opdTerkaitHewan->count() > 0)
                            <li class="list-group-item d-flex justify-content-between align-items-center">OPD Terkait
                                ({{ $realisasi_intervensi_hewan->perencanaanHewan->opdTerkaitHewan->count() }}):<span
                                    class="font-weight-bold">
                                    <ul>
                                        @foreach ($realisasi_intervensi_hewan->perencanaanHewan->opdTerkaitHewan as $item)
                                            <li class="d-flex justify-content-end align-items-end">
                                                {{ $item->opd->nama . ' ' }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $realisasi_intervensi_hewan->perencanaanHewan->status == 1 ? 'Nilai Anggaran:' : 'Rencana Anggaran:' }}<span
                                class="font-weight-bold"><span>Rp. </span>
                                <span
                                    class="rupiah">{{ $realisasi_intervensi_hewan->perencanaanHewan->nilai_pembiayaan }}</span></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Sumber Dana:<span
                                class="font-weight-bold">{{ $realisasi_intervensi_hewan->perencanaanHewan->sumberDana->nama }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Status:
                            @if ($realisasi_intervensi_hewan->status == 1)
                                <span class="font-weight-bold badge badge-success">Disetujui</span>
                            @elseif($realisasi_intervensi_hewan->status == 2)
                                <span class="font-weight-bold badge badge-danger">Ditolak</span>
                            @else
                                <span class="font-weight-bold badge badge-warning">Menunggu Konfirmasi</span>
                            @endif
                        </li>
                        @if ($realisasi_intervensi_hewan->status == 2)
                            <li class="list-group-item d-flex justify-content-between align-items-center">Alasan Ditolak:
                                <span
                                    class="font-weight-bold text-danger">{{ $realisasi_intervensi_hewan->alasan_ditolak }}</span>
                            </li>
                        @endif
                        @if ($realisasi_intervensi_hewan->status != 0)
                            <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal
                                Konfirmasi:<span
                                    class="font-weight-bold">{{ Carbon\Carbon::parse($realisasi_intervensi_hewan->tanggal_konfirmasi)->translatedFormat('j F Y') }}</span>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">List Dokumen Realisasi</div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-bordered">
                        @forelse ($realisasi_intervensi_hewan->dokumenRealisasiHewan as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $item->nama }}
                                <a href="{{ Storage::url('uploads/dokumen/realisasi/hewan/' . $item->file) }}"
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
                        <div class="card-title">Titik Lokasi Realisasi Intervensi Hewan Ternak</div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-profile-tab-nobd" data-toggle="pill"
                                        href="#pills-tabel" role="tab" aria-controls="pills-tabel"
                                        aria-selected="false">Peta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-jumlah-tab-nobd" data-toggle="pill" href="#pills-jumlah"
                                        role="tab" aria-controls="pills-jumlah" aria-selected="false">Tabel</a>
                                </li>
                            </ul>
                            <div class="tab-content mb-3" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-tabel" role="tabpanel"
                                    aria-labelledby="pills-profile-tab-nobd">
                                    <div id="peta"></div>
                                </div>
                                <div class="tab-pane fade" id="pills-jumlah" role="tabpanel"
                                    aria-labelledby="pills-jumlah-tab-nobd">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped" id="{{ $id ?? 'dataTables' }}"
                                            cellspacing="0" width="100%">
                                            <thead>
                                                <tr class="text-center fw-bold" role="row">
                                                    <td>No</td>
                                                    <td>Nama</td>
                                                    <td>Desa</td>
                                                    <td>Deskripsi</td>
                                                    <td>Latitude / Longitude</td>
                                                    <td>Pemilik Lahan</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($realisasi_intervensi_hewan->lokasiRealisasiHewan as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->lokasiHewan->nama }}</td>
                                                        <td>{{ $item->lokasiHewan->desa->nama }}</td>
                                                        <td>{{ $item->lokasiHewan->deskripsi == '' ? '-' : $item->lokasiHewan->deskripsi }}
                                                        </td>
                                                        <td>{{ $item->lokasiHewan->latitude }} /
                                                            {{ $item->lokasiHewan->longitude }}</td>
                                                        <td>
                                                            @forelse ($item->lokasiHewan->pemilikLokasiHewan as $item2)
                                                                <p class="m-0 p-0">-{{ $item2->penduduk->nama }}</p>
                                                            @empty
                                                                -
                                                            @endforelse
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($realisasi_intervensi_hewan->status == 0 && Auth::user()->role == 'Admin')
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Konfirmasi Perencanaan</div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        @component('dashboard.components.forms.confirm',
                            [
                                'action' => url('realisasi-intervensi-hewan/konfirmasi/' . $realisasi_intervensi_hewan->id),
                            ])
                        @endcomponent
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        $('#nav-realisasi').addClass('active');
        $('#nav-realisasi .collapse').addClass('show');
        $('#nav-realisasi .collapse #li-hewan-2').addClass('active');

        var table = $('#dataTables').DataTable({})

        $(document).ready(function() {
            initializeMap();
        })

        var map = null;

        function initializeMap() {
            if (map != undefined || map != null) {
                map.remove();
            }

            var center = [-1.3618072, 120.1619337];

            map = L.map("peta", {
                maxBounds: [
                    [-1.511127, 119.9637063],
                    [-1.21458, 120.2912363]
                ]
            }).setView(center, 11);
            map.addControl(new L.Control.Fullscreen());

            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
                maxZoom: 18,
                minZoom: 11
            }).addTo(map);

            var pin = L.Icon.extend({
                options: {
                    iconSize: [50, 50],
                    iconAnchor: [22, 94],
                    shadowAnchor: [4, 62],
                    popupAnchor: [-3, -76],
                },
            });

            var pinIcon = new pin({
                iconUrl: "{{ asset('assets/dashboard/img/pin/pin_red_x.png') }}",
                iconSize: [40, 40],
                iconAnchor: [16, 40],
                popupAnchor: [-4, -20]
            });

            map.invalidateSize();

            $.ajax({
                url: "{{ url('/map/desa') }}",
                type: "GET",
                success: function(response) {
                    if (response.status == 'success') {
                        for (var i = 0; i < response.data.length; i++) {
                            L.polygon(response.data[i].koordinatPolygon, {
                                    color: response.data[i].warna_polygon,
                                    weight: 1,
                                    opacity: 1,
                                    fillOpacity: 1
                                })
                                .bindTooltip(response.data[i].nama, {
                                    permanent: true,
                                    direction: "center",
                                    className: 'labelPolygon'
                                })
                                .addTo(map);
                        }
                    }
                },
            })

            $.ajax({
                url: "{{ url('realisasi-intervensi-hewan/map/' . $realisasi_intervensi_hewan->id) }}",
                type: "GET",
                success: function(response) {
                    if (response.status == 'success') {
                        for (var i = 0; i < response.data.length; i++) {
                            var pemilikHewan = '';
                            if (response.data[i].pemilik_lokasi_hewan.length > 0) {
                                pemilikHewan += '<hr class="my-1">';
                                pemilikHewan += "<p class='my-0 fw-bold'>Pemilik Lahan : </p>";
                                for (var j = 0; j < response.data[i].pemilik_lokasi_hewan.length; j++) {
                                    pemilikHewan += "<p class='my-0'> -" + response.data[i]
                                        .pemilik_lokasi_hewan[
                                            j].penduduk.nama + "</p>";
                                }
                            }

                            icon = pinIcon;
                            L.marker([response.data[i].latitude, response.data[i].longitude], {
                                    icon: icon
                                })
                                .bindPopup(
                                    "<p class='fw-bold my-0 text-center'>" + response.data[i].nama +
                                    "</p><hr class='my-1'>" +
                                    "<p class='my-0 fw-bold'>Desa : </p>" +
                                    "<p class='my-0'>" + response.data[i].desa
                                    .nama + "</p>" +
                                    "<p class='my-0 fw-bold'>Latitude : </p>" +
                                    "<p class='my-0'>" + response.data[i].latitude + "</p>" +
                                    "<p class='my-0 fw-bold'>Longitude : </p>" +
                                    "<p class='my-0'>" + response.data[i].longitude + "</p>" +
                                    pemilikHewan
                                )
                                // .on('click', L.bind(petaKlik, null, data[0][i].id))
                                .addTo(map);
                        }
                    }
                },
            })
        }
    </script>
@endpush
