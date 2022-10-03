@extends('dashboard.layouts.main')

@section('title')
    Siswa {{ $sekolah->nama }}
@endsection

@section('titlePanelHeader')
    Siswa {{ $sekolah->nama }}
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
    <a href="{{ url('master-data/sekolah' . '/' . $jenjang) }}" class="btn btn-secondary btn-round mr-2" id=""><i
            class="far fa-arrow-alt-circle-left"></i>
        Kembali</a>
    @if (Auth::user()->role == 'Admin')
        @component('dashboard.components.buttons.add',
            [
                'url' => url('master-data/siswa/' . $sekolah->id . '/create'),
            ])
        @endcomponent
    @endif
@endsection

@push('styles')
    <style>
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Siswa {{ $sekolah->nama }}
                        </div>
                        <div class="card-tools">
                            <div class="row">
                                @if (Auth::user()->role == 'Admin')
                                    @component('dashboard.components.buttons.selected',
                                        [
                                            'id' => 'deleteSelected',
                                            'icon' => '<i class="fas fa-trash"></i>',
                                            'color' => 'danger',
                                            'title' => 'Hapus yang dipilih',
                                        ])
                                    @endcomponent
                                @endif
                                <button type="button" class="btn btn-info btn-border btn-round btn-sm ml-2"
                                    id="import-siswa" data-toggle="modal" data-target="#modal-import">
                                    <i class="fas fa-file-import"></i>
                                    Import Siswa
                                </button>
                                <form action="{{ url('master-data/siswa/' . $sekolah->id . '/export') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-border btn-round btn-sm ml-2 mr-2">
                                        <i class="fas fa-lg fa-download"></i>
                                        Export Data Siswa
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="card fieldset">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped" id="table-data" width="100%">
                                                <thead>
                                                    <tr class="text-center fw-bold">
                                                        <th><input type="checkbox" id="checkAllData" autocomplete="off" />
                                                        </th>
                                                        <td>No</td>
                                                        <td>Nama</td>
                                                        <td>NIK</td>
                                                        <td>Jenis Kelamin</td>
                                                        <td>Desa</td>
                                                        <td>Aksi</td>
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
                        <div class="tab-pane fade" id="pills-jumlah" role="tabpanel"
                            aria-labelledby="pills-jumlah-tab-nobd">
                            <div class="my-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-import" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <span class="text-subtitle">Silahkan Download Format Excel <a
                                href="{{ asset('assets/dashboard') }}/file/format_import_siswa.xlsx">Disini</a>
                            untuk
                            Mengimport Data
                            Siswa</span>
                        <br>
                        <hr>
                        @component('dashboard.components.formElements.input',
                            [
                                'id' => 'file_import',
                                'name' => 'file_import',
                                'type' => 'file',
                                'label' => 'File Import',
                                'class' => 'form-control',
                                // 'attribute' => 'required',
                                'wajib' => '<sup class="text-danger">*</sup>',
                            ])
                        @endcomponent
                    </div>
                    <div class="modal-footer">
                        @component('dashboard.components.buttons.close')
                        @endcomponent
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @component('dashboard.components.modals.detailPenduduk')
    @endcomponent
@endsection

