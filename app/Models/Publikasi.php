<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    protected $fillable = [
        'nomor',
        'judul',
        'kategori',
        'ukuran_file',
        'link_download',
        'tanggal_rilis',
        'sampul',
    ];
}