    <table align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
        <thead align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">No.</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Nama</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">List Sub
                    Indikator Intervensi
                </th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">List OPD
                </th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Tanggal Intervensi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataRealisasi as $item)
                @php
                    $no_1 = 1;
                    $no_2 = 1;
                    $no_3 = 1;
                @endphp
                <tr style="vertical-align: center;border: 1px solid black;">
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $loop->iteration }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="left">
                        {{ $item->nama }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="left">
                        @forelse ($item->listIndikator as $item2)
                            @if ($tahun_filter && $tahun_filter != 'Semua')
                                @if ($item2->realisasiManusia->created_at->format('Y') == $tahun_filter)
                                    <p>{{ $no_1 }}.
                                        {{ $item2->realisasiManusia->perencanaanManusia->sub_indikator }}</p>
                                    @php
                                        $no_1++;
                                    @endphp
                                @endif
                            @else
                                <p>{{ $loop->iteration }}.
                                    {{ $item2->realisasiManusia->perencanaanManusia->sub_indikator }}
                                </p>
                            @endif
                        @empty
                            <p>-</p>
                        @endforelse
                    </td>
                    <td style="vertical-align: center;border: 1px solid black;" align="left">
                        @forelse ($item->listIndikator as $item2)
                            @if ($tahun_filter && $tahun_filter != 'Semua')
                                @if ($item2->realisasiManusia->created_at->format('Y') == $tahun_filter)
                                    <p>{{ $no_2 }}.
                                        {{ $item2->realisasiManusia->perencanaanManusia->opd->nama }}
                                    </p>
                                    @if ($item2->realisasiManusia->perencanaanManusia->opdTerkaitManusia)
                                        @foreach ($item2->realisasiManusia->perencanaanManusia->opdTerkaitManusia as $item3)
                                            <p>-{{ $item3->opd->nama }}</p>
                                        @endforeach
                                    @endif
                                    @php
                                        $no_2++;
                                    @endphp
                                @endif
                            @else
                                <p>{{ $loop->iteration }}.
                                    {{ $item2->realisasiManusia->perencanaanManusia->opd->nama }}
                                </p>
                                @if ($item2->realisasiManusia->perencanaanManusia->opdTerkaitManusia)
                                    @foreach ($item2->realisasiManusia->perencanaanManusia->opdTerkaitManusia as $item3)
                                        <p>-{{ $item3->opd->nama }}</p>
                                    @endforeach
                                @endif
                            @endif
                        @empty
                            <p>-</p>
                        @endforelse
                    </td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        @forelse ($item->listIndikator as $item2)
                            @if ($tahun_filter && $tahun_filter != 'Semua')
                                @if ($item2->realisasiManusia->created_at->format('Y') == $tahun_filter)
                                    <p>{{ $no_3 }}.
                                        {{ Carbon\Carbon::parse($item2->realisasiManusia->created_at)->translatedFormat('d F Y') }}
                                    </p>
                                    @php
                                        $no_3++;
                                    @endphp
                                @endif
                            @else
                                <p>{{ $loop->iteration }}.
                                    {{ Carbon\Carbon::parse($item2->realisasiManusia->created_at)->translatedFormat('d F Y') }}
                                </p>
                            @endif
                        @empty
                            <p>-</p>
                        @endforelse
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
