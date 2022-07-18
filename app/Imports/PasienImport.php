<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class PasienImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'nama'     => $row[0],
            'nik'    => $row[1], 
            'alamat' => $row[2], 
            'jenis_kelamin' => $row[3],

        ]);
    }
}
