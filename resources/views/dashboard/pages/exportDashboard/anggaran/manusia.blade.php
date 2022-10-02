<table>
    <tr>
        <td colspan="3">Anggaran Intervensi :</td>
        <td>Manusia</td>
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
        @foreach ($tabelAnggaranManusia['tabel'] as $anggaranManusia)
            <tr>
                <th style="vertical-align: center;border: 1px solid black;" scope="row" class="text-center">
                    {{ $loop->iteration }}</th>
                <td style="vertical-align: center;border: 1px solid black;" class="text-nowrap">
                    {{ $anggaranManusia['opd'] }}</td>
                @foreach ($anggaranManusia['perencanaan'] as $perencanaan)
                    <td style="vertical-align: center;border: 1px solid black;" class="text-center text-nowrap">
                        Rp.
                        {{ number_format($perencanaan['perencanaan'], 0, ',', '.') }}
                    </td>
                @endforeach
                <td style="vertical-align: center;border: 1px solid black;" class="text-center text-nowrap">
                    Rp.
                    {{ number_format($anggaranManusia['totalPerencanaan'], 0, ',', '.') }}
                </td>
                @foreach ($anggaranManusia['realisasi'] as $realisasi)
                    <td style="vertical-align: center;border: 1px solid black;" class="text-center text-nowrap">
                        Rp.
                        {{ number_format($realisasi['realisasi'], 0, ',', '.') }}
                    </td>
                @endforeach
                <td style="vertical-align: center;border: 1px solid black;" class="text-center text-nowrap">
                    Rp.
                    {{ number_format($anggaranManusia['totalRealisasi'], 0, ',', '.') }}
                </td>
                @foreach ($anggaranManusia['persentase'] as $persentase)
                    <td style="vertical-align: center;border: 1px solid black;" class="text-center text-nowrap">
                        {{ $persentase['persentase'] }}%
                    </td>
                @endforeach
                <td style="vertical-align: center;border: 1px solid black;" class="text-center text-nowrap">
                    {{ $anggaranManusia['totalPersentase'] }}%
                </td>
                @foreach ($anggaranManusia['sisaAnggaran'] as $sisaAnggaran)
                    <td style="vertical-align: center;border: 1px solid black;" class="text-center text-nowrap">
                        Rp.{{ number_format($sisaAnggaran['sisa_anggaran'], 0, ',', '.') }}
                    </td>
                @endforeach
                <td style="vertical-align: center;border: 1px solid black;" class="text-center text-nowrap">
                    Rp.{{ number_format($anggaranManusia['totalSisaAnggaran'], 0, ',', '.') }}
                </td>
            </tr>
        @endforeach
        @if (Auth::user()->role != 'OPD')
            <tr class="fw-bold text-nowrap">
                <th style="vertical-align: center;border: 1px solid black;" align="center" scope="row" colspan="2"
                    class="text-center">Total</th>
                @foreach ($tabelAnggaranManusia['total']['totalArrayPerencanaan'] as $perencanaan)
                    <td style="vertical-align: center;border: 1px solid black;" class="text-center">Rp.
                        {{ number_format($perencanaan['perencanaan'], 0, ',', '.') }}
                    </td>
                @endforeach
                <td style="vertical-align: center;border: 1px solid black;" class="text-center">Rp.
                    {{ number_format($tabelAnggaranManusia['total']['totalSeluruhPerencanaan'], 0, ',', '.') }}
                </td>
                @foreach ($tabelAnggaranManusia['total']['totalArrayRealisasi'] as $realisasi)
                    <td style="vertical-align: center;border: 1px solid black;" class="text-center">Rp.
                        {{ number_format($realisasi['realisasi'], 0, ',', '.') }}
                    </td>
                @endforeach
                <td style="vertical-align: center;border: 1px solid black;" class="text-center">Rp.
                    {{ number_format($tabelAnggaranManusia['total']['totalSeluruhRealisasi'], 0, ',', '.') }}
                </td>
                @foreach ($tabelAnggaranManusia['total']['totalArrayPersentase'] as $persentase)
                    <td style="vertical-align: center;border: 1px solid black;" class="text-center">
                        {{ $persentase['persentase'] }}%
                    </td>
                @endforeach
                <td style="vertical-align: center;border: 1px solid black;" class="text-center">
                    {{ $tabelAnggaranManusia['total']['totalSeluruhPersentase'] }}%
                </td>
                @foreach ($tabelAnggaranManusia['total']['totalArraySisaAnggaran'] as $sisaAnggaran)
                    <td style="vertical-align: center;border: 1px solid black;" class="text-center">Rp.
                        {{ number_format($sisaAnggaran['sisa_anggaran'], 0, ',', '.') }}
                    </td>
                @endforeach
                <td style="vertical-align: center;border: 1px solid black;" class="text-center">Rp.
                    {{ number_format($tabelAnggaranManusia['total']['totalSeluruhSisaAnggaran'], 0, ',', '.') }}
                </td>
            </tr>
        @endif
    </tbody>
</table>
