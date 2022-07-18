<?php

namespace App\Imports;

use App\Models\Pasien;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportPasien implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pasien([
        'nama' => $row[0],
        'nik' => $row[1],
        'alamat' => $row[2],
        'jenis_kelamin' => $row[3],
        'riwayat_penyakit' => $row[4],
        'faskes' => $row[5],
        'berat_badan' => $row[6],
        'tinggi_badan' => $row[7],
        'tekanan_darah' => $row[8],
        'gds' => $row[9],
        'kolestrol' => $row[10],
        'create_by' => "user",
        ]);
    }
}
