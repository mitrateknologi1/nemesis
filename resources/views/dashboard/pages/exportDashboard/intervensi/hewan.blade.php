<table>
    <tr>
        <td colspan="3">Intervensi :</td>
        <td>Lokasi Hewan Ternak</td>
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
        <tr>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">No.</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">OPD</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">Perencanaan</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">Realisasi</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">Persentase
                Realisasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tabelHewan['tabel'] as $hewan)
            <tr>
                <th style="vertical-align: center;border: 1px solid black;" align="center" scope="row"
                    class="text-center">{{ $loop->iteration }}</th>
                <td style="vertical-align: center;border: 1px solid black;" align="center">{{ $hewan['opd'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $hewan['perencanaan'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $hewan['realisasi'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $hewan['persentase'] . '%' }}</td>
            </tr>
        @endforeach
        @if (Auth::user()->role != 'OPD')
            <tr>
                <th style="vertical-align: center;border: 1px solid black;" align="center" scope="row" colspan="2"
                    class="text-center">Total</th>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $tabelHewan['total']['totalPerencanaan'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $tabelHewan['total']['totalRealisasi'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $tabelHewan['total']['totalPersen'] }}
                    %
                </td>
            </tr>
        @endif
    </tbody>
</table>
