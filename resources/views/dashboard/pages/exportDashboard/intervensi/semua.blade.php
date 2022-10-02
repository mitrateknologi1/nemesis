<table>
    <tr>
        <td colspan="3">Intervensi :</td>
        <td>Semua</td>
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
        <tr class="text-center" style="vertical-align: center;border: 1px solid black;" align="center">
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">No.</th>
            <th scope="col"style="vertical-align: center;border: 1px solid black;" align="center">OPD</th>
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">Perencanaan</th>
            <th scope="col"style="vertical-align: center;border: 1px solid black;" align="center">Realisasi</th>
            <th scope="col"style="vertical-align: center;border: 1px solid black;" align="center">Persentase
                Realisasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tabelSemua['tabel'] as $semua)
            <tr>
                <th style="vertical-align: center;border: 1px solid black;" align="center" scope="row"
                    class="text-center">{{ $loop->iteration }}</th>
                <td style="vertical-align: center;border: 1px solid black;" align="center">{{ $semua['opd'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $semua['perencanaan'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $semua['realisasi'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $semua['persentase'] . '%' }}</td>
            </tr>
        @endforeach
        @if (Auth::user()->role != 'OPD')
            <tr>
                <th style="vertical-align: center;border: 1px solid black;" align="center" scope="row" colspan="2"
                    class="text-center">Total</th>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $tabelSemua['total']['totalPerencanaan'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $tabelSemua['total']['totalRealisasi'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $tabelSemua['total']['totalPersen'] }}
                    %
                </td>
            </tr>
        @endif
    </tbody>
</table>
