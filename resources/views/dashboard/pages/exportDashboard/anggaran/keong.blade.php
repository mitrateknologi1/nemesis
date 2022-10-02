<table>
    <tr>
        <td colspan="3">Anggaran Intervensi :</td>
        <td>Habitat Keong</td>
    </tr>
    <tr>
        <td colspan="3">Tahun :</td>
        <td>
            @php
                if ($tahun != '' && $tahun != 'Semua') {
                    echo $tahun;
                } else {
                    echo 'Semua';
                }
            @endphp
        </td>
    </tr>
</table>

<table class="table table-bordered mt-3">
    <thead>
        <tr class="text-center">
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col" rowspan="2">No.
            </th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col" rowspan="2">OPD
            </th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col"
                colspan="{{ count($daftarSumberDana) + 1 }}">
                Nilai Anggaran</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col"
                colspan="{{ count($daftarSumberDana) + 1 }}">
                Penggunaan Anggaran</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col"
                colspan="{{ count($daftarSumberDana) + 1 }}">
                Persentase Penggunaan Anggaran</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col"
                colspan="{{ count($daftarSumberDana) + 1 }}">
                Sisa Anggaran</th>
        </tr>
        <tr class="text-center">
            @foreach ($daftarSumberDana as $sumberDana)
                <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $sumberDana->nama }}</th>
            @endforeach
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">Total</th>
            @foreach ($daftarSumberDana as $sumberDana)
                <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $sumberDana->nama }}</th>
            @endforeach
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">Total</th>
            @foreach ($daftarSumberDana as $sumberDana)
                <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $sumberDana->nama }}</th>
            @endforeach
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">Total</th>
            @foreach ($daftarSumberDana as $sumberDana)
                <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $sumberDana->nama }}</th>
            @endforeach
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tabelAnggaranKeong['tabel'] as $anggaranKeong)
            <tr>
                <th style="vertical-align: center;border: 1px solid black;" scope="row" class="text-center">
                    {{ $loop->iteration }}</th>
                <td style="vertical-align: center;border: 1px solid black;" class="text-nowrap">
                    {{ $anggaranKeong['opd'] }}</td>
                @foreach ($anggaranKeong['perencanaan'] as $perencanaan)
                    <td style="vertical-align: center;border: 1px solid black;" class="text-center text-nowrap">
                        Rp.
                        {{ number_format($perencanaan['perencanaan'], 0, ',', '.') }}
                    </td>
                @endforeach
                <td style="vertical-align: center;border: 1px solid black;" class="text-center text-nowrap">
                    Rp.
                    {{ number_format($anggaranKeong['totalPerencanaan'], 0, ',', '.') }}
                </td>
                @foreach ($anggaranKeong['realisasi'] as $realisasi)
                    <td style="vertical-align: center;border: 1px solid black;" class="text-center text-nowrap">
                        Rp.
                        {{ number_format($realisasi['realisasi'], 0, ',', '.') }}
                    </td>
                @endforeach
                <td style="vertical-align: center;border: 1px solid black;" class="text-center text-nowrap">
                    Rp.
                    {{ number_format($anggaranKeong['totalRealisasi'], 0, ',', '.') }}
                </td>
                @foreach ($anggaranKeong['persentase'] as $persentase)
                    <td style="vertical-align: center;border: 1px solid black;" class="text-center text-nowrap">
                        {{ $persentase['persentase'] }}%
                    </td>
                @endforeach
                <td style="vertical-align: center;border: 1px solid black;" class="text-center text-nowrap">
                    {{ $anggaranKeong['totalPersentase'] }}%
                </td>
                @foreach ($anggaranKeong['sisaAnggaran'] as $sisaAnggaran)
                    <td style="vertical-align: center;border: 1px solid black;" class="text-center text-nowrap">
                        Rp.{{ number_format($sisaAnggaran['sisa_anggaran'], 0, ',', '.') }}
                    </td>
                @endforeach
                <td style="vertical-align: center;border: 1px solid black;" class="text-center text-nowrap">
                    Rp.{{ number_format($anggaranKeong['totalSisaAnggaran'], 0, ',', '.') }}
                </td>
            </tr>
        @endforeach
        @if (Auth::user()->role != 'OPD')
            <tr class="fw-bold text-nowrap">
                <th style="vertical-align: center;border: 1px solid black;" align="center" scope="row" colspan="2"
                    class="text-center">Total</th>
                @foreach ($tabelAnggaranKeong['total']['totalArrayPerencanaan'] as $perencanaan)
                    <td style="vertical-align: center;border: 1px solid black;" class="text-center">Rp.
                        {{ number_format($perencanaan['perencanaan'], 0, ',', '.') }}
                    </td>
                @endforeach
                <td style="vertical-align: center;border: 1px solid black;" class="text-center">Rp.
                    {{ number_format($tabelAnggaranKeong['total']['totalSeluruhPerencanaan'], 0, ',', '.') }}
                </td>
                @foreach ($tabelAnggaranKeong['total']['totalArrayRealisasi'] as $realisasi)
                    <td style="vertical-align: center;border: 1px solid black;" class="text-center">Rp.
                        {{ number_format($realisasi['realisasi'], 0, ',', '.') }}
                    </td>
                @endforeach
                <td style="vertical-align: center;border: 1px solid black;" class="text-center">Rp.
                    {{ number_format($tabelAnggaranKeong['total']['totalSeluruhRealisasi'], 0, ',', '.') }}
                </td>
                @foreach ($tabelAnggaranKeong['total']['totalArrayPersentase'] as $persentase)
                    <td style="vertical-align: center;border: 1px solid black;" class="text-center">
                        {{ $persentase['persentase'] }}%
                    </td>
                @endforeach
                <td style="vertical-align: center;border: 1px solid black;" class="text-center">
                    {{ $tabelAnggaranKeong['total']['totalSeluruhPersentase'] }}%
                </td>
                @foreach ($tabelAnggaranKeong['total']['totalArraySisaAnggaran'] as $sisaAnggaran)
                    <td style="vertical-align: center;border: 1px solid black;" class="text-center">Rp.
                        {{ number_format($sisaAnggaran['sisa_anggaran'], 0, ',', '.') }}
                    </td>
                @endforeach
                <td style="vertical-align: center;border: 1px solid black;" class="text-center">Rp.
                    {{ number_format($tabelAnggaranKeong['total']['totalSeluruhSisaAnggaran'], 0, ',', '.') }}
                </td>
            </tr>
        @endif
    </tbody>
</table>
