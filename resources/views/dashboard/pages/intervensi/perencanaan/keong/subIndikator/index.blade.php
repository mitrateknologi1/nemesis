@extends('dashboard.layouts.main')

@section('title')
    Perencanaan Intervensi Keong
@endsection

@section('titlePanelHeader')
    Perencanaan Intervensi Keong
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
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
                        <div class="card-title">Data Perencanaan Intervensi Keong</div>
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
                                            <th>Tanggal Pembuatan</th>
                                            <th>Sub Indikator</th>
                                            <th>OPD</th>
                                            <th>Lokasi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                            <td>1</td>
                                            <td>Pembersihan Kolam</td>
                                            <td class="text-center">Dinas Kebersihan</td>
                                            <td class="text-center">5</td>
                                            <td class="text-center">2</td>
                                            <td class="text-center"><span class="badge badge-success">Disetujui</span></td>
                                            <td class="text-center">
                                                <div class="my-2">
                                                    <a href="#" class="btn btn-sm shadow btn-round btn-info"
                                                        data-toggle="tooltip" data-placement="top" title="Lihat">
                                                        <i class="fas fa-eye"></i>
                                                    </a> <a href="#" class="btn btn-sm shadow btn-round btn-warning"
                                                        data-toggle="tooltip" data-placement="top" title="Ubah">
                                                        <i class="fa fa-edit"></i>
                                                    </a> <a href="#" class="btn btn-sm shadow btn-round btn-danger"
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
                                            <td class="text-center">7</td>
                                            <td class="text-center">3</td>
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
                                            <td class="text-center">2</td>
                                            <td class="text-center">0</td>
                                            <td class="text-center"><span class="badge badge-danger">Ditolak</span></td>
                                            <td class="text-center">
                                                <div class="my-2">
                                                    <a href="#" class="btn btn-sm shadow btn-round btn-info"
                                                        data-toggle="tooltip" data-placement="top" title="Lihat">
                                                        <i class="fas fa-eye"></i>
                                                    </a> <a href="#" class="btn btn-sm shadow btn-round btn-warning"
                                                        data-toggle="tooltip" data-placement="top" title="Ubah">
                                                        <i class="fa fa-edit"></i>
                                                    </a> <a href="#" class="btn btn-sm shadow btn-round btn-danger"
                                                        data-toggle="tooltip" data-placement="top" title="Hapus">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>

                                            </td>
                                        </tr> --}}
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
        $('#nav-perencanaan').addClass('active');
        $('#nav-perencanaan .collapse').addClass('show');
        $('#nav-perencanaan .collapse #li-keong').addClass('active');

        var table = $('#dataTables').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            ajax: {
                url: "{{ route('rencana-intervensi-keong.index') }}",
                // data: function(d) {
                //     d.lokasiTugas = $('#lokasi-tugas').val();
                //     d.search = $('input[type="search"]').val();
                // }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },
                {
                    data: 'sub_indikator',
                    name: 'sub_indikator',
                },
                {
                    data: 'opd',
                    name: 'opd',
                },
                {
                    data: 'lokasi_keong',
                    name: 'lokasi_keong',
                },
                {
                    data: 'status',
                    name: 'status',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                },



            ],
            columnDefs: [{
                    targets: [3, 5],
                    className: 'text-center',
                },
                {
                    targets: [1],
                    render: function(data) {
                        return moment(data).format('LL');
                    }
                },
            ],
        });
    </script>
@endpush
