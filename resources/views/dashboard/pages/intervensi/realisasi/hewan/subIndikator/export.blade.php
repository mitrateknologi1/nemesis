    <table align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
        <thead align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">No.</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Tanggal
                    Pelaporan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Sub
                    Indikator</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">OPD Pembuat
                </th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">OPD Terkait
                </th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Nilai
                    Anggaran
                </th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Sumber Dana
                </th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Jumlah
                    Lokasi</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">List Lokasi
                </th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Status</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Keterangan</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($dataRealisasi as $item)
                <tr style="vertical-align: center;border: 1px solid black;">
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $loop->iteration }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ Carbon\Carbon::parse($item->created_at)->translatedFormat('j F Y') }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="left">
                        {{ $item->perencanaanHewan->sub_indikator }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $item->perencanaanHewan->opd->nama }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="left">
                        @forelse ($item->perencanaanHewan->opdTerkaitHewan as $item2)
                            <p>{{ $loop->iteration }}. {{ $item2->opd->nama }}</p>
                        @empty
                            <p>-</p>
                        @endforelse
                    </td>
                    <td style="vertical-align: center;border: 1px solid black;" align="right">
                        {{ $item->perencanaanHewan->nilai_pembiayaan }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $item->perencanaanHewan->sumberDana->nama }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $item->lokasiRealisasiHewan->count() }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="left">
                        @forelse ($item->lokasiRealisasiHewan as $item2)
                            <p>{{ $loop->iteration }}. {{ $item2->lokasiHewan->nama }}</p>
                        @empty
                            <p>-</p>
                        @endforelse
                    </td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        @if ($item->status == 0)
                            Menunggu Konfirmasi
                        @elseif ($item->status == 1)
                            Disetujui
                        @elseif ($item->status == 2)
                            Ditolak
                        @endif
                    </td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $item->alasan_ditolak }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
