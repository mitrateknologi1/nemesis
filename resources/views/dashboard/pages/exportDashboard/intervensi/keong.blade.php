<table>
    <tr>
        <td colspan="3">Intervensi :</td>
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
        <tr style="vertical-align: center;border: 1px solid black;" align="center">
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">No.</th>
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">OPD</th>
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">Perencanaan</th>
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">Realisasi</th>
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">Persentase
                Realisasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tabelKeong['tabel'] as $keong)
            <tr>
                <th style="vertical-align: center;border: 1px solid black;" align="center" scope="row"
                    class="text-center">{{ $loop->iteration }}</th>
                <td style="vertical-align: center;border: 1px solid black;" align="center">{{ $keong['opd'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $keong['perencanaan'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $keong['realisasi'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $keong['persentase'] . '%' }}</td>
            </tr>
        @endforeach
        @if (Auth::user()->role != 'OPD')
            <tr>
                <th style="vertical-align: center;border: 1px solid black;" align="center" scope="row" colspan="2"
                    class="text-center">Total</th>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $tabelKeong['total']['totalPerencanaan'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $tabelKeong['total']['totalRealisasi'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $tabelKeong['total']['totalPersen'] }}
                    %
                </td>
            </tr>
        @endif

    </tbody>
</table>
