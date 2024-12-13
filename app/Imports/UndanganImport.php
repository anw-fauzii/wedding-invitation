<?php

namespace App\Imports;

use App\Models\Undangan;
use Maatwebsite\Excel\Concerns\ToModel;

class UndanganImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $kode = substr(str_shuffle($permitted_chars), 0, 8);

        return new Undangan([
            'kode' => $kode,
            'nama' => $row['0'],
            'whatsapp' => $row['1'],
        ]);
    }
}
