<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_jenis',
        'id_satuan',
        'kode_barang',
        'nama_barang',
        'keterangan',
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'id_jenis', 'id');
    }

    public function dataSatuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan', 'id');
    }
}
