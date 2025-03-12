<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FHK extends Model
{
    use HasFactory;
    protected $table = "f_h_k_s";
    protected $fillable = [
      'judul_fhk',
      'tema_fhk',
      'bacaan_alkitab',
      'tanggal_khotbah',
      'file_fhk',
    ];
}
