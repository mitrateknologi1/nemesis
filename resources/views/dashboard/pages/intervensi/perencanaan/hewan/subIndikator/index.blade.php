@extends('dashboard.layouts.main')

@section('title')
    Perencanaan Intervensi Hewan
@endsection

@section('titlePanelHeader')
    Perencanaan Intervensi Hewan
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
    @if (Auth::user()->role == 'OPD')
        <a href="{{ route('rencana-intervensi-hewan.create') }}" class="btn btn-secondary btn-round"><i
                class="fas fa-plus"></i>
            Tambah</a>
    @endif
@endsection

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Perencanaan Intervensi Hewan</div>
                        <div class="card-tools">
                            <form action="{{ url('export-perencanaan-hewan') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-info btn-border btn-round btn-sm mr-2"
                                    id="export-penduduk" value="" name="desa_id">
                                    <i class="fas fa-lg fa-download"></i>
                                    Export Data Perencanaan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'OPD',
                                    'id' => 'opd-filter',
                                    'name' => 'opd_filter',
                                    'class' => 'select2 filter',
                                ])
                                @slot('options')
                                    <option value="semua">Semua</option>
                                    @foreach ($perencanaanHewan->groupBy('opd_id')->get() as $item)
                                        <option value="{{ $item->opd_id }}">{{ $item->opd->nama }}</option>
                                    @endforeach
                                @endslot
                            @endcomponent
                        </div>
                        <div class="col-md-6">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'Status',
                                    'id' => 'status-filter',
                                    'name' => 'status_filter',
                                    'class' => 'select2 filter',
                                ])
                                @slot('options')
                                    <option value="semua">Semua</option>
                                    <option value="-">Menunggu Konfirmasi</option>
                                    <option value="1">Disetujui</option>
                                    <option value="2">Ditolak</option>
                                @endslot
                            @endcomponent
                        </div>
                    </div>
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
                                            <th>Pembiayaan</th>
                                            {{-- <th>Jumlah Lokasi</th> --}}
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
        $('#nav-perencanaan .collapse #li-hewan').addClass('active');

        var table = $('#dataTables').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            ajax: {
                url: "{{ route('rencana-intervensi-hewan.index') }}",
                data: function(d) {
                    d.opd_filter = $('#opd-filter').val();
                    d.status_filter = $('#status-filter').val();
                    d.search_filter = $('input[type="search"]').val();
                },
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
                    data: 'nilai_pembiayaan',
                    name: 'nilai_pembiayaan',
                    className: 'text-right',
                    render: $.fn.dataTable.render.number('.', ',', 0, 'Rp.')
                },
                // {
                //     data: 'jumlah_lokasi',
                //     name: 'jumlah_lokasi',
                // },
                // {
                //     data: 'lokasi_hewan',
                //     name: 'lokasi_hewan',
                // },
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
                    targets: [3, 4, 5],
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

        $('.filter').change(function() {
            table.draw();
        })


        $(document).on('click', '.btn-delete', function() {
            let id = $(this).val();
            var _token = "{{ csrf_token() }}";
            swal({
                title: 'Apakah anda yakin ingin menghapus perencanaan ?',
                text: "Data perencanaan yang dihapus juga akan menghapus data laporan realisasinya (jika ada)!",
                icon: "warning",
                dangerMode: true,
                buttons: ["Batal", "Ya"],
            }).then((result) => {
                if (result) {
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('rencana-intervensi-hewan') }}" + '/' + id,
                        data: {
                            _token: _token
                        },
                        success: function(data) {
                            swal({
                                title: "Berhasil!",
                                text: "Data yang dipilih berhasil dihapus.",
                                icon: "success",
                            }).then(function() {
                                table.ajax.reload();
                            });
                        }
                    })
                } else {
                    swal("Data batal dihapus.", {
                        icon: "error",
                    });
                }
            })
        })
    </script>
@endpush
