<?php

namespace App\Exports;

use App\Models\Pasien;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPasien implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pasien::select('nama','nik','alamat','jenis_kelamin','riwayat_penyakit',
        'faskes','berat_badan','tinggi_badan','tekanan_darah','gds','kolestrol')->get();
    }
}
