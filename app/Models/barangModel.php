<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barangModel extends Model
{
    // panggil data migration
    protected $table = 'DataBarang';
    public $primaryKey = 'id_barang';
    public $filllable = [
        'nama_barang',
        'harga',
        'stok',
        'foto',
    ];
}