@extends('dashboard.layouts.main')

@section('titlePanelHeader')
    Dinas Kebersihan
@endsection

@section('subTitlePanelHeader')
    Pembersihan Habitat Keong <span class="font-weight-bold">(100%)</span>
@endsection

@section('buttonPanelHeader')
    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-round"><i class="fas fa-arrow-left mr-1"></i>
        Kembali</a>
@endsection

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Berdasarkan TW (Triwulan)</div>
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
                                            <th>TW</th>
                                            <th>Total Dokumen</th>
                                            <th>Titik Lokasi</th>
                                            <th>Presentase (%)</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">2</td>
                                            <td class="text-center">4</td>
                                            <td class="text-center">5</td>
                                            <td class="text-center"><span
                                                    class="badge font-weight-bold badge-count">62.5</span></td>
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
                                            <td class="text-center">2</td>
                                            <td class="text-center">3</td>
                                            <td class="text-center">3</td>
                                            <td class="text-center">3</td>
                                            <td class="text-center"><span
                                                    class="badge font-weight-bold badge-count">37,5</span></td>
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
