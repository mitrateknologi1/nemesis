@extends('dashboard.layouts.main')

@section('title')
    Ubah Penduduk
@endsection

@section('titlePanelHeader')
    Ubah Penduduk
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
    {{-- <a href="#" class="btn btn-secondary btn-round"><i class="fas fa-plus"></i>
        Tambah</a> --}}
@endsection

@push('styles')
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Ubah Penduduk</div>
                    </div>
                </div>
                <div class="card-body">
                    @component('dashboard.components.forms.penduduk')
                        @slot('daftarDesa', $daftarDesa)
                        @slot('form_id', 'form-tambah')
                        @slot('action', url('/master-data/penduduk/' . $data['id']))
                        @slot('method', 'PUT')
                        @slot('back_url', url('/master-data/penduduk'))
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#nama').val("{{ $data['nama'] }}");
            $('#nik').val("{{ $data['nik'] }}");
            $('#jenis_kelamin').val("{{ $data['jenis_kelamin'] }}").trigger('change');
            $('#tanggal_lahir').val("{{ $data['tanggal_lahir'] }}");
            $('#status_pendidikan').val("{{ $data['status_pendidikan'] }}").trigger('change');
            $('#pekerjaan').val("{{ $data['pekerjaan'] }}").trigger('change');
            $('#desa_id').val("{{ $data['desa_id'] }}").trigger('change');
        })
    </script>

    <script>
        $('#nav-master-penduduk').addClass('active');
    </script>
@endpush