@push('scripts')
    <script>
        $('#form-import').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('sekolah', "{{ $idSekolah }}");
            swal({
                title: 'Apakah Anda Yakin ?',
                icon: 'warning',
                text: "Apakah Anda Yakin ?",
                type: 'warning',
                buttons: {
                    cancel: {
                        visible: true,
                        text: 'Batal',
                        className: 'btn btn-light'
                    },
                    confirm: {
                        text: 'Ya',
                        className: 'btn btn-info'
                    },
                }
            }).then((Update) => {
                if (Update) {
                    $.ajax({
                        url: "{{ url('master-data/siswa/import') }}",
                        type: 'POST',
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response);
                            if (response.status == 'success') {
                                $('#modal-import').modal('hide');
                                swal("Berhasil", "Data Berhasil Di import", {
                                    icon: "success",
                                    buttons: false,
                                    timer: 1000,
                                });
                                window.location.replace(
                                    "{{ url('/master-data/siswa' . '/' . $idSekolah) }}");
                            } else {
                                printErrorMsg(response.error);
                            }
                        },
                        error: function(response) {
                            swal("Gagal", "Data Gagal Ditambahkan", {
                                icon: "error",
                                buttons: false,
                                timer: 1000,
                            });
                        }
                    })
                }
            });
        })
    </script>

    <script>
        $('#deleteSelected').click(function() {
            var id = [];
            $('.checkData:checked').each(function() {
                id.push($(this).val());
            });
            if (id == '') {
                swal({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Belum ada data yang dipilih!',
                })
            } else {
                swal({
                    title: 'Apakah Anda Yakin ?',
                    icon: 'error',
                    text: "Data yang sudah dihapus tidak dapat dikembalikan lagi !",
                    type: 'warning',
                    buttons: {
                        confirm: {
                            text: 'Hapus',
                            className: 'btn btn-success'
                        },
                        cancel: {
                            visible: true,
                            text: 'Batal',
                            className: 'btn btn-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {
                        $.ajax({
                            url: "{{ url('master-data/siswa' . '/' . $sekolah->id . '/delete-selected') }}",
                            type: 'POST',
                            data: {
                                'id': id,
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.status == 'success') {
                                    swal("Berhasil", "Data Berhasil Dihapus", {
                                        icon: "success",
                                        buttons: false,
                                        timer: 1000,
                                    }).then(function() {
                                        table.draw();
                                    })
                                } else {
                                    swal("Gagal", "Data Gagal Dihapus", {
                                        icon: "error",
                                        buttons: false,
                                        timer: 1000,
                                    });
                                }
                            },
                            error: function(response) {
                                swal("Gagal", "Data Gagal Diproses, Silahkan Coba Kembali", {
                                    icon: "error",
                                    buttons: false,
                                    timer: 1000,
                                });
                            }
                        })
                    }
                });
            }
        });

        $(document).on('click', '#btn-delete', function() {
            let id = $(this).val();
            swal({
                title: 'Apakah Anda Yakin ?',
                icon: 'error',
                text: "Data yang sudah dihapus tidak dapat dikembalikan lagi !",
                type: 'warning',
                buttons: {
                    cancel: {
                        visible: true,
                        text: 'Batal',
                        className: 'btn btn-light'
                    },
                    confirm: {
                        text: 'Hapus',
                        className: 'btn btn-danger'
                    },
                }
            }).then((Delete) => {
                if (Delete) {
                    $.ajax({
                        url: "{{ url('master-data/siswa' . '/' . $sekolah->id) }}" + '/' + id,
                        type: 'DELETE',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                swal("Berhasil", "Data Berhasil Dihapus", {
                                    icon: "success",
                                    buttons: false,
                                    timer: 1000,
                                }).then(function() {
                                    table.draw();
                                })
                            } else {
                                swal("Gagal", "Data Gagal Dihapus", {
                                    icon: "error",
                                    buttons: false,
                                    timer: 1000,
                                });
                            }
                        },
                        error: function(response) {
                            swal("Gagal", "Data Gagal Diproses, Silahkan Coba Kembali", {
                                icon: "error",
                                buttons: false,
                                timer: 1000,
                            });
                        }
                    })
                }
            });
        })
    </script>

    <script>
        var table = $('#table-data').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: "{{ url('master-data/siswa' . '/' . $sekolah->id) }}",
            columns: [{
                    data: 'checkData',
                    render: function(data, row, type) {
                        return '<input type="checkbox" class="checkData" value="' + data +
                            '">';
                    },
                    className: 'text-center',
                }, {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    class: 'text-center'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'nik',
                    name: 'nik',
                    class: 'text-center'
                },
                {
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin',
                    class: 'text-center'
                },
                {
                    data: 'desa',
                    name: 'desa',
                    class: 'text-center'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true,
                    class: 'text-center'
                },
            ]
        });

        $('#checkAllData').click(function() {
            if ($(this).is(':checked')) {
                $('.checkData').prop('checked', true);
            } else {
                $('.checkData').prop('checked', false);
            }
        });

        var role = "{{ Auth::user()->role }}";

        $(document).ready(function() {
            $('#modal-lihat .modal-title').html('Detail Siswa');
            if (role != "Admin") {
                table.column(0).visible(false);
            }
        })
    </script>

    <script>
        $('#nav-master-sekolah').addClass('active');
    </script>
@endpush
