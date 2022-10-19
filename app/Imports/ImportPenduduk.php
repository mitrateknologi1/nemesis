<?php

namespace App\Imports;

use App\Models\Desa;
use App\Models\Penduduk;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class ImportPenduduk implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */


    public function collection(Collection $rows)
    {
        $array_jenis_kelamin = ['Laki-Laki', 'Perempuan'];
        // $array_agama = ['Islam', 'Kristen', 'Hindu', 'Budha', 'Katolik', 'Konghucu'];
        $array_status_pendidikan = ['Tidak Sekolah', 'TK', 'SD', 'SMP', 'SMA', 'Diploma 1', 'Diploma 1/2', 'Diploma 2', 'Diploma 3', 'S1 / Diploma 4', 'S2', 'S3'];
        $array_pekerjaan = ['Tidak Bekerja', 'Ibu Rumah Tangga', 'Karyawan Swasta', 'PNS / TNI-POLRI', 'Wiraswasta / Wirausaha', 'Petani / Pekebun', 'Pekerjaan Tidak Tetap', 'Pelajar / Mahasiswa', 'Nelayan / Perikanan', 'Pendeta', 'Pegawai Honorer', 'Lainnya'];
        // $array_golongan_darah = ['Tidak Tahu', 'A', 'B', 'AB', 'O', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        // $array_status_perkawinan = ['Belum Kawin', 'Kawin Belum Tercatat', 'Kawin Tercatat', 'Cerai Hidup', 'Cerai Mati'];
        // $array_kewarganegaraan = ['WNI', 'WNA'];
        foreach ($rows as $row) {
            $cekPenduduk = Penduduk::where('nik', $row['NIK'])->first();
            if (!$cekPenduduk) {
                if (($row['Nama'] != '') && ($row['NIK'] != '') && ($row['Jenis Kelamin'] != '')  && ($row['Tanggal Lahir'] != '') &&  ($row['Desa'] != '')) {
                    $penduduk = new Penduduk();
                    $penduduk->nama = $row['Nama'];
                    $penduduk->nik = $row['NIK'];
                    $penduduk->jenis_kelamin = in_array($row['Jenis Kelamin'], $array_jenis_kelamin) ? $row['Jenis Kelamin'] : 'Laki-Laki';
                    // $penduduk->tempat_lahir = $row['Tempat Lahir'];
                    $penduduk->tanggal_lahir = Carbon::parse($row['Tanggal Lahir'])->format('y-m-d');
                    // $penduduk->agama = (($row['Agama'] != '') && in_array($row["Agama"], $array_agama)) ? $row['Agama'] : 'Islam';
                    $penduduk->status_pendidikan = (($row['Status Pendidikan Terakhir'] != '') && in_array($row["Status Pendidikan Terakhir"], $array_status_pendidikan)) ? $row['Status Pendidikan Terakhir'] : 'Tidak Sekolah';
                    $penduduk->pekerjaan = (($row['Pekerjaan'] != '') && in_array($row["Pekerjaan"], $array_pekerjaan)) ? $row['Pekerjaan'] : 'Tidak Bekerja';
                    // $penduduk->golongan_darah = (($row['Golongan Darah'] != '') && in_array($row["Golongan Darah"], $array_golongan_darah)) ? $row['Golongan Darah'] : 'Tidak Tahu';
                    // $penduduk->status_perkawinan = (($row['Status Perkawinan'] != '') && in_array($row["Status Perkawinan"], $array_status_perkawinan)) ? $row['Status Perkawinan'] : 'Belum Kawin';
                    // $penduduk->tanggal_perkawinan = $row['Tanggal Perkawinan'] ? Carbon::parse($row['Tanggal Perkawinan'])->format('y-m-d') : null;
                    // $penduduk->kewarganegaraan = (($row['Kewarganegaraan'] != '') && in_array($row["Kewarganegaraan"], $array_kewarganegaraan)) ? $row['Kewarganegaraan'] : 'WNI';
                    // $penduduk->no_paspor = $row['Nomor Paspor'] ?? '';
                    // $penduduk->no_kitap = $row['Nomor Kitap'] ?? '';
                    // $penduduk->alamat = $row['Alamat'] ?? '-';

                    $desa = Desa::where('nama', '=', $row['Desa'])->first();
                    // dd($row['Desa']);
                    if ($desa) {
                        $penduduk->desa_id = $desa->id;
                    } else {
                        $desa = Desa::first();
                        $penduduk->desa_id = $desa->id;
                    }
                    $penduduk->save();
                }
            }
        }
    }
}
