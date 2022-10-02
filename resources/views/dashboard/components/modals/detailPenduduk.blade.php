{{-- Modal Penduduk --}}
<div class="modal fade" tabindex="-1" id="modal-lihat">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Penduduk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Nama : </p>
                    <p id="nama">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">NIK : </p>
                    <p id="nik">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Jenis Kelamin : </p>
                    <p id="jenis-kelamin">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Tanggal Lahir : </p>
                    <p id="ttl">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Pendidikan Terakhir : </p>
                    <p id="pendidikan">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Pekerjaan : </p>
                    <p id="pekerjaan">
                        -
                    </p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class=" mb-0">Desa : </p>
                    <p id="desa">
                        -
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                @component('dashboard.components.buttons.close')
                @endcomponent
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).on('click', '#btn-lihat', function() {
            let id = $(this).val();
            $.ajax({
                url: "{{ url('master-data/penduduk') }}" + '/' + id,
                type: 'GET',
                success: function(response) {
                    if (response.status == 'success') {
                        $('#nama').html(response.data.nama);
                        $('#nik').html(response.data.nik);
                        $('#jenis-kelamin').html(response.data.jenis_kelamin);
                        $('#ttl').html(response.data.ttl);
                        $('#pendidikan').html(response.data.pendidikan);
                        $('#pekerjaan').html(response.data.pekerjaan);
                        $('#desa').html(response.data.desa);
                        $('#modal-lihat').modal('show');
                    }
                },
                error: function(response) {
                    swal("Gagal", "Data Gagal Diambil, Silahkan Coba Kembali", {
                        icon: "error",
                        buttons: false,
                        timer: 1000,
                    });
                }
            })
        })
    </script>
@endpush
