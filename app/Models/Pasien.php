<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = ['nama','nik','alamat','jenis_kelamin','riwayat_penyakit','faskes','berat_badan','tinggi_badan',
                            'tekanan_darah','gds','kolestrol','create_by'];
    protected $table = 'pasiens';
    use HasFactory;
}
