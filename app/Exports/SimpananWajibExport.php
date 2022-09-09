<?php

namespace App\Exports;

use App\Models\SimpananAnggota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SimpananWajibExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return SimpananAnggota::where('produk_id', '7')
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function headings(): array
    {
        return ["No", "Anggota", "Jenis Simpanan", "Jumlah", "Bulan", "Tahun", "Tgl Setor"];
    }
}
