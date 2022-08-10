@extends('dashboard.layouts.main')

@section('titlePanelHeader')
    Realisasi Intervensi Keong
@endsection

@section('subTitlePanelHeader')
    Data yang muncul hanyalah data dari perencanaan intervensi yang telah disetujui.
@endsection

@section('buttonPanelHeader')
    {{-- <a href="#" class="btn btn-secondary btn-round"><i class="fas fa-plus"></i>
        Tambah</a> --}}
@endsection

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Berdasarkan Sub Indikator</div>
                        <div class="card-tools">
                            @component('dashboard.components.buttons.export')
                            @endcomponent
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped" id="{{ $id ?? 'dataTables' }}"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr class="text-center fw-bold">
                                            <th>No</th>
                                            <th>Tanggal Disetujui</th>
                                            <th>Sub Indikator</th>
                                            <th>OPD</th>
                                            {{-- <th>Total Dokumen</th> --}}
                                            <th>Titik Lokasi</th>
                                            <th>Persentase (%)</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Pembersihan Habitat Keong</td>
                                            <td class="text-center">Dinas Kebersihan</td>
                                            {{-- <td class="text-center">7</td> --}}
                                            <td class="text-center">8</td>
                                            <td class="text-center"><span
                                                    class="badge font-weight-bold badge-count">100</span></td>
                                            <td class="text-center"><span class="badge badge-success">Valid</span></td>
                                            <td class="text-center">
                                                <div class="my-2">
                                                    <a href="{{ url('realisasi-intervensi-keong/' . 1) }}"
                                                        class="btn btn-sm shadow btn-round btn-info" data-toggle="tooltip"
                                                        data-placement="top" title="Lihat">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    {{-- <a href="#" class="btn btn-sm shadow btn-round btn-warning"
                                                        data-toggle="tooltip" data-placement="top" title="Ubah">
                                                        <i class="fa fa-edit"></i>
                                                    </a> --}}
                                                    <a href="#" class="btn btn-sm shadow btn-round btn-danger"
                                                        data-toggle="tooltip" data-placement="top" title="Hapus">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Pemusnahan Keong</td>
                                            <td class="text-center">Dinas Kesehatan</td>
                                            {{-- <td class="text-center">3</td> --}}
                                            <td class="text-center">7</td>
                                            <td class="text-center"><span
                                                    class="badge font-weight-bold badge-count">100</span></td>
                                            <td class="text-center"><span class="badge badge-warning">Belum
                                                    Dikonfirmasi</span></td>
                                            <td class="text-center">
                                                <div class="my-2">
                                                    <a href="#" class="btn btn-sm shadow btn-round btn-secondary"
                                                        data-toggle="tooltip" data-placement="top" title="Konfirmasi">
                                                        <i class="fas fa-lg fa-clipboard-check"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Penaburan Obat</td>
                                            <td class="text-center">Dinas Kesehatan</td>
                                            {{-- <td class="text-center">0</td> --}}
                                            <td class="text-center">2</td>
                                            <td class="text-center"><span
                                                    class="badge font-weight-bold badge-count">100</span></td>
                                            <td class="text-center"><span class="badge badge-danger">Ditolak</span></td>
                                            <td class="text-center">
                                                <div class="my-2">
                                                    <a href="#" class="btn btn-sm shadow btn-round btn-info"
                                                        data-toggle="tooltip" data-placement="top" title="Lihat">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Penyuluhan Masyarakat</td>
                                            <td class="text-center">Dinas Sosial</td>
                                            {{-- <td class="text-center">3</td> --}}
                                            <td class="text-center">6</td>
                                            <td class="text-center"><span
                                                    class="badge font-weight-bold badge-count">90</span></td>
                                            <td class="text-center"><span class="badge badge-dark">Belum Selesai</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="my-2">
                                                    <a href="#" class="btn btn-sm shadow btn-round btn-info"
                                                        data-toggle="tooltip" data-placement="top" title="Lihat">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
    </script>
@endpush
