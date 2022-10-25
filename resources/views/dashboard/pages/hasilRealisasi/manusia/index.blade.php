@extends('dashboard.layouts.main')

@section('title')
    Hasil Realisasi Pada Manusia
@endsection

@section('titlePanelHeader')
    Hasil Realisasi Pada Manusia
@endsection

@section('subTitlePanelHeader')
    <p style="font-size: 15px">Tahun : <span id="tahunLabel">
            @php
                if ($tahun != '' && $tahun != 'Semua') {
                    echo $tahun;
                } else {
                    echo 'Semua';
                }
            @endphp
        </span>
    </p>
@endsection

@section('buttonPanelHeader')
    <button class="btn btn-secondary btn-round" data-toggle="modal" data-target="#modal-filter"><i class="fas fa-filter"></i>
        Filter Tahun</button>
@endsection

@push('styles')
    <style>
        .dataTables_wrapper {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }


        .select2-container {
            width: 100% !important;
        }
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Hasil Realisasi Pada Manusia <div
                                class="title-card-tahun d-inline fw-bold"></div>
                        </div>
                        <div class="card-tools">
                            <form action="{{ url('export-hasil-realisasi-manusia') }}" method="POST">
                                @csrf
                                <input type="hidden" name="tahun_filter" value="" class="tahun-filter-export">
                                <button type="submit" class="btn btn-info btn-border btn-round btn-sm mr-2"
                                    id="export-penduduk" value="" name="desa_id">
                                    <i class="fas fa-lg fa-download"></i>
                                    Export Data Hasil Realisasi
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
                                    <option value="Semua">Semua</option>
                                    @foreach ($filterOpd as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['opd'] }}</option>
                                    @endforeach
                                @endslot
                            @endcomponent
                        </div>
                        <div class="col-md-6">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'Sub Indikator',
                                    'id' => 'indikator-filter',
                                    'name' => 'indikator_filter',
                                    'class' => 'select2 filter',
                                ])
                                @slot('options')
                                    <option value="Semua">Semua</option>
                                    @foreach ($filterSubIndikator as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['sub_indikator'] }}</option>
                                    @endforeach
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
                                            <th>Nama</th>
                                            <th>List Sub Indikator Intervensi</th>
                                            <th>List OPD</th>
                                            <th>Tanggal Intervensi</th>
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

    {{-- Modal Filter Tahun --}}
    <form action="" method="GET">
        <div class="modal fade" id="modal-filter" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filter Dashboard</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @component('dashboard.components.formElements.select',
                            [
                                'label' => 'Tahun',
                                'id' => 'tahun',
                                'name' => 'tahun',
                                'class' => 'select2',
                                'wajib' => '<sup class="text-danger">*</sup>',
                            ])
                            @slot('options')
                                <option value="Semua">Semua</option>
                                @foreach ($daftarTahun as $tahun)
                                    <option value="{{ $tahun }}" {{ ($_GET['tahun'] ?? '') == $tahun ? 'selected' : '' }}>
                                        {{ $tahun }}</option>
                                @endforeach
                            @endslot
                        @endcomponent
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-border" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        $('#nav-hasil-realisasi-manusia').addClass('active');

        let tahun = $('#tahunLabel').text().trim()
        $('.tahun-filter-export').val(tahun)

        if (tahun != "Semua") {
            $('.title-card-tahun').text(' | Tahun: ' + tahun)
        }

        $('.select2').select2({
            placeholder: "Semua",
            theme: "bootstrap",
        })

        var table = $('#dataTables').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            ajax: {
                url: "{{ url('hasil-realisasi-manusia') }}",
                data: function(d) {
                    d.tahun_filter = tahun
                    d.opd_filter = $('#opd-filter').val();
                    d.indikator_filter = $('#indikator-filter').val();
                    d.search_filter = $('input[type="search"]').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama',
                    name: 'nama',
                },
                {
                    data: 'list_indikator',
                    name: 'list_indikator',
                },
                {
                    data: 'list_opd',
                    name: 'list_opd',
                },
                {
                    data: 'tanggal_intervensi',
                    name: 'tanggal_intervensi',
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
                title: 'Apakah Anda yakin?',
                text: "Data yang dipilih akan dihapus!",
                icon: "warning",
                dangerMode: true,
                buttons: ["Batal", "Ya"],
            }).then((result) => {
                if (result) {
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('rencana-intervensi-manusia') }}" + '/' + id,
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
                                $('#checkAllData').prop('checked', false);
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
