@extends('dashboard.layouts.main')

@section('title')
    Lokasi Hewan
@endsection

@section('titlePanelHeader')
    Lokasi Hewan
@endsection

@section('subTitlePanelHeader')
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. --}}
@endsection

@section('buttonPanelHeader')
    {{-- <a href="#" class="btn btn-secondary btn-round"><i class="fas fa-plus"></i>
        Tambah</a> --}}
@endsection

@push('styles')
    <style>
        #map {
            height: 300px;
            margin-top: 0px;
        }

        .labelPolygon {
            background-color: transparent;
            border-color: transparent;
            box-shadow: none;
            z-index: 999;
        }
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Ubah Lokasi Hewan</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="row g-3" id="form-tambah">
                                        @method('PUT')
                                        @csrf
                                        <div class="col-12">
                                            @component('dashboard.components.formElements.input',
                                                [
                                                    'label' => 'Nama Lokasi Hewan',
                                                    'type' => 'text',
                                                    'id' => 'nama',
                                                    'name' => 'nama',
                                                    'wajib' => '<sup class="text-danger">*</sup>',
                                                    'placeholder' => 'Masukkan Nama Lokasi Hewan',
                                                    'value' => $lokasiHewan->nama,
                                                ])
                                            @endcomponent
                                        </div>
                                        <div class="col-12">
                                            @component('dashboard.components.formElements.textArea',
                                                [
                                                    'id' => 'deskripsi',
                                                    'type' => 'text',
                                                    'label' => 'Deskripsi Lokasi',
                                                    'placeholder' => 'Deskripsi Lokasi',
                                                    'name' => 'deskripsi',
                                                    'required' => true,
                                                    'value' => $lokasiHewan->deskripsi,
                                                ])
                                            @endcomponent
                                        </div>
                                        <div class="col-12">
                                            @component('dashboard.components.formElements.select',
                                                [
                                                    'label' => 'Desa',
                                                    'id' => 'desa_id',
                                                    'name' => 'desa_id',
                                                    'class' => 'select2',
                                                    'wajib' => '<sup class="text-danger">*</sup>',
                                                ])
                                                @slot('options')
                                                    @foreach ($daftarDesa as $desa)
                                                        <option value="{{ $desa->id }}">{{ $desa->nama }}</option>
                                                    @endforeach
                                                @endslot
                                            @endcomponent
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label for="TextInput" class="form-label my-2">Pilih Lokasi Habitat
                                                Keong</label>
                                            <div id="map"></div>
                                        </div>
                                        <div class="col-6">
                                            @component('dashboard.components.formElements.input',
                                                [
                                                    'label' => 'Latitude',
                                                    'type' => 'text',
                                                    'id' => 'latitude',
                                                    'name' => 'latitude',
                                                    'class' => 'marker numerik',
                                                    'wajib' => '<sup class="text-danger">*</sup>',
                                                    'placeholder' => 'Masukkan Latitude',
                                                    'value' => $lokasiHewan->latitude,
                                                ])
                                            @endcomponent
                                        </div>
                                        <div class="col-6">
                                            @component('dashboard.components.formElements.input',
                                                [
                                                    'label' => 'Longitude',
                                                    'type' => 'text',
                                                    'id' => 'longitude',
                                                    'name' => 'longitude',
                                                    'class' => 'marker numerik',
                                                    'wajib' => '<sup class="text-danger">*</sup>',
                                                    'placeholder' => 'Masukkan Longitude',
                                                    'value' => $lokasiHewan->longitude,
                                                ])
                                            @endcomponent
                                        </div>
                                        <div class="col-12">
                                            @component('dashboard.components.formElements.select',
                                                [
                                                    'label' => 'Status',
                                                    'id' => 'status',
                                                    'name' => 'status',
                                                    'class' => 'select2',
                                                    'wajib' => '<sup class="text-danger">*</sup>',
                                                ])
                                                @slot('options')
                                                    <option value="1">Aktif</option>
                                                    <option value="2">Tidak Aktif</option>
                                                @endslot
                                            @endcomponent
                                        </div>
                                        <div class="col-12 d-flex justify-content-end mt-3">
                                            @component('dashboard.components.buttons.submit',
                                                [
                                                    'label' => 'Simpan',
                                                ])
                                            @endcomponent
                                        </div>
                                    </form>
                                </div>
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
        $(document).ready(function() {
            $('#status').val('{{ $lokasiHewan->status }}').trigger('change');
            $('#desa_id').val('{{ $lokasiHewan->desa_id }}').trigger('change');
        })
    </script>

    <script>
        $('#form-tambah').submit(function(e) {
            e.preventDefault();
            resetError();
            swal({
                title: 'Apakah Anda Yakin ?',
                icon: 'warning',
                text: "Apakah Anda Yakin ?",
                type: 'warning',
                buttons: {
                    confirm: {
                        text: 'Ya',
                        className: 'btn btn-success'
                    },
                    cancel: {
                        visible: true,
                        text: 'Batal',
                        className: 'btn btn-danger'
                    }
                }
            }).then((Update) => {
                if (Update) {
                    $.ajax({
                        url: "{{ url('master-data/lokasi/hewan' . '/' . $lokasiHewan->id) }}",
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            if (response.status == 'success') {
                                swal("Berhasil", "Data Berhasil Disimpan", {
                                    icon: "success",
                                    buttons: false,
                                    timer: 1000,
                                }).then(function() {
                                    window.location.href =
                                        "{{ url('master-data/lokasi/hewan') }}";
                                })
                            } else {
                                swal("Periksa Kembali Data Anda", {
                                    buttons: false,
                                    timer: 1500,
                                    icon: "warning",
                                });
                                printErrorMsg(response.error);
                            }
                        },
                        error: function(response) {
                            swal("Gagal", "Terjadi Kesalahan", {
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
        function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
                $('.' + key + '-error').removeClass('d-none');
                $('.' + key + '-error').text(value);
            });
        }

        function resetError() {
            resetErrorElement('nama');
            resetErrorElement('deskripsi');
            resetErrorElement('desa_id');
            resetErrorElement('latitude');
            resetErrorElement('longitude');
            resetErrorElement('status');
        }

        function resetErrorElement(key) {
            $('.' + key + '-error').addClass('d-none');
        }
    </script>

    <script>
        var warna = $('#warna').val();
        var center = [-1.3618072, 120.1619337];

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
            iconAnchor: [25, 20],
            popupAnchor: [-4, -20]
        });

        var map = L.map("map", {
            maxBounds: [
                [-1.511127, 119.9637063],
                [-1.21458, 120.2912363]
            ]
        }).setView(center, 10);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
            maxZoom: 18,
        }).addTo(map);

        var drawnItems = new L.FeatureGroup();

        map.addLayer(drawnItems);
        map.addControl(new L.Control.Fullscreen());

        var marker = L.marker([$("#latitude").val(), $("#longitude").val()], {
            icon: pinIcon
        }).addTo(map);

        function updateMarker(lat, lng) {
            marker
                .setLatLng([lat, lng])
                .bindPopup("Lokasi Pilihan : " + marker.getLatLng().toString())
                .openPopup();
            map.flyTo([lat, lng], 12);
            return false;
        }

        map.on("click", function(e) {
            let latitude = e.latlng.lat.toString().substring(0, 15);
            let longitude = e.latlng.lng.toString().substring(0, 15);
            $("#latitude").val(latitude);
            $("#longitude").val(longitude);
            updateMarker(latitude, longitude);
        });

        $('.marker').keyup(function() {
            updateMarker($("#latitude").val(), $("#longitude").val());
        })

        $(document).ready(function() {
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
                                    fillOpacity: 0.5
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
        })
    </script>

    <script>
        $('#nav-master-lokasi').addClass('active');
        $('#nav-master-lokasi .collapse').addClass('show');
        $('#nav-master-lokasi .collapse #li-lokasi-hewan').addClass('active');
    </script>
@endpush
