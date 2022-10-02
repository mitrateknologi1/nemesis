<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title fw-bold">Intervensi</div>
                <div class="card-tools">
                    <button class="btn btn-info btn-border btn-round btn-sm mr-2" data-toggle="modal"
                        data-target="#modal-intervensi">
                        <i class="fas fa-info-circle"></i>
                        @if (Auth::user()->role != 'OPD')
                            Lihat Detail Per-OPD
                        @else
                            Lihat Detail
                        @endif
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5><b>Perencanaan</b></h5>
                            <hr>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Habitat Keong</p>
                                <p class="text-muted mb-0">{{ $intervensi['perencanaanKeong'] }}</p>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Manusia</p>
                                <p class="text-muted mb-0">{{ $intervensi['perencanaanManusia'] }}</p>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Lokasi Hewan Ternak</p>
                                <p class="text-muted mb-0">{{ $intervensi['perencanaanHewan'] }}</p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Total Perencanaan</p>
                                <p class="text-muted mb-0">
                                    {{ $intervensi['perencanaanTotal'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5><b>Realisasi</b></h5>
                            <hr>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Habitat Keong</p>
                                <p class="text-muted mb-0">{{ $intervensi['realisasiKeong'] }}</p>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Manusia</p>
                                <p class="text-muted mb-0">{{ $intervensi['realisasiManusia'] }}</p>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Lokasi Hewan Ternak</p>
                                <p class="text-muted mb-0">{{ $intervensi['realisasiHewan'] }}</p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Total Realisasi</p>
                                <p class="text-muted mb-0">
                                    {{ $intervensi['realisasiTotal'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5><b>Persentase Realisasi</b></h5>
                            <hr>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="realisasi-keong"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Habitat Keong</h6>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="realisasi-manusia"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Manusia</h6>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="realisasi-hewan"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Lokasi Hewan Ternak</h6>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="realisasi-total"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Total Persentase Realisasi</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-intervensi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    @if (Auth::user()->role != 'OPD')
                        Detail Intervensi Per-OPD
                    @else
                        Detail Intervensi
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-semua" data-toggle="pill" href="#content-semua"
                            role="tab" aria-controls="content-semua" aria-selected="false">Semua</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="tab-keong" data-toggle="pill" href="#content-keong" role="tab"
                            aria-controls="content-keong" aria-selected="true">Habitat Keong</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-manusia" data-toggle="pill" href="#content-manusia"
                            role="tab" aria-controls="content-manusia" aria-selected="false">Manusia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-hewan" data-toggle="pill" href="#content-hewan" role="tab"
                            aria-controls="content-hewan" aria-selected="false">Lokasi Hewan Ternak</a>
                    </li>

                </ul>
                <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                    <div class="tab-pane fade" id="content-keong" role="tabpanel"
                        aria-labelledby="pills-home-tab-nobd">
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No.</th>
                                    <th scope="col">OPD</th>
                                    <th scope="col">Perencanaan</th>
                                    <th scope="col">Realisasi</th>
                                    <th scope="col">Persentase Realisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tabelKeong['tabel'] as $keong)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                        <td>{{ $keong['opd'] }}</td>
                                        <td class="text-center">{{ $keong['perencanaan'] }}</td>
                                        <td class="text-center">{{ $keong['realisasi'] }}</td>
                                        <td class="text-center">
                                            {{ $keong['persentase'] . '%' }}</td>
                                    </tr>
                                @endforeach
                                @if (Auth::user()->role != 'OPD')
                                    <tr>
                                        <th scope="row" colspan="2" class="text-center">Total</th>
                                        <td class="text-center">{{ $tabelKeong['total']['totalPerencanaan'] }}</td>
                                        <td class="text-center">{{ $tabelKeong['total']['totalRealisasi'] }}</td>
                                        <td class="text-center">
                                            {{ $tabelKeong['total']['totalPersen'] }}
                                            %
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="content-manusia" role="tabpanel"
                        aria-labelledby="pills-profile-tab-nobd">
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No.</th>
                                    <th scope="col">OPD</th>
                                    <th scope="col">Perencanaan</th>
                                    <th scope="col">Realisasi</th>
                                    <th scope="col">Persentase Realisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tabelManusia['tabel'] as $manusia)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                        <td>{{ $manusia['opd'] }}</td>
                                        <td class="text-center">{{ $manusia['perencanaan'] }}</td>
                                        <td class="text-center">{{ $manusia['realisasi'] }}</td>
                                        <td class="text-center">
                                            {{ $manusia['persentase'] . '%' }}
                                        </td>
                                    </tr>
                                @endforeach
                                @if (Auth::user()->role != 'OPD')
                                    <tr>
                                        <th scope="row" colspan="2" class="text-center">Total</th>
                                        <td class="text-center">{{ $tabelManusia['total']['totalPerencanaan'] }}</td>
                                        <td class="text-center">{{ $tabelManusia['total']['totalRealisasi'] }}</td>
                                        <td class="text-center">
                                            {{ $tabelManusia['total']['totalPersen'] }}
                                            %
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="content-hewan" role="tabpanel"
                        aria-labelledby="pills-contact-tab-nobd">
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No.</th>
                                    <th scope="col">OPD</th>
                                    <th scope="col">Perencanaan</th>
                                    <th scope="col">Realisasi</th>
                                    <th scope="col">Persentase Realisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tabelHewan['tabel'] as $hewan)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                        <td>{{ $hewan['opd'] }}</td>
                                        <td class="text-center">{{ $hewan['perencanaan'] }}</td>
                                        <td class="text-center">{{ $hewan['realisasi'] }}</td>
                                        <td class="text-center">
                                            {{ $hewan['persentase'] . '%' }}</td>
                                    </tr>
                                @endforeach
                                @if (Auth::user()->role != 'OPD')
                                    <tr>
                                        <th scope="row" colspan="2" class="text-center">Total</th>
                                        <td class="text-center">{{ $tabelHewan['total']['totalPerencanaan'] }}</td>
                                        <td class="text-center">{{ $tabelHewan['total']['totalRealisasi'] }}</td>
                                        <td class="text-center">
                                            {{ $tabelHewan['total']['totalPersen'] }}
                                            %
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade show active" id="content-semua" role="tabpanel"
                        aria-labelledby="pills-home-tab-nobd">
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No.</th>
                                    <th scope="col">OPD</th>
                                    <th scope="col">Perencanaan</th>
                                    <th scope="col">Realisasi</th>
                                    <th scope="col">Persentase Realisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tabelSemua['tabel'] as $semua)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                        <td>{{ $semua['opd'] }}</td>
                                        <td class="text-center">{{ $semua['perencanaan'] }}</td>
                                        <td class="text-center">{{ $semua['realisasi'] }}</td>
                                        <td class="text-center">
                                            {{ $semua['persentase'] . '%' }}</td>
                                    </tr>
                                @endforeach
                                @if (Auth::user()->role != 'OPD')
                                    <tr>
                                        <th scope="row" colspan="2" class="text-center">Total</th>
                                        <td class="text-center">{{ $tabelSemua['total']['totalPerencanaan'] }}</td>
                                        <td class="text-center">{{ $tabelSemua['total']['totalRealisasi'] }}</td>
                                        <td class="text-center">
                                            {{ $tabelSemua['total']['totalPersen'] }}
                                            %
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                @component('dashboard.components.buttons.close')
                @endcomponent
                <form action="{{ url('/dashboard/export/intervensi/semua') }}" method="POST"
                    id="form-export-intervensi">
                    @csrf
                    <button class="btn btn-primary" type="submit" name="tahun"
                        value="{{ $_GET['tahun'] ?? '' }}"><i class="fas fa-file-download"></i> Export</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Circles.create({
            id: 'realisasi-keong',
            radius: 45,
            value: "{{ $intervensi['persentaseKeong'] }}",
            maxValue: 100,
            width: 7,
            text: "{{ $intervensi['persentaseKeong'] . ' %' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'realisasi-manusia',
            radius: 45,
            value: "{{ $intervensi['persentaseManusia'] }}",
            maxValue: 100,
            width: 7,
            text: "{{ $intervensi['persentaseManusia'] . ' %' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'realisasi-hewan',
            radius: 45,
            value: "{{ $intervensi['persentaseHewan'] }}",
            maxValue: 100,
            width: 7,
            text: "{{ $intervensi['persentaseHewan'] . ' %' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'realisasi-total',
            radius: 45,
            value: "{{ $intervensi['persentaseTotal'] }}",
            maxValue: 100,
            width: 7,
            text: "{{ $intervensi['persentaseTotal'] . '%' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })
    </script>
@endpush
