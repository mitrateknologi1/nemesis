<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title fw-bold">Anggaran Intervensi</div>
                <div class="card-tools">
                    <button class="btn btn-info btn-border btn-round btn-sm mr-2" data-toggle="modal"
                        data-target="#modal-anggaran">
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
                            <h5><b>Nilai Anggaran</b></h5>
                            <hr>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Habitat Keong</p>
                                <p class="text-muted mb-0">Rp.
                                    {{ number_format($anggaranPerencanaan['anggaranKeong'], 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Manusia</p>
                                <p class="text-muted mb-0">Rp.
                                    {{ number_format($anggaranPerencanaan['anggaranManusia'], 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Lokasi Hewan Ternak</p>
                                <p class="text-muted mb-0">Rp.
                                    {{ number_format($anggaranPerencanaan['anggaranHewan'], 0, ',', '.') }}
                                </p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Total Anggaran</p>
                                <p class="text-muted mb-0">Rp.
                                    {{ number_format($anggaranPerencanaan['totalAnggaran'], 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5><b>Penggunaan Anggaran</b></h5>
                            <hr>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Habitat Keong</p>
                                <p class="text-muted mb-0">Rp.
                                    {{ number_format($penggunaanAnggaran['penggunaanKeong'], 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Manusia</p>
                                <p class="text-muted mb-0">Rp.
                                    {{ number_format($penggunaanAnggaran['penggunaanManusia'], 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Lokasi Hewan Ternak</p>
                                <p class="text-muted mb-0">Rp.
                                    {{ number_format($penggunaanAnggaran['penggunaanHewan'], 0, ',', '.') }}
                                </p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Total Penggunaan Anggaran</p>
                                <p class="text-muted mb-0">Rp.
                                    {{ number_format($penggunaanAnggaran['penggunaanTotal'], 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Sisa Anggaran</p>
                                <p class="text-muted mb-0">Rp.
                                    {{ number_format($penggunaanAnggaran['sisaAnggaran'], 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5><b>Persentase Penggunaan Anggaran</b></h5>
                            <hr>
                            <div class="d-flex justify-content-center pb-2 pt-4 row">
                                <div class="mt-2 col-4">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="penggunaan-keong"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Habitat Keong <br>
                                            (Rp.
                                            {{ number_format($penggunaanAnggaran['penggunaanKeong'], 0, ',', '.') }}
                                            /
                                            Rp.
                                            {{ number_format($anggaranPerencanaan['anggaranKeong'], 0, ',', '.') }})
                                        </h6>
                                    </div>
                                </div>
                                <div class="mt-2 col-4">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="penggunaan-manusia"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Manusia <br>
                                            (Rp.
                                            {{ number_format($penggunaanAnggaran['penggunaanManusia'], 0, ',', '.') }}
                                            /
                                            Rp.
                                            {{ number_format($anggaranPerencanaan['anggaranManusia'], 0, ',', '.') }})
                                        </h6>
                                    </div>
                                </div>
                                <div class="mt-2 col-4">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="penggunaan-hewan"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Lokasi Hewan Ternak <br>
                                            (Rp.
                                            {{ number_format($penggunaanAnggaran['penggunaanHewan'], 0, ',', '.') }}
                                            /
                                            Rp.
                                            {{ number_format($anggaranPerencanaan['anggaranHewan'], 0, ',', '.') }})
                                        </h6>
                                    </div>
                                </div>
                                <div class="mt-5 col-6">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="penggunaan-total"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Total Persentase Penggunaan Anggaran
                                            <br>
                                            (Rp.
                                            {{ number_format($penggunaanAnggaran['penggunaanTotal'], 0, ',', '.') }}
                                            / Rp.
                                            {{ number_format($anggaranPerencanaan['totalAnggaran'], 0, ',', '.') }}
                                            )
                                        </h6>
                                    </div>
                                </div>
                                <div class="mt-5 col-6">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="penggunaan-sisa"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Sisa Anggaran
                                            <br>
                                            (Rp.
                                            {{ number_format($penggunaanAnggaran['sisaAnggaran'], 0, ',', '.') }}
                                            / Rp.
                                            {{ number_format($anggaranPerencanaan['totalAnggaran'], 0, ',', '.') }})
                                        </h6>
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

<!-- Modal -->
<div class="modal fade" id="modal-anggaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    @if (Auth::user()->role != 'OPD')
                        Detail Anggaran Per-OPD
                    @else
                        Detail Anggaran
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-anggaran-semua" data-toggle="pill" href="#anggaran-semua"
                            role="tab" aria-controls="anggaran-semua" aria-selected="false">Semua</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-anggaran-keong" data-toggle="pill" href="#anggaran-keong"
                            role="tab" aria-controls="anggaran-keong" aria-selected="true">Habitat Keong</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-anggaran-manusia" data-toggle="pill" href="#anggaran-manusia"
                            role="tab" aria-controls="anggaran-manusia" aria-selected="false">Manusia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-anggaran-hewan" data-toggle="pill" href="#anggaran-hewan"
                            role="tab" aria-controls="anggaran-hewan" aria-selected="false">Lokasi Hewan
                            Ternak</a>
                    </li>

                </ul>
                <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                    <div class="tab-pane fade" id="anggaran-keong" role="tabpanel"
                        aria-labelledby="pills-home-tab-nobd">
                        <div style="overflow: auto">
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col" rowspan="2">No.</th>
                                        <th scope="col" rowspan="2">OPD</th>
                                        <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Nilai
                                            Anggaran</th>
                                        <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Penggunaan
                                            Anggaran</th>
                                        <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Persentase
                                            Penggunaan Anggaran</th>
                                        <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Sisa Anggaran
                                        </th>
                                    </tr>
                                    <tr class="text-center">
                                        @foreach ($daftarSumberDana as $sumberDana)
                                            <th scope="col">{{ $sumberDana->nama }}</th>
                                        @endforeach
                                        <th scope="col">Total</th>
                                        @foreach ($daftarSumberDana as $sumberDana)
                                            <th scope="col">{{ $sumberDana->nama }}</th>
                                        @endforeach
                                        <th scope="col">Total</th>
                                        @foreach ($daftarSumberDana as $sumberDana)
                                            <th scope="col">{{ $sumberDana->nama }}</th>
                                        @endforeach
                                        <th scope="col">Total</th>
                                        @foreach ($daftarSumberDana as $sumberDana)
                                            <th scope="col">{{ $sumberDana->nama }}</th>
                                        @endforeach
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tabelAnggaranKeong['tabel'] as $anggaranKeong)
                                        <tr>
                                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                            <td class="text-nowrap">{{ $anggaranKeong['opd'] }}</td>
                                            @foreach ($anggaranKeong['perencanaan'] as $perencanaan)
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($perencanaan['perencanaan'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center text-nowrap">
                                                Rp.
                                                {{ number_format($anggaranKeong['totalPerencanaan'], 0, ',', '.') }}
                                            </td>
                                            @foreach ($anggaranKeong['realisasi'] as $realisasi)
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($realisasi['realisasi'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center text-nowrap">
                                                Rp.
                                                {{ number_format($anggaranKeong['totalRealisasi'], 0, ',', '.') }}
                                            </td>
                                            @foreach ($anggaranKeong['persentase'] as $persentase)
                                                <td class="text-center text-nowrap">
                                                    {{ $persentase['persentase'] }}%
                                                </td>
                                            @endforeach
                                            <td class="text-center text-nowrap">
                                                {{ $anggaranKeong['totalPersentase'] }}%
                                            </td>
                                            @foreach ($anggaranKeong['sisaAnggaran'] as $sisaAnggaran)
                                                <td class="text-center text-nowrap">
                                                    Rp.{{ number_format($sisaAnggaran['sisa_anggaran'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center text-nowrap">
                                                Rp.{{ number_format($anggaranKeong['totalSisaAnggaran'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (Auth::user()->role != 'OPD')
                                        <tr class="fw-bold text-nowrap">
                                            <th scope="row" colspan="2" class="text-center">Total</th>
                                            @foreach ($tabelAnggaranKeong['total']['totalArrayPerencanaan'] as $perencanaan)
                                                <td class="text-center">Rp.
                                                    {{ number_format($perencanaan['perencanaan'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center">Rp.
                                                {{ number_format($tabelAnggaranKeong['total']['totalSeluruhPerencanaan'], 0, ',', '.') }}
                                            </td>
                                            @foreach ($tabelAnggaranKeong['total']['totalArrayRealisasi'] as $realisasi)
                                                <td class="text-center">Rp.
                                                    {{ number_format($realisasi['realisasi'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center">Rp.
                                                {{ number_format($tabelAnggaranKeong['total']['totalSeluruhRealisasi'], 0, ',', '.') }}
                                            </td>
                                            @foreach ($tabelAnggaranKeong['total']['totalArrayPersentase'] as $persentase)
                                                <td class="text-center">
                                                    {{ $persentase['persentase'] }}%
                                                </td>
                                            @endforeach
                                            <td class="text-center">
                                                {{ $tabelAnggaranKeong['total']['totalSeluruhPersentase'] }}%
                                            </td>
                                            @foreach ($tabelAnggaranKeong['total']['totalArraySisaAnggaran'] as $sisaAnggaran)
                                                <td class="text-center">Rp.
                                                    {{ number_format($sisaAnggaran['sisa_anggaran'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center">Rp.
                                                {{ number_format($tabelAnggaranKeong['total']['totalSeluruhSisaAnggaran'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="anggaran-manusia" role="tabpanel"
                        aria-labelledby="pills-profile-tab-nobd">
                        <div style="overflow: auto">
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col" rowspan="2">No.</th>
                                        <th scope="col" rowspan="2">OPD</th>
                                        <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Nilai
                                            Anggaran</th>
                                        <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Penggunaan
                                            Anggaran</th>
                                        <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Persentase
                                            Penggunaan Anggaran</th>
                                        <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Sisa Anggaran
                                        </th>
                                    </tr>
                                    <tr class="text-center">
                                        @foreach ($daftarSumberDana as $sumberDana)
                                            <th scope="col">{{ $sumberDana->nama }}</th>
                                        @endforeach
                                        <th scope="col">Total</th>
                                        @foreach ($daftarSumberDana as $sumberDana)
                                            <th scope="col">{{ $sumberDana->nama }}</th>
                                        @endforeach
                                        <th scope="col">Total</th>
                                        @foreach ($daftarSumberDana as $sumberDana)
                                            <th scope="col">{{ $sumberDana->nama }}</th>
                                        @endforeach
                                        <th scope="col">Total</th>
                                        @foreach ($daftarSumberDana as $sumberDana)
                                            <th scope="col">{{ $sumberDana->nama }}</th>
                                        @endforeach
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tabelAnggaranManusia['tabel'] as $anggaranManusia)
                                        <tr>
                                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                            <td class="text-nowrap">{{ $anggaranManusia['opd'] }}</td>
                                            @foreach ($anggaranManusia['perencanaan'] as $perencanaan)
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($perencanaan['perencanaan'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center text-nowrap">
                                                Rp.
                                                {{ number_format($anggaranManusia['totalPerencanaan'], 0, ',', '.') }}
                                            </td>
                                            @foreach ($anggaranManusia['realisasi'] as $realisasi)
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($realisasi['realisasi'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center text-nowrap">
                                                Rp.
                                                {{ number_format($anggaranManusia['totalRealisasi'], 0, ',', '.') }}
                                            </td>
                                            @foreach ($anggaranManusia['persentase'] as $persentase)
                                                <td class="text-center text-nowrap">
                                                    {{ $persentase['persentase'] }}%
                                                </td>
                                            @endforeach
                                            <td class="text-center text-nowrap">
                                                {{ $anggaranManusia['totalPersentase'] }}%
                                            </td>
                                            @foreach ($anggaranManusia['sisaAnggaran'] as $sisaAnggaran)
                                                <td class="text-center text-nowrap">
                                                    Rp.{{ number_format($sisaAnggaran['sisa_anggaran'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center text-nowrap">
                                                Rp.{{ number_format($anggaranManusia['totalSisaAnggaran'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (Auth::user()->role != 'OPD')
                                        <tr class="fw-bold text-nowrap">
                                            <th scope="row" colspan="2" class="text-center">Total</th>
                                            @foreach ($tabelAnggaranManusia['total']['totalArrayPerencanaan'] as $perencanaan)
                                                <td class="text-center">Rp.
                                                    {{ number_format($perencanaan['perencanaan'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center">Rp.
                                                {{ number_format($tabelAnggaranManusia['total']['totalSeluruhPerencanaan'], 0, ',', '.') }}
                                            </td>
                                            @foreach ($tabelAnggaranManusia['total']['totalArrayRealisasi'] as $realisasi)
                                                <td class="text-center">Rp.
                                                    {{ number_format($realisasi['realisasi'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center">Rp.
                                                {{ number_format($tabelAnggaranManusia['total']['totalSeluruhRealisasi'], 0, ',', '.') }}
                                            </td>
                                            @foreach ($tabelAnggaranManusia['total']['totalArrayPersentase'] as $persentase)
                                                <td class="text-center">
                                                    {{ $persentase['persentase'] }}%
                                                </td>
                                            @endforeach
                                            <td class="text-center">
                                                {{ $tabelAnggaranManusia['total']['totalSeluruhPersentase'] }}%
                                            </td>
                                            @foreach ($tabelAnggaranManusia['total']['totalArraySisaAnggaran'] as $sisaAnggaran)
                                                <td class="text-center">Rp.
                                                    {{ number_format($sisaAnggaran['sisa_anggaran'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center">Rp.
                                                {{ number_format($tabelAnggaranManusia['total']['totalSeluruhSisaAnggaran'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="anggaran-hewan" role="tabpanel"
                        aria-labelledby="pills-contact-tab-nobd">
                        <div style="overflow: auto">
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col" rowspan="2">No.</th>
                                        <th scope="col" rowspan="2">OPD</th>
                                        <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Nilai
                                            Anggaran</th>
                                        <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Penggunaan
                                            Anggaran</th>
                                        <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Persentase
                                            Penggunaan Anggaran</th>
                                        <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Sisa Anggaran
                                        </th>
                                    </tr>
                                    <tr class="text-center">
                                        @foreach ($daftarSumberDana as $sumberDana)
                                            <th scope="col">{{ $sumberDana->nama }}</th>
                                        @endforeach
                                        <th scope="col">Total</th>
                                        @foreach ($daftarSumberDana as $sumberDana)
                                            <th scope="col">{{ $sumberDana->nama }}</th>
                                        @endforeach
                                        <th scope="col">Total</th>
                                        @foreach ($daftarSumberDana as $sumberDana)
                                            <th scope="col">{{ $sumberDana->nama }}</th>
                                        @endforeach
                                        <th scope="col">Total</th>
                                        @foreach ($daftarSumberDana as $sumberDana)
                                            <th scope="col">{{ $sumberDana->nama }}</th>
                                        @endforeach
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tabelAnggaranHewan['tabel'] as $anggaranHewan)
                                        <tr>
                                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                            <td class="text-nowrap">{{ $anggaranHewan['opd'] }}</td>
                                            @foreach ($anggaranHewan['perencanaan'] as $perencanaan)
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($perencanaan['perencanaan'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center text-nowrap">
                                                Rp.
                                                {{ number_format($anggaranHewan['totalPerencanaan'], 0, ',', '.') }}
                                            </td>
                                            @foreach ($anggaranHewan['realisasi'] as $realisasi)
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($realisasi['realisasi'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center text-nowrap">
                                                Rp.
                                                {{ number_format($anggaranHewan['totalRealisasi'], 0, ',', '.') }}
                                            </td>
                                            @foreach ($anggaranHewan['persentase'] as $persentase)
                                                <td class="text-center text-nowrap">
                                                    {{ $persentase['persentase'] }}%
                                                </td>
                                            @endforeach
                                            <td class="text-center text-nowrap">
                                                {{ $anggaranHewan['totalPersentase'] }}%
                                            </td>
                                            @foreach ($anggaranHewan['sisaAnggaran'] as $sisaAnggaran)
                                                <td class="text-center text-nowrap">
                                                    Rp.{{ number_format($sisaAnggaran['sisa_anggaran'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center text-nowrap">
                                                Rp.{{ number_format($anggaranHewan['totalSisaAnggaran'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (Auth::user()->role != 'OPD')
                                        <tr class="fw-bold text-nowrap">
                                            <th scope="row" colspan="2" class="text-center">Total</th>
                                            @foreach ($tabelAnggaranHewan['total']['totalArrayPerencanaan'] as $perencanaan)
                                                <td class="text-center">Rp.
                                                    {{ number_format($perencanaan['perencanaan'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center">Rp.
                                                {{ number_format($tabelAnggaranHewan['total']['totalSeluruhPerencanaan'], 0, ',', '.') }}
                                            </td>
                                            @foreach ($tabelAnggaranHewan['total']['totalArrayRealisasi'] as $realisasi)
                                                <td class="text-center">Rp.
                                                    {{ number_format($realisasi['realisasi'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center">Rp.
                                                {{ number_format($tabelAnggaranHewan['total']['totalSeluruhRealisasi'], 0, ',', '.') }}
                                            </td>
                                            @foreach ($tabelAnggaranHewan['total']['totalArrayPersentase'] as $persentase)
                                                <td class="text-center">
                                                    {{ $persentase['persentase'] }}%
                                                </td>
                                            @endforeach
                                            <td class="text-center">
                                                {{ $tabelAnggaranHewan['total']['totalSeluruhPersentase'] }}%
                                            </td>
                                            @foreach ($tabelAnggaranHewan['total']['totalArraySisaAnggaran'] as $sisaAnggaran)
                                                <td class="text-center">Rp.
                                                    {{ number_format($sisaAnggaran['sisa_anggaran'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center">Rp.
                                                {{ number_format($tabelAnggaranHewan['total']['totalSeluruhSisaAnggaran'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="anggaran-semua" role="tabpanel"
                        aria-labelledby="pills-home-tab-nobd">
                        <div style="overflow: auto">
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col" rowspan="2">No.</th>
                                        <th scope="col" rowspan="2">OPD</th>
                                        <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Nilai
                                            Anggaran</th>
                                        <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Penggunaan
                                            Anggaran</th>
                                        <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Persentase
                                            Penggunaan Anggaran</th>
                                        <th scope="col" colspan="{{ count($daftarSumberDana) + 1 }}">Sisa
                                            Anggaran
                                        </th>
                                    </tr>
                                    <tr class="text-center">
                                        @foreach ($daftarSumberDana as $sumberDana)
                                            <th scope="col">{{ $sumberDana->nama }}</th>
                                        @endforeach
                                        <th scope="col">Total</th>
                                        @foreach ($daftarSumberDana as $sumberDana)
                                            <th scope="col">{{ $sumberDana->nama }}</th>
                                        @endforeach
                                        <th scope="col">Total</th>
                                        @foreach ($daftarSumberDana as $sumberDana)
                                            <th scope="col">{{ $sumberDana->nama }}</th>
                                        @endforeach
                                        <th scope="col">Total</th>
                                        @foreach ($daftarSumberDana as $sumberDana)
                                            <th scope="col">{{ $sumberDana->nama }}</th>
                                        @endforeach
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tabelAnggaranSemua['tabel'] as $anggaranSemua)
                                        <tr>
                                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                            <td class="text-nowrap">{{ $anggaranSemua['opd'] }}</td>
                                            @foreach ($anggaranSemua['perencanaan'] as $perencanaan)
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($perencanaan['perencanaan'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center text-nowrap">
                                                Rp.
                                                {{ number_format($anggaranSemua['totalPerencanaan'], 0, ',', '.') }}
                                            </td>
                                            @foreach ($anggaranSemua['realisasi'] as $realisasi)
                                                <td class="text-center text-nowrap">
                                                    Rp.
                                                    {{ number_format($realisasi['realisasi'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center text-nowrap">
                                                Rp.
                                                {{ number_format($anggaranSemua['totalRealisasi'], 0, ',', '.') }}
                                            </td>
                                            @foreach ($anggaranSemua['persentase'] as $persentase)
                                                <td class="text-center text-nowrap">
                                                    {{ $persentase['persentase'] }}%
                                                </td>
                                            @endforeach
                                            <td class="text-center text-nowrap">
                                                {{ $anggaranSemua['totalPersentase'] }}%
                                            </td>
                                            @foreach ($anggaranSemua['sisaAnggaran'] as $sisaAnggaran)
                                                <td class="text-center text-nowrap">
                                                    Rp.{{ number_format($sisaAnggaran['sisa_anggaran'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center text-nowrap">
                                                Rp.{{ number_format($anggaranSemua['totalSisaAnggaran'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (Auth::user()->role != 'OPD')
                                        <tr class="fw-bold text-nowrap">
                                            <th scope="row" colspan="2" class="text-center">Total</th>
                                            @foreach ($tabelAnggaranSemua['total']['totalArrayPerencanaan'] as $perencanaan)
                                                <td class="text-center">Rp.
                                                    {{ number_format($perencanaan['perencanaan'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center">Rp.
                                                {{ number_format($tabelAnggaranSemua['total']['totalSeluruhPerencanaan'], 0, ',', '.') }}
                                            </td>
                                            @foreach ($tabelAnggaranSemua['total']['totalArrayRealisasi'] as $realisasi)
                                                <td class="text-center">Rp.
                                                    {{ number_format($realisasi['realisasi'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center">Rp.
                                                {{ number_format($tabelAnggaranSemua['total']['totalSeluruhRealisasi'], 0, ',', '.') }}
                                            </td>
                                            @foreach ($tabelAnggaranSemua['total']['totalArrayPersentase'] as $persentase)
                                                <td class="text-center">
                                                    {{ $persentase['persentase'] }}%
                                                </td>
                                            @endforeach
                                            <td class="text-center">
                                                {{ $tabelAnggaranSemua['total']['totalSeluruhPersentase'] }}%
                                            </td>
                                            @foreach ($tabelAnggaranSemua['total']['totalArraySisaAnggaran'] as $sisaAnggaran)
                                                <td class="text-center">Rp.
                                                    {{ number_format($sisaAnggaran['sisa_anggaran'], 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td class="text-center">Rp.
                                                {{ number_format($tabelAnggaranSemua['total']['totalSeluruhSisaAnggaran'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                @component('dashboard.components.buttons.close')
                @endcomponent
                <form action="{{ url('/dashboard/export/anggaran/semua') }}" method="POST"
                    id="form-export-anggaran">
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
            id: 'penggunaan-keong',
            radius: 45,
            value: "{{ $penggunaanAnggaran['penggunaanKeong'] }}",
            maxValue: "{{ $anggaranPerencanaan['anggaranKeong'] }}",
            width: 7,
            text: "{{ $penggunaanAnggaran['persenKeong'] . '%' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'penggunaan-manusia',
            radius: 45,
            value: "{{ $penggunaanAnggaran['penggunaanManusia'] }}",
            maxValue: "{{ $anggaranPerencanaan['anggaranManusia'] }}",
            width: 7,
            text: "{{ $penggunaanAnggaran['persenManusia'] . '%' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'penggunaan-hewan',
            radius: 45,
            value: "{{ $penggunaanAnggaran['penggunaanHewan'] }}",
            maxValue: "{{ $anggaranPerencanaan['anggaranHewan'] }}",
            width: 7,
            text: "{{ $penggunaanAnggaran['persenHewan'] . '%' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'penggunaan-total',
            radius: 45,
            value: "{{ $penggunaanAnggaran['penggunaanTotal'] }}",
            maxValue: "{{ $anggaranPerencanaan['totalAnggaran'] }}",
            width: 7,
            text: "{{ $penggunaanAnggaran['persenTotal'] . ' %' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'penggunaan-sisa',
            radius: 45,
            value: "{{ $penggunaanAnggaran['sisaAnggaran'] }}",
            maxValue: "{{ $anggaranPerencanaan['totalAnggaran'] }}",
            width: 7,
            text: "{{ $penggunaanAnggaran['persenSisa'] . '%' }}",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })
    </script>
@endpush
