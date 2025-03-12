<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendampingFHK extends Model
{
    use HasFactory;
    protected $table = 'pendamping_f_h_k_s';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'file',
    ];
}
