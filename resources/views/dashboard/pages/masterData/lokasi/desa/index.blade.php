@extends('dashboard.layouts.main')

@section('title')
    Desa
@endsection

@section('titlePanelHeader')
    Desa
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
        #peta {
            height: 400px;
            margin-top: 0px;
        }
    </style>
@endpush

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Desa</div>
                        <div class="card-tools">
                            @component('dashboard.components.buttons.add',
                                [
                                    'url' => url('master-data/lokasi/desa/create'),
                                ])
                            @endcomponent
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="px-3 my-2">
                        <div id="peta"></div>
                    </div>

                    <div class="row mt-5">
                        <div class="col">
                            <div class="card fieldset">
                                @component('dashboard.components.dataTables.index',
                                    [
                                        'id' => 'table-data',
                                        'th' => ['No', 'Nama', 'Luas', 'Polygon', 'Warna Polygon', 'Aksi'],
                                    ])
                                @endcomponent
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
        var map = null;
        var latlngLindu = [
            [{
                "lat": -1.2682405335266715,
                "lng": 120.04886119007386
            }, {
                "lat": -1.257251750166829,
                "lng": 120.05847191620245
            }, {
                "lat": -1.2483233296103176,
                "lng": 120.06396375970445
            }, {
                "lat": -1.2435157059698527,
                "lng": 120.07357448583302
            }, {
                "lat": -1.2421420976055957,
                "lng": 120.09416889896562
            }, {
                "lat": -1.2373344627128373,
                "lng": 120.10446610553191
            }, {
                "lat": -1.2393948787357665,
                "lng": 120.11133090990941
            }, {
                "lat": -1.232526819106975,
                "lng": 120.12094163603801
            }, {
                "lat": -1.226345550293821,
                "lng": 120.12986588172879
            }, {
                "lat": -1.2304663977598609,
                "lng": 120.1401630882951
            }, {
                "lat": -1.2373344627128373,
                "lng": 120.14908733398588
            }, {
                "lat": -1.2483233296103176,
                "lng": 120.16213046230317
            }, {
                "lat": -1.2634329465240084,
                "lng": 120.17929247324702
            }, {
                "lat": -1.2751084994588158,
                "lng": 120.18615727762459
            }, {
                "lat": -1.287470791893021,
                "lng": 120.20743817119492
            }, {
                "lat": -1.3039537551229952,
                "lng": 120.23283794739179
            }, {
                "lat": -1.3190630432997703,
                "lng": 120.25205939964889
            }, {
                "lat": -1.3293647781551041,
                "lng": 120.2548053213999
            }, {
                "lat": -1.3362325775331643,
                "lng": 120.26235660621518
            }, {
                "lat": -1.34996811858429,
                "lng": 120.27883213672126
            }, {
                "lat": -1.3726315912974043,
                "lng": 120.28638342153654
            }, {
                "lat": -1.3822463332138302,
                "lng": 120.27814565628348
            }, {
                "lat": -1.3891139821915888,
                "lng": 120.274026773657
            }, {
                "lat": -1.4062830170888898,
                "lng": 120.27539973453251
            }, {
                "lat": -1.41452410907271,
                "lng": 120.26510252796619
            }, {
                "lat": -1.4131505957701052,
                "lng": 120.25205939964889
            }, {
                "lat": -1.4268856921141162,
                "lng": 120.23970275176933
            }, {
                "lat": -1.4399339576864914,
                "lng": 120.23352442782952
            }, {
                "lat": -1.4392472087231876,
                "lng": 120.2252866625765
            }, {
                "lat": -1.455729126535486,
                "lng": 120.2225407408255
            }, {
                "lat": -1.4550423823560799,
                "lng": 120.21361649513469
            }, {
                "lat": -1.4516086583248293,
                "lng": 120.2046922494439
            }, {
                "lat": -1.452295403548653,
                "lng": 120.19508152331538
            }, {
                "lat": -1.448174929078932,
                "lng": 120.18272487543578
            }, {
                "lat": -1.4571026142666472,
                "lng": 120.17723303193378
            }, {
                "lat": -1.4605363299287517,
                "lng": 120.16899526668072
            }, {
                "lat": -1.4680904858995114,
                "lng": 120.1573250992389
            }, {
                "lat": -1.484572191964715,
                "lng": 120.14084956873282
            }, {
                "lat": -1.4934997315334695,
                "lng": 120.13055236216654
            }, {
                "lat": -1.5024272348345242,
                "lng": 120.12574699910226
            }, {
                "lat": -1.4989935840245787,
                "lng": 120.11613627297369
            }, {
                "lat": -1.48045177691446,
                "lng": 120.10446610553191
            }, {
                "lat": -1.4612230724319544,
                "lng": 120.09622834027886
            }, {
                "lat": -1.4516086583248293,
                "lng": 120.07426096627074
            }, {
                "lat": -1.4399339576864914,
                "lng": 120.04748822919836
            }, {
                "lat": -1.4213916633741723,
                "lng": 120.02277493343928
            }, {
                "lat": -1.4076565344449334,
                "lng": 120.01591012906171
            }, {
                "lat": -1.385680160191748,
                "lng": 120.01110476599746
            }, {
                "lat": -1.3774389671051044,
                "lng": 120.00149403986889
            }, {
                "lat": -1.3664506653475235,
                "lng": 120.0049264420577
            }, {
                "lat": -1.3568358600600976,
                "lng": 120.00973180512194
            }, {
                "lat": -1.3396664700275698,
                "lng": 120.0049264420577
            }, {
                "lat": -1.3279912159839,
                "lng": 120.0117912464352
            }, {
                "lat": -1.3115084106138748,
                "lng": 120.00973180512194
            }, {
                "lat": -1.294338706268412,
                "lng": 120.01591012906171
            }, {
                "lat": -1.2806028590157326,
                "lng": 120.02140197256377
            }, {
                "lat": -1.270300925224502,
                "lng": 120.03032621825456
            }]
        ];

        function initializeMap() {
            if (map != undefined || map != null) {
                map.remove();
            }

            var center = [-1.3618072, 120.1619337];

            map = L.map("peta").setView(center, 10);
            map.addControl(new L.Control.Fullscreen());

            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
                maxZoom: 18,
            }).addTo(map);

            map.invalidateSize();

            $.ajax({
                url: "{{ url('/map/desa') }}",
                type: "GET",
                success: function(response) {
                    console.log(response);
                    if (response.status == 'success') {
                        for (var i = 0; i < response.data.length; i++) {
                            L.polygon(response.data[i].koordinatPolygon, {
                                    color: response.data[i].warna_polygon,
                                    weight: 1,
                                    opacity: 1,
                                    fillOpacity: 0.5
                                })
                                .addTo(map)
                                .bindPopup(response.data[i].nama);
                        }
                    }
                },
            })
        }

        $(document).on('click', '#btn-delete', function() {
            let id = $(this).val();
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
                        url: "{{ url('master-data/lokasi/desa') }}" + '/' + id,
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
                                    initializeMap();
                                })
                            } else {
                                swal("Gagal", "Data Gagal Dihapus", {
                                    icon: "error",
                                    buttons: false,
                                    timer: 1000,
                                });
                            }
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
            ajax: "{{ url('master-data/lokasi/desa') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'luas',
                    name: 'luas',
                    class: 'text-center'
                },
                {
                    data: 'statusPolygon',
                    name: 'statusPolygon',
                    class: 'text-center'
                },
                {
                    data: 'warnaPolygon',
                    name: 'warnaPolygon',
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

        $(document).ready(function() {
            initializeMap();
        })
    </script>

    <script>
        $('#nav-lokasi').addClass('active');
        $('#nav-lokasi .collapse').addClass('show');
        $('#nav-lokasi .collapse #li-desa').addClass('active');
    </script>
@endpush
