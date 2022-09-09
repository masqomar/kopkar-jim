<?php

namespace App\Imports;

use App\Models\SimpananAnggota;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SimpananWajibImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new SimpananAnggota([
            'user_id' => $row['anggota'],
            'produk_id' => $row['jenis_simpanan'],
            'jumlah' => $row['jumlah'],
            'periode_bulan' => $row['bulan'],
            'periode_tahun' => $row['tahun'],
            'tanggal_setor' => $row['tgl_setor']

        ]);
    }
}
